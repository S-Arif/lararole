@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-10">

                <div class="card">
                    <div class="card-header">
                        Available roles
                        <a href="{{ route('roles.create') }}" class="float-right btn btn-primary">New +</a>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table striped">

                            <thead>

                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>ACTION</th>
                            </tr>

                            </thead>

                            <tbody>

                                @foreach( $roles as $role )

                                <tr>
                                    <td>{{ $role->id  }}</td>
                                    <td>{{ $role->name  }}</td>
                                    <td>{{ $role->description  }}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ route('roles.edit', ['role'=>$role->id])  }}">Edit</a>
                                                <a class="dropdown-item" href="{{ route('roles.destroy', ['role'=>$role->id])  }}"
                                                onclick="return confirm('Do you want to delete the role? \nPlease press OK to continue.')">Delete</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>
            {{-- .col-10 --}}

        </div>
        {{-- .row --}}

    </div>
    {{-- .container --}}

@endsection
