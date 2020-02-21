<?php

include( "./db_connect.php");


    $sql = "SELECT Ticket_history.his_id ,
    User.id ,User.username,User.pictureUrl,User.Ticket,
    Ticket.ticket_id,Ticket.count,
    Ticket.store_id,
    Ticket.Ticket_name,
    Store.img,
    Ticket_history.date_time
    FROM Ticket_history
    LEFT JOIN User ON Ticket_history.user_id = User.id
    LEFT JOIN Ticket ON Ticket_history.ticket_id = Ticket.ticket_id
    LEFT JOIN Store ON Ticket.store_id = Store.id";
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
