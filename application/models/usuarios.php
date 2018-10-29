<?php 
    class Usuarios extends CI_Model {
        function comprobar_datos($usu, $pass) {
            $resul = $this->db->query("SELECT * FROM usuarios WHERE nombre = '$usu' AND passwd = '$pass'");
            return $resul->num_rows();
        }
    }
?>