@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
	<h5 class="mb-2">1.	N° de Reclamos en el Año</h5>
   <div class="row">
		@foreach ($tipos as $tipo)
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-primary"><i class="far fa-copy"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">{{$tipo->nombre}}</span>
						<span class="info-box-number">{{$tipo->cantidad}}</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
		@endforeach
	</div>
	<!-- /.row -->


	<h5 class="mb-2">2.	N° de Reclamos en el Mes</h5>
   <div class="row">
		@foreach ($causas as $causa)
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-primary"><i class="far fa-copy"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">{{$causa->codigo}}</span>
						<span class="info-box-number">{{$causa->cantidad}}</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
		@endforeach
	</div>
	<!-- /.row -->

	<h5 class="mb-2">3.	N° de Reclamos Médicos</h5>
   <div class="row">
		@foreach ($origenes as $origen)
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-primary"><i class="far fa-copy"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">{{$origen->nombre}}</span>
						<span class="info-box-number">{{$origen->cantidad}}</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
		@endforeach
	</div>
	<!-- /.row -->

	<h5 class="mb-2">4.	N° de Reclamos Administrativos</h5>
   <div class="row">
		@foreach ($estados as $estado)
			<div class="col-md-3 col-sm-6 col-12">
				<div class="info-box">
					<span class="info-box-icon bg-primary"><i class="far fa-copy"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">{{$estado->nombre}}</span>
						<span class="info-box-number">{{$estado->cantidad}}</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
		@endforeach
	</div>
	<!-- /.row -->
	
@stop
