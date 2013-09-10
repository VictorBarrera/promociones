<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="panel panel-primary" id="panel">
            <div class="panel-heading"><span id="titulo">ADMINISTRE LAS PROMOCIONES</span></div>
              <div class="panel-body">
                 <!--..............................Pestañas.............................-->
                    <div class="tabbable">
                    	<ul class="nav nav-tabs">
                    		<li class="active"><a href="#1" data-toggle="tab"><span class="glyphicon glyphicon-gift"></span>&nbsp;Crear promociones</a></li>
                    		<li><a href="#2" data-toggle="tab"><span class="glyphicon glyphicon-wrench"></span>&nbsp;Administrar promociones</a></li>
                    	</ul>
                    	<div class="tab-content">
                    		<div class="tab-pane active" id="1">
                    			<!--...........................................................-->
                    			   <br><br>
                    			  <?php echo form_open('promos/guardar_promocion','id="form_guardarpromociones"');?>
                    			   <table  width="100%">
                    			   	<tr>
                    			   		<td ><h5 class="label">Nombre Promoción:</h5></td>
                    			   		<td><h5 class="label">Descripcion de la promoción:</h5></td>
                    			   	</tr>
                    			   	<tr>
                    			   		<td><input type="text" class="form-control input-sm" autofocus name="txt_nombrepromo"></td>
                    			   	    <td rowspan="5">
                    			   	    	<textarea name="descripcion" id="" cols="30" rows="10" name="descripcion"></textarea>
                    			   	    </td>
                    			   	</tr>
                    			   	<tr>
                    			   		<td><h5 class="label">Vigencia desde:</h5></td>
                    			   	</tr>
                    			   	<tr>
                    			   		<td><input type="text" class="form-control input-sm" name="txt_vigenciadesde" id="txt_vigenciadesde"></td>
                    			   	</tr>
                    			   	<tr>
                    			   		<td><h5 class="label">Vigencia hasta:</h5></td>
                    			   	</tr>
                    			   	<tr>
                    			   		<td  class="up"><input type="text" class="form-control input-sm" name="txt_vigenciahasta" id="txt_vigenciahasta"></td>
                    			   	</tr>
                    			   	<tr>
                    			   		<td colspan="2" class="center">
                    			   			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span>&nbsp;Guardar</button>
                    			   		</td>
                    			   	</tr>
                    			   </table>
                    			   <?php form_close();?>
                    			   <br><br>
                    			<!--...........................................................-->
                    		</div>
                    		<div class="tab-pane" id="2">
                    			<!--...............................Promociones.................-->
                                   <br><br>
                                   <table class=" table table-bordered table-condensed table-hover" width="100%">
                                       <thead>
                                           <th>Nombre</th>
                                           <th>Desde</th>
                                           <th>Hasta</th>
                                           <th>Descripción</th>
                                       </thead>
                                       <tbody>
                                          <?php if($promociones):?>
                                             <?php foreach ($promociones as $key => $value): ?>
                                                 <tr>
                                                     <td><?php echo $value->nombre_promo?></td>
                                                     <td nowrap><?php echo fecha_auser($value->fecha_desde)?></td>
                                                     <td nowrap><?php echo fecha_auser($value->fecha_hasta)?></td>
                                                     <td><?php echo $value->descripcion?></td>
                                                 </tr>
                                             <?php endforeach ?>
                                          <?php else:?>
                                          <tr><td colspan="4" class="center">No hay promociones registradas</td></tr>
                                         <?php endif ?>
                                       </tbody>
                                   </table>
                                <!--...........................................................-->
                    		</div>
                    	</div>
                    </div>
                 <!--...................................................................-->
              </div>
        </div>
	</div>
	<div class="col-md-1"></div>
</div>

<script>
	$("#form_guardarpromociones").validate({
   submitHandler:function(form){
    $.ajax({
    url:$("#form_guardarpromociones").attr('action'),
    type:'post',
    datatype:'json',
    data:$("#form_guardarpromociones").serialize(),
   // beforeSend: function(){$('#loadmsg_guardarprima').empty().html('<img src="assets/img/loading.gif" alt=""> guardando prima...')},
    success:function(data)
    {
    if(data.ok)
    {
      $("#panel").removeClass('panel-primary');
      $("#panel").addClass('panel-info');
      $("#titulo").html('PROMOCIÓN GUARDADA CON EXITO');
       setTimeout(function(){ 
       $("#panel").removeClass('panel-info');
       $("#panel").addClass('panel-primary');
       $("#titulo").html('ADMINISTRE LAS PROMOCIONES'); 
       $("#form_guardarpromociones")[0].reset();
       location.reload();
       },1000);

    }
     else
     {

     }
    }

  });

   }
 });


$("#txt_vigenciahasta,#txt_vigenciadesde").mask("99-99-9999");
</script>

