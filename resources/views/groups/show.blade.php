@extends('layouts.base')

@section('content')
    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-warning">
            {{ session('error') }}
        </div>
    @endif

    <div class="container">
        <h1 align="center">Group #{{ $group->id }}</h1>
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Owner</th>
                        <th>Members</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->description }}</td>
                        <td>{{ $group->owner->name }}</td>
                        <td>{{ $group->users->count() }}</td>
                        <td>
                            <table>
                                <tbody>
                                    @foreach ($group->users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning">Edit</button>
                                                @if (auth()->user()->name != $user->name)
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
