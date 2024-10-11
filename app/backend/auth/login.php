<?php
require __DIR__ . '/../clases/Auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $auth = new Auth();
    //Validación
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['message'] = "Credenciales incompletas.";
        header("Location: /login");
        exit();
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Por favor, ingresa un correo electrónico válido.";
        header("Location: /login");
        exit();
    }

    //Funcion de Autenticación
    $result = $auth->authenticate( trim($_POST['email']), trim($_POST['password']));

    if ($result === true) {
        header("Location: /");
        exit();
    } else {
        header("Location: /login");
        exit();
    }

}
