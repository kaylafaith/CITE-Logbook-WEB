<?php
 			  $json = file_get_contents('http://worldclockapi.com/api/json/est/now');
              $obj = json_decode($json);


              $getTimeStamp = $obj->currentDateTime;
              $dateText = new DateTime($getTimeStamp);

              $dateString = new DateTime($dateText->format('h:i A'));
              $dateStr = new DateTime($dateText->format('h:i A'));
              $dateString->modify("+12 hours");
              $dateStr-> modify("-12 hours");
              $date = $dateString->format("h:i A");
              $currDate = $dateStr->format("d-m-Y");
              $timeobject = new stdClass();
              $timeobject->timecurr = $date;
              $timeobject->date = strtotime($date);
              $timeobject->currDate = $currDate;
              echo json_encode($timeobject);
?>