@extends('layouts.master')
@section('content')
<a href="{{route('users.create')}}">New User</a>
<table>
    <thead>
        <th>Id</th>
        <th>Name</th>
        <td>Email</td>
        <th>Role</th>
    </thead>
    <tbody>
        @foreach ($users as $user)

        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            @foreach ($user->roles as $role)
            <td>
                {{$role->name}}
            </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
@endsection