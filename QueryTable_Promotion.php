<?php

include( "./db_connect.php");


    $sql = "SELECT Ticket.ticket_id,Ticket.ticket_name,Store.id,Store.name,Store.img,Ticket.sc_code,
    Ticket.description,Ticket.count,Store.Status 
    FROM Ticket LEFT JOIN Store ON Store.id = Ticket.`store_id`";
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
