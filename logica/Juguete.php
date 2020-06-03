<?php
require_once "persistencia/Conexion.php";
require_once "persistencia/JugueteDAO.php";
class Juguete{
    private $idJuguete;
    private $nombre;
    private $cantidad;
    private $material;
    private $conexion;
    private $jugueteDAO;
    
    public function getIdJuguete(){
        return $this -> idJuguete;
    }
    
    public function getNombre(){
        return $this -> nombre;
    }
    
    public function getCantidad(){
        return $this -> cantidad;
    }

    public function getMaterial(){
        return $this -> material;
    }
        
    public function Juguete($idJuguete = "", $nombre = "", $cantidad = "", $material = ""){
        $this -> idJuguete = $idJuguete;
        $this -> nombre = $nombre;
        $this -> cantidad = $cantidad;
        $this -> material = $material;
        $this -> conexion = new Conexion();
        $this -> jugueteDAO = new jugueteDAO($this -> idJuguete, $this -> nombre, $this -> cantidad, $this -> material);
    }
    
    public function insertar(){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> jugueteDAO -> insertar());        
        $this -> conexion -> cerrar();        
    }
    
    public function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> jugueteDAO -> consultarTodos());
        $juguetes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $p = new Juguete($resultado[0], $resultado[1], $resultado[2], $resultado[3]);
            array_push($juguetes, $p);
        }
        $this -> conexion -> cerrar();        
        return $juguetes;
    }
    
    public function consultarPaginacion($cantidad, $pagina){
        $this -> conexion -> abrir();        
        $this -> conexion -> ejecutar($this -> jugueteDAO -> consultarPaginacion($cantidad, $pagina));
        $juguetes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $p = new Juguete($resultado[0], $resultado[1], $resultado[2], $resultado[3]);
            array_push($juguetes, $p);
        }
        $this -> conexion -> cerrar();
        return $juguetes;
    }
    
}

?>