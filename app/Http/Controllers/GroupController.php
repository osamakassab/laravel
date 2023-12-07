<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GroupController extends Controller
{

    public function index(Request $request)
    {
        $groups = Group::all();

        return view('groups.index', [
            "groups" => $groups
        ]);
    }


    public function showUserGroups()
    {
        // Get the current user
        $user = Auth::user();

        // Get the groups that the user belongs to
        $groups = $user->groups;

        return view('groups.index', [
            "groups" => $groups
        ]);
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate the input data
            $request->validate([
                'name' => 'required|string|max:255|unique:groups,name,id',
                'description' => 'nullable|string|max:255',
            ]);

            // Get the current user
            $user = Auth::user();

            // Create a new group with the current user id
            $group = Group::create([
                'name' => $request->name,
                'description' => $request->description,
                'owner_id' => $user->id,
            ]);
            // Attach the user to the group
            $group->users()->attach($user);

            // Redirect to a success page or show a success message
            return redirect()->route('groups.index')->with('success', 'Group has been created successfuly ..❤ ');
        } catch (Exception $e) {
            return redirect()->route('groups.index')->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $group = Group::find($id);

        return view('groups.show', [
            "group" => $group
        ]);
    }

    public function destroy($id)
    {

        $group = Group::find($id);
        // Delete the file record from the database
        $group->delete();
        // return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
        return response()->json([
            "message" => "Group has been deleted successfully .. 💛"
        ], 200);
    }
}
