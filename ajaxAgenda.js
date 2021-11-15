window.onload = function (){
  Cargar();    
}
function Registrar(){
  var fecha=$("#fecha").val();
  var agenda = $("#agenda").val();
  var tipo = $("#tipo:checked").val();
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "registroAgenda.php",
    data: "fecha="+fecha+"&agenda="+agenda+"&tipo="+tipo,
    success: function(resp){
      $('#respuesta').html(resp);
      Limpiar();
      Cargar();
    }
  });
}   
function Eliminar(id){
  var id= $("#id").val();
  $.ajax({
		type:'POST',
		dataType: 'html',
		url:'eliminarAgenda.php',
    data: "id="+id,
    success: function(resp){
			$('#respuesta').html(resp);
			Limpiar();
			Cargar();
		}
	});
}   
function Cargar(){
  $('#datagrid').load('consultaAgenda.php');    
}
function Limpiar(){
	$("#agenda").val("");
	$("#tipo").val("N");
	$("#id").val("");
}
function Modificar(){
  var id= $("#id").val();
  var agenda = $("#agenda").val();
  var tipo = $("#tipo:checked").val();
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "modificarAgenda.php",
    data: "id="+id+"&agenda="+agenda+"&tipo="+tipo,
    success: function(resp){
      $('#respuesta').html(resp);
      Limpiar();
      Cargar();
    }
  });
}
function Buscar(){
  var id= $("#id").val()
	$.ajax({
		url: 'buscarAgenda.php',
		type: 'POST',
		dataType: 'json',
    data: "id="+id,
  }).done(function(respuesta){
    $('#agenda').val(respuesta.agenda);
  });
}