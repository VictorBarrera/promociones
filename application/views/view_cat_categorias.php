<div class="container">

	<div style="color:red; min-height:30px" id="msj"></div>

	
	<!-- TABLA -->
	<table class="table">
		<thead>
			<th></th>
			<th>Regla de validación 1</th>
			<th>Regla de validación 2</th>
			<th></th>
		</thead>
		<tbody>
			<tr>
				<td><a href="javascript:void(0);" onclick="load_edit('a')">Categoría a</a></td>
				<td id="fila_1_a">
					Por compras mayores o igual que: $<?php echo $a['valor_1'] ?>
				</td>
				<td id="fila_2_a">
					Por compras menores o igual que: $<?php echo $a['valor_2'] ?> 
				</td>
				<td>
					<div id="color_a" style="clear:both">
						<div style="background-color:<?php echo $a['color']?>;height:30px;width:30px"></div>
					</div>
				</td>
				<input type="hidden" id="a_valor_1" value="<?php echo $a['valor_1'] ?>">
				<input type="hidden" id="a_valor_2" value="<?php echo $a['valor_2'] ?>">
			</tr>
			<tr>
				<td><a href="javascript:void(0);" onclick="load_edit('b')">Categoría b</a></td>
				<td id="fila_1_b">
					Por compras mayores o igual que: $<?php echo $b['valor_1'] ?>
				</td>
				<td id="fila_2_b">
					Por compras menores o igual que: $<?php echo $b['valor_2'] ?>
				</td>
				<td>
					<div id="color_b" style="clear:both">
						<div style="background-color:<?php echo $b['color']?>;height:30px;width:30px"></div>
					</div>
				</td>
				<input type="hidden" id="b_valor_1" value="<?php echo $b['valor_1'] ?>">
				<input type="hidden" id="b_valor_2" value="<?php echo $b['valor_2'] ?>">
			</tr>
			<tr>
				<td><a href="javascript:void(0);" onclick="load_edit('c')">Categoría c</a></td>
				<td id="fila_1_c">
					Por compras mayores o igual que: $<?php echo $c['valor_1'] ?>
				</td>
				<td id="fila_2_c"> 
					Por compras menores o igual que: $<?php echo $c['valor_2'] ?>
				</td>
				<td>
					<div id="color_c" style="clear:both">
						<div style="background-color:<?php echo $c['color']?>;height:30px;width:30px"></div>
					</div>
				</td>
				<input type="hidden" id="c_valor_1" value="<?php echo $c['valor_1'] ?>">
				<input type="hidden" id="c_valor_2" value="<?php echo $c['valor_2'] ?>">
			</tr>
		</tbody>
	</table>
	<!-- FIN TABLA -->

	<!-- EDIT FORM -->
	<div id="edit_categoria" style="display:none">
		<div style="clear:both">
			<div style="float:left;margin-right:10px">
				Por compras mayores o igual que:
			</div>
			<div style="float:right">
				<input type="text" id="valor_1" style="width:110px">
			</div>
		</div>
		<br><br>
		<div style="clear:both">
			<div style="float:left;margin-right:10px">
				Por compras menores o igual que:
			</div>
			<div style="float:right">
				<input type="text" id="valor_2" style="width:110px">
			</div>
		</div>
	</div>
	<!-- FIN EDIT FORM -->
	
	<!-- DIALOGO -->
	<div style="display:none" id="dialogo">
		<div id="msj_dialogo" style="text-align:center;margin:10px"></div>
	</div>
	<!-- FIN DIALOGO -->

	

</div>

<script>
/*---------------------------------------------------------------------*/
var hexDigits = new Array
        ("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 

function rgb2hex(rgb) {
 rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
 return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}

function hex(x) {
  return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
 }
/*---------------------------------------------------------------------*/
$('#color_a').ColorPicker({

	color: rgb2hex( $('#color_a div').css( "background-color" ) ),

	onShow: function (colpkr) {

		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {

		$(colpkr).fadeOut(500);

		edit_color('a');

		return false;
	},

	onChange: function (hsb, hex, rgb) {

		$('#color_a div').css('backgroundColor', '#' + hex);
	}
});
/*---------------------------------------------------------------------*/
$('#color_b').ColorPicker({

	color: rgb2hex( $('#color_b div').css( "background-color" ) ),

	onShow: function (colpkr) {

		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {

		$(colpkr).fadeOut(500);

		edit_color('b');

		return false;
	},

	onChange: function (hsb, hex, rgb) {

		$('#color_b div').css('backgroundColor', '#' + hex);
	}
});
/*---------------------------------------------------------------------*/
$('#color_c').ColorPicker({

	color: rgb2hex( $('#color_c div').css( "background-color" ) ),

	onShow: function (colpkr) {

		$(colpkr).fadeIn(500);
		return false;
	},
	onHide: function (colpkr) {

		$(colpkr).fadeOut(500);

		edit_color('c');

		return false;
	},

	onChange: function (hsb, hex, rgb) {

		$('#color_c div').css('backgroundColor', '#' + hex);
	}
});
/*---------------------------------------------------------------------*/
function edit_color(categoria){

	var color = rgb2hex( $('#color_'+categoria+' div').css( "background-color" ) )

	$.ajax({
		url 	 : '<?php echo base_url() ?>cat_categorias/edit_color',
		type 	 : 'post',
		dataType : 'json',
		data 	 : { categoria : categoria, color : color },

		beforeSend : function(){

			$('#msj').empty().html('Cambiando color...');
		},
		success : function(data){

			$('#msj').empty();

			if( data.type == false ){

				dialogo('Error', data.message);
			}
		},
		error : function(){

			$('#msj').empty();

			dialogo("Error", "Error al cambiar el color.");
		}
	});
}
/*---------------------------------------------------------------------*/
function load_edit( categoria ){

	$( "#edit_categoria" ).dialog({
		title    : 'Editar categoría '+categoria,
        autoOpen : true,
        height   : 200,
        width    : 450,
        modal    : true,
        resizable: false,
        buttons: {
        	"Cancelar": function() {
            	$( this ).dialog( "close" );
        	},
        	"Guardar" : function(){

        		$( this ).dialog( "close" );

        		edit_categoria( categoria );
        	}
        },
        open: function(){

        	$('#valor_1, #valor_2').val('');

        	$('#valor_1').val( $('#'+categoria+'_valor_1').val() );
        	$('#valor_2').val( $('#'+categoria+'_valor_2').val() );
        	
        },
        close: function(){}
    });        
}
/*---------------------------------------------------------------------*/
function edit_categoria( categoria ){

	datos = {
		categoria : categoria,
		valor_1   : $.trim( $('#valor_1').val() ),
		valor_2   : $.trim( $('#valor_2').val() )
	}

	$.ajax({
		url      : '<?php echo base_url() ?>cat_categorias/edit_categoria',
		type     : 'post',
		dataType : 'json',
		data     : datos,

		beforeSend : function(){

			$('#msj').empty().html('Guardando...');
		},
		success : function(data){

			$('#msj').empty();

			if( data.type == false ){

				dialogo('Error', data.message);

			}else{

				dialogo('Notificación', 'Detalles guardados.');

				$('#'+categoria+'_valor_1').val( data['categoria'].valor_1 );
				$('#'+categoria+'_valor_2').val( data['categoria'].valor_2 );

				$('#fila_'+categoria).html('');

				nueva_regla  = 'Por compras mayores o igual que: $';
				nueva_regla += data['categoria'].valor_1;

				$('#fila_1_'+categoria).html( nueva_regla );

				nueva_regla  = 'Por compras menores o igual que: $';
				nueva_regla += data['categoria'].valor_2;

				$('#fila_2_'+categoria).html( nueva_regla );
			}
		},
		error : function(){

			$('#msj').empty();

			dialogo('Error', 'Error al guardar los detalles.');
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