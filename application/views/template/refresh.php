
<?php if($item=="expertarea" && $action=="edit"){ ?>

	<table id="example2" class="table table-bordered table-hover" width="100%">
    		<thead>
    			<tr>
    				<th width="5%">No.</th>
    				<th>Bidang Kepakaran</th>
    				<th>Keterangan</th>
    				<th width="10%">Kemaskini/Padam</th>
    			</tr>
    		</thead>
    		<tbody>
    		<?php 
    		$count = 0;
    		foreach ($expert as $key => $val)
    		{
    		?>
    			<tr>
    				<td><?= ++$count; ?></td>
    				<td><?= $val["rea_desc"] ?></td>
    				<td><?= $val["uex_description"] ?></td>
    				<td>
    					<span class="fa fa-fw fa-book" title="Ubah" style="cursor: pointer" onclick=""></span>
    					<span class="fa fa-fw fa-trash-o" title="Padam Rekod" style="cursor: pointer" onclick="deleteItem('expert','<?= $val["uex_id"] ?>')"></span>			    				
    				</td>
    			</tr>
    		<?php 
    		}
    		
    		if($count==0)
    		{
    			echo "<tr><td colspan='4'>Tiada rekod Ditemui</td></tr>";
    		}
    		?>
    		</tbody>
    	</table>

<?php 
	}  
	else if($item=="expertarea" && $action=="view"){ 
?>

	<table id="example2" class="table table-bordered table-hover" width="100%">
    		<thead>
    			<tr>
    				<th width="5%">No.</th>
    				<th>Bidang Kepakaran</th>
    				<th>Keterangan</th>
    			</tr>
    		</thead>
    		<tbody>
    		<?php 
    		$count = 0;
    		foreach ($expert as $key => $val)
    		{
    		?>
    			<tr>
    				<td><?= ++$count; ?></td>
    				<td><?= $val["rea_desc"] ?></td>
    				<td><?= $val["uex_description"] ?></td>
    			</tr>
    		<?php 
    		}
    		if($count==0)
    		{
    			echo "<tr><td colspan='3'>Tiada rekod Ditemui</td></tr>";
    		}
    		?>
    		</tbody>
    	</table>

<?php } 
	else if($item=="attachment" && $action=="edit"){ 
?>

	<table id="example2" class="table table-bordered table-hover" width="100%">
    		<thead>
    			<tr>
    				<th width="5%">#.</th>
    				<th>Nama Fail</th>
    				<th>Papar / Padam</th>
    			</tr>
    		</thead>
    		<tbody>
    		<?php 
    		$count = 0;
    		foreach ($attachment as $key => $val)
    		{
    		?>
    			<tr>
    				<td><?= ++$count; ?></td>
    				<td><?= $val["uat_file_name"] ?></td>
    				<td>
    					<span class="fa fa-fw fa-book" title="Papar Lampiran" style="cursor: pointer" onclick="viewFile('<?= $val["uat_id"] ?>','<?= $val["uat_file_name"] ?>')"></span>
    					<span class="fa fa-fw fa-trash-o" title="Padam Rekod" style="cursor: pointer" onclick="deleteItem('attachment','<?= $val["uat_id"] ?>')"></span>			    				
    				</td>
    			</tr>
    		<?php 
    		}
    		if($count==0)
    		{
    			echo "<tr><td colspan='3'>Tiada rekod Ditemui</td></tr>";
    		}
    		?>
    		</tbody>
    	</table>

<?php 
	}
	else if($item=="attachment" && $action=="view"){
		?>

	<table id="example2" class="table table-bordered table-hover" width="100%">
    		<thead>
    			<tr>
    				<th width="5%">#.</th>
    				<th>Nama Fail</th>
    				<th width="10%">Papar</th>
    			</tr>
    		</thead>
    		<tbody>
    		<?php 
    		$count = 0;
    		foreach ($attachment as $key => $val)
    		{
    		?>
    			<tr>
    				<td><?= ++$count; ?></td>
    				<td><?= $val["uat_file_name"] ?></td>
    				<td>
    					<span class="fa fa-fw fa-book" title="Papar Lampiran" style="cursor: pointer" onclick="viewFile('<?= $val["uat_id"] ?>','<?= $val["uat_file_name"] ?>')"></span>		    				
    				</td>
    			</tr>
    		<?php 
    		}
    		if($count==0)
    		{
    			echo "<tr><td colspan='3'>Tiada rekod Ditemui</td></tr>";
    		}
    		?>
    		</tbody>
    	</table>

<?php 
	}
?>