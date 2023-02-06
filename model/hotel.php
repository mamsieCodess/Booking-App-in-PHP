<?php
class Hotel{
    //fields
    private $id;
    private $name;
    private $location;
    private $amenities;
    private $daily_rate;
    private $thumbnail;
    private $images;
    private $description;
    private $refundability;

    //constructor
    public function __construct($id,$name,$location,$amenities,$daily_rate,$thumbnail,$images,$description,$refundability){
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->amenities = $amenities;
        $this->daily_rate = $daily_rate;
        $this->thumbnail = $thumbnail;
        $this->images = $images;
        $this->description = $description;
        $this->refundability = $refundability;
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
   public function setamenities($amenities){
    $this->amenities = $amenities;
    return $this;
   } 
   public function getamenities(){
   return $this->amenities;
   }
   public function setdaily_rate($daily_rate){
    $this->daily_rate = $daily_rate;
    return $this;
   } 
   public function getdaily_rate(){
   return $this->daily_rate;
   }
   public function setThumbnail($thumbnail){
    $this->thumbnail = $thumbnail;
    return $this;
   } 
   public function getThumbnail(){
   return $this->thumbnail;
   }

   public function setImages($images){
    $this->images = $images;
    return $this;
   } 
   public function getImages(){
   return $this->images;
   }
   public function setDescription($description){
    $this->description = $description;
    return $this;
   } 
   public function getDescription(){
   return $this->description;
   }

   public function setRefundability($refundability){
    $this->refundability = $refundability;
    return $this;
   } 
   public function getRefundability(){
   return $this->refundability;
   }

   function calculateDays($startDate, $endDate) {

    // Calculating the difference in timestamps
    $difference = strtotime($startDate) - strtotime($endDate);

    // 1 day = 24 hours
    // 24 * 60 * 60 = 86400 seconds
    return abs(round($difference / 86400));
}

function amountDue($daily_rate,$days){
    return $daily_rate * $days;
}


}
?>