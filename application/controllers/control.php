<?php
    class Control extends CI_Controller {
        function index() {
            $this->load->view("login");
        }
        
        function comprobar($usu, $pass) {
            $num = $this->load->usuarios->getDatos($usu, $pass);
            echo "$num";
        }
    }
?>