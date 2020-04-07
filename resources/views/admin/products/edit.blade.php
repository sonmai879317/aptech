@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
	<li><a href="/admin/products/product"><i class="fa fa-list"></i>Danh sach san pham</a></li>
	<li class="active"><i class="fa fa-pencil"></i>Sua san pham</li>
</ol>
@if ($errors->any())
<ul class="alert alert-danger">
	@foreach ($errors->all() as $error)
	<li>{{$error}}</li>
	@endforeach
</ul>
@endif

{!! Form::model($product, [
	'method' => 'PATCH',
	'url' => ['/admin/products', $product->id],
	'class' => 'f',
	'files' => true
	]) !!}
	@include('admin.products.form', ['formMode' => 'edit'])

	{!! Form::close() !!}
	@endsection