@extends('layouts.master')
@section('content')
<a href="{{route('roles.create')}}">New Role</a>
<table>
    <thead>
    <th>Id</th>
    <th>Name</th>
    <th>Permissions</th>
    <th>Action</th>
    </thead>
    <tbody>
        @foreach ($roles as $key => $role)
            <tr>
                <!-- <td>{{$key + 1}}</td> -->
                <td>{{$loop->iteration}}</td>
                <td>{{$role->name}}</td>
                @foreach ($role->permissions as $permission)
                    <td>{{$permission->name}} ,</td>
                @endforeach
                
            </tr>
        @endforeach
    </tbody>
</table>
@endsection