<?php
session_start();

//eğer girisKontrol 1 değilse index sayfasına geçiyor. istenmeyen misafir
if (@$_SESSION["girisKontrol"]!=1) {
  header("Location: index.php?i=izinsizgiris");
}
?>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #212F3D; ">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" style="color:white" href="anasayfa.php">Merhaba, <?= $_SESSION["username"]; ?></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right" style="background-color: white;">

        <li class="dropdown" sty>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="cikis.php"><i class="fa fa-sign-out fa-fw"></i> Çıkış Yap</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu" >
            
                        <span class="input-group-btn">
                        
                    </span>

                <li>
                    <a style="margin-top:10%; color:#212F3D; font-size:16px;" href="anasayfa.php"><i style="color:#212F3D;" class="fa fa-home fa-fw"></i> Ana Sayfa</a>
                </li>
                <li>
                    <a style="margin-top:5%; color:#212F3D; font-size:16px;" href="tables.php"><i style="color:#212F3D;" class=" fa fa-try fa-fw"></i> <b style="color:#1ABC9C">Tr</b> Makale</a>
                </li>
                <li>
                    <a style="margin-top:5%; color:#212F3D; font-size:16px;" href="tablesen.php"><i style="color:#212F3D;" class=" fa fa-usd fa-fw"></i> <b style="color:#1ABC9C">En</b> Makale</a>
                </li>
                <li>
                    <a style="margin-top:5%; color:#212F3D; font-size:16px;" href="tumfoto.php"><i style="color:#1ABC9C;" class="fa fa-picture-o"></i> Fotoğraflar</a>
                </li>
                <li>
                    <a style="margin-top:5%; color:#212F3D; font-size:16px;" href="hakkimizda.php"><i style="color:#212F3D;" class=" fa fa-edit fa-fw"></i> Hakkımızda</a>
                </li>
                

        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
