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
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $this->load->library('upload' ,$config);
            $this->upload->do_upload('userfile');
            $titulo = $_REQUEST["titInsPel"];
            $anio = $_REQUEST["anioInsPel"];
            $pais = $_REQUEST["paisInsPel"];
            $cartel = "uploads\\" . $this->upload->data('file_name');
            $num = $this->usuarios->insert_pelicula($titulo, $anio, $pais, base_url($cartel));
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
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $this->load->library('upload' ,$config);
            $this->upload->do_upload('userfile');
            $descripcion = $_REQUEST["descInsLoc"];
            $foto = "uploads\\" . $this->upload->data('file_name');
            $lugar = $_REQUEST["lugar"];
            $pelicula = $_REQUEST["pelicula"];
            $num = $this->usuarios->insert_localizacion($descripcion, base_url($foto), $lugar, $pelicula);
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
        
        function confirm_delete_lugares() {
            $id = $_REQUEST["idLug"];
            $num = $this->usuarios->delete_lugar($id);
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
        
        function confirm_delete_peliculas() {
            $id = $_REQUEST["idPel"];
            $num = $this->usuarios->delete_pelicula($id);
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
        
        function confirm_delete_localizaciones() {
            $id = $_REQUEST["idLoc"];
            $num = $this->usuarios->delete_localizacion($id);
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
        
        function test($q) {
            // Array with names
            $usuarios = $this->usuarios->get_usuario();

            // get the q parameter from URL
            $hint = "";

            // lookup all hints from array if $q is different from ""
            if ($q != "") {
                foreach($usuarios as $name) {
                        if ($q == $name["nombre"]) {
                            $hint = "Ese usuario existe!";
                        } else {
                            $hint = "Ese usuario no existe!";
                        }
                }
            }
            // Output "no suggestion" if no hint was found or output correct values
            echo $hint;
        }
        
        function cerrar_sesion() {
            $this->session->destroy();
        }
    }
