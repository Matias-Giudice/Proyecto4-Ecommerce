<?php
	include 'global/config.php';
	include 'global/conexion.php';
	include 'carrito.php';
	include 'templates/cabecera.php';
?>
	<br>
	<?php if ($mensaje!="") { ?>
		<div class="alert alert-success">
			<?php echo $mensaje;?>
			<a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
		</div>
	<?php } ?>
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
	    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img src="archivos/img/banner1.jpg" class="d-block w-100" class="img-fluid" alt="Responsive image">
	    </div>
	    <div class="carousel-item">
	      <img src="archivos/img/banner2.jpg" class="d-block w-100" class="img-fluid" alt="Responsive image">
	    </div>
	    <div class="carousel-item">
	      <img src="archivos/img/banner3.png" class="d-block w-100" class="img-fluid" alt="Responsive image" height="335px">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	<br>
	<div class="row">
		<?php
			$sentencia=$pdo->prepare("SELECT * FROM `productos`");
			$sentencia->execute();
			$listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
			//print_r($listaProductos);
		?>
		<?php foreach($listaProductos as $producto) { ?>
			<div class="col-3">
				<div class="card">
					<img title="<?php echo $producto['nombre'];?>" alt="<?php echo $producto['nombre'];?>" class="card-img-top" src="<?php echo $producto['imagen'];?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo $producto['descripcion'];?>" height="200px">
					<div class="card-body">
						<span><?php echo $producto['nombre'];?></span>
						<h5 class="card-title">$<?php echo $producto['precio'];?></h5>
						<!--<p class="card-text">Descripción</p>-->
						<form action="" method="post">
							<input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id_prod'], COD, KEY);?>">
							<input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY);?>">
							<input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY);?>">
							<input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);?>">
							<button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
							</form>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<!--</div>-->
	<script>
		$(function () {
			$('[data-toggle="popover"]').popover()
		})
	</script>
<?php include 'templates/pie.php'; ?>