
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
						<button type="button" class="btn btn-primary btn-labeled btn-labeled-right"  onclick="location.href='<?= base_url()?>index.php/stk/s10021'">Stok Baru &nbsp; <b> <small><i class="glyphicon glyphicon-plus"></i></small> </b></button>
					</div>
				</div>
			
				<div class="row">
					
					<div class="col-md-12" align="center" id="divIndexList">
						<table id="tblItem" class="table table-bordered table-hover" width="90%">
				    		<thead>
				    			<tr>
									<th>#.</th>
				    				<th>
										<div class="row">
											<div class="col-md-12" align="left">
												<div class="col-md-2">Tarikh Masuk</div>
												<div class="col-md-5">Nama Pembekal</div>
												<div class="col-md-2">Nilai</div>
												<div class="col-md-1">Papar Maklumat</div>
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
												<div class="col-md-2"><?= formatDate($val["stm_tarikh_masuk"],'d-m-Y') ?></div>
												<div class="col-md-5"><?= $val["pem_nama_syarikat"] ?></div>
												<div class="col-md-2"><?= number_format($val["stm_nilain_belian"]) ?></div>
												<div class="col-md-1"><i class="glyphicon glyphicon-edit" onclick="location.href='<?= base_url()?>index.php/stk/s10022/<?= encrypt($val["stm_id"]) ?>'"></i></div>
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
    $('#tblItem').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

