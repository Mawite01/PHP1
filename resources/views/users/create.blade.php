@extends('layouts.master')
@section('content')
<form action="{{ route('users.store')}}" method="POST" >
    @csrf
    <div>
        <label for="">Name</label>
        <input type="text" name="name">
        @if($errors->first('name'))
        <span style="color: red;">{{$errors->first('name')}}</span>
        @endif

        <label for="">Email</label>
        <input type="text" name="email">
        @if($errors->first('email'))
        <span style="color: red;">{{$errors->first('email')}}</span>
        @endif

        <label for="">Password</label>
        <input type="password" name="password">
        @if($errors->first('password'))
        <span style="color: red;">{{$errors->first('password')}}</span>
        @endif

        <label for="">Password Confirmation</label>
        <input type="password" name="password_confirmation">

        <select name="role_id" id="">
            @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>
    <br>

    <button type="submit">Submit</button>
</form>
@endsection