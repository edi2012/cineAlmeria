<?php 
    class Usuarios extends CI_Model {
        function comprobarDatos($usu, $pass) {
            $usu = $this->db->get("usuarios");
            $usu = $this->db->where("nombre", $usu);
            $usu = $this->db->where("passwd", $pass);
            return $usu->num_rows();
        }
    }
?>