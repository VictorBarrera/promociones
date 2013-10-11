<div class="container center">
	<div class="row">
		<div class="col-md-4 center">
			<a href="cargar_xls">
			<img src="assets/img/graficos.png" width="50%" heigth="50%" class="img-rounded" title="Cargue los datos de Excel a su base de datos" id="img_graficos">
			<h3 class="letrabonita">Carga de Datos</h3>
			</a>
		</div>
		<div class="col-md-4">
			<a href="cat_clientes">
			<img src="assets/img/graficogs.png" width="46%" heigth="46%" class="img-rounded" title="Vea las estadisitcas de datos cargados">
			<h3 class="letrabonita">Gráficos</h3>
			</a>
		</div>
		<div class="col-md-4">
			<a href="promos">
			<img src="assets/img/promociones.jpg" width="39%" heigth="39%" class="img-rounded" title="Cree y administre promociones para sus clientes" id="img_promociones">
			<h3 class="letrabonita">Promociones</h3>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<a href="enviarcorreos">
			<img src="assets/img/email.jpg" width="39%" heigth="39%" title="Envíele promociones asus clientes atraves de email" id="img_email">
			<h3 class="letrabonita">Emails</h3>
			</a>
		</div>
		<div class="col-md-4">
			<img src="assets/img/twitter.jpg" width="39%" heigth="39%" title="Envíe promociones atraves de twitter a sus clientes" id="img_twitter">
			<h3 class="letrabonita">Twitter</h3>
		</div>
		<div class="col-md-4">
			<img src="assets/img/usuarios.png" width="39%" heigth="39%" title="Adminstre los usuarios del sistema" id="img_usuarios">
			<h3 class="letrabonita">Usuarios</h3>
		</div>
	</div>
</div>
<br><br>

<script>
	$("#img_graficos,#img_clientes,#img_email,#img_twitter").tooltip({ placement:'right',animation:true,trigger:'hover'});
	$("#img_promociones,#img_usuarios").tooltip({ placement:'left',animation:true,trigger:'hover'});
</script>