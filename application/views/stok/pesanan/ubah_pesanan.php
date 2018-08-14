

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
			<form id="frmEdit" name="frmEdit">
			<fieldset class="box box-info">
				<div class="box-body">
					<div class="row">
						
						<div class="col-md-12">
						
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class='input-group col-md-3'>No Rujukan:</label>
				
										<div class='input-group col-md-8'>
											<?= $info["pes_no_rujukan"] ?>
										</div>
									</div>
								</div>
							</div>
						
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class='input-group col-md-3'>Pelanggan</label>
				
										<div class='input-group col-md-8'>
											<?= createSelect($senaraipelanggan , 'pel_id', 'pel_nama', $info["pes_id_pelanggan"] , 'pelanggan' , 'Pilih Pelanggan',  'required'); ?>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class='input-group col-md-3'>Tarikh Pesanan</label>
				
										<div class='input-group date  col-md-3' id='dtPesanan'>
											<input type='text' name="tarikh_pesanan" id="tarikh_pesanan" class="form-control" value="<?= formatDate($info["pes_tarikh_pesanan"],'d-m-Y') ?>" required />
											<span class="input-group-addon bg-pink-400">
												<i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>						                	
											</span>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class='input-group col-md-3'>Tarikh Jangka Hantar</label>
				
										<div class='input-group date  col-md-3' id='dtJangkaHantar'>
											<input type='text' name="tarikh_jangka_hantar" id="tarikh_jangka_hantar" class="form-control" value="<?= formatDate($info["pes_tarikh_jangka_hantar"],'d-m-Y') ?>" required />
											<span class="input-group-addon bg-pink-400">
												<i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>						                	
											</span>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class='input-group col-md-3'>Tempat Hantar</label>
				
										<div class='input-group  col-md-3' >
											<input type='text' name="tempat_hantar" id="tempat_hantar" class="form-control" value="<?= $info["pes_tempat_hantar"] ?>"  />
											
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class='input-group col-md-3'>Status</label>
				
										<div class='input-group col-md-3'>
											<?= createSelect($senaraistatus , 'rst_id', 'rst_nama', $info["pes_id_status"] , 'status' , 'Pilih Status',  'required'); ?>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class='input-group col-md-3'>Senarai Produk</label>
										<button type="button" class="btn btn-primary btn-labeled btn-labeled-right"  data-toggle="modal" data-target="#modal_barang" onclick="">Tambah Barang &nbsp; <b> <small><i class="glyphicon glyphicon-plus"></i></small> </b></button>
										<br>&nbsp;
										<div class='input-group col-md-9' id="divSenaraiBarang">
											
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
						<input type="hidden" name="ref_id" id="ref_id" value="<?= encrypt($info["pes_id"]) ?>">
						<button type="button" class="btn btn-primary btn-labeled btn-labeled-right" name="btnSubmit" id="btnSubmit"  onclick="">Kemaskini &nbsp; <b> <small><i class="glyphicon glyphicon-ok"></i></small> </b></button>
						<button type="button" class="btn btn-primary btn-labeled btn-labeled-right" name="btnBack" id="btnBack"  onclick="">Senarai Pesanan &nbsp; <b> <small><i class="glyphicon glyphicon-backward"></i></small> </b></button>
					</div>
				</div>
			</div>
			
			</form>	
		</div>
		
	</div>
	<!-- /.box -->

</section>
<!-- /.content -->

<div class="modal fade" role="dialog" id="modal_barang">
	<div class="modal-dialog modal-lg" style="max-height: 500px;" role="document">
		
		<div class="modal-content">
		<form name="frmBarang" id="frmBarang" class="">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Tambah Barang</h4>
			</div>
			<div class="modal-body">
				<table id="tblList" class="table table-bordered table-hover" width="90%">
					<thead>
						<tr>
							<th>
								<div class="row">
									<div class="col-md-12" align="left">
										<div class="col-md-1">#.</div>
										<div class="col-md-3">Nama Produk</div>
										<div class="col-md-2">Kuantiti Stok</div>
										<div class="col-md-2">Harga Seunit (RM)</div>
										<div class="col-md-2">Bil. Pesanan</div>
										<div class="col-md-2">Harga</div>
									</div>
								</div>
							</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$count = 0;
					$total = 0;
					foreach($produk as $key => $val){
						$count++;
						$sel_qty = 0;
					?>
						<tr>
							<td>
								<div class="row pointer"  title="edit user">
									<div class="col-md-12" align="left">
										<div class="col-md-1"><?= $count ?></div>
										<div class="col-md-3"><?= $val["pro_nama"] ?></div>
										<div class="col-md-2"><input type="text" class="form-control" name="stok2_<?= $val["pro_id"] ?>" id="stok2_<?= $val["pro_id"] ?>"  value="<?= $val["pro_kuantiti_stok"] ?>" readonly></div>
										<div class="col-md-2"><input type="text" class="form-control" name="jual2_<?= $val["pro_id"] ?>" id="jual2_<?= $val["pro_id"] ?>"  value="<?= $val["pro_harga_jual"] ?>" readonly></div>
										<div class="col-md-2"><input type="number" class="form-control" name="bil2_<?= $val["pro_id"] ?>" id="bil2_<?= $val["pro_id"] ?>" value="0" onchange="calcHarga2(<?= $val["pro_id"] ?>)" <?php if($val["pro_kuantiti_stok"]==0){ echo "readonly"; }?> ></div>
										<div class="col-md-2"><input type="text" class="form-control" name="nilai2_<?= $val["pro_id"] ?>" id="nilai2_<?= $val["pro_id"] ?>"  value="0" readonly></div>
									</div>
								</div>
							</td>
							
						</tr>
					<?php } ?>	
					
					</tbody>
					
				</table>			
						
			</div>
			<div class="modal-footer">
				<input type="hidden" name="ref_id" id="ref_id" value="<?= encrypt($info["pes_id"]) ?>">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="btnClose" name="btnClose" >Tutup</button>
				<button class="btn btn-primary" type="button" name="btnSaveBarang" id="btnSaveBarang" onclick="" >Simpan</button>
			</div>
		</form>
		</div>
		
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script>

$(document).ready(function(){
	
	loadPesananBarang();
	
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
				$('#dtPesanan').data("DatePicker").minDate(e.date);
				$('#frmEdit').bootstrapValidator('revalidateField', 'tarikh_pesanan');
			});
			
	$('#dtJangkaHantar')
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
				$('#dtJangkaHantar').data("DatePicker").minDate(e.date);
				$('#frmEdit').bootstrapValidator('revalidateField', 'tarikh_jangka_hantar');
			});
	
	
});	

$("#btnSubmit").click(function()
{
	 $('#frmEdit').bootstrapValidator('validate');
		if($('#frmEdit').has('.has-error').length===0){
			
			$('#modal_submit').modal('show');
						
		    var form_data = new FormData($("#frmEdit")[0]);     
			
		    $.ajax({
		                url: baseUrl+"index.php/stk/updatepesanan",
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
								swal('Berjaya!','Kemaskini berjaya','success');
								loadPesananBarang();
								//location.href = "<?= base_url() ?>index.php/stk/s10012/"+jsondata.id;
							}
							else
							{
								swal('Perhatian!','Pesanan tidak berjaya dikemaskini','error');
							}
		                }
		     });
		}
});
 
$("#btnSaveBarang").click(function()
{
	 $('#frmBarang').bootstrapValidator('validate');
		if($('#frmBarang').has('.has-error').length===0){
			
			$('#modal_submit').modal('show');
						
		    var form_data = new FormData($("#frmBarang")[0]);     
			
		    $.ajax({
		                url: baseUrl+"index.php/stk/updatepesananbarang",
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
					
							if(jsondata.updated>0)
							{
								swal('Berjaya!','Kemaskini berjaya','success');
								$('#modal_barang').modal('hide');
								loadPesananBarang();
							}
							else
							{
								swal('Perhatian!','Pesanan tidak berjaya dikemaskini','error');
							}
		                }
		     });
		}
});


$("#btnBack").click(function()
{
	 location.href='<?= base_url() ?>index.php/stk/s1001';
});

function calcHarga(col)
{
	col_stok = "#stok_"+col;
	col_harga_unit = "#jual_"+col;
	col_beli = "#bil_"+col;
	col_nilai = "#nilai_"+col;
	col_jumlah = "#jumlah";
	col_diskaun = "#diskaun";
	col_jumlah_akhir = "#jumlah_akhir";
	
	sum = 0;
	
	stok = $(col_stok).val();
	harga_unit = $(col_harga_unit).val();
	beli = $(col_beli).val();
	nilai = parseFloat(harga_unit)*parseFloat(beli);
	
	
	
	//alert(col_harga_unit+" | "+col_beli+" | "+col_nilai+" | "+col_stok+" | "+harga_unit+" | beli:"+beli+" | stok:"+stok+" | "+nilai);
	if(parseInt(stok)<parseInt(beli))
	{
		swal('Perhatian!','Bilangan Pesanan Melebihi Kuantiti Dalam Stok! Bilangan Pesanan tidak dibenarkan','error');
		$(col_beli).val(0);
	}
	else
	{
		$(col_nilai).val(nilai);
		calcFinalJumlah();
	
	}
	
	
}

function calcHarga2(col)
{
	col_stok = "#stok2_"+col;
	col_harga_unit = "#jual2_"+col;
	col_beli = "#bil2_"+col;
	col_nilai = "#nilai2_"+col;
	
	stok = $(col_stok).val();
	harga_unit = $(col_harga_unit).val();
	beli = $(col_beli).val();
	nilai = parseFloat(harga_unit)*parseFloat(beli);
	
	
	
	//alert(col_harga_unit+" | "+col_beli+" | "+col_nilai+" | "+col_stok+" | "+harga_unit+" | beli:"+beli+" | stok:"+stok+" | "+nilai);
	if(parseInt(stok)<parseInt(beli))
	{
		swal('Perhatian!','Bilangan Pesanan Melebihi Kuantiti Dalam Stok! Bilangan Pesanan tidak dibenarkan','error');
		$(col_beli).val(0);
	}
	else
	{
		$(col_nilai).val(nilai);
		
	}
	
	
}

function calcFinalJumlah()
{
	diskaun = $("#diskaun").val();
	jumlah_akhir = $("#jumlah_akhir").val();
	sum = 0;
	
	$('[id^=nilai_]').each(function() {
		if($(this).val()!="")
		 {
			sum += parseFloat($(this).val());
		 }
	});
	
	$("#jumlah").val(sum);
	jumlah_akhir = sum - parseFloat(diskaun);
	$("#jumlah_akhir").val(jumlah_akhir);
		
}

function calcBaki()
{
	jumlah_akhir = $("#jumlah_akhir").val();
	bayaran = $("#bayaran").val();
	
	baki = parseFloat(bayaran) - parseFloat(jumlah_akhir);
	$("#baki").val(baki);
}

function loadPesananBarang()
{
	
	url = "<?= base_url()?>index.php/common/refreshlist/pesananbarang/<?= encrypt($info["pes_id"]) ?>";
	$("#divSenaraiBarang").load(url);
}


</script>

