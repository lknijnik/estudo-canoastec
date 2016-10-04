
	<div class="row">
		<div class="form-group">
			<div class="col-md-12">
				{!! Form::label('name', 'Nome') !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<div class="col-md-12">
				{!! Form::label('short_description', 'Descrição Resumida') !!}
				{!! Form::textarea('short_description', null, ['class' => 'form-control', 'rows' => '3']) !!}
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="form-group">
			<div class="col-md-12">
				{!! Form::label('url', 'URL Amigável') !!}
				{!! Form::text('url', null, ['class' => 'form-control']) !!}								
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<div class="col-md-4 col-sm-6">
				{!! Form::label('sku', 'SKU') !!}
				{!! Form::text('sku', null, ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-4 col-sm-6">
				{!! Form::label('grouping_sku', 'SKU Agrupador') !!}
				{!! Form::text('grouping_sku', null, ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-4 col-sm-6">
				{!! Form::label('isbn', 'ISBN') !!}
				{!! Form::text('isbn', null, ['class' => 'form-control']) !!}				
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4 col-sm-4">
				{!! Form::label('stock', 'Quantidade') !!}
				{!! Form::number('stock', null, ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-4 col-sm-4">
				{!! Form::label('minimum_stock', 'Quantidade Mínima') !!}
				{!! Form::number('minimum_stock', null, ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			
			<div class="col-md-4 col-sm-4">
				{!! Form::label('price', 'Preço') !!}
				{!! Form::text('price', null, ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-4 col-sm-4">
				{!! Form::label('discount_price', 'Preço Promocional') !!}
				{!! Form::text('discount_price', null, ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-4 col-sm-4">
				{!! Form::label('discount_percentage', 'Percentual de Desconto') !!}
				<div class="input-group">
					{!! Form::text('discount_percentage', null, ['class' => 'form-control']) !!}
					<div class="input-group-addon">%</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<div class="col-md-3 col-sm-6">
				{!! Form::label('weight', 'Peso') !!}
				{!! Form::text('weight', null, ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-3 col-sm-6">
				{!! Form::label('length', 'Comprimento') !!}
				{!! Form::text('length', null, ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-3 col-sm-6">
				{!! Form::label('height', 'Altura') !!}
				{!! Form::text('height', null, ['class' => 'form-control']) !!}
			</div>
			<div class="col-md-3 col-sm-6">
				{!! Form::label('width', 'Largura') !!}
				{!! Form::text('width', null, ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="form-group">
			<div class="col-md-12">
				{!! Form::label('description', 'Detalhamento do Produto') !!}
				{!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '10']) !!}
			</div>
		</div>
	</div>

	{!! Form::hidden('status', 1) !!}
