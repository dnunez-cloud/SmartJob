window.onload = function () {
  Cargar();    
}
function Registrar() {
  var costo=$("#costo").val();
  var producto=$("#producto").val();
  var precio = $("#precio").val();
  var stock = $("#stock").val();

  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "registroStock.php",
    data: "costo="+costo+"&producto="+producto+"&precio="+precio+"&stock="+stock,
    success: function(resp){
      $('#respuesta').html(resp);
      Limpiar();
      Cargar();
    }
  });
}   
function Eliminar(id) {
  var id= $("#id").val()
  $.ajax({
		type:'POST',
		dataType: 'html',
		url:'eliminarStock.php',
    data: "id="+id,
    success: function(resp){
			$('#respuesta').html(resp);
			Limpiar();
			Cargar();
		}
	});
}   
function Cargar() {
  $('#datagrid1').load('consultaStock.php');    
}
function Limpiar() {
	$("#costo").val("");
	$("#producto").val("");
	$("#precio").val("");
	$("#stock").val("");
	$("#id").val("");
	$("#porcentaje").val("");
}
function Modificar() {
  var id= $("#id").val();
  var costo = $("#costo").val();
  var precio = $("#precio").val();

  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "modificarStock.php",
    data: "id="+id+"&costo="+costo+"&precio="+precio,
    success: function(resp){
      $('#respuesta').html(resp);
      Limpiar();
      Cargar();
    }
  });
}
function BuscarNombre() {
  var producto= $("#busquedaNombre").val();
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "buscarNombre.php",
    data: "producto="+producto,
    success: function(resp){
      $('#datagrid1').html(resp);
    }
  });
;}
function Buscar() {
  var id= $("#id").val();
	$.ajax({
		url: 'buscarStock.php',
		type: 'POST',
		dataType: 'json',
    data: "id="+id,
  }).done(function(respuesta){
    $('#costo').val(respuesta.costo);
    $('#producto').val(respuesta.producto);
    $('#precio').val(respuesta.precio);
    $('#stock').val(respuesta.stock);
  });
;}
function Actualizar() {
  var mensaje = confirm("¿Está seguro que desea modificar todos los productos de la tabla?");
  if (mensaje == true) {
    if ($("#tipode:checked").val()=="C"){
      Actualizarcosto()
    }
    else{
      Actualizarprecio()
    }
	  Cargar();
  }	
}
function Actualizarcosto() {
  var porcentaje=$("#porcentaje").val();
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "actualizarcosto.php",
    data: "porcentaje="+porcentaje,
    success: function(resp){
      $('#respuesta').html(resp);
      Limpiar();
      Cargar();
    }
  });
}
function Actualizarprecio() {
  var porcentaje=$("#porcentaje").val();
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "actualizarprecio.php",
    data: "porcentaje="+porcentaje,
    success: function(resp){
      $('#respuesta').html(resp);
      Limpiar();
      Cargar();
    }
  });
}