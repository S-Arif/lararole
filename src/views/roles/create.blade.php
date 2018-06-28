@extends('layouts.app')

@section('content')

    <form method="POST" class="container{{ $errors->hasBag()? ' was-validated':''  }}" action="{{ $role->id? route( 'roles.update', ['role' => $role->id]) : route( 'roles.store') }}" aria-label="@if($role->id) Edit @else New @endif role" novalidate>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        @if($role->id) Edit @else New @endif role
                            <a href="{{ route('roles') }}" class="float-right btn btn-primary">Roles list</a>
                    </div>

                     <div class="card-body">

                         @if($role->id)
                             {{ method_field('put') }}
                         @endif

                        {{ csrf_field()  }}

                         <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ old('name', $role->name) }}" autofocus required>
                             @if ($errors->has('name'))
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                             @endif
                         </div>

                         <div class="form-group">
                             <label for="description">Description</label>
                             <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('name', $role->description) }}</textarea>
                         </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Permissions</div>

                    <div class="card-body">

                        <div class="col-sm-12 table-responsive">

                            <table class="table table-bordered table-striped" id="contactForm">

                                <thead>

                                    <tr>

                                        <th>Module</th>

                                        <th>Permissions</th>

                                    </tr>

                                </thead>

                                <tbody>

                                @foreach($permissions as $module => $perms)

                                    <tr>

                                        <th>

                                            {{ $module }}

                                        </th>

                                        <td>

                                            <div class="col">

                                                @foreach($perms as $perm)

                                                    <div class="custom-control custom-checkbox{{ $errors->has('permissions') ? ' is-invalid' : '' }}">

                                                        <input class="custom-control-input{{ $errors->has('permissions') ? ' is-invalid' : '' }}" name="permissions[]" type="checkbox" value="{{ $perm->id }}" id="{{ $perm->id }}_perm" required
                                                                @if($hasPerms->contains($perm->id)) checked @endif
                                                        />

                                                        <label class="custom-control-label" for="{{ $perm->id }}_perm">{{ $perm->name }}</label>

                                                    </div>

                                                    @if( $errors->has('permissions') && $loop->last )
                                                        <p class="invalid-feedback" style="display: block;">{{ $errors->first('permissions') }}</p>
                                                    @endif

                                                @endforeach

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                                </tbody>

                            </table>
                            {{-- table --}}
                        </div>
                        {{-- .responsive-table --}}
                    </div>
                    {{-- .card-body --}}
                </div>
                {{-- .card --}}
            </div>
            {{-- .col-6 --}}
        </div>
    </form>
@endsection
