<!DOCTYPE html>
<html>
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // header('Location: login.php');
    // exit;
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Contact Management System</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
    <div classss="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light " styxle="padding ">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-lg" style="background:#f8f9fa;font-size:15px;">
                    <i class="fas fa-align-left"></i>
                    <span style="background:#f8f9fa;font-size:20px;">Contact Management System</span>
                </button>

                <form>
                    <input type="text" name="search" placeholder="Search..">
                </form>



                <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button> -->


            </div>

            <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                </ul>
            </div> -->
            <!-- </div> -->
        </nav>

    </div>

    <div class="wrapper" style="background:#f7fafc;">
        <!-- Sidebar  -->
        <nav id="sidebar" style="background:#f8f9fa;font-size:15px;">
            <div class="sidebar-header" style="border: 1px solid #f8f9fa;border-radius: 20px;margin-right:100px;">
                <a href="#" style="font-weight: lighter;font-size:14px;">Create</a>
            </div>
            </button>

            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p> -->
                <!-- <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li> -->
                <li class="active">
                    <a href="#" style="border: 9px solid #f8f9fa;border-radius: 20px;font-weight: lighter;font-size:12px;">Contacts</a>
                </li>

                <li>
                    <a href="#" style="border: 9px solid #f8f9fa;border-radius: 20px;font-weight: lighter;font-size:12px;">Favorites</a>
                </li>
                <li>
                    <a href="#" style="border: 9px solid #f8f9fa;border-radius: 20px;font-weight: lighter;font-size:12px;">Label</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div class="container" style="background:white;border: 9px solid white;border-radius: 30px;margin-right:30px;margin-left:20px;margin-top:12px;height:83vh;">
            <iframe class="responsive-iframe" src="contacts.html"></iframe>
        </div>


    </div>
    <script src="list_min.js"></script>

    <script src="script.js"></script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous
        "></script>
    <script type=" text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>