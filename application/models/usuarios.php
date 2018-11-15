<?php 
    class Usuarios extends CI_Model {
        function comprobar_datos($usu, $pass) {
            $resul = $this->db->query("SELECT * FROM usuarios WHERE nombre = '$usu' AND passwd = '$pass'");
            return $resul->num_rows();
        }
        
        function get_id($usu, $pass) {
            $resul = $this->db->query("SELECT id FROM usuarios WHERE nombre = '$usu' AND passwd = '$pass'");
            $r = $resul->row();
            return $r;
        }
        
        function get_tablas() {
            $r1 = $this->db->query("SELECT * FROM lugares");
            $resul["lugares"] = array();
            foreach ($r1->result_array() as $fila) {
                $resul["lugares"][] = $fila;
            }
            $r2 = $this->db->query("SELECT * FROM peliculas");
            $resul["peliculas"] = array();
            foreach ($r2->result_array() as $fila) {
                $resul["peliculas"][] = $fila;
            }
            $r3 = $this->db->query("SELECT * FROM localizaciones");
            $resul["localizaciones"] = array();
            foreach ($r3->result_array() as $fila) {
                $resul["localizaciones"][] = $fila;
            }
            return $resul;
        }
        
        function insert_lugar($nombre, $descripcion, $longitud, $latitud) {
            $data = array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'longitud' => $longitud,
                'latitud' => $latitud
            );
            
            $this->db->insert('lugares', $data);
            
            return $this->db->affected_rows();
        }
        
        function insert_pelicula($titulo, $anio, $pais, $cartel) {
            $data = array(
                'titulo' => $titulo,
                'anio' => $anio,
                'pais' => $pais,
                'cartel' => $cartel
            );
            
            $this->db->insert('peliculas', $data);
            
            return $this->db->affected_rows();
        }
        
        function delete_lugar($id) {
            $this->db->delete('lugares', array('id' => $id));
            
            return $this->db->affected_rows();
        }
        
        function delete_pelicula($id) {
            $this->db->delete('peliculas', array('id' => $id));
            
            return $this->db->affected_rows();
        }
        
        function delete_localizacion($id) {
            $this->db->delete('localizaciones', array('id' => $id));
            
            return $this->db->affected_rows();
        }
    }
