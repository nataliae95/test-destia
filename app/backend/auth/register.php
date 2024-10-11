<?php
require __DIR__ . '/../clases/Auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $auth = new Auth();

    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);

    if (empty($_POST['email']) || empty($_POST['password'] || empty($_POST['name']))) {
        $_SESSION['message'] = "Información incompleta.";
        header("Location: /register");
        exit();
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Por favor, ingresa un correo electrónico válido.";
        header("Location: /login");
        exit();
    }

    $result =  $auth->register( $email, $password, $name);

    if ($result === true) {
        $auth->authenticate($email, $password);
        header("Location: /");
        exit();
    } else {
        header("Location: /register");
        exit();
    }
}
