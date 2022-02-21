<?php

namespace App\Helper;

class Getname {
    public $fName;
    public $mName;
    public $lName;
   // public $fullName;

    public function getName($name)
    {
        $pieces = explode(" ", $name);
        $threeName = array_slice($pieces, 0, 3);
        if (count($threeName) === 1) {
            $this->fName = $threeName[0];
        } elseif (count($threeName) === 2) {
            $this->fName = $threeName[0];
            $this->mName = $threeName[1];
        } elseif (count($threeName) === 3) {
            $this->fName = $threeName[0];
            $this->mName = $threeName[1];
            $this->lName = $threeName[2];
        } else {
            echo 'error';
        }
    }
/*
        public function getFullName()
        {
            $fullName = $this->fName.' '.$this->mName.' '.$this->lName;
            $this->fullName = $fullName;
            return $this->fullName;
        }*/

}



