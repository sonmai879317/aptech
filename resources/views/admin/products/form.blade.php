<style>
	.f{with: 50%;padding: 5px}
	li{list-style-type: none}
	label{with: 20%}
	.tb {
		width: 50%;
		padding: 5px;

	}
</style>
<div>
	<ul>
		<li>
			<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
				{!! Form::label('product_cate','Danh muc san pham', ['class' => 'required']) !!}
				{{ Form::select('product_cate', $cates, null, ['placeholder' => '-Danh muc san pham- ', 'class' => 'f tb']) }}
				{!! $errors->first('name', '<p class="help_block">:message</p>') !!}
				
			</div>
		</li>
		<li>
				<div class="form-group{{ $errors-has('name') ? 'has-error' : ''}}">
				{!! Form::label('product_name', 'Ten san pham', ['class' => 'required']) !!}
				{!! Form::text('product_name', null, ('required' == 'required') ? ['class' => 'f', 'required' => 'required'] : ['class' => 'f']) !!}
				
			</div>
		</li>
		<li>
			<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
				{!! Form::lable('product_code', 'Ma san pham', ['class' => 'required']) !!}
				{!! Form::text('product_code', null, ('required' == 'required') ? ['class' => 'f', 'required' => 'required'] : ['class' => 'f']) !!}
				{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
				
			</div>		
			
		</li>		
	
	
		<li>
			<div class="form-group{{ $errors->has('name') ? 'has-error': ''}}">
				{!! Form::label('product_teaser', 'Mo ta ngan gon', ['class' => 'required']) !!}
				{!! Form::textarea('product_teaser', null, ['class' => 'form-control description']) !!}
				{!! $errors->first('name', '<p class="help-block">:message</p>')} !!}
				
			</div>
			<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
				{!! Form::label('product_content', 'Mo ta san pham', ['class' => 'required']) !!}
				{!! Form::textarea('product_content', null, ('required' == 'required') ? ['class' => 'form-control description'] : ['class' => 'form-control']) !!}
				{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
				
			</div>
				
		</li>
		<li>
			<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
				{!! Form::label('product_price', 'Gia san pham', ['class' => 'required']) !!}
				{!! Form::text('product_price', null, ('required' == 'required') ? ['class' => 'f', 'required' => 'required'] : ['class' => 'f']) !!}
				{!! $errors->first('name', '<p class="help-block">:message</p>) !!}
			</div>
	
		</li>
		<li>
			<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
				{!! Form::lable('oldPrice', 'Gia cu', ['class' => 'required']) !!}
				{!! Form::text('oldPrice', null, ('required' == 'required') ? ['class' => 'f', 'required' => 'required']:['class' => 'f']) !!}
				{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
				
			</div>
		</li>
		<li>
			<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
				{!! Form::label('stock_amount', 'So Luong', ['class' => 'required']) !!}
				{!! Form::text('stock_amount', null, ('required' == 'required') ? ['class' => 'f', 'required' => 'required'] : ['class' => 'f']) !!}
				{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
				
			</div>
		</li>
		<li>
			{!! Form::submit($formMode === 'edit' ? 'Update' : 'Luu', ['class' => 'btn btn-primary']) !!}
		</li>
	</ul>
</div>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector:'textarea.description',
			with: 1000,
			height: 300
	})
</script>