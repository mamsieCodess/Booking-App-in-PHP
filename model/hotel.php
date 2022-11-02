<?php

class hotel{
    public $name;
    private $dailyRate;
    private $pool;
    private $bar;
    private $kidFriendly;
    private $breakfast;

    public function __construct($name,$dailyRate,$pool,$bar,$kidFriendly,$breakfast){
        $this->name->$name;
        $this->dailyRate = $dailyRate;
        $this->pool = $pool;
        $this->bar = $bar;
        $this->kidFriendly = $kidFriendly;
        $this->breakfast = $breakfast;
        
    }

    public function setDailyRate($dailyRate){
        $this->dailyRate = $dailyRate;
        return $this;
    }
    public function getDailyRate(){
        return $this->dailyRate;
    }

    public function setPool($pool){
        $this->pool = $pool;
        return $this;
    }
    public function getPool(){
        return $this->pool;
    }
    public function setBar($bar){
        $this->bar = $$bar;
        return $this;
    }
    public function getBar(){
        return $this->bar;
    }
    public function setKidFriendly($kidFriendly){
        $this->kidFriendly = $kidFriendly;
        return $this;
    }
    public function getKidFriendly(){
        return $this->kidFriendly;
    }
    public function setBreakfast($breakfast){
        $this->breakfast = $breakfast;
        return $this;
    }
    public function getBreakfast(){
        return $this->breakfast;
    }
}


?>