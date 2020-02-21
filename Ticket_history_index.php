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
          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> 
     
          <link rel="icon" href="./webhook/picture/logo.png" />
        
    <title> Store</title>
</head>
<body>
<?php include('./nav.php');
 ?>
<br /><br />  
<div class="container-fluid">
                <h2 align="center"><i>Ticket' History</i></h2>  
                <br/>  



<div class="row">
<div  class="col-3"></div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit</h4>    
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                                    <canvas id="myChart"></canvas>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" id="btnSaveUser" class="btn btn-success" data-action="">Confirm</button>
                    </div>
                </div>
            </div>
    </div>  
          

    <div  class="col-7">

    <button type="button" class="float-right btn btn-success btnCreate">View Chart</button>

                
                <div class="table-responsive">  
                     <table id="Table_Itemdata" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                               <td>his_id</td>   
                                    <td>use rname</td>  
                                    <td>picture user</td>  
                                    <td>Product</td>  
                                    <td>count used</td> 
                                    <td>Time</td>    
                               </tr>  
                          </thead>  
                          <tbody id="Itemdata">
                          </tbody>
                          <tfoot>
                                <tr>
                                     <td>his_id</td>  
                                    <td>user name</td>  
                                    <td>picture user</td>  
                                    <td>Product </td>  
                                    <td>count used</td> 
                                    <td>Time</td>   
                                </tr>
                             </tfoot>
                     </table>
                </div>  
    
                <div  class="col-2"></div>
    </div>
                <br>  
</div>
</body>
</html>


<script type='text/javascript'>  
 $(document).ready(function(){  
    Call();
 });  


 function Call() {  

                
                var countarray =[];
                var Ticket_namearray =[];
                $.ajax({
                    type: "Get",
                    url: "./QueryTable_Ticket_history.php",
                    contentType: "application/json; charset=utf-8",
                    // dataType: "json",
                    // data: (),
                    success: function (response) {
                        console.log(JSON.parse(response));
                        if (JSON.parse(response).length > 0) {
                            $.each(JSON.parse(response), function (index, val) {
                                var his_id = val.his_id;
                                var id = val.id;
                                var username = val.username;
                                var pictureUrl = val.pictureUrl;
                                var Ticket = val.Ticket;
                                var ticket_id = val.ticket_id;
                                var count = val.count;
                                var store_id = val.store_id;
                                var img = val.img;
                                var date_time=val.date_time;
                                var Ticket_name=val.Ticket_name;
                                var frament = "";
                                frament += '<tr data-img="' + img +' data-id="'+id+'" data-store_id="'+store_id+'">';
                                frament += '<td>' + his_id + '</td>';
                                frament += '<td>' + username + '</td>';
                                frament += '<td> <img src=" ' + pictureUrl + ' " class="rounded"  width="150px" height="150"></td>';
                                frament += '<td> <img src=" ' + img + ' " class="rounded"  width="150px" height="150"></td>';
                                frament += '<td>' +  count+ '</td>';
                                frament += '<td>' +  date_time+ '</td>';
                               frament += '</tr>';
                                $("#Itemdata").append(frament);
                                
                                countarray.push(count);
                                Ticket_namearray.push(Ticket_name);
                              
                                
                            });
                            $("#myModal").modal("hide");
                            $('#Table_Itemdata').DataTable();

                            var Chart1 = Array.from(new Set(Ticket_namearray)) ;
                            var Chart2 = countarray ;
                            // var Chart2 = Array.from(new Set(countarray)) ;
                                console.log(Chart1);
                                console.log(Chart2);
                            var chart = new Chart(ctx, {
                            // The type of chart we want to create
                            type: 'horizontalBar',

                            data: {
                                labels:  Chart1,
                                datasets: [{
                                    label: 'Chart แสดงผลการใช้งาน Ticket',
                                    barPercentage: 0.5,
                                    barThickness: 6,
                                    maxBarThickness: 8,
                                    minBarLength: 2,
                                    backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                    borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                    borderWidth: 1,
                                    data: Chart2
                                    
                                }]
                            },
                            // Configuration options go here
                            options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                        });

                        }

                    }
                });
            };




            var ctx = document.getElementById('myChart').getContext('2d');




$(document).on('click','.btnEdit', function(){
//  $(".btnEdit").on('click', function () {
              var row = $(this).closest("tr");
              var Id = row.find("td:nth-child(1)").text();
              $("#myModal").modal("show");
            // alert(Id);
               $("#txtid").val(Id);
               $("#Status").val(row.attr("data-Status"));
               $("#txtname").val(row.find("td:nth-child(3)").text());
               $("#txtdescription").val(row.find("td:nth-child(4)").text());
               $("#txtimg").val(row.attr("data-img"));
               $("#txts").val(row.find("td:nth-child(5)").text());
               $("#txtm").val(row.find("td:nth-child(6)").text());
               $("#txtl").val(row.find("td:nth-child(7)").text());
               $("#txtxl").val(row.find("td:nth-child(8)").text());
               $("#btnSaveUser").attr("data-action", "Edit");
            });

            
$(".btnCreate").on('click', function () {
                $("#txtid").val("");
                $("#txtname").val("");
                $("#txtdescription").val("");
                $("#txts").val("");
                $("#txtm").val("");
                $("#txtl").val("");
                $("#Status").val("Active");
                $("#txtxl").val("");
                $("#txtimg").val("");
                $("#myModal").modal("show");
               $("#btnSaveUser").attr("data-action", "Insert");
            });



$("#btnSaveUser").on('click', function () {
                var id = $("#txtid").val();
                var name = $("#txtname").val();
                var descriptionil = $("#txtdescription").val();
                var size_s = $("#txts").val();
                var size_m = $("#txtm").val();
                var size_l = $("#txtl").val();
                var size_xl = $("#txtxl").val();
                var Status = $("#Status").val();
                var Type = $("#btnSaveUser").attr("data-action");
                var img = $("#txtimg").val();
        
               // console.log(id,name,descriptionil,size_s,size_m,size_l,size_xl,Type,img);
                $.ajax({
                    type: "POST",
                    // async: false,
                    url: "./QueryDB.php",
                    // contentType: "application/json; charset=utf-8",
                    // dataType: "json",
                    data: { id: id, name: name, descriptionil: descriptionil, size_s: size_s,
                          size_m: size_m, size_l: size_l,size_xl: size_xl, Type: Type,img : img ,Status:Status },
                    success: function (data) {
                        if (Type == "Insert") {
                            alert("Add Complete");
                        } else if (Type == "Edit") {
                            alert("Edit Complete");
                        }
                        $("#txtid").val("");
                        $("#txtname").val("");
                        $("#txtdescription").val("");
                        $("#txts").val("");
                        $("#txtm").val("");
                        $("#txtl").val("");
                        $("#txtxl").val("");
                        $("#txtimg").val("");
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