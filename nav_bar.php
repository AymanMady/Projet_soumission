<?php 
// session_start() ;
// if($_SESSION["admin"]!="oui"){
//     header("location:authentification.php");
// }
//?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ministère de la justice </title>

    <!-- Bootstrap -->
    <link href="CSS/bootstrap.css" rel="stylesheet">
    <link href="CSS/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>



    <!-- Custom Fonts -->
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery UI CSS Reference -->
    <link href="Content/themes/base/jquery-ui.min.css" rel="stylesheet" />
    <script src="Scripts/jquery-1.12.4.js"></script>
    <script src="Scripts/jquery-ui-1.12.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/commun.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ADOMAP:Archivage des Documents de March&eacute;s Publics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="CSS/style.css")" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
             </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                     

                        <li id="potfolio" class="dropdown">   
                            <a href="#" >Administration</a>
                            <ul class="dropdown-menu">
                                <li>
                                <a href="enseignant.php">Enseignants</a>
                                </li>
                                <li>
                                    <a href="etudiant.php">Etudiants</a>
                                </li >  
                                <li >
                                    <a href="utilisateurs.php">Utilisateurs</a>
                                </li>
                            </ul> 
                        <li  class="dropdown">
                               <a href="supprimer_session.php">Se déconnecte</a></div>
                        </li>
                        

                        
                </ul>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

</body>
</html>





<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soummision des exames</title>

     Bootstrap -->
    <!-- <link href="@Url.Content("~/css/bootstrap.css")" rel="stylesheet">
    <link href="@Url.Content("~/css/modern-business.css")" rel="stylesheet">
    @*<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>*@
    <link href="@Url.Content("~/fonts/font-awesome.min.css")" rel="stylesheet" type="text/css"> -->

<!-- jQuery UI CSS Reference -->
<!-- <link href="@Url.Content("~/Content/themes/base/jquery-ui.min.css")" rel="stylesheet" />
<script src="@Url.Content("~/Scripts/jquery-1.12.4.js")"></script>
<script src="@Url.Content("~/Scripts/jquery-ui-1.12.1.js")"></script>
<script src="@Url.Content("~/js/bootstrap.js")"></script>
<script src="@Url.Content("~/js/commun.js")"></script> -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->




<!-- </head>
<body>
    <div class="menu-bar">
        <ul>
            <li>
                <a href="#">Administration</a>
                <ul class="dropdown">
                    <li>
                        <a href="admin/etudiant.php">Etudiants</a>
                        <a href="admin/enseignant.php">Enseignants</a>
                        <a href="admin/utilisateurs.php">Utilisateurs</a>
                        <a href="admin/groupe.php">Groupes</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Soumission</a>
            </li>
        </ul>
        <div class="logout" >
            <a href="supprimer_session.php">Se déconnecte</a></div>
        </div>
    </div>
</body> -->
<!-- </html> --> 