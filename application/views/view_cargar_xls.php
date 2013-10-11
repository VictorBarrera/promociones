<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="panel panel-primary" id="panel">
            <div class="panel-heading"><span id="titulo">CARGA DE DATOS</span></div>
              <div class="panel-body">
                 <!--..............................Pestañas.............................-->
                    <div class="tabbable">
                    	<ul class="nav nav-tabs">
                    		<li class="active"><a href="#1" data-toggle="tab"><span class="glyphicon glyphicon-upload"></span>&nbsp;Carga de Archivos de Excel</a></li>
                    		<li><a href="#2" data-toggle="tab"><span class="glyphicon glyphicon-list"></span>&nbsp; Registro de cargas</a></li>
                    	</ul>
                    	<div class="tab-content">
                    		<div class="tab-pane active" id="1">
                    			<!--...........................................................-->
                    			   <br><br>
                    			    <form action="cargar_xls/importarExcel" enctype="multipart/form-data" id="form_importar" method="post">
                                         <table width="50%">
                                         	<tr id="fila">
                                         		<!--td><b> Seleccionar Excel:</b></td-->
                                         		<td colspan="2" class="center"><input type="file" name="file" id="file"></td>
                                         	</tr>
                                         	<tr>
                                         		<td colspan="2" class="center"><img src="assets/img/loader.gif" alt="" style="display:none;" id="loading"></td>
                                         	</tr>
                                         	<tr>
                                         		<td colspan="2" class="center"> 
                                         		  <input class="btn btn-primary" type="button" value="Importar" onclick="return ajaxFileUpload();">
                                         	    </td>
                                            </tr>
                                        </table>
                                    </form>
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
	function ajaxFileUpload()
	{
       $("#loading").show();
       $("#fila").hide();

    $.ajaxFileUpload({
         url         :$("#form_importar").attr('action'), 
         secureuri      :false,
         fileElementId  :'file',
         dataType    : 'json',	
         success  : function (data,status)
         {
            if(data.status !="error")
              {
			      $('#loadmsg').html('');
			      $("#panel").removeClass('panel-primary');
			      $("#panel").addClass('panel-info');
			      $("#titulo").html('CARGA REALIZADA CON EXITO');
			       setTimeout(function(){ 
			       $("#panel").removeClass('panel-info');
			       $("#panel").addClass('panel-primary');
			       $("#titulo").html('CARGA DE DATOS'); 
			       $("#form_importar")[0].reset();
			       location.reload();
			       },1000);

               } 
         }

  });

   }



$("#txt_vigenciahasta,#txt_vigenciadesde").mask("99-99-9999");
</script>



