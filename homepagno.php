<?php
include("Sesioniniciada/controladores/conexion.php");
$consulta = "CALL sp_GestionProductos('Ver Solo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
$resultado = mysqli_query($conexion, $consulta);

$ultimosProductosQuery = "SELECT pv.id_producto_vendedor, pv.nombre,  pv.vendedor , pv.costo, pv.descripcion, pv.cantidad_disponible, pv.categoria
                          FROM PRODUCTO_VENDEDOR pv 
                          LEFT JOIN imagen_producto i ON pv.id_producto_vendedor = i.producto
                          GROUP BY pv.id_producto_vendedor
                          ORDER BY pv.nombre DESC
                          LIMIT 4";

$ultimosProductosResult = $conexion->query($ultimosProductosQuery);

?>


<section class="container-products" >
    <?php
    while ($row_producto = $ultimosProductosResult->fetch_assoc()) {
        echo "<div class='product'>
                <img src='../Sesioniniciada/" . $row_producto['Imagen'] . "' alt='' class='product__img'>
                <div class='product__description'>
                   <h3 class='product__title'>" . $row_producto['NombreProduct'] . "</h3>
                    <span class='product__price'>$" . $row_producto['Precio'] . "</span> 
                </div>
                <i class='product__icon fa-solid fa-cart-plus'></i>
            </div>";
    }
    echo "</section>";
    $conexion->close();
    ?>


</section>