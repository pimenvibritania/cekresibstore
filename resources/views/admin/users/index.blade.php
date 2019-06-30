@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage User</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" >Name</th>
                                <th scope="col" >Email</th>
                                <th scope="col" >Roles</th>
                                <th scope="col" >Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th>{{$user->name}}</th>
                                    <th>{{$user->email}}</th>
                                    <th>{{ implode(',',$user->roles()->get()->pluck('name')->toArray()) }}</th>
                                    <th>
                                        <a href="{{ route('admin.users.edit', $user->id) }}">
                                            <button type="button" class="btn btn-primary float-left" >Edit</button>
                                        </a>

                                        {{-- ACTION NYA ALTERNATIF, ROUTE NYA ERROR :v 'missing parameter' --}}

                                        <form action="{{ action('Admin\UserController@destroy', ['id' => $user->id]) }}" method="POST">
                                            {{method_field('DELETE')}}
                                            @csrf

                                            <button type="submit" class="btn btn-danger ml-2">Delete</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
