@extends ('template')

@section('content')
	<h1>Produtos</h1>

	@foreach ($products as $p)
	<a href="produtos/{{ $p->url or $p->id }}"><h2>{{ $p->name }}</h2></a>

	<p>{!! nl2br($p->description) !!}</p>

	<blockquote>
		<h3>Avaliações</h3>

		@forelse ($p->reviews as $r)

		<h4>{{ $r->title }}</h4><br />

		@for($i = 1; $i <=5; $i++)

			@if ($i <= $r->stars)
			<i class="glyphicon glyphicon-star"></i>
			@else
			<i class="glyphicon glyphicon-star-empty"></i>
			@endif

		@endfor

		<br />
		<p>{!! nl2br($r->text) !!}</p>
		<hr />

		@empty

		<h4>Nenhuma avaliação encontrada!</h4>

		@endforelse

	</blockquote>
	@endforeach
@endsection