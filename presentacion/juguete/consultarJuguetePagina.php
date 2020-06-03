<?php
$juguete = new Juguete();
$cantidad = 5;
if(isset($_GET["cantidad"])){
    $cantidad = $_GET["cantidad"];
}
$pagina = 1;
if(isset($_GET["pagina"])){
    $pagina = $_GET["pagina"];
}
$productos = $producto -> consultarPaginacion($cantidad, $pagina);
$totalRegistros = $producto -> consultarCantidad();
$totalPaginas = intval($totalRegistros/$cantidad);
if($totalRegistros%$cantidad != 0){
    $totalPaginas++;
}
$ultimaPagina = ($totalPaginas == $pagina); 
?>
<div class="container mt-3">
	<div class="row">
		<div class="col">
            <div class="card">
				<div class="card-header text-white bg-info">
					<h4>Consultar Juguete</h4>
				</div>
              	<div class="card-body">
					<table class="table table-hover table-striped">
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Cantidad</th>
							<th>Material</th>
						</tr>
						<?php 
						$i=1;
						foreach($juguetes as $jugueteActual){
						    echo "<tr>";
						    echo "<td>" . $i . "</td>";
						    echo "<td>" . $jugueteActual -> getNombre() . "</td>";
						    echo "<td>" . $jugueteActual -> getCantidad() . "</td>";
						    echo "<td>" . $jugueteActual -> getMaterial() . "</td>";
						    echo "</tr>";
						    $i++;
						}
						?>
					</table>
					<div class="text-center">
        				<nav>
        					<ul class="pagination">
        						<li class="page-item <?php echo ($pagina==1)?"disabled": ""; ?>"><a class="page-link" href="<?php echo "index.php?pid=" . base64_encode("presentacion/juguete/consultarJuguetePagina.php") . "&pagina=" . ($pagina-1) . "&cantidad=" . $cantidad ?>"> &lt;&lt; </a></li>
        						<?php 
        						for($i=1; $i<=$totalPaginas; $i++){
        						    if($i==$pagina){
        						        echo "<li class='page-item active' aria-current='page'><span class='page-link'>" . $i . "<span class='sr-only'></span></span></li>";
        						    }else{
        						        echo "<li class='page-item'><a class='page-link' href='index.php?pid=" . base64_encode("presentacion/juguete/consultarJuguetePagina.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . "'>" . $i . "</a></li>";
        						    }        						            						    
        						}        						
        						?>
        						<li class="page-item <?php echo ($ultimaPagina)?"disabled": ""; ?>"><a class="page-link" href="<?php echo "index.php?pid=" . base64_encode("presentacion/juguete/consultarJuguetePagina.php") . "&pagina=" . ($pagina+1) . "&cantidad=" . $cantidad ?>"> &gt;&gt; </a></li>
        					</ul>
        				</nav>
					</div>
					<select id="cantidad" >
						<option value="5" <?php echo ($cantidad==5)?"selected":"" ?>>5</option>
						<option value="10" <?php echo ($cantidad==10)?"selected":"" ?>>10</option>
						<option value="15" <?php echo ($cantidad==15)?"selected":"" ?>>15</option>
						<option value="20" <?php echo ($cantidad==20)?"selected":"" ?>>20</option>
					</select>
				</div>
            </div>
		</div>
	</div>
</div>

<script>
$("#cantidad").on("change", function() {
	url = "index.php?pid=<?php echo base64_encode("presentacion/producto/consultarProductoPagina.php") ?>&cantidad=" + $(this).val(); 	
	location.replace(url);
});
</script>
