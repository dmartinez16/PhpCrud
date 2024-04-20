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
        <a class="btn btn-primary" href="/PruebaTec/create.php" role="button">Agregar Producto</a>
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
                </tr>
            </thead>
            <tbody>
            <?php 
                $servername = "localhost";
                $username = "root";
                $password = "Dilan";
                $database = "products";

                // Verificamos la conexión
                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Conexión fallida: " . $connection->connect_error);
                }

                $sql = "CALL ListarProductos()";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Error al ejecutar la consulta: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>" . $row['code'] . "</td>
                        <td>" . $row['createdAt'] . "</td>
                        <td>" . $row['fk_category'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['price'] . "</td>
                        <td>" . $row['updatedAt'] . "</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/PruebaTec/edit.php?id=" . $row['IdProduct'] . "'>Editar</a>
                            <a class='btn btn-danger btn-sm' href='/PruebaTec/delete.php?id=" . $row['IdProduct'] . "'>Eliminar</a>
                        </td>
                    </tr>
                    ";
                }

                $connection->close();
            ?>
            </tbody>
        </table>   
    </div>
</body>
</html>