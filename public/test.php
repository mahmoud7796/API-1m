<?php

class Mada {
    public function __construct($mada)
    {
        echo $mada;
    }
    public function __invoke($arg = null)
    {
        echo $arg."mada";
    }

}


