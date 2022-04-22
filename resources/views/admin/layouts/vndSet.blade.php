<?php
    function VndDot($strNum){
        $len = strlen($strNum);
        $counter = 3;
        $result = "";
        while ($len - $counter >= 0){
            $con = substr($strNum, $len - $counter , 3);
            $result = '.'.$con.$result;
            $counter+= 3;
        }
        $con = substr($strNum, 0 , 3 - ($counter - $len) );
        $result = $con.$result;
        if(substr($result,0,1)=='.'){
            $result=substr($result,1,$len+1);    
        }
        return $result;
    }
    function strToArray($pizza){
        $pieces = explode(", ", $pizza);
        return $pieces;
    }
?>