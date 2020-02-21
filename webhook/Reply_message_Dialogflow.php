<?php

include('../db_connect.php');
$accessToken = "suW/mT/hPfWpo34m+cEvA8Aw7Fx1cdJFlE+TqLeLAS6XN/kabbDOy7uGKnjyo5yToidSRtsi6enFU/d9u9fCnnELuuwe2cBtcxfSXiFt/lcYBfJRRkOwmHbO4LR9Wa/9CP4cQo+VCACj7Usz2cv8JlGUYhWQfeY8sLGRXgo3xvw=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
// $accessToken = getallheaders()['token'];
$json = file_get_contents('php://input');
$request = json_decode($json, true);
$queryText = $request["queryResult"]["queryText"];
$userId = $request['originalDetectIntentRequest']['payload']['data']['source']['userId'];
$replyToken = $request['originalDetectIntentRequest']['payload']['data']['replyToken'];
file_put_contents('.Dialogflow.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
$arrayHeader = array();
$arrayHeader[] = "Content-Type: application/json";

$arrayHeader[] = "Authorization: Bearer {$accessToken}";
$arrayPostData['replyToken'] = $replyToken;
$message =  explode(" : ",  $queryText);

if($message[0] == "ขอดูสินค้าจากMIND FACTORYทั้งหมดจ้า")
{


    $username = profile($userId, $accessToken)['displayName'];
    $pictureUrl = profile($userId, $accessToken)['pictureUrl'];

    $sql ="SELECT `usertoken` FROM `User` WHERE `usertoken` =  '$userId' ";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) ) {
        include("./FlexMassage/Image_maping/MainSale.php");
        $arrayPostData['messages'][0] = $jsonflex;
    }
   
    else {
        $sql2 = "INSERT INTO `User`(`ID`, `username`, `usertoken`, `pictureUrl`, `Ticket`) VALUES (NULL,'$username','$userId','$pictureUrl',0)";
        $result2 = $conn->query($sql2);
        if($result2){
            include("./FlexMassage/Image_maping/MainSale.php");
            $arrayPostData['messages'][0] = $jsonflex;
            $arrayPostData['messages'][1]['type'] = "text";
            $arrayPostData['messages'][1]['text'] = "ขอบคุณที่ติดตาม เราจะทำการส่งโปรโมชั่นพิเศษเฉพาะคุณ!! ";
            replyMsg($arrayHeader,$arrayPostData);
        }
    }


   
    replyMsg($arrayHeader,$arrayPostData);
} 
else if($message[0] == "ขอดูเสื้อเชิ้ตหน่อยจ้า"){
    include("./FlexMassage/Image_carousel/T-shirt.php");
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "มีเสื้อเชิ้ตหลายแบบเลยจ้า";
    $arrayPostData['messages'][1] = $jsonflex;
    replyMsg($arrayHeader,$arrayPostData);
} 
//2
else if($message[0] == "ขอดูเสื้อแขนสั้นหน่อยน้า"){
    include("./FlexMassage/Image_carousel/Short-clothes.php");
    $arrayPostData['messages'][0] = $jsonflex;
    replyMsg($arrayHeader,$arrayPostData);
} 
//3
else if($message[0] == "ขอดูเสื้อแขนยาวสวยๆน้าจ้า"){
    include("./FlexMassage/Image_carousel/Long-clothes.php");
    $arrayPostData['messages'][0] = $jsonflex;
    replyMsg($arrayHeader,$arrayPostData);
} 
//4
else if($message[0] == "ขอดูเครื่องประดับสวยๆหน่อยจ้า"){
    include("./FlexMassage/Image_carousel/Accessories.php");
    $arrayPostData['messages'][0] = $jsonflex;
    replyMsg($arrayHeader,$arrayPostData);
} 
//5
else if($message[0] == "ขอดูชุดเดรสสวยๆใส่ได้ทุกเทศกาลหน่อยจ้า"){
    include("./FlexMassage/Image_carousel/Dress.php");
    $arrayPostData['messages'][0] = $jsonflex;
    replyMsg($arrayHeader,$arrayPostData);
} 
//6
else if($message[0] == "ขอดูกางเกง&กระโปรงน่ารักๆหน่อยน้า"){
    include("./FlexMassage/Image_carousel/Pants&skirt.php");
    $arrayPostData['messages'][0] = $jsonflex;
    replyMsg($arrayHeader,$arrayPostData);
}
else if($message[0] == "ข้อมูลสินค้า"){
    $sql = "SELECT * FROM `Store` WHERE id = $message[1]";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {   
        include("./FlexMassage/Bubble/Productdetail.php");
        $arrayPostData['messages'][0] = $jsonflex;
        replyMsg($arrayHeader,$arrayPostData);
        }
        
    } 
}
else if($message[0] == "รายละเอียดสินค้า"){
    $sql = "SELECT * FROM `Store` WHERE id = $message[1]";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            include("./FlexMassage/Bubble/Product_Store.php");
            $arrayPostData['messages'][0] = $jsonflex;
            replyMsg($arrayHeader,$arrayPostData);
        }
        
    } 
}else if($message[0] == "Contact us"){
            include("./FlexMassage/Bubble/Contact_us.php");
            $arrayPostData['messages'][0] = $jsonflex;
            replyMsg($arrayHeader,$arrayPostData);
}else if($message[0] == "สินค้าจัดโปรโมชั่นตามเทศกาล"){
    include("./FlexMassage/Image_maping/Promotion.php");
    $arrayPostData['messages'][0] = $jsonflex;
    replyMsg($arrayHeader,$arrayPostData);
} 
else if($message[0] == "Follow"){
    $username = profile($userId, $accessToken)['displayName'];
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = "ติดตามโปรโมชั่นดีๆ ที่่เราจะมอบให้เฉพาะ คุณ ".$username ."❤";
    replyMsg($arrayHeader,$arrayPostData);
}
else if($message[0] == "token"){
    $arrayPostData['messages'][0]['type'] = "text";
    $arrayPostData['messages'][0]['text'] = $userId;
    replyMsg($arrayHeader,$arrayPostData);
} 

else if($message[0] == "ยืนยันสิทธิ์"){
    $row_userid = array();
    $sql_user="SELECT `id` FROM `User` WHERE `usertoken`='$userId' limit 1";
    $result_user = $conn->query($sql_user);
    while($row = $result_user->fetch_array(MYSQLI_ASSOC)){
        array_push( $row_userid,$row["id"]);
    }
    $sql ="SELECT `his_id`,`user_id`,`ticket_id` FROM `Ticket_history` WHERE `user_id`= $row_userid[0] AND `ticket_id` = $message[1]  ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 ) {
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "👏คุณได้ทำการรับสิทธิไปแล้ว👏 \n สามารถนำข้อความนี้ไปแสดงที่หน้าร้านได้เลยจ้า \n  🙇🏻‍♀️  🙇🏻‍♀️  🙇🏻‍♀️  🙇🏻‍♀️ ";

    
    }
    else{
      
                 
        date_default_timezone_set('Asia/Bangkok');
        $today_date=date("d-M-Y");
        $today_time=date("h:i:s: a");
        $sql2 ="INSERT INTO `Ticket_history`(`his_id`, `user_id`, `ticket_id`,`date_time`) VALUES (null,$row_userid[0],$message[1],'$today_date | $today_time')";
        $result2 = $conn->query($sql2);
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = " 🎉 ยินดีด้วย 🎉  \n ท่านได้ยืนยันรับสิทธิพิเศษเรียบร้อยแล้ว \n สามารถนำหน้าจอนี้ไปแสดงได้ที่หน้าร้าน ";
       
        $row_Ucount = array();
        $row_Tcount = array();
        $sql3="SELECT `Ticket` FROM `User` where `id` =$row_userid[0] LIMIT 1 ";
        $result_3 = $conn->query($sql3);
        while($row = $result_3->fetch_array(MYSQLI_ASSOC)){
            array_push( $row_Ucount,$row["Ticket"]);
        }
        $sql4="SELECT `count` FROM `Ticket` WHERE `ticket_id` =  $message[1] LIMIT 1 ";
        $result_4 = $conn->query($sql4);
        while($row = $result_4->fetch_array(MYSQLI_ASSOC)){
            array_push( $row_Tcount,$row["count"]);
        }
        $row_Ucount[0]++;
        $row_Tcount[0]++;
        $sql5="UPDATE `Ticket` SET `count`= $row_Tcount[0] WHERE `ticket_id` =  $message[1] ";
        $result_5 = $conn->query($sql5);
        $sql6="UPDATE `User` SET `Ticket`= $row_Ucount[0] WHERE `id` =$row_userid[0]";
        $result_6 = $conn->query($sql6);

    }

    replyMsg($arrayHeader,$arrayPostData);
    
} 

else 
{
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = "ขณะนี้สมายกำลังฝึกภาษา รออัพเดทซักครู่ตอบได้แน่นอนจ้าา";
            $arrayPostData['messages'][1]['type'] = "text";
            $arrayPostData['messages'][1]['text'] = "หากต้องการติดต่อเร่งด่วน สามารถติดต่อได้ตามช่องทางด้านล่าง";
            
            include("./FlexMassage/Bubble/Contact_us.php");
            $arrayPostData['messages'][2] = $jsonflex;
        replyMsg($arrayHeader,$arrayPostData);


      
    }



function profile($userId, $accessToken)
{
    $urlprofile = 'https://api.line.me/v2/bot/profile/' . $userId;
    $headers = array('Authorization: Bearer ' . $accessToken);
    $profileline = curl_init($urlprofile);
    curl_setopt($profileline, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($profileline, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($profileline, CURLOPT_FOLLOWLOCATION, 1);
    $resultprofile = curl_exec($profileline);
    curl_close($profileline);
    return json_decode($resultprofile, true);
}


function replyMsg($arrayHeader, $arrayPostData)
{
    $strUrl = "https://api.line.me/v2/bot/message/reply";
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
exit;


