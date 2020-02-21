<?php
include('../db_connect.php');
    $accessToken = "suW/mT/hPfWpo34m+cEvA8Aw7Fx1cdJFlE+TqLeLAS6XN/kabbDOy7uGKnjyo5yToidSRtsi6enFU/d9u9fCnnELuuwe2cBtcxfSXiFt/lcYBfJRRkOwmHbO4LR9Wa/9CP4cQo+VCACj7Usz2cv8JlGUYhWQfeY8sLGRXgo3xvw=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    //Token
    $content = file_get_contents('php://input'); //สร้างไฟล์
    $arrayJson = json_decode($content, true); 
    file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    //user Token
    $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
    //Massage
    $queryText = $arrayJson['events'][0]['message']['text']; 
    // $queryText ="สวัสดีจ้า : ดีจ้า ";ใ
    $message =  explode(" : ",  $queryText);

if($message[0] == "ขอดูสินค้าจากMIND FACTORYทั้งหมดจ้า")

{
    include("./FlexMassage/Image_maping/MainSale.php");
    $arrayPostData['messages'][0] = $jsonflex;
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



// include("./Intent/baseintent.php");


function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
   exit;
?>