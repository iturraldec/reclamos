<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aplicacion ">
    <meta name="author" content="Ing. Carlos iturralde&Christian xxx">
	 <meta name="csrf-token" content="{{ csrf_token() }}">

	 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link href="http://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
	 <link href="vendor/adminlte/dist/css/adminlte.css" rel="stylesheet">
	 <link href="vendor/jquery-datetimepicker/css/datetimepicker.min.css" rel="stylesheet">
	 <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="favicon/ico" />

	 <title>Clinica de Especialidades Médicas | Formulario de Reclamo</title>

	</head>
  <body>	
    
	 <main role="main" class="container">

	 <!-- encabezado -->
	 <div class="row my-3">
			<div class="col-10">
				<img src="assets/images/Banner principal_Hoja_de_reclamos-03.jpg" class="img-fluid">
			</div>
			<a href="login">Login</a>
		</div>

		<!-- datos del reclamo -->
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="card card-primary">
              <div class="card-header">
						<label>1. Datos del Reclamo</label>
              </div>
            	
					<div class="card-body">
						<div class="form-group">
							<label>Medio de Recepción</label>
							{{ Form::select('select-medio', $medios, null, ['id' => 'select-medio', 'class' => 'form-control']) }}
						</div>

                  <div class="form-group">
                    <label>* Hoja de Reclamaciones Nro.</label>
                    <div class="input-group input-group">
                  		<input type="text" id="input-hoja-nro" class="form-control" required maxlength="10" >
                		</div>
                  </div>
                  
						<div class="form-group">
							<label>Tipo de Administrado</label>
							<input type="text" id="input-tipo" class="form-control" value="IPRESS" readonly>
						</div>

						<div class="form-group">
							<label>Código de RENINPRESS</label>
							<input type="text" id="input-codigo" class="form-control" value="00012975" readonly>
						</div>

						<div class="form-group">
                  	<label>* Fecha de registro del reclamo</label>
                     <input type="text" class="form-control" id="input-recibido-at" required>
                	</div>

                </div>
                <!-- /.card-body -->
            </div>
			</div>
			</div>
		</div>
		<!-- /.card datos del paciente-->

	 	<!-- datos del paciente (usuario) -->
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="card card-primary">
              <div class="card-header">
						<label>2. Identificación del Usuario</label>
              </div>
            	
					<div class="card-body">
						<div class="form-group">
							<label>Tipo de Documento de Identidad</label>
							<select id="cbo_dip_tp1" class="form-control">
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
							<label>* Número del Documento</label>
							<div class="input-group input-group">
								<input type="text" id="dip1" class="form-control"  required>
								<!--span class="input-group-append">
										<button type="button" id="btn_buscar1" class="btn btn-info btn-flat">Buscar</button>
								</span-->
							</div>
						</div>
            
						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label>* Nombres</label>
									<input type="text" id="nombre1" class="form-control" readonly required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>* Apellido Paterno</label>
									<input type="text" id="apellido-paterno1" class="form-control" readonly required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Apellido Materno</label>
									<input type="text" id="apellido-materno1" class="form-control" readonly required>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>* Domicilio</label>
							<textarea id="dir1" class="form-control" required></textarea>
						</div>

						<div class="form-group">
							<label>* Correo Electrónico</label>
							<input type="email" id="email1" class="form-control">
						</div>

						<div class="form-group">
							<label>* Teléfono(s)</label>
							<input type="text" id="tlf1" class="form-control" required>
						</div>
                </div>
                <!-- /.card-body -->
            </div>
			</div>
		</div>
		<!-- /.card datos del paciente-->

		<!-- datos de quien entrega el reclamo (representante) -->
		<div class="row">
			<div class="col-10 mx-auto">
				<div id="card-autorizado" class="card card-primary">
					<div class="card-header">
						<label>3. Es el Paciente quien presenta el Reclamo?</label>
						<select id="cbo_autorizado" class="dropdown">
								<option value="Si">Si</option>
								<option value="No" selected>No</option>
						</select>
					</div>

					<div class="card-body">
						<div class="form-group">
							<label>* Tipo de Documento de Identidad</label>
							<select id="cbo_dip_tp2" class="form-control">
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
								<input type="text" id="dip2" class="form-control">
								<!--span class="input-group-append">
										<button type="button" id="btn_buscar2" class="btn btn-info btn-flat">Buscar</button>
								</span-->
							</div>
						</div>
                  
						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label>* Nombres</label>
									<input type="text" id="nombre2" class="form-control" readonly required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>* Apellido Paterno</label>
									<input type="text" id="apellido-paterno2" class="form-control" readonly required>
								</div>
							</div>

							<div class="col-4">
								<div class="form-group">
									<label>Apellido Materno</label>
									<input type="text" id="apellido-materno2" class="form-control" readonly required>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>* Domicilio</label>
							<textarea id="dir2" class="form-control"></textarea>
						</div>

						<div class="form-group">
							<label>* Correo Electrónico</label>
							<input type="email" id="email2" class="form-control">
						</div>

						<div class="form-group">
							<label>* Teléfono(s)</label>
							<input type="text" id="tlf2" class="form-control">
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- /.card datos de quien entrega-->

		<!-- reclamo -->
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="card card-primary">
					<div class="card-header">
						<label>4. Detalle del Reclamo</label>
					</div>

					<div class="card-body">
						<div class="form-group">
                  	<label>* Fecha de ocurrencia</label>
                     <input type="text" class="form-control" id="suceso_at">
                	</div>

						<div class="form-group">
							<label>* Descripción</label>
							<textarea id="reclamo" class="form-control" required></textarea>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- evidencia -->
		<form id="form-documentos" enctype="multipart/form-data">
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="card card-primary">
					<div class="card-header">
						<label>5. Evidencia(s)</label>
					</div>

					<div class="card-body">						
						<input type="file" id="input-file" name="documentos[]"/>
					</div>

					<div class="card-footer">
						<small>
							Tipos de archivos permitidos: PDF,JPG,JPEG,DOCX,XLSX (Máximo 5 MegaBytes de peso por archivo).
						</small>
					</div>
				</div>
			</div>
		</div>
		</form>

		<!-- enviar -->
		<div class="row">
			<div class="col-10 mx-auto">
				<div class="card card-primary">
					<div class="card-header">
						<label>6. Finalizar proceso de reclamo</label>
					</div>

					<div class="card-body">						
						<div class="checkbox">
							<input type="checkbox" id="send_mail" class="flat"> 
							AUTORIZO NOTIFICACIÓN DEL RESULTADO DEL RECLAMO AL E-MAIL CONSIGNADO.
						</div><br>
						<p class="font-italic font-weight-bold h6">* Campos obligatorios.</p>
					</div>
					<div class="mx-4">
						<p class="text-center">Las IAFAS, IPRESS O UGIPRESS deben atender el reclamo en un plazo de 30 días hábiles.</p>
						
						<p class="text-justify">
							"Estimado usuario: Usted puede presentar su denuncia ante Susalud ante hechos o actos que vulneren o pudieran vulnerar el derecho a la salud, o cuando no le hayan brindado un servicio, prestación o coberturas solicitada o recibidas de las IAFAS o IPRESS, o que dependan de la UGIPRESS pública, privada o mixtas. También ante la negativa de atención de su reclamo, irregularidad en su tratamiento o disconformidad con el resultado del mismo o hacer uso de los mecanismos alternativos de solución de controversias ante el Centro de Conciliación y Arbitraje - CECONAR de SUSALUD".<br>
							La Clínica de Especialidades Médicas se reserva el derecho de tomar acciones legales pertinentes en caso de verificarse la falsedad o inexactitud de las declaraciones realizadas.
						</p>

						<div class="checkbox text-justify">
							<input type="checkbox" id="chk_declaro" class="flat"> 
							<strong>Declaro que los datos consignados son reales.</strong>
						</div><br>

						<div class="checkbox text-justify">
							<input type="checkbox" id="chk_acepto" class="flat"> 
							<strong>He leido y acepto que mis datos personales sean tratados segun la Ley Nro. 29733, Ley de Protección de Datos Personales.</strong>
						</div>

						
					</div>
				</div>

				<div class="card-footer text-center border-primary  mb-5">
					<button id="enviar" class="btn btn-primary">Enviar Reclamo</button>
					<a href="{{ asset('storage/pdf/EMU-Consentimiento-de-Tratamiento-de-Datos-Personales.pdf') }} "  class="btn btn-primary" target="_blank">Reglamento</a>
				</div>
			</div>
		</div>
    
    </main><!-- /.container -->

	 <script src="vendor/jquery/jquery.min.js"></script>
	 <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	 <script src="vendor/jquery-datetimepicker/js/datetimepicker.full.min.js"></script>
	 <script src="vendor/adminlte/dist/js/adminlte.min.js"></script>
    <script src="vendor/sweetalert2/sweetalert2.all.min.js"></script>
	 <script src="vendor/multi-file/jquery.MultiFile.min.js"></script>
    <script src="assets/js/libreria.js"></script>

<script> 

$(document).ready(function () {
	const DNI = "DNI";
	const RUC = "RUC";
	const APP_URL = "{{ env('APP_URL') }}";

	// configuro la carga de archivos
	$('#input-file').MultiFile({
		"accept": "pdf|docx|xlsx|jpg|jpeg",
		"max_size": 5120,
		"STRING": {
			"remove": 'Eliminar',
			"denied": 'Tipo de archivo no valido: $ext!',
			"duplicate": 'Archivo duplicado: \n$file!'
		}
  });

	// define la fecha/hora del reclamo
	$('#input-recibido-at').datetimepicker({
		timepicker: false,
		format:'Y-m-d',
		"maxDate" : 0
	});

	// inicialmente expandido, un representante presenta el reclamo
	refresh_representante();

	// define la fecha del suceso 
	$('#suceso_at').datetimepicker({
		timepicker: false,
		format:'Y-m-d',
		"maxDate" : 0
	});

	$("#input-recibido-at").change(function(){
		$('#dip1').focus();
	});

	$("#suceso_at").change(function(){
		$('#reclamo').focus();
	});
	
	// al seleccionar el medio de recepcion del reclamo
	$("#select-medio").change(function() {
		if (this.value == 1) {
			$("#input-hoja-nro").val("");
			$("#input-hoja-nro").attr("readonly", true);
		}
		else {
			$("#input-hoja-nro").val("");
			$("#input-hoja-nro").attr("readonly", false);
		}
	});

	// mostrar/ocultar los datos del representante
	function refresh_representante() {
		$('#card-autorizado').CardWidget(($("#cbo_autorizado").val()) == "Si" ? 'collapse' : 'expand');
	}

	// al seleccionar el tipo de documento del paciente
	$("#cbo_dip_tp1").change(function(){
		$("#nombre1").attr('readonly', false);
		$("#apellido-paterno1").attr('readonly', false);
		$("#apellido-materno1").attr('readonly', false);
		$("#dir1").attr('readonly', false);
		$("#btn_buscar1").attr("disabled", false);
		if($(this).val() == DNI || $(this).val() == RUC) {
			$("#nombre1").attr('readonly', true);
			$("#apellido-paterno1").attr('readonly', true);
			$("#apellido-materno1").attr('readonly', true);
			if($(this).val() == RUC){
				$("#dir1").attr("readonly", true);
			}
		}
		else{
			$("#btn_buscar1").attr("disabled", true);
		}
	})

	// al seleccionar el tipo de documento del representante
	$("#cbo_dip_tp2").change(function(){
		$("#nombre2").attr('readonly', false);
		$("#apellido-paterno2").attr('readonly', false);
		$("#apellido-materno2").attr('readonly', false);
		$("#dir2").attr('readonly', false);
		$("#btn_buscar2").attr("disabled", false);
		if($(this).val() == DNI || $(this).val() == RUC) {
			$("#nombre2").attr('readonly', true);
			$("#apellido-paterno2").attr('readonly', true);
			$("#apellido-materno2").attr('readonly', true);
			if($(this).val() == RUC){
				$("#dir2").attr('readonly', true);
			}
		}
		else{
			$("#btn_buscar2").attr("disabled", true);
		}
	})

	// busqueda del dip del paciente
	$("#dip1").keyup(function() {
      let tipoDocumento = $("#cbo_dip_tp1").val();
      let valor = $("#dip1").val();

      if (lib_isEmpty(valor)) {
         lib_ShowMensaje("Debe ingresar un numero de documento.", "error");
         return;
      }
      if (tipoDocumento == DNI) {
         let url = 'https://apiperu.dev/api/dni/' + valor;

			$.ajax({
				url: url,
				headers: {
					"Authorization": "Bearer a3dae45c76f03dec347ed5e380387d3e31a8f9334720b481caf6d477e1a9e838"
				},
				dataType: 'json',
				success: function(data) {
								if(data.success){
									$("#nombre1").val(data.data.nombres);
									$("#apellido-paterno1").val(data.data.apellido_paterno);
									$("#apellido-materno1").val(data.data.apellido_materno);
								}
								else{
									$("#nombre1").val('');
									$("#apellido-paterno1").val('');
									$("#apellido-materno1").val('');
										//lib_ShowMensaje("DNI no valido.", 'error');
								}
							},
				error: function(data) {
							//lib_ShowMensaje("Error del Servidor DNI/RUC.", 'error');
						}
			})
      }
      else if (tipoDocumento == RUC) {
         let url = 'https://apiperu.dev/api/ruc/' + valor;

			$.ajax({
				url: url,
				headers: {
					"Authorization": "Bearer a3dae45c76f03dec347ed5e380387d3e31a8f9334720b481caf6d477e1a9e838"
				},
				dataType: 'json',
				success: function(data) {
								if(data.success){
									$("#nombre1").val(data.data.nombre_o_razon_social);
									$("#apellido-paterno1").val('');
									$("#apellido-materno1").val('');
									$("#dir1").val(data.data.direccion_completa);
								}
								else{
									$("#nombre1").val('');
									$("#apellido-paterno1").val('');
									$("#apellido-materno1").val('');
									//lib_ShowMensaje("RUC no valido.", 'error');
								}
							},
				error: function(data) {
							//lib_ShowMensaje("Error del Servidor DNI/RUC.", 'error');
						}
			})
      }
  })
	
	// usuario que entrega el reclamo
	$("#cbo_autorizado").change(function(){
      refresh_representante();
  })

	// busqueda de dip del representante
	$("#dip2").keyup(function() {
		let tipoDocumento = $("#cbo_dip_tp2").val();
		let valor = $("#dip2").val();

		if (lib_isEmpty(valor)) {
				lib_ShowMensaje("Error: Debe ingresar un numero de documento.", 'error');
				return;
		}
		if (tipoDocumento == DNI) {
				let url = 'https://apiperu.dev/api/dni/' + valor;

			$.ajax({
				url: url,
				headers: {
					"Authorization": "Bearer a3dae45c76f03dec347ed5e380387d3e31a8f9334720b481caf6d477e1a9e838"
				},
				dataType: 'json',
				success: function(data) {
								if(data.success){
									$("#nombre2").val(data.data.nombres);
									$("#apellido-paterno2").val(data.data.apellido_paterno);
									$("#apellido-materno2").val(data.data.apellido_materno);
								}
								else{
									$("#nombre2").val('');
									$("#apellido-paterno2").val('');
									$("#apellido-materno2").val('');
									//lib_ShowMensaje("DNI no valido.", 'error');
								}
							},
				error: function(data) {
							//lib_ShowMensaje("Error del Servidor DNI/RUC.",'error');
						}
			})}
		else if (tipoDocumento == RUC) {
				let url = 'https://apiperu.dev/api/ruc/' + valor;

		$.ajax({
			url: url,
			headers: {
				"Authorization": "Bearer a3dae45c76f03dec347ed5e380387d3e31a8f9334720b481caf6d477e1a9e838"
			},
			dataType: 'json',
			success: function(data) {
							if(data.success){
								$("#nombre2").val(data.data.nombre_o_razon_social);
								$("#apellido-paterno2").val('');
								$("#apellido-materno2").val('');
								$("#dir2").val(data.data.direccion_completa);
							}
							else{
								$("#nombre2").val('');
								$("#apellido-paterno2").val('');
								$("#apellido-materno2").val('');
								//lib_ShowMensaje("RUC no valido.",'error');
							}
						},
			error: function(data) {
						//lib_ShowMensaje("Error del Servidor DNI/RUC.", 'error');
					}})
		}
	})

	// recibir correo de la clinica
	$("#send_mail").on("click", function() {
		if ($(this).is(":checked") && lib_isEmpty($("#email1").val())) {
			lib_ShowMensaje('Debe ingresar la dirección de correo electrónico.', 'error');
			$(this).prop("checked", false);
		}
	});

   // enviar los datos
	$("#enviar").click(function() {
		if(! $("#chk_declaro").prop('checked') || ! $("#chk_acepto").prop('checked')) {
			lib_ShowMensaje('Debe aceptar los terminos y condiciones.', 'error');
			return;
		}

		let representante = null;
		let datos = null;
		let dip1 = $("#dip1").val();
		let nombre1 = $("#nombre1").val();
		let apellido_paterno1 = $("#apellido-paterno1").val();
		let apellido_materno1 = $("#apellido-materno1").val();
		let dir1 = $("#dir1").val();
		let email1 = $("#email1").val();
		let tlf1 = $("#tlf1").val();
		let fecha = $("#suceso_at").val();
		let send_mail = ($("#send_mail").prop( "checked" )) ? 1 : 0;

		// valido los datos del paciente
		if (lib_isEmpty(dip1)) {
			lib_ShowMensaje('Debe ingresar su número de identificación.', 'error');
			return;
		}
		else if (lib_isEmpty(nombre1)) {
			lib_ShowMensaje('Debe ingresar su nombre.', 'error');
			return;
		}
		else if (lib_isEmpty(apellido_paterno1)) {
			lib_ShowMensaje('Debe ingresar su nombre.', 'error');
			return;
		}
		else if (lib_isEmpty(dir1)) {
			lib_ShowMensaje('Debe ingresar su dirección.', 'error');
			return;
		}
		else if (lib_isEmpty(tlf1)) {
			lib_ShowMensaje('Debe ingresar un número de contacto.', 'error');
			return;
		}
		else if (lib_isEmpty(fecha)) {
			lib_ShowMensaje('Debe ingresar la fecha del suceso.', 'error');
			return;
		}
		else if (lib_isEmpty(reclamo)) {
			lib_ShowMensaje('Debe ingresar la razón de su reclamo.', 'error');
			return;
		}
		
		// valido los datos del representante del paciente, si tiene
		if($("#cbo_autorizado").val() == 'No') {
			let dip2 = $("#dip2").val();
			let nombre2 = $("#nombre2").val();
			let apellido_paterno2 = $("#apellido-paterno2").val();
			let apellido_materno2 = $("#apellido-materno2").val();
			let dir2 = $("#dir2").val();
			let email2 = $("#email2").val();
			let tlf2 = $("#tlf2").val();

			if (lib_isEmpty(dip2)) {
				dip2 = "00000000";
			}
			else if (lib_isEmpty(nombre2)) {
				lib_ShowMensaje('Debe ingresar el nombre del representante.', 'error');
				return;
			}
			else if (lib_isEmpty(dir2)) {
				lib_ShowMensaje('Debe ingresar la dirección del representante.', 'error');
				return;
			}
			else if (lib_isEmpty(email2)) {
				lib_ShowMensaje('Debe ingresar la dirección de correo electrónico del representante.', 'error');
				return;
			}
			else if (lib_isEmpty(tlf2)) {
				lib_ShowMensaje('Debe ingresar el número de contacto del representante.', 'error');
				return;
			}
			
			representante = {
				"dip_tp2": $("#cbo_dip_tp2").val(),
				"dip2": dip2,
				"nombre2": nombre2,
				"apellido_paterno2": apellido_paterno2,
				"apellido_materno2": apellido_materno2,
				"dir2": dir2,
				"email2": email2,
				"tlf2": tlf2,
      }
		}

		datos = {
			"dip_tp1": $("#cbo_dip_tp1").val(),
			"dip1": dip1,
			"nombre1": $("#nombre1").val(),
			"apellido_paterno1": apellido_paterno1,
			"apellido_materno1": apellido_materno1,
			"dir1": $("#dir1").val(),
			"email1": $("#email1").val(),
			"tlf1": $("#tlf1").val(),
			"reclamo": $("#reclamo").val(),
			"representante": representante,
			"suceso_at": fecha,
			"send_mail": send_mail,
			'medio_recepcion_id': $("#select-medio").val(),
			'hoja_nro': $("#input-hoja-nro").val(),
			'recibido_at': $("#input-recibido-at").val(),
    }

		let miSweet = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			icon: 'info'
		}).fire("Grabando datos...");

		$.ajax({
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    	},
			url: "{{ Route('reclamo.store') }}",
			type: 'POST',
			data: datos,
			dataType: 'json',
			success: function(resultado) { 
				// si tiene documentacion...la envio
				if ($('input[type=file]')[0].files.length) {
					let documentos = new FormData($('#form-documentos')[0]);

					$.ajax({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						url: "documentos/store/" + resultado.id,
						type: 'POST',
						data: documentos,
						async: false, 
						cache: false, 
						contentType: false, 
						processData: false,
						dataType: 'json',
						error: function(r) {
									lib_ShowMensaje("Error inesperado en servidor!", 'error');
						}
					})
				}
				
				miSweet.close();

				alert("Su reclamo quedo registrado");
				location.href = APP_URL;
			}
		})
	})
})

</script>
 
  </body>
</html>
