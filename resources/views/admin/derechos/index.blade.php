@extends('adminlte::page')

@section('title', 'Derechos en Salud')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Derechos en Salud</h1>
@stop

@section('content')
	<div class="row justify-content-center">
		<div class="col col-lg-8">
		<div class="row">
			<div class="col form-group float-right">
				<input type="text" id="input_add_derecho" class="form-control">
			</div>
			<span>
				<button type="button" id="btn_agregar" class="btn btn-primary form-control">Agregar</button>
			</span>
   	</div>

			<table id="dt-derechos" class="table table-hover border border-dark">
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
	<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Actualizar Derecho en Salud</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body form-group">
					<input type="text" id="input_upd_derecho" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="button" id="btn_actualizar" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
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
	let datatable = $('#dt-derechos').DataTable({
			"ajax": "{{ route('derechos.load-data') }}",
			"columns": [
				{"data": "id", "orderable": false},
				{"data": "nombre"},
				{"data":null,
				"render": function ( data, type, row, meta ) {
								let btn_editar = '<button type="button" class="editar btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-edit"></i></button>';
								let btn_eliminar = '<button class="btn btn-danger  btn-sm eliminar"><i class="fas fa-trash-alt"></i></button>';
								
								return  btn_editar + btn_eliminar;
							},
				"orderable": false
				}
			]
	})
	
	// agregar un derecho
	$("#btn_agregar").click(function(){
		let derecho = $("#input_add_derecho").val();

		if (lib_isEmpty(derecho)) {
			lib_ShowMensaje("Debes especificar un Derecho en Salud.", "error");
			return;
		}
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: "{{ route('derechos.store') }}",
			type: 'POST',
			data: {'nombre':derecho},
			dataType:'json',
			success: function(resp){
				if (! resp.success) {
					lib_ShowMensaje(resp.msg, 'error');
				}
				else {
					$("#input_add_derecho").val('');
					datatable.ajax.reload();
					lib_ShowMensaje(resp.msg);
				}
			}
		});
	});

	// muestra el modal para editar un derecho
	$("#dt-derechos tbody").on("click", ".editar", function() {
		let data = datatable.row($(this).parents()).data();

		$("#input_upd_derecho").val(data.nombre);
		$("#input_upd_derecho").data("id",data.id);
	})

	// actualizar el derecho en salud
	$("#btn_actualizar").click(function() {
		let derecho = $("#input_upd_derecho").val(),
			id = $("#input_upd_derecho").data("id");

		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: "derechos/" + id,
			type: 'PUT',
			data: {'nombre':derecho},
			dataType:'json',
			success: function(resp){
				datatable.ajax.reload();
				lib_ShowMensaje(resp.msg);
			}
		})
	});

	// eliminar un derecho en salud
	$("#dt-derechos tbody").on("click",".eliminar",function() {
		let data = datatable.row($(this).parents()).data();
		let id = data.id;

		lib_Confirmar("Seguro de ELIMINAR el Derecho Nro. " + id + "?")
		.then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: "derechos/" + id,
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