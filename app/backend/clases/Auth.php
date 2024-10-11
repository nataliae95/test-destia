<?php

require __DIR__ . '/../config.php';

class Auth
{
    private $db;

    public function __construct()
    {
        $dbConfig = new DBConfig();
        $this->db = $dbConfig->getConnection();
    }

    public function getDb()
    {
        return $this->db;
    }

    public function authenticate($email, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if($stmt->rowCount() > 0){
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                // Guardar información del usuario en la sesión
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                return true;
            } else {
                $_SESSION['message'] = "Credenciales incorrectas";
            }
        }else{
            $_SESSION['message'] = "el usuario no existe";
        }

        return false;
 
    }

    public function register($email, $password, $name)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if($stmt->rowCount() == 0){
            $name = ucwords(strtolower($_POST['name']));
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insertar el nuevo usuario
            $stmt = $this->db->prepare("INSERT INTO users (email, password, name) VALUES (?, ?, ?)");
            if ($stmt->execute([$email, $hashedPassword, $name])) {
                return true;
            } else {
                $_SESSION['message'] = "Error al registrar al usuario.";
            }
        }else{
            $_SESSION['message'] = "El usuario ya existe";
        }
        return false;
    }

    public function obtenerUsuarios() {
        $stmt = $this->db->query("SELECT id, nombre FROM priorities");
        return $stmt->fetchAll();
    }

    
}