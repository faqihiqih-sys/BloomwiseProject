<?php require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>

<!DOCTYPE html>
<html lang="en">
<head>

<link rel="manifest" href="site.webmanifest">
<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<meta name="theme-color" content="#000000">

<!-- Slick Carousel CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

	<!-- Font Awesome 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>BLOOMWISE | New Brand Local Original from JAKARTA UTARA</title>
	<meta name="description" content="Distro, Jakarta, terlengkap, information, technology, jaKarata Utara, baru, murah"/>
	<meta name="keywords" content="Kaos, Murah, Jakarta, Baru, terlengkap, harga, terjangkau" />
	<meta name="author" content="Hakko Bio Richard"/>
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:image" content=""/>
	<!-- end: Facebook Open Graph -->

    <!-- start: CSS --> 
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

	<style>
/* Jarak antar icon-box */
.icons-box {
    margin-bottom: 30px; /* Tambahkan jarak bawah antar box */
    padding: 15px;        /* Tambahkan padding dalam box */
    border: 1px solid #ddd; /* Optional: memberi border tipis */
    border-radius: 8px;    /* Optional: buat sudut membulat */
    background-color: #f9f9f9; /* Optional: warna latar belakang */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional: bayangan */
}

/* Tambahan opsional agar gambar tidak mepet */
.icons-box img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.produk-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
    padding: 10px 0;
}

.produk-grid .span4 {
    width: 32%;
    box-sizing: border-box;
}


.kategori-grid {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
    padding: 0 10px;
}

.kategori-item {
    flex: 1 1 calc(25% - 20px); /* 4 kolom */
    text-align: center;
	font-size: 16px;
	color: #333333;
    background-color: #f2f2f2;
    padding: 15px;
    border-radius: 8px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.kategori-item:hover {
    transform: translateY(-5px);
    background-color: #fff;
}

.kategori-item img {
    max-width: 200px;
    height: auto;
    margin-bottom: 10px;
}

.nav-center-logo {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.logo-center {
    margin: 0 auto;
}

.nav-left,
.nav-right {
    display: flex;
    gap: 10px;
    list-style: none;
    margin: 0;
    padding: 0;
	background: transparent !important;
}

.nav-left li a,
.nav-right li a {
    font-weight: bold;

}
/* Navbar di atas slider */
header {
    position: absolute;
    width: 100%;
    top: 0;
    z-index: 1000;
    background: transparent;
}

.navbar-inverse {
    border: none;
}

.navbar-inverse .nav > li > a {
    color: #fff !important; /* warna putih untuk teks menu */
}

.navbar-inverse .nav > li > a:hover {
    color: #f39c12 !important; /* warna saat hover */
}

/* Tambahan agar slider muncul di belakang */
.slider-wrapper {
    position: relative;
    z-index: 1;
}

/* Tambahan efek ketika discroll */
.sticky-navbar.scrolled {
    background: rgba(0, 0, 0, 0.85) !important;
    transition: background 0.4s ease;
}

.da-slider {
    height: 700px;
    position: relative;
    overflow: hidden;
}
/* Navbar background transparan */
.navbar-inverse, .navbar, .navbar-inner {
    background-color: transparent !important;
    border: none !important;
    box-shadow: none !important;
}

/* Hilangkan border bawah jika ada */
.navbar-inner {
    border-bottom: none !important;
}

/* Ubah warna link navbar jadi putih agar terlihat di atas slider */
.navbar .nav > li > a,
.navbar .nav > li > a:focus,
.navbar .nav > li > a:hover {
    color: white !important;
}

/* Saat discroll, kasih background semi-transparan */
.sticky-navbar.scrolled {
    background-color: rgba(0, 0, 0, 0.8) !important;
    transition: background-color 0.4s ease;
}

.kategori-wrapper {
    background-color: #f7dfee6b; /* Box luar */
    border-radius: 12px;
    padding: 15px;
    margin-top: 75px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.kategori-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}

.kategori-item {
    flex: 1 1 calc(25% - 20px);
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    text-align: center;
    transition: transform 0.3s ease;
}

.kategori-item:hover {
    transform: translateY(-5px);
    background-color: #ffffff;
}

.kategori-item img {
    max-width: 100px;
    margin-bottom: 10px;
}


.testimoni-slider .single-testimoni {
  background: #ad0b35d9;
  padding: 20px;
  border-radius: 10px;
  margin: 10px;
  border: 1px solid #eee;
  text-align: center;
}
.testimoni-slider .single-testimoni p {
  margin: 5px 0;
}
.testimoni-slider .rating span {
  font-size: 18px;
  color: #FFD700;
}
.rating span {
  font-size: 18px;
  margin: 0 1px;
}
.rating i {
    font-size: 16px;
    margin-right: 2px;
}

.rating span {
    font-size: 18px;
    margin-right: 2px;
}

.video {
  background-color: #000;
}

</style>

</head>
<body>	

<!-- start: Slider -->
<div class="slider-wrapper">

<!--start: Header -->
<header>

<!--start: Container -->
<div class="container">
	
	<!--start: Row -->
	<div class="row">
			
			
		<!--start: Navigation -->
		<div class="span12">
<div class="navbar navbar-inverse sticky-navbar">
<div class="navbar-inner text-center">
	<div class="nav-center-logo">

		<ul class="nav nav-left pull-left">
			<li><a href="index.php">Home</a></li>
			<li><a href="tentang.php">Whats News</a></li>
			<li><a href="produk.php">Product</a></li>
		</ul>

		<a class="brand logo-center" href="index.php">
			<img src="img/logo2.png" alt="Logo" style="height: 130px;">
		</a>

		<ul class="nav nav-right pull-right">
			
			<li><a href="testimoni.php">Testimoni</a></li>
			<li><a href="detail.php">Cart</a></li>
			<?php if (isset($_SESSION['username']) && isset($_SESSION['role'])): ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?= htmlspecialchars($_SESSION['username']); ?> <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<?php if ($_SESSION['role'] === 'admin'): ?>
							<li><a href="admin/tambah.php">Dashboard Admin</a></li>
							<li><a href="user2/logout.php">Logout</a></li>
						<?php else: ?>
							<li><a href="user2/dashboard.php">Profile</a></li>
							<li><a href="user2/logout.php">Logout</a></li>
						<?php endif; ?>
					</ul>
				</li>
			<?php else: ?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="index.html">👨‍💼Admin</a></li>
						<li><a href="user2/login.php">👤User</a></li>
					</ul>
				</li>
			<?php endif; ?>
		</ul>

	</div>
</div>
</div>
</div>

		<!--end: Navigation -->
			
	</div>
	<!--end: Row -->
	
</div>
<!--end: Container-->			
	
</header>
<!--end: Header-->

	<!-- start: Slider -->
	<div class="slider-wrapper">

		<div id="da-slider" class="da-slider">
			<div class="da-slide">
				<h2>T-shirt</h2>
				<p>Reservasi mudah melalui website dan via Whatsapp. Dengan dukungan dari tenaga penjual , kami siap melayani kebutuhan pakaian anda.</p>
				
				<div class="da-img"><img src="img/parallax-slider/blmws.png" alt="image01" /></div>
			</div>
			<div class="da-slide">
				<h2>Hoodie</h2>
				<p>Pilihan T-Shirt yang bagus dan kenyamanan selama pemakaian. Didukung dengan bahan yang lembut dan bagus.</p>
				
				<div class="da-img"><img src="img/parallax-slider/jaket3.png" alt="image02" /></div>
			</div>
			<div class="da-slide">
				<h2>Crewneck</h2>
				<p>Pilihan Crewneck yang bagus dan kenyamanan selama pemakaian. Didukung dengan bahan yang lembut dan bagus</p>
				
				<div class="da-img"><img src="img/parallax-slider/jaket2.png" alt="image03" /></div>
			</div>
			<div class="da-slide">
				<h2>Flanel</h2>
				<P>Pilihan Falanel yang bagus dan kenyamanan selama pemakaian. Didukung dengan bahan yang lembut dan bagus</P>				
				<div class="da-img"><img src="img/parallax-slider/flanel.png" alt="image04" /></div>
			</div>
			<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
			</nav>
		</div>
	</div>
	
	<!-- end: Slider -->
 <!-- SVG Wave Bawah -->
 <div class="section-wave">
    <svg id="homepageShapeDesign" class="shapeBottom" xmlns="http://www.w3.org/2000/svg" version="1.1"
         viewBox="0 0 100 100" preserveAspectRatio="none"  style="display: block;">
		 <defs>
      <linearGradient id="gradWave" x1="0%" y1="0%" x2="100%" y2="0%">
        <stop offset="0%" style="stop-color:#c91f40; stop-opacity:1" />
        <stop offset="100%" style="stop-color:#f08395; stop-opacity:1" />
      </linearGradient>
    </defs>
      <g transform=""> 
		<polygon points="0 100 0 27.055815 3.94000741 33.5558054 5.55549704 39.6123789 7.22198393 36.4064661 8.74671571 41.3281343 10.7857419 28.2598691 12.4893963 33.5558054 13.6096074 30.2424495 15.0314803 36.4064661 17.030746 23.3373365 18.2728319 28.2598691 19.4907158 25.4437828 21.3093301 32.1598633 23.1322662 27.055815 24.8350562 30.2424495 26.0581262 27.055815 28.3668329 38.0046685 29.8509398 32.1477623 31.1103129 35.2032764 34.1952152 22.0070858 36.0406247 27.043714 37.5610347 23.3252355 38.8748626 25.4316818 40.8456043 36.9536062 43.02725 33.5039438 44.5225936 38.8482843 45.813948 35.2032764 47.4804349 23.3252355 50 29.777686 51.3933945 33.5039438 52.7288314 38.8482843 54.6710493 31.4675106 56.1586135 27.055815 57.5199812 29.777686 59.4008295 25.2890623 61.4873955 35.2032764 63.5826052 31.4675106 65.4997566 36.9536062 67.2984907 41.7767374 69.0695652 33.5039438 70.4447626 36.9536062 73.2409686 27.055815 75.0345164 29.777686 77.0553911 25.2890623 78.9656276 33.5039438 82.0574448 18.6161999 83.5942777 22.5499042 85.7231974 16.2945278 88.0068376 25.2890623 89.3180724 19.9879399 90.974187 27.055815 94.2362832 18.4900033 95.8318925 22.0070858 97.4612119 16.4544345 98.8329519 22.0070858 100 12.9779769 100 100"
		style="stroke: none; fill : #ffffff "></polygon>
</g> 
</svg>
</div>
			<!--start: Container -->
    	<div class="container">
      		<!--start: Welcome Section -->
<div class="welcome-banner animated-welcome">
    <p>WELCOME</p>
</div> 
 <div style="max-width: 600px; margin: 30px auto;">
  <iframe 
    src="https://drive.google.com/file/d/1z0bxuBjk0QIxmoOfhrFnC3E9sUeXnYts/preview" 
    width="100%" height="425" 
    style="border-radius: 10px;" 
    allow="autoplay">
  </iframe>
  <p style="margin-top: 10px; font-style: italic; color: #555;"></p>
</div>

<!--end: Container -->

<!-- start: Row -->
            
<section class="produk-section py-5">
  <div class="container text-center">
    <h2 class="judul-produk">Produk Terbaru</h2>
    <p class="subjudul-produk">Temukan koleksi terbaik kami untuk hari-hari Anda</p>

    <div class="row mt-4">
      <?php
      $sql = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY br_id DESC LIMIT 6");
      while($data = mysqli_fetch_array($sql)){
      ?>
        <div class="span4">
          <div class="icons-box">
            <div class="title"><h3><?php echo $data['br_nm']; ?></h3></div>
            <img src="<?php echo $data['br_gbr']; ?>" />
            <div><h3>Rp.<?php echo number_format($data['br_hrg'],2,",",".");?></h3></div>
            <div class="clear">
              <a href="detailproduk.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-danger">Detail</a> 
              <a href="detailproduk.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-success">Beli &raquo;</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

			<!-- end: Row -->

<!-- Start: Tentang Bloomwise -->
    <div class="tentang-section">
  <div class="container">
    <div class="tentang-bloomwise">
      <div class="tentang-container">
        <div class="tentang-img">
          <img src="img/about/about-bloomwise.png" alt="Tentang Bloomwise">
        </div>
        <div class="tentang-text">
          <h3><strong>BLOOMWISE PROJECT</strong></h3>
          <p>
            <em><strong>Bloomwise </em></strong> lahir dari semangat anak muda Jakarta yang ingin mengekspresikan diri melalui fashion. 
			<p><em><strong>Bloomwise</em></strong> adalah brand fashion lokal dari Jakarta Utara yang lahir dari semangat anak muda. Kami percaya bahwa gaya bukan hanya soal pakaian — tapi tentang cara mengekspresikan diri dan tumbuh bersama.</p>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End: Tentang Bloomwise -->

<!-- Start: Testimoni Box -->
<section class="testimoni-section py-5">
  <div class="container">
<div class="testimoni-wrapper" style="padding: 30px; border-radius: 15px; margin: 40px 0;">
    <h3 style="text-align: center; color: #ffffff;">Apa Kata Mereka?</h3>
    <div class="testimoni-slider">
        <?php
        $file = fopen("guestbook.txt", "r");
        while (($line = fgets($file)) !== false) {
            $parts = explode("|", trim($line));
            if (count($parts) >= 5) {
                $nama = $parts[0];
                $komentar = isset($parts[4]) ? $parts[4] : '(Komentar tidak tersedia)';
                $rating = isset($parts[5]) ? intval($parts[5]) : 0;
        ?>
        <div class="kategori-item" style="background-color: #fff; border: 1px solid #ddd; border-radius: 10px; padding: 20px; margin: 10px; height: 210px; display: flex; flex-direction: column; justify-content: space-between;">
            <p style="font-style: italic;">"<?= htmlspecialchars($komentar) ?>"</p>
            <p><strong>- <?= htmlspecialchars($nama) ?></strong></p>
            <div class="rating">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <span style="color: <?= $i <= $rating ? '#FFD700' : '#ccc' ?>;">&#9733;</span>
                <?php endfor; ?>
            </div>
        </div>
        <?php
            }
        }
        fclose($file);
        ?>
    </div>
</div>
</div>
</section>

<!-- End: Testimoni Box -->


<!-- Start: Kategori Box -->
<div class="kategori-wrapper">
    <h3 style="text-align: center;"><strong>KATEGORI</strong></h3>
    <div class="kategori-container">
        <div class="kategori-item">
		<img src="img/kategori/tshirt.png" alt="T-Shirt">
            <p><a href="produk.php?kategori=T-shirt">Best Seller ⚡</a></p>
        </div>
		<div class="kategori-item">
            <img src="img/kategori/flanel.png" alt="Flanel">
            <p><a href="produk.php?kategori=Flanel">On Sale 🔥</a></p>
        </div>
        <div class="kategori-item">
            <img src="img/kategori/hoodie.png" alt="Hoodie">
            <p><a href="produk.php?kategori=Hoodie">New Apparel ⭐</a></p>
        </div>
    </div>
</div>
<!-- End: Kategori Box -->



			
	<!--start: Wrapper-->
	<div id="wrapper">

      		
			
		
			<hr>
			
			<!-- start: Row -->
			<div class="row">
				
				<!-- start: Icon Boxes -->
				<div class="icons-box-vert-container">

					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-ok ico-color circle-color big"></i>
							<div class="icons-box-vert-info">
								<h3>Product Original</h3>
							<p>Bloomwise Project – 100% Original. Wear Your Growth.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box-->

					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-cup  ico-white circle-color-full big-color"></i>
							<div class="icons-box-vert-info">
								<h3>Delivery Send</h3>
								<p>Dapatkan kemudahan pengiriman barang ke rumah anda dengan minimal belanja 300 ribu radius 10km dari kantor kami.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->

					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-ipad ico-color circle-color big"></i>
							<div class="icons-box-vert-info">
								<h3>Berbelanja Dengan Gadget</h3>
								<p>Anda bisa memesan produk kami melalui gadget kesayangan anda, belanja di Bloomwise Store Jakarta praktis dan mudah.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->

					<!-- start: Icon Box Start -->
					<div class="span6">
						<div class="icons-box-vert">
							<i class="ico-thumbs-up  ico-white circle-color-full big-color"></i>
							<div class="icons-box-vert-info">
								<h3>Sosial Media</h3>
								<p>Follow Instagram kami untuk mendapatkan update promo special setiap harinya.</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->

				</div>
				<!-- end: Icon Boxes -->
				<div class="clear"></div>
			</div>
			<!-- end: Row -->
			
			<hr>
			
			<!-- start Clients List -->	
			<div class="clients-carousel">
		
				<ul class="slides clients">
					<li><img src="img/logos/1.png" alt=""/></li>
					<li><img src="img/logos/2.png" alt=""/></li>	
					<li><img src="img/logos/3.png" alt=""/></li>
					<li><img src="img/logos/4.png" alt=""/></li>
					<li><img src="img/logos/5.png" alt=""/></li>
					<li><img src="img/logos/6.png" alt=""/></li>
					<li><img src="img/logos/7.png" alt=""/></li>
					<li><img src="img/logos/8.png" alt=""/></li>
				</ul>
		
			</div>
			<!-- end Clients List -->

			<hr>

		</div>
		<!--end: Container-->
	
	</div>
	<!-- end: Wrapper  -->			

    <!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="span2">
					<div id="footer-menu-logo">
					<a class="brand" href="index.php"><img src="img/logo-footer-menu.png" alt="logo" /></a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Links-->
				<div class="span9">
					
					<div id="footer-menu-links">

						<ul id="footer-nav">

							<li><a href="produk.php?kategori=Flanel">Flanel</a></li>

							<li><a href="produk.php?kategori=T-shirt">T-shirt</a></li>

							<li><a href="produk.php?kategori=Hoodie">Hoodie</a></li>

							<li><a href="Produk.php?kategori=Jacket">Jacket</a></li>
							

						</ul>

					</div>
					
				</div>
				<!-- end: Footer Menu Links-->

				<!-- start: Footer Menu Back To Top -->
				<div class="span1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->

	<!-- start: Footer -->
	<div id="footer">
		
		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: About -->
				<div class="span3">
					
					<h3>BLOOMWISE</h3>
					<p> Bloomwise Project lahir dari semangat anak muda yang ingin mengekspresikan diri melalui fashion. Didirikan pada tahun 2020 di Jakarta Utara, brand ini membawa semangat "Wear Your Growth"—sebuah filosofi berbeda.

Bloomwise hadir sebagai brand lokal yang berani tampil beda, dengan desain yang autentik, berkualitas, dan relatable dengan kehidupan sehari-hari anak muda Indonesia.</p>
						
				</div>
				<!-- end: About -->

				<!-- start: ALAMAT -->
				
				<div class="span3">	
					<h3>ALAMAT</h3>
                    Email : <a href="mailto:bloomwiseco@gmail.com">bloomwiseco@gmail.com</a><br />
					Instagran : <a href="https://www.instagram.com/bloomwise_/">@bloomwise_</a>
					<iframe 
       							 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4512678850456!2d106.93942391476906!3d-6.204133795509177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b66e96093b1%3A0x8c8802b73d61463d!2sJl.%20Rorotan%202%2C%20RT.4%2FRW.4%2C%20Rorotan%2C%20Kec.%20Cilincing%2C%20Kota%20Jkt%20Utara%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2014140!5e0!3m2!1sen!2sid!4v1718890000000!5m2!1sen!2sid" 
       							 width="100%" 
       							 height="190" 
        						 style="border: 1px;;" 
        						 allowfullscreen="" 
       							 loading="lazy" 
    						    referrerpolicy="no-referrer-when-downgrade">
    						</iframe>
				</div>
				<!-- end: ALAMAT -->

				<div class="span6">
				
					<!-- start: Follow Us -->
					<h3>FOLLOW US</h3>
					<ul class="social-grid">
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-twitter">
											<a href="https://twitter.com/BloomwiseStore"></a>
										</div>
										<div class="social-info-back social-twitter-hover">
											<a href="https://twitter.com/BloomwiseStore"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-youtube">
											<a href="http://facebook.com"></a>
										</div>
										<div class="social-info-back social-youtube-hover">
											<a href="http://facebook.com"></a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-dribbble">
											<a href="http://dribbble.com"></a>
										</div>
										<div class="social-info-back social-dribbble-hover">
											<a href="http://dribbble.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-amazon">
											<a href="http://flickr.com"></a>
										</div>
										<div class="social-info-back social-amazon-hover">
											<a href="http://flickr.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
					</ul>
					<!-- end: Follow Us -->
				
					<!-- start: Newsletter -->
				<form id="newsletter">
						<h3>Newsletter</h3>
						<p>Please leave us your email</p>
						<label for="newsletter_input">@:</label>
						<input type="text" id="newsletter_input"/>
						<input type="submit" id="newsletter_submit" value="submit">
					</form> 
					<!-- end: Newsletter -->
				
				</div>
				
			</div>
			<!-- end: Row -->	
			
		</div>
		<!-- end: Container  -->

	</div>
	<!-- end: Footer -->

	<!-- start: Copyright -->
	<div id="copyright">
	
		<!-- start: Container -->
		<div class="container">
		
			<p><strong>
				COPYRIGHT &copy; 2020
			</p></strong>
	<p> <a href="https://www.instagram.com/bloomwise_/">BLOOMWISE PROJECT</a>.Proudly made in Jakarta Utara 🇮🇩</p>
<p>Hak cipta dilindungi undang-undang .</p>
		</div>
		<!-- end: Container  -->
		
	</div>	
	<!-- end: Copyright -->

	<!-- start: Wa flOAT -->
	<a href="https://wa.me/6285930411943" class="wa-float" target="_blank">
  <img src="img/wa-icon.png" alt="Chat WhatsApp">
</a>
<!-- end: wA FLoat -->

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script defer="defer" src="js/custom.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const welcome = document.querySelector(".animated-welcome");
    setTimeout(() => {
      welcome.classList.add("animate");
    }, 300); // delay sedikit untuk efek lebih dramatis
  });
</script>

<script>
		document.addEventListener("DOMContentLoaded", function () {
			const navbar = document.querySelector(".sticky-navbar");
			window.addEventListener("scroll", function () {
				if (window.scrollY > 30) {
					navbar.classList.add("scrolled");
				} else {
					navbar.classList.remove("scrolled");
				}
			});
		});
	</script>
<!-- end: Java Script -->

<!-- Slick Carousel JS -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
  $(document).ready(function(){
    $('.testimoni-slider').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      arrows: true,
      dots: true,
      responsive: [
        {
          breakpoint: 992,
          settings: { slidesToShow: 2 }
        },
        {
          breakpoint: 768,
          settings: { slidesToShow: 1 }
        }
      ]
    });
  });
</script>


</body>
</html>