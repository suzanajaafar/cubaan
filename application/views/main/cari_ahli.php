
<!-- Main content -->
<section class="content">

	<!-- SELECT2 EXAMPLE -->
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Carian Ahli</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool"
					data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="row">
			
				<form name="frmCari" id="frmCari">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="col-md-2">Nama</label>
		
								<div class="col-md-6 input-group">
									<div class="input-group-addon">
										<i class="fa fa-laptop"></i>
									</div>
									<input type="text" name="nama_penuh" id="nama_penuh" class="form-control" value="" >
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="col-md-2">Bidang Kepakaran</label>
		
								<div class="col-md-6 input-group">
									<div class="input-group-addon">
										<i class="fa fa-laptop"></i>
									</div>
									<?php echo $inputexpertarea; ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="col-md-2">Bidang Pekerjaan</label>
		
								<div class="col-md-6 input-group">
									<div class="input-group-addon">
										<i class="fa fa-laptop"></i>
									</div>
									<?php echo $inputjobarea; ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="col-md-2">Negeri Tempat Tinggal</label>
		
								<div class="col-md-6 input-group">
									<div class="input-group-addon">
										<i class="fa fa-laptop"></i>
									</div>
									<?php echo $inputstate; ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="col-md-2">Negeri Tempat Bekerja</label>
		
								<div class="col-md-6 input-group">
									<div class="input-group-addon">
										<i class="fa fa-laptop"></i>
									</div>
									<?php echo $inputstate_majikan; ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<div class="col-md-6 input-group">
									<input type='button' class="btn btn-success" name="btnSearch" id="btnSearch" onclick="cari()" value="Cari..">
								</div>
							</div>
						</div>
					</div>
					
				</div>
				</form>
			</div>
								
		</div>
	</div>
	
	<div id="divSenaraiAhli">
	
	</div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_profileahli">
	<div class="modal-dialog modal-lg" style="max-height: 500px;"
		role="document">
		<div class="modal-content">
			<form name="frm" id="frm">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Maklumat Ahli</h4>
				</div>
				<div class="modal-body">
					<div id="divProfileAhli"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose" name="btnCLose" id="btnClose">Tutup</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>


<script>
	function cari()
	{
		baseUrl = $("#baseUrl").val();
		

		$('#modal_submit').modal('show');
		
	    var form_data = new FormData($('#btnSearch').parents('form')[0]);     
	  
	    $.ajax({
	                url: baseUrl+"index.php/ahli/car1ahl1",
	                //dataType: 'script',
	                cache: false,
	                contentType: false,
	                processData: false,
	                data: form_data,                         
	                type: 'post',
	                success: function(data){
	                    $('#modal_submit').modal('hide');
	                   
	                    $("#divSenaraiAhli").html(data);
	                }
	     });
			
	}


	function openData(id)
	{
		baseUrl = $("#baseUrl").val();
		$("#divProfileAhli").load(baseUrl+"/index.php/ahli/sh0wpr0f1leext/u/"+id);

		$('#modal_profileahli').modal('show');
	}
</script>

