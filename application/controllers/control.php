<?php
    class Control extends CI_Controller {
        function index() {
            $data["nombre_vista"] = "login";
            $this->load->view("plantilla", $data);
        }
        
        function comprobar() {
            $usu = $this->input->get_post("nombre");
            $pass = $this->input->get_post("pass");
            $this->load->model("usuarios");
            $num = $this->usuarios->comprobar_datos($usu, $pass);
            if ($num == 0) {
                $data["nombre_vista"] = "login";
                $data["error"] = "Datos incorrectos";
                $this->load->view("plantilla", $data);
            }
            else {
                $data["nombre_vista"] = "menu";
                $this->load->view("plantilla", $data);
            }
        }
    }