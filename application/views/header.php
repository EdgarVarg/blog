<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>
<!-- jQuery -->
    <script src="<?= base_url()?>application/plantilla/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url()?>application/plantilla/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url()?>application/plantilla/js/clean-blog.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url()?>application/plantilla/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>application/views/css/style.css">
    <!-- Custom CSS -->
    <link href="<?= base_url()?>application/plantilla/css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url()?>Blog">Click It</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                     <?php 	
                      if ($this->session->userdata('logged_in')) {
 						
                      	echo "<a href='/Blog_actualizado/blog/nueva'>Nueva entrada</a>";
                      }else{
                      	echo "<a href='/Blog_actualizado/blog/entradasno'>Ver entradas</a>";
                      }


                      ?>
                      
                    </li>
                    <li>
                       <?php 	
                      if ($this->session->userdata('logged_in')) {

                      	echo "<a href='/Blog_actualizado/blog/entradas'>Ver entradas</a>";
                      }else{
                      	echo "<a href='/Blog_actualizado/Menu'>Registrate</a>";
                      }


                      ?>
                       
                    </li>
                      <?php 	
                      if ($this->session->userdata('logged_in')) {

                   
                        echo"<li style='color:#000; text-shadow: 1px 4px 4px #FFFFFF;background: rgba(249, 249, 255, 0.33) none repeat scroll 0% 0%;'>Bienvenido <a href='/Blog_actualizado/blog/user_porfile'>";
                    
                      	echo $username.'</a>';
                      	echo "</li>";
                      	echo "<a style='color:#fff; text-shadow: 4px 4px 4px #000;' href='/Blog_actualizado/blog/logout'>Logout</a>";
                       
                      }else{
                      	echo "<li>";
                      	echo "<a href='/Blog_actualizado/Verifylogin'>Iniciar Sesion</a>";
                        echo "</li";
                      }

                      ?>   
                     </li>
                    

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
 <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?= base_url()?>application/plantilla/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Codeigniter Blog</h1>
                        <hr class="small">
                        <span class="subheading">Edgar Ramos Luna</span>
                    </div>
                </div>
            </div>
        </div>

    </header>

</body>
</html>