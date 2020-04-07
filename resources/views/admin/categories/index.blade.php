@extends('layouts.app')

@section('content')
<div class="row">
  <h1>List of Category</h1>
</div>
<div class="row">
<table style="text-align: center" class="table table-bordered tbClone" cellspacing="0" cellpadding="0">
  <tr>
    <th>ID</th>
    <th>Category Name</th>
    <th>Category Slug</th>
    <th>Category Parent</th>
    <th>Action</th>
  </tr>
  @foreach($cates as $item)
  <tr>
    <td>{{$item->id}}</td>
    <td>{{$item->cate_name}}</td>
    <td>{{$item->cate_slug}}</td>
    <td>{{$item->cate_parent}}</td>
    <td style="text-align:center">
      <a href="{{ route('categories.edit', $item->id)}}" class="btn btn-primary">Edit</a>
    </td>
      <form action="{{ route('categories.destroy', $item->id)}}" method="post">
      @csrf
      @mothed('DELETE')
      <button class="btn btn-danger" type="submit">Delete</button>
    </form>
    </td>
  </tr>
  @if(count($item->childs))
    @include('admin/categories/index_child', ['childs' => $item->childs])
  @endif
  @endforeach  
</table>

</div>
@endsection