<?php
class usuari{
    //Atributs pivats
    private $id;
    private $email;
    private $pass;
    private $timestamp;
    //constructor
    public function __construct(){
    $this->id=0;
    $this->email="";
    $this->pass="";
    $this->timestamp="";
    }
//Fer en tots
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getPass(){
        return $this->pass;
    }
    public function setPass($pass){
        $this->pass=$pass;
    }
}
?>