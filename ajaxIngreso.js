window.onload = function (){
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
    mes='0'+mes;
	}
  document.getElementById('fecha').value=ano+"-"+mes+"-"+dia;
  document.getElementById('fecha1').value=ano+"-"+mes+"-"+dia;
  document.getElementById('fecha2').value=ano+"-"+mes+"-"+dia;
}
function Registrar(){
  var fecha=$("#fecha").val();
  var concepto=$("#concepto").val();
  var id_cliente=$("#id_cliente").val();
  var tipo =$("#tipo").val();
  var importe =$("#importe").val();
  var comentarios = $('#comentarios').val();
  concepto = concepto + " Comentario: " + comentarios;
  var array = JSON.stringify(items);

  $.ajax({
    type: "POST",
    url: "registroIngreso.php",
    data:{"fecha":fecha,"concepto":concepto,"id_cliente":id_cliente,"tipo":tipo,"importe":importe,"comentarios":comentarios,"array":array},
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
		url:'eliminarIngreso.php',
    data: "id="+id,
    success: function(resp){
			$('#respuesta').html(resp);
			Limpiar();
			Cargar();
		}
	});
}   
function Cargar(){
  $('#datagrid2').load('consultaIngreso.php');    
}
function Filtrar(){
  var fecha1=$("#fecha1").val();
  var fecha2=$("#fecha2").val();
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "consultaFecha.php",
    data: "fecha1="+fecha1+"&fecha2="+fecha2+"&id="+id,
    success: function(resp){
      $('#datagrid2').html(resp);
    }
  });
}
function filtrarClientes(){
  var dniCliente=$("#dniCliente").val();
  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "consultafiltroCliente.php",
    data: "dniCliente="+dniCliente+"&id="+id,
    success: function(resp){
      $('#datagrid2').html(resp);
    }
  });
}
function Calcular(){
	var filas=document.querySelectorAll("#datagrid2 tbody tr");
	var totalIngresos=0;
	var totalEgresos=0;
	filas.forEach(function(e) {
		var columnas=e.querySelectorAll("td");
		var importe=parseFloat(columnas[5].textContent);
		var tipo= (columnas[4].textContent);
  	if (tipo== "I") {
			totalIngresos=totalIngresos+importe;
		}
  	else{
			totalEgresos=totalEgresos+importe;
		}
	});
	window.alert("En el período seleccionado los totales son.  Ingresos: "+ totalIngresos+  " Egresos: " + totalEgresos);    
} 

function Volver(){
  Cargar();
  Limpiar();
}
function Limpiar(){
  $("#form")[0].reset();
  $("#dniCliente").val("");
  items=[];
	fechahoy();
}
function Modificar(){
  var id= $("#id").val();
  var fecha = $("#fecha").val();
  var importe = $("#importe").val();

  $.ajax({
    type: "POST",
    dataType: 'html',
    url: "modificarIngreso.php",
    data: "id="+id+"&fecha="+fecha+"&importe="+importe,
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
		url: 'buscarIngreso.php',
		type: 'POST',
		dataType: 'json',
    data: "id="+id,
  }).done(function(respuesta){
    $('#concepto').val(respuesta.concepto);
    $('#importe').val(respuesta.importe);
    $('#id_cliente').val(respuesta.id_cliente);
    $('#fecha').val(respuesta.fecha);
    $('#tipo').val(respuesta.tipo);
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

