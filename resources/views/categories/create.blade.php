<form action="{{ route('categories.store')}}" method="POST">
    @csrf
    <div>
        <label for="">Name</label>
        <input type="text" name="name">
        @if($errors->first('name'))
        <span style="color: red;">{{$errors->first('name')}}</span>
        @endif
    </div>
    <br>
    <div>
        <label for="">Description</label>
        <input type="text" name="description" id="">
        @if($errors->first('description'))
        <span style="color: red;">{{$errors->first('description')}}</span>
        @endif
    </div>
    <div>
        <label for="">Status</label>
        <select name="status" id=""> 
            <option value="1">true</option>
            <option value="0">false</option>
        </select>
        @if($errors->first('status'))
        <span style="color: red;">{{$errors->first('status')}}</span>
        @endif
    </div>
    <button type="submit">Submit</button>
</form>