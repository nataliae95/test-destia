<?php 
    require __DIR__ . '/../../backend/clases/Task.php';

    $task = new Task();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
<?php require_once __DIR__ . '/../layouts/nav.php';  ?>   
        <div class="container mt-5">
            <div class="text-end mb-3">
                    <a href="/create" class="btn btn-primary">Crear Nueva Tarea</a>
            </div>
            <div class="row">
                <?php foreach ($task->obtenerTareas() as $task) { ?>
                    <div class="col-md-3">
                        <div class="card mb-3 shadow border-0" style="border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $task['name'] ?></h5>
                                <p class="card-text"><?php echo $task['description'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-secondary">Prioridad: <?php echo $task['priority'] ?></span>
                                </div>
                                <div class="mt-2">
                                    <span class="badge bg-<?php echo $task['status'] == 'Pendiente' ? 'warning text-dark' : 'success '; ?> ">Estado: <?php echo $task['status'] ?></span>
                                </div>
                            </div>
                            <div class="card-footer text-muted d-flex justify-content-between align-items-center small">
                                Creación: <span><?php echo $task['created_at'] ?></span>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editTaskModal" onclick="loadTaskData(<?php echo htmlspecialchars(json_encode($task), ENT_QUOTES, 'UTF-8'); ?>)"><i class="fa fa-pencil"></i></a>
                                    <?php require_once __DIR__ . '/tasks/edit.php';  ?>   
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div> 
        </div>  
        <?php require_once __DIR__ . '/../layouts/footer.php';  ?>   
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if (isset($_SESSION['message'])): ?>
            toastr.info('<?php echo $_SESSION['message']; ?>');
            <?php unset($_SESSION['message']); // Elimina el mensaje ?>
        <?php endif; ?>

        function loadTaskData(task) {
            $('#task_edit').val(task.id);
            $('#task_edit_name').val(task.name);
            $('#task_edit_description').val(task.description);
            $('#task_edit_status').val(task.status_id);
            $('#task_edit_priority').val(task.priority_id);
        }

        document.getElementById('editTaskForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevenir el comportamiento por defecto del formulario
    console.log('Formulario enviado'); // Diagnóstico

    const url = '/edit';
    const taskData = {
        id: $('#task_edit').val(),
        name: $('#task_edit_name').val(),
        description: $('#task_edit_description').val(),
        status_id: $('#task_edit_status').val(),
        priority_id: $('#task_edit_priority').val(),
    };

    console.log('Datos a enviar:', taskData); // Diagnóstico

    fetch(url, {
        method: "POST",
        body: JSON.stringify(taskData),
        headers: {
            "Content-Type": "application/json",
        },
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => {
                throw new Error(err.message || 'Error en la actualización');
            });
        }
        return response.json();
    })
    .then(response => {
        toastr.info("Tarea actualizada con exito");
        const modal = bootstrap.Modal.getInstance(document.getElementById('editTaskModal'));
        modal.hide();
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
        toastr.error("Error al actualizar la tarea");
    });
});

    </script>
</body>

</html>