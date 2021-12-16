<?php
 
require_once 'padre.view.php';

class ClienteView extends PadreView{

    public function mostrarError($msg){
        $this->smarty->assign($msg);
        $this->smarty->display('mensajesErrores.tpl');
    }

    public function mostrarCartel($msg){
        $this->smarty->assign($msg);
        $this->smarty->display('mensajes.tpl');
    }

    public function mostrarOperacionesYsaldo($actividad){
        $this->smarty->assign('tipo_ope',$actividad->tipo_operacion);
        $this->smarty->assign('saldo',$actividad->kms);
        $this->smarty->assign('cliente',$actividad->id_cliente);
        $this->smarty->display('mostrarOperacionesYsaldo.tpl');
    }

    public function mostrarTarjetas($tarjeta){
        $this->smarty->assign('nro_tarjeta',$tarjeta->nro_tarjeta);
        $this->smarty->assign('añoVenc',$tarjeta->fecha_vencimiento);
        $this->smarty->assign('cliente',$tarjeta->id_cliente);
        $this->smarty->display('mostrarTarjetas.tpl');
    }
}