<form action="{{route('categories.update',$category->id)}}" method="POST">
    @csrf
    <div>
        <label for="">Name</label>
        <input type="text" name="name" value="{{$category->name}}">
    </div>
    <br>
    <div>
        <label for="">Description</label>
        <input type="text" name="description" id="" value="{{$category->description}}">
    </div>
    <div>
        <label for="">Status</label>
        <select name="status" id="">
            <option value="1" @if($category->status == 1) selected @endif>true</option>
            <option value="0" @if($category->status == 0) selected @endif>false</option>
        </select>
    </div>
    <button type="submit">Update</button>
</form>