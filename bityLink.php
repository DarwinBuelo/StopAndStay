<?php
function shortenURL($url)
{
    $login = 'danphilspain';
    $apiKey = 'R_c7dabbe395ee412cbf9e6f772583769d';
    $ch = curl_init('http://api.bitly.com/v3/shorten?login='.$login.'&apiKey='.$apiKey.'&longUrl='.$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $res = json_decode($result, true);
    echo $res['data']['url'];
}
//EOF