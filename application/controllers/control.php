<?php
    class Control extends CI_Controller {
        function index() {
            $this->load->view("login");
        }
        
        function comprobar() {
            $usu = $this->input->get_post("nombre");
            $pass = $this->input->get_post("pass");
            $this->load->model("usuarios");
            $num = $this->usuarios->comprobarDatos($usu, $pass);
            if ($num == 0) {
                $data["error"] = "Datos incorrectos";
                $this->load->view("login", $data);
            }
            else $this->load->view("menu");
        }
    }
?>