<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alumnos
 *
 * @author paul_
 */
class alumnos {
    public $id;
    public $alumno;
    public $nombre;
    public $sexo;
    
    public function _construct($id, $alumno, $nombre, $sexo) {
        $this->id = $id;
        $this->alumno = $alumno;
        $this->nombre = $nombre;
        $this->sexo = $sexo;    
    }
    
    public static function consultar(){
        $mysquli = conectadb::dbmysql();
        $consulta = "select * from alumnos";
        echo ('br');
        
        $resultado = mysqli_query($mysquli, $consulta);
        if (!$resultado) {
            echo 'No pude realizar la consulta a la base';
            exit;
        }
        $listaAlumno = [];
        while ($alumno = mysqli_fetch_array($resultado)) {
            $listaAlumno[] = new alumnos($alumno['id'], $alumno['alumno'], $alumno['nombre'], $alumno['sexo']);
        }
        
        $mysquli->close;
        return $listaAlumno;
        
    }
}
