<?php 
    class Usuarios extends CI_Model {
        function comprobar_datos($usu, $pass) {
            $resul = $this->db->query("SELECT * FROM usuarios WHERE nombre = '$usu' AND passwd = '$pass'");
            return $resul->num_rows();
        }
        
        function get_tablas() {
            $r1 = $this->db->query("SELECT nombre, descripcion, longitud, latitud FROM lugares");
            $resul["lugares"] = array();
            foreach ($r1->result_array() as $fila) {
                $resul["lugares"][] = $fila;
            }
            $r2 = $this->db->query("SELECT titulo, anio, pais, cartel FROM peliculas");
            $resul["peliculas"] = array();
            foreach ($r2->result_array() as $fila) {
                $resul["peliculas"][] = $fila;
            }
            $r3 = $this->db->query("SELECT descripcion, fotografia, id_lugar, id_pelicula FROM localizaciones");
            $resul["localizaciones"] = array();
            foreach ($r3->result_array() as $fila) {
                $resul["localizaciones"][] = $fila;
            }
            return $resul;
        }
    }
