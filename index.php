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
        
    <title> Store</title>
</head>
<body>
<?php include('./nav.php');
 ?>
<br /><br />  
  <div class="container">  
                <h2 align="center"><i>It' Amezing</i></h2>  
                <br/>  
      <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                    <div class="modal-content">
<!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit</h4>    
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
<!-- Modal Body -->
                        <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="vertical-divider">
                                            <input type="hidden" id="txtusername">
                                            <span>ID</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                                                <input type="text" class="form-control" id="txtid" placeholder="Item number" disabled>
                                            </div>
                                            <br>
                                            <span>name:</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-at"></i></span>
                                                <input type="text" class="form-control" id="txtname" placeholder="ชื่อสินค้า">
                                            </div>
                                            <br>
                                            <span>Description:</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-user-alt"></i></span>
                                                <input type="text" class="form-control" id="txtdescription" placeholder="รายละเอียดสินค้า">
                                            </div>
                                            <br>
                                            <span>URL Imapge:</span>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fas fa-user-alt"></i></span>
                                                <input type="text" class="form-control" id="txtimg" placeholder="ภาพประกอบสินค้า">
                                            </div>
                                        </div>
                                    </div>
                                        <!-- Modal body -->
                                    <div class="col-md-8"><br>
                                        <div class="form-group">
                                            <div class="form-row">
                                            <div class="col">
                                            <span>S:</span>
                                            <span class="input-group-addon"><i class="fas fa-user-alt"></i></span>
                                                    <input type="text" class="form-control" id="txts" placeholder="ไซต์ S"></div>
                                                    <div class="col">
                                            <span>M:</span>
                                            <span class="input-group-addon"><i class="fas fa-user-alt"></i></span>
                                                    <input type="text" class="form-control" id="txtm" placeholder="ไซต์ M"></div>
                                                    <div class="col">
                                            <span>L:</span>
                                            <span class="input-group-addon"><i class="fas fa-user-alt"></i></span>
                                                    <input type="text" class="form-control" id="txtl" placeholder="ไซต์ L"></div>
                                                    <div class="col">
                                            <span>XL:</span>
                                            <span class="input-group-addon"><i class="fas fa-user-alt"></i></span>
                                                    <input type="text" class="form-control" id="txtxl" placeholder="ไซต์ XL"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4"><br>
                                        <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                    <span>Status:</span>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fas fa-shield-alt"></i></span>
                                                        <select id="Status" class="form-control">
                                                            <option>Active</option>
                                                            <option>InActive</option>
                                                        </select>
                                                    </div>
                                            </div>
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
          


    <button type="button" class="float-right btn btn-success btnCreate">Create</button>

                
                <div class="table-responsive">  
                     <table id="Table_Itemdata" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>id_store</td>  
                                    <td>Item</td>  
                                    <td>name</td>  
                                    <td>description</td>  
                                    <td>s_size</td>  
                                    <td>m_size</td>  
                                    <td>l_size</td>  
                                    <td>xl_size</td> 
                                    <td>Status</td> 
                                    <td></td> 
                               </tr>  
                          </thead>  
                          <tbody id="Itemdata">
                          </tbody>
                          <tfoot>
                                <tr>
                                     <td>id_store</td>  
                                    <td>Item</td>  
                                    <td>name</td>  
                                    <td>description</td>  
                                    <td>s_size</td>  
                                    <td>m_size</td>  
                                    <td>l_size</td>  
                                    <td>xl_size</td> 
                                    <td>Status</td> 
                                    <td></td> 
                                </tr>
                             </tfoot>
                     </table>
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
                $.ajax({
                    type: "Get",
                    url: "./QueryTable.php",
                    contentType: "application/json; charset=utf-8",
                    // dataType: "json",
                    // data: (),
                    success: function (response) {
                        console.log(JSON.parse(response));
                        if (JSON.parse(response).length > 0) {
                            $.each(JSON.parse(response), function (index, val) {
                                var id = val.id;
                                var name = val.name;
                                var description = val.description;
                                var s_size = val.s_size;
                                var m_size = val.m_size;
                                var l_size = val.l_size;
                                var xl_size = val.xl_size;
                                var Status = val.Status;
                                var img = val.img;
                                var frament = "";
                                frament += '<tr data-img="' + img +'" data-Status="' + Status +'">';
                                frament += '<td>' + id + '</td>';
                                frament += '<td> <img src=" ' + img + ' " class="rounded"  width="150px" height="150"></td>';
                                frament += '<td>' + name + '</td>';
                                frament += '<td>' + description + '</td>';
                                frament += '<td>' + s_size + '</td>';
                                frament += '<td>' + m_size + '</td>';
                                frament += '<td>' + l_size + '</td>';
                                frament += '<td>' + xl_size + '</td>';
                                if(Status == "Active"){
                                        frament += '<td> <img src="https://uppic.cc/d/64vG" class="rounded"  width="30px" height="30px"></td>';
                                }else{
                                        frament += '<td> <img src="https://png.pngtree.com/svg/20170908/14bcb7d59c.svg" class="rounded"  width="30px" height="30px"></td>';
                                }
                                frament += ' <td><button type="button" class="btn btn-warning btnEdit" data-action="">Edit</button></td>';
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