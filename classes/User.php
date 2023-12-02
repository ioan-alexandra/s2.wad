<?php
class User{
    private $name;
    private $email;
    private $password;
    private $phone_number;

    public function __construct($name, $email, $phone_number, $password){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone_number = $phone_number;
    }
    function set_name($name) {
        $this->name = $name;
      }
    public function getEmail(){
        return "$this->email";
    }
    public function getPassword(){
        return "$this->password";
    }
    public function getName(){
        return "$this->name";
    }
}

?>