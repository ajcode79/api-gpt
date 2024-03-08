<?php

//API KEY
$ajcode = "";


$prompt = $_GET['question'];
$endpoint = "https://api.openai.com/v1/engines/davinci-codex/completions";
$data = ["prompt" => $prompt,"max_tokens" => '100',"temperature" => '0.5',"n" => 1,"stop" => "\n"];
$headers = ["Content-Type: application/json","Authorization: Bearer " . $ajcode];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
if(curl_errno($ch)){echo "Error Description : " . curl_error($ch);}
curl_close($ch);
$responseData = json_decode($response, true);
$text = $responseData['choices'][0]['text'];
echo $text;
?>
