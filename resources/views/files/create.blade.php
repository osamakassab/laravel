@extends('layouts.base')

@section('content')
    <div class="container">
        <h2>Upload File</h2>

        <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Hidden input for send group_id -->
            <input type="hidden" name="group_id" value="1">

            <div class="mb-3">
                <label for="file" class="form-label">Choose File</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>

            {{-- <div class="mb-3">
                <label for="description" class="form-label">File Description</label>
                <textarea name="description" id="description" class="form-control" placeholder="Enter a brief description for the file"></textarea>
            </div> --}}

            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
@endsection
