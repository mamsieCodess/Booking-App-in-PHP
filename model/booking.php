<?php

include "hotel.php";

class Booking extends Hotel{


    //make the inputs
    //store the in $startDate and $endDate then stores session variables
    //then use at the booking page

    function calculateDays($startDate, $endDate) {

        // Calculating the difference in timestamps
        $difference = strtotime($startDate) - strtotime($endDate);
    
        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return abs(round($difference / 86400));
    }

    function amountDue($rate,$days){
        return $rate * $days;
    }
   

};
?>