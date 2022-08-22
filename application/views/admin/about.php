<?php
include('header.php');
?>
	<style type="text/css">
		 textarea {
        overflow-y: scroll;
        height: 100px;
        resize: none; /* Remove this if you want the user to resize the textarea */
    }
	</style>

<div class="container-fluid sb2">
		<div class="row">
			<div class="sb2-2">
				<!--== breadcrumbs ==-->
				<div class="sb2-2-2">
					<ul>
						<li><a href="dashboard"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
						<li class="active-bre"><a href="#"> About us</a> </li>
						<li class="page-back"><a href="#"><i class="fa fa-backward" aria-hidden="true"></i> Back</a> </li>
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Manage About us</h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"></a>
						
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-mar-to-min">
									<div class="tab-inn ad-tab-inn">
										  <?php if ($this->session->flashdata('succes')) :   ?>
                                        <?php echo '<div class="succescolor">' . $this->session->flashdata('succes') . '</div>'; ?>
                                    <?php endif; ?>
										<div class="tz2-form-pay tz2-form-com ad-noto-text">
											<form action="manageaboutus" method="post" enctype="multipart/form-data">
												<div class="row">
													<div class="input-field col s12">
														<input type="text" class="validate" name="title"value="<?php echo $data[0]->title;?>">
														<label>Title</label>
													</div>
												</div>
												<div class="row">
													<div class="input-field col s12">
														<textarea id="textarea1" class="materialize-textarea" name="contant" style="overflow-y: scroll;"> <?php echo $data[0]->contant;?></textarea>
														<label for="textarea1" class="">Descriptions</label>
													</div>
												</div>
												
												<div class="row">
													   <button type="submit" id="register" class="input-field col s12 v2-mar-top-40 waves-effect waves-light btn-large full-btn">Save</button>
												</div>
											</form>
										</div>
									</div>
								</div>
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
