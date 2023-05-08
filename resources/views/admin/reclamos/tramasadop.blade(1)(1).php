@extends('adminlte::page')

@section('title', 'Reclamos - Tramas')

@section('content_header')

@endsection

@section('content')
<div class="row m-0 justify-content-center">
    <div class="col-3  trama">
        <div class="text-center pt-3">ADOPTADAS <i class="fa-solid fa fa-arrow-right"></i> Tramas</div>
        <form action="{{ route('reclamos.tramasadop') }}" method="get">
            <div class="form-group">
                <label for="desde" class="h4" style="color: #666666;font-family: 'Montserrat Medium', sans-serif;">Desde el</label>
                <input type="date" name="desde" id="desde" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="hasta" class="h4" style="color: #666666;font-family: 'Montserrat Medium', sans-serif;">Hasta el</label>
                <input type="date" name="hasta" id="hasta" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary form-control" style="background: #78a7cf;">Generar</button>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
	$(document).ready(function () {
		// hoy
		let hoy = new Date();

	})
</script>
@endsection
