<?php 
    class usuarios extends CI_Model {
        function getLogin() {
            $usu = $this->db->get("usuarios");
            foreach ($usu->result_array() as $row) {
                  $list_users[] = $row;
              }
            return $list_users;
        }
    }
?>