<aside class="col-lg-3 col-md-12 car">
	<div class="widget">
		<div class="section-heading">
			<div class="media">
				<div class="media-left">
					<i class="fa fa-home"></i>
				</div>
				<div class="media-body">
					<h5>Search Properties</h5>
					<div class="border"></div>
					<p>Search your Properties</p>
				</div>
			</div>
		</div>
		<!-- Search Fields -->
		<div class="main-search-field">
			<h5 class="title">Filter</h5>
			<form class="form" method="get" action="property.php" >
				<div class="col-lg-12 no-pds">
					<div class="at-col-default-mar">
						<input class="at-input" type="number" name="PROPERTY_ID" placeholder="Property ID">
					</div>
				</div>
				<div class="at-col-default-mar">
					<select class="search" name="location">
						<option value="-1" selected>Location</option>
						<?php
                            $sql = "SELECT * FROM `gen_categorys` where IS_DELETED=0 ";
                            $result1 = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['CATEGORY_NO']?>" > <?=$row['CATEGORY_NAME']?> </option>
                        <?php endwhile;?>
					</select>
				</div>
				<div class="at-col-default-mar">
					<select class="div-toggle" data-target=".my-info-1" name="type">
						<option value="-1" data-show=".acitveon" selected>Property Status</option>
						<option value="1" data-show=".sale">For Sale</option>
						<option value="2" data-show=".rent">For Rent</option>
						
					</select>
				</div>
				<div class="at-col-default-mar">
					<div class="at-col-default-mar">
						<select name="tenant">
							<option value="0" selected>Prefered Tenant</option>
							<option value="1">Male House</option>
							<option value="2">Female</option>
							<option value="3">Family</option>
						</select>
					</div>
				</div>
				<div class="at-col-default-mar">
					<select name="seat">
						<option value="-1" selected>Seat/Person</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						
					</select>
				</div>
				<div class="at-col-default-mar">
					<select>
						<option value="0" selected>Category</option>
						<?php
                            $sql = "SELECT * FROM `gen_categorys` where IS_DELETED=0 ";
                            $result1 = mysqli_query($con,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['CATEGORY_NO']?>" > <?=$row['CATEGORY_NAME']?> </option>
                        <?php endwhile;?>
						
					</select>
				</div>
				<div class="col-lg-12 no-pds">
					<div class="at-col-default-mar">
						<input class="at-input" type="number" name="min-area" placeholder="Squre Fit Min">
					</div>
				</div>

				<div class="col-lg-12 no-pds my-4">
					<div class="at-col-default-mar">
						<input class="at-input" type="number" name="max-area" placeholder="Squre Fit Max">
					</div>
				</div>
			</form>
		</div>
		<!-- Price Fields -->
		
		<div class="col-lg-12 no-pds">
			<div class="at-col-default-mar">
				<button class="btn btn-default hvr-bounce-to-right" name="search" type="submit">Search</button>
			</div>
		</div>
		
		<div class="recent-post">
			<div class="sidebar_ads">
				<img src="" alt="">
			</div>
		</div>
	</div>
</aside>