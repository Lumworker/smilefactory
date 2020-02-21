<?php

include( "./db_connect.php");

$ticket_id = $_POST['ticket_id'];
$ticket_name =$_POST['ticket_name'];
$description = $_POST['description'];
$sc_code = $_POST['sc_code'];
$store_id = $_POST['store_id'];


if ( $_POST['Type'] =="Edit" ) {

  $sql= " UPDATE `Ticket` SET `ticket_name` = '$ticket_name',
   `sc_code` = '$sc_code', `description` = '$description',
    `store_id` = '$store_id ' WHERE `Ticket`.`ticket_id` = $ticket_id "; 
    echo $sql;
    $result = $conn->query($sql);
    if ($result) {
      echo "บันทึกสำเร็จ";
  } else {
      echo "บันทึกไม่ได้";
  }


 }
 else
 if ( $_POST['Type']  == "Insert"){

  $sql ="INSERT INTO `Ticket`(`ticket_id`,`ticket_name`, `sc_code`, `description`, `store_id`, `count`)
   VALUES (NULL,'$sc_code','$ticket_name','$description','$store_id',0)";
     $result = $conn->query($sql);
    if ($result) {
      echo "บันทึกสำเร็จ";
  } else {
      echo "บันทึกไม่ได้";
  }
 }
 elseif ($_POST['Type']  == "Delete"){
  $id = $_POST['id'];
  $sql = "DELETE FROM `Store` WHERE `Promotion_id` = '$Promotion_id'";
  $result = $conn->query($sql);
  if ($result) {
    echo "บันทึกสำเร็จ";
} else {
    echo "บันทึกไม่ได้";
}
}







 echo json_encode($result);
 
?>
