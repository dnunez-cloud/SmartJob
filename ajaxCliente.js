window.onload = function (){
  Cargar();    
}
function Registrar(){
  var apellido_nombre=$("#apellido_nombre").val();
  var email = $("#email").val();
  var direccion = $("#direccion").val();
	var dni = $("#dni").val();
  var telefono = $("#telefono").val();
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "registroCliente.php",
    data: "apellido_nombre="+apellido_nombre+"&email="+email+"&direccion="+direccion+"&dni="+dni+"&telefono="+telefono,
    success: function(resp){
      $('#respuesta').html(resp);
      Limpiar();
      Cargar();
    }
  });
}
function BuscarDni() {
  var busquedaDni= $("#busquedaDni").val();
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "busquedaDniCliente.php",
    data: "busquedaDni="+busquedaDni,
    success: function(resp){
      $('#datagrid1').html(resp);
    }
  });
;}
function Eliminar(id){
  var id= $("#id").val();
  $.ajax({
		type:'POST',
		dataType: 'html',
		url:'eliminarCliente.php',
    data: "id="+id,
    success: function(resp){
			$('#respuesta').html(resp);
			Limpiar();
			Cargar();
		}
	});
}   
function Cargar(){
  $('#datagrid1').load('consultaCliente.php');    
}
function Limpiar(){
	$("#id").val("");
	$("#apellido_nombre").val("");
	$("#email").val("");
	$("#direccion").val("");
	$("#dni").val("");
	$("#telefono").val("");
}
function Modificar(){
	var id= $("#id").val();
	var apellido_nombre=$("#apellido_nombre").val();
  var email = $("#email").val();
  var direccion = $("#direccion").val();
	var dni = $("#dni").val();
  var telefono = $("#telefono").val();
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "modificarCliente.php",
    data: "id="+id+"&apellido_nombre="+apellido_nombre+"&email="+email+"&direccion="+direccion+"&dni="+dni+"&telefono="+telefono,
    success: function(resp){
      $('#respuesta').html(resp);
      Limpiar();
      Cargar();
    }
  });
}
function Buscar(){
  var id= $("#id").val();
	$.ajax({
		url: 'buscarCliente.php',
		type: 'POST',
		dataType: 'json',
    data: "id="+id,
  }).done(function(respuesta){
    $('#apellido_nombre').val(respuesta.apellido_nombre);
		$('#email').val(respuesta.email);
    $('#direccion').val(respuesta.direccion);
    $('#dni').val(respuesta.dni);
    $('#telefono').val(respuesta.telefono);
  });
}