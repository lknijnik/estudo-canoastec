@extends ('template')

@section('content')
	<h1>Admin Produtos</h1>

	<a href="{{ route('admin.products.create') }}" class="btn btn-success">Novo Produto</a>
	
	<br><br>

	<table class="table">
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Ações</th>
		</tr>
		@foreach ($products as $p)
		<tr>
			<td>{{ $p->id }}</td>
			<td>{{ $p->name }}</td>
			<td>
				<a href="{{ route('admin.products.edit', ['id' => $p->id]) }}" class="btn btn-default">Edit</a>
				<a href="{{ route('admin.products.delete', ['id' => $p->id]) }}" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>

	{!! $products->render() !!}

	
@endsection