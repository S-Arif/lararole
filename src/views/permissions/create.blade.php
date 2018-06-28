@extends('layouts.app')

@section('content')

    <form method="POST" class="container" action="{{ $permission->id? route( 'permissions.update', ['permissions' => $permission->id]) : route( 'roles.store') }}" aria-label="@if($permission->id) Edit @else New @endif role">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        @if($permission->id) Edit @else New @endif role
                            <a href="{{ route('permissions') }}" class="float-right btn btn-primary">Permissions list</a>
                    </div>

                     <div class="card-body">

                         @if($permission->id)
                             {{ method_field('put') }}
                         @endif

                        {{ csrf_field()  }}

                         <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ old('name', $permission->name) }}" required autofocus>
                             @if ($errors->has('name'))
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                             @endif
                         </div>

                         <div class="form-group">
                             <label for="gate">Gate</label>
                             <input type="text" class="form-control{{ $errors->has('gate') ? ' is-invalid' : '' }}" id="gate" name="gate" value="{{ old('gate', $permission->gate) }}" required>
                             @if ($errors->has('gate'))
                                 <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('gate') }}</strong>
                            </span>
                             @endif
                         </div>

                         <div class="form-group">
                             <label for="module">Module</label>
                             <input type="text" class="form-control{{ $errors->has('module') ? ' is-invalid' : '' }}" id="module" name="module" value="{{ old('module', $permission->module) }}" required>
                             @if ($errors->has('module'))
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('module') }}</strong>
                                </span>
                             @endif
                         </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection
