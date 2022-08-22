
	
<?php
include('header.php');
?>
	
   <style>  
           body  
           {  
                margin:0;  
                padding:0;  
                background-color:#f1f1f1;  
           }  
           .box  
           {  
                width:1100px;  
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;  
           }  
      </style>  	<!--== BODY CONTNAINER ==-->
	<div class="container-fluid sb2">
		<div class="row">
			
			<!--== BODY INNER CONTAINER ==-->
			<div class="sb2-2">
				<!--== breadcrumbs ==-->
				<div class="sb2-2-2">
					<ul>
						<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
						<li class="active-bre"><a href="#"> All Country & City</a> </li>
						<li class="page-back"><a href="admin.html"><i class="fa fa-backward" aria-hidden="true"></i> Back</a> </li>
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>All State List</h4> 

					 <div class="container box">  
					           <h3 align="center"></h3><br /> 
  <a href="Addstate" style="float: right;"> <button type="button" class="btn btn-primary">Add state</button></a>
				        <table width="100%" id="table_id">
				            <thead>
				                <tr>
				                    <th>No</th>
				                    <th>Country</th>
				                    <th>State</th>
				                    <th>Status</th>
				                    <th>Action</th>
				                   
				                </tr>
				            </thead>
				          
				            	<?php
                       $i=1;
                        foreach ($datalist as $key => $value) {
                        ?><tr>
                                    <th><?php echo $i;?></th>
                            <th><?php echo $value->country_name;?></th>
                            <th><?php echo $value->state_name;?></th>
                            <th><button type="button" name="delete" class="btn btn-primary btn-xs">Status</button></th>
                            <th><a type="button"  href="#" ><button type="button" class="btn btn-primary">Edit</button></a> <button type="button" name="delete" class="btn btn-primary btn-xs deletestetuscountry">Delete</button></th>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
				           
				 
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
<script type="text/javascript">
	
	$(document).ready( function () {
    $('#table_id').DataTable();
} );

</script>