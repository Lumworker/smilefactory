<?php

include( "./db_connect.php");



$name = $_POST['name'];
$descriptionil = $_POST['descriptionil'];
$size_s = $_POST['size_s'];
$size_m = $_POST['size_m'];
$size_l = $_POST['size_l'];
$size_xl = $_POST['size_xl'];
$img =$_POST['img'];
$Status=$_POST['Status'];


if (!empty($_POST)&&  $_POST['Type'] =="Edit" ) {

   $id = $_POST['id'];

    $sql = "UPDATE `Store` SET `name` = '$name', `description` = '$descriptionil', `s_size` = $size_s, `m_size` = $size_m,
    `l_size` = $size_l , `xl_size` = $size_xl, `img` = '$img' ,`Status`='$Status'  WHERE `Store`.`id` = $id;";
      echo $sql;
    $result = $conn->query($sql);
    if ($result) {
      echo "บันทึกสำเร็จ";
  } else {
      echo "บันทึกไม่ได้";
  }


 }
 elseif (!empty($_POST)&&  $_POST['Type']  == "Insert"){

    $sql = "INSERT INTO  Store ( id ,  name ,  description ,  s_size ,  m_size ,  l_size ,  xl_size ,  img )
     VALUES (NULL,'$name', '$descriptionil' , $size_s , $size_m , $size_l , $size_xl , '$img' )";
    $result = $conn->query($sql);
    if ($result) {
      echo "บันทึกสำเร็จ";
  } else {
      echo "บันทึกไม่ได้";
  }
 }
 elseif (!empty($_POST)&&  $_POST['Type']  == "Delete"){
  $id = $_POST['id'];
  $sql = "DELETE FROM `Store` WHERE `Store`.`id` = '$id'";
  $result = $conn->query($sql);
  if ($result) {
    echo "บันทึกสำเร็จ";
} else {
    echo "บันทึกไม่ได้";
}
}







 echo json_encode($result);
 
?>
