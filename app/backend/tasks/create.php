<?php
require __DIR__ . '/../clases/Task.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = new Task();

    //Validación
    if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['status_id']) || empty($_POST['priority_id']))  {
        $_SESSION['message'] = "Formulario incompleto.";
        header("Location: /create");
        exit();
    }

    $result = $task->create($_POST['name'], $_POST['description'], $_POST['status_id'], $_POST['priority_id']);

    if ($result === true) {
        header(header: "Location: /");
        exit();
    } else {
        header("Location: /create");
        exit();
    }

}
