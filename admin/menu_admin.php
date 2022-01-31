       <div id="left">
            <ul id="menu" class="collapse">
                <li class="panel active"><a href="index.php"><i class="icon-home"></i> Home</a></li>
               
				
                <li><a href="?menu=datapel"><i class="icon-book"></i> Manajemen Data Pelanggan</a></li>
                <li><a href="?menu=cetak"><i class="icon-book"></i> Data Daya Listrik Node 1.1</a></li>
                <li><a href="?menu=node2"><i class="icon-book"></i> Data Daya Listrik Node 1.2</a></li>
                <li><a href="?menu=pengujian"><i class="icon-book"></i> Pengujian</a></li>
                <!--<li><a href="?menu=cetak"><i class="icon-print"></i> Hasil Penentuan Daya Listrik</a></li>-->
				
			
                 <li><a href="logout.php"><i class="icon-signout"></i> Logout </a>
                            </li>
             
            </ul>
        </div>
		
		
		<div id="content">
            <div class="inner">
                <div class="row">
                    
                </div>
                <br/>
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">
						<?php
						if($_GET["menu"]){
							include_once("load.php");
						}else{
							echo "<div class='col-lg-12'>
										<div class='panel panel-default'>
											<div class='panel-heading'>
												Tentang Aplikasi
											</div>
											<div class='panel-body'>
												<ul class='nav nav-tabs'>
													<li class='active'><a href='#home' data-toggle='tab'>Home</a>
													</li>
													
												</ul>

												<div class='tab-content'>
													<div class='tab-pane fade in active' id='home'>
													<h4>Selamat Datang di Aplikasi Data Mining C4.5 Penentuan Daya Listrik Rumah Tangga </h4>
													<p> Aplikasi Data Mining C4.5 Penentuan Daya Listrik Rumah Tangga.
</p>
													</div>
													
												</div>
											</div>
										</div>
									</div>";
						}
						?>
					</div>
                </div>
                  <!--END BLOCK SECTION -->
               
            </div>
        </div>