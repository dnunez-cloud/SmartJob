<!DOCTYPE html>
<html lang="es">
	<head>
    <title>Clientes</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styleCliente.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="ajaxCliente.js"></script>
	</head>
	<body>
    <header>
      <nav>
        <h2>Clientes</h2>
      </nav>
    </header>
    <div id="contenedor">
      <div id="inscribir">
        <section class="widget11">
          <h4 class="widget11titulo">Gestionar cliente</h4>
          <form onsubmit="return true">
            <label style="padding:10px;"> Filtrar cliente por Dni o Nombre:</label>
            <input type="text" id="busquedaDni" name="busquedaDni" tabindex= "0" size="20" placeholder="Solo para búsqueda por dni" autocomplete= "off" onkeyup="BuscarDni()">
					  <hr>
            <label style="padding:10px;"> Buscar cliente por código:</label>
            <input type="text" id="id" name="id" tabindex= "0" size="20" autocomplete= "off" placeholder="Solo para búsqueda por codigo" onkeyup="Buscar()">
						<label style="padding:10px;"> Apellido y nombre:</label>
            <input type="text" id= "apellido_nombre" name="apellido_nombre" autocomplete= "off" size="20" >
						<label style="padding:10px;"> Dni:</label>
            <input type="text" id= "dni" name="dni" autocomplete= "off" size="20">
						<label style="padding:10px;"> Telefono:</label>
            <input type="text" id="telefono" name="telefono" autocomplete= "off" size="20">
						<label style="padding:10px;"> Direccion:</label>
            <input type="text"id="direccion" name="direccion" autocomplete= "off" size="20">
            <label style="padding:10px;"> Email:</label>
            <input type="text"id="email" name="email" autocomplete= "off" size="20">
          </form>
          <button  onclick= "validarRegistro()"id="registrar"name= "registrar"tabindex="7"value="registrar">Guardar</button>
          <button  onclick="validarModificacion()"id="modificar"name="modificar"tabindex="8"value="modificar">Modificar</button>
          <button  onclick="confirmarEliminar()"id="eliminar" name="eliminar" tabindex="9"value="eliminar">Eliminar</button>
        </section>
      </div>  
      <div id="consultar">
        <section class="widget12">
          <h4 class="widgettitulo">Clientes</h4>
          <div class="datagrid1" id="datagrid1" onclick="Colorear();" >      
          </div>  
        </section>
      </div>
		</div>
    <script>
			function validarRegistro() {
				var textoApellido = document.getElementById('apellido_nombre').value;
        var textoDni = document.getElementById('dni').value;
				var textoTelefono = document.getElementById('telefono').value;
				var textoDireccion = document.getElementById('direccion').value;
        var textoEmail = document.getElementById('email').value;
        if (textoApellido.length == 0 || textoDni.length == 0 || textoTelefono.length == 0 || textoDireccion.length == 0 || textoEmail.length == 0) {
					alert ("Alguno de los campos está vacío");
				}
        else if (isNaN(textoDni) || isNaN(textoTelefono)) {
					alert ("Dni y Telefono deben ser numéricos");
        }
        else if (Math.sign(textoTelefono)==-1 || Math.sign(textoDni)==-1) {
					alert ("El teléfono y el dni deben ser números mayores a cero");
        }
        else if (!/^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i.test(textoEmail)) {
          alert ("El email tiene formato incorrecto");
        }
				else {
					Registrar();
				}
      }
			function validarModificacion() {
        var textoApellido = document.getElementById('apellido_nombre').value;
        var textoDni = document.getElementById('dni').value;
				var textoTelefono = document.getElementById('telefono').value;
				var textoDireccion = document.getElementById('direccion').value;
        var textoEmail = document.getElementById('email').value;
        if (textoApellido.length == 0 || textoDni.length == 0 || textoTelefono.length == 0 || textoDireccion.length == 0 || textoEmail.length == 0) {
					alert ("Alguno de los campos está vacío");
				}
        else if (isNaN(textoDni) || isNaN(textoTelefono)) {
					alert ("Dni y Telefono deben ser numéricos");
        }
        else if (Math.sign(textoTelefono)==-1 || Math.sign(textoDni)==-1) {
					alert ("El teléfono y el dni deben ser números mayores a cero");
        }
        else if (!/^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i.test(textoEmail)) {
          alert ("El email tiene formato incorrecto");
        }
				else {
          var mensaje = confirm("¿Está seguro que desea modificar el cliente?");
          if (mensaje == true) {
            Modificar();
	        }
				}
      }
      function confirmarEliminar() {
        var mensaje = confirm("¿Está seguro que desea eliminar el cliente?");
        if (mensaje == true) {
          Eliminar();
	      }
      }
		</script>
	</body>
</html>  