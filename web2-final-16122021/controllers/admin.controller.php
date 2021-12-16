<?php

class AdminController{
    function estaLogueado(){
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        if(isset($_SESSION['IS_LOGGED'])){
            $tipo = $_SESSION['tipo'];
            return $tipo;
        }
        return false;
    }

    function logout(){
        session_start();
        session_destroy();
    }
}