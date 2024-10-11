<?php
require __DIR__ . '/../clases/Task.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = new Task();
    $input = json_decode(file_get_contents('php://input'), true);
    //Validación
    if (empty($input['name']) || empty($input['description']) || empty($input['status_id']) || empty($input['priority_id']))  {
        $_SESSION['message'] = "Formulario de actualización incompleto.";
        exit();
    }

    try {
        $result = $task->edit($input['name'], $input['description'], $input['status_id'], $input['priority_id'], $input['id']);
    } catch (\Throwable $th) {
        echo json_encode(['message' => $th->getMessage()]);
    }
    

    if ($result === true) {
        echo json_encode(['message' => 'tarea exitosa']);
        exit();
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(['message' => 'Error al actualizar la tarea.']);
        exit();
    }

}
