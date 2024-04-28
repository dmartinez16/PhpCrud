    <?php
        require_once "../Data/Conecction.php";
        $connection = getDatabaseConnection();

        if(isset($_POST["editar"])){
        $idProducto = $_POST["id"];
        $codigo = $_POST["code"];
        $nombre = $_POST["name"];
        $precio = $_POST["price"];
        $fecha_mod = $_POST["updatedAt"];
        $categoria = $_POST["fk_category"];

        $query = "CALL EditarProducto(?, ?, ?, ?, ?, ?);";
        $sentencia = mysqli_prepare($connection,$query);

        if ($sentencia === false) {
            echo "Error al preparar la consulta: " . mysqli_error($connection);
            exit();
        }

        mysqli_stmt_bind_param($sentencia, "issdsi",$idProducto ,$codigo, $nombre, $precio, $fecha_mod,$categoria);
        mysqli_stmt_execute($sentencia);
        $EditTrue = mysqli_stmt_affected_rows($sentencia);

        if ($EditTrue == 1){
        echo "<script>alert('El producto fue editado exitosamente'); location.href = '../Views/index.php';</script>";
        }
        else{
        echo "<script>alert('El producto no fue editado exitosamente');</script>";
        }

        mysqli_stmt_close($sentencia);
        mysqli_close($connection);
        }
    ?>