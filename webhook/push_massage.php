<?php

include( "../db_connect.php");

$access_token = 'suW/mT/hPfWpo34m+cEvA8Aw7Fx1cdJFlE+TqLeLAS6XN/kabbDOy7uGKnjyo5yToidSRtsi6enFU/d9u9fCnnELuuwe2cBtcxfSXiFt/lcYBfJRRkOwmHbO4LR9Wa/9CP4cQo+VCACj7Usz2cv8JlGUYhWQfeY8sLGRXgo3xvw=';
$arrayHeader = array();
$arrayHeader[] = "Content-Type: application/json";
$arrayHeader[] = "Authorization: Bearer {$access_token}";

$ticket_id = $_POST['ticket_id'];
$ticket_name =$_POST['ticket_name'];
$description = $_POST['description'];
$sc_code = $_POST['sc_code'];
$store_id = $_POST['store_id'];
$img = $_POST['img'];

$sql = "SELECT `username`,`usertoken`,`pictureUrl` FROM `User`";
$results = $conn->query($sql);
$arrayDB = [];

while($row = $results->fetch_array(MYSQLI_ASSOC)){
  $Info=[];
    array_push($Info, $row["username"]);
    array_push($Info, $row["usertoken"]);
    array_push($Info, $row["pictureUrl"]);
    array_push($arrayDB, $Info);
}
// print_r($arrayDB);
for ($i = 0; $i < count($arrayDB); $i++) {
  include('./FlexMassage/Bubble/Promotion_Ticket.php');
      $arrayPostData['messages'][0]=$jsonflex;
    
      print_r($arrayDB[$i][1]);
      $arrayPostData['to'] = $arrayDB[$i][1];
      replyMsg("https://api.line.me/v2/bot/message/push", $arrayHeader, $arrayPostData);
    
          
}



function replyMsg($url, $arrayHeader, $arrayPostData)
{
  $strUrl = $url;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $strUrl);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($ch);
  curl_close($ch);
}

function EncodeEmoji($inputemoji)
{
  $bin = hex2bin(str_repeat('0', 8 - strlen($inputemoji)) . $inputemoji);
  $emojiOutput = mb_convert_encoding($bin, 'UTF-8', 'UTF-32BE');
  return $emojiOutput;
}

?>
