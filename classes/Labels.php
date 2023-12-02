<?php
class Labels{
    private $name;

    public function __construct($name){
        $this->name = $name;
    }
    function set_name($name) {
        $this->name = $name;
      }
    public function getName(){
        return "$this->name";
    }
}

?>