<?php require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
	
	$query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id DESC");
$jumlah_produk = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
    .judul {
    opacity: 0;
    transition: opacity 1.5s ease-in-out;
    transition-delay: 0.5s; /* Efek delay muncul */
}

.judul.muncul {
    opacity: 1;
}

  .main-container {
    text-align: center;
    padding: 35px 20px 40px;
  }
  .main-container h1 {
    font-size: 42px;
    font-weight: 600;
    margin-bottom: 15px;
  }
  .main-container p {
    font-size: 16px;
    color: #666;
    max-width: 600px;
    margin: auto;
  }
  .item-count {
    margin-top: 20px;
    color: #888;
  }
  .filter-btn {
    margin: 30px auto;
    display: inline-flex;
    align-items: center;
    padding: 10px 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: white;
    cursor: pointer;
    font-size: 14px;
  }
  .produk-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    padding: 20px;
    max-width: 1200px;
    margin: auto;
  }
  .produk-item {
    background-color: #f6f6f6;
    padding: 15px;
    text-align: center;
    border-radius: 10px;
    position: relative;
  }
  .produk-item img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 6px;
  }
  .label-new {
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 13px;
    color: #999;
  }
  .produk-item h4 {
    margin: 10px 0 5px;
    font-size: 16px;
    font-weight: 500;
  }
  .produk-item p {
    font-size: 14px;
    color: #555;
  }

.video {
  background-color: #000;
}

</style>

</head>
<body>
    
	<!--start: Header -->
	<header>
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="navbar navbar-inverse sticky-navbar">
    <div class="navbar-inner text-center">
        <div class="nav-center-logo">
            <ul class="nav nav-left pull-left">
                <li><a href="index.php">Home</a></li>
                <li><a href="tentang.php">What News</a></li>
                <li><a href="produk.php">Product</a></li>
            </ul>

            <a class="brand logo-center" href="index.php">
                <img src="img/logo2.png" alt="Logo" style="height: 60px;">
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
                            <?php else: ?>
                                <li><a href="user2/dashboard.php">Profile</a></li>
                            <?php endif; ?>
                            <li><a href="user2/logout.php">Logout</a></li>
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
    </div>
  </div>
</header>
	<!--end: Header-->

	

<div class="main-container">
  <h1>What's New For Bloomwise</h1>
  <p>Like an ode to the House's excellence, Bloomwise’s signature styles combine timeless energy with new drops and limited-edition releases. These new pieces highlight the spirit of modern youth.</p>
 <div style="max-width: 600px; margin: 30px auto;">
  <video controls autoplay muted loop style="width: 100%; max-height: 340px; border-radius: 10px;">
    <source src="video/launching.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  <p style="margin-top: 10px; font-style: italic; color: #555;">Watch the launch of Bloomwise’s newest collection.</p>
</div>

</div>

<div class="produk-grid">
  <?php while($data = mysqli_fetch_assoc($query)) { ?>
    <div class="produk-item">
      <div class="label-new">New</div>
      <img src="gambar/<?= $data['gambar']; ?>" alt="<?= $data['nama_produk']; ?>">
      <h4><?= $data['nama_produk']; ?></h4>
      <p>Rp <?= number_format($data['harga'], 0, ',', '.'); ?></p>
    </div>
  <?php } ?>
</div>

<div class="kategori-grid">
  <div class="kategori-item">
    <img src="img/kategori/tshirt.png" alt="T-shirt">
    <span>T-shirt</span>
    <a href="produk.php?kategori=tshirt" class="lihat-semua-btn">Lihat Semua</a>
  </div>
  <div class="kategori-item">
    <img src="img/kategori/hoodie.png" alt="Hoodie">
    <span>Hoodie</span>
    <a href="produk.php?kategori=hoodie" class="lihat-semua-btn">Lihat Semua</a>
  </div>
  <div class="kategori-item">
    <img src="img/kategori/flanel.png" alt="Flanel">
    <span>Flanel</span>
    <a href="produk.php?kategori=flanel" class="lihat-semua-btn">Lihat Semua</a>
  </div>
  <div class="kategori-item">
    <img src="img/kategori/crewneck.png" alt="Crewneck">
    <span>Jaket</span>
    <a href="produk.php?kategori=jaket" class="lihat-semua-btn">Lihat Semua</a>
  </div>
</div>
	

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

						<li><a href="#">Flanel</a></li>

						<li><a href="#">T-shirt</a></li>

						<li><a href="#">Hoodie</a></li>

						<li><a href="#">Jacket</a></li>

						<li><a href="#">Pants & Jeans</a></li>

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
					<p> sebuah merek fashion yang berfokus pada desain kontemporer dengan pendekatan estetika yang kuat. Merek ini dikenal karena koleksi pakaian yang menonjolkan elemen desain yang unik dan berani. Bloomwise Project sering kali menggabungkan elemen-elemen grafis yang mencolok dan desain yang edgy dalam setiap koleksinya.</p>
						
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
       							 height="150" 
        						 style="border:0;" 
        						 allowfullscreen="" 
       							 loading="lazy" 
    						    referrerpolicy="no-referrer-when-downgrade">
    						</iframe>
				</div>
				<!-- end: ALAMAT -->

				<div class="span6">
				
					<!-- start: Follow Us -->
					<h3>Follow Us!</h3>
					<ul class="social-grid">
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
									<div class="social-info-front social-twitter">
											<a href="https://www.twitter.com/bloomwise_/"></a>
										</div>
										<div class="social-info-back social-twitter-hover">
											<a href="https://www.twitter.com/bloomwise_/"></a>
										</div>		
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-facebook">
											<a href="http://facebook.com"></a>
										</div>
										<div class="social-info-back social-facebook-hover">
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
										<div class="social-info-front social-flickr">
											<a href="http://flickr.com"></a>
										</div>
										<div class="social-info-back social-flickr-hover">
											<a href="http://flickr.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
					</ul>
					<!-- end: Follow Us -->
				
					<!-- start: Newsletter -->
				<!--	<form id="newsletter">
						<h3>Newsletter</h3>
						<p>Please leave us your email</p>
						<label for="newsletter_input">@:</label>
						<input type="text" id="newsletter_input"/>
						<input type="submit" id="newsletter_submit" value="submit">
					</form> -->
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
		
			<p>
				Copyright &copy; <a href="https://www.instagram.com/bloomwise_/">BLOOMWISE PROJECT</a> Sience 2020
			</p>
	
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
<script def src="js/custom.js"></script>
<script>
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();

        $('.judul').each(function () {
            var elementTop = $(this).offset().top;

            if (scroll + windowHeight > elementTop + 50) {
                $(this).addClass('muncul');
            }
        });
    });

    // trigger langsung jika sudah kelihatan
    $(document).ready(function () {
        $(window).trigger('scroll');
    });
</script>

<!-- end: Java Script -->

</body>
</html>    