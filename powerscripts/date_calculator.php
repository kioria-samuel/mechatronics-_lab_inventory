<?php
function return_date($period){
    date_default_timezone_set('Africa/Nairobi');//set kenyas timezone
    if($period=="short_term"){//add 1 day to todays date
      $futureDate = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));//create a uture date rom todyas date by adding 1 day to todays date
      $returnd=date("Y-m-d ", $futureDate);
    
    }elseif($period=="long_term"){//add  7 day to todays date
      $futureDate = mktime(0, 0, 0, date("m"), date("d")+7, date("Y"));//create a uture date rom todyas date by adding 7 day to todays date
      $returnd=date("Y-m-d ", $futureDate);
    }else{//add 63 day to todays date
      $futureDate = mktime(0, 0, 0, date("m"), date("d")+93, date("Y"));//create a uture date rom todyas date by adding 93 day to todays date
      $returnd=date("Y-m-d ", $futureDate);
    
    }
    return  $returnd;
}


?>