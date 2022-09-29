<?php
     function sumTime(string $timeone, string $timetwo): string{
         $timeone = explode(':', $timeone);
         $timetwo = explode(':', $timetwo);
         echo $timeone."\n".$timetwo;
         $masssum = ['hour' => 0, 'minute' => 0, 'second' => 0];
         $key = 2;
         end($masssum);
         while ($key != -1) {
             $masssum[key($masssum)] = $timeone[$key] + $timetwo[$key];
             if(key($masssum) != 'hour'){
                 if($masssum[key($masssum)] >= 60){
                     $masssum[key($masssum)] = $masssum[key($masssum)] - 60;
                     $timeone[$key - 1] += 1;
                 }
             }else{
                 if($masssum[key($masssum)] >= 24)
                     $masssum[key($masssum)] = $masssum[key($masssum)] - 24;
             }
             prev($massum);//problem place!
             $key--;
         }
         return implode(':', $masssum);
     }
     echo sumTime($argv[1], $argv[2])."\n";
?>
