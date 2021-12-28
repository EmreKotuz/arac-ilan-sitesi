<?php
require_once 'inc-functions.php';
 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>İlan - Düzenle</title>

    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link rel="tekonek icon" href="img/favicon.png" />

    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
  <?php

  @$id=$_GET["id"];
  //düzenleye veri çekme
  $cek = $db->prepare("select * from blog where id = :id");
  $cek->bindValue(":id", $id, PDO::PARAM_INT);
  $cek->execute();
  $row = $cek->fetch(PDO::FETCH_ASSOC);


    if (@$_POST["submit"]) {

      $baslik = htmlspecialchars($_POST["baslik"], ENT_QUOTES, 'UTF-8');
      $alt_baslik = htmlspecialchars($_POST["altbaslik"], ENT_QUOTES, 'UTF-8');
      $aciklama = htmlspecialchars($_POST["aciklama"], ENT_QUOTES, 'UTF-8');
      $aktif = htmlspecialchars($_POST["aktif"], ENT_QUOTES, 'UTF-8');
      $anahtarKelime = htmlspecialchars($_POST["anahtarKelime"], ENT_QUOTES, 'UTF-8');
      $sehir = htmlspecialchars($_POST["sehir"], ENT_QUOTES, 'UTF-8');
      $ilce = htmlspecialchars($_POST["ilce"], ENT_QUOTES, 'UTF-8');

      $guncelle = $db->prepare("update blog set baslik = :baslik, alt_baslik = :alt_baslik, aciklama= :aciklama, aktif = :aktif, sehir = :sehir,ilce = :ilce, anahtarKelime = :anahtarKelime  where id = :id");
      $guncelle->bindValue(":baslik",$baslik, PDO::PARAM_STR);
      $guncelle->bindValue(":alt_baslik",$alt_baslik, PDO::PARAM_STR);
      $guncelle->bindValue(":aciklama",$aciklama, PDO::PARAM_STR);
      $guncelle->bindValue(":aktif",$aktif, PDO::PARAM_INT);
      $guncelle->bindValue(":id",$id, PDO::PARAM_STR);
      $guncelle->bindValue(":anahtarKelime",$anahtarKelime,PDO::PARAM_STR);
      $guncelle->bindValue(":sehir",$sehir,PDO::PARAM_STR);
      $guncelle->bindValue(":ilce",$ilce,PDO::PARAM_STR);


        if ($guncelle->execute()) {
          header("Location: tables.php?i=ekle");
        }else {
          //hata mesajı
          //print_r($ekle->errorInfo());
          header("Location: tables.php?i=hata");
        }

    }

  ?>
<script>
        var data = [
  {
    il: "Adana",
    plaka: 1,
    ilceleri: [
      "Aladağ",
      "Ceyhan",
      "Çukurova",
      "Feke",
      "İmamoğlu",
      "Karaisalı",
      "Karataş",
      "Kozan",
      "Pozantı",
      "Saimbeyli",
      "Sarıçam",
      "Seyhan",
      "Tufanbeyli",
      "Yumurtalık",
      "Yüreğir"
    ]
  },
  {
    il: "Adıyaman",
    plaka: 2,
    ilceleri: [
      "Besni",
      "Çelikhan",
      "Gerger",
      "Gölbaşı",
      "Kahta",
      "Merkez",
      "Samsat",
      "Sincik",
      "Tut"
    ]
  },
  {
    il: "Afyonkarahisar",
    plaka: 3,
    ilceleri: [
      "Başmakçı",
      "Bayat",
      "Bolvadin",
      "Çay",
      "Çobanlar",
      "Dazkırı",
      "Dinar",
      "Emirdağ",
      "Evciler",
      "Hocalar",
      "İhsaniye",
      "İscehisar",
      "Kızılören",
      "Merkez",
      "Sandıklı",
      "Sinanpaşa",
      "Sultandağı",
      "Şuhut"
    ]
  },
  {
    il: "Ağrı",
    plaka: 4,
    ilceleri: [
      "Diyadin",
      "Doğubayazıt",
      "Eleşkirt",
      "Hamur",
      "Merkez",
      "Patnos",
      "Taşlıçay",
      "Tutak"
    ]
  },
  {
    il: "Amasya",
    plaka: 5,
    ilceleri: [
      "Göynücek",
      "Gümüşhacıköy",
      "Hamamözü",
      "Merkez",
      "Merzifon",
      "Suluova",
      "Taşova"
    ]
  },
  {
    il: "Ankara",
    plaka: 6,
    ilceleri: [
      "Altındağ",
      "Ayaş",
      "Bala",
      "Beypazarı",
      "Çamlıdere",
      "Çankaya",
      "Çubuk",
      "Elmadağ",
      "Güdül",
      "Haymana",
      "Kalecik",
      "Kızılcahamam",
      "Nallıhan",
      "Polatlı",
      "Şereflikoçhisar",
      "Yenimahalle",
      "Gölbaşı",
      "Keçiören",
      "Mamak",
      "Sincan",
      "Kazan",
      "Akyurt",
      "Etimesgut",
      "Evren",
      "Pursaklar"
    ]
  },
  {
    il: "Antalya",
    plaka: 7,
    ilceleri: [
      "Akseki",
      "Alanya",
      "Elmalı",
      "Finike",
      "Gazipaşa",
      "Gündoğmuş",
      "Kaş",
      "Korkuteli",
      "Kumluca",
      "Manavgat",
      "Serik",
      "Demre",
      "İbradı",
      "Kemer",
      "Aksu",
      "Döşemealtı",
      "Kepez",
      "Konyaaltı",
      "Muratpaşa"
    ]
  },
  {
    il: "Artvin",
    plaka: 8,
    ilceleri: [
      "Ardanuç",
      "Arhavi",
      "Merkez",
      "Borçka",
      "Hopa",
      "Şavşat",
      "Yusufeli",
      "Murgul"
    ]
  },
  {
    il: "Aydın",
    plaka: 9,
    ilceleri: [
      "Merkez",
      "Bozdoğan",
      "Efeler",
      "Çine",
      "Germencik",
      "Karacasu",
      "Koçarlı",
      "Kuşadası",
      "Kuyucak",
      "Nazilli",
      "Söke",
      "Sultanhisar",
      "Yenipazar",
      "Buharkent",
      "İncirliova",
      "Karpuzlu",
      "Köşk",
      "Didim"
    ]
  },
  {
    il: "Balıkesir",
    plaka: 10,
    ilceleri: [
      "Altıeylül",
      "Ayvalık",
      "Merkez",
      "Balya",
      "Bandırma",
      "Bigadiç",
      "Burhaniye",
      "Dursunbey",
      "Edremit",
      "Erdek",
      "Gönen",
      "Havran",
      "İvrindi",
      "Karesi",
      "Kepsut",
      "Manyas",
      "Savaştepe",
      "Sındırgı",
      "Gömeç",
      "Susurluk",
      "Marmara"
    ]
  },
  {
    il: "Bilecik",
    plaka: 11,
    ilceleri: [
      "Merkez",
      "Bozüyük",
      "Gölpazarı",
      "Osmaneli",
      "Pazaryeri",
      "Söğüt",
      "Yenipazar",
      "İnhisar"
    ]
  },
  {
    il: "Bingöl",
    plaka: 12,
    ilceleri: [
      "Merkez",
      "Genç",
      "Karlıova",
      "Kiğı",
      "Solhan",
      "Adaklı",
      "Yayladere",
      "Yedisu"
    ]
  },
  {
    il: "Bitlis",
    plaka: 13,
    ilceleri: [
      "Adilcevaz",
      "Ahlat",
      "Merkez",
      "Hizan",
      "Mutki",
      "Tatvan",
      "Güroymak"
    ]
  },
  {
    il: "Bolu",
    plaka: 14,
    ilceleri: [
      "Merkez",
      "Gerede",
      "Göynük",
      "Kıbrıscık",
      "Mengen",
      "Mudurnu",
      "Seben",
      "Dörtdivan",
      "Yeniçağa"
    ]
  },
  {
    il: "Burdur",
    plaka: 15,
    ilceleri: [
      "Ağlasun",
      "Bucak",
      "Merkez",
      "Gölhisar",
      "Tefenni",
      "Yeşilova",
      "Karamanlı",
      "Kemer",
      "Altınyayla",
      "Çavdır",
      "Çeltikçi"
    ]
  },
  {
    il: "Bursa",
    plaka: 16,
    ilceleri: [
      "Gemlik",
      "İnegöl",
      "İznik",
      "Karacabey",
      "Keles",
      "Mudanya",
      "Mustafakemalpaşa",
      "Orhaneli",
      "Orhangazi",
      "Yenişehir",
      "Büyükorhan",
      "Harmancık",
      "Nilüfer",
      "Osmangazi",
      "Yıldırım",
      "Gürsu",
      "Kestel"
    ]
  },
  {
    il: "Çanakkale",
    plaka: 17,
    ilceleri: [
      "Ayvacık",
      "Bayramiç",
      "Biga",
      "Bozcaada",
      "Çan",
      "Merkez",
      "Eceabat",
      "Ezine",
      "Gelibolu",
      "Gökçeada",
      "Lapseki",
      "Yenice"
    ]
  },
  {
    il: "Çankırı",
    plaka: 18,
    ilceleri: [
      "Merkez",
      "Çerkeş",
      "Eldivan",
      "Ilgaz",
      "Kurşunlu",
      "Orta",
      "Şabanözü",
      "Yapraklı",
      "Atkaracalar",
      "Kızılırmak",
      "Bayramören",
      "Korgun"
    ]
  },
  {
    il: "Çorum",
    plaka: 19,
    ilceleri: [
      "Alaca",
      "Bayat",
      "Merkez",
      "İskilip",
      "Kargı",
      "Mecitözü",
      "Ortaköy",
      "Osmancık",
      "Sungurlu",
      "Boğazkale",
      "Uğurludağ",
      "Dodurga",
      "Laçin",
      "Oğuzlar"
    ]
  },
  {
    il: "Denizli",
    plaka: 20,
    ilceleri: [
      "Acıpayam",
      "Buldan",
      "Çal",
      "Çameli",
      "Çardak",
      "Çivril",
      "Merkez",
      "Merkezefendi",
      "Pamukkale",
      "Güney",
      "Kale",
      "Sarayköy",
      "Tavas",
      "Babadağ",
      "Bekilli",
      "Honaz",
      "Serinhisar",
      "Baklan",
      "Beyağaç",
      "Bozkurt"
    ]
  },
  {
    il: "Diyarbakır",
    plaka: 21,
    ilceleri: [
      "Kocaköy",
      "Çermik",
      "Çınar",
      "Çüngüş",
      "Dicle",
      "Ergani",
      "Hani",
      "Hazro",
      "Kulp",
      "Lice",
      "Silvan",
      "Eğil",
      "Bağlar",
      "Kayapınar",
      "Sur",
      "Yenişehir",
      "Bismil"
    ]
  },
  {
    il: "Edirne",
    plaka: 22,
    ilceleri: [
      "Merkez",
      "Enez",
      "Havsa",
      "İpsala",
      "Keşan",
      "Lalapaşa",
      "Meriç",
      "Uzunköprü",
      "Süloğlu"
    ]
  },
  {
    il: "Elazığ",
    plaka: 23,
    ilceleri: [
      "Ağın",
      "Baskil",
      "Merkez",
      "Karakoçan",
      "Keban",
      "Maden",
      "Palu",
      "Sivrice",
      "Arıcak",
      "Kovancılar",
      "Alacakaya"
    ]
  },
  {
    il: "Erzincan",
    plaka: 24,
    ilceleri: [
      "Çayırlı",
      "Merkez",
      "İliç",
      "Kemah",
      "Kemaliye",
      "Refahiye",
      "Tercan",
      "Üzümlü",
      "Otlukbeli"
    ]
  },
  {
    il: "Erzurum",
    plaka: 25,
    ilceleri: [
      "Aşkale",
      "Çat",
      "Hınıs",
      "Horasan",
      "İspir",
      "Karayazı",
      "Narman",
      "Oltu",
      "Olur",
      "Pasinler",
      "Şenkaya",
      "Tekman",
      "Tortum",
      "Karaçoban",
      "Uzundere",
      "Pazaryolu",
      "Köprüköy",
      "Palandöken",
      "Yakutiye",
      "Aziziye"
    ]
  },
  {
    il: "Eskişehir",
    plaka: 26,
    ilceleri: [
      "Çifteler",
      "Mahmudiye",
      "Mihalıççık",
      "Sarıcakaya",
      "Seyitgazi",
      "Sivrihisar",
      "Alpu",
      "Beylikova",
      "İnönü",
      "Günyüzü",
      "Han",
      "Mihalgazi",
      "Odunpazarı",
      "Tepebaşı"
    ]
  },
  {
    il: "Gaziantep",
    plaka: 27,
    ilceleri: [
      "Araban",
      "İslahiye",
      "Nizip",
      "Oğuzeli",
      "Yavuzeli",
      "Şahinbey",
      "Şehitkamil",
      "Karkamış",
      "Nurdağı"
    ]
  },
  {
    il: "Giresun",
    plaka: 28,
    ilceleri: [
      "Alucra",
      "Bulancak",
      "Dereli",
      "Espiye",
      "Eynesil",
      "Merkez",
      "Görele",
      "Keşap",
      "Şebinkarahisar",
      "Tirebolu",
      "Piraziz",
      "Yağlıdere",
      "Çamoluk",
      "Çanakçı",
      "Doğankent",
      "Güce"
    ]
  },
  {
    il: "Gümüşhane",
    plaka: 29,
    ilceleri: ["Merkez", "Kelkit", "Şiran", "Torul", "Köse", "Kürtün"]
  },
  {
    il: "Hakkari",
    plaka: 30,
    ilceleri: ["Çukurca", "Merkez", "Şemdinli", "Yüksekova"]
  },
  {
    il: "Hatay",
    plaka: 31,
    ilceleri: [
      "Altınözü",
      "Arsuz",
      "Defne",
      "Dörtyol",
      "Hassa",
      "Antakya",
      "İskenderun",
      "Kırıkhan",
      "Payas",
      "Reyhanlı",
      "Samandağ",
      "Yayladağı",
      "Erzin",
      "Belen",
      "Kumlu"
    ]
  },
  {
    il: "Isparta",
    plaka: 32,
    ilceleri: [
      "Atabey",
      "Eğirdir",
      "Gelendost",
      "Merkez",
      "Keçiborlu",
      "Senirkent",
      "Sütçüler",
      "Şarkikaraağaç",
      "Uluborlu",
      "Yalvaç",
      "Aksu",
      "Gönen",
      "Yenişarbademli"
    ]
  },
  {
    il: "Mersin",
    plaka: 33,
    ilceleri: [
      "Anamur",
      "Erdemli",
      "Gülnar",
      "Mut",
      "Silifke",
      "Tarsus",
      "Aydıncık",
      "Bozyazı",
      "Çamlıyayla",
      "Akdeniz",
      "Mezitli",
      "Toroslar",
      "Yenişehir"
    ]
  },
  {
    il: "İstanbul",
    plaka: 34,
    ilceleri: [
      "Adalar",
      "Bakırköy",
      "Beşiktaş",
      "Beykoz",
      "Beyoğlu",
      "Çatalca",
      "Eyüp",
      "Fatih",
      "Gaziosmanpaşa",
      "Kadıköy",
      "Kartal",
      "Sarıyer",
      "Silivri",
      "Şile",
      "Şişli",
      "Üsküdar",
      "Zeytinburnu",
      "Büyükçekmece",
      "Kağıthane",
      "Küçükçekmece",
      "Pendik",
      "Ümraniye",
      "Bayrampaşa",
      "Avcılar",
      "Bağcılar",
      "Bahçelievler",
      "Güngören",
      "Maltepe",
      "Sultanbeyli",
      "Tuzla",
      "Esenler",
      "Arnavutköy",
      "Ataşehir",
      "Başakşehir",
      "Beylikdüzü",
      "Çekmeköy",
      "Esenyurt",
      "Sancaktepe",
      "Sultangazi"
    ]
  },
  {
    il: "İzmir",
    plaka: 35,
    ilceleri: [
      "Aliağa",
      "Bayındır",
      "Bergama",
      "Bornova",
      "Çeşme",
      "Dikili",
      "Foça",
      "Karaburun",
      "Karşıyaka",
      "Kemalpaşa",
      "Kınık",
      "Kiraz",
      "Menemen",
      "Ödemiş",
      "Seferihisar",
      "Selçuk",
      "Tire",
      "Torbalı",
      "Urla",
      "Beydağ",
      "Buca",
      "Konak",
      "Menderes",
      "Balçova",
      "Çiğli",
      "Gaziemir",
      "Narlıdere",
      "Güzelbahçe",
      "Bayraklı",
      "Karabağlar"
    ]
  },
  {
    il: "Kars",
    plaka: 36,
    ilceleri: [
      "Arpaçay",
      "Digor",
      "Kağızman",
      "Merkez",
      "Sarıkamış",
      "Selim",
      "Susuz",
      "Akyaka"
    ]
  },
  {
    il: "Kastamonu",
    plaka: 37,
    ilceleri: [
      "Abana",
      "Araç",
      "Azdavay",
      "Bozkurt",
      "Cide",
      "Çatalzeytin",
      "Daday",
      "Devrekani",
      "İnebolu",
      "Merkez",
      "Küre",
      "Taşköprü",
      "Tosya",
      "İhsangazi",
      "Pınarbaşı",
      "Şenpazar",
      "Ağlı",
      "Doğanyurt",
      "Hanönü",
      "Seydiler"
    ]
  },
  {
    il: "Kayseri",
    plaka: 38,
    ilceleri: [
      "Bünyan",
      "Develi",
      "Felahiye",
      "İncesu",
      "Pınarbaşı",
      "Sarıoğlan",
      "Sarız",
      "Tomarza",
      "Yahyalı",
      "Yeşilhisar",
      "Akkışla",
      "Talas",
      "Kocasinan",
      "Melikgazi",
      "Hacılar",
      "Özvatan"
    ]
  },
  {
    il: "Kırklareli",
    plaka: 39,
    ilceleri: [
      "Babaeski",
      "Demirköy",
      "Merkez",
      "Kofçaz",
      "Lüleburgaz",
      "Pehlivanköy",
      "Pınarhisar",
      "Vize"
    ]
  },
  {
    il: "Kırşehir",
    plaka: 40,
    ilceleri: [
      "Çiçekdağı",
      "Kaman",
      "Merkez",
      "Mucur",
      "Akpınar",
      "Akçakent",
      "Boztepe"
    ]
  },
  {
    il: "Kocaeli",
    plaka: 41,
    ilceleri: [
      "Gebze",
      "Gölcük",
      "Kandıra",
      "Karamürsel",
      "Körfez",
      "Derince",
      "Başiskele",
      "Çayırova",
      "Darıca",
      "Dilovası",
      "İzmit",
      "Kartepe"
    ]
  },
  {
    il: "Konya",
    plaka: 42,
    ilceleri: [
      "Akşehir",
      "Beyşehir",
      "Bozkır",
      "Cihanbeyli",
      "Çumra",
      "Doğanhisar",
      "Ereğli",
      "Hadim",
      "Ilgın",
      "Kadınhanı",
      "Karapınar",
      "Kulu",
      "Sarayönü",
      "Seydişehir",
      "Yunak",
      "Akören",
      "Altınekin",
      "Derebucak",
      "Hüyük",
      "Karatay",
      "Meram",
      "Selçuklu",
      "Taşkent",
      "Ahırlı",
      "Çeltik",
      "Derbent",
      "Emirgazi",
      "Güneysınır",
      "Halkapınar",
      "Tuzlukçu",
      "Yalıhüyük"
    ]
  },
  {
    il: "Kütahya",
    plaka: 43,
    ilceleri: [
      "Altıntaş",
      "Domaniç",
      "Emet",
      "Gediz",
      "Merkez",
      "Simav",
      "Tavşanlı",
      "Aslanapa",
      "Dumlupınar",
      "Hisarcık",
      "Şaphane",
      "Çavdarhisar",
      "Pazarlar"
    ]
  },
  {
    il: "Malatya",
    plaka: 44,
    ilceleri: [
      "Akçadağ",
      "Arapgir",
      "Arguvan",
      "Darende",
      "Doğanşehir",
      "Hekimhan",
      "Merkez",
      "Pütürge",
      "Yeşilyurt",
      "Battalgazi",
      "Doğanyol",
      "Kale",
      "Kuluncak",
      "Yazıhan"
    ]
  },
  {
    il: "Manisa",
    plaka: 45,
    ilceleri: [
      "Akhisar",
      "Alaşehir",
      "Demirci",
      "Gördes",
      "Kırkağaç",
      "Kula",
      "Merkez",
      "Salihli",
      "Sarıgöl",
      "Saruhanlı",
      "Selendi",
      "Soma",
      "Şehzadeler",
      "Yunusemre",
      "Turgutlu",
      "Ahmetli",
      "Gölmarmara",
      "Köprübaşı"
    ]
  },
  {
    il: "Kahramanmaraş",
    plaka: 46,
    ilceleri: [
      "Afşin",
      "Andırın",
      "Dulkadiroğlu",
      "Onikişubat",
      "Elbistan",
      "Göksun",
      "Merkez",
      "Pazarcık",
      "Türkoğlu",
      "Çağlayancerit",
      "Ekinözü",
      "Nurhak"
    ]
  },
  {
    il: "Mardin",
    plaka: 47,
    ilceleri: [
      "Derik",
      "Kızıltepe",
      "Artuklu",
      "Merkez",
      "Mazıdağı",
      "Midyat",
      "Nusaybin",
      "Ömerli",
      "Savur",
      "Dargeçit",
      "Yeşilli"
    ]
  },
  {
    il: "Muğla",
    plaka: 48,
    ilceleri: [
      "Bodrum",
      "Datça",
      "Fethiye",
      "Köyceğiz",
      "Marmaris",
      "Menteşe",
      "Milas",
      "Ula",
      "Yatağan",
      "Dalaman",
      "Seydikemer",
      "Ortaca",
      "Kavaklıdere"
    ]
  },
  {
    il: "Muş",
    plaka: 49,
    ilceleri: ["Bulanık", "Malazgirt", "Merkez", "Varto", "Hasköy", "Korkut"]
  },
  {
    il: "Nevşehir",
    plaka: 50,
    ilceleri: [
      "Avanos",
      "Derinkuyu",
      "Gülşehir",
      "Hacıbektaş",
      "Kozaklı",
      "Merkez",
      "Ürgüp",
      "Acıgöl"
    ]
  },
  {
    il: "Niğde",
    plaka: 51,
    ilceleri: ["Bor", "Çamardı", "Merkez", "Ulukışla", "Altunhisar", "Çiftlik"]
  },
  {
    il: "Ordu",
    plaka: 52,
    ilceleri: [
      "Akkuş",
      "Altınordu",
      "Aybastı",
      "Fatsa",
      "Gölköy",
      "Korgan",
      "Kumru",
      "Mesudiye",
      "Perşembe",
      "Ulubey",
      "Ünye",
      "Gülyalı",
      "Gürgentepe",
      "Çamaş",
      "Çatalpınar",
      "Çaybaşı",
      "İkizce",
      "Kabadüz",
      "Kabataş"
    ]
  },
  {
    il: "Rize",
    plaka: 53,
    ilceleri: [
      "Ardeşen",
      "Çamlıhemşin",
      "Çayeli",
      "Fındıklı",
      "İkizdere",
      "Kalkandere",
      "Pazar",
      "Merkez",
      "Güneysu",
      "Derepazarı",
      "Hemşin",
      "İyidere"
    ]
  },
  {
    il: "Sakarya",
    plaka: 54,
    ilceleri: [
      "Akyazı",
      "Geyve",
      "Hendek",
      "Karasu",
      "Kaynarca",
      "Sapanca",
      "Kocaali",
      "Pamukova",
      "Taraklı",
      "Ferizli",
      "Karapürçek",
      "Söğütlü",
      "Adapazarı",
      "Arifiye",
      "Erenler",
      "Serdivan"
    ]
  },
  {
    il: "Samsun",
    plaka: 55,
    ilceleri: [
      "Alaçam",
      "Bafra",
      "Çarşamba",
      "Havza",
      "Kavak",
      "Ladik",
      "Terme",
      "Vezirköprü",
      "Asarcık",
      "Ondokuzmayıs",
      "Salıpazarı",
      "Tekkeköy",
      "Ayvacık",
      "Yakakent",
      "Atakum",
      "Canik",
      "İlkadım"
    ]
  },
  {
    il: "Siirt",
    plaka: 56,
    ilceleri: [
      "Baykan",
      "Eruh",
      "Kurtalan",
      "Pervari",
      "Merkez",
      "Şirvan",
      "Tillo"
    ]
  },
  {
    il: "Sinop",
    plaka: 57,
    ilceleri: [
      "Ayancık",
      "Boyabat",
      "Durağan",
      "Erfelek",
      "Gerze",
      "Merkez",
      "Türkeli",
      "Dikmen",
      "Saraydüzü"
    ]
  },
  {
    il: "Sivas",
    plaka: 58,
    ilceleri: [
      "Divriği",
      "Gemerek",
      "Gürün",
      "Hafik",
      "İmranlı",
      "Kangal",
      "Koyulhisar",
      "Merkez",
      "Suşehri",
      "Şarkışla",
      "Yıldızeli",
      "Zara",
      "Akıncılar",
      "Altınyayla",
      "Doğanşar",
      "Gölova",
      "Ulaş"
    ]
  },
  {
    il: "Tekirdağ",
    plaka: 59,
    ilceleri: [
      "Çerkezköy",
      "Çorlu",
      "Ergene",
      "Hayrabolu",
      "Malkara",
      "Muratlı",
      "Saray",
      "Süleymanpaşa",
      "Kapaklı",
      "Şarköy",
      "Marmaraereğlisi"
    ]
  },
  {
    il: "Tokat",
    plaka: 60,
    ilceleri: [
      "Almus",
      "Artova",
      "Erbaa",
      "Niksar",
      "Reşadiye",
      "Merkez",
      "Turhal",
      "Zile",
      "Pazar",
      "Yeşilyurt",
      "Başçiftlik",
      "Sulusaray"
    ]
  },
  {
    il: "Trabzon",
    plaka: 61,
    ilceleri: [
      "Akçaabat",
      "Araklı",
      "Arsin",
      "Çaykara",
      "Maçka",
      "Of",
      "Ortahisar",
      "Sürmene",
      "Tonya",
      "Vakfıkebir",
      "Yomra",
      "Beşikdüzü",
      "Şalpazarı",
      "Çarşıbaşı",
      "Dernekpazarı",
      "Düzköy",
      "Hayrat",
      "Köprübaşı"
    ]
  },
  {
    il: "Tunceli",
    plaka: 62,
    ilceleri: [
      "Çemişgezek",
      "Hozat",
      "Mazgirt",
      "Nazımiye",
      "Ovacık",
      "Pertek",
      "Pülümür",
      "Merkez"
    ]
  },
  {
    il: "Şanlıurfa",
    plaka: 63,
    ilceleri: [
      "Akçakale",
      "Birecik",
      "Bozova",
      "Ceylanpınar",
      "Eyyübiye",
      "Halfeti",
      "Haliliye",
      "Hilvan",
      "Karaköprü",
      "Siverek",
      "Suruç",
      "Viranşehir",
      "Harran"
    ]
  },
  {
    il: "Uşak",
    plaka: 64,
    ilceleri: ["Banaz", "Eşme", "Karahallı", "Sivaslı", "Ulubey", "Merkez"]
  },
  {
    il: "Van",
    plaka: 65,
    ilceleri: [
      "Başkale",
      "Çatak",
      "Erciş",
      "Gevaş",
      "Gürpınar",
      "İpekyolu",
      "Muradiye",
      "Özalp",
      "Tuşba",
      "Bahçesaray",
      "Çaldıran",
      "Edremit",
      "Saray"
    ]
  },
  {
    il: "Yozgat",
    plaka: 66,
    ilceleri: [
      "Akdağmadeni",
      "Boğazlıyan",
      "Çayıralan",
      "Çekerek",
      "Sarıkaya",
      "Sorgun",
      "Şefaatli",
      "Yerköy",
      "Merkez",
      "Aydıncık",
      "Çandır",
      "Kadışehri",
      "Saraykent",
      "Yenifakılı"
    ]
  },
  {
    il: "Zonguldak",
    plaka: 67,
    ilceleri: ["Çaycuma", "Devrek", "Ereğli", "Merkez", "Alaplı", "Gökçebey"]
  },
  {
    il: "Aksaray",
    plaka: 68,
    ilceleri: [
      "Ağaçören",
      "Eskil",
      "Gülağaç",
      "Güzelyurt",
      "Merkez",
      "Ortaköy",
      "Sarıyahşi"
    ]
  },
  {
    il: "Bayburt",
    plaka: 69,
    ilceleri: ["Merkez", "Aydıntepe", "Demirözü"]
  },
  {
    il: "Karaman",
    plaka: 70,
    ilceleri: [
      "Ermenek",
      "Merkez",
      "Ayrancı",
      "Kazımkarabekir",
      "Başyayla",
      "Sarıveliler"
    ]
  },
  {
    il: "Kırıkkale",
    plaka: 71,
    ilceleri: [
      "Delice",
      "Keskin",
      "Merkez",
      "Sulakyurt",
      "Bahşili",
      "Balışeyh",
      "Çelebi",
      "Karakeçili",
      "Yahşihan"
    ]
  },
  {
    il: "Batman",
    plaka: 72,
    ilceleri: ["Merkez", "Beşiri", "Gercüş", "Kozluk", "Sason", "Hasankeyf"]
  },
  {
    il: "Şırnak",
    plaka: 73,
    ilceleri: [
      "Beytüşşebap",
      "Cizre",
      "İdil",
      "Silopi",
      "Merkez",
      "Uludere",
      "Güçlükonak"
    ]
  },
  {
    il: "Bartın",
    plaka: 74,
    ilceleri: ["Merkez", "Kurucaşile", "Ulus", "Amasra"]
  },
  {
    il: "Ardahan",
    plaka: 75,
    ilceleri: ["Merkez", "Çıldır", "Göle", "Hanak", "Posof", "Damal"]
  },
  {
    il: "Iğdır",
    plaka: 76,
    ilceleri: ["Aralık", "Merkez", "Tuzluca", "Karakoyunlu"]
  },
  {
    il: "Yalova",
    plaka: 77,
    ilceleri: [
      "Merkez",
      "Altınova",
      "Armutlu",
      "Çınarcık",
      "Çiftlikköy",
      "Termal"
    ]
  },
  {
    il: "Karabük",
    plaka: 78,
    ilceleri: [
      "Eflani",
      "Eskipazar",
      "Merkez",
      "Ovacık",
      "Safranbolu",
      "Yenice"
    ]
  },
  {
    il: "Kilis",
    plaka: 79,
    ilceleri: ["Merkez", "Elbeyli", "Musabeyli", "Polateli"]
  },
  {
    il: "Osmaniye",
    plaka: 80,
    ilceleri: [
      "Bahçe",
      "Kadirli",
      "Merkez",
      "Düziçi",
      "Hasanbeyli",
      "Sumbas",
      "Toprakkale"
    ]
  },
  {
    il: "Düzce",
    plaka: 81,
    ilceleri: [
      "Akçakoca",
      "Merkez",
      "Yığılca",
      "Cumayeri",
      "Gölyaka",
      "Çilimli",
      "Gümüşova",
      "Kaynaşlı"
    ]
  }
];
function search(nameKey, myArray) {
  for (var i = 0; i < myArray.length; i++) {
    if (myArray[i].il == nameKey) {
      return myArray[i];
    }
  }
}
$(document).ready(function () {
  $.each(data, function (index, value) {
    $("#Iller").append(
      $("<option>", {
        value: value.il,
        text: value.il
      })
    );
  });
  $("#Iller").change(function () {
    var valueSelected = this.value;
    if ($("#Iller").val() != "") {
      $("#Ilceler").html("");
      $("#Ilceler").append(
        $("<option>", {
          value: "",
          text: "Lütfen Bir İlçe seçiniz"
        })
      );
      $("#Ilceler").prop("disabled", false);
      var resultObject = search($("#Iller").val(), data);
      $.each(resultObject.ilceleri, function (index, value) {
        $("#Ilceler").append(
          $("<option>", {
            value: value,
            text: value
          })
        );
      });
      return false;
    }
    $("#Ilceler").prop("disabled", true);
  });
});




    </script>

    <div id="wrapper">

        <div style="margin-left:10%;margin-right:10%;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Düzenle <b style="color:#27ae60">(<?= $row['baslik'] ?>)</b></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div >
                        <div class="panel-heading">
                        <a class="btn btn-danger" style="background-color:#2c3e50;" href="tables.php"><b>Geri Dön</b></a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="" method="POST" enctype="multipart/form-data">


                                        <div class="form-group">
                                            <label>Anahtar Kelimeler</label>
                                            <input class="form-control" name="anahtarKelime" value="<?= $row["anahtarKelime"] ?>" placeholder="Anahtar Kelimeliri Giriniz">
                                        </div>
                                        <div class="form-group">
                                            <label>İsmi</label>
                                            <input class="form-control" name="baslik" value="<?= $row["baslik"] ?>" placeholder="Başlık Giriniz">
                                        </div>
                                        <div class="form-group">
                                            <label>Telefon Numarası</label>
                                            <input class="form-control" name="altbaslik" value="<?=$row["alt_baslik"]?>" placeholder="545..">
                                        </div>
                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea class="form-control" name="aciklama" id="mytextarea" rows="3"><?=$row["aciklama"]?></textarea>
                                        </div>
                                        <select name="sehir" id="Iller">
                                            <option value="<?=$row["sehir"]?>"><?=$row["sehir"]?></option>
                                        </select>
                                        <select name="ilce" id="Ilceler">
                                            <option value="<?=$row["ilce"]?>"><?=$row["ilce"]?></option>
                                        </select><br><br>
                                        <div class="form-group">
                                            <label>Aktif - Pasif</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif" id="optionsRadios1" value="1"
                                                    <?php
                                                    //hızlı if else kullanımı
                                                    echo ($row["aktif"] == 1) ? 'checked' : '';
                                                     ?>
                                                    checked>Aktif
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif" id="optionsRadios2" value="0"
                                                    <?php
                                                    //hızlı if else kullanımı
                                                    echo ($row["aktif"] == 0) ? 'checked' : '';
                                                     ?>
                                                    >Pasif
                                                </label>
                                            </div>
                                            

                                        </div>

                                        <input type="submit" name="submit" value="Güncelle" class="btn btn-success">
                                        <button type="reset" class="btn btn-danger">Temizle</button>


                                    </form>

                                </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>


    <script src='../js/tinymce.min.js'></script>

    <script>
       tinymce.init({
         selector: '#mytextarea'
       });
     </script>
</body>

</html>
