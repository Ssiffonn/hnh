<?php
    function createArr($n){
        $array = array();
        for($i=0; $i<$n; $i++){
            $tmpArr = array();
            $tmp = chekSize($array);
            for($j=0; $j<$tmp; $j++){
                $tmpArr[] = rand(-10, 10);
            }
            $array[] = $tmpArr;
        }
        return $array;
    }

    function chekSize($array){
        $n = rand(1, 10);
        for($i=0; $i<sizeof($array); $i++){
            if(sizeof($array[$i]) == $n){
                return chekSize($array);
            }
        }
        return $n;
    }
    
    function sortArr($array){
        for($i=0; $i<sizeof($array);$i++){
            if($i % 2 == 0){
                $array[$i] = SortAsc($array[$i],0,sizeof($array[$i])-1);
            }
            else{
                $array[$i] = SortDesc($array[$i]);
            }
        }
        return $array;
    }

    function SortAsc(&$array, $left, $right) {
        $l = $left;
        $r = $right;
        $center = $array[(int)($left + $right) / 2];
        
        while ($l <= $r){
            while ($array[$r] > $center){ 
                $r--;
            }
            
            while ($array[$l] < $center){ 
                $l++;
            }

            if ($l <= $r){
                if ($array[$l] > $array[$r]){
                    list($array[$r], $array[$l]) = array($array[$l], $array[$r]);
                }
                $l++;
                $r--;
            }
        }
        
        if ($r > $left){
            SortAsc($array, $left, $r); 
        }
        
        if ($l < $right){
            SortAsc($array, $l, $right);
        }

        return $array;
    }

    function SortDesc($array){
        $swap = true;
        while($swap){
            $swap = false;
            for($i = 0, $c = sizeof( $array ) - 1; $i < $c; $i++){
                if($array[$i] < $array[$i + 1]){
                    list($array[$i + 1], $array[$i]) = array($array[$i], $array[$i + 1]);
                    $swap = true;
                }
            }
        }
        return $array;
    }

    function show($array){
        for($i=0; $i<sizeof($array); $i++){
            echo "[";
            for($j=0; $j<sizeof($array[$i]); $j++){
                echo $array[$i][$j].", ";
            }
            echo "]";
        }
    }