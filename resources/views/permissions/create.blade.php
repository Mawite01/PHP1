@extends('layouts.master')
@section('content')
<form action="{{ route('permissions.store')}}" method="POST" >
    @csrf
    <div>
        <label for="">Permission Name</label>
        <input type="text" name="name">
        @if($errors->first('name'))
        <span style="color: red;">{{$errors->first('name')}}</span>
        @endif
    </div>
    <br>

    <button type="submit">Submit</button>
</form>
@endsection