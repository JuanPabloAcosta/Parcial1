<?php
$juguete = new Juguete();
$juguetes = $juguete -> consultarTodos();
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
        						<li class="page-item disabled"><span class="page-link"> &lt;&lt; </span>
        						</li>
        						<li class="page-item"><a class="page-link" href="index.php?pid=<?php echo base64_encode("presentacion/producto/consultarProducto.php") ?>&pagina=1">1</a></li>
        						<li class="page-item active" aria-current="page"><span
        							class="page-link"> 2 <span class="sr-only">(current)</span>
        						</span></li>
        						<li class="page-item"><a class="page-link" href="#">3</a></li>
        						<li class="page-item"><a class="page-link" href="#"> &gt;&gt; </a></li>
        					</ul>
        				</nav>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>