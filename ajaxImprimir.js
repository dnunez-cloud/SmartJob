function Buscar(){
  var id= $("#id").val()
	$.ajax({
	url: 'buscarOrden.php',
	type: 'POST',
	dataType: 'json',
  data: "id="+id,
  }).done(function(respuesta){
    $('#fecha').val(respuesta.fecha);
    $('#fecha_entrega').val(respuesta.fecha_entrega);
    $('#equipo').val(respuesta.equipo);
    $('#reparacion').val(respuesta.reparacion);
    $('#presupuesto').val(respuesta.presupuesto);
    $('#imei').val(respuesta.imei);
  });
;}