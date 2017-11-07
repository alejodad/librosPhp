<?php


class CategoriaModelo {
    private $idCategoria;
    private $nombreCategoria;
    
    public function __construct() {
        $this->idCategoria = 0;
        $this->nombreCategoria = "";
    }
    
    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function getNombreCategoria() {
        return $this->nombreCategoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function setNombreCategoria($nombreCategoria) {
        $this->nombreCategoria = $nombreCategoria;
    }



}
