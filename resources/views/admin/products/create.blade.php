@extends ('template')

@section('content')

	<h1>Admin Criar Novo Produto</h1>

	@if ($errors->any())

		<ul class="alert">
			@foreach ($errors->all() as $e)
				<li>{{ $e }}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::open(['route' => 'admin.products.store', 'method' => 'post']) !!}
	
	@include('admin.products.form')

	<div class="form-group">
		{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}
	
@endsection