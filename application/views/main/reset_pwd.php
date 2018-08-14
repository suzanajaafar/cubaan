
<div class="login-box">
  <div class="register-logo">
    <a href="#"><b>Ethoshunt</b></a>
  </div>
 
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Password</p>

  

    <form action="#" name="frmUKL" id="frmUKL" method="post">
      
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pwd2" id="pwd2" placeholder="New Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pwd3" id="pwd3" placeholder="Re-enter New Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-6" align=''>
          <button type="button" name="btnUbah" id="btnUbah" onclick="chgpwd()" class="btn btn-primary btn-block btn-flat">Set Password</button>
          <a href="<?php echo base_url(); ?>">Login Page</a><br>
        </div>
        <!-- /.col -->
      </div>
    </form>

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<script>

function chgpwd()
{
	$('#frmUKL').bootstrapValidator('validate');

	if($('#frmUKL').has('.has-error').length===0)
	{
			
		//checking
		
		username = $("#username").val();
		pwd2 = $("#pwd2").val();
		pwd3 = $("#pwd3").val();

		if(pwd2 != pwd3)
		{
			swal("Alert!", "New Password and Re-entered password is not matched", "warning");
			$("#pwd3").val("");
		}
		else
		{
	
			$('#modal_submit').modal('show');
			
		    var form_data = new FormData($('#btnUbah').parents('form')[0]);     
		   
			
		    $.ajax({
		                url: "<?php echo base_url() ?>index.php/ahli/resetpwd",
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
		                    	swal("Alert!", "Username and email is not matched in the system", "warning");
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
										window.location = "<?php echo base_url() ?>";
									});
			                }
					
								
		                }
		     });
			
		}

	}

	
}

</script>