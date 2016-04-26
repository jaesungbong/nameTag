<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/static/images/favicon.ico">

    <title>Nameonit</title>

    <!-- Bootstrap core CSS -->
    <link href="/static/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--file input style-->
    <link href="/static/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="/static/js/fileinput.min.js" type="text/javascript"></script>
    <script src="/static/js/fileinput_locale_fr.js" type="text/javascript"></script>
    <script src="/static/js/fileinput_locale_es.js" type="text/javascript"></script>

    <!-- Custom styles for this template -->
    <link href="/static/css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/static/bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-65948347-1', 'auto');
      ga('send', 'pageview');

    </script>

  </head>

  <body>
  <?php
  
    $idACCOUNTS = $this->session->userdata('user_id');
    if($idACCOUNTS){
      $query = "SELECT * FROM ACCOUNTS WHERE idACCOUNTS='".$idACCOUNTS."'";
      $query = $this->db->query($query);
      $row = $query->row();
      $id = $row->id;
    }
  ?>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Nameonit</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/main">Home</a></li>
            <li><a href="/myProjects">Nametag</a></li>
            <li><a href="#about">About us</a></li>
            <?php if($idACCOUNTS){
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?=$id ?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">null</a></li>
                <li><a href="#">null</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">null</a></li>
                <li><a href="/member/logout">logout</a></li>
              </ul>
            </li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
