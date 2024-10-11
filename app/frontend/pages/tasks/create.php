<?php 
    require __DIR__ . '/../../../backend/clases/Task.php';

    $task = new Task();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Crear Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <?php require_once __DIR__ . '/../../layouts/nav.php';  ?>   
    
    <div class="container p-4">
        <div class="card">
            <div class="card-header"><i class="fa fa-pencil"></i> Crear Tarea</div>
            <div class="card-body">
                <form method="POST" novalidate="" autocomplete="on" class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Titulo <small>*</small></label> 
                        <input type="text" class="form-control" id="task_create_name" name="name" >
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Descripcion <small>*</small></label> 
                        <textarea name="description" class="form-control" id="task_create_description"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Estado <small>*</small></label>
                        <select id="inputState" class="form-select" name="status_id">
                            <?php foreach ($task->obtenerEstados() as $status) {
                                echo '<option value="' . $status['id'] . '">' . $status['name'] . '</option>';
                            }?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Prioridad <small>*</small></label>
                        <select id="inputPriority" class="form-select" name="priority_id">
                            <?php foreach ($task->obtenerPrioridades() as $priority) {
                                echo '<option value="' . $priority['id'] . '">' . $priority['name'] . '</option>';
                            }?>
                        </select>
                    </div>
                    <div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <a href="/" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <?php require_once __DIR__ . '/../../layouts/footer.php';  ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if (isset($_SESSION['message'])): ?>
            toastr.error('<?php echo $_SESSION['message']; ?>');
            <?php unset($_SESSION['message']); // Elimina el mensaje ?>
        <?php endif; ?>
    </script>
</body>

</html>