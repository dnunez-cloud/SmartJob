<!DOCTYPE html>
<html lang="es">
	<head>
    <title>Smartjob</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styleAgenda.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="ajaxAgenda.js"></script>
	</head>
	<body>
    <header>
      <nav>
        <h2>Menú principal</h2>
      </nav>
      <div style="text-align: right">  
        <a class="boton" href="indexStock.php" target="_blank">Stock</a>
        <a class="boton" href="indexIngresos.php" target="_blank">Ingresos y egresos</a>
				<a class="boton" href="indexOrdenes.php" target="_blank">Ordenes</a>
        <a class="boton" href="indexClientes.php" target="_blank">Clientes</a>
      </div>
    </header>
    <div id="contenedor">
      <div id="inscribir">
        <section class="widget1">
          <h4 class="widget1titulo">Gestionar agenda</h4>
          <form onsubmit="return true">
            <label style="padding:10px;"> Buscar agenda por N°:</label>
						<input type="text" id="id" name="id" tabindex= "0" size="20" autocomplete= "off" placeholder="Solo para búsqueda"onkeyup="Buscar()">
            <textarea id="agenda" name="agenda" rows= "3" cols= "35"placeholder="Agenda" autocomplete="off" tabindex="2"></textarea>    
            <label><input type="radio" id="tipo" name="tipo" value=N checked>Normal</label>
            <label><input type="radio" id="tipo" name="tipo" value=P>Prioridad</label>
            <br style="clear:both;">                   
          </form>
          <button  onclick="validarRegistro()" id="registrar"name= "registrar"tabindex="7"value="registrar">Guardar</button>
          <button  onclick="validarModificacion()"id="modificar"name="modificar"tabindex="8"value="modificar">Modificar</button>
          <button  onclick="confirmarEliminar()"id="eliminar" name="eliminar" tabindex="9"value="eliminar">Eliminar</button>
        </section>
      </div>   
      <div id="consultar">
        <section class="widget2">
          <h4 class="widgettitulo">Agendas</h4>
          <div class="datagrid" id="datagrid"></div>
        </section>
      </div>
		</div>
		<script>
			function validarRegistro() {
				var textoAgenda = document.getElementById('agenda').value;
        if (textoAgenda.length == 0) {
					alert ("Ingrese una descripción en la agenda");
				}
				else {
					Registrar();
				}
      }
			function validarModificacion() {
				var textoAgenda = document.getElementById('agenda').value;
				if (textoAgenda.length == 0) {
					alert ("Ingrese una descripción en la agenda");
				}
				else {
          var mensaje = confirm("¿Está seguro que desea modificar la agenda?");
          if (mensaje == true) {
            Modificar();
	        }
				}
      }
      function confirmarEliminar() {
        var mensaje = confirm("¿Está seguro que desea eliminar la agenda?");
        if (mensaje == true) {
          Eliminar();
	      }
      }
		</script>   
	</body>
</html>  
