<?php
    function partition($n, $max_num = PHP_INT_MAX, $current = [], &$results = []){
        if($n == 0){
            $results[] = $current;
            return;
        }

        for($i = min($n, $max_num); $i >= 1; $i--){
            partition($n - $i, $i, array_merge($current, [$i]), $results);
        }
    }

    $input = trim(fgets(STDIN));
    $n = (int)$input;

    $results = [];

    partition($n, PHP_INT_MAX, [], $results);

    usort($results, function($a, $b){
        return array_reverse($a) <=> array_reverse($b);
    });

    foreach($results as $partition){
        echo implode(' ', $partition) . "\n";
    }
?>