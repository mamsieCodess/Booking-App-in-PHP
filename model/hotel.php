<?php
class Hotel{
    //fields
    private $id;
    private $name;
    private $location;
    private $features;
    private $rate;
    private $image;

    //constructor
    public function __construct($id,$name,$location,$features,$rate,$image){
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->features = $features;
        $this->rate = $rate;
        $this->image = $image;
    }
    
    //methods
    public function setId($id){
        $this->id = $id;
        return $this;
       } 
       public function getId(){
       return $this->id;
       } 

   public function setName($name){
    $this->name = $name;
    return $this;
   } 
   public function getName(){
   return $this->name;
   } 
    
   public function setLocation($location){
    $this->location = $location;
    return $this;
   } 
   public function getLocation(){
   return $this->location;
   }
   public function setFeatures($features){
    $this->features = $features;
    return $this;
   } 
   public function getFeatures(){
   return $this->features;
   }
   public function setRate($rate){
    $this->rate = $rate;
    return $this;
   } 
   public function getRate(){
   return $this->rate;
   }

   public function setImage($image){
    $this->image = $image;
    return $this;
   } 
   public function getImage(){
   return $this->image;
   }

}
?>