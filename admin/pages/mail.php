<?php require_once 'inc-functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mesajlar</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link rel="tekonek icon" href="img/favicon.png" />

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <?php

@$id = intval(@$_GET["id"]);
    //aktif değşitirme kodu
      //butona tıklandıysa

      if (@$_GET["is"] == "sil") {
        $sil =$db->prepare("delete from iletisim where id = :i");
        $sil->bindValue(":i",$id,PDO::PARAM_INT);
          if ($sil->execute()) {
            header("Location: mail.php?i=ekle");
          }else {
            header("Location: mail.php?i=hata");
          }
      }


   ?>

    <div id="wrapper">

        <?php
        require_once 'inc-menu.php';
         ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gelen Mail</h1>


                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                          <?php

                          if (@$_GET["i"]=="ekle") {
                             echo "<span class='text-success'>Ekleme işlemi başarılı!</span>";
                          }elseif (@$_GET["i"]=="hata") {
                            echo "<span class='text-danger'>Ekleme işlemi başarısız!</span>";
                          }

                         ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Adı - Soyadı</th>
                                            <th>E-mail</th>
                                            <th>okundu</th>
                                            <th>Araçlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php
                                      //veri çekme (kaç tane kayıt varsa o kadar sütun getirme kodu)
                                      $cek= $db -> prepare("select * from iletisim order by id desc");
                                      $cek -> execute();
                                      while ($row = $cek ->fetch(PDO::FETCH_ASSOC)) {
                                      ?>
                                        <tr class="odd gradeX">
                                            <td><?= $row["id"]?></td>
                                            <td><?= $row["ad"]?></td>
                                            <td><?= $row["email"]?></td>
                                            <td class="center">

                                              <?php if($row["okundu"] == 1) { ?>
                                                <a class="btn btn-success btn-xs" style="margin-right:15px;">okundu</a>

                                              <?php } else { ?>
                                                <a class="btn btn-danger btn-xs" style="margin-right:15px;">Okunmadı</a>

                                              <?php } ?>

                                            </td>
                                            <td class="center">
                                              <a href="mail_detay.php?id=<?=$row["id"]?>" class="btn btn-warning btn-xs" style="margin-right:15px;"">Oku</a>
                                              <a href="mail.php?is=sil&id=<?=$row["id"]?>" onclick="return confirm('silmek istediğinize emin misiniz?')" class="btn btn-danger btn-xs" style="margin-right:15px;"">Sil</a>

                                            </td>
                                        </tr>
                                      <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="well">
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
