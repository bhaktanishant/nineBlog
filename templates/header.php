<!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $data['title'] ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="/class/blog/css/bootstrap.css">
        <link rel="stylesheet" href="/class/blog/css/bootstrap-glyphicons.css">
        <link rel="stylesheet" href="">
    </head>
    <body>
<?php
   echo  '<nav class="navbar navbar-default" role="navigation">
             <!-- Brand and toggle get grouped for better mobile display -->
             <div class="navbar-header">
                <a class="navbar-brand" href="/class/blog">NISHANT\'S BLOG</a>
             </div>
             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">';
           if (isset($_SESSION['username']) and isset($_SESSION['password']) and !empty($_SESSION['username']) and !empty($_SESSION['password'])) {
              echo '<li><a href = "/class/blog/manage-post/1">Hello Mr. '.$_SESSION['username'].'</a></li>
                 <li><a href = "/class/blog/logout=yes">Logout</a></li>';
          }else{
              echo "<li><a href = '/class/blog/admin-login'>Login</a></li>
              <li><a href = '/class/blog/registration'>Register</a></li>";
          }
   echo     '</ul>
            </div><!-- /.navbar-collapse -->
         </nav>';

?>