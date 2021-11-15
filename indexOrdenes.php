<!DOCTYPE html>
<html lang="es">
	<head>
    <title>Ordenes</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styleOrdenes.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="ajaxOrden.js"></script>
	</head>
	<body>
		<script type="text/javascript">
    	$(document).ready(function() {
        $.ajax({
        	type: "POST",
        	url: "selectstock.php",
        	success: function(response){
        		$('.selector-stock select').html(response).fadeIn();
        	}
        });
        $.ajax({
        	type: "POST",
        	url: "selectCliente.php",
        	success: function(response){
            $('.selector-cliente select').html(response).fadeIn();
        	}
        });
      });
		</script>
    <header>
      <h2>Ordenes</h2>
      <a class="boton" href="OrdenBlanco.php" target="_blank">Abrir Orden</a> 
		</header>
		<div id="contenedor">
      <div id="inscribir">
        <section class="widget11">
          <h4 class="widget11titulo">Gestionar ordenes</h4>
          <form id="form" onsubmit="return true">
						<label style="padding:10px;"> Buscar orden por código:</label>
            <input type="text" id="id" name="id" tabindex="0" size="20" placeholder="Solo para búsqueda" autocomplete= "off" onkeyup="Buscar()">
						<label style="padding:10px;"> Fecha:</label>
            <input type="date" id= "fecha" name="fecha"placeholder="fecha" value="" autocomplete= "off" size="20">
            <label style="padding:10px;"> Seleccionar cliente:</label>
            <div class="selector-cliente">
              <select id="cliente" name="cliente" onchange="seleccionarCliente(this.value)">
              </select>
            </div>
            <label style="padding:10px;"> Dni cliente:</label>
            <input type="text" id="dni" name="dni" value="" autocomplete= "off" size="20" disabled>
						<label style="padding:10px;"> Equipo:</label>
            <input type="text" id="equipo" name="equipo" value="" autocomplete= "off" size="20">
            <label style="padding:10px;"> Imei del equipo:</label>
            <input type="text"id="imei" name="imei" autocomplete= "off" size="20">
						<label style="padding:10px;"> Seleccionar producto:</label>
            <div class="selector-stock">
              <select id="valor" name="valor" onchange="seleccionarStock(this.value)">
              </select>
            </div>
            <label style="padding:10px;"> Precio unitario:</label>
            <input type="text"id="precio" name="precio" autocomplete= "off" size="20">
            <label style="padding:10px;"> Cantidad:</label>
              <input type="text"id="cantidad" name="cantidad" autocomplete= "off" size="20">
            <button type="button" onclick="agregarItem()" id="agregar"name= "agregar"tabindex="7"value="agregar">Agregar</button>
            <br style="clear:both;">
            <label style="padding:10px;"> Repuestos utilizados y reparación:</label>
            <textarea type="text" disabled id= "reparacion" name="reparacion" autocomplete= "off" size="20" rows= "3" cols= "35"></textarea>
            <label style="padding:10px;"> Comentarios:</label>
            <input type="text"id="comentarios" name="comentarios" autocomplete= "off" size="20">
            <label style="padding:10px;"> Precio total:</label>
            <input type="text"id="presupuesto" name="presupuesto" autocomplete= "off" size="20">
						<label style="padding:10px;"> Fecha de entrega:</label>
            <input type="date" id= "fecha_entrega" name="fecha_entrega"placeholder="fecha" value="" autocomplete= "off" size="20">
            <label style="padding:10px;"> Estado:</label>
            <br>
            <label><input type="radio" id="estado" name="estado"value=PE>Pendiente</label>
            <label><input type="radio" id="estado" name="estado"value=EP >En proceso</label>
            <label><input type="radio" id="estado" name="estado"value=SA>Sin arreglo</label>
            <label><input type="radio" id="estado" name="estado"value=HE >Hecho</label>
            <br>              
						<label><input type="radio" id="estado" name="estado"value=SD>Sin arreglo y Devuelto </label>
            <br>            
  					<label><input type="radio" id="estado" name="estado"value=EN>Entregado</label> 
            <input type="hidden"id="stock" name="stock" autocomplete= "off" size="20">
            <input type="hidden"id="productoArray" name="productoArray" autocomplete= "off" size="20">
            <input type="hidden"id="id_producto" name="id_producto" autocomplete= "off" size="20">
            <input type="hidden"id="id_cliente" name="id_cliente" autocomplete= "off" size="20">                              
            <br style="clear:both;">
          </form>
          <button  onclick= "validarRegistro()"id="registrar"name= "registrar"tabindex="7"value="registrar">Guardar</button>
          <button  onclick="validarModificacion()"id="modificar"name="modificar"tabindex="8"value="modificar">Modificar</button>
          <button  onclick="confirmarEliminar()"id="eliminar" name="eliminar" tabindex="9"value="eliminar">Eliminar</button>
        </section>
      </div>
			<div id="inscribir1">
        <section class="widget11">
				  <h4 class="widget11titulo">Filtrar ordenes</h4>
          <label style="padding:10px;"> Filtrar registros por Dni:</label>
          <input type="text" id="dniCliente" name="dniCliente" tabindex="0" size="20" autocomplete= "off">
          <button onclick= "filtrarClientes()"id="filtrarCliente"name= "filtrarCliente"tabindex="7"value="filtrarCliente">Filtrar</button>
          <button  onclick= "Volver()"id="volver"name= "volver"tabindex="7"value="volver">Volver</button>
        </section>
      </div>
      <div id="consultar">
        <section class="widget12">
          <h4 class="widgettitulo">Ordenes</h4>
          <div class="datagrid2" id="datagrid2"> 
          </div>  
        </section>
      </div>
		</div>
		<script>
      var items = [];
			function carrito(id_producto, cantidad, precio){
				this.id_producto = id_producto;
				this.cantidad = cantidad;
        this.precio = precio;
			}

      function agregarItem(){
        item = new carrito(parseInt(document.getElementById('id_producto').value),parseInt(document.getElementById('cantidad').value),parseInt(document.getElementById('precio').value));
				var stock = parseInt(document.getElementById('stock').value);
        var cantidad = parseInt(document.getElementById('cantidad').value);
        var precio = document.getElementById('precio').value;
        var presupuesto = document.getElementById('presupuesto').value;
        var reparacion = document.getElementById('reparacion').value;
        var productoArray = document.getElementById('productoArray').value;
        var valor = document.getElementById('valor').value;
        var importeParcial;
        var venta = stock - cantidad;

        if (cantidad.length == 0 || isNaN(cantidad) || precio.length == 0 || isNaN(precio)){
          alert ("Los campos cantidad y precio deben ser numéricos");
          return;
        }
        for(var i=0; i<items.length; i++) {
          if (item.id_producto == items[i].id_producto) {
            cantidad = item.cantidad + items[i].cantidad;
            if ((stock-cantidad) < 0) {
              alert("El repuesto no dispone de esa cantidad en stock para su venta");
              return;
            }
          }
        }
        if (venta < 0) {
          alert("El repuesto no dispone de esa cantidad en stock para su venta");
          return;
        }
        items.push(item);
        importeParcial = item.cantidad * precio;
        presupuesto = Number(presupuesto) + Number(importeParcial);
        productoArray = " [Item: " + productoArray + " - " + "Cant: " + cantidad + "]";

        document.getElementById("presupuesto").value = presupuesto;
        document.getElementById("id_producto").value = "";
        document.getElementById("cantidad").value = "";
        document.getElementById("precio").value = "";
        document.getElementById("valor").value = "Productos en stock";
        document.getElementById("reparacion").value = reparacion + "\n" + productoArray;
      }

			function validarRegistro() {
				var textoEquipo = document.getElementById('equipo').value;
				var textoComentarios = document.getElementById('comentarios').value;
        var textoPresupuesto = document.getElementById('presupuesto').value;
        var cliente = document.getElementById('cliente').value;

        if (cliente == "CN") {
          document.getElementById('dni').value = 0;
        }
        var textoDni = document.getElementById('dni').value;

        if (textoEquipo.length == 0 || textoComentarios.length == 0) {
					alert ("Los campos equipo o comentarios no pueden quedar vacíos");
				}
        else if (textoPresupuesto.length == 0 && isNaN(textoPresupuesto)) {
					alert ("El importe del precio o presupuesto debe ser numérico");
        }
        else if (textoPresupuesto.length == 0 && Math.sign(textoPresupuesto)==-1) {
					alert ("El importe del precio o presupuesto debe ser número mayor a cero");
        }
        else if (textoDni.length == 0) {
          alert ("Debe seleccionar un cliente");
        }
				else {
          Registrar();
				}
      }
      
			function validarModificacion() {
				var textoEquipo = document.getElementById('equipo').value;
				var textoReparacion = document.getElementById('reparacion').value;
        var textoPresupuesto = document.getElementById('presupuesto').value;
        var cliente = document.getElementById('cliente').value;

        if (cliente == "CN") {
          document.getElementById('dni').value = 1;
        }
        var textoDni = document.getElementById('dni').value;

        if (textoEquipo.length == 0 || textoReparacion.length == 0) {
					alert ("Los campos equipo o reparación no pueden quedar vacíos");
				}
        else if (textoPresupuesto.length == 0 && isNaN(textoPresupuesto)) {
					alert ("El importe del precio o presupuesto debe ser numérico");
        }
        else if (textoPresupuesto.length == 0 && Math.sign(textoPresupuesto)==-1) {
					alert ("El importe del precio o presupuesto debe ser número mayor a cero");
        }
				else {
          var mensaje = confirm("¿Está seguro que desea modificar la orden?");
          if (mensaje == true) {
            Modificar();
	        }
				}
      }
      function confirmarEliminar() {
        var mensaje = confirm("¿Está seguro que desea eliminar la orden?");
        if (mensaje == true) {
          Eliminar();
	      }
      }
		</script>
	</body>
</html> 