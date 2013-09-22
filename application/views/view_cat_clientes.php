<div class="container">

	<div style="color:red; min-height:30px" id="msj"></div>

	<!-- TABLA -->
	<table class="table">
		<?php if( isset( $clientes ) && $clientes != false ): ?>

		<thead>

			<th>Clientes</th>
			<th>Categoría</th>

		</thead>

		<tbody>

		<?php 

		$colores = array(

			'a'     => 'green',
			'b'     => 'yellow',
			'c'     => 'red',
			false => '#FFFFFF'

			);

		?>

		<?php foreach ($clientes as $campo): ?>
				
			<tr style="border-left: solid 2px <?php echo $colores[ $campo['categoria'] ] ?>" >
				<td>
					<a href="javascript:void(0);" onclick="traer_compras( '<?php echo $campo['Username'] ?>' )">
						<?php echo $campo['Username'] ?>
					</a>
				</td>
				<td>
					<b><?php echo $campo['categoria'] ?></b>
				</td>
			</tr>

		<?php endforeach ?>

		</tbody>

		<?php endif ?>
	</table>
	<!-- FIN TABLA -->


	<!-- VER COMPRAS DE USUARIO -->
	<div style="display:none" id="ver_compras">
		<table class="table">
			<thead>
				<th>Fecha:</th>
				<th>Total Facturado</th>
			</thead>
			<tbody id="tbody_compras"></tbody>
		</table>
	</div>
	<!-- FIN VER COMPRAS DE USUARIO -->

	
	<!-- DIALOGO -->
	<div style="display:none" id="dialogo">
		<div id="msj_dialogo" style="text-align:center;margin:10px"></div>
	</div>
	<!-- FIN DIALOGO -->


</div>

<script>
/*---------------------------------------------------------------------*/
function ver_compras( compras, Username ){

	var total_compras = 0;

	$.each(compras, function(k, v){

		linea =  '<tr>';
		linea += '<td>' + v.OrderDate + '</td>';
		linea += '<td>' + format_dollar( v.Total ) + '</td>';
		linea += '</tr>';

		total_compras = total_compras + Number( v.Total );

		$('#tbody_compras').append( linea );
	});

	linea =  '<tr>';
	linea += '<td><b>Total comprado</b></td>';
	linea += '<td><b>' + format_dollar( total_compras ) + '</b></td>';
	linea += '</tr>';

	$('#tbody_compras').append( linea );

	$( "#ver_compras" ).dialog({
		title     : "Compras realizadas por "+Username,
        autoOpen  : true,
        height    : 400,
        width     : 500,
        modal     : true,
        resizable : false,
        buttons: {
        	"Cerrar": function() {
            	$( this ).dialog( "close" );
        	}
        },
        open: function(){ }
    });        
}
/*---------------------------------------------------------------------*/
function traer_compras( Username ){
	$.ajax({
		url 	 : '<?php echo base_url() ?>cat_clientes/traer_compras',
		type 	 : 'post',
		dataType : 'json',
		data 	 : { Username : Username },

		beforeSend : function(){

			$('#msj').empty().html('Busnado compras del cliente.');

			$('#tbody_compras').html('');
		},
		success : function(data){
			
			$('#msj').empty();

			if( data.type == false ){

				dialogo('Notificación', 'El cliente no tiene compras.');

			}else{

				ver_compras( data.compras, Username );
			}
		},
		error : function(){

			$('#msj').empty();

			dialogo('Error', 'Error buscando las compras del cliente.')
		}
	})
}
/*---------------------------------------------------------------------*/
function dialogo( title, msj ){

	$( "#dialogo" ).dialog({
		title    : title,
        autoOpen : true,
        //height   : 200,
        width    : 350,
        modal    : true,
        resizable: false,
        buttons: {
        	"Cerrar": function() {
            	$( this ).dialog( "close" );
        	}
        },
        open: function(){
        	$('#msj_dialogo').html(msj);
        }
    });        
}
/*---------------------------------------------------------------------*/
</script>