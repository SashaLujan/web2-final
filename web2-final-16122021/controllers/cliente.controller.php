<?php
require_once 'cliente.model.php';
require_once 'admin.controller.php';
require_once 'actividad.model.php';

class ClienteController{
    private $actividadModel;
    private $clienteModel;
    private $clienteView;
    private $user;

    public function __constructor(){
        $this->$actividadModel = new ActividadModel();
        $this->$clienteModel = new ClienteModel();
        $this->$clienteView = new ClienteView();
        $this->$user = new AdminController();
    }

    // 1- alta de cliente

    public function agregarCliente(){
        $logueado = $this->user->estaLogueado();
        if($logueado == 'admin'){
            $nombre = $_POST['nombre']; 
            $dni = $_POST['dni']; 
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $ejecutivo = $_POST['ejecutivo']; 
            if(empty($nombre) || empty($dni) || empty($telefono) || empty($direccion) || empty($ejecutivo)){
                $this->clienteView->mostrarError("por favor complete todos los campos");die;
            }
            else{
                $cliente->$this->clienteModel->clienteXdni($dni);
                if(!empty($cliente)){
                    $this->clienteView->mostrarError("ya existe ese dni");die;
                }
            }
            $cliente = $this->clienteModel->insertarCliente($nombre, $dni, $telefono, $direccion, $ejecutivo);
            if($cliente){
                $this->clienteView->mostrarCartel("se agrego correctamente el cliente");
            }
            if($cliente){
                $this->clienteModel->insertarDeposito($km);
            }
            if($ejecutivo==true){
                $this->cardHelper->getBussinesCard();
            }
        }
    }

    // 2- resumen de cuenta

    public function tablaResumen(){
        $clientes = $this->clienteModel->cliente($id);
        foreach($clientes as $cliente){
            //errores
            //lista tipo operaciones, saldo actual
            $actividades = $this->clienteModels->operacionesYsaldo($cliente)
            foreach($actividades as $actividad){
                $this->clienteView->mostrarOperacionesYsaldo($actividad);
            }
            //lista de tarjetas
            $tarjetas = $this->clienteModel->tarjetasXcliente($cliente->id);
            foreach($tarjetas as $tarjeta){
                $this->clienteView->mostrarTarjetas($tarjeta);
            }
        }
    }

    // 3- transferencia rapida - sin terminar

    public function transferencia(){
        $logueado = $this->user->estaLogueado();
        if($logueado == 'admin'){
            $cliente = $this->clienteModel->cliente($id);
            $saldo = $this->actividadModel->tieneSaldo($id);
            if(empty($saldo)){
                $this->clienteView->mostrarError("no tiene saldo");die;
            }
        }
    }
}