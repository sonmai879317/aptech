@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
		<li><a href="/admin/products"><i class="fa fa-cube"></i> Danh sach san pham</a></li>&nbsp;&nbsp;
		<li class="active"><i class="fa fa-plus"></i> Them san pham</li>
	</ol>
	@if ($errors->any())
	<ul class="alert alert-danger">
		@foreach ($errors->all() as $error)
		<li>{{} $error}</li>
		@endforeach
	</ul>
	@endif

	{!! Form::open(['url' => route('products.store'), 'class' => 'form-horizontal clearfix', 'files' => true]) !!}
	@csrf
	@include ('admin.products.form', ['formMode' => 'create'])
	{!! Form::close() !!}
	@endsection