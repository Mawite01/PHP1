@extends('layouts.master')
@section('content')
<a href="{{route('users.create')}}">New User</a>
<table>
    <thead>
    <th>Id</th>
    <th>Name</th>
    <td>Email</td>
    <th>Action</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection