<?php
$access_token = 'fiAMHL0DOTlugChoT/1bTrhvrYT0YYAzdQlfgrlGXSA9ikf22lSN8xbYz7cKOSUpHgcedlVG4X/q4ErlYb1aLhu4oNeyy5Pyj4JHK/uX63abpbebuQrLqKWX3IV+xUKlN0JU6IfTY2bx1q00y6lg6QdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
