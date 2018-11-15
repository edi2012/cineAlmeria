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
            $descripcion = $_REQUEST["descInsLoc"];
            $foto = $_REQUEST["fotInsLoc"];
            $lugar = $_REQUEST["lugar"];
            $pelicula = $_REQUEST["pelicula"];
            $num = $this->usuarios->insert_localizacion($descripcion, $foto, $lugar, $pelicula);
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
        
        function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload' ,$config);

                if (!$this->upload->do_upload('userfile'))
                {
                        $data["nombre_vista"] = "menu";
                        $data["tablas"] = $this->usuarios->get_tablas();
                        $data["error"] = "Datos introducidos incorrectos";
                    
                        $this->load->view('plantilla', $data);
                }
                else
                {
                        $data["nombre_vista"] = "menu";
                        $data["tablas"] = $this->usuarios->get_tablas();
                        $data["error"] = "Todo ok";
                        
                        $this->load->view('plantilla', $data);
                }
                
        }
        
        function cerrar_sesion() {
            $this->session->destroy();
        }
    }
