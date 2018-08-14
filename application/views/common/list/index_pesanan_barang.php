<table id="tblList" class="table table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<th>
				<div class="row">
					<div class="col-md-12" align="left">
						<div class="col-md-1">#.</div>
						<div class="col-md-5">Nama Produk</div>
						<div class="col-md-2">Harga Seunit (RM)</div>
						<div class="col-md-2">Bil. Pesanan</div>
						<div class="col-md-2">Harga (RM)</div>
					</div>
				</div>
			</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$count = 0;
	$total = 0;
	$diskaun = 0;
	
	if($info["pes_diskaun"]===null)
	{
		$diskaun = $info["pes_diskaun"];
	}
	
	foreach($list as $key => $val){
		$count++;
		$sel_qty = $val["peb_kuantiti"];
		$total += $val["peb_jumlah_harga"];
	?>
		<tr>
			<td>
				<div class="row pointer"  title="edit user">
					<div class="col-md-12" align="left">
						<div class="col-md-1"><?= $count ?></div>
						<div class="col-md-5"><?= $val["pro_nama"] ?></div>
						<div class="col-md-2"><input type="text" class="form-control" name="jual_<?= $val["pro_id"] ?>" id="jual_<?= $val["pro_id"] ?>"  value="<?= $val["pro_harga_jual"] ?>" readonly></div>
						<div class="col-md-2"><input type="number" class="form-control" name="bil_<?= $val["pro_id"] ?>" id="bil_<?= $val["pro_id"] ?>" value="<?= $sel_qty ?>" onchange="calcHarga(<?= $val["pro_id"] ?>); calcBaki()" <?php if($val["pro_kuantiti_stok"]==0){ echo "readonly"; }?> ></div>
						<div class="col-md-2"><input type="text" class="form-control" name="nilai_<?= $val["pro_id"] ?>" id="nilai_<?= $val["pro_id"] ?>"  value="<?= $val["peb_jumlah_harga"] ?>" readonly></div>
					</div>
				</div>
			</td>
			
		</tr>
	<?php } ?>	
	
		<tr>
			<td>
				<div class="row pointer"  title="edit user">
					<div class="col-md-12" align="left">
						<div class="col-md-8"><b>JUMLAH (RM)</b></div>
						<div class="col-md-2"></div>
						<div class="col-md-2"><input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $total ?>" readonly></div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="row pointer"  title="edit user">
					<div class="col-md-12" align="left">
						<div class="col-md-8"><b>DISKAUN (RM)</b></div>
						<div class="col-md-2"></div>
						<div class="col-md-2"><input type="text" class="form-control" name="diskaun" id="diskaun"  value="<?= $diskaun ?>" onchange="calcFinalJumlah(); calcBaki()" ></div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="row pointer"  title="edit user">
					<div class="col-md-12" align="left">
						<div class="col-md-8"><b>JUMLAH AKHIR (RM)</b></div>
						<div class="col-md-2"></div>
						<div class="col-md-2"><input type="text" class="form-control" name="jumlah_akhir" id="jumlah_akhir" value="<?= $info["pes_jumlah_akhir"] ?>" readonly></div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="row pointer"  title="edit user">
					<div class="col-md-12" align="left">
						<div class="col-md-8"><b>BAYARAN DITERIMA (RM)</b></div>
						<div class="col-md-2"></div>
						<div class="col-md-2"><input type="text" class="form-control" name="bayaran" id="bayaran"  value="<?= $info["pes_bayaran_diterima"] ?>" onchange="calcBaki()" ></div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="row pointer"  title="edit user">
					<div class="col-md-12" align="left">
						<div class="col-md-8"><b>BAKI (RM)</b></div>
						<div class="col-md-2"></div>
						<div class="col-md-2"><input type="text" class="form-control" name="baki" id="baki"  value="<?= ($info["pes_bayaran_diterima"] - $info["pes_jumlah_akhir"] ) ?>" readonly ></div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="row pointer"  title="edit user">
					<div class="col-md-12" align="left">
						<div class="col-md-8"><b>KAEDAH BAYARAN</b></div>
						<div class="col-md-4">
							<?= createSelect($senaraikaedahbayar , 'rkb_id', 'rkb_nama', $info["pes_id_kaedah_bayaran"] , 'kaedah_bayaran' , 'Pilih Kaedah Bayaran',  ''); ?>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</tbody>
	
</table>