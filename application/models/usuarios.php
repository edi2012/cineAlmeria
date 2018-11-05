<?php 
    class Usuarios extends CI_Model {
        function comprobar_datos($usu, $pass) {
            $resul = $this->db->query("SELECT * FROM usuarios WHERE nombre = '$usu' AND passwd = '$pass'");
            return $resul->num_rows();
        }
        
        function get_tablas() {
            $resul = $this->db->query("SELECT nombre, descripcion, longitud, latitud FROM lugares");
            $resul = $this->db->query("SELECT titulo, anio, pais, cartel FROM peliculas");
            $resul = $this->db->query("SELECT descripcion, fotografia, id_lugar, id_pelicula FROM localizaciones");
        }
    }
