<?php
	session_start();
	if(isset($_GET['sale'])){
		$currentPage = 'sale';
	}elseif(isset($_GET['rent'])){
		$currentPage = 'rent';
	}
	
?>
<?php include 'includes/header.php' ?>

<style type="text/css">
    a:hover{text-decoration: none;}
    .parallax-search .trip-search{height: 171px;}
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
	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>All Listing Properties</h1>
				<h2><a href="index.php">Home </a> &nbsp;/&nbsp; properties</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->
		<section id="hero-area" class="parallax-search overlay no-bg-search" data-stellar-background-ratio="0.5">
		<div class="hero-main">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="hero-inner">
							
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
                                            $sql_area = "SELECT * FROM `gen_areas` where IS_DELETED=0 ";
                                            $resultarea = mysqli_query($con,$sql_area);
                                            while($rowArea = mysqli_fetch_array($resultarea)):
                                        ?>
                                            <option value="<?=$rowArea['AREA_NO']?>" > <?=$rowArea['AREA_NAME']?> </option>
                                        <?php endwhile;?>
									</select>
									</div>
									<!--/ End Form Location -->
									<div class="form-group">
										<select class="nice-select form-control wide" name="category" id="category">
										<option value="-1"><span class="current"><i class="fa fa-map-marker"></i>Property Type</span></option>
										<?php
                                            $sql_cat = "SELECT * FROM `gen_categorys` where IS_DELETED=0 ";
                                            $result_cat = mysqli_query($con,$sql_cat);
                                            while($row_cat = mysqli_fetch_array($result_cat)):
                                        ?>
                                            <option value="<?=$row_cat['CATEGORY_NO']?>" > <?=$row_cat['CATEGORY_NAME']?> </option>
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
										<button id="searchBtn" type="submit" class="btn">Search</button>
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

	<!-- START SECTION PROPERTIES LISTING -->
	<section class="properties-right featured portfolio blog">
		<div class="container">
			<div class="row">
					
				<div class="col-lg-12 col-md-12 blog-pots">
					<!-- Block heading Start-->
					<div class="block-heading">
						<div class="row">
							<div class="col-lg-6 col-md-5 col-2">
								<h4>
                                <span class="heading-icon">
                                <i class="fa fa-th-list"></i>
                                </span>
                                <span class="hidden-sm-down">Properties Listing</span>
                            </h4>
							</div>
							
						</div>
					</div>
					<!-- Block heading end -->
					
					<div class="row">
						<?php
							$where ="";
							if(isset($_GET['p_id']) && isset($_GET['area']) && isset($_GET['category']) && isset($_GET['type'])){

								$PROPERTY_ID =$_GET['p_id'];
								if($PROPERTY_ID != ""){
					            $where.=" AND `properties`.`PROPERTY_ID` = '$PROPERTY_ID'";
					          }
								$AREA_NO =$_GET['area'];
								if($AREA_NO != -1){
					            $where.=" AND `properties`.`AREA_NO` = '$AREA_NO'";
					          }
								$CATEGORY_NO =$_GET['category'];
								if($CATEGORY_NO != -1){
					            $where.=" AND `properties`.`CATEGORY_NO` = '$CATEGORY_NO'";
					          }
								$TYPE_NO =$_GET['type'];
								if($TYPE_NO != -1){
					            $where.=" AND `properties`.`TYPE_NO` = '$TYPE_NO'";
					          }
								$ad_sql ="SELECT * FROM `properties` LEFT JOIN user_reg ON user_reg.user_no=properties.USER_NO LEFT JOIN gen_cities ON gen_cities.CITY_NO = properties.CITY_NO LEFT JOIN gen_areas ON gen_areas.AREA_NO = properties.AREA_NO LEFT JOIN gen_categorys ON gen_categorys.CATEGORY_NO = properties.CATEGORY_NO WHERE properties.IS_DELETED =0 AND properties.IS_APPROVED = 1 $where ORDER BY properties.PROPERTY_NO DESC  ";
							}
							elseif(isset($_GET['rent'])){
								$ad_sql ="SELECT * FROM `properties` LEFT JOIN user_reg ON user_reg.user_no=properties.USER_NO LEFT JOIN gen_cities ON gen_cities.CITY_NO = properties.CITY_NO LEFT JOIN gen_areas ON gen_areas.AREA_NO = properties.AREA_NO LEFT JOIN gen_categorys ON gen_categorys.CATEGORY_NO = properties.CATEGORY_NO WHERE properties.IS_DELETED =0 AND properties.IS_APPROVED = 1 AND properties.TYPE_NO = 1 ORDER BY properties.PROPERTY_NO DESC  ";
							}
							elseif(isset($_GET['sale'])){
								$ad_sql ="SELECT * FROM `properties` LEFT JOIN user_reg ON user_reg.user_no=properties.USER_NO LEFT JOIN gen_cities ON gen_cities.CITY_NO = properties.CITY_NO LEFT JOIN gen_areas ON gen_areas.AREA_NO = properties.AREA_NO LEFT JOIN gen_categorys ON gen_categorys.CATEGORY_NO = properties.CATEGORY_NO WHERE properties.IS_DELETED =0 AND properties.IS_APPROVED = 1 AND properties.TYPE_NO =2  ORDER BY properties.PROPERTY_NO DESC  ";
							}elseif(isset($_GET['area'])){
								$AREA_NO =$_GET['area'];
								$ad_sql ="SELECT * FROM `properties` LEFT JOIN user_reg ON user_reg.user_no=properties.USER_NO LEFT JOIN gen_cities ON gen_cities.CITY_NO = properties.CITY_NO LEFT JOIN gen_areas ON gen_areas.AREA_NO = properties.AREA_NO LEFT JOIN gen_categorys ON gen_categorys.CATEGORY_NO = properties.CATEGORY_NO WHERE properties.IS_DELETED =0 AND properties.IS_APPROVED = 1 AND properties.AREA_NO ='$AREA_NO'  ORDER BY properties.PROPERTY_NO DESC  ";
							}
							else{
								$ad_sql ="SELECT * FROM `properties` LEFT JOIN user_reg ON user_reg.user_no=properties.USER_NO LEFT JOIN gen_cities ON gen_cities.CITY_NO = properties.CITY_NO LEFT JOIN gen_areas ON gen_areas.AREA_NO = properties.AREA_NO LEFT JOIN gen_categorys ON gen_categorys.CATEGORY_NO = properties.CATEGORY_NO WHERE properties.IS_DELETED =0 AND properties.IS_APPROVED = 1 ORDER BY properties.PROPERTY_NO DESC  ";
							}
		                    $ad_query = mysqli_query($con,$ad_sql);
		                    $ad_count = mysqli_num_rows($ad_query);
		                    if($ad_count >0) :
		                    	while($ad_row = mysqli_fetch_array($ad_query)):

		                ?>
						<div class="item col-lg-4 col-md-4 it2 col-xs-12 web rent no-pb x2">
							<div class="project-single recentNo last">
								<div class="project-inner project-head">
									<div class="project-bottom">
										<h4><a href="<?='property-details.php'.'?property='.$ad_row['PROPERTY_NO']?>">View Property</a><span class="category">TOLETHUNT</span></h4>
									</div>
									
									<div class="homes">
										<!-- homes img -->
										<a href="<?='property-details.php'.'?property='.$ad_row['PROPERTY_NO']?>" class="homes-img">
											
											<div class="homes-tag button sale rent"><?=($ad_row['TYPE_NO']==1)?"Rent":"Sale"?></div>
											<div class="homes-price"><?=$ad_row['CATEGORY_NAME']?></div>
											<div class="homes-price homes-gender"><?php
                                            if($ad_row['TYPE_NO']==1):
                                        ?>
                                            For <?=$ad_row['PREFERED_TENANT']?> 

                                        <?php else:?>
                                            <?=$ad_row['AREA_NAME']?>
                                        <?php endif;?></div>
                                        
											<img <?php if($ad_row['IMAGE_URL1'] ==""):?> src=" admin/soft/upload/default.jpg" <?php else: ?> src=" admin/soft/upload/<?=$ad_row['IMAGE_URL1']?>" <?php endif;?>  style="height: 262.5px;">
										</a>
									</div>
								</div>
								<!-- homes content -->
								<div class="homes-content">
									<a href="<?='property-details.php'.'?property='.$ad_row['PROPERTY_NO']?>">
									<!-- homes address -->
									<h3><?=$ad_row['PROPERTY_TITLE']?></h3>
									<p class="homes-address mb-3">
										
											<i class="fa fa-map-marker"></i><span> <?=$ad_row['ADDRESS']?>,<?=$ad_row['AREA_NAME']?>, <?=$ad_row['CITY_NAME']?></span>
									
									</p>
									<!-- homes List -->
									<ul class="homes-list clearfix">
										<li>
											<i class="fa fa-bed" aria-hidden="true"></i>
											<span><?php
                                            if($ad_row['CATEGORY_NO'] <=2):
                                        ?>
                                             <?=$ad_row['NUM_OF_SEAT']?> Seat(s)

                                        <?php elseif($ad_row['CATEGORY_NO']==3):?>
                                            <?=$ad_row['NUM_OF_SEAT']?> Person(s)
                                        <?php else:?>
                                            <?=$ad_row['NUM_OF_BEDROOM']?> Bedroom(s)
                                        <?php endif;?></span>
										</li>
										<li>
											<i class="fa fa-bath" aria-hidden="true"></i>
											<span><?=$ad_row['NUM_OF_BATHROOM']?> Bathroom(s)</span>
										</li>
										<li>
											<i class="fa fa-object-group" aria-hidden="true"></i>
											<span><?php
                                            if($ad_row['CATEGORY_NO'] <=2):
                                        ?>
                                             <?=$ad_row['NUM_OF_BALCONY']?> Balcony

                                        <?php elseif($ad_row['CATEGORY_NO']==3):?>
                                            <?=$ad_row['NUM_OF_BALCONY']?> Balcony  
                                        <?php else:?>
                                            <?=$ad_row['PROPERTY_SIZE']?> sq ft
                                        <?php endif;?></span>
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
                                   <h6><?php
                                            if($ad_row['TYPE_NO']==1):
                                        ?>
                                            From <?=$ad_row['AVAILABLE_FROM']?>, <?=$ad_row['AD_YEAR']?>

                                        <?php else:?>
                                           Handover: <?=$ad_row['HANDOVER_DATE']?>
                                        <?php endif;?></h6> 
                                    
                                </div>
                            </div>
                            <div class="footer">
                                 <i class="fa fa-user"></i> <?=$ad_row['USER_NAME']?>
                                
                                <span>
                                <i class="fa fa-mobile"></i> <?=$ad_row['USER_CONTACT']?>
                            </span>
                            </div>
                        </a>
								</div>
							</div>
						</div>
					<?php endwhile;?>
					<?php else: ?>
						<h3 style="color: #0098ef;background:#fff;padding: 20px 40px;width: 95%;border:1px solid #ccc;">No property found</h3>
									
					<?php endif;?>

					</div>
				</div>


				

				
			</div>
			<!-- <nav aria-label="..." class="mt-5">
				<ul class="pagination">
					<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1">Previous</a>
					</li>
					<li class="page-item active">
						<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
					</li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">5</a></li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</nav> -->
		</div>
	</section>
	<!-- END SECTION PROPERTIES LISTING -->

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