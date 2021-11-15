window.onload = function () {
	fechahoy();
  Cargar();    
}
function fechahoy(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10){
		dia='0'+dia;
	}
  if(mes<10){
    mes='0'+mes
	}
  document.getElementById('fecha').value=ano+"-"+mes+"-"+dia;
}
function Registrar(){
  var equipo=$("#equipo").val();
  var reparacion =$("#comentarios").val();
  var presupuesto=$("#presupuesto").val();
  var id_cliente=$("#id_cliente").val();
  var fecha1=$("#fecha").val();
  var imei=$("#imei").val();
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "registroOrden.php",
    data: "equipo="+equipo+"&reparacion="+reparacion+"&presupuesto="+presupuesto+"&id_cliente="+id_cliente+"&imei="+imei+"&fecha="+fecha,
    success: function(resp){
      $('#respuesta').html(resp);
      Limpiar();
      Cargar();
    }
  });
}   
function Eliminar(id){
  var id= $("#id").val()
  $.ajax({
		type:'POST',
		dataType: 'html',
		url:'eliminarOrden.php',
    data: "id="+id,
    success: function(resp){
			$('#respuesta').html(resp);
			Limpiar();
			Cargar();
		}
	});
}   
function Cargar(){
  $('#datagrid2').load('consultaOrden.php');    
}
function filtrarClientes(){
  var dniCliente=$("#dniCliente").val();
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "consultaClienteOrden.php",
    data: "dniCliente="+dniCliente+"&id="+id,
    success: function(resp){
      $('#datagrid2').html(resp);
    }
  });
}
function Volver(){
  Cargar();
  Limpiar();
}
function Limpiar(){
  $("#form")[0].reset();
  $("#dniCliente").val("");
  items = [];
  fechahoy();
}
function Modificar(){
  var id=$("#id").val();
  var fecha=$("#fecha").val();
	var fecha_entrega=$("#fecha_entrega").val();
  var equipo=$("#equipo").val();;
  var reparacion =$("#reparacion").val();
  var presupuesto=$("#presupuesto").val();
  var imei=$("#imei").val();
  var checkbox = $("#estado:checked").val();
  var estado = $("#estado").val();
  var comentarios = $('#comentarios').val();
  var array = JSON.stringify(items);
  reparacion = reparacion + comentarios;
  if (checkbox != undefined) {
    estado = checkbox;
  }

  $.ajax({
    type: "POST",
    url: "modificarOrden.php",
    data:{"fecha":fecha,"reparacion":reparacion,"equipo":equipo,"presupuesto":presupuesto,"id":id,"fecha_entrega":fecha_entrega,"imei":imei,"estado":estado,"array":array},
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
    $('#id_cliente').val(respuesta.id_cliente);
    $('#imei').val(respuesta.imei);
		$('#estado').val(respuesta.estado);
  });
;}
function seleccionarStock(id){
	$.ajax({
		url: 'buscarselect.php',
		type: 'POST',
		dataType: 'json',
    data: "id="+id,
  }).done(function(respuesta){
    $('#productoArray').val(respuesta.producto);
    $('#stock').val(respuesta.stock);
    $('#id_producto').val(respuesta.id);
    $('#precio').val(respuesta.precio);
  });
;}
function seleccionarCliente(id){
	$.ajax({
		url: 'buscarselectcliente.php',
		type: 'POST',
		dataType: 'json',
    data: "id="+id,
  }).done(function(respuesta){
    $('#apellido_nombre').val(respuesta.apellido_nombre);
    $('#id_cliente').val(respuesta.id);
    $('#dni').val(respuesta.dni);
  });
;}