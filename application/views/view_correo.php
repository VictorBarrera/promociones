<div class="container">


	<div class="row">
		<div class="col-md-12"></div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
		  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><p style="color:white">ENVIAR PROMOCIONES</p></h3>
            </div>
            <div class="panel-body">
            	<div id="enviando"></div>
                <?php echo form_open('enviarcorreos/sendemail', 'id="form_correo"'); ?>
                    <table>
                    	<tr><td>Asunto</td><td><input type="text" name="txt_asunto"></td></tr>
                    	<tr><td>promoción:</td><td>
                    		<select name="promociones" id="promociones">
                    			<option value="">Seleccione</option>
                    			<?php foreach($promociones as $key =>$value): ?>
                                    <option value="<?php echo $value->idpromociones?>"><?php echo $value->nombre_promo ?></option>
                    		    <?php endforeach?>
                    		</select>
                    	</td></tr>
                    	<tr>
                    		<td>Enviar a:</td>
                    		<td><select name="destinatarios" id="destinatarios">
                    			<option value="">Selecione</option>
                    			<option value="a">Clientes de categoría a</option>
                    			<option value="b">Clientes de categoría b</option>
                    			<option value="c">Clientes de categoría c</option>
                    		</select></td>
                    	</tr>
                    	<tr><td colspan="2" class="center">
                    			<button type="submit" class="btn btn-primary btn-sm" id="btnenter">
		                         <span class="glyphicon glyphicon-log-in"></span> Enviar
		                        </button>
                    	</td></tr>
                    </table>
                <?php echo form_close(); ?>
            </div>
           </div>
		</div>
		<div class="col-md-1"></div>
	</div>
	<div class="row">
		<div class="col-md-12"></div>
	</div>

	
	<!-- DIALOGO -->
	<div style="display:none" id="dialogo">
		<div id="msj_dialogo" style="text-align:center;margin:10px"></div>
	</div>
	<!-- FIN DIALOGO -->


</div>



<script>

	$("#form_correo").validate({

		submitHandler: function(form){
			$.ajax({
				url 	 : $("#form_correo").attr('action') ,
				type 	 : 'post',
				datatype : 'json',
				data 	 : $("#form_correo").serialize(),

				beforeSend: function() { 

			        $("#").hide();

			        $("#enviando").html('<img src="assets/img/sending_mail.gif" alt="">Enviando...');
			    },
			    success: function(data){

			        if(data.ok){

			            $("#form_correo")[0].reset();

			            dialogo('Notificación', data.msg );

			        }else{
						
						dialogo('Error', data.msg );
			        } 

			      	$("#enviando").html('');           
			    }
			});
		}
	});
	/*------------------------------------------------------------------------------------------*/
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

</script>