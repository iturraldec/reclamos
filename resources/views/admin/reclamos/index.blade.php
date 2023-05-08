@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('plugins.DatatablesButtons', true)

@section('title', 'Listado de Reclamos Registrados')

@section('content_header')
    <h1>Listado de Reclamos Registrados</h1>
@endsection

@section('content')
<style type="text/css">
	.truncate {
		max-width:200px;
	  	white-space: nowrap;
	  	overflow: hidden;
	  	text-overflow: ellipsis;
	}
</style>
	<table id="dt-reclamos" class="table table-hover border border-dark">
		<thead class="thead-dark text-center small">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">HR Nro.</th>
				<th scope="col">Doc. Tipo</th>
				<th scope="col">Nro. de Documento</th>
				<th scope="col">Reclamante/Afectado</th>
				<th scope="col">Detalle del Reclamo</th>
				<th scope="col">Estado</th>
				<th scope="col">Fecha Registro</th>
				<th scope="col">Fecha de Vencimiento</th>
				<th scope="col">Fecha de Resultado</th>
				<th scope="col">Alerta</th>
				<th scope="col" class="col-sm-2">Acción</th>
			</tr>
		</thead>
		<tbody class="small">

		</tbody>
	</table>
	
	<!-- info -->
	<div class="card mt-4">
		<div class="card-body">
			<div class="row">
				
				<div class="col-lg-2 text-center">
					<svg width="20" height="20"> 
						<circle cx="10" cy="10" r="10" fill="blue"/> 
					</svg>
					<p><strong>Atendido</strong></p>
				</div>
				<div class="col-lg-2 text-center">
					<svg width="20" height="20"> 
						<circle cx="10" cy="10" r="10" fill="red"/> 
					</svg>
					<p><strong>Días de Retraso Mayor a 0</strong></p>
				</div>
				<div class="col-lg-2 text-center">
					<svg width="20" height="20"> 
						<circle cx="10" cy="10" r="10" fill="yellow"/> 
					</svg>
					<p><strong>De 1 a 3 días disponibles</strong></p>
				</div>
				<div class="col-lg-2 text-center">
					<svg width="20" height="20"> 
						<circle cx="10" cy="10" r="10" fill="#FFC0CB"/> 
					</svg>
					<p><strong>De 4 a 10 días disponibles</strong></p>
				</div>
				<div class="col-lg-2 text-center">
					<svg width="20" height="20"> 
						<circle cx="10" cy="10" r="10" fill="#FF8000"/> 
					</svg>
					<p><strong>De 11 a 19 días disponibles</strong></p>
				</div>
				<div class="col-lg-2 text-center">
					<svg width="20" height="20"> 
						<circle cx="10" cy="10" r="10" fill="green"/> 
					</svg>
					<p><strong>De 20 o más días disponibles</strong></p>
				</div>

			</div>
		</div>
	</div>

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('assets/js/libreria.js') }}"></script>

<script>
	$(document).ready(function () {
		// hoy
		let hoy = new Date();

		// retorna los dias de diferencia entre hoy y la fecha recibida (futuro)
		// solo tomara en consideracion los dias laborales
		function get_dias_diff(fecha) {

			let futuro = new Date(fecha + "T00:00:00");
			if (hoy.getTime() >= futuro.getTime()) {
				return 0;
			}
			else {
				let difference = futuro.getTime() - hoy.getTime();
				let dias = Math.round(difference/(1000 * 3600 * 24));

				return dias;
			}
		}

		// datatable
		let datatable = $('#dt-reclamos').DataTable({
				"ajax": "{{ route('reclamos.load-data') }}",
				dom: "<'row'<'col-4'l><'col-4'f><'col-4'B>>t<'row'<'col-6'i><'col-6'p>>",
				buttons: [
					{
            		"extend": 'excel',
            		"text": 'Exportar a Excel',
						"className": 'btn btn-primary'
        			}
				],
				"columnDefs":[{targets:5,className:"truncate"}],
				"columns": [
					{"data": "id", 
						visible: false
					},
					{"data": "hoja_nro",
						"width":"5%",
					},
					{"data": "user.dip_tp",
						"orderable": false,
						"width":"5%",
					},
					{"data": "user.dip",
						"orderable": false,
						"width":"10%",
					},
					{"data": "user.name",
						"width":"20%"
					},
					{"data": "descripcion",
						"orderable": false,
						"width":"30%",
					},
					{"data":null,
					 "render": function ( data, type, row, meta ) {
									return (typeof row.estado.nombre == 'undefined') ? '' : row.estado.nombre;
						}
					},
					{"data": "recibido_at",
						"width":"5%",
					},
					{"data": "respuesta_at",
						"width":"5%",
					},
					{"data": "resuelto_at",
						"width":"5%",
					},
					{"data": null,
						"orderable": false,
						"width":"3%",
						"render": function(data, type, row, meta) {
										let color = 'blue';

										if (row.resuelto_at === null) { // el caso no esta resulto
											let dias = get_dias_diff(row.respuesta_at);
											
											if (dias <= 0) {
												color = 'red';
											}
											else if (dias >= 1 && dias <= 3) { 		// amarillo
												color = 'yellow';
											}
											else if (dias >= 4 && dias <= 10) { 	// rosado
												color = '#FFC0CB';
											}
											else if (dias >= 11 && dias <= 19) { 	// naranja
												color = '#FF8000';
											}
											else {											// verde
												color = 'green';
											}
										}
									circulo = '<svg width="30" height="30"> <circle cx="10" cy="10" r="10" fill="' + color + '"/> </svg>';
									return circulo;
						}
					},
					{"data":null,
						"width":"20%",
						"orderable": false,
						"render": function ( data, type, row, meta ) {
									let btn_ver = '<a href="reclamos/show/' + row.id + '" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></a>';
									let btn_edit = '<a href="reclamos/edit/' + row.id + '" class="btn btn-primary btn-sm"><i class="fas fa-check-circle"></i></a>';
									let btn_del = '<button type="button" class="del btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';

									return  btn_ver + btn_edit + btn_del;
								},
					}
				]
		});

		// boton del
		$("#dt-reclamos tbody").on("click", ".del", function() {
			let data = datatable.row($(this).parents()).data();

			lib_Confirmar("Seguro de BORRAR el Reclamo Nro. " + data.hoja_nro + "?")
			.then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						url: "reclamos/" + data.id,
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
