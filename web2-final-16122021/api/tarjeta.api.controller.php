<?php

require_once 'api.view.php';
require_once 'controller/tarjeta.controller.php';
require_once 'models/tarjeta.model.php';

class TrajetaApiController{
    private $model;
    private $view;
    private $data;

    function __construct(){
        $this->model = new ProductModel();
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");//trae el cuerpo(body en postman) para agregar el comentario
    }

    public function tarjetaXcliente($params = []){
        $cliente =  $params[':ID_CLIENTE'];
        $tarjetas =$this->model->tarjetaXcliente($cliente);
        if ($tarjetas) {
            $this->view->response($tarjetas);
        } else {
            $this->view->response("No tiene tarjetas",404);
        }
    }

    public function eliminarTarjeta($params = []){
        $id = $params[':ID'];
        $tarjeta=$this->model->borrarTarjeta($id);
        if ($tarjeta) {
            $this->view->response($tarjeta);
        } else {
            $this->view->response("No existe la tarjeta");
        }   
    }
}