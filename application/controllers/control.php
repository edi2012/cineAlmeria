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
        
        function confirm_insert_lugar() {
            $nombre = $_REQUEST["nombInsLug"];
            $descripcion = $_REQUEST["descInsLug"];
            $longitud = $_REQUEST["longInsLug"];
            $latitud = $_REQUEST["latInsLug"];
            $num = $this->usuarios->insert_lugar($nombre, $descripcion, $longitud, $latitud);
            if ($num != 0) {
                $data["tablas"] = $this->usuarios->get_tablas();
                $data["nombre_vista"] = "menu";
                $this->load->view("plantilla", $data);
            }
            else {
                $data["nombre_vista"] = "menu";
                $data["tablas"] = $this->usuarios->get_tablas();
                $data["error"] = "Datos introducidos incorrectos";
                $this->load->view("plantilla", $data);
            }
        }
        
        function confirm_insert_peliculas() {
            $titulo = $_REQUEST["titInsPel"];
            $anio = $_REQUEST["anioInsPel"];
            $pais = $_REQUEST["paisInsPel"];
            $cartel = $_REQUEST["cartInsPel"];
            $num = $this->usuarios->insert_pelicula($titulo, $anio, $pais, $cartel);
            if ($num != 0) {
                $data["tablas"] = $this->usuarios->get_tablas();
                $data["nombre_vista"] = "menu";
                $this->load->view("plantilla", $data);
            }
            else {
                $data["nombre_vista"] = "menu";
                $data["tablas"] = $this->usuarios->get_tablas();
                $data["error"] = "Datos introducidos incorrectos";
                $this->load->view("plantilla", $data);
            }
        }
        
        function confirm_insert_localizaciones() {
            $nombre = $_REQUEST["nombInsLug"];
            $descripcion = $_REQUEST["descInsLug"];
            $longitud = $_REQUEST["longInsLug"];
            $latitud = $_REQUEST["latInsLug"];
            $num = $this->usuarios->insert_lugar($nombre, $descripcion, $longitud, $latitud);
            if ($num != 0) {
                $data["tablas"] = $this->usuarios->get_tablas();
                $data["nombre_vista"] = "menu";
                $this->load->view("plantilla", $data);
            }
            else {
                $data["nombre_vista"] = "menu";
                $data["tablas"] = $this->usuarios->get_tablas();
                $data["error"] = "Datos introducidos incorrectos";
                $this->load->view("plantilla", $data);
            }
        }
        
        function cerrar_sesion() {
            $this->session->destroy();
        }
    }
