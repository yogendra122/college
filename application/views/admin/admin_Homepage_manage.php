<?php
include('header.php');
?>

<!--== BODY CONTNAINER ==-->
<div class="container-fluid sb2">
	<div class="row">

		<!--== BODY INNER CONTAINER ==-->
		<div class="sb2-2">
			<!--== breadcrumbs ==-->
			<div class="sb2-2-2">
				<ul>
					<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
					<li class="active-bre"><a href="#">Home Page Mange</a> </li>
				</ul>
			</div>
			<div class="tz-2 tz-2-admin">
				<div class="tz-2-com tz-2-main">
					<h4>Home Page Mange</h4>
					<!-- Dropdown Structure -->
					<div class="split-row">
						<div class="col-md-12">
							<div class="box-inn-sp ad-inn-page">
								<div class="tab-inn ad-tab-inn">
									<div class="hom-cre-acc-left hom-cre-acc-right">
										<div class="">
											<form id="Homepageform" action-attr="Homepageform" action="javascript:void(0)" method="post" enctype="multipart/form-data">

												<div class="row">

													<div class="col s12">
														<h5 for="home_un_desc">Explore Best Education</h5>
														<label for="home_un_desc">Discription</label>
														<input id="home_un_desc" name="home_un_desc" placeholder="Explore Best University Description" value="<?php echo $homepage[0]->home_un_desc ?>" type="text" class="validate">
													</div>

												</div>

												<div class="row">

													<div class="col s12">
														<h5 for="un_contactno">The Education Listings</h5>
														<label for="home_listing_desc">Discription</label>
														<input id="home_listing_desc" name="home_listing_desc" value="<?php echo $homepage[0]->home_listing_desc ?>" placeholder="The University Listings Description " type="text" class="validate">
													</div>


												</div>


												<div class="row">

													<div class="col s12">
														<h5 for="home_country_desc">Explore Best Education in Country</h5>
														<label for="home_country_desc">Discription</label>
														<input id="home_country_desc" name="home_country_desc" value="<?php echo $homepage[0]->home_country_desc ?>" placeholder="Explore Best University in Country Description " type="text" class="validate">
													</div>


												</div>


												<div class="row">

													<div class="col s12">
														<h5 for="home_howit_desc">How it works</h5>
														<label for="home_howit_desc">Discription</label>
														<input id="home_howit_desc" name="home_howit_desc" placeholder="How it works Discription" value="<?php echo $homepage[0]->home_howit_desc ?>" type="text" class="validate">

														<label for="home_title1">Title 1</label>
														<input id="home_title1" name="home_title1" placeholder="Title 1" value="<?php echo $homepage[0]->home_title1 ?>" type="text" class="validate">
														<label for="home_subtitle1">Subtitle 1</label>
														<input id="home_subtitle1" name="home_subtitle1" value="<?php echo $homepage[0]->home_subtitle1 ?>" placeholder="Subtitle 1" type="text" class="validate">

														<label for="home_title2">Title 2</label>
														<input id="home_title1" value="<?php echo $homepage[0]->home_title2 ?>" name="home_title2" placeholder="Title 2 " type="text" class="validate">
														<label for="home_subtitle2">Subtitle 2</label>
														<input value="<?php echo $homepage[0]->home_subtitle2 ?>" id="home_subtitle2" name="home_subtitle2" placeholder="Subtitle 2" type="text" class="validate">
														<label for="home_title3">Title 3</label>
														<input value="<?php echo $homepage[0]->home_title3 ?>" id="home_title3" name="home_title3" placeholder="Reviews Description" type="text" class="validate">
														<label for="home_subtitle3">Subtitle 3</label>
														<input value="<?php echo $homepage[0]->home_subtitle3 ?>" id="home_subtitle3" name="home_subtitle3" placeholder="Reviews Description" type="text" class="validate">
													</div>


												</div>

												<div class="row">

													<div class="col s12">
														<h5 for="home_reviews_desc">Reviews</h5>
														<label for="home_reviews_desc">Discription</label>
														<input id="home_reviews_desc" name="home_reviews_desc" value="<?php echo $homepage[0]->home_reviews_desc ?>" placeholder="Reviews Description" type="text" class="validate">
													</div>


												</div>


												<!-- gallay image -->
												<div class="row ">
													<h5 for="un_logo_file"> Logo Brand</h5>
													<div class="file-field input-field">
														<div style="margin-left: 8px;" class="tz-up-btn"> <span> Logo</span>
															<input type="file" name="un_logo_file[]" id="upload-2" multiple>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col col-md-12">
														<?php
														foreach ($gallary_media as $gallary) {
															$mediapath = base_url('upload/preview/') . $gallary->file_name;
														?>
															<div class="col col-md-3" id="icenses_<?php echo $gallary->id ?>">

																<div>
																	<img style="height:100px;width:100%;" src="<?php echo $mediapath; ?>" />
																	<i onclick="deletegallery('<?php echo $gallary->id; ?>')" style="pointer:curse;color:red">Delete</i>
																</div>


															</div>
														<?php
														}
														?>
													</div>
												</div>


												<input type="hidden" name="all_docs" id="all_docs" value="" />
												<input type="hidden" name="all_docs1" id="all_docs1" value="" />
												<a class="control-button btn btn-link" style="display: none" href="javascript:$.fileup('upload-2', 'upload', '*')">Upload all</a>
												<a class="control-button btn btn-link" style="display: none" href="javascript:$.fileup('upload-2', 'remove', '*')">Remove all</a>
												<div style="margin-top: 15px;" id="upload-2-queue" class="queue"></div>

												<!-- gallay end image -->
												<!-- university  image -->
												<div class="row">
												<div class="col s4">
													<h5 for="un_logo_file">Education Background Image</h5>
													<div class="file-field input-field">
														<div style="margin-left: 8px;" class="tz-up-btn"> <span>Image</span>
															<input type="file" id="imgInp" name="un_bg_img" value="upload">
														</div>
														<div class="input-field col s6">
														<img style="width: 149px;" src="upload/<?php echo $homepage[0]->un_bg_img ?>" id="blah" class="setwidthhight" onerror="this.src='upload/user_placeholder.png'">
													</div>
													</div>
												</div>
												<div class="col s4">
													<h5 for="un_logo_file">Tourism  Background Image</h5>
													<div class="file-field input-field">
														<div style="margin-left: 8px;" class="tz-up-btn"> <span>Image</span>
															<input type="file" id="photo" name="tur_bg_img" value="upload">
														</div>
														<div class="input-field col s6">
														<img style="width: 149px;" src="upload/<?php echo $homepage[0]->tur_bg_img ?>" id="imgPreview" class="setwidthhight" onerror="this.src='upload/user_placeholder.png'">
													</div>
													</div>
												</div>
												<div class="col s4">
													<h5 for="un_logo_file">Accomodation Background Image</h5>
													<div class="file-field input-field">
														<div style="margin-left: 8px;" class="tz-up-btn"> <span>Image</span>
															<input type="file"  id="photo1" name="acc_bg_img" value="upload">
														</div>
														<div class="input-field col s6">
														<img style="width: 149px;" src="upload/<?php echo $homepage[0]->acc_bg_img ?>" id="imgPreview1" class="setwidthhight" onerror="this.src='upload/user_placeholder.png'">
													</div>
													</div>
												</div>
												</div>
												<!-- Enduniversity  image -->
						
												<div class="row">


													<h4 for="home_country_desc">Footer Section:</h4>



													<div class="row">

														<div class="input-field col s6">
															<input type="file" id="imgInp" name="logo_img" value="upload">
														</div>

														<div class="input-field col s6">
															<img style="width: 149px;" src="upload/<?php echo $homepage[0]->logo_img ?>" id="blah" class="setwidthhight" onerror="this.src='upload/user_placeholder.png'">
														</div>

													</div>



													<label for="home_footer_desc">Discription</label>
													<input id="home_footer_desc" name="home_footer_desc" placeholder="Footer Description" type="text" value="<?php echo $homepage[0]->home_footer_desc ?>" class="validate">
													<label for="home_email">Email</label>
													<input id="home_email" value="<?php echo $homepage[0]->home_email ?>" name="home_email" placeholder="Email" type="text" class="validate">

													<label for="home_address">Address</label>
													<input id="home_address" value="<?php echo $homepage[0]->home_address ?>" name="home_address" placeholder="Address Description" type="text" class="validate">
													<label for="home_phone">Phone</label>
													<input id="home_phone" value="<?php echo $homepage[0]->home_phone ?>" name="home_phone" placeholder="Phone" type="text" class="validate">

													<label for="home_fb_url">Facbook Url</label>
													<input id="home_fb_url" value="<?php echo $homepage[0]->home_fb_url ?>" name="home_fb_url" placeholder="Facbook Url" type="text" class="validate">
													<label for="home_insta_url">Instagram Url</label>
													<input id="home_insta_url" value="<?php echo $homepage[0]->home_insta_url ?>" name="home_insta_url" placeholder="Instagram Url" type="text" class="validate">
													<label for="home_twitter_url">Twitter Url</label>
													<input id="home_twitter_url" value="<?php echo $homepage[0]->home_twitter_url ?>" name="home_twitter_url" placeholder="Twitter Url" type="text" class="validate">



												</div>



												<!-- gallay end image -->

												<div class="row">
													<div class="input-field col s12">
														<button type="submit" name="Public" value="Public" class="waves-effect waves-light btn-large "> Submit</button>

													</div>
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
</div>

<?php
include 'footer.php';
?>

<script type="text/javascript">
	function deletegallery(id) {
		$.ajax({
			url: "<?php echo site_url('deletegallary') ?>",
			method: "POST",
			data: {
				id: id
			},
			beforeSend: function() {

			},
			success: function(data) {
				$('#icenses_' + id).css('display', 'none');
			}
		});
	}
</script>
<script>
$(document).ready(()=>{
      $('#photo').change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
          //  console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });

	$(document).ready(()=>{
      $('#photo1').change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
          //  console.log(event.target.result);
            $('#imgPreview1').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });
</script>