@extends('layouts.master')

@section('master')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" id="margtop">
            <div class="card">
                <div class="card-header">Manage {{$user -> name}}</div>

                <div class="card-body">
                    <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    @foreach ($roles as $role)
                        <div class="form-check">
                            <input type="radio" name="roles[]" value="{{$role->id}}" {{ $user->hasAnyRole($role->name)?'checked':'' }} >
                            <label> {{ $role->name }} </label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-success">Update</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
