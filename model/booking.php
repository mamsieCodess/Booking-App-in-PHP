<?php


class Booking {
    private $customerId;
    private $hotelId;
    private $checkinDate;
    private $checkoutDate;

    function __construct($customerId,$hotelId,$checkinDate,$checkoutDate)
    {
        $this->customerId = $customerId;
        $this->hotelId = $hotelId;
        $this->checkinDate = $checkinDate;
        $this->checkoutDate = $checkoutDate;
    }
    public function setCustomerId($customerId){
        $this->customerId = $customerId;
        return $this;
    }

    public function getCustomerId(){
        return $this->customerId;
    }

    public function setHotelId($hotelId){
        $this->hotelId = $hotelId;
        return $this;
    }

    public function getHotelId(){
        return $this->hotelId;
    }

    public function setCheckinDate($checkinDate){
        $this->checkinDate = $checkinDate;
        return $this;
    }

    public function getCheckinDate(){
        return $this->checkinDate;
    }

    public function setCheckoutDate($checkoutDate){
        $this->checkoutDate = $checkoutDate;
        return $this;
    }

    public function getCheckoutDate(){
        return $this->checkoutDate;
    }
};

?>