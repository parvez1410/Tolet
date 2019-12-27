<?php session_start(); ?>
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
    .select2-container--default .select2-selection--single{width: 172px !important; margin-bottom: -2px !important;margin-left: -1px !important;}
    .select2 .select2-container .select2-container--default .select2-container--focus{width: 250px !important;}
  }
</style>
<?php
		function showAmenities($con,$AMENITY){
		 $sql1 = "SELECT `AMENITY_NAME` FROM `gen_aminities` WHERE `AMENITY_NO` IN ($AMENITY)";
		$query1 = mysqli_query($con,$sql1);
		$result="";
		while($row1 = mysqli_fetch_array($query1)):
			$result.="<li><i class='fa fa-check-square' aria-hidden='true'></i> <span>".$row1['AMENITY_NAME']."</span></li>";
		endwhile;
		return $result;
	}
?>

<?php
	if(isset($_GET['property'])){
		$PROPERTY_NO = $_GET['property'];
		$sql ="SELECT * FROM `properties` LEFT JOIN user_reg ON user_reg.user_no=properties.USER_NO LEFT JOIN gen_cities ON gen_cities.CITY_NO = properties.CITY_NO LEFT JOIN gen_areas ON gen_areas.AREA_NO = properties.AREA_NO LEFT JOIN gen_categorys ON gen_categorys.CATEGORY_NO = properties.CATEGORY_NO WHERE properties.IS_DELETED =0  AND properties.PROPERTY_NO = '$PROPERTY_NO' ";
        $query = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($query);
	}

?>

	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>Property Details</h1>
				<h2><a href="index.php">Home </a> &nbsp;/&nbsp; Property Details</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->
	<!-- END SECTION HEADINGS -->
		<section id="hero-area" class="parallax-search overlay no-bg-search" data-stellar-background-ratio="0.5">
		<div class="hero-main">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="hero-inner">
							<!-- Welcome Text -->
							
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
                                            $sql_ara = "SELECT * FROM `gen_areas` where IS_DELETED=0 ";
                                            $result_area = mysqli_query($con,$sql_ara);
                                            while($row_area = mysqli_fetch_array($result_area)):
                                        ?>
                                            <option value="<?=$row_area['AREA_NO']?>" > <?=$row_area['AREA_NAME']?> </option>
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
	<section class="blog details">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-xs-12 blog-pots">
					<!-- Block heading Start-->
					<div class="block-heading details" >
						<div class="row">
							<div class="col-md-12">
								
								<h2><?=$row['PROPERTY_TITLE']?></h2>
								<h3><?php
                                            if($row['CATEGORY_NO'] <=2):
                                        ?>
                                             <?=$row['MONTHLY_SEAT_RENT']?> TK/ Seat

                                        <?php elseif($row['CATEGORY_NO']==3):?>
                                            <?=$row['MONTHLY_SEAT_RENT']?> TK/Month
                                        <?php else:?>
                                            <?=$row['TOTAL_PRICE']?> TK
                                        <?php endif;?> 
								</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-xs-12 cod-pad">
								<div class="sorting-options">
									<h5 style="color:#0098ef;">
									 <span>ID :</span>	 <?=$row['PROPERTY_ID']?>
									</h5>
									<h5 class="type"><span>Status:</span> For <?=($row['TYPE_NO']==1)?"Rent":"Sale"?></h5>
									<h5 class="type"><span>Type:</span> <?=$row['CATEGORY_NAME']?></h5>
									<h5 class="type"><span>For:</span> <?php
                                            if($row['TYPE_NO']==1):
                                        ?>
                                            <?=$row['PREFERED_TENANT']?> 

                                        <?php else:?>
                                            N/A
                                        <?php endif;?>
                                    </h5>
                                    <h5 class="type"><span>From :</span>
                                    <?php
                                            if($row['TYPE_NO']==1):
                                        ?>
                                             <?=$row['AVAILABLE_FROM']?>, <?=$row['AD_YEAR']?>

                                        <?php else:?>
                                            <?=$row['HANDOVER_DATE']?>
                                        <?php endif;?> 

                                    </h5>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-xs-12">
								<h4>
                            <span class="heading-icon">
                                <i class="fa fa-map-marker"></i>
                                </span>
                                <span class=""><?=$row['ADDRESS']?>, <?=$row['AREA_NAME']?>, <?=$row['CITY_NAME']?></span>
                            </h4>
                            <h6>Advertise By: <?=$row['USER_NAME']?></h6>
                            <h6>Mobile : <?=$row['USER_CONTACT']?></h6>
                            <h6>Mobile (Optional) : <?=$row['USER_ALTERNATIVE_CONTACT']?></h6>
                            <h6>Email :<?=$row['USER_EMAIL']?></h6>
							</div>
							
						</div>
					</div>
					<!-- Block heading end -->
					<div class="row">
						<div class="col-md-7 col-xs-12 mb-4">
							<div class="carouselImg">
								<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<!-- <ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
								</ol> -->
								<div class="carousel-inner" role="listbox">
								<?php if($row['IMAGE_URL1'] !=""):?>
									<div class="carousel-item active">
										<img class="d-block img-fluid" src="admin/soft/upload/<?=$row['IMAGE_URL1']?>" alt="First slide">
									</div>
								<?php endif;?>
								<?php if($row['IMAGE_URL2'] !=""):?>
									<div class="carousel-item ">
										<img class="d-block img-fluid" src="admin/soft/upload/<?=$row['IMAGE_URL2']?>" alt="First slide">
									</div>
								<?php endif;?>
								<?php if($row['IMAGE_URL3'] !=""):?>
									<div class="carousel-item ">
										<img class="d-block img-fluid" src="admin/soft/upload/<?=$row['IMAGE_URL3']?>" alt="First slide">
									</div>
								<?php endif;?>
								<?php if($row['IMAGE_URL4'] !=""):?>
									<div class="carousel-item ">
										<img class="d-block img-fluid" src="admin/soft/upload/<?=$row['IMAGE_URL4']?>" alt="First slide">
									</div>
								<?php endif;?>
								<?php if($row['IMAGE_URL5'] !=""):?>
									<div class="carousel-item ">
										<img class="d-block img-fluid" src="admin/soft/upload/<?=$row['IMAGE_URL5']?>" alt="First slide">
									</div>
								<?php endif;?>
									
								</div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							</div>
							</div>
							<div class="col-md-5 col-xs-12">
							<div class="blog-info details">
								<!-- cars content -->
								<div class="homes-content details-2 mb-5">
									<div class="homes-list clearfix">
										<table style="width:100%;">
											<tr>
												<td><i class="fa fa-bed"></i> <?php
                                            if($row['CATEGORY_NO'] <=2):
                                        ?>
                                             <?=$row['NUM_OF_SEAT']?> Seat(s)

                                        <?php elseif($row['CATEGORY_NO']==3):?>
                                            <?=$row['NUM_OF_SEAT']?> Person(s)
                                        <?php else:?>
                                            <?=$row['NUM_OF_BEDROOM']?> Bedroom(s)
                                        <?php endif;?></td>
												<td><i class="fa fa-bath"></i> <?=$row['NUM_OF_ROOM']?> Bathroom(s)</td>
											</tr>
											<tr>
												
											</tr>
											<tr>
												<td><i class="fa fa-building"></i> <?php
                                            if($row['CATEGORY_NO'] <=2):
                                        ?>
                                            Bathroom Type: <?=$row['BATHROOM_TYPE']?>

                                        <?php else:?>
                                            <?=$row['PROPERTY_SIZE']?> sq ft
                                        <?php endif;?></td>
												<td><i class="fa fa-square"></i> <?=$row['NUM_OF_ROOM']?>  Balcony</td>
											</tr>
											<tr>
												
											</tr>
											<tr>
												<td><i class="fa fa-square"></i> 2250 sqft</td>
												<td><i class="fa fa-money"></i> Advance: <?=$row['DEPOSITE_AMOUNT']?> TK</td>
											</tr>
											<tr>
												
											</tr>
											<tr>
												<td><i class="fa fa-money"></i>  Utility Bill: <?=$row['HAS_UTILITY_BILL']?></td>
												<td><i class="fa fa-money"></i> Utility: <?=$row['UTILITY_BILL']?> TK</td>
											</tr>
											<tr>
												<td><i class="fa fa-money"></i> Negotiable: <?=$row['IS_NEGOCIABLE']?> </td>
												<td><i class="fa fa-money"></i> Attached Bathroom: <?=$row['BATHROOM_TYPE']?> </td>
											</tr>
										</table>

										


										
										
										
											</div>
											
										</div>
									
								
								
								
							</div>
						</div>
					</div>
					<!-- cars content -->
					<div class="homes-content details mb-5">
						<h5 class="mb-4">GENERAL INFORMATION</h5>
								<pre class="mb-3"><?=$row['PROPERTY_DESCRIPTION']?></pre>
						<!-- title -->
						<h5 class="mb-4">Facilites</h5>
						<!-- cars List -->
						<ul class="homes-list clearfix">
							
									<?php echo $AMENITY = showAmenities($con,$row['AMENITY_NO']);?>
										
							
						</ul>
					</div>
					
					
				</div>
				
			</div>
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