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
        
    <title> User</title>
</head>
<?php include('./nav.php');
 ?>
<body>
<br />

<div class="container-fluid">
    
<h2 align="center"><i>Profile' Followers</i></h2>  
<div class="row">
<div  class="col-3"></div>

  <div  class="col-6">
  <button type="button" class="btn btn-dark float-right" style="margin-left:5px" onclick=" window.open('https://manager.line.biz/','_blank')"> Massage </button>
   
                <div class="table-responsive">  
                     <table id="Table_Itemdata" class="table table-striped table-bordered" >  
                          <thead>  
                               <tr>  
                                    <td>id</td>  
                                    <td>Picture</td>  
                                    <td>name</td>   
                                    <td>Ticket</td>  
                                    <td>Token</td> 
                                   
                               </tr>  
                          </thead>  
                          <tbody id="Itemdata">
                          </tbody>
                          <tfoot>
                                <tr>
                                    <td>id</td>  
                                    <td>Picture</td>  
                                    <td>name</td>   
                                    <td>Ticket</td> 
                                    <td>Token</td>
                                </tr>
                             </tfoot>
                     </table>
                </div>  
    </div>
    
    <div  class="col-3"></div>
    </div>
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
                    url: "./QueryTableUser.php",
                    contentType: "application/json; charset=utf-8",
                    success: function (response) {
                        console.log(JSON.parse(response));
                        if (JSON.parse(response).length > 0) {
                            $.each(JSON.parse(response), function (index, val) {
                                var id = val.id;
                                var username = val.username;
                                var usertoken = val.usertoken;
                                var pictureUrl = val.pictureUrl;
                                var Ticket = val.Ticket;
                                var frament = "";
                                frament += '<tr>';
                                frament += '<td>' + id + '</td>';
                                frament += '<td> <img src=" ' + pictureUrl + ' " class="rounded"  width="150px" height="150"></td>';
                                frament += '<td>' + username + '</td>';
                                frament += '<td>' + Ticket + '</td>';
                                frament += '<td>' + usertoken + '</td>';
                                frament += '</tr>';
                             $("#Itemdata").append(frament);
                            });
                            $("#myModal").modal("hide");
                            $('#Table_Itemdata').DataTable();  
                        }
                    }
                });
            };








 </script>  