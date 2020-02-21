<?php

include( "./db_connect.php");


    $sql = "SELECT `id`,`name`,`description`,`s_size`,`m_size`,`l_size`,`xl_size`,`Status`,`img` FROM `Store`";
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
