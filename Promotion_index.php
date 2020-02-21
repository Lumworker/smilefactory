<?php include('./db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
          <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
          <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
          <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
     
          <link rel="icon" href="./webhook/picture/logo.png" />
        
    <title> Ticket</title>
</head>
<body>
<?php include('./nav.php');
 ?>
<br /><br />  


<div class="container-fluid">
    
<h2 align="center"><i>Ticket' Vocher</i></h2> 
<div class="row">
<div  class="col-1"></div>
              
                <br/>  
                
      <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                    <div class="modal-content">
<!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Promotion</h4>    
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
<!-- Modal Body -->
                        <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="vertical-divider">
                                            <input type="hidden" id="txtusername">
                                            <span>ticket_id:</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                                <input type="text" class="form-control" id="txtticket_id" placeholder="Item number" disabled>
                                            </div>
                                            <br>
                                            <span>Store_id:</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-user-alt"></i></span>
                                                <input type="text" class="form-control" id="txtstore_id" placeholder="รหัสสินค้า">
                                            </div>
                                            <span>Ticket_name:</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-at"></i></span>
                                                <input type="text" class="form-control" id="txtticket_name" placeholder="ชื่อโปรโมชั่น">
                                            </div>
                                            <span>sc_code:</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-at"></i></span>
                                                <input type="text" class="form-control" id="txtsc_code" placeholder="รหัสโปรโมชั่น">
                                            </div>
                                            <span>Description:</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-user-alt"></i></span>
                                                <input type="text" class="form-control" id="txtdescription" placeholder="รายละเอียดโปรโมชั่น">
                                            </div>
                                           
                                            <span>count</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-user-alt"></i></span>
                                                <input type="text" class="form-control" id="txtcount" placeholder="จำนวนโปรโมชั่นที่ใช้" disabled>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                            <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" id="btnSaveUser" class="btn btn-success" data-action="">Confirm</button>
                    </div>
                </div>
            </div>

    </div>  
          



    <div  class="col-9">
    <button type="button" class="btn btn-secondary float-right" style="margin-left:5px;" onclick=" window.open('https://developers.line.biz','_blank')"> Check Quota </button>
    <button type="button" class="float-right btn btn-success btnCreate">Create</button>
                <div class="table-responsive">  
                     <table id="Table_Itemdata" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>    
                                    <td>ticket_id</td> 
                                    <td>Store_id</td>
                                    <td>Image</td> 
                                    <td>ticket_name</td> 
                                    <td>Store_name</td>  
                                    <td>sc_code</td>  
                                    <td>description</td>  
                                    <td>count</td>
                                    <td>Status</td>
                                    <td>Edit</td>
                                    <td>Boardcast</td>
                                    
                               </tr>  
                          </thead>  
                          <tbody id="Itemdata">
                          </tbody>
                          <tfoot>
                                <tr>
                                <td>ticket_id</td> 
                                    <td>Store_id</td>
                                    <td>Image</td> 
                                    <td>ticket_name</td> 
                                    <td>Store_name</td>  
                                    <td>sc_code</td>
                                    <td>description</td>  
                                    <td>count</td> 
                                    <td>Status</td>
                                    <td>Edit</td>
                                    <td>Boardcast</td>
                                </tr>
                             </tfoot>
                     </table>
                </div>  
               
                </div>
    
    <div  class="col-2"></div>
</div>
</body>
</html>


<script type='text/javascript'>  
 $(document).ready(function(){  
    Call();
 });  


 function Call() {
                $.ajax({
                    type: "Get",
                    url: "./QueryTable_Promotion.php",
                    contentType: "application/json; charset=utf-8",
                    success: function (response) {
                        console.log(JSON.parse(response));
                        if (JSON.parse(response).length > 0) {
                            $.each(JSON.parse(response), function (index, val) {
                                // `ticket_id`,`sc_code`,`description`,`store_id`,`count`
                                var ticket_id = val.ticket_id;
                                var Store_id = val.id;
                                var ticket_name=val.ticket_name;
                                var img = val.img;
                                var Store_name = val.name;
                                var sc_code = val.sc_code;
                                var description = val.description;
                                var store_id = val.store_id;
                                var count = val.count;
                                var Status =val.Status;
                                var frament = "";
                                frament += '<tr data-img="' + img +'" data-Status="' + Status +'" ">';
                                frament += '<td>' + ticket_id + '</td>';
                                frament += '<td>' + Store_id + '</td>';
                                frament += '<td> <img src=" ' + img + ' " class="rounded"  width="150px" height="150"></td>';
                                frament += '<td>' + ticket_name + '</td>';
                                frament += '<td>' + Store_name + '</td>';
                                frament += '<td>' + sc_code + '</td>';
                                frament += '<td>' + description + '</td>';
                                frament += '<td>' + count + '</td>';
                                console.log(Status);
                                if(Status == "Active"){
                                        frament += '<td> <img src="https://uppic.cc/d/64vG" class="rounded"  width="30px" height="30px"></td>';
                                }else{
                                        frament += '<td> <img src="https://png.pngtree.com/svg/20170908/14bcb7d59c.svg" class="rounded"  width="30px" height="30px"></td>';
                                }
                                frament += ' <td><button type="button" class="btn btn-warning btnEdit" data-action="">Edit</button></td>';
                                frament += ' <td><button type="button" class="btn btn-info btnboardcast" >boardcast</button></td>';
                                frament += '</tr>';
                                $("#Itemdata").append(frament);
                            });
                            $("#myModal").modal("hide");
                            $('#Table_Itemdata').DataTable();  
                        }
                    }
                });
            };







$(document).on('click','.btnEdit', function(){
              var row = $(this).closest("tr");
              var Id = row.find("td:nth-child(1)").text();
                $("#myModal").modal("show");
               $("#txtticket_id").val(Id);
               $("#txtstore_id").val(row.find("td:nth-child(2)").text());
               $("#txtticket_name").val(row.find("td:nth-child(4)").text());
               $("#txtsc_code").val(row.find("td:nth-child(6)").text());
               $("#txtdescription").val(row.find("td:nth-child(7)").text());
               $("#txtcount").val(row.find("td:nth-child(8)").text());
               $("#btnSaveUser").attr("data-action", "Edit");
            });

            
$(".btnCreate").on('click', function () {
                              
                $("#txtticket_id").val("");
                $("#txtsc_code").val("");
                $("#txtticket_name").val("");
                $("#txtdescription").val("");
                $("#txtstore_id").val("");
                $("#txtcount").val("");
                $("#myModal").modal("show");
               $("#btnSaveUser").attr("data-action", "Insert");
            });

$(document).on('click','.btnboardcast', function(){
            var row = $(this).closest("tr");
            var Id = row.find("td:nth-child(1)").text();
            var ticket_id = (Id);
            var store_id = (row.find("td:nth-child(2)").text());
            var ticket_name = (row.find("td:nth-child(4)").text());
            var sc_code = (row.find("td:nth-child(6)").text());
            var description = (row.find("td:nth-child(7)").text());
            var count = (row.find("td:nth-child(8)").text());
            var img =(row.attr("data-img"));
            var Status = (row.attr("data-Status"));
            console.log(Status);
            if(Status == "Active"){
                $.ajax({
                    type: "POST",
                    url: "./webhook/push_massage.php",
                    data: { ticket_id: ticket_id,ticket_name:ticket_name, sc_code: sc_code, description: description
                    , store_id: store_id, count: count ,img:img},
                    success: function (data) {
                        alert("Boardcast Complete");
                        console.log(ticket_id,store_id,ticket_name,sc_code,description,count);
                    },
                    error: function (data) {
                         console.log(response);

                    }

                });
            }else{
                                    alert("กรุณา เปลี่ยนสถานะเป็น Activeก่อน");
              }
      
            });


$("#btnSaveUser").on('click', function () {
   
                var ticket_id = $("#txtticket_id").val();
                var sc_code = $("#txtsc_code").val();
                var ticket_name = $("#txtticket_name").val();
                var description = $("#txtdescription").val();
                var store_id = $("#txtstore_id").val();
                var count = $("#txtcount").val();
                var Type = $("#btnSaveUser").attr("data-action");
               console.log(ticket_id,ticket_name,sc_code,description,store_id,count);
                $.ajax({
                    type: "POST",
                    url: "./QueryDB_Promotion.php",
                    data: { ticket_id: ticket_id,ticket_name:ticket_name, sc_code: sc_code, description: description
                    , store_id: store_id, count: count ,Type:Type},
                    success: function (data) {
                        if (Type == "Insert") {
                            alert("Add Complete");
                        } else if (Type == "Edit") {
                            alert("Edit Complete");
                        }
                        $("#txtticket_id").val("");
                        $("#txtticket_name").val("");
                        $("#txtsc_code").val("");
                        $("#txtdescription").val("");
                        $("#txtstore_id").val("");
                        $("#txtcount").val("");
                        $("#myModal").modal("hide");
                        // console.log(data);
                        $('tbody').empty();
                        Call();
                    },
                    error: function (data) {
                         // console.log(response);

                    }

                });
            });

 </script>  