<?php
class JugueteDAO{
    private $idJuguete;
    private $nombre;
    private $cantidad;
    private $material;
       
    public function JugueteDAO($idJuguete = "", $nombre = "", $cantidad = "", $material = ""){
        $this -> idJuguete = $idJuguete;
        $this -> nombre = $nombre;
        $this -> cantidad = $cantidad;
        $this -> material = $material;
    }
       
    public function insertar(){
        return "insert into Juguete (nombre, cantidad, material)
                values ('" . $this -> nombre . "', '" . $this -> cantidad . "', '" . $this -> material . "')";
    }
    
    public function consultarTodos(){
        return "select idJuguete, nombre, cantidad, material
                from Juguete";
    }
    
    public function consultarPaginacion($cantidad, $pagina){
        return "select idJuguete, nombre, cantidad, material
                from Juguete
                limit " . (($pagina-1) * $cantidad) . ", " . $cantidad;
    }

}

?>