<?php
include('header.php');
?>

<style>
	body {
		margin: 0;
		padding: 0;
		background-color: #f1f1f1;
	}

	.box {
		width: 1100px;
		padding: 20px;
		background-color: #fff;
		border: 1px solid #ccc;
		border-radius: 5px;
		margin-top: 10px;
	}
</style>
<!--== BODY CONTNAINER ==-->
<div class="container-fluid sb2">
	<div class="row">

		<!--== BODY INNER CONTAINER ==-->
		<div class="sb2-2">
			<!--== breadcrumbs ==-->
			<div class="sb2-2-2">
				<ul>
					<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
					<li class="active-bre"><a href="#"> All Education</a> </li>

				</ul>
			</div>
			<div class="tz-2 tz-2-admin">
				<div class="tz-2-com tz-2-main">

					<h4>All Education</h4>
					
							<div style="padding: 7px 16px 7px 15px;font-size: 18px;" >


							
									<select name="category" id="category1">

										<?php
										foreach ($select_cat as $row) {
											echo '<option value="' . $row->cat_id . '">' . $row->cat_name . '</option>';
										}
										?>
									</select>
							
						
					</div>

					<div class="hom-cre-acc-left hom-cre-acc-right">


						<div class="container box colors  2">
							<h3 align="center"></h3><br />

							<table id="Universitylist" class="display" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Name</th>
										<th>Address</th>
										<th>Contact</th>
										<th>Date</th>
										<th>Public Stetus</th>
										<th>Stetus</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
								</tbody>

							</table>

						</div>
						<div class="container box colors 3 " style="display:none;">
							<h3 align="center"></h3><br />

							<table id="accomodationlist" class="display" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Room </th>
										<th>Address</th>
										<th>Rent</th>
										<th>Contact</th>
										<th>Date</th>
										<th>Public Stetus</th>
										<th>Stetus</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
								</tbody>

							</table>

						</div>
						<div class="container box colors 6 " style="display:none;">
							<h3 align="center"></h3><br />

							<table id="Tourismlist" class="display" cellspacing="0" width="100%">
								<thead>
									<tr>
									<th>No</th>
										<th>Place</th>
										<th>Price</th>
										<th>Duration</th>
										<th>Contact</th>
										<th>Date</th>
										<th>Public Stetus</th>
										<th>Stetus</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
								</tbody>

							</table>

						</div>
						
						

					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!--== BOTTOM FLOAT ICON ==-->


<?php
include 'footer.php';
?>
<script>
	$(function() {
		$('#category1').change(function() {
			$('.colors').hide();
			$('.' + $(this).val()).show();
		});
	});
	// [forked from](http://jsfiddle.net/FvMYz/)
	// [show-hide-based-on-select-option-jquery)(http://stackoverflow.com/questions/2975521/show-hide-div-based-on-select-option-jquery/2975565#2975565)
</script>