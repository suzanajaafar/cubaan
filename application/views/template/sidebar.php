<li class="header">MENU</li>

<li class="treeview">
	<a href="<?= base_url()?>index.php/main"> 
		<i class="fa fa-home"></i> <span>Home</span>
	</a>
</li>

<li class="treeview">
	<a href="#"> <i class="fa fa-share"></i> <span>User Info</span>
			<span class="pull-right-container"> <i
				class="fa fa-angle-left pull-right"></i>
			
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?= base_url()?>index.php/usr/u1001"><i class="fa fa-circle-o"></i>User Information</a></li>
		<li><a href="<?= base_url()?>index.php/usr/u1002"><i class="fa fa-circle-o"></i>Change Password</a></li>	
	</ul>
</li>

<li class="treeview">
	<a href="#"> <i class="fa fa-share"></i> <span>Leads Program</span>
			<span class="pull-right-container"> <i
				class="fa fa-angle-left pull-right"></i>
			
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?= base_url()?>index.php/lds/l101"><i class="fa fa-circle-o"></i>New Lead Program</a></li>
		<li><a href="<?= base_url()?>index.php/lds/l102"><i class="fa fa-circle-o"></i>List</a></li>	
	</ul>
</li>

<li class="treeview">
	<a href="#"> <i class="fa fa-share"></i> <span>Leads</span>
			<span class="pull-right-container"> <i
				class="fa fa-angle-left pull-right"></i>
			
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?= base_url()?>index.php/lds/l101"><i class="fa fa-circle-o"></i>New Lead</a></li>
		<li><a href="<?= base_url()?>index.php/lds/l102"><i class="fa fa-circle-o"></i>List</a></li>	
	</ul>
</li>

<li class="treeview">
	<a href="#"> <i class="fa fa-share"></i> <span>Opportunity</span>
			<span class="pull-right-container"> <i
				class="fa fa-angle-left pull-right"></i>
			
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?= base_url()?>index.php/opp/o101"><i class="fa fa-circle-o"></i>New Opportunity</a></li>
		<li><a href="<?= base_url()?>index.php/opp/o102"><i class="fa fa-circle-o"></i>List</a></li>	
	</ul>
</li>

<li class="treeview">
	<a href="#"> <i class="fa fa-share"></i> <span>Company</span>
			<span class="pull-right-container"> <i
				class="fa fa-angle-left pull-right"></i>
			
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?= base_url()?>index.php/opp/o101"><i class="fa fa-circle-o"></i>New Company</a></li>
		<li><a href="<?= base_url()?>index.php/opp/o102"><i class="fa fa-circle-o"></i>List</a></li>	
	</ul>
</li>

<li class="treeview">
	<a href="#"> <i class="fa fa-share"></i> <span>Sales Settings</span>
			<span class="pull-right-container"> <i
				class="fa fa-angle-left pull-right"></i>
			
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?= base_url()?>index.php/opp/o101"><i class="fa fa-circle-o"></i>Employee Quota</a></li>
		<li><a href="<?= base_url()?>index.php/opp/o102"><i class="fa fa-circle-o"></i>Projection</a></li>	
	</ul>
</li>



<?php 

 
if($this->session->userdata("user_level") == 1)
{
?>
<li class="treeview">
	<a href="#"> <i class="fa fa-share"></i> <span>Administrator</span>
			<span class="pull-right-container"> <i
				class="fa fa-angle-left pull-right"></i>
			
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="<?= base_url()?>index.php/adm/p1001"><i class="fa fa-circle-o"></i>Users</a></li>
		<li><a href="<?= base_url()?>index.php/adm/p1002"><i class="fa fa-circle-o"></i>System Settings</a></li>
		<li><a href="#"><i class="fa fa-share"></i>
			References
			<span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span> 
			</a>
			<ul class="treeview-menu">
				<li><a href="<?= base_url()?>index.php/adm/r1001" onclick=""><i class="fa fa-circle-o"></i>Industry Type</a></li>
				<li><a href="<?= base_url()?>index.php/adm/r1002" onclick=""><i class="fa fa-circle-o"></i>Country / State</a></li>
				<li><a href="<?= base_url()?>index.php/adm/r1003" onclick=""><i class="fa fa-circle-o"></i>Company Link Type</a></li>
				<li><a href="<?= base_url()?>index.php/adm/r1004" onclick=""><i class="fa fa-circle-o"></i>Customer Type</a></li>
				
				<li><a href="<?= base_url()?>index.php/adm/r1005" onclick=""><i class="fa fa-circle-o"></i>Cost Item</a></li>
				<li><a href="<?= base_url()?>index.php/adm/r1006" onclick=""><i class="fa fa-circle-o"></i>Cost Sub-item</a></li>
				<li><a href="<?= base_url()?>index.php/adm/r1007" onclick=""><i class="fa fa-circle-o"></i>Other Cost Item</a></li>
				
				<li><a href="<?= base_url()?>index.php/adm/r1008" onclick=""><i class="fa fa-circle-o"></i>Contact Roles</a></li>
				<li><a href="<?= base_url()?>index.php/adm/r1009" onclick=""><i class="fa fa-circle-o"></i>Contact Status</a></li>
				
				<li><a href="<?= base_url()?>index.php/adm/r1010" onclick=""><i class="fa fa-circle-o"></i>Source</a></li>
				
				<li><a href="<?= base_url()?>index.php/adm/r1011" onclick=""><i class="fa fa-circle-o"></i>Program Status</a></li>
				<li><a href="<?= base_url()?>index.php/adm/r1012" onclick=""><i class="fa fa-circle-o"></i>Program Type</a></li>
				
				<li><a href="<?= base_url()?>index.php/adm/r1013" onclick=""><i class="fa fa-circle-o"></i>Business Model</a></li>
			</ul>
		</li>
	</ul>
</li>

<?php 
}
?>

<li><a href="<?php echo base_url()."?logout" ?>" ><i class="fa fa-circle-o"></i>Logout</a></li>


