
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
						<li class="active-bre"><a href="#"> All Category</a> </li>
					
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>All Category</h4> 

					 <div class="container box">  
					           <h3 align="center"></h3><br /> 

				        <table id="cattable" class="display" cellspacing="0" width="100%">
				            <thead>
				                <tr>
				                    <th>No</th>
				                    <th>Parent Category</th>
				                    <th>Sub Category</th>
				                    <th>status</th>
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
