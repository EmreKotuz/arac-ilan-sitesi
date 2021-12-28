<!DOCTYPE html>
<html class="tr">

<head>
<title>Araba Alım - Satım</title>

<!--BU SİTE 2. EL ARABA ALIM SATIM PLATFORMUDUR-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="google" content="nositelinkssearchbox" />
  <meta property="og:locale" content="tr_TR" />
  <meta name="publisher" content="20.20" />


  <meta name="author" content="SİTE İSMİ">
  <meta name="Description" content="Araba Alım - Satım" />
  <meta name="Keywords" content="Araba Alım Satım, araba, 2. el araba" />
  <meta property="seg:news:description" content="Araba alım satım">
  <meta property="og:title" content="Araba alım satım" />
  <meta property="og:description" content="Araba alım satım" />
  <meta name="twitter:title" content="Araba alım satım" />
  <meta name="twitter:card" content="Araba alım satım" />



	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="plugins/themefisher-font/style.css">
	<link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="plugins/animate-css/animate.css">
	<link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">
	<link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
	<link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="altsayilar/bundlee.css">
    <link rel="stylesheet" href="altsayilar/stylee.css">
</head>

<body id="body" data-spy="scroll" data-target=".navbar" data-offset="50">
<?php
  require_once 'admin/pages/inc-functions.php';
  ?>
<section class="hero-area overlay" style="background-image: url('images/banner/hero-area.jpg');">
	<div class="block">
		<h1>2. El Araba <b class="color">Alım - Satım</b></h1>
		<p>Türkiye'de en iyi platform ödüllü bu sitemiz aylık 100 bin araba ilanıyla kendi pazarında ilk sıradadır.</p>
		<a style="height:auto" data-scroll href="#ilan" class="btn btn-transparent"><b>Hemen Keşfet</b></a>
		<a style="height:auto; background-color:#57cacc" data-scroll href="#sehir" class="btn btn-transparent"><b>Şehir Seç</b></a>

	</div>
</section>


<section id="ilan" class="section">
	<div class="container">
		<div class="row">
			<div class="title text-center wow fadeInUp" data-wow-duration="500ms">
				<h2>Tüm <span class="color">İlanlar</span></h2>
				<p style="color:white" >Fotoğrafın Üstüne Tıklayarak Arama Yapabilirsiniz</p>
				<div class="border"></div>
			</div>
			<?php

			$adet       = 12; // Her seferinde kaç tane veri gösterileceğini belirtir.
			$toplamverisor  = $db->prepare("SELECT * FROM blog ORDER BY id DESC");


			$toplamverisor->execute();
			$toplamveri     = $toplamverisor->rowCount();
			$sayfa          = ceil($toplamveri / $adet); // Toplam veri ve her sayfada gösterilecek veri değerleri ile oluşacak sayfa sayısını bulduk.
			if (empty($_GET['s']) || $_GET['s'] <= 0) {
			  $_GET['s'] = 1;
			} elseif ($_GET['s'] > $sayfa) {
			  $_GET['s'] = $sayfa;
			}
			$baslangic  = ($_GET['s'] - 1) * $adet; // Verilerin kaçıncı indisten itibaren görüntüleneceğini belirtir.

			  //eğer arama yapılmadıysa
			  $cek   = $db->prepare("SELECT * FROM blog ORDER BY id DESC LIMIT " . $baslangic . "," . $adet);
			
                    $cek->execute();
                    $veriler = $cek->fetchAll(PDO::FETCH_ASSOC);
                    
                        foreach ($veriler as $row){
                            ?>
			<div class="col-md-3 col-sm-6 col-xs-12  wow fadeInDown" data-wow-duration="500ms">
               <div class="team-member">
					<div class="member-photo">
						<img style="height: 280px; width:100%" class="img-responsive" src="admin/pages/<?php echo $row['resim']; ?>" alt="Meghna">
						<div class="mask">
							<ul class="list-inline">
								<li><a style="width: 150px; padding:15; margin:15;" href="tel:+90<?= $row['alt_baslik'] ?>"><b>Hemen Ara</b><i class="fa fa-phone" aria-hidden="true"></i></a></li>
						</div>
					</div>

					<a href="detay.php?id=<?= $row['id']?><?= $row['baslik']?>">
					<div class="member-meta">
						<h3 style="max-width;word-wrap:break-word;text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><?= $row['baslik']; ?></h3>
						<p style="max-width;word-wrap:break-word;text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><?= htmlspecialchars_decode($row['aciklama']) ?></p>
						<span style="word-wrap:break-word;color:#10ac84;font-size:16px;"><b><?= $row['sehir']; ?></b> - <?= $row['ilce']; ?></span>
					</div>	
						</a>			   
               </div>
            </div>
		<?php } ?> 
		</div>  
		<?php $i = 1; ?>
                  <div style="margin-top: 15px; text-align:center">
                    <ul class="pagination pagination-lg">
                      <li <?= ($_GET['s'] <= 1) ? "onclick='return false;'" : ""; ?>>
					  <a aria-label="Previous" class="active" style="background-color:#10ac84" href="index.php?
					  <?= (!empty($_GET['q'])) ? "q=" . $kelime . "&"  : "" ?>s=
					  <?= ($_GET['s'] > 1) ? $_GET['s'] - 1 : $_GET['s']; ?>"><i class="fa fa-angle-left"></i>
					  <b style="color:white"><</b></a></li>

                      <?php while ($i <= $sayfa) { ?>
                        <li <?= ($_GET['s'] == $i) ? "onclick='return false;'" : ''; ?> class="
						<?= ($_GET['s'] == $i) ? 'active' : ''; ?>"><a href="index.php?
						<?= (!empty($_GET['q'])) ? "q=" . $kelime . "&"  : "" ?>s=<?php echo $i; ?>">
						<?= $i; ?></a></li>

                      <?php $i++;
                      } ?>

                      <li <?= ($_GET['s'] >= $sayfa) ? "onclick='return false;'" : ""; ?>>
					  <a aria-label="Next" style="background-color:#10ac84" href="index.php?
					  <?= (!empty($_GET['q'])) ? "q=" . $kelime . "&"  : "" ?>s=
					  <?= ($_GET['s'] < $sayfa) ? $_GET['s'] + 1 : $_GET['s']; ?>">
					  <i class="fa fa-angle-right"></i><b style="color:white">></b></a></li>
                    </ul>
                  </div>      	
	</div>   	
</section>   
	<div class="col-xs-12 " data-wow-duration="500ms">

	</div>
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
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
		<script type="text/javascript" src="plugins/Sticky/jquery.sticky.js"></script>
		<script type="text/javascript" src="plugins/count-to/jquery.countTo.js"></script>
		<script type="text/javascript" src="plugins/wow/dist/wow.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		
    </body>
</html>