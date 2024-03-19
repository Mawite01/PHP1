@extends('layouts.master')
@section('content')

<table>
    <thead>
    <th>Id</th>
    <th>Name</th>
    <th>Status</th>
    <th>Image</th>
    </thead>
    <tbody>
        @foreach ($categories as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{ $cat->name}}</td>
            <td>{{ $cat->status}}</td>
            <td>
                <img src="{{ asset('uploadedimages/'. $cat->image)}}" alt="" width="50px">
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection