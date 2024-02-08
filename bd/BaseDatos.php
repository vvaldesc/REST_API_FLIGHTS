<?php


abstract class Basedatos { 
 private $conexion; 
 private $mensajeerror = ""; 
 
 
 # Conectar a la base de datos 
 public function getConexion() { 
 include $_SERVER['DOCUMENT_ROOT'].'/_servWeb/UT7_3_Actividad3_RESTFul_Servidor/config/config.php';
 try { 
 $this->conexion = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", 
 $username, $password); 
 $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
 return $this->conexion; 
 } catch (PDOException $e) { 
 $this->mensajeerror = $e->getMessage(); 
 } 
 } 
# Desconectar la base de datos 
 public function closeConexion() { 
 $this->conexion = null;
  }
# Devolver mensaje de error, por si hay error. 
 public function getMensajeError() { 
 return $this->mensajeerror; 
 } 
} 