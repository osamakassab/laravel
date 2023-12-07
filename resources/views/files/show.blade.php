@extends('layouts.base')

@section('content')
    <div class="container">
        <h1 class="text-center">File Details</h1>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">File Information</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fileUrl">File URL:</label>
                            <input type="text" class="form-control" id="fileUrl" placeholder="Enter file URL"
                                value="{{ $file->url }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="fileName">File Name:</label>
                            <input type="text" class="form-control" id="fileName" placeholder="Enter file name"
                                value="{{ basename($file->url) }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ownerName">Owner Name:</label>
                            <input type="text" class="form-control" id="ownerName" placeholder="Enter owner name"
                                value="{{ $file->owner->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="groupName">Group Name:</label>
                            <input type="text" class="form-control" id="groupName" placeholder="Enter group name"
                                value="{{ $file->group->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="text" class="form-control" id="status" placeholder="Enter file status"
                                value="{{ $file->status }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
