    <?php
        require_once "Conecction.php";

        function getCategories() {
            $connection = getDatabaseConnection();
            $sql = "CALL ListarCategorias()";
            $result = $connection->query($sql);
            
            $categories = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $categories[] = $row;
                }
            }
            $connection->close();
            return $categories;
        }

        function getProducts() {
            $connection = getDatabaseConnection();
            $sql = "CALL ListarProductos()";
            $result = $connection->query($sql);
        
            $products = array();
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $products[] = $row;
                }
            } else {
                die("Error al ejecutar la consulta: " . $connection->error);
            }
        
            $connection->close();
            return $products;
        }

        function getProductId($productId) {
            $connection = getDatabaseConnection();
            $sql = "CALL BuscarProducto($productId)";
            $result = $connection->query($sql);
        
            $product = null;
            if ($result && $result->num_rows > 0) {
                $product = $result->fetch_assoc();
            } else {
                die("Error al ejecutar la consulta: " . $connection->error);
            }
        
            $connection->close();
            return $product;
        }

    ?>
