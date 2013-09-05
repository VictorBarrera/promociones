<html>
 <head>
 	<meta charset="utf-8">
	<title>Promociones</title>
	  <base href="<?php echo base_url(); ?>">
      <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link type="text/css" rel="stylesheet" href="assets/css/estilosRafa.css">
      <link type="text/css" rel="stylesheet" href="assets/css/start/jquery-ui-1.10.3.custom.min.css">
      <script type="application/x-javascript" src="assets/js/jquery-1.10.2.min.js"></script>
      <script type="application/x-javascript" src="assets/js/jquery-ui-1.10.3.custom.js"></script>
      <script type="application/x-javascript" src="assets/js/jquery.validate.js"></script>
      <script type="application/x-javascript" src="assets/js/bootstrap.min.js"></script>
      <script type="application/x-javascript" src="assets/js/bootbox.min.js"></script>
 </head>
   <body>
		<br><br><br><br><br><br>
		<div class="container">
		   <div class="row">
		      <div class="col-md-4"></div>
		        <div class="col-md-4">
		      	   <div class="panel panel-primary">
		              <div class="panel-heading center">
		                <h3 class="panel-title"><p style="color:white">AUTENTIFICACIÓN</p></h3>
		              </div>
		              <div class="panel-body">
		                   <div class="input-group">
		                     <span class="input-group-addon">
		                     	<span class="glyphicon glyphicon-user"></span>
		                     </span>
		                     <input type="text" class="form-control" placeholder="Usuario" id="txtuser">
		                   </div>
		                   <br>
		                   <div class="input-group">
		                     <span class="input-group-addon">
		                     	<span class="glyphicon glyphicon-lock"></span>
		                     </span>
		                     <input type="password" class="form-control" placeholder="Contraseña" id="txtpasswd">
		                   </div>
		              </div>
		              <div class="panel-footer center">
		              	<button type="button" class="btn btn-primary btn-sm" id="btnenter">
		                 <span class="glyphicon glyphicon-log-in"></span> Entrar
		                </button>
		              </div>
		          </div>
		        </div>
		      <div class="col-md-4"></div>
		   </div>
		</div> 
   </body>
</html>
<script>
	$("#btnenter").on('click',function(){
		var user = $.trim($("#txtuser").val());
		var passwd = $.trim($("#txtpasswd").val());
		if(user.length==0 || passwd.length==0)
		{
          return;
		}
		 $.ajax({
		 	url:'login/loguear/',
		 	type:'post',
		 	datatype:'json',
		 	data:{user:user,passwd:passwd},
		 	 beforeSend: function() { 
		             $("#").html('<img src="assets/img/loading.gif" alt=""> Cargango...') 
		            },
		      success: function(data){
		             if(data.ok)
		               {
		                  location.href='home';
		               }   
		             else
		               {
		                  bootbox.alert('Usuario O contraseña incorrectos');
		               } 
		       $("#").html('');           
		     }
		 });
	});
</script>



