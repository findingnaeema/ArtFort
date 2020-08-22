<?php
    session_start();
?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!--<link rel="stylesheet" type="text/css" href="css/account.css">-->
    
    
    
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">-->
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/style.css">
    </head>




<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav" style="background-color: #62d2a2 !important;">
        <div class="container"><a class="navbar-brand" href="#page-top" style="color: #d7fbe8;">ART-FORT</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="index.php">HOME</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="#portfolio">ABOUT</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="stuff.php">PRODUCTS</a></li>
                    <?php if(isset($_SESSION['id'])){  
                        echo '<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="editwishlist.php"><i class="fa fa-heart" aria-hidden="true"></i></a></li>';
                    }
                    ?>

                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="cart.php"><i class="fa fa-shopping-cart"></i></a></li>

                    <?php if(isset($_SESSION['id'])){ ?>
                    <li class="nav-item" role="presentation">
                        <a class="fa fa-user-circle-o" href="editProfile.php"></a></li> 
                               
                    <li class="nav-item" role="presentation">
                        <a class="fa fa-sign-out" href="logout.php"></a></li>        
                    <?php  }  else{   ?>	
             <!--   <li class="nav-item" role="presentation">
                            <a class="nav-link js-scroll-trigger" href="registerUser.php">Register</a></li>        
                        <li class="nav-item" role="presentation">
                            <a class="nav-link js-scroll-trigger" href="loginUser.php">Login</a></li>  -->
                             
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="loginUser.php"><i class="fa fa-user"></i></a></li>
      
                    <?php  } ?>
                </ul>
                    
            </div>
        </div>
    </nav>
<br><br>

