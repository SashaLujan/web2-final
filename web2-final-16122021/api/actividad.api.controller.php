<?php
require_once 'api.view.php';
require_once 'controller/actividad.controller.php';
require_once 'models/actividad.model.php';

class ProdApiController{

    private $model;
    private $view;
    private $data;

    function __construct(){
        $this->model = new ProductModel();
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");//trae el cuerpo(body en postman) para agregar el comentario
    }

    public function historialActividades($params = []){
        $actividades = $params[':ID_CLIENTE'];
        

        $actividades = $this->model->gethistorial($actividades, $orden);

        $this->view->response($actividades);
    }
}