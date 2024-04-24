<?php $category ="";?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
    <div class="container my-5">
        <h2>Nuevo Producto</h2>

        <form method="post" action="../Data/InsertProduct.php">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Código</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="code" value="PRD">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Precio</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Fecha de creación</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control datepicker" name="createdAt" value="">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Fecha de modificación</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control datepicker" name="updatedAt" value="">
                </div>
            </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Categoría</label>
                        <div class="col-sm-6">
                            <select class="form-select" name="fk_category" value="fk_category">
                            <?php 
                                require_once "C:/xampp/htdocs/PhpCrud/PruebaTec/Data/DatabaseFunctions.php";
                                
                                $categories = getCategories();
                                
                                if (!empty($categories)) {
                                    echo '<option value="0">Seleccione una categoría</option>';
                                    foreach ($categories as $category) {
                                        echo '<option value="' . $category['IdCategoria'] . '">' . $category['Nombre'] . '</option>';
                                    }
                                } else {
                                    echo '<option value="">No hay categorías disponibles</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" name="registrar" value="registrar" class="btn btn-primary">Registrar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <button type="button" onclick="window.location.href='/PhpCrud/PruebaTec/Views/index.php'" class="btn btn-danger">Cancelar</button>
                </div>
</div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        // Inicializar datepicker para los campos de fecha
        $(".datepicker").datepicker({
            dateFormat: 'yy-mm-dd' // Formato de fecha: AAAA-MM-DD
        });
    });
</script>
</html>