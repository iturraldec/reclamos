@extends('adminlte::page')

@section('title', 'Origen de los Reclamos')

@section('plugins.Datatables', true)

@section('plugins.Dt-select', true)

@section('content_header')
    <h1>Origen de los Reclamos</h1>
@stop

@section('content')
	<!-- tabla maestro -->
	<div class="row justify-content-center">
		<div class="col col-lg-8">
			<div class="float-left">
				<h4>Area Vinculada</h4>
			</div>

			<div class="float-right">
				<button type="button" 
						  id="btn_agregar_area" 
						  class="btn btn-primary"
						  data-toggle="modal" 
						  data-target="#modalForm">
					Agregar
				</button>
			</div>

			<div class="mt-5">
				<table id="dt-areas" class="table table-hover border border-dark">
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
	</div>

	<!-- tabla detalle -->
	<div class="row justify-content-center mt-5">
		<div class="col col-lg-8">
			<div class="float-left">
				<h4>Origen de los Reclamos</h4>
			</div>
			
			<span class="float-right">
			<button type="button" 
						  id="btn_agregar_origen" 
						  class="btn btn-primary">
					Agregar
				</button>
			</span>

			<div class="mt-5">
				<table id="dt-origenes" class="table table-hover border border-dark">
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

				<div class="modal-body">					
					<label for="input_texto" id="modalLabel" class="modalLabel"></label>
					<input type="text" id="input_texto" class="form-control">
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
	// id del registro padre (area del origen del reclamo)
	let area_id = 0;

	// datatable (areas)
	let datatable = $('#dt-areas').DataTable({
			"select": 'single',
			"ajax": "{{ route('origenes.load-data') }}",
			"columns": [
				{"data": "id", visible: false},
				{"data": "nombre", "width":"80%"},
				{"data":null,
				"render": function ( data, type, row, meta ) {
								let btn_editar = '<button type="button" class="editar btn btn-primary btn-sm" data-toggle="modal" data-target="#modalForm"><i class="fas fa-edit"></i></button>';
								let btn_eliminar = '<button class="eliminar btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';

								return  btn_editar + btn_eliminar;
							},
				"orderable": false
				}
			]
		});
	
	// datatabler (origenes)
	let datatabler = $('#dt-origenes').DataTable({
			"ajax": { 
				"url": "{{ route('origenes.load-datar') }}",
				"data": function(d){
         				d.area_id = area_id;
      		}
			},
			"columns": [
				{"data": "id", "orderable": false, visible: false},
				{"data": "nombre", "width":"50%"},
				{"data":null,
				"render": function ( data, type, row, meta ) {
								let btn_editar = '<button type="button" class="editarr btn btn-primary btn-sm" data-toggle="modal" data-target="#modalForm"><i class="fas fa-edit"></i></button>';
								let btn_eliminar = '<button class="eliminarr btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
								
								return  btn_editar + btn_eliminar;
							},
				"orderable": false
				}
			]
		});
	
	// boton agregar area
	$("#btn_agregar_area").click(function() {
		$("#modalForm").data("tipo", "aarea");
		$("#modalTitle").html("Agregar Area");
		$("#modalLabel").html("Nombre del Area");
		$("#input_texto").val("");
	});

	// al seleccionar un area
	$("#dt-areas tbody").on("click", "tr", function() {
		let fila = datatable.rows(this).data()[0];

		area_id = fila.id;
		datatabler.ajax.reload();
	})

	// boton agregar origen
	$("#btn_agregar_origen").click(function(event) {
		if (area_id == 0) {
			lib_ShowMensaje("Debes seleccionar un Area.", "error");
		}
		else {
			$("#modalForm").data("tipo", "aorigen");
			$("#modalTitle").html("Agregar Origen");
			$("#modalLabel").html("Nombre del Origen");
			$("#input_texto").val("");
			$('#modalForm').modal({show:true});
		}
	});

	// editar areas
	$("#dt-areas tbody").on("click",".editar",function() {
		let data = datatable.row($(this).parents()).data();

		$("#modalForm").data("tipo", "earea");
		$("#modalForm").data("id", data.id);
		$("#modalTitle").html("Editar Area");
		$("#modalLabel").html("Area a modificar");
		$("#input_texto").val(data.nombre);
	});

	// editar origenes
	$("#dt-origenes tbody").on("click",".editarr",function() {
		let data = datatabler.row($(this).parents()).data();

		$("#modalForm").data("tipo", "eorigen");
		$("#modalForm").data("id", data.id);
		$("#modalTitle").html("Editar Origen");
		$("#modalLabel").html("Origen a modificar");
		$("#input_texto").val(data.nombre);
	});

	// boton grabar area/origen
	$("#btn_grabar").click(function() {
		let nombre = $("#input_texto").val();
		let tipo = $("#modalForm").data("tipo");

		if (lib_isEmpty(nombre)) {
			lib_ShowMensaje("Debes especificar la información a agregar/modificar.", "error");
			return;
		}
		if (tipo === 'aarea' || tipo === 'aorigen') { // si estoy agregando
			let url = "{{ route('origenes.store') }}";
			let datos = {
					'tipo': tipo,
					'nombre': nombre
				};

			if (tipo === 'aorigen') {
				datos.area_id = area_id;
			}
			$.ajax({
				"headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				"url": url,
				"type": 'POST',
				"data": datos,
				"dataType":'json',
				"success": function(resp){
					if (! resp.success) {
						lib_ShowMensaje(resp.msg, 'error');
					}
					else {
						if (tipo == 'aarea') {
							datatable.ajax.reload();
						}
						else {
							datatabler.ajax.reload();
						}
						lib_ShowMensaje(resp.msg);
					}
				}
			})
		}
		else {	// si estoy modificando
			$.ajax({
				"headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				"url": "origenes/" + $("#modalForm").data("id"),
				"type": 'PUT',
				"data": {"nombre": $("#input_texto").val()},
				"dataType":'json',
				"success": function(resp){
					if (! resp.success) {
						lib_ShowMensaje(resp.msg, 'error');
					}
					else {
						if ($("#modalForm").data("tipo") == 'earea') {
							datatable.ajax.reload();
						}
						else {
							datatabler.ajax.reload();
						}
						lib_ShowMensaje(resp.msg);
					}
				}
			})
		}
	});

	// eliminar un area del reclamo
	$("#dt-areas tbody").on("click",".eliminar",function() {
		let data = datatable.row($(this).parents()).data();
		let id = data.id;
		let area = data.nombre;

		lib_Confirmar("Se eliminaran también los Origenes relacionados a: " + area + "?")
		.then((result) => {
			if (result.isConfirmed) {
				eliminar('area', id);
			}
		})
	});

	// eliminar un origen de reclamo
	$("#dt-origenes tbody").on("click",".eliminarr",function() {
		let data = datatabler.row($(this).parents()).data();
		let id = data.id;
		let origen = data.nombre;

		lib_Confirmar("Seguro de eliminar el Origen: " + origen + "?")
		.then((result) => {
			if (result.isConfirmed) {
				eliminar('origen', id);
			}
		})
	});

	// eliminar
	function eliminar(tipo, id) {
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: "origenes/" + id,
			type: 'DELETE',
			dataType:'json',
			success: function(resp) {
							if (tipo === 'area') {
								datatable.ajax.reload();
								datatabler.clear();
								datatabler.draw();
							}
							else {
								datatabler.ajax.reload();
							}
							lib_ShowMensaje(resp.msg);
						}
		})
	}
})

</script>
@endsection