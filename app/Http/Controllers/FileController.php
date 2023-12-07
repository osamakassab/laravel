<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Reservation;
use Exception;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('files.index', compact('files'));
    }

    public function show($id)
    {
        $file = File::find($id);
        return view('files.show', compact('file'));
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        // Validate the file input
        $request->validate([
            'file' => 'required|file',
            'group_id' => 'required|integer|exists:groups,id'
        ]);
        // Get the original name and extension of the file
        $originalName = $request->file->getClientOriginalName();
        $extension = $request->file->getClientOriginalExtension();

        // Generate a unique name for the file by appending a timestamp
        $fileName = Str::slug($originalName . '-' . now()->format('Y-m-d-H-m-s')) . '.' . $extension;

        // Store the file in the storage and get the path
        $path = $request->file->storeAs('files', $fileName);

        // Create a new file record in the database
        $file = File::create([
            'url' => $path,
            'owner_id' => auth()->id(),
            'group_id' => $request->group_id,
            'status' => 'free',
        ]);
        $file->save();

        // Redirect back to the previous page or show a success message
        return redirect()->route('files.index')->with('success', 'File uploaded successfully.');
    }

    public function destroy($id)
    {
        $file = File::find($id);
        Storage::delete($file->url);
        // Delete the file record from the database
        $file->delete();
        return response()->json([
            "message" => " The file has been deleted successfully"
        ]);
    }

    private function download($id)
    {
        $file = File::find($id);
        // Get the absolute path of the file
        // $filepath = storage_path("app/{$file->url}");
        // Check if the file exists and is valid
        // return Response()->download($filepath);

        // Use the Storage facade to download the file
        return Storage::download($file->url);
    }

    // Add a parameter to accept an array of file ids
    public function checkin($id)
    {
        try {
            // Loop through the file ids

            // Find the file by id
            $file = File::find($id);

            // Create a new reservation
            Reservation::create([
                'user_id' => auth()->id(),
                'file_id' => $id,
                'reserved_at_date' => Carbon::now()->subHours(8),

            ]);

            // Update the file status to "in use"
            $file->update(['status' => 'in use']);

            // Download the file with the current id
            return $this->download($id);


            // Return a success message
            return redirect()->route('files.index')->with('success', 'You have checked in successfully.');
        } catch (Exception $e) {
            return redirect()->route('files.index')->with('error', $e->getMessage());
        }
    }

    public function checkout(Request $request, $id)
    {
        $file = File::find($id);

        // Check if the file is reserved by the current user
        $reservation = Reservation::where('user_id', auth()->id())
            ->where('file_id', $id)->where('returned_at_date', null)
            ->first();


        if ($file->checkStatus('in use')) {
            if ($reservation) {
                // Delete the old file from the storage
                Storage::delete($file->url);

                // Get the original name and extension of the file
                $originalName = $request->file('new_file')->getClientOriginalName();
                $extension = $request->file('new_file')->getClientOriginalExtension();

                // Generate a unique name for the file by appending a timestamp
                $fileName = Str::slug($originalName . '-' . now()->format('Y-m-d-H-m-s')) . '.' . $extension;

                // Upload the new file to the storage
                $path = $request->file('new_file')->storeAs('files', $fileName);

                // Update the file path and status to "free"
                $file->update([
                    'url' => $path,
                    'status' => 'free'
                ]);
                $reservation->update(['returned_at_date' => Carbon::now()->subHours(8)]);
                // Redirect back to the previous page or show a success message
                return redirect()->route('files.index')->with('success', 'File checked out successfully.');
            } else {
                // Redirect back to the previous page or show an error message
                return redirect()->route('files.index')->with('error', 'You do not have permission to check out this file.');
            }
        } else {
            // Redirect back to the previous page or show an error message
            return redirect()->route('files.index')->with('error');
        }
    }

    public function checkinAll($ids)
    {
        try {

           // Loop through the file ids
            foreach ($ids as $id) {
                // Find the file by id or fail
                $file = File::find($id);

                // Update or create a new reservation
                Reservation::Create([
                    'user_id' => auth()->id(),
                    'file_id' => $id,
                    'reserved_at_date' => Carbon::now(),
                ]);

                // Update the file status to "in use"
                $file->update(['status' => 'in use']);

                // Download the file by the current id:
                return $this->download($id);
            }
            // Return a success message
            return redirect()->route('files.index')->with('success', 'You have checked in successfully.');
        } catch (Exception $e) {
            return redirect()->route('files.index')->with('error', $e->getMessage());
        }
    }
}
