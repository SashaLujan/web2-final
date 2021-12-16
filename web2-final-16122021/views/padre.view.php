<?php
require_once 'libs/smarty/Smarty.class.php';

class PadreView
{
    public $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
    }
}