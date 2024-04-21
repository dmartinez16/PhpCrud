    <?php
    function getDatabaseConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "Dilan";
        $database = "products";

        // Verificamos la conexión
        $connection = new mysqli($servername, $username, $password, $database);

        if ($connection->connect_error) {
            die("Conexión fallida: " . $connection->connect_error);
        }

        return $connection;
    }

?>
