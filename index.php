<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="list_min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous
        "></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Contact Management System</title>
</head>


<body style="background:#f8f9fa;">
    <div classss="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light " styxle="padding ">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-lg" style="background:#f8f9fa;font-size:15px;">
                    <i class="bi bi-list"></i>
                    <span style="background:#f8f9fa;font-size:20px;">Contact Management System</span>
                </button>

                <form>
                    <input type="search" class="fuzzy-search" name="search" id="search-field" placeholder=" Search..">
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

            </button>

            <ul class="list-unstyled components">

                <li>
                    <a onclick="$('.responsive-iframe').attr('src','addContact.html');" style="font-weight: lighter;font-size:15px;"><i class="bi bi-plus-lg h5"></i> Create</a>
                </li>
                <li class="active" data-toggle="list">
                    <a onclick="$('.responsive-iframe').attr('src','contacts.html');" href="#" style="border: 9px solid #f8f9fa;border-radius: 20px;font-weight: lighter;font-size:12px;"><i class="bi bi-file-person-fill h5"></i> Contacts</a>
                </li>

                <li data-toggle="list">
                    <a href="#" onclick="$('.responsive-iframe').attr('src','fav.html');" style="border: 9px solid #f8f9fa;border-radius: 20px;font-weight: lighter;font-size:12px;"><i class="bi bi-star-fill h5"></i> Favorites</a>
                </li>
                <!-- <li>
                    <a href="#" style="border: 9px solid #f8f9fa;border-radius: 20px;font-weight: lighter;font-size:12px;">Label</a>
                </li> -->
            </ul>

            <ul class="list-unstyled CTAs">
                <!-- <li>
                    <a href="#" class="download bi bi-person h5" style="text-align:left"></a>
                </li> -->
                <li>
                    <a href="logout.php" class="article"><i class="bi bi-box-arrow-left"></i> Kitbok shylla</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div class="container" style="background:white;border: 9px solid white;border-radius: 30px;margin-right:30px;margin-left:20px;margin-top:12px;height:83vh;">
            <iframe class="responsive-iframe" src="contacts.html"></iframe>
        </div>

        <button id="pop" style="display:none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"></button>
        <button id="pop3" style="display:none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3"></button>
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-sm modal-dialog-centered" style="align-items: flex-end;">
                <div class="modal-content" style="border: 3px solid #303030;border-radius: 6px;background:#303030;color:white">

                    <!-- Modal body -->
                    <div class="modal-body">
                        Contact has been deleted from this account
                    </div>
                </div>
            </div>
        </div>
        <button id="pop2" style="display:none" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2"></button>

        <div class="modal" id="myModal2">
            <div class="modal-dialog modal-sm modal-dialog-centered" style="align-items: flex-end;">
                <div class="modal-content" style="border: 3px solid #303030;border-radius: 6px;background:#303030;color:white">
                    <div class="modal-body">
                        Contact details updated
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="myModal3">
            <div class="modal-dialog modal-sm modal-dialog-centered" style="align-items: flex-end;">
                <div class="modal-content" style="border: 3px solid #303030;border-radius: 6px;background:#303030;color:white">
                    <div class="modal-body">
                        Add to favorites
                    </div>
                </div>
            </div>
        </div>



    </div>


    <script type=" text/javascript">
        $(".list-unstyled li").on("click", function() {
            $(".list-unstyled li").removeClass("active");
            $(this).addClass("active");
        });
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>