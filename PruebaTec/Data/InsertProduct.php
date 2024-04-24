    <?php
require_once "C:/xampp/htdocs/PhpCrud/PruebaTec/Data/Conecction.php"; 
$connection = getDatabaseConnection();

if(isset($_POST["registrar"])){
    $codigo = $_POST["code"];
    $nombre = $_POST["name"];
    $precio = $_POST["price"];
    $fecha_cre = $_POST["createdAt"];
    $fecha_mod = $_POST["updatedAt"];
    $categoria = $_POST["fk_category"];

$query = "CALL CrearProducto(?, ?, ?, ?, ?, ?);";
$sentencia = mysqli_prepare($connection,$query);

mysqli_stmt_bind_param($sentencia, "ssdssi", $codigo, $nombre, $precio, $fecha_cre, $fecha_mod,$categoria);
mysqli_stmt_execute($sentencia);
$InsertTrue = mysqli_stmt_affected_rows($sentencia);

if ($InsertTrue == 1){
    echo "<script>alert('El producto fue insertado exitosamente'); location.href = '../Views/index.php';</script>";
}
else{
    echo "<script>alert('El producto no fue insertado exitosamente');</script>";
}

mysqli_stmt_close($sentencia);
mysqli_close($connection);
}
    ?>