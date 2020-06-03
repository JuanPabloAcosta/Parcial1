<?php
$nombre = "";
if(isset($_POST["nombre"])){
    $nombre = $_POST["nombre"];
}
$cantidad = "";
if(isset($_POST["cantidad"])){
    $cantidad = $_POST["cantidad"];
}
$precio = "";
if(isset($_POST["precio"])){
    $precio = $_POST["precio"];
}    
if(isset($_POST["crear"])){
    $producto = new Producto("", $nombre, $cantidad, $precio);
    $producto -> insertar();    
}
?>
<div class="container mt-3">
	<div class="row">
		<div class="col-lg-3 col-md-0"></div>
		<div class="col-lg-6 col-md-12">
            <div class="card">
				<div class="card-header text-white bg-info">
					<h4>Crear Producto</h4>
				</div>
              	<div class="card-body">
					<?php if(isset($_POST["crear"])){ ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						Datos ingresados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<?php } ?>
					<form action="index.php?pid=<?php echo base64_encode("presentacion/producto/crearProducto.php") ?>" method="post">
						<div class="form-group">
							<label>Nombre</label> 
							<input type="text" name="nombre" class="form-control" value="<?php echo $nombre ?>" required>
						</div>
						<div class="form-group">
							<label>Cantidad</label> 
							<input type="number" name="cantidad" class="form-control" min="1" value="<?php echo $cantidad ?>" required>
						</div>
						<div class="form-group">
							<label>Precio</label> 
							<input type="number" name="precio" class="form-control" min="1" value="<?php echo $precio ?>" required>
						</div>
						<button type="submit" name="crear" class="btn btn-info">Crear</button>
					</form>
            	</div>
            </div>
		</div>
	</div>
</div>