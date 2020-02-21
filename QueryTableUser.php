<?php

include( "./db_connect.php");


    $sql = "SELECT `id`,`username`,`usertoken`,`pictureUrl`,`Ticket` FROM `User`";
    $result = $conn->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
      $data[] = $row;
    }
    // echo $sql;

    $results = ["sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData" => $data ];
 


 
 echo json_encode($data);
 
?>
