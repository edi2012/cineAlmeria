<?php

    include("security.php");
    class Control extends Security {
        function __construct() {
            parent::__construct();
            $this->load->model("usuarios");
        }
        
        function index() {
            $data["nombre_vista"] = "login";
            $this->load->view("plantilla", $data);
        }
        
        function comprobar() {
            $usu = $this->input->get_post("nombre");
            $pass = $this->input->get_post("pass");
            $num = $this->usuarios->comprobar_datos($usu, $pass);
            if ($num == 0) {
                $data["nombre_vista"] = "login";
                $data["error"] = "Datos incorrectos";
                $this->load->view("plantilla", $data);
            }
            else {
                $id = $this->usuarios->get_id($usu, $pass);
                $variablesSesion = array("idusr" => $id);
                $this->session->set_userdata($variablesSesion);
                $data["tablas"] = $this->usuarios->get_tablas();
                $data["nombre_vista"] = "menu";
                $this->load->view("plantilla", $data);
            }
        }
        
        function insert_lugar($nombre, $descripcion, $longitud, $latitud) {
            
        }
        
        function cerrar_sesion() {
            $this->session->destroy();
        }
    }
