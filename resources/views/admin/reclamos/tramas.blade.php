@extends('adminlte::page')

@section('title', 'Reclamos - Tramas')

@section('content_header')
    
@endsection

@section('content')
<div class="row m-0 justify-content-center">
    <div class="col-4 trama">
        <div class="h2 m-3">Tramas de los Reclamos</div>
        <form action="{{ route('reclamos.tramas') }}" method="get">
            <div class="form-group">
                <label for="tipo">Seleccione el tipo de Trama</label>
                <select class="custom-select rounded-0" name="tipo" id="tipo">
                    <option value="1" selected>DE RECLAMOS</option>
                    <option value="2">DE MEDIDAS ADOPTADAS</option>
                </select>
            </div>

            <div class="form-group">
                <label for="desde" class="h6" style="color: #666666;font-family: 'Montserrat Medium', sans-serif;">Desde el</label>
                <input type="date" name="desde" id="desde" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="hasta" class="h6" style="color: #666666;font-family: 'Montserrat Medium', sans-serif;">Hasta el</label>
                <input type="date" name="hasta" id="hasta" class="form-control">
            </div>

            <div class="form-group">
                <label for="periodo" class="h6" style="color: #666666;font-family: 'Montserrat Medium', sans-serif;">Periodo</label>
                <input type="text" name="periodo" id="periodo" class="form-control" maxlength="6">
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
