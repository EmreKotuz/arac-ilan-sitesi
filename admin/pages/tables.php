<?php require_once 'inc-functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="tekonek icon" href="img/favicon.png" />

    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

  <?php

  /*
  Hızdan tasarruf etmek amaçlı değiştirmediğim veritabanı isimleri:

  baslik = isim
  alt_baslik = telefon numarası

  */

@$id = intval(@$_GET["id"]);

      if (@$_GET["is"] == "aktif") {

          if ($_GET["drm"] == 1) {
              $durum = 0;
          }else {
              $durum = 1;
          }

          $aktif = $db->prepare("update blog set aktif = :a where id = :i");
          $aktif->bindValue(":a", $durum, PDO::PARAM_INT);
          $aktif->bindValue(":i", $id, PDO::PARAM_INT);

            if ($aktif->execute()) {
                header("Location: tables.php?i=ekle");
                echo "girdi";
            }else {
                header("Location: tables.php?i=hata");
                echo "bir şey olmadı";
            }
      }
      if (@$_GET["is"] == "sil") {
        $sil =$db->prepare("delete from blog where id = :i");
        $sil->bindValue(":i",$id,PDO::PARAM_INT);
          if ($sil->execute()) {
            header("Location: tables.php?i=ekle");
          }else {
            header("Location: tables.php?i=hata");
          }
      }
   ?>
    <div id="wrapper" >

        <div style="margin-left:5%;margin-right:5%;" >
            <div class="row" >
                <div class="col-lg-14">
                    <h1 class="page-header">Tüm <b style="color:#1ABC9C">İlanlar</b></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-14">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                          <a href="ekle.php" class="btn btn-primary" style="margin-right:15px;">İlan ekle+</a>
                          <?php

                          if (@$_GET["i"]=="ekle") {
                             echo "<span class='text-success'>Ekleme işlemi başarılı!</span>";
                          }elseif (@$_GET["i"]=="hata") {
                            echo "<span class='text-danger'>Ekleme işlemi başarısız!</span>";
                          }

                         ?>
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Resmi</th>
                                            <th>İsimi</th>
                                            <th>Telefonu</th>
                                            <th>Şehir</th>
                                            <th>İlçe</th>
                                            <th>Tarihi</th>
                                            <th>Durum</th>
                                            <th>Araçlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php
                                      //veri çekme (kaç tane kayıt varsa o kadar sütun getirme kodu)
                                      $cek= $db -> prepare("select * from blog order by id desc");
                                      $cek -> execute();
                                      while ($row = $cek ->fetch(PDO::FETCH_ASSOC)) {
                                      ?>
                                        <tr class="odd gradeX">
                                            <td><img style="height:100px;width:100px;" src="<?php echo $row["resim"]; ?>" alt=""></td>
                                            <td><?= $row["baslik"]?></td>
                                            <td><?= $row["alt_baslik"]?></td>
                                            <td><?= $row["sehir"]?></td>
                                            <td><?= $row["ilce"]?></td>
                                            <td><?= $row["tarih"]?></td>
                                            <td class="center">

                                              <?php if($row["aktif"] == 1) { ?>
                                                <a href="tables.php?is=aktif&id=<?=$row["id"]?>&drm=<?= $row["aktif"]?>"
                                                  onclick="return confirm('Durum pasif olarak değiştirilsin mi?')"
                                                  class="btn btn-success btn-xs" style="margin-right:15px;">Aktif</a>

                                              <?php } else { ?>
                                                <a href="tables.php?is=aktif&id=<?=$row["id"]?>&drm=<?= $row["aktif"]?>"
                                                  onclick="return confirm('Durum aktif olarak değiştirilsin mi?')"
                                                  class="btn btn-danger btn-xs" style="margin-right:15px;">Pasif</a>

                                              <?php } ?>

                                            </td>
                                            <td class="center">
                                              <a href="duzenle.php?id=<?=$row["id"]?>" class="btn btn-warning btn-xs" style="margin-right:15px;">Düzenle</a>
                                              <a href="tables.php?is=sil&id=<?=$row["id"]?>" onclick="return confirm('silmek istediğinize emin misiniz?')" class="btn btn-danger btn-xs" style="margin-right:15px;"">Sil</a>

                                            </td>
                                        </tr>
                                      <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                            <div class="well">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

    <script src="../dist/js/sb-admin-2.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
