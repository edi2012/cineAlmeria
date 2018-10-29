<?php
    class Control extends CI_Controller {
        function index() {
            $this->load->view("login");
        }
        
        function show_lista() {
            $this->load->view("lista");
        }
        
        function show_insertar() {
            $this->load->view("insertar");
        }
        
        function comprobar() {
            $usu = $this->input->get_post("nombre");
            $pass = $this->input->get_post("pass");
            $this->load->model("usuarios");
            $num = $this->usuarios->comprobar_datos($usu, $pass);
            if ($num == 0) {
                $data["error"] = "Datos incorrectos";
                $this->load->view("login", $data);
            }
            else $this->load->view("menu");
        }
    }
?>