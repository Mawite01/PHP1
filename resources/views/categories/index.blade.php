<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
<h1>Category</h1>
<a href="{{route('categories.create')}}">New Create</a>
<!-- <a href="{{ url('categories/create')}}">New Create</a> -->

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
    <tr>
      <th scope="row">{{ $category->id}}</th>
      <td>{{ $category->name }}</td>
      <td>{{ $category->description }}</td>
      <td>{{ $category->status }}</td>
      <td>
        <a href="{{route('categories.edit',$category->id)}}"> Edit</a>
      </td>
    </tr>
    @endforeach
   
  </tbody>
</table>
</body>
</html>