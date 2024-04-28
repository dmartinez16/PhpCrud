<?php 
    require_once "../Data/DatabaseFunctions.php";
    // Verifica si se ha pasado el ID del producto por GET
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $productId = $_GET['id'];
        $product = getProductId($productId);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="card">
            <h5 class="card-header bg-danger text-white">Confirmar Eliminación</h5>
            <div class="card-body">
                <p class="card-text">¿Está seguro de que desea eliminar el producto con el siguiente código y nombre?</p>
                <p class="card-text"><strong>Código:</strong> <?php echo $product['code']; ?></p>
                <p class="card-text"><strong>Nombre:</strong> <?php echo $product['name']; ?></p>
                <a class='btn btn-danger btn-sm' href='/PhpCrud/PruebaTec/Data/DeleteProduct.php?eliminar=true&id=<?php echo $product['IdProduct']; ?>'>Confirmar</a>
                <a class='btn btn-secondary btn-sm' href='/PhpCrud/PruebaTec/Views/index.php'>Cancelar</a>
            </div>
        </div>
    </div>
</body>
</html>
