@extends ('template')

@section('content')
	<h1>Admin Produtos</h1>

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
			<td></td>
		</tr>
		@endforeach
	</table>

	{!! $products->render() !!}

	
@endsection