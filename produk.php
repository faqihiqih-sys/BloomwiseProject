<?php require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }

	// Ambil data lengkap user dari database jika sudah login
	$userData = null;
	if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
    $getUser = mysqli_query($koneksi, "SELECT * FROM user2 WHERE username='$uname'");
    $userData = mysqli_fetch_assoc($getUser);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/blmws/">
    <meta charset="utf-8">
    <title>BLOOMWISE | New Brand Local Original from JAKARTA UTARA</title>
    <meta name="description" content="Distro, Jakarta, terlengkap, murah"/>
    <meta name="keywords" content="Kaos, Murah, Jakarta, Baru"/>
    <meta name="author" content="Hakko Bio Richard"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700|Droid+Serif|Boogaloo|Economica:700,400italic" rel="stylesheet">
    <style>
        .profile-img-nav {
            width: 23px;
            height: 23px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 5px;
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="navbar navbar-inverse sticky-navbar">
          <div class="navbar-inner text-center">
            <div class="nav-center-logo">

              <ul class="nav nav-left pull-left">
                <li><a href="index.php">Home</a></li>
                <li><a href="tentang.php">About</a></li>
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
    </div>
  </div>
</header>
<!-- End Header -->
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-t-shirt ico-white"></i>Produk Kami</h2>
<form method="GET" class="form-inline mb-3 text-center">
    <label for="kategori" class="mr-2">Filter Kategori:</label>
    <select name="kategori" onchange="this.form.submit()" class="form-control d-inline-block" style="width: 200px;">
        <option value="">Semua Produk</option>
        <option value="T-shirt" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'T-shirt') ? 'selected' : '' ?>>T-shirt</option>
        <option value="Hoodie" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Hoodie') ? 'selected' : '' ?>>Hoodie</option>
        <option value="Flanel" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Flanel') ? 'selected' : '' ?>>Flanel</option>
        <option value="Crewneck" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Crewneck') ? 'selected' : '' ?>>Crewneck</option>
    </select>
</form>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container"> 
        <!--<div class="title"><h3>Keranjang Anda</h3></div>
            <div class="hero-unit">
            </div> -->            
      		<!-- start: Row -->
            
      		<div class="row">
	<?php
	if (isset($_GET['kategori']) && $_GET['kategori'] != '') {
    $kategori = mysqli_real_escape_string($koneksi, $_GET['kategori']);
    $sql = mysqli_query($koneksi, "SELECT * FROM barang WHERE kategori = '$kategori' ORDER BY br_id DESC");
} else {
    $sql = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY br_id DESC");
}


	if(mysqli_num_rows($sql) == 0){
		echo "Tidak ada produk!";
	}else{
		while($data = mysqli_fetch_assoc($sql)){
                    ?>
        		<div class="span4">
          			<div class="icons-box">
                        <div class="title"><h3><?php echo $data['br_nm']; ?></h3></div>
                        <img src="<?php echo $data['br_gbr']; ?>" />
						<div><h3>Rp.<?php echo number_format($data['br_hrg'],2,",",".");?></h3></div>
					<!--	<p>
						
						</p> -->
						<div class="clear"><a href="detailproduk.php?hal=detailbarang&kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-danger">Detail</a> <a href="detailproduk.php?hal=detailbarang&kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-success">Beli &raquo;</a></div>

                    </div>
        		</div>
                <?php   
              }
              }
              
              ?>
<!---->
      		</div>
			<!-- end: Row -->
					
					
				</div>	
				
					
				</div>
				
			</div>
			<!--end: Row-->
	
		</div>
		<!--end: Container-->
				
		<!--start: Container -->
    	<div class="container">	
      		
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
					<li><img src="img/logos/9.png" alt=""/></li>
					<li><img src="img/logos/10.png" alt=""/></li>		
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
						<a href="#"><img src="img/logo-footer-menu.png" alt="logo" /></a>
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
				Copyright &copy; <a href="https://www.instagram.com/bloomwise_/">BLOOMWISE PROJECT</a> SInce 2020
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
<script def src="js/custom.js"></script>

<!-- end: Java Script -->

</body>
</html>	