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
if (isset($_POST['submit'])) {
    $primary=$_POST['primary'];
    $side=$_POST['side'];
    $flavour=$_POST['flavour'];
 $name=$_POST['name'];
 $weight=$_POST['weight'];
 $stock=$_POST['stock'];
 $des=$_POST['description'];
 $cost=$_POST['cost'];
 $selling=$_POST['selling'];
 $discount=$_POST['discount'];
 $deal=$_POST['deal'];
 $activr=$_POST['active'];

 $flag1= $_FILES["images1"]['name'];
 $flag1 = preg_replace('/\s+/', '', $flag1);
 $file_type=$_FILES['images1']['type'];
 $file_tem_loc=$_FILES['images1']['tmp_name'];
 $file_store="./uploads/".$flag1;
 move_uploaded_file($file_tem_loc,$file_store); 

 $flag2= $_FILES["images2"]['name'];
 $flag2 = preg_replace('/\s+/', '', $flag2);
 $file_type=$_FILES['images2']['type'];
 $file_tem_loc=$_FILES['images2']['tmp_name'];
 $file_store="./uploads/".$flag2;
 move_uploaded_file($file_tem_loc,$file_store); 

 $flag3= $_FILES["images3"]['name'];
 $flag3 = preg_replace('/\s+/', '', $flag3);
 $file_type=$_FILES['images3']['type'];
 $file_tem_loc=$_FILES['images3']['tmp_name'];
 $file_store="./uploads/".$flag3;
 move_uploaded_file($file_tem_loc,$file_store); 

 $flag4= $_FILES["images4"]['name'];
 $flag4 = preg_replace('/\s+/', '', $flag4);
 $file_type=$_FILES['images4']['type'];
 $file_tem_loc=$_FILES['images4']['tmp_name'];
 $file_store="./uploads/".$flag4;
 move_uploaded_file($file_tem_loc,$file_store); 




          $query="INSERT INTO product(cat, side, flavour, name, weight, stock, des, cost, selling, discount, deal, active, image1, image2, image3, image4) VALUES ('$primary','$side','$flavour','$name','$weight','$stock','$des','$cost','$selling','$discount','$deal','$activr','$flag1','$flag2','$flag3','$flag4')";

          if (mysqli_query($conn, $query)) { 
           ?>
           <script type="text/javascript">
            alert('Product Add Successfully.');
            window.location.href = "addproduct.php";
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
                            <h2 class="content-header-title float-left mb-0">Add Product</h2>
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
                                <h4 class="card-title">Add Product</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="" method="POST"  enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row">
                                            <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Primary Category</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" autocomplete="off" class="form-control" name="primary" placeholder="Primary Category" list="Artist" required="">
                                                            <datalist id="Artist">
                                                                <?php 
                                                                $query = "SELECT * FROM category";
                                                                $result = mysqli_query($conn, $query);  
                                                                if ($result->num_rows > 0) {
                                                                    while($row = mysqli_fetch_array($result))  
                                                                    { 
                                                                        ?>
                                                                        <option value="<?php echo $row['name'];?>">
                                                                            <?php 
                                                                        }

                                                                    }
                                                                    ?>
                                                                </datalist>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Side Category</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" autocomplete="off" class="form-control" name="side" placeholder="Side Category" list="Artist2" required="">
                                                            <datalist id="Artist2">
                                                                <?php 
                                                                $query = "SELECT * FROM side";
                                                                $result = mysqli_query($conn, $query);  
                                                                if ($result->num_rows > 0) {
                                                                    while($row = mysqli_fetch_array($result))  
                                                                    { 
                                                                        ?>
                                                                        <option value="<?php echo $row['name'];?>">
                                                                            <?php 
                                                                        }

                                                                    }
                                                                    ?>
                                                                </datalist>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Add Flavour</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" autocomplete="off" class="form-control" name="flavour" placeholder="Add Flavour" list="Artist1" required="">
                                                            <datalist id="Artist1">
                                                                <?php 
                                                                $query = "SELECT * FROM flavour";
                                                                $result = mysqli_query($conn, $query);  
                                                                if ($result->num_rows > 0) {
                                                                    while($row = mysqli_fetch_array($result))  
                                                                    { 
                                                                        ?>
                                                                        <option value="<?php echo $row['name'];?>">
                                                                            <?php 
                                                                        }

                                                                    }
                                                                    ?>
                                                                </datalist>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Name</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text"  id="facebook" class="form-control" name="name" placeholder="Name" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Weight</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text"  id="instagram" class="form-control" name="weight" placeholder="Weight" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Stock</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text"  id="youtube" class="form-control" name="stock" placeholder="Stock" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Description</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                        <textarea class="form-control" name="description" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Cost Price</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text"  id="youtube" class="form-control" name="cost" placeholder="Cost Price" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Izi Gourmet Selling Price</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text"  id="whatsapp" class="form-control" name="selling" placeholder="Izi Gourmet Selling Price" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Discount</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text"  id="whatsapp" class="form-control" name="discount" placeholder="Izi Gourmet Selling Price" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Deal of the Day</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                       
<input type="checkbox" id="vehicle2" name="deal" value="yes">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Active</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                       
<input type="checkbox" id="vehicle2" name="active" value="yes">

                                                        </div>
                                                    </div>
                                                </div>

                                               

                                                <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Image1</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="file" class="form-control" name="images1" placeholder="image" required="" id="image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Image2</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="file" class="form-control" name="images2" placeholder="image" required="" id="image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Image3</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="file" class="form-control" name="images3" placeholder="image" required="" id="image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Image4</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="file" class="form-control" name="images4" placeholder="image" required="" id="image">
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

                    </div>
                </div>
            </div>
            <!-- END: Content-->

            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>

            <!-- BEGIN: Footer-->
        
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