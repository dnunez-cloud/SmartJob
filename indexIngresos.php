<!DOCTYPE html>
<html lang="es">
	<head>
    <title>Ingresos y egresos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styleIngreso.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="ajaxIngreso.js"></script>
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
      <nav>
        <h2>Ingresos y Egresos</h2>
      </nav>
    </header>
    <div id="contenedor">
      <div id="inscribir">
        <section class="widget11">
          <h4 class="widget11titulo">Gestionar ingreso o egreso</h4>
            <form id="form" onsubmit="return true">
							<label style="padding:10px;"> Buscar ingreso/egreso por N°:</label>
              <input type="text" id="id" name="id" tabindex="0" size="20" placeholder="Solo para búsqueda" autocomplete= "off" onkeyup="Buscar()">
              <label style="padding:10px;"> Seleccionar cliente:</label>
              <div class="selector-cliente">
              	<select id="cliente" name="cliente" onchange="seleccionarCliente(this.value)">
              	</select>
              </div>
              <label style="padding:10px;"> Dni cliente:</label>
              <input type="text" id="dni" name="dni" value="" autocomplete= "off" size="20" disabled>
							<label style="padding:10px;"> Fecha:</label>
              <input type="date" id= "fecha" name="fecha"placeholder="fecha" value="" autocomplete= "off" size="20">
              <label style="padding:10px;"> Seleccionar tipo de movimiento:</label>
              <div class="selector-tipo">
              	<select id="tipo" name="tipo">
                  <option value=0>Tipo</option>
                  <option value=I>Ingreso</option>
                  <option value=E>Egreso</option>
              	</select>
              </div>
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
              <label style="padding:10px;"> Productos seleccionados:</label>
              <textarea type="text" id= "concepto" name="concepto" disabled autocomplete= "off" size="20" rows= "3" cols= "35"></textarea>
              <label style="padding:10px;"> Comentarios:</label>
              <input type="text"id="comentarios" name="comentarios" autocomplete= "off" size="20">
              <label style="padding:10px;"> Importe total:</label>
              <input type="text"id="importe" name="importe" autocomplete= "off" size="20">
              <input type="hidden"id="stock" name="stock" autocomplete= "off" size="20">
              <input type="hidden"id="productoArray" name="productoArray" autocomplete= "off" size="20">
              <input type="hidden"id="id_producto" name="id_producto" autocomplete= "off" size="20">
              <input type="hidden"id="id_cliente" name="id_cliente" autocomplete= "off" size="20">                              
            </form>
            <button  onclick= "validarRegistro()"id="registrar"name= "registrar"tabindex="7"value="registrar">Guardar</button>
            <button  onclick="validarModificacion()"id="modificar"name="modificar"tabindex="8"value="modificar">Modificar</button>
            <button  onclick="confirmarEliminar()"id="eliminar" name="eliminar" tabindex="9"value="eliminar">Eliminar</button>
        </section>
      </div>
      <div id="inscribir1a">
        <section class="widget11a">
          <h4 class="widget11titulo">Informe</h4>
          <label style="padding:10px;"> Filtrar registros por DNI:</label>
          <input type="text" id="dniCliente" name="dniCliente" tabindex="0" size="20" autocomplete= "off">
          <button onclick= "filtrarClientes()"id="filtrarCliente"name= "filtrarCliente"tabindex="7"value="filtrarCliente">Filtrar</button>
          <br style="clear:both;">
          <form onsubmit="return true">
            <hr>
            <label style="padding:10px;"> Filtrar por Fecha:</label>
            <label style="padding:10px;">Desde:</label>
            <input type="date" id= "fecha1" name="fecha1"placeholder="fecha1" value="" autocomplete= "off" size="20" >
						<label style="padding:10px;">Hasta:</label>
            <input type="date" id= "fecha2" name="fecha2"placeholder="fecha2" value="" autocomplete= "off" size="20" >
            <br style="clear:both;">
          </form>
          <button  onclick= "Filtrar()"id="filtrar"name= "filtrar"tabindex="7"value="informe">Filtrar</button>
          <button  onclick= "Calcular()"id="calcular"name= "calcular"tabindex="7"value="calcular">Calcular</button>
          <hr>
          <button  onclick= "Volver()"id="volver"name= "volver"tabindex="7"value="volver">Volver</button>
        </section>
      </div>
      <div id="consultar">
        <section class="widget12">
          <h4 class="widgettitulo">Ingresos/Egresos</h4>
          <div class="datagrid2" id="datagrid2">      
          </div>  
        </section>
      </div>
		</div>
		<script>
      var items = [];
			function carrito(id_producto, cantidad,precio){
				this.id_producto = id_producto;
				this.cantidad = cantidad;
        this.precio = precio;
			}

      function agregarItem(){
        item = new carrito(parseInt(document.getElementById('id_producto').value),parseInt(document.getElementById('cantidad').value),parseInt(document.getElementById('precio').value));
				var stock = parseInt(document.getElementById('stock').value);
        var cantidad = parseInt(document.getElementById('cantidad').value);
        var tipo = document.getElementById('tipo').value;
        var precio = document.getElementById('precio').value;
        var importe = document.getElementById('importe').value;
        var concepto = document.getElementById('concepto').value;
        var productoArray = document.getElementById('productoArray').value;
        var valor = document.getElementById('valor').value;
        var importeParcial;
        var venta = stock - cantidad;

        if (tipo != "I" && tipo !="E") {
          alert("Debe seleccionar Tipo, si es ingreso o egreso");
          return;
        }
        if (valor == "GV" && tipo != "E"){
          alert ("Si es Gastos varios, debe ser marcado como Egreso");
          return;
        }
        if (cantidad.length == 0 || isNaN(cantidad) || precio.length == 0 || isNaN(precio)){
          alert ("Los campos cantidad y precio deben ser numéricos");
          return;
        }
        for(var i=0; i<items.length; i++) {
          if (item.id_producto == items[i].id_producto) {
            cantidad = item.cantidad + items[i].cantidad;
            if ((stock-cantidad) < 0) {
              alert("El producto no dispone de esa cantidad en stock para su venta");
              return;
            }
          }
        }
        if (tipo =="I" && venta < 0) {
          alert("El producto no dispone de esa cantidad en stock para su venta");
          return;
        }
        items.push(item);
        importeParcial = item.cantidad * precio;
        importe = Number(importe) + Number(importeParcial);
        
        if (valor == "GV") {
          productoArray = " [Item: Gastos varios - " + "Cant: " + cantidad + "]";
        }
        else {
          productoArray = " [Item: " + productoArray + " - " + "Cant: " + cantidad + "]";
        }

        document.getElementById("importe").value = importe;
        document.getElementById("id_producto").value = "";
        document.getElementById("cantidad").value = "";
        document.getElementById("precio").value = "";
        document.getElementById("valor").value = "Productos en stock";
        document.getElementById("concepto").value = concepto + "\n" + productoArray;
      }

			function validarRegistro() {
				var textoConcepto = document.getElementById('concepto').value;
				var textoImporte = document.getElementById('importe').value;
        var textoTipo = document.getElementById('tipo').value;
        var cliente = document.getElementById('cliente').value;
        var textoDni = document.getElementById('id_cliente').value;

        if (textoConcepto.length == 0 || textoImporte.length == 0) {
					alert ("Los campos concepto o importe no pueden quedar vacíos");
				}
        else if (isNaN(textoImporte)) {
					alert ("Importe debe ser numérico");
        }
        else if ( Math.sign(textoImporte)==-1) {
					alert ("Importe debe ser número mayor a cero");
        }
        else if (textoTipo == 0) {
          alert ("Debe seleccionar si es un ingreso o egreso");
        }
        else if (textoDni.length == 0) {
          alert ("Debe seleccionar un cliente");
        }
				else {
          Registrar();
				}
      }
      
			function validarModificacion() {
				var textoImporte = document.getElementById('importe').value;
        if (textoImporte.length == 0) {
					alert ("El campo importe no puede quedar vacío");
				}
        else if (isNaN(textoImporte)) {
					alert ("Importe debe ser numérico");
        }
        else if ( Math.sign(textoImporte)==-1) {
					alert ("Importe debe ser un número mayor a cero");
        }
				else {
          var mensaje = confirm("¿Está seguro que desea modificar el ingreso?");
          if (mensaje == true) {
            Modificar();
	        }
        }
      }
      function confirmarEliminar() {
        var mensaje = confirm("¿Está seguro que desea eliminar el ingreso?");
        if (mensaje == true) {
          Eliminar();
	      }
      }
		</script>
	</body>
</html>  
