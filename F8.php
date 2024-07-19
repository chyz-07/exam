<?php
    function these($s){
        $stack = [];
        $maxlength = 0;
        $index = -1;

        for($i = 0; $i <= strlen($s); $i++){
            if($s[$i] == '('){
                array_push($stack, $i);
            }else{
                if(empty($stack)){
                    $index = $i;
                }else{
                    array_pop($stack);
                    if(empty($stack)){
                        $maxlength = max($maxlength, $i - $index);
                    }else{
                        $maxlength = max($maxlength, $i - $stack[count($stack) - 1]);
                    }
                }
            }
        }

        return $maxlength;
    }

    $input = trim(fgets(STDIN));
    echo these($input) . "\n";
?>