<?php

require_once 'padre.model';

class ClienteModel extends PadreModel{
    public function clienteXdni($dni){
        $sentencia=$this->db->prepare('SELECT * FROM cliente WHERE dni=?');
        $sentencia->execute([$dni]);
        $respuesta=$sentencia->fetch(PDO::FETCH_OBJ);
        return $respuesta;
    }

    public function insertarCliente($nombre, $dni, $telefono, $direccion, $ejecutivo){
        $sentencia=$this->db->prepare('INSERT INTO cliente(nombre, dni, telefono, direccion, ejecutivo) VALUES(?,?,?,?,?)');
        $sentencia->execute([$nombre, $dni, $telefono, $direccion, $ejecutivo]);
        $respuesta=$sentencia->fetch(PDO::FETCH_OBJ);
        return $respuesta;
    }

    public function insertarDeposito($km){
        $sentencia=$this->db->prepare('INSERT INTO actividad(kms) VALUES(?)');
        $sentencia->execute([$km]);
        $respuesta=$sentencia->fetch(PDO::FETCH_OBJ);
        return $respuesta;
    }

    public function cliente($id){
        $sentencia=$this->db->prepare('SELECT * FROM cliente WHERE id=?');
        $sentencia->execute([$id]);
        $respuesta=$sentencia->fetch(PDO::FETCH_OBJ);
        return $respuesta;
    }

    public function tarjetasXcliente($cliente){
    $sentencia=$this->db->prepare('SELECT tarjeta.nro_tarjeta,tarjeta.fecha_vencimiento, tarjeta.id_cliente, cliente.nombre FROM tarjeta JOIN cliente
                                    ON tarjeta.id_cliente = cliente.id WHERE cliente.id=?');
    $sentencia->execute([$cliente]);
    $respuesta=$sentencia->fetchAll(PDO::FETCH_OBJ);
    return $respuesta;
    }

    public function operacionesYsaldo($cliente){
        $sentencia=$this->db->prepare('SELECT actividad.tipo_operacion, actividad.kms, actividad.id_cliente, cliente.nombre FROM actividad JOIN cliente
                                    ON actividad.id_cliente = cliente.id WHERE cliente.id=?');
        $sentencia->execute([$cliente]);
        $respuesta=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $respuesta;
    }
}