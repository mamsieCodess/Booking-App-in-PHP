<?php

//link to the database and echo them in the app ?????
class User{
    //fields
    private $firstname;
    private $surname;
    private $email;
    private $password;

    //constructor
    public function __construct($firstname,$surname,$email,$password)
    {
       $this->firstname = $firstname;
       $this->surname = $surname;
       $this->email = $email;
       $this->password = $password; 
    }

    //methods
    public function setFirstname($firstname){
        $this->firstname = $firstname;
        return $this;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function setSurname($surname){
        $this->surname = $surname;
        return $this;
    }
    
    public function getSurname(){
        return $this->surname;
    }
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
    
    public function getEmail(){
        return $this->email;
    }
    public function setPassword($password){
        $this->password = $password;
        return $this;
    }
    
    public function getPassword(){
        return $this->password;
    }

}