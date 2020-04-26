<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// GET all tasks

$app->get('/api/usuarios', function(Request $request, Response $response){
    
    
    $sql = "SELECT * FROM usuarios";
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

$app->post('/api/usuarios/new', function(Request $request, Response $response){
   
    $nombre = $request->getParam('nombre');
    $apellido = $request->getParam('apellido');
    $identificacion = $request->getParam('identificacion');
    $fecha_nacimiento = $request->getParam('fecha_nacimiento');
    $ciudad_residencia  = $request->getParam('ciudad_residencia');
    $barrio = $request->getParam('barrio');
    $celular = $request->getParam('celular');
    
    
       
    
    $sql = "INSERT INTO usuarios (nombre, apellido, identificacion, fecha_nacimiento, ciudad_residencia, barrio, celular ) VALUES
            (:nombre, :apellido, :identificacion, :fecha_nacimiento, :ciudad_residencia, :barrio, :celular )"; 
    try{
        $db = new db();
        $db = $db->conecctiondb();
        $resultado = $db->prepare($sql);

        $resultado->bindParam(':nombre', $nombre);
        $resultado->bindParam(':apellido', $apellido);
        $resultado->bindParam(':identificacion', $identificacion);
        $resultado->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $resultado->bindParam(':ciudad_residencia', $ciudad_residencia);
        $resultado->bindParam(':barrio', $barrio);
        $resultado->bindParam(':celular', $celular);
        

        $resultado->execute();
        
        echo json_encode("task saved");

        $resultado = null;
        $db = null;
    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMassage().'}';
    }
});

// PUT Modify tasks

$app->put('/api/usuarios/modificarusuario/{id}', function(Request $request, Response $response){
    $id_usuarios = $request->getAttribute('id');
    
    $nombre = $request->getParam('nombre');
    $apellido = $request->getParam('apellido');
    $identificacion = $request->getParam('identificacion');
    $fecha_nacimiento = $request->getParam('fecha_nacimiento');
    $ciudad_residencia  = $request->getParam('ciudad_residencia');
    $barrio = $request->getParam('barrio');
    $celular = $request->getParam('celular');
    
    
    
    
    $sql = "UPDATE usuarios SET
            nombre = :nombre,
            apellido = :apellido,
            identificacion = :identificacion,
            fecha_nacimiento = :fecha_nacimiento,
            ciudad_residencia = :ciudad_residencia,
            barrio = :barrio,
            celular = :celular
            
            
            WHERE  id = $id_usuarios";
    
    try{
        $db = new db();
        $db = $db->conecctiondb();
        $resultado = $db->prepare($sql);

        $resultado->bindParam(':nombre', $nombre);
        $resultado->bindParam(':apellido',$apellido);
        $resultado->bindParam(':identificacion',$identificacion);
        $resultado->bindParam(':fecha_nacimiento',$fecha_nacimiento);
        $resultado->bindParam(':ciudad_residencia',$ciudad_residencia);
        $resultado->bindParam(':barrio',$barrio);
        $resultado->bindParam(':celular',$celular);
        
        

        $resultado->execute();
        
        echo json_encode("Usuario modificado");


        $resultado = null;
        $db = null;
    }catch(PDOException $e){
        echo '{"error" : {"text":'.$e->getMassage().'}';
    }
});
// DELETE tasks

$app->delete('/api/usuarios/delete/{id}', function(Request $request, Response $response){
    $id_cliente = $request->getAttribute('id');
    $sql = "DELETE FROM usuarios WHERE  id = $id_cliente";
    
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