<?php
session_start();
include "db.php";
if(!isset($_SESSION['login']['Admin'])){
  $session=$_SESSION['login'];
}
if (!$session) {
  header('Location: login.php');
}
?>
<?php

if(isset($_POST["delete"]))  
{  
  $id=$_POST['del_id'];
  $query="DELETE FROM side WHERE id='$id'";
  if(mysqli_query($conn, $query))  
  {  
   
    ?>
    <script type="text/javascript">
      alert('Side Category has been deleted successfully..');
      window.location.href = "side.php";
    </script>
    <?php

  }
  }  


?>
<?php
if (isset($_POST['submit'])) {
 $name=$_POST['name'];
 

          $query="INSERT INTO side(name) VALUES ('$name')";

          if (mysqli_query($conn, $query)) { 
           ?>
           <script type="text/javascript">
            alert('Side Category Add successfully');
            window.location.href = "side.php";
          </script>
          <?php
        }
      }
     

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="IziGourmet">
    <meta name="keywords" content="admin, dashboard , flat admin , responsive admin , web app">
    <meta name="author" content="IziGourmet">
    <title>IziGourmet</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <!-- BEGIN: Header-->
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <?php echo include 'sidebar.php';?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Side Category</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a>
                                    </li>
                                    
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>





            <div class="content-body">

                <!-- Zero configuration table -->
                <section id="basic-datatable">
                  <div class="row match-height">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Side Category</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="" method="POST"  enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row">
                                             
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Name</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text"  id="whatsapp" class="form-control" name="name" placeholder="Name" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                        <div class="col-md-8 offset-md-4">
                                                            <button type="submit" id="insert" name="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!--/ Scroll - horizontal and vertical table -->
                        <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Category</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                       
                                        <div class="table-responsive">
                                            <table class="table zero-configuration" id="Tables">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                       
                                                    </tr>
                                                </thead>
                                                   <tbody>
                                                   <?php
                                                 $query = "SELECT * FROM side";
                                                 $result = mysqli_query($conn, $query);  
                                                 if ($result->num_rows > 0) {
            # code...
                                                   
                                                    while($row = mysqli_fetch_array($result))  
                                                    { 
                                                        ?><tr>
                                                           <td><?php echo $row['id'];?></td>
                                                           <td><?php echo $row['name'];?></td>
                                                           <td>
                                                           <a href="#"  data-toggle="modal" data-target="#delModal"><i class="feather icon-trash"></i></a>
                                                          </td>

                                                          <?php

                                                      }
                                                  }else{
                                                  }
                                                  ?>


                                              </tr>
                                          </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
</section>



                    </div>
                </div>
            </div>
            <!-- END: Content-->
            <div id="delModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h4 class="modal-title text-white">Delete</h4>
          </div>
          <div class="modal-body">
            <p>Are You Sure You Want To Delete This Category?</p>
          </div>
          <form action="side.php" method="POST">
            <input type="hidden" id="del_id" name="del_id">
            <div class="modal-footer">
              <button type="button" class="btn btn-default bg-danger text-white" data-dismiss="modal">No</button>
              <button type="submit" name="delete" class="btn btn-default bg-success text-white">Yes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>

            <!-- BEGIN: Footer-->
            <script>

var table = document.getElementById('Tables');

for (var i = 1; i < table.rows.length; i++)
{
  table.rows[i].onclick = function ()
  {

    document.getElementById("del_id").value = this.cells[0].innerHTML;
    document.getElementById("edit_id").value = this.cells[0].innerHTML;
   
    // document.getElementById("genres_id").value = this.cells[3].innerHTML;

  };
}
</script> 

            <!-- END: Footer-->

 
            <!-- BEGIN: Vendor JS-->
            <script src="app-assets/vendors/js/vendors.min.js"></script>
            <!-- BEGIN Vendor JS-->

            <!-- BEGIN: Page Vendor JS-->
            <script src="app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
            <script src="app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
            <script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
            <script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
            <script src="app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
            <script src="app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
            <script src="app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
            <script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
            <!-- END: Page Vendor JS-->

            <!-- BEGIN: Theme JS-->
            <script src="app-assets/js/core/app-menu.js"></script>
            <script src="app-assets/js/core/app.js"></script>
            <script src="app-assets/js/scripts/components.js"></script>
            <!-- END: Theme JS-->

            <!-- BEGIN: Page JS-->
            <script src="app-assets/js/scripts/datatables/datatable.js"></script>
            <!-- END: Page JS-->
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image Type');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 }); 

 </script>
        </body>
        <!-- END: Body-->

        </html>