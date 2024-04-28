<?php 
    $currentTimestamp = time();
    $formattedDate = date("Y-m-d", $currentTimestamp);
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
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Editar Producto</h2>
        <br>
        <form action="../Data/EditProduct.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $product['IdProduct']; ?>">
            <table class="table">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Fecha Modificiación</th>
                        <th>Codigo Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        echo "
                        <tr>
                            <td><input type='text' name='code' value='" . $product['code'] . "'></td>
                            <td><input type='text' name='name' value='" . $product['name'] . "'></td>
                            <td><input type='text' name='price' value='" . $product['price'] . "'></td>
                            <td><input type='text' name='updatedAt' value='" .$formattedDate . "'readonly></td>
                            <td>
                                <select class='form-select' name='fk_category' value='fk_category'>";
                                    
                                    require_once "../Data/DatabaseFunctions.php";
                                    $categories = getCategories();
                                    
                                    if (!empty($categories)) {
                                        echo '<option value="0">Seleccione una categoría</option>';
                                        foreach ($categories as $category) {
                                            $selected = ($category['IdCategoria'] == $product['fk_category']) ? "selected" : "";
                                            echo '<option value="' . $category['IdCategoria'] . '" '.$selected.'>' . $category['Nombre'] . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No hay categorías disponibles</option>';
                                    }
                                    
                                echo "
                                </select>
                            </td>
                        </tr>
                        ";
                    ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    <button type="submit" name="editar" class="btn btn-primary">Guardar Cambios</button>
                </div>
                <div class="col">
                    <a href="/PhpCrud/PruebaTec/Views/index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
