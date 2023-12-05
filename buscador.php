<div class="row row-cols-1 row-cols-md-4 g-4">

<?php
include("Sesioniniciada/controladores/conexion.php");

?>

<?php
    $buscador = mysql_query("SELECT * FROM PRODUCTO_VENDEDOR WHERE nombre LIKE LOWER ('%".$_POST["buscar"]."%')   OR nombrecompleto  LIKE LOWER('%".$_POST["buscar"]."%')");
    $numero = mysql_num_rows($buscador);
?>

<h2 class="card-tittle">RESULTADOS <?php echo $numero ?></h2>
<?php 
    while($filas = mysqli_fetch_array($buscador)){ ?>
    
    <div class="col">
        <div class="card h-100">
            <div class="row">
                <div id="open">
                    <a href="#" class="thumbnail">
                        <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($filas['contenido'])?>" class="card-img-top" width="100%" height="225" >
                    </a>
                </div>
            </div>
            <div class="card-body">
                <h5 class="Cartas_Titulos"> <?php echo $filas['nombre'] ?></h5>
                <h6 class="Cartas_Intructor">Por <?php echo $filas['nombrecompleto'] ?>.</h6>
                <center>
                    <div class="pie-carta">
                        <a class="boton3" href="#">Comprar $<?php echo $filas['costo'] ?> MXN</a>
                        
                    </div>
                </center>
            </div>
        </div>
    </div>
    <?php } ?>