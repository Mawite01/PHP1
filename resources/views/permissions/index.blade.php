@extends('layouts.master')
@section('content')
<a href="{{route('permissions.create')}}">New Permission</a>
<table>
    <thead>
    <th>Id</th>
    <th>Name</th>
    <th>Action</th>
    </thead>
    <tbody>
    @foreach ($permissions as $key => $permission)
            <tr>
                <!-- <td>{{$key + 1}}</td> -->
                <td>{{$loop->iteration}}</td>
                <td>{{$permission->name}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection