@extends('adminlte::page')

@section('title', 'Estados de los Reclamos')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Estados de los Reclamos</h1>
@stop

@section('content')
	<div class="row justify-content-center">
		<div class="col col-lg-8">
			<div class="row">
				<div class="col col-lg-10 form-group float-right">
					<label for="input_codigo">Estado del Reclamo</label>
					<input type="text" id="input_estado" class="form-control">
				</div>
				<p>
					<button type="button" id="btn_agregar" class="btn btn-primary float-right">
						Agregar
					</button>
				</p>
			</div>

			<table id="dt-estados" class="table table-hover border border-dark">
				<thead class="thead-dark text-center">
					<tr>
						<th scope="col" class="col-sm-1">ID</th>
						<th scope="col">Nombre</th>
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
		  data-id=""
		  tabindex="-1" 
		  aria-labelledby="staticBackdropLabel" 
		  aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTitle">Actualizar Estado del Reclamo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body form-group">					
					<label for="input_model_estado">Estado del Reclamo</label>
					<input type="text" id="input_model_estado" class="form-control">
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
	let datatable = $('#dt-estados').DataTable({
			"ajax": "{{ route('estados.load-data') }}",
			"columns": [
				{"data": "id", "orderable": false},
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

	// boton agregar un estado
	$("#btn_agregar").click(function() {
		let nombre = $("#input_estado").val();

		if (lib_isEmpty(nombre)) {
			lib_ShowMensaje("Debes especificar el Estado del Reclamo.", "error");
			return;
		}
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: "{{ route('estados.store') }}",
			type: 'POST',
			data: {"nombre" : nombre},
			dataType:'json',
			success: function(resp){
				if (! resp.success) {
					lib_ShowMensaje(resp.msg, 'error');
				}
				else {
					$("#input_estado").val("");
					datatable.ajax.reload();
					lib_ShowMensaje(resp.msg);
				}
			}
		})
	});

	// boton editar un estado del reclamo
	$("#dt-estados tbody").on("click", ".editar", function() {
		let data = datatable.row($(this).parents()).data();
		
		$("#modalForm").data("id", data.id);
		$("#input_model_estado").val(data.nombre);
	})

	// grabar
	$("#btn_grabar").click(function(){
		let id = $("#modalForm").data("id");
		let nombre = $("#input_model_estado").val();

		if (lib_isEmpty(nombre)) {
			lib_ShowMensaje("Debes especificar el Estado del Reclamo.", "error");
			return;
		}

		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: "estados/" + id,
			type: 'PUT',
			data: {"nombre" : nombre},
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
	});

	// eliminar un estado
	$("#dt-estados tbody").on("click",".eliminar",function() {
		let data = datatable.row($(this).parents()).data();
		let id = data.id;
		console.log(id);

		lib_Confirmar("Seguro de ELIMINAR el Estado Nro. " + id + "?")
		.then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: "estados/" + id,
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