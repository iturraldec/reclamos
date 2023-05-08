@extends('adminlte::page')

@section('title', 'Causas de los Reclamos')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Causas de los Reclamos</h1>
@stop

@section('content')
	<div class="row justify-content-center">
		<div class="col col-lg-10">
			<div class="row mb-2">
				<div class="col">
					<button type="button" 
							id="btn_agregar"
							class="btn btn-primary float-right"
							data-toggle="modal" 
							data-target="#modalForm">
						Agregar
					</button>
				</div>
			</div>

			<table id="dt-causas" class="table table-hover border border-dark">
				<thead class="thead-dark text-center">
					<tr>
						<th scope="col" class="col-sm-1">ID</th>
						<th scope="col">Derecho en Salud</th>
						<th scope="col">Código</th>
						<th scope="col">Causa Específica</th>
						<th scope="col" class="col-sm-2">Acción</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalForm" 
		  data-backdrop="static" 
		  data-keyboard="false" 
		  data-tipo=""
		  data-id=""
		  tabindex="-1" 
		  aria-labelledby="staticBackdropLabel" 
		  aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTitle"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body form-group">
					<label for="cbo_derecho">Derecho en Salud</label>
					<select class="form-control" id="cbo_derecho">
					@foreach($derechos as $derecho)
						<option value="{{ $derecho->id }}">{{ $derecho->nombre}}</option>	
					@endforeach
					</select>
					
					<label for="input_codigo">Código de la Causa</label>
					<input type="text" id="input_codigo" class="form-control">
					
					<label for="input_nombre">Causa Específica</label>
					<input type="text" id="input_nombre" class="form-control">

					<label for="input_definicion">Definición</label>
					<textarea id="input_definicion" class="form-control"></textarea>

					<label for="input_defini">Definición corta</label>
					<textarea id="input_defini" class="form-control"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" id="btn_grabar" class="btn btn-primary" data-dismiss="modal">Grabar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('assets/js/libreria.js') }}"></script>

<script>

$(document).ready(function () {
	// datatable
	let datatable = $('#dt-causas').DataTable({
			"ajax": "{{ route('causas.load-data') }}",
			"columns": [
				{"data": "id", "orderable": false},
				{"data": null,
				 "render": function(data, type, row, meta) {
					 return (row.derecho) ? row.derecho.nombre : '<label class="text-danger">Por Definir</label>';
				 }
				},
				{"data": "codigo"},
				{"data": "nombre"},
				{"data":null,
				"render": function ( data, type, row, meta ) {
								let btn_editar = '<button type="button" class="editar btn btn-primary btn-sm" data-toggle="modal" data-target="#modalForm"><i class="fas fa-edit"></i></button>';
								let btn_eliminar = '<button class="eliminar btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
								
								return  btn_editar + btn_eliminar;
							},
				"orderable": false
				}
			]
	})

	// boton agregar una causa
	$("#btn_agregar").click(function() {
		$("#modalForm").data("tipo", "add");
		$("#modalTitle").html("Agregar Causa");
		$("#cbo_derecho").val("")
		$("#input_codigo").val("");
		$("#input_nombre").val("");
		$("#input_definicion").val("");
		$("#input_defini").val("");
	});

	// boton editar una causa
	$("#dt-causas tbody").on("click", ".editar", function() {
		let data = datatable.row($(this).parents()).data();

		$("#modalForm").data("tipo", "upd");
		$("#modalTitle").html("Editar Causa");
		$("#modalForm").data("id", data.id);
		if (data.derecho_id) {
			$("#cbo_derecho option[value="+ data.derecho_id +"]").attr("selected",true);
		}
		else {
			$("#cbo_derecho").val("");
		}
		$("#input_codigo").val(data.codigo);
		$("#input_nombre").val(data.nombre);
		$("#input_definicion").val(data.definicion);
		$("#input_defini").val(data.defini);
	})

	// grabar
	$("#btn_grabar").click(function(){
		let datos = {
			derecho_id : $("#cbo_derecho").val(),
			codigo : $("#input_codigo").val(),
			nombre : $("#input_nombre").val(),
			definicion : $("#input_definicion").val(),
			defini : $("#input_defini").val()
		};

		if (lib_isEmpty(datos.codigo)) {
			lib_ShowMensaje("Debes especificar el Código de la Causa.", "error");
			return;
		} 
		else if (lib_isEmpty(datos.nombre)) {
			lib_ShowMensaje("Debes especificar el Nombre de la Causa.", "error");
			return;
		}
		else if (lib_isEmpty(datos.definicion)) {
			lib_ShowMensaje("Debes especificar la Definición de la Causa.", "error");
			return;
		}
		else if (lib_isEmpty(datos.defini)) {
			lib_ShowMensaje("Debes especificar una Definición corta de la Causa.", "error");
			return;
		}

		if ($("#modalForm").data("tipo") == "add") { //agregar
			$.ajax({
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url: "{{ route('causas.store') }}",
				type: 'POST',
				data: datos,
				dataType:'json',
				success: function(resp){
					if (! resp.success) {
						lib_ShowMensaje(resp.msg, 'error');
					}
					else {
						datatable.ajax.reload();
						lib_ShowMensaje(resp.msg);
					}
				}
			})
		}
		else { //modificar
			let id = $("#modalForm").data("id");

			$.ajax({
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url: "causas/" + id,
				type: 'PUT',
				data: datos,
				dataType:'json',
				success: function(resp){
					if (! resp.success) {
						lib_ShowMensaje(resp.msg, 'error');
					}
					else {
						datatable.ajax.reload();
						lib_ShowMensaje(resp.msg);
					}
				}
			})
		}
	});

	// eliminar una causa
	$("#dt-causas tbody").on("click",".eliminar",function() {
		let data = datatable.row($(this).parents()).data();
		let id = data.id;

		lib_Confirmar("Seguro de ELIMINAR la Causa Nro. " + id + "?")
		.then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: "causas/" + id,
					type: 'DELETE',
					dataType:'json',
					success: function(resp){
						datatable.ajax.reload();
						lib_ShowMensaje(resp.msg);
					}
				})
			}
		})
	})
})

</script>
@endsection