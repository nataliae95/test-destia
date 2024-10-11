<?php

require __DIR__ . '/../config.php';

class Task
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

    public function create($name, $description, $status, $priority)
    {
        $stmt = $this->db->prepare("INSERT INTO tasks (name, description, status_id, priority_id, author_id) VALUES (?, ?, ?, ?, ?)");

        if ($stmt->execute([$name, $description, $status, $priority, $_SESSION['user_id']])) {
            $_SESSION['message'] = "Tarea creada exitosamente";
            return true;
        } else {
            return false;
        }
 
    }

    public function edit($name, $description, $status, $priority, $id)
    {
        $stmt = $this->db->prepare("UPDATE tasks SET name = ?, description = ?, status_id = ?, priority_id = ? WHERE id = ?");

        if($stmt->execute([$name, $description, $status, $priority, $id])){
            return true;
        }else{
            return false;
        }
 
    }

    public function assignment($user_id, $task_id, $action)
    {

        if ($action === 'assign') {
            $validate = $this->db->prepare("SELECT * FROM task_assignments WHERE user_id = ? and task_id = ?");
            $validate->execute([$user_id, $task_id]);
        
            if($validate->rowCount() == 0){
                $stmt = $this->db->prepare("INSERT INTO task_assignments (user_id, task_id) VALUES (?, ?");

                if ($stmt->execute([$user_id, $task_id])) {
                    $response = true;
                } else {
                    $response = false;
                }
            }    
        } elseif ($action === 'remove') {
            // Retirar tarea del usuario
            $stmt = $stmt = $this->db->prepare("DELETE FROM task_assignments WHERE user_id = ? and task_id = ?");
    
            if ($stmt->execute([$user_id, $task_id])) {
                $response = true;
            } else {
                $response = false;
            }
        }

        return $response;

    }

    public function obtenerTareas() {
        $stmt = $this->db->query("SELECT t.id, t.name, t.description, t.status_id, t.priority_id, s.name AS status, p.name AS priority, DATE(t.created_at) AS created_at    
                                    FROM tasks t 
                                    JOIN statuses s on s.id = t.status_id
                                    JOIN priorities p on p.id = t.priority_id
                                    ORDER BY p.level DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerEstados() {
        $stmt = $this->db->query("SELECT id, name FROM statuses");
        return $stmt->fetchAll();
    }

    public function obtenerPrioridades() {
        $stmt = $this->db->query("SELECT id, name FROM priorities");
        return $stmt->fetchAll();
    }
}