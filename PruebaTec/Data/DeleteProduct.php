    <?php
    require_once "../Data/Conecction.php";
    $connection = getDatabaseConnection();

        if(isset($_GET["eliminar"])) {
            $idProducto = $_GET["id"];
            echo "ID del producto a eliminar: " . $idProducto; // Mensaje de depuración

            $query = "CALL EliminarProducto(?);";
            $sentencia = mysqli_prepare($connection, $query);

            if ($sentencia === false) {
                echo "Error al preparar la consulta: " . mysqli_error($connection);
                exit();
            }

            mysqli_stmt_bind_param($sentencia, "i", $idProducto);
            mysqli_stmt_execute($sentencia);
            $EditTrue = mysqli_stmt_affected_rows($sentencia);

            if ($EditTrue == 1){
                echo "<script>alert('El producto fue eliminado exitosamente'); location.href = '../Views/index.php';</script>";
            } else {
                echo "<script>alert('El producto no fue eliminado exitosamente');</script>";
            }

            mysqli_stmt_close($sentencia);
            mysqli_close($connection);
        } else {
            echo "El parámetro 'eliminar' no está presente en la URL"; // Mensaje de depuración
        }
    ?>
