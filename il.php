<!DOCTYPE html>
<html class="tr">
<?php 
  $tamurl=$_SERVER['REQUEST_URI']; 
  $url=$_GET['sehir'];
		  
?>
<head>
<title>Araba Alım - Satım</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="google" content="nositelinkssearchbox" />
  <meta property="og:locale" content="tr_TR" />
  <meta name="publisher" content="20.20" />

  
  <meta name="author" content="SİTE İSMİ">
  <meta name="Description" content="<?php echo $url; ?> ilanları" />
  <meta name="Keywords" content="<?php echo $url; ?> ilanları, <?php echo $url; ?>, ilanlar" />
  <meta property="seg:news:description" content="<?php echo $url; ?> ilanları">
  <meta property="og:title" content="<?php echo $url; ?> ilanları" />
  <meta property="og:description" content="<?php echo $url; ?> ilanları" />
  <meta name="twitter:title" content="<?php echo $url; ?> ilanları" />
  <meta name="twitter:card" content="<?php echo $url; ?> ilanları" />



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
	<?php   require_once 'admin/pages/inc-functions.php'; ?>
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
          <b style="color:white">Ana Sayfa</b>
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
<?php 
$tamurl=$_SERVER['REQUEST_URI']; // çıktısı: /index.php?g=41455466448
$url=$_GET['sehir'];
?>
<style>
.filterDiv {
  float: left;
  color: #ffffff;
  text-align: center;
  margin: 2px;
  display: none;
}

.show {
  display: block;
}

.containerr {
  margin-top: 20px;
  overflow: hidden;
}

/* Style the buttons */
.btnn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

.btnn:hover {
  background-color: #ddd;
}

.btnn.active {
  background-color: #666;
  color: white;
}
</style>
<section id="ilan" class="section">
	<div class="container">
		<div class="row">
			<div class="title text-center wow fadeInUp" data-wow-duration="500ms">
				<h1 style="color:white"><?php echo $url; ?> -<span class="color"> İlanları</span></h1>
				<p style="color:white" >Fotoğrafın Üstüne Tıklayarak Arama Yapabilirsiniz</p>
				<div class="border"></div>
				<div class="row">
			<div class="col-md-12" id="myBtnContainer"><br>
			<div class="portfolio-filter">

				<button class="btnn active" type="button" class="active" onclick="filterSelection('all')">Tümü</button>
				<?php 
					$il   = $db->prepare("SELECT * FROM blog WHERE sehir = '$url' GROUP BY ilce");
					$il->execute();
					while ($ilCek = $il->fetch(PDO::FETCH_ASSOC)) {
						?>
				
				<button class="btnn" type="button" onclick="filterSelection('<?= $ilCek['ilce']; ?>')"><?= $ilCek['ilce']; ?></button>
		<?php }?>
		</div>

			</div>
		</div>
			</div>
			
			<?php
			//illere göre sıralama
    		
	

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

			  $cek   = $db->prepare("SELECT * FROM blog WHERE sehir = '$url' ORDER BY id DESC LIMIT " . $baslangic . "," . $adet);
			  
                    $cek->execute();
                    $veriler = $cek->fetchAll(PDO::FETCH_ASSOC);
                    
                        foreach ($veriler as $row){
                            ?>
			<div class="col-md-3 col-sm-6 col-xs-12  wow fadeInDown filterDiv <?= $row['ilce']; ?>" data-wow-duration="500ms">
               <div class="team-member">
					<div class="member-photo">
						<img style="height: 280px; width:100%" class="img-responsive" src="admin/pages/<?php echo $row['resim']; ?>" alt="Meghna">
						
						<div class="mask">
							<ul class="list-inline">
								<li><a style="width: 150px; padding:15; margin:15;" href="tel:+90<?= $row['alt_baslik'] ?>"><b>Hemen Ara</b><i class="fa fa-phone" aria-hidden="true"></i></a></li>
						</div>
					</div>

						<a data-effect="mfp-with-zoom" href="detay.php?id=<?= $row['id']?><?= $row['baslik']?>">
					<div class="member-meta">
						<h1 style="color: aliceblue;word-wrap:break-word; font-size:24px;"><?= $row['baslik']; ?></h1>
						<span style="word-wrap:break-word;color:#10ac84;font-size:16px;"><b><?= $row['sehir']; ?></b> - <?= $row['ilce']; ?></span>
						<p style="word-wrap:break-word;text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
						<?= htmlspecialchars_decode($row['aciklama']) ?></p>
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
	<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btnn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

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