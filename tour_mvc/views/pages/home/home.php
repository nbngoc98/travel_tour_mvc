<?php include "header.php" ?>

<!--========================= FLEX SLIDER =====================-->
<section class="flexslider-container" id="flexslider-container-4">

    <div class="flexslider slider tour-slider" id="slider-4">
        <ul class="slides">
            <?php 
                if ($result2->num_rows > 0) {
                    while ($row = $result2->fetch_assoc()) {
                        $id = $row['MaSale'];
                        $image = 'public/uploads/sales/shows/'.$row['image'];
                        echo"
                           <li class='item-1 back-size' style='background:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url('$image') 50% 15%;background-size:cover;height:100%;'>
                                <div class='meta'>         
                                    <div class='container'>
                                        <span class='highlight-price highlight-2'>GIÁ CHỈ TỪ :" . $row['gianguoilon']."vnđ/Khách </span>
                                        <h1>" . $row['title']."</h1>
                                        <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum at, pro an eros perpetua ullamcorper.</p>
                                    </div><!-- end container -->  
                                </div><!-- end meta -->
                            </li><!-- end item-1 --> 
                        ";                                    
                    }
                }
            ?>              
        </ul>
    </div><!-- end slider -->
    
    <?php include 'seach.php' ?>
    
</section><!-- end flexslider-container -->


<!--=============== TOUR OFFERS ===============-->
<section id="tour-offers" class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
            	<div class="page-heading">
                	<h2>Tour du lịch</h2>
                    <hr class="heading-line" />
                </div><!-- end page-heading -->
                
                 <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-tour-offers">
                    <?php 
                        if ($result1->num_rows > 0) {
                            while ($row = $result1->fetch_assoc()) {
                                $id = $row['MaTour'];
                                $image = 'public/uploads/tour/'.$row['AnhTour'];
                                echo"
                                    <div class='item'>
                                        <div class='main-block tour-block'>
                                            <div class='main-img'>
                                                <a href='tour-detail-right-sidebar.html'>
                                                    <img src='$image' class='img-responsive' alt='tour-img' />
                                                </a>
                                            </div><!-- end offer-img -->
                                            
                                            <div class='offer-price-2'>
                                                <ul class='list-unstyled'>
                                                    <li class='price'>Giá Tour: " . $row['GiaNguoiLon']." VNĐ<a href='tour-detail-right-sidebar.html' ><span class='arrow'><i class='fa fa-angle-right'></i></span></a></li> 
                                                </ul>
                                            </div><!-- end offer-price-2 -->
                                                
                                            <div class='main-info tour-info'>
                                                <div class='main-title tour-title'>
                                                    <a href='tour-detail-right-sidebar.html'>" . $row['TenTour']. " </a>
                                                    <p>Số ngày: " . $row['tgian']."</p>
                                                    <p>Ngày khởi hành: " . $row['ngaykhoihanh']."</p>
                                                    <div class='rating'>
                                                        <span><i class='fa fa-star orange'></i></span>
                                                        <span><i class='fa fa-star orange'></i></span>
                                                        <span><i class='fa fa-star orange'></i></span>
                                                        <span><i class='fa fa-star orange'></i></span>
                                                        <span><i class='fa fa-star grey'></i></span>
                                                    </div>
                                                </div><!-- end tour-title -->
                                            </div><!-- end tour-info -->
                                        </div>
                                    </div>  
                                ";                                    
                            }
                        }
                    ?>                  
                </div><!-- end owl-tour-offers -->
                <div class="view-all text-center">
                	<a href="tour-grid-right-sidebar.html" class="btn btn-black">View All</a>
                </div><!-- end view-all -->
            </div><!-- end columns -->
        </div><!-- end row -->
	</div><!-- end container -->
</section><!-- end tour-offers -->
<?php include "footer.php" ?>

