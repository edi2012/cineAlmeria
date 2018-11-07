<?php
    class Security extends CI_Controller {
        function comprobar_login() {
            if (isset($this->session->idusr->id))
                $log = true;
            else $log = false;
            return $log;
        }
    }