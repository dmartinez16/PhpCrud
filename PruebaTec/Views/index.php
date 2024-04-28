<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Lista de Productos</h2>
        <a class="btn btn-primary" href="/PhpCrud/PruebaTec/Views/FormCreate.php" role="button">Agregar Producto</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Fecha de creacion</th>
                    <th>Codigo Categoria</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Fecha Modificiación</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                require_once "../Data/DatabaseFunctions.php";
                $products = getProducts();
                
                foreach ($products as $product) {
                    echo "
                    <tr>
                        <td>" . $product['code'] . "</td>
                        <td>" . $product['createdAt'] . "</td>
                        <td>" . $product['fk_category'] . "</td>
                        <td>" . $product['name'] . "</td>
                        <td>" . $product['price'] . "</td>
                        <td>" . $product['updatedAt'] . "</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/PhpCrud/PruebaTec/Views/Edit.php?id=" . $product['IdProduct'] . "'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='/PhpCrud/PruebaTec/Views/Delete.php?id=" . $product['IdProduct'] . "'>Eliminar</a>
                        </td>
                    </tr>
                    ";
                }
            ?>
            </tbody>
        </table>   
    </div>
</body>
</html>