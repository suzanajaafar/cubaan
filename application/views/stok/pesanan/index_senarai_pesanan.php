
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
		<div class="row" >
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12" align="left" >
						<button type="button" class="btn btn-primary btn-labeled btn-labeled-right"  onclick="location.href='<?= base_url()?>index.php/stk/s10011'">Pesanan Baru &nbsp; <b> <small><i class="glyphicon glyphicon-plus"></i></small> </b></button>
					</div>
				</div>
			
				<div class="row">
					
					<div class="col-md-12" align="center" id="divIndexList">
						<table id="tblUser" class="table table-bordered table-hover" width="90%">
				    		<thead>
				    			<tr>
									<th>#.</th>
				    				<th>
										<div class="row">
											<div class="col-md-12" align="left">
												<div class="col-md-2">Tarikh Pesanan</div>
												<div class="col-md-4">Nama Pelanggan</div>
												<div class="col-md-2">Nilai Pesanan</div>
												<div class="col-md-2">Status</div>
												<div class="col-md-1">Kemaskini</div>
											</div>
										</div>
									</th>
				    			</tr>
				    		</thead>
				    		<tbody>
							<?php
							$count = 0;
							foreach($list as $key => $val){
								$count++;
							?>
								<tr>
									<td><div class="col-md-1"><?= $count ?></div></td>
									<td>
										<div class="row pointer"  title="edit user">
											<div class="col-md-12" align="left">
												
												<div class="col-md-2"><?= formatDate($val["pes_tarikh_pesanan"],'d-m-Y') ?></div>
												<div class="col-md-4"><?= $val["pel_nama"] ?></div>
												<div class="col-md-2">RM <?= number_format($val["pes_jumlah_akhir"],2) ?></div>
												<div class="col-md-2"><?= $val["rst_nama"] ?></div>
												<div class="col-md-1"><i class="glyphicon glyphicon-edit" onclick="location.href='<?= base_url()?>index.php/stk/s10012/<?= encrypt($val["pes_id"]) ?>'"></i></div>
											</div>
										</div>
									</td>
				    				
				    			</tr>
							<?php } ?>	
							</tbody>
				    		
				    	</table>
			    	</div>
		    	</div>
	    	</div>
	    </div>
	</div>
</div>

<script>

$(function () {
    $('#tblUser').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

