@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Listado de Usuarios')

@section('content_header')
    <h1>Listado de Usuarios</h1>
@endsection

@section('content')
	<div class="row mb-2">
		<div class="col">
			<button type="button" 
					id="btn_agregar"
					class="btn btn-primary"
					data-toggle="modal" 
					data-target="#modalForm">
				Agregar
			</button>
		</div>
	</div>

	<table id="dt-usuarios" class="table table-hover border border-dark">
		<thead class="thead-dark text-center small">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Doc. Tipo</th>
				<th scope="col">Doc. Nro.</th>
				<th scope="col">Usuario</th>
				<th scope="col">Correo</th>
				<th scope="col" class="col-sm-2">Acción</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>

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
					<h5 class="modal-title" id="modalTitle">Agregar Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body form-group">
					<div class="form-group">
						<label>Tipo de Documento de Identidad</label>
						<select id="cbo_dip_tp" class="form-control">
							<option value="DNI" selected>DNI</option>
							<option value="CDE">Carné de Extranjería</option>
							<option value="PASAPORTE">Pasaporte</option>
							<option value="DIE">Documento de identidad extranjero</option>
							<option value="CUI">Código unico de identificación (CUI)</option>
							<option value="CNV">Certificado de nacido vivo</option>
							<option value="PTP">Permiso temporal de permanencia</option>
							<option value="RUC">RUC</option>
							<option value="OTROS">Otros</option>
						</select>                  
					</div>
					
					<div class="form-group">
						<label>Número del Documento</label>
						<div class="input-group input-group">
							<input type="text" id="dip" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label>Usuario</label>
						<div class="input-group input-group">
							<input type="text" id="name" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label>Correo Electrónico</label>
						<div class="input-group input-group">
							<input type="email" id="email" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label>Password</label>
						<div class="input-group input-group">
							<input type="password" id="pwd" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label>Repita Password</label>
						<div class="input-group input-group">
							<input type="password" id="pwd2" class="form-control" required>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" id="btn-grabar" class="btn btn-danger">Grabar</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
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
	let datatable = $('#dt-usuarios').DataTable({
			"ajax": "{{ route('user.load-data') }}",
			"columns": [
				{"data": "id", 
					visible: false
				},
				{"data": "dip_tp",
					"orderable": false,
					"width":"5%",
				},
				{"data": "dip",
					"orderable": false,
					"width":"10%",
				},
				{"data": "name",
					"width":"20%"
				},
				{"data": "email",
					"orderable": false,
					"width":"30%",
				},
				{"data":null,
					"width":"20%",
					"orderable": false,
					"render": function ( data, type, row, meta ) {
								let btn_del = '<button type="button" class="del btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';

								return btn_del;
							},
				}
			]
	});

	// boton agregar un usuario
	$("#btn_agregar").click(function() {
		$("#cbo_dip_tp").val("")
		$("#dip").val("");
		$("#email").val("");
		$("#name").val("");
		$("#pwd").val("");
		$("#pwd2").val("");
	});

	// enviar los datos
	$("#btn-grabar").click(function() {
		let dip_tp = $("#cbo_dip_tp").val();
		let dip = $("#dip").val();
		let name = $("#name").val();
		let email = $("#email").val();
		let pwd = $("#pwd").val();
		let pwd2 = $("#pwd2").val();

		// valido los datos del usuario
		if (lib_isEmpty(dip)) {
			lib_ShowMensaje('Debe ingresar el número de identificación del Usuario.', 'error');
			return;
		}
		else if (lib_isEmpty(name)) {
			lib_ShowMensaje('Debe ingresar el nombre del Usuario.', 'error');
			return;
		}
		else if (lib_isEmpty(email)) {
			lib_ShowMensaje('Debe ingresar correo electrónico del Usuario.', 'error');
			return;
		}
		else if (lib_isEmpty(pwd)) {
			lib_ShowMensaje('Debe ingresar la clave de Usuario.', 'error');
			return;
		}
		else if (pwd != pwd2) {
			lib_ShowMensaje('La clave de Usuario no coincide.', 'error');
			return;
		}

		// envio lo datos
		$.ajax({
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
			url: "{{ Route('user.store') }}",
			type: 'POST',
			data: {
				"dip_tp": dip_tp,
				"dip":dip,
				"name":name,
				"email": email,
				"pwd":pwd
			},
			dataType: 'json',
			error: function() {
						lib_ShowMensaje("Algo ha fallado al ingresar el Usuario.", 'error');
					 },
			success: function(resultado) {
				$('#modalForm').modal('toggle');
				datatable.ajax.reload();
				lib_ShowMensaje("Usuario agregado.");
			}
		})
	});

	// boton eliminar
	$("#dt-usuarios tbody").on("click", ".del", function() {
		let data = datatable.row($(this).parents()).data();

		lib_Confirmar("Seguro de ELIMINAR el Usuario: " + data.name + "?")
		.then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					url: data.id,
					type: 'DELETE',
					dataType:'json',
					success: function(resp){
						datatable.ajax.reload();
						lib_ShowMensaje(resp.msg);
					}
				})
			}
		})
	});
})
</script>
@endsection
