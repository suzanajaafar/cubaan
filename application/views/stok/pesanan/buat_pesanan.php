

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
			<form id="frmBaru" name="frmBaru">
			<fieldset class="box box-info">
				<div class="box-body">
					<div class="row">
						
						<div class="col-md-12">
						
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class='input-group col-md-3'>Pelanggan</label>
				
										<div class='input-group col-md-8'>
											<?= createSelect($senaraipelanggan , 'pel_id', 'pel_nama', 0 , 'pelanggan' , 'Pilih Pelanggan',  'required'); ?>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class='input-group col-md-3'>Tarikh Pesanan</label>
				
										<div class='input-group date  col-md-3' id='dtPesanan'>
											<input type='text' name="tarikh_pesanan" id="tarikh_pesanan" class="form-control" value="<?= date("d-m-Y") ?>" required />
											<span class="input-group-addon bg-pink-400">
												<i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>						                	
											</span>
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
						<button type="button" class="btn btn-primary btn-labeled btn-labeled-right" name="btnSubmit" id="btnSubmit"  onclick="">Next &nbsp; <b> <small><i class="glyphicon glyphicon-chevron-right"></i></small> </b></button>
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
	$('#dtPesanan')
		.datepicker({
				 format: 'dd-mm-yyyy',
				 autoclose:true,
				//format: 'YYYY',
				 widgetPositioning:{
						horizontal: 'auto',
						vertical: 'bottom'
					}
			}).on('change', function(e) {
				// Revalidate the date field
				//alert('date1');
				//$('#tempohmula').data("DatePicker").minDate(e.date);
				$('#frmbaru').bootstrapValidator('revalidateField', 'tarikh_pesanan');
			});
	
	
});	

$("#btnSubmit").click(function()
{
	 $('#frmBaru').bootstrapValidator('validate');
		if($('#frmBaru').has('.has-error').length===0){
			
			$('#modal_submit').modal('show');
						
		    var form_data = new FormData($("#frmBaru")[0]);     
			
		    $.ajax({
		                url: baseUrl+"index.php/stk/storepesanan",
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
					
							if(jsondata.id>0)
							{
								location.href = "<?= base_url() ?>index.php/stk/s10012/"+jsondata.id;
							}
							else
							{
								swal('Perhatian!','Pesanan tidak berjaya didaftarkan','error');
							}
		                }
		     });
		}
});


$("#btnCancel").click(function()
{
	 location.href='<?= base_url() ?>index.php/stk/s1001';
});


</script>

