

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
								<div class="col-md-5">
									<div class="form-group has-feedback">
										<input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="Current Password" required>
										<span class="glyphicon glyphicon-lock form-control-feedback"></span>
									</div>
								</div>
							</div>
						  
							<div class="row">
								<div class="col-md-5">
									<div class="form-group has-feedback">
										<input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="New Password" required>
										<span class="glyphicon glyphicon-lock form-control-feedback"></span>
									</div>
								</div>
							</div>
						  
							<div class="row">
								<div class="col-md-5">
									<div class="form-group has-feedback">
										<input type="password" class="form-control" name="pwd3" id="pwd3" placeholder="Re-enter New Password" required>
										<span class="glyphicon glyphicon-lock form-control-feedback"></span>
									</div>
								</div>
							</div>
						  
							<div class="row">
								<div class="col-md-4">
									<input type="hidden" class="form-control" name="username" id="username" placeholder="Username" value="<?= $this->session->userdata("username") ?>" required>
									<button type="button" name="btnUbah" id="btnUbah" onclick="chgpwd()" class="btn btn-primary btn-block btn-flat">Change Password</button>
								</div>
							</div>
						
						</div>
						
					</div>
					
					
				</div>
			</fieldset>
			
			
			</form>	
		</div>
		
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->



<script>

$(document).ready(function(){


	
});	

function chgpwd()
{
	$('#frmUKL').bootstrapValidator('validate');

	if($('#frmUKL').has('.has-error').length===0)
	{
			
		//checking
		
		username = $("#username").val();
		pwd1 = $("#pwd1").val();
		pwd2 = $("#pwd2").val();
		pwd3 = $("#pwd3").val();

		if(pwd2 != pwd3)
		{
			swal("Alert!", "New Password and Re-enter Password is not match", "warning");
			$("#pwd3").val("");
		}
		else
		{
	
			$('#modal_submit').modal('show');
			
		    var form_data = new FormData($('#btnUbah').parents('form')[0]);     
		   
			
		    $.ajax({
		                url: baseUrl+"index.php/ahli/updatepwd",
		                //dataType: 'script',
		                cache: false,
		                contentType: false,
		                processData: false,
		                data: form_data,                         
		                type: 'post',
		                success: function(data){
		                    $('#modal_submit').modal('hide');
		                   
		                    //alert(data);
		                    jsondata = JSON.parse(data);

		                    if(jsondata.status==101)
		                    {
		                    	swal("Alert!", "Information is not matched", "warning");
			                }
		                    else if(jsondata.status==102)
		                    {
		                    	swal("Alert!", "Current Password entered is invalid", "warning");
		                    	$("#pwd1").val("");
			                }
		                    else
		                    {
		                    	swal({
									title: "Success", 
									text: "Password has been updated",
									  type: "success",
									  showCancelButton: false,
									  confirmButtonClass: "btn-success",
									  confirmButtonText: "Ok",
									  closeOnConfirm: true,
									  closeOnCancel: false
									},
									function(isConfirm) {
										window.location = baseUrl+"index.php/main";
									});
			                }
					
							
	
		                }
		     });
			
		}

	}

}

</script>

