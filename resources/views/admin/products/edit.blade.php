@extends ('template')

@section('content')

	<h1>Admin Editar Produto</h1>

	@if ($errors->any())

		<ul class="alert">
			@foreach ($errors->all() as $e)
				<li>{{ $e }}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::model($product, ['route' => ['admin.products.update', $product->id], 'method' => 'put']) !!}
	

	@include('admin.products.form')

	<div class="form-group">
		{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}
	
@endsection