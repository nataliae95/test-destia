<?php
session_start();

$requestUri = explode('?', $_SERVER['REQUEST_URI'], 2);
$route = $requestUri[0];

switch ($route) {
    case '/':
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }
        include 'app/frontend/pages/dashboard.php';
        break;

    case '/register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include 'app/backend/auth/register.php';
        } else {
            include 'app/frontend/pages/auth/register.php';
        }
        break;
    case '/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include 'app/backend/auth/login.php';
        } else {
            include 'app/frontend/pages/auth/login.php';
        }
        break;

    case '/logout':
        include 'app/backend/auth/logout.php';
        break;

    case '/create':
        if(isset($_SESSION['user_id'])){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                include 'app/backend/tasks/create.php';
            } else {
                include 'app/frontend/pages/tasks/create.php';
            }
        }else{
            header("Location: /");
        }
        
        break;
    
    case '/edit':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                include 'app/backend/tasks/edit.php';
            } else {
                include 'app/frontend/pages/tasks/create.php';
            }
            break;
        
    default:
        header("Location: /");
        break;
}
