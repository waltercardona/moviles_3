<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// GET all tasks

$app->get('/api/tasks', function(Request $request, Response $response){
    
    
    $sql = "SELECT * FROM tasks";
    try{
        $db = new db();
        $db = $db->conecctiondb();
        $resultado = $db->query($sql);
        if($resultado->rowCount() > 0){
            $clientes = $resultado->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($clientes);
        }else{
            echo json_decode("no existen clientes la base de datos");
        }
        $resultado = null;
        $db = null;
    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMassage().'}';
    }
});

// POST new tasks

$app->post('/api/tasks/new', function(Request $request, Response $response){
   
    $task = $request->getParam('task');
    $dates = $request->getParam('dates');
    
       
    
    $sql = "INSERT INTO tasks (task, dates) VALUES
            (:task, :dates )"; 
    try{
        $db = new db();
        $db = $db->conecctiondb();
        $resultado = $db->prepare($sql);

        $resultado->bindParam(':task', $task);
        $resultado->bindParam(':dates', $dates);
        

        $resultado->execute();
        
        echo json_encode("task saved");

        $resultado = null;
        $db = null;
    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMassage().'}';
    }
});

// PUT Modify tasks

$app->put('/api/tasks/modify/{id}', function(Request $request, Response $response){
    $id_cliente = $request->getAttribute('id');
    
    $task = $request->getParam('task');
    $dates = $request->getParam('dates');
    
    
    $sql = "UPDATE tasks SET
            task = :task,
            dates = :dates
            
            WHERE  id = $id_cliente";
    
    try{
        $db = new db();
        $db = $db->conecctiondb();
        $resultado = $db->prepare($sql);

        $resultado->bindParam(':task', $task);
        $resultado->bindParam(':dates', $dates);
        

        $resultado->execute();
        
        echo json_encode("Task Modify");


        $resultado = null;
        $db = null;
    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMassage().'}';
    }
});
// DELETE tasks

$app->delete('/api/tasks/delete/{id}', function(Request $request, Response $response){
    $id_cliente = $request->getAttribute('id');
    $sql = "DELETE FROM tasks WHERE  id = $id_cliente";
    
    try{
        $db = new db();
        $db = $db->conecctiondb();
        $resultado = $db->prepare($sql);
        $resultado->execute();
        
        if($resultado->rowCount() > 0){
            echo json_encode("tasks removed");
        }else{
            echo json_encode("There is no tasks with this id");
        }
       
        $resultado = null;
        $db = null;
    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMassage().'}';
    }
});