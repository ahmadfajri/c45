<?php
ob_start();
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Data Mining C4.5</title>
	<link href="view/css/bootstrap.min.css" rel="stylesheet">
	<link href="view/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="themea/twitter.css">
	<link href="view/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="javascript/autocomplete/jquery.autocomplete.css" />
	<link rel="shortcut icon" href="favicon.png">
	<script type="text/javascript" src="javascript/autocomplete/jquery.js"></script>
	<script type="text/javascript" src="javascript/autocomplete/jquery.autocomplete.js"></script>
	<script type="text/javascript" src="plugin/Charts/jquery.fusioncharts.js"></script>
	<script language="javascript" src="modul/anggota/tampil.js"></script>
	<script language="javascript" src="modul/peminjaman/ajax.js"></script>
	<script language="javascript" src="modul/pencarian/caribuku.js"></script>
	<script language="javascript" src="modul/pencarian/caripeminjaman.js"></script>
	<script language="javascript" src="modul/pencarian/carianggota.js"></script>
	<script type="text/javascript" src="view/js/ga.js"></script>
	<script type="text/javascript" src="view/js/jquery.min.js"></script>
	<script type="text/javascript" src="view/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="view/js/jquery.min.js"></script>
	<script type="text/javascript" src="view/js/jscript_jquery-1.6.4.js"></script>
	<script type="text/javascript" src="view/js/jquery.validate.js"></script>
	<script type="text/javascript" src="dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#registerHere input').hover(function() {
				$(this).popover('show')
			});
			$("#registerHere").validate({
				rules: {
					nama_lengkap: "required",
					email: {
						required: true,
						email: true
					},
					no_telp: {
						required: true,
						minlength: 11
					},
					gender: "required"
				},
				messages: {
					nama_lengkap: "Enter your Full Name",
					email: {
						required: "Enter your email address",
						email: "Enter valid email address"
					},
					no_telp: {
						required: "Enter your Phone Number",
						minlength: "Phone Number must be minimum 11 characters"
					},
					gender: "Select Gender"
				},
				errorClass: "help-inline",
				errorElement: "span",
				highlight: function(element, errorClass, validClass) {
					$(element).parents('.control-group').addClass('error');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).parents('.control-group').removeClass('error');
					$(element).parents('.control-group').addClass('success');
				}
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() //When the dom is ready 
			{
				$("#email").change(function() {
					//if theres a change in the email textbox
					//alert(hello);
					var email = $("#email").val(); //Get the value in the email textbox
					var regdata = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
					if (!(regdata).test($("#email").val())) {
						//alert("hello");
						$("#email").css('border', '1px solid red');
						$("#email").focus();
						$("#error1").html("enter the valid emailid!");
						return false;
					} else {
						$("#email").css('border', '1px solid #7F9DB9');
						$("#error1").html('<img src="view/img/loader.gif" align="absmiddle">&nbsp;Checking availability...');

						$.ajax({ //Make the Ajax Request
							type: "POST",
							url: "check.php", //file name
							data: "email=" + email, //data
							success: function(server_response) {
								$("#error1").ajaxComplete(function(event, request) {
									//alert(server_response);
									if (server_response == '0') {
										$("#error1").html('<img src="view/img/available.png" align="absmiddle"> <font color="Green"> Available, Alamat Email masih perawan. </font>  ');
									} else if (server_response == '1') {
										$("#error1").html('<img src="view/img/not_available.png" align="absmiddle"><font color="red"> Alamat Email ini sudah terdaftar di sistem. </font>');
									}
								});
							}

						});
					}
				});

			});
	</script>
</head>

<body>
	<div style="padding-top:2%" class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<img style="margin-bottom:2px;" src="images/header.png" />
				<div class="navbar">
					<div class="navbar-inner">
						<div class="container-fluid">
							<a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
							<div class="nav-collapse collapse navbar-responsive-collapse">
								<ul id="menu" class="nav">
									<li class="panel"><a href="index.php"><i class="icon-home"></i> Home</a></li>


									<li><a href="?module=datapel"><i class="icon-book"></i> Data Produk</a></li>
									<li><a href="?module=cetak"><i class="icon-book"></i>Node 1</a></li>
									<li><a href="?module=node2"><i class="icon-book"></i>Node 1.1</a></li>
									<li><a href="?module=node3"><i class="icon-book"></i>Node 1.2</a></li>
									<li><a href="?module=pengujian"><i class="icon-book"></i> Pengujian</a></li>
									<!--<li><a href="?menu=cetak"><i class="icon-print"></i> Hasil Penentuan Daya Listrik</a></li>-->


									<li><a href="logout.php"><i class="icon-signout"></i> Logout </a>
									</li>

								</ul>
							</div>

						</div>
					</div>

				</div>
				<div class="row-fluid">
					<div class="span12">
						<?php
						if (@$_GET['module'] == "") {
							echo " <div style='text-align:center; font-size:20px;'>
                	<div style='font-size:30px; font-family:impaction;'>Selamat datang administrator</div>
					
					<hr>
          <p>silahkan pilih menu untuk mengelola halaman website.</p> </div>";
						} else {
						?>
						<?php include "content.php";
						} ?>
					</div>


				</div>
				<br><br><br><br><br><br><br><br><br>
				<center style='background:#197b30; padding:10px; color:#fff; font-size:12px; margin-bottom:3px; border-top:5px solid #000'>
					<b>Copyright (c) 2017 - Data Mining C4.5 </b>
				</center>
			</div>
		</div>
	</div>



</body>

</html>