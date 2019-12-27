<?php 
    session_start();
    $currentPage ='home';
 ?>
<?php include 'includes/header.php' ?>
<style type="text/css">
    a:hover{text-decoration: none;}
    .parallax-search .trip-search{height: 71px;}
 .select2-container--default .select2-selection--single {
      background-color: #fff;
      border: 1px solid #ddd !important;
      border-radius: 5px !important; 
      margin-bottom: 40px;
  }

  .select2-container .select2-selection--single{
    height: 50px !important;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered{
    line-height: 47px !important;
    text-align: left !important;
    font-weight: bold;
    color: #757575;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered:hover{
        color: #0098ef;
        font-weight: bold;
  }
  .select2-container--default .select2-selection--single .select2-selection__arrow b{
      border-color: #000 transparent transparent transparent !important;
      margin-top: 9px !important;
  }
  .select2-container .select2-selection--multiple{
      border: 1px solid #ddd !important;
      border-radius: 2px !important;
      height: 47px !important;
  }
  .green_color{color: green;}
  .red_color{color: red;}
  @media (min-width:975px) and (max-width: 1198px){
    .parallax-search .trip-search{height: 163px !important;}
  }
  @media (min-width:768px) and (max-width: 975px){
    .parallax-search .trip-search{height: 210px !important;}
    .select2-container--default .select2-selection--single{width: 200px !important;}
  }
  @media (max-width:768px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 208px !important; margin-left: -1px !important;}
  }
  @media (max-width:620px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 330px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
  }
  @media (max-width:558px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 330px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
  }
  @media (max-width:547px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 330px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
  }
  @media (max-width:529px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 330px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
  }
  @media (max-width:523px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 320px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
  }
  @media (max-width:508px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 315px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
  }
  @media (max-width:491px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 290px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
    .select2 .select2-container .select2-container--default .select2-container--focus{width: 235px !important;}
  }
  @media (max-width:452px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 275px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
    .select2 .select2-container .select2-container--default .select2-container--focus{width: 235px !important;}
  }
  @media (max-width:440px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 260px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
    .select2 .select2-container .select2-container--default .select2-container--focus{width: 235px !important;}
  }
  @media (max-width:428px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 258px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
    .select2 .select2-container .select2-container--default .select2-container--focus{width: 250px !important;}
  }
  @media (max-width:416px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 257px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
    .select2 .select2-container .select2-container--default .select2-container--focus{width: 250px !important;}
  }
  @media (max-width:380px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 230px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
    .select2 .select2-container .select2-container--default .select2-container--focus{width: 230px !important;}
  }
  @media (max-width:360px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 217px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
    .select2 .select2-container .select2-container--default .select2-container--focus{width: 230px !important;}
  }
  @media (max-width:320px){
    .parallax-search .trip-search{height: 270px !important;}
    .select2-container--default .select2-selection--single{width: 190px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
    .select2 .select2-container .select2-container--default .select2-container--focus{width: 250px !important;}
  }
</style>


	<!-- STAR HEADER SEARCH -->
	<section id="hero-area" class="parallax-search overlay" data-stellar-background-ratio="0.5">
		<div class="hero-main">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="hero-inner">
							<!-- Welcome Text -->
							<div class="welcome-text">
								<h1>SEARCH OVER MILLIONS OF PROPERTIES</h1>
								
							</div>
							<!--/ End Welcome Text -->
							<!-- Search Form -->
							<div class="trip-search">

								<form class="form" method="get" action="property.php" >
									<!-- Form Location -->
                  
                <div class="form-group">
                    <input type="text" name="p_id" class="form-control" placeholder="Property ID" id="p_id">
                  </div>
									<div class="form-group">
										<select class="nice-select form-control wide search" name="area" id="AREA_NO">
										<option value="-1"><span class="current"><i class="fa fa-map-marker"></i>Location</span></option>
										<?php
                                            $sql = "SELECT * FROM `gen_areas` where IS_DELETED=0 ";
                                            $result1 = mysqli_query($con,$sql);
                                            while($row = mysqli_fetch_array($result1)):
                                        ?>
                                            <option value="<?=$row['AREA_NO']?>" > <?=$row['AREA_NAME']?> </option>
                                        <?php endwhile;?>
									</select>
									</div>
									<!--/ End Form Location -->
									<div class="form-group">
										<select class="nice-select form-control wide" name="category" id="category">
										<option value="-1"><span class="current"><i class="fa fa-map-marker"></i>Property Type</span></option>
										<?php
                                            $sql = "SELECT * FROM `gen_categorys` where IS_DELETED=0 ";
                                            $result1 = mysqli_query($con,$sql);
                                            while($row = mysqli_fetch_array($result1)):
                                        ?>
                                            <option value="<?=$row['CATEGORY_NO']?>" > <?=$row['CATEGORY_NAME']?> </option>
                                        <?php endwhile;?>
										
									</select>
									</div>
									<div class="form-group">
										<select class="nice-select form-control wide" name="type" id="type">
										<option value="-1"><span class="current"><i class="fa fa-map-marker"></i>Property Status</span></option>
										<option value="1">For Rent</option>
										<option value="2">For Sale</option>
									</select>
									</div>
									<!-- Form Button -->
									<div class="form-group button">
										<button type="submit" id="searchBtn" class="btn">Search</button>
									</div>
									<!--/ End Form Button -->
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
							
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END HEADER SEARCH -->

    <section class="recently services-home bg-white">
        <div class="container">
            <div class="section-title">
                <h3>Top</h3>
                <h2>Properties</h2>
            </div>
            <div class="row portfolio-items">
                <?php
                    $ad_sql ="SELECT * FROM `properties` LEFT JOIN user_reg ON user_reg.user_no=properties.USER_NO LEFT JOIN gen_cities ON gen_cities.CITY_NO = properties.CITY_NO LEFT JOIN gen_areas ON gen_areas.AREA_NO = properties.AREA_NO LEFT JOIN gen_categorys ON gen_categorys.CATEGORY_NO = properties.CATEGORY_NO WHERE properties.IS_DELETED =0 AND properties.IS_APPROVED = 1 ORDER BY properties.PROPERTY_NO DESC LIMIT 0,15 ";
                    $ad_query = mysqli_query($con,$ad_sql);
                    while($ad_row = mysqli_fetch_array($ad_query)):

                ?>
                    
                <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                    <div class="project-single">
                        <div class="project-inner project-head">
                            <div class="project-bottom">
                                <h4><a href="<?='property-details.php'.'?property='.$ad_row['PROPERTY_NO']?>">View Details</a><span class="category">TOLETHUNT</span></h4>
                            </div>
                           
                            <div class="homes">
                                <!-- homes img -->
                                <a href="<?='property-details.php'.'?property='.$ad_row['PROPERTY_NO']?>" class="homes-img">
                                    
                                    <div class="homes-tag button alt sale"><?=($ad_row['TYPE_NO']==1)?"Rent":"Sale"?></div>
                                    <div class="homes-price"><?=$ad_row['CATEGORY_NAME']?></div>
                                    <div class="homes-price homes-gender" >

                                        <?php
                                            if($ad_row['TYPE_NO']==1):
                                        ?>
                                            For <?=$ad_row['PREFERED_TENANT']?> 

                                        <?php else:?>
                                            <?=$ad_row['AREA_NAME']?>
                                        <?php endif;?>
                                    </div>
                                    
                                    <img <?php if($ad_row['IMAGE_URL1'] ==""):?> src=" admin/soft/upload/default.jpg" <?php else: ?> src=" admin/soft/upload/<?=$ad_row['IMAGE_URL1']?>" <?php endif;?>  style="height: 262.5px;">
                                </a>
                            </div>
                        </div>
                        <!-- homes content -->
                        <a href="<?='property-details.php'.'?property='.$ad_row['PROPERTY_NO']?>">
                        <div class="homes-content">
                            <!-- homes address -->
                            <h3><?=$ad_row['PROPERTY_TITLE']?></h3>
                            <p class="homes-address mb-3">
                                 <i class="fa fa-map-marker"></i><span> <?=$ad_row['ADDRESS']?>,<?=$ad_row['AREA_NAME']?> , <?=$ad_row['CITY_NAME']?></span>
                                
                            </p>
                            <!-- homes List -->
                            <ul class="homes-list clearfix">
                                <li>
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                    <span>
                                        <?php
                                            if($ad_row['CATEGORY_NO'] <=2):
                                        ?>
                                             <?=$ad_row['NUM_OF_SEAT']?> Seat(s)

                                        <?php elseif($ad_row['CATEGORY_NO']==3):?>
                                            <?=$ad_row['NUM_OF_SEAT']?> Person(s)
                                        <?php else:?>
                                            <?=$ad_row['NUM_OF_BEDROOM']?> Bedroom(s)
                                        <?php endif;?>
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-bath" aria-hidden="true"></i>
                                    <span><?=$ad_row['NUM_OF_BATHROOM']?> Bathroom(s)</span>
                                </li>
                                <li>
                                    <i class="fa fa-object-group" aria-hidden="true"></i>
                                    <span>
                                        <?php
                                            if($ad_row['CATEGORY_NO'] <=2):
                                        ?>
                                             <?=$ad_row['NUM_OF_BALCONY']?> Balcony

                                        <?php elseif($ad_row['CATEGORY_NO']==3):?>
                                            <?=$ad_row['NUM_OF_BALCONY']?> Balcony  
                                        <?php else:?>
                                            <?=$ad_row['PROPERTY_SIZE']?> sq ft
                                        <?php endif;?>

                                    </span>
                                </li>
                                <li>
                                    <i class="fas fa-warehouse" aria-hidden="true"></i>
                                    <span><?=$ad_row['AVAILABLE_ON_FLOOR']?></span>
                                </li>
                            </ul>
                            <!-- Price -->
                            <div class="price-properties">
                                <h3 class="title mt-3">
                                  <?php
                                            if($ad_row['CATEGORY_NO'] <=2):
                                        ?>
                                             <?=$ad_row['MONTHLY_SEAT_RENT']?> BDT / Seat

                                        <?php elseif($ad_row['CATEGORY_NO']==3):?>
                                            <?=$ad_row['MONTHLY_SEAT_RENT']?> BDT/Month
                                        <?php else:?>
                                            <?=$ad_row['TOTAL_PRICE']?> BDT
                                        <?php endif;?>
                                
                                </h3>
                                <div class="compare">
                                   <h6>
                                        <?php
                                            if($ad_row['TYPE_NO']==1):
                                        ?>
                                            From <?=$ad_row['AVAILABLE_FROM']?>, <?=$ad_row['AD_YEAR']?>

                                        <?php else:?>
                                           Handover: <?=$ad_row['HANDOVER_DATE']?>
                                        <?php endif;?>
                                    </h6> 
                                    
                                </div>
                            </div>
                            <div class="footer">
                                  <i class="fa fa-user"></i><?=$ad_row['USER_NAME']?>
                                
                                <span>
                                <i class="fa fa-mobile"></i> <?=$ad_row['USER_CONTACT']?>
                            </span>
                            </div>
                        </div>
                    </a>
                    </div>
                
                </div>
            
            <?php endwhile;?>
           
        </div>
         <div class="bg-all mt-5">
                <a href="property.php" class="btn btn-outline-light">View All</a>
            </div>
    </section>
    <!-- END SECTION RECENTLY PROPERTIES -->


	 <!-- START SECTION POPULAR PLACES -->
    <section class="popular-places ">
        <div class="container">
            <div class="section-title">
                <h3>Most Popular</h3>
                <h2>Places</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                </div>
                <?php
                    $sql_area ="SELECT * FROM `gen_areas` WHERE `IS_DELETED`=0 AND `SHOW_HOME`=1";
                    $area_query = mysqli_query($con,$sql_area);
                    while($area_row = mysqli_fetch_array($area_query)):
                ?>
                <div class="col-lg-6 col-md-6">
                    <!-- Image Box -->
                    <a href="<?='property.php'.'?area='.$area_row['AREA_NO']?>" class="img-box hover-effect">
                        <img src="admin/soft/upload/<?=$area_row['AREA_IMAGE']?>" class="img-responsive" alt="">
                        <!-- Badge -->
                        <!-- <div class="listing-badges">
                            <span class="featured">Featured</span>
                        </div> -->
                        <div class="img-box-content visible">
                            <h4><?=$area_row['AREA_NAME']?> </h4>
                            <?php
                                $count_sql ="SELECT * FROM `properties` WHERE `AREA_NO`=".$area_row['AREA_NO']." AND IS_DELETED=0 AND IS_APPROVED=1";
                                $count_query=mysqli_query($con,$count_sql);
                                $count=mysqli_num_rows($count_query);
                            ?>
                            <span><?=$count?> Properties</span>
                        </div>
                    </a>
                </div>
                
                <?php endwhile;?>
                
            </div>
        </div>
    </section>
    <!--
   START SECTION FEATURED PROPERTIES 
    <section class="featured portfolio ">
        <div class="container">
            <div class="row">
                <div class="section-title col-md-5">
                    <h3>Featured</h3>
                    <h2>Properties</h2>
                </div>
            </div>
            <div class="row portfolio-items">
                <div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
                    <div class="project-single">
                        <div class="project-inner project-head">
                            <div class="project-bottom">
                                <h4><a href="properties-details.php">View Property</a><span class="category">Real Estate</span></h4>
                            </div>
                           
                            <div class="homes">
                              
                                <a href="properties-details.php" class="homes-img">
                                    <div class="homes-tag button alt featured">Featured</div>
                                    <div class="homes-tag button alt sale">For Sale</div>
                                    <div class="homes-price">Family Home</div>
                                    <img src="images/feature-properties/fp-1.jpg" alt="home-1" class="img-responsive">
                                </a>
                            </div>
                        </div>
                      
                        <div class="homes-content">
                           
                            <h3>Real House Luxury Villa</h3>
                            <p class="homes-address mb-3">
                                <a href="properties-details.php">
                                    <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                </a>
                            </p>
                          
                            <ul class="homes-list clearfix">
                                <li>
                                    <i class="fa fa-bed" aria-hidden="true"></i>
                                    <span>6 Bedrooms</span>
                                </li>
                                <li>
                                    <i class="fa fa-bath" aria-hidden="true"></i>
                                    <span>3 Bathrooms</span>
                                </li>
                                <li>
                                    <i class="fa fa-object-group" aria-hidden="true"></i>
                                    <span>720 sq ft</span>
                                </li>
                                <li>
                                    <i class="fas fa-warehouse" aria-hidden="true"></i>
                                    <span>2 Garages</span>
                                </li>
                            </ul>
                         
                            <div class="price-properties">
                                <h3 class="title mt-3">
                                <a href="properties-details.php">$ 230,000</a>
                                </h3>
                                <div class="compare">
                                   <h6>From April, 2019</h6> 
                                    
                                </div>
                            </div>
                            <div class="footer">
                                <a href="agent-details.php">
                                    <i class="fa fa-user"></i> Jhon Doe
                                </a>
                                <span>
                                <i class="fa fa-mobile"></i> +8801851875207
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    <section >
    	<div class="row">
    		<div class="col-md-12 col-xs-12">
    			<div class="advertise">

    			<div class="adbox">
    			<img src="images/advertise-banner.png" alt="">
    		</div>
    	</div>
    		</div>
    	</div>
    	
    </section>
	-->
<!-- START SECTION RECENTLY PROPERTIES -->
    <!-- END SECTION POPULAR PLACES -->
<?php include 'includes/footer.php' ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#searchBtn").on("click",function(){
        var AREA_NO = $("#AREA_NO").val();
        var p_id = $("#p_id").val();
        var category = $("#category").val();
        var type = $("#type").val();
        if(p_id =="" && AREA_NO =="-1" && category== "-1" && type=="-1"){
          alert("Please Select any criteria to be searched");
          return false;
        }
        
    });
  });
</script>