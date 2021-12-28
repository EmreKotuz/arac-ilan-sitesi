<!DOCTYPE html>
<html class="tr">
<?php 
  require_once 'admin/pages/inc-functions.php';
  @$id = intval($_GET["id"]);
  $cek = $db->prepare("select * from blog where id = :id limit 1");
  $cek->bindValue("id", $id, PDO::PARAM_INT);
  $cek->execute();
  $row = $cek->fetch(PDO::FETCH_ASSOC);
  
  ?>
<head>
<title><?= $row['baslik'] ?> - <?= $row['sehir'] ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="google" content="nositelinkssearchbox" />
  <meta property="og:locale" content="tr_TR" />
  <meta name="publisher" content="20.20" />

  
  <meta name="author" content="SİTE İSMİ">
  <meta name="Description" content="<?= $row['baslik'] ?> - <?= $row['sehir'] ?>" />
  <meta name="Keywords" content="<?= $row['baslik'] ?>, <?= $row['sehir'] ?>, <?= $row['anahtarKelime'] ?>" />
  <meta property="seg:news:description" content="<?= $row['baslik'] ?> - <?= $row['sehir'] ?> - <?= $row['anahtarKelime'] ?>">
  <meta property="og:title" content="<?= $row['baslik'] ?> - <?= $row['sehir'] ?> - <?= $row['anahtarKelime'] ?>" />
  <meta property="og:description" content="<?= $row['baslik'] ?> - <?= $row['sehir'] ?> - <?= $row['anahtarKelime'] ?>" />
  <meta name="twitter:title" content="<?= $row['baslik'] ?> - <?= $row['sehir'] ?> - <?= $row['anahtarKelime'] ?>" />
  <meta name="twitter:card" content="<?= $row['baslik'] ?> - <?= $row['sehir'] ?> - <?= $row['anahtarKelime'] ?>" />
  
	<link rel="stylesheet" href="plugins/themefisher-font/style.css">
	<link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="plugins/animate-css/animate.css">
	<link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
	<link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
	<link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
	<link rel="stylesheet" href="css/style.css">


</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="50">


<header id="navigation" class="navbar navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Yesn't</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand logo" style="padding:13px" href="index.php">
          <b>Ana Sayfa</b>
        </a>
      </div>
  
      <nav class="collapse navbar-collapse navbar-right" role="Navigation">
        <ul id="nav" class="nav navbar-nav navigation-menu"> 
          <li><a name="sehir" data-scroll href="index.php#ilan">Tüm İlanlar</a></li>
          <li><a name="sehir" data-scroll href="#sehir">Tüm Şehirler</a></li>
        </ul>
      </nav>
    </div>
  </header>
  
<section class="section" style="margin-top:-6%">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 style="word-wrap:break-word;"><b><?= $row['baslik'] ?></b></h1>
                <ul class="list-inline mb-50">
                    <li style="color:white;" class="list-inline-item"><b><?= $row['sehir'] ?></b>/<?= $row['ilce'] ?></li> -
                    <li style="color:#10ac84;" class="list-inline-item"><?= $row['tarih'] ?></li>
                </ul>
                <div class="col-lg-4">
                <img class="img-fluid mb-50" style="width:250px;height:250px;" src="admin/pages/<?php echo $row['resim']; ?>" alt="blog-image">
            </div>
            <div class="col-lg-7">
                <p style="color:white;word-wrap:break-word; font-size:18px;"><?= htmlspecialchars_decode($row['aciklama']) ?></p></p>
                <blockquote style="color:#2ecc71" class="mb-50"><b>Her Zaman En İyisi İçin Çalışıyoruz.</b></blockquote>
                <hr>
            </div>
        </div>
            <div>
            <h3 style="color:#2ecc71"><b>Yorumlar</b></h3>
            <?php
          $yorumceek   = $db->prepare("SELECT * FROM blogyorum WHERE id=:id");
          $yorumceek->execute(["id" => $_GET["id"]]);
          $yorumucek = $yorumceek->fetchAll(PDO::FETCH_OBJ);

          foreach ($yorumucek as $rowYorum) {
          ?>
            <div style="padding:5px; margin:1px; height:auto; border-style: dotted; border-width: 0.1px; border-color: white;">
              <span class="author-deatila04re" style="margin-left: 200px;">
                <h4 style="color:#ef5777;font-size:28px;word-wrap:break-word;"><b id="isimb"><?= $rowYorum->isimSoyisim ?></b></h4><br>
                <p style="color:white;font-size:22px;word-wrap:break-word;" id="yorumb"><?= $rowYorum->yorum ?></p>
              </span>
            </div><br>
          <?php } ?>
            </div>
            <div class="comment289-box"><br>
            <span id="yorum" style="color: #ef5777;"><b>Kayıt olmadan yorum yap.</b></span><br><br>
            <?php
            if (@$_POST["submit"]) {
              $img = rand(0, 4);
              $id = $row['id'];
              $isimSoyisim = htmlspecialchars($_POST["isimSoyisim"], ENT_QUOTES, 'UTF-8');
              $yorum = htmlspecialchars($_POST["yorum"], ENT_QUOTES, 'UTF-8');
              $ekle = $db->prepare("insert into blogyorum(isimSoyisim,yorum,img,id)values(:isimSoyisim,:yorum,:img,:id)");
              $ekle->bindValue(":isimSoyisim", $isimSoyisim, PDO::PARAM_STR);
              $ekle->bindValue(":yorum", $yorum, PDO::PARAM_STR);
              $ekle->bindValue(":img", $img, PDO::PARAM_INT);
              $ekle->bindValue(":id", $id, PDO::PARAM_STR);

              if ($ekle->execute()) {
                $idd = $row['id'];
                echo ("<script>location.href = 'detay.php?id=$idd';</script>");
                echo ("<script>location.href = 'detay.php?id=$idd#yorum';</script>");
              } else {
                header("Location: blog-detay.php?i=hata");
                echo "Hata oluştu. Lütfen tekrar deneyiniz";
                exit;
              }
            }
            ?>
            <form method="post">
              <div class="mb-3">
                <label for="formGroupExampleInput" style="color:white;" class="form-label">İsim<b style="color: #58D68D;">*</b></label>
                <input type="text" class="form-control" name="isimSoyisim" required placeholder="Emre">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" style="color:white;" class="form-label">Yorum<b style="color: #58D68D;">*</b></label>
                <textarea class="form-control" required name="yorum" placeholder="Yorum Yazın" rows="4"></textarea>
              </div>
              <div class="mb-12">
                <input style="background-color: #ef5777; color:white;" class="btn btn-danger" type="submit" name="submit" value="yayınla">
              </div>
            </form>
          </div>
    </div>
</section>
<div class="container" id="sehir">
    <div class="row">
		<h2 style="color:#10ac84; margin-bottom:3%;"><b>İlanı Olan <i style="text-decoration:underline;">Şehirler</i></b></h2>
    <?php 
					$il   = $db->prepare("SELECT sehir FROM `blog` GROUP BY sehir");
					$il->execute();
					while ($ilCek = $il->fetch(PDO::FETCH_ASSOC)) {
						?>
        		<div class="col-xs-4" style="margin-bottom:2%">
				<li style="color:white">
				<a name="sehir" style="color:white; margin-left:3%;" data-scroll 
				href="il.php?sehir=<?= $ilCek['sehir']?>"><b><?= $ilCek['sehir']; ?></b></a>
					</li>

				
        </div>
		<?php }?>

    </div>
</div>

<footer id="footer" class="bg-one">
	<div class="container">
		<div class="row wow fadeInUp" data-wow-duration="500ms">
			<div class="col-lg-12">
				<div class="copyright text-center">
					
					<br />

					<p>Copyright
						&copy; <script>
							document.write(new Date().getFullYear())
						</script> All Rights Reserved.</p>
				</div>

			</div> 
		</div> 
	</div> 

		<script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="plugins/slick-carousel/slick/slick.min.js"></script>
		<script type="text/javascript" src="plugins/filterzr/jquery.filterizr.min.js"></script>
		<script type="text/javascript" src="plugins/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
		<script type="text/javascript" src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
		<script type="text/javascript" src="plugins/Sticky/jquery.sticky.js"></script>
		<script type="text/javascript" src="plugins/count-to/jquery.countTo.js"></script>
		<script type="text/javascript" src="plugins/wow/dist/wow.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		
    </body>
</html>