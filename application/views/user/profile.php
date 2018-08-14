

<!-- Main content -->
<section class="content">

	<!-- SELECT2 EXAMPLE -->
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title"><?= $panel_title ?></h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool"
					data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<form id="frmQuest" name="frmQuest">
			<fieldset class="box box-info">
				<div class="box-body">
					<div class="row">
						
						<div class="col-md-12">
						
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>User Full Name:<span style="color:red;">*</span></label>
				
										<div class="input-group col-md-10">
											<input type="text" name="nama_penuh" id="nama_penuh" class="form-control" value="" required>
										</div>
									</div>
								</div>
							</div>
														
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email:<span style="color:red;">*</span></label>
				
										<div class="input-group col-md-10">
											<input type="text" name="email" id="email" class="form-control" value="" required>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Phone:<span style="color:red;">*</span></label>
				
										<div class="input-group col-md-3">
											<input type="text" name="email" id="email" class="form-control" value="" required>
										</div>
									</div>
								</div>
							</div>
														
						</div>
						
					</div>
					
					
				</div>
			</fieldset>
			
			
			<div class="box-footer">
				<div class="col-md-10">
					<div class="form-group">
						<button type="button" class="btn btn-primary btn-labeled btn-labeled-right"  onclick="updateProfile()">Update &nbsp; <b> <small><i class="glyphicon glyphicon-ok"></i></small> </b></button>
					</div>
				</div>
			</div>
			
			</form>	
		</div>
		
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->



<script>

$(document).ready(function(){


	
});	

function updateProfile()
{
	swal({
		  title: "Confirm?",
		  text: "Confirm to update profile?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-warning",
		  confirmButtonText: "Confirm!",
		  closeOnConfirm: false
		},
		function(){
			swal({
			  title: "Success!",
			  text: "Your profile has been updated",
			  type: "success",
			  showCancelButton: false,
			  confirmButtonClass: "btn-success",
			  confirmButtonText: "Ok!",
			  closeOnConfirm: true
			},
			function(){
				//location.href='<?= base_url() ?>index.php/quest/q1003';
			});
						  
		});
}


</script>

