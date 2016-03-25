<?php
/**
 * Created by PhpStorm.
 * User: pixoria
 * Date: 25/3/2016
 * Time: 2:05 PM
 */

function get_true_random_number($min, $max) {
    // Validate parameters
    //$max = ((int) $max >= 1) ? (int) $max : 100;
    //$min = ((int) $min < $max) ? (int) $min : 1;
    // Curl options
    $options = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        //CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => '',
        CURLOPT_USERAGENT => 'PHP',
        CURLOPT_AUTOREFERER => true,
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT => 120,
        CURLOPT_MAXREDIRS => 10,
    ];
    // Curl init & run
    //https://www.random.org/integers/?num=1&min=1&max=100&col=1&base=10&format=html&rnd=new


    $ch = curl_init('http://www.random.org/integers/?num=1&min='
        . $min . '&max=' . $max . '&col=1&base=10&format=plain&rnd=new');
    curl_setopt_array($ch, $options);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}

$draw = get_true_random_number(1,100);

echo $draw;

?>