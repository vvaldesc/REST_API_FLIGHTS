<?php 
require_once ('./bd/Basedatos.php'); 
require_once ('./models/AeropuertoModel.php'); 
$dep = new AeropuertoModel(); 
@header("Content-type: application/json"); 
// Consultar GET 
// devuelve o 1 o todos, dependiendo si recibe o no parámetro 
if ($_SERVER['REQUEST_METHOD'] == 'GET') { 
 if (isset($_GET['id'])) { 
 $res = $dep->getUnDepartamento($_GET['id']); 
 echo json_encode($res); 
 exit(); 
 } else { 
 $res = $dep->getAll(); 
 echo json_encode($res); 
 exit(); 
 } 
} 
// Crear un nuevo reg POST 
// Los campos del array que venga se deberán llamar como los campos de la tabla Departamentos 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
 // se cargan toda la entrada que venga en php://input 
 $post = json_decode(file_get_contents('php://input'), true); 
 $res = $dep->guardar($post); 
 $resul['resultado'] = $res; 
 echo json_encode($resul); 
 exit(); 
} 
// Actualizar PUT, se reciben los datoc como en el put 
// Los campos del array que venga se deberán llamar como los campos de la tabla Departamentos 
if ($_SERVER['REQUEST_METHOD'] == 'PUT') { 
 $post = json_decode(file_get_contents('php://input'), true); 
 $res = $dep->actualiza($post); 
 $resul['mensaje'] = $res; 
 echo json_encode($resul); 
 exit(); 
} 
// Borrar DELETE 
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') { 
 $id=$_GET['id']; 
 $res = $dep->borrar($id); 
 $resul['resultado'] = $res; 
 echo json_encode($resul); 
 exit(); 
} 
// En caso de que ninguna de las opciones anteriores se haya ejecutado 
header("HTTP/1.1 400 Bad Request"); 