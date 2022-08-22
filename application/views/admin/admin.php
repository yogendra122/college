<?php
include('header.php');
?>
<div class="sb2-2">
	<!--== breadcrumbs ==-->
	<div class="sb2-2-2">
		<ul>
			<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
			<li class="active-bre"><a href="#"> Dashboard</a> </li>
			<!-- <li class="page-back"><a href="#"><i class="fa fa-backward" aria-hidden="true"></i> Back</a> </li> -->
		</ul>
	</div>
	<div class="tz-2 tz-2-admin">
		<div class="tz-2-com tz-2-main">
			<h4>Manage Booking</h4>
			<div class="tz-2-main-com bot-sp-20">
				<div class="tz-2-main-1 tz-2-main-admin">
					<div class="tz-2-main-2"> <img src="assets/admin/images/icon/d1.png" alt=""><span>All Listings</span>
						<!-- <p>All the Lorem Ipsum generators on the</p> -->

						<h2><?php echo $this->Admin_model->get_total_count('university', array('un_status' => '1', 'un_delete_status' => '0')); ?></h2>
					</div>
				</div>
				<div class="tz-2-main-1 tz-2-main-admin">
					<div class="tz-2-main-2"> <img src="assets/admin/images/icon/d4.png" alt=""><span>Users</span>
						<!-- <p>All the Lorem Ipsum generators on the</p> -->
						<h2><?php echo $this->Admin_model->get_total_count('users', array('user_status' => '1', 'user_delete_status' => '0')); ?></h2>
					</div>
				</div>
				<div class="tz-2-main-1 tz-2-main-admin">
					<div class="tz-2-main-2"> <img src="assets/admin/images/icon/d3.png" alt=""><span>Enquiry</span>
						<!-- <p>All the Lorem Ipsum generators on the</p> -->
						<h2><?php echo $this->Admin_model->get_total_count('rating', array('rat_status' => '1', 'rat_delete' => '0')); ?></h2>
					</div>
				</div>
				<div class="tz-2-main-1 tz-2-main-admin">
					<div class="tz-2-main-2"> <img src="assets/admin/images/icon/d2.png" alt=""><span>Reviews</span>
						<!-- <p>All the Lorem Ipsum generators on the</p> -->
						<h2><?php echo $this->Admin_model->get_total_count('user_inquiry', array('in_status' => '1', 'in_deletestatus' => '0')); ?></h2>
					</div>
				</div>
			</div>
			<div class="split-row">
				<!--== Country Campaigns ==-->
				<div class="col-md-6">
					<div class="box-inn-sp">
						<!-- <div class="inn-title">
							<h4>Country Campaigns</h4>
							<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> <a class="dropdown-button drop-down-meta" href="#" data-activates="dropdown1"><i class="material-icons">more_vert</i></a>
							<ul id="dropdown1" class="dropdown-content">
								<li><a href="#!">Add New</a> </li>
								<li><a href="#!">Edit</a> </li>
								<li><a href="#!">Update</a> </li>
								<li class="divider"></li>
								<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>
								<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>
								<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>
							</ul> -->
							<!-- Dropdown Structure -->
						<!-- </div> -->
						<!-- <div class="tab-inn">
							<div class="table-responsive table-desi">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Country</th>
											<th>Client</th>
											<th>Changes</th>
											<th>Budget</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><span class="txt-dark weight-500">Australia</span> </td>
											<td>Beavis</td>
											<td><span class="txt-success"><i class="fa fa-angle-up" aria-hidden="true"></i><span>2.43%</span></span>
											</td>
											<td> <span class="txt-dark weight-500">$1478</span> </td>
											<td> <span class="label label-success">Active</span> </td>
										</tr>
										<tr>
											<td><span class="txt-dark weight-500">Cuba</span> </td>
											<td>Felix</td>
											<td><span class="txt-success"><i class="fa fa-angle-up" aria-hidden="true"></i><span>1.43%</span></span>
											</td>
											<td> <span class="txt-dark weight-500">$951</span> </td>
											<td> <span class="label label-danger">Closed</span> </td>
										</tr>
										<tr>
											<td><span class="txt-dark weight-500">France</span> </td>
											<td>Cannibus</td>
											<td><span class="txt-danger"><i class="fa fa-angle-up" aria-hidden="true"></i><span>-8.43%</span></span>
											</td>
											<td> <span class="txt-dark weight-500">$632</span> </td>
											<td> <span class="label label-default">Hold</span> </td>
										</tr>
										<tr>
											<td><span class="txt-dark weight-500">Norway</span> </td>
											<td>Neosoft</td>
											<td><span class="txt-success"><i class="fa fa-angle-up" aria-hidden="true"></i><span>7.43%</span></span>
											</td>
											<td> <span class="txt-dark weight-500">$325</span> </td>
											<td> <span class="label label-default">Hold</span> </td>
										</tr>
										<tr>
											<td><span class="txt-dark weight-500">South Africa</span> </td>
											<td>Hencework</td>
											<td><span class="txt-success"><i class="fa fa-angle-up" aria-hidden="true"></i><span>9.43%</span></span>
											</td>
											<td> <span>$258</span> </td>
											<td> <span class="label label-success">Active</span> </td>
										</tr>
									</tbody>
								</table>
							</div>
						</div> -->
					</div>
				</div>
				<!--== Country Campaigns ==-->
				<div class="col-md-6">
					<!-- <div class="box-inn-sp">
						<div class="inn-title">
							<h4>City Campaigns</h4>
							<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> <a class="dropdown-button drop-down-meta" href="#" data-activates="dropdown2"><i class="material-icons">more_vert</i></a> -->
							<!-- <ul id="dropdown2" class="dropdown-content">
								<li><a href="#!">Add New</a> </li>
								<li><a href="#!">Edit</a> </li>
								<li><a href="#!">Update</a> </li>
								<li class="divider"></li>
								<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>
								<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>
								<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>
							</ul> -->
							<!-- Dropdown Structure -->
						</div>
						<!-- <div class="tab-inn">
							<div class="table-responsive table-desi">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>State</th>
											<th>Client</th>
											<th>Changes</th>
											<th>Budget</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><span class="txt-dark weight-500">California</span> </td>
											<td>Beavis</td>
											<td><span class="txt-success"><i class="fa fa-angle-up" aria-hidden="true"></i><span>2.43%</span></span>
											</td>
											<td> <span class="txt-dark weight-500">$1478</span> </td>
											<td> <span class="label label-success">Active</span> </td>
										</tr>
										<tr>
											<td><span class="txt-dark weight-500">Florida</span> </td>
											<td>Felix</td>
											<td><span class="txt-success"><i class="fa fa-angle-up" aria-hidden="true"></i><span>1.43%</span></span>
											</td>
											<td> <span class="txt-dark weight-500">$951</span> </td>
											<td> <span class="label label-danger">Closed</span> </td>
										</tr>
										<tr>
											<td><span class="txt-dark weight-500">Hawaii</span> </td>
											<td>Cannibus</td>
											<td><span class="txt-danger"><i class="fa fa-angle-up" aria-hidden="true"></i><span>-8.43%</span></span>
											</td>
											<td> <span class="txt-dark weight-500">$632</span> </td>
											<td> <span class="label label-default">Hold</span> </td>
										</tr>
										<tr>
											<td><span class="txt-dark weight-500">Alaska</span> </td>
											<td>Neosoft</td>
											<td><span class="txt-success"><i class="fa fa-angle-up" aria-hidden="true"></i><span>7.43%</span></span>
											</td>
											<td> <span class="txt-dark weight-500">$325</span> </td>
											<td> <span class="label label-default">Hold</span> </td>
										</tr>
										<tr>
											<td><span class="txt-dark weight-500">New Jersey</span> </td>
											<td>Hencework</td>
											<td><span class="txt-success"><i class="fa fa-angle-up" aria-hidden="true"></i><span>9.43%</span></span>
											</td>
											<td> <span>$258</span> </td>
											<td> <span class="label label-success">Active</span> </td>
										</tr>
									</tbody>
								</table>
							</div>
						</div> -->
					<!-- </div> -->
				</div>
			</div>
			
		</div>
	</div>
</div>
</div>
</div>
<?php
include 'footer.php';
?>
<script type="text/javascript">
	<?php

	if ($this->session->flashdata('warning_profile')) { ?>
		toastr.warning("<?php echo $this->session->flashdata('warning_profile'); ?>");
	<?php
	}
	?>
</script>