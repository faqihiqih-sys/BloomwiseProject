<?php
require_once("koneksi.php");
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>BLOOMWISE | New Brand Local Original from JAKARTA UTARA</title> 
	<meta name="description" content="Distro, cikarang, terlengkap, information, technology, jababeka, baru, murah"/>
	<meta name="keywords" content="Kaos, Murah, Cikarang, Baru, terlengkap, harga, terjangkau" />
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
    .product-info-table td {
        padding-top: 2px !important;
        padding-bottom: 2px !important;
        margin: 0 !important;
    }
    .product-info-table h3 {
        margin: 0 !important;
        font-size: 25px; /* opsional: kecilkan sedikit */
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
	<!--end: Header-->
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-t-shirt ico-white"></i>Produk Detail Produk</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">              
<div class="title"><h3>Keranjang Anda</h3></div>
            <div class="hero-unit">
            <div class="tittle"><h3><strong><span class="glyphicon glyphicon-shopping-cart"></span> Your Cart</strong></h3></div>
                    <table class="table table-hover table-condensed">
                    <tr>
                    <th><center>No</center></th>
					<th><center>Item</center></th>
					<th><center>Quantity</center></th>
					<th><center>Sub Total</center></th>
				</tr>
                    <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
                
    $total = 0;
    //mysql_select_db($database_conn, $conn);
    if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
            $query = mysqli_query($koneksi, "SELECT br_id, br_nm, br_hrg FROM barang WHERE br_id = '$key'");
            $data = mysqli_fetch_array($query);

            $jumlah_harga = $data['br_hrg'] * $val;
            $total += $jumlah_harga;
            $no = 1;
            ?>
                <tr>
                <td><center><?php echo $no ++; ?></center></td>
                <td><center><?php echo $data['br_nm']; ?></center></td>
                <td><center><?php echo number_format($val); ?> Pcs</center></td>
                <td><center>Rp. <?php echo number_format($jumlah_harga); ?></center></td>
                </tr>
                
					<?php
                    //mysql_free_result($query);			
						}
							//$total += $sub;
						}?>
                        <?php
				if($total == 0){ ?>
					<td colspan="4" align="center"><?php echo "Keranjang Kosong!"; ?></td>
				<?php } else { ?>
					
                        <td colspan="4" style="font-size: 18px;"><b><div class="pull-right">Total Belanja Anda : Rp. <?php echo number_format($total); ?>,- </div> </b></td>
					
			<?php	}
				?>
                </table> 
                <p><div align="right">
						<a href="detail.php" class="btn btn-success">&raquo Details Keranjang &laquo</a>
						</div></p>
            </div>
      		<!-- start: Row -->
            
      		<div class="row">
            <div class="col-sm-6">
                    <?php                  
$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE br_id='$_GET[kd]'");
$data  = mysqli_fetch_array($query);
?>
        		<!--<div class="span4">-->
          			<!--<div class="icons-box">-->
                    <div class="hero-unit" style="margin-left: 20px;">
                    <table class="product-info-table">

                    <tr>
                        <td rowspan="7"><img src="<?php echo $data['br_gbr']; ?>" /></td>
                        </tr>
                        <tr>
                        <td colspan="4"><div class="title"><h3><?php echo $data['br_nm']; ?></h3></div></td>
                        </tr>
                        <tr>
    <td style="padding: 4px;"></td>
    <td style="padding: 4px;"><h3>Harga</h3></td>
    <td style="padding: 4px;"><h3>:</h3></td>
    <td style="padding: 4px;"><h3>Rp.<?php echo number_format($data['br_hrg'],2,",",".");?></h3></td>
</tr>
                        <tr>
                        <td style="padding: 4px;"></td>
                        <td style="padding: 4px;" ><h3>Stock</h3></td>
                        <td style="padding: 4px;"><h3>:</h3></td>
                        <td style="padding: 4px;"><div><h3><?php if ($data['br_stok'] >= 1){
	                           echo '<strong style="color: green;">Ready Stock</strong>';	
                                } else {
	                           echo '<strong style="color: red;">Out Of Stock</strong>';	
                                }; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td style="padding: 4px;"></td>
                        <td style="padding: 4px;"><h3>Satuan</h3></td>
                        <td style="padding: 4px;"><h3>:</h3></td>
                        <td style="padding: 4px;"><div><h3><?php echo $data['br_satuan']; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td style="padding: 4px;"></td>
                        <td style="padding: 4px;"><h3>Bahan</h3></td>
                        <td style="padding: 4px;"><h3>:</h3></td>
                        <td style="padding: 4px;"><div><h3><?php echo $data['ket']; ?></h3></div></td>
                        </tr>
					<!--	<p>
						
						</p> -->
                        <tr>
                        <td style="padding: 4px;"></td>
                        <td style="padding: 4px;"></td>
                        <td style="padding: 4px;"></td>
						<td style="padding: 4px;"><div class="clear"> <a href="cart.php?act=add&amp;barang_id=<?php echo $data['br_id']; ?>&amp;ref=detailproduk.php?kd=<?php echo $data['br_id'];?>" class="btn btn-lg btn-danger">Beli &raquo;</a></div></td>
                        </tr>
     
                    </table>
                    </div>
                    <!--</div> -->
        		<!--</div> -->
<!---->
      		</div>
			<!-- end: Row -->
					
					
				</div>	
				
					
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