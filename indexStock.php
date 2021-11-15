<!DOCTYPE html>
<html lang="es">
	<head>
    <title>Stock</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styleStock.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="ajaxStock.js"></script>
	</head>
	<body>
    <header>
      <nav>
        <h2>Productos en Stock</h2>
      </nav>
    </header>
    <div id="contenedor">
      <div id="inscribir">
        <section class="widget11">
          <h4 class="widget11titulo">Gestionar producto</h4>
          <form onsubmit="return true">
          <label style="padding:10px;"> Filtrar productos por nombre:</label>
            <input type="text" id="busquedaNombre" name="busquedaNombre" tabindex= "0" size="50" placeholder="Solo para búsqueda por nombre" autocomplete= "off" onkeyup="BuscarNombre()">
					  <hr>
            <label style="padding:10px;"> Buscar producto por código:</label>
            <input type="text" id="id" name="id" tabindex= "0" size="50" placeholder="Solo para búsqueda por n°" autocomplete= "off" onkeyup="Buscar()">
						<label style="padding:10px;"> Costo:</label>
            <input type="text" id= "costo" name="costo" autocomplete= "off" size="20" >
						<label style="padding:10px;"> Producto:</label>
            <input type="text" id= "producto" name="producto" autocomplete= "off" size="20">
						<label style="padding:10px;"> Precio:</label>
            <input type="text" id="precio" name="precio" autocomplete= "off" size="20">
						<label style="padding:10px;"> Stock:</label>
            <input type="text"id="stock" name="stock" autocomplete= "off" size="20">
          </form>
          <button  onclick= "validarRegistro()"id="registrar"name= "registrar"tabindex="7"value="registrar">Guardar</button>
          <button  onclick="validarModificacion()"id="modificar"name="modificar"tabindex="8"value="modificar">Modificar</button>
          <button  onclick="confirmarEliminar()"id="eliminar" name="eliminar" tabindex="9"value="eliminar">Eliminar</button>
        </section>
      </div>  
      <div id="consultar">
        <section class="widget12">
          <h4 class="widgettitulo">Productos</h4>
          <div class="datagrid1" id="datagrid1">      
          </div>  
        </section>
      </div>
      <div id="inscribir1a">
        <section class="widget11a">
          <h4 class="widget11titulo">Actualizar todo</h4>
          <form onsubmit="return true">
            <input type="text"id="porcentaje" name="porcentaje" placeholder="Porcentaje" autocomplete= "off" size="20">
            <label><input type="radio" id="tipode" name="tipode" value=C checked>Costo</label>
            <label><input type="radio" id="tipode" name="tipode" value=P >Precio</label>   
            <br style="clear:both;">
          </form>
          <button  onclick= "Actualizar()"id="actualizar"name= "actualizar"tabindex="7"value="actualizar">Ajustar</button>
        </section>
      </div>
		</div>
    <script>
			function validarRegistro() {
				var textoCosto = document.getElementById('costo').value;
        var textoProducto = document.getElementById('producto').value;
				var textoPrecio = document.getElementById('precio').value;
				var textoStock = document.getElementById('stock').value;
        if (textoCosto.length == 0 || textoProducto.length == 0 || textoPrecio.length == 0 || textoStock.length == 0) {
					alert ("Alguno de los campos está vacío");
				}
        else if (isNaN(textoCosto) || isNaN(textoPrecio) || isNaN(textoStock)) {
					alert ("Costo, precio y stock deben ser numéricos");
        }
        else if (Math.sign(textoCosto)==-1 || Math.sign(textoPrecio)==-1 || Math.sign(textoStock)==-1) {
					alert ("Costo, precio y stock deben ser números mayores a cero");
        }
				else {
					Registrar();
				}
      }
			function validarModificacion() {
        var textoCosto = document.getElementById('costo').value;
        var textoProducto = document.getElementById('producto').value;
				var textoPrecio = document.getElementById('precio').value;
				var textoStock = document.getElementById('stock').value;
        if (textoCosto.length == 0 || textoProducto.length == 0 || textoPrecio.length == 0 || textoStock.length == 0) {
					alert ("Alguno de los campos está vacío");
				}
        else if (isNaN(textoCosto) || isNaN(textoPrecio) || isNaN(textoStock)) {
					alert ("Costo, precio y stock deben ser numéricos");
        }
        else if (Math.sign(textoCosto)==-1 || Math.sign(textoPrecio)==-1 || Math.sign(textoStock)==-1) {
					alert ("Costo, precio y stock deben ser números mayores a cero");
        }
				else {
          var mensaje = confirm("¿Está seguro que desea modificar el producto?");
          if (mensaje == true) {
            Modificar();
	        }
				}
      }
      function confirmarEliminar() {
        var mensaje = confirm("¿Está seguro que desea eliminar el producto?");
        if (mensaje == true) {
          Eliminar();
	      }
      }
		</script>
	</body>
</html>  