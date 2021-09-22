<?php include "inc/header.php";
include '../Classes/LoginClass.php';
$show = new LoginClass();
$dl = new LoginClass();
if(isset($_GET['delUserid'])){
	$delUser = $_GET['delUserid'];
	$delteUser = $dl->delUser($delUser);
	if ($delteUser) {
		echo "<script> window.location='show_user.php';</script>";
	 
	}
}
?>
<div class="span9" style="padding: 30px; float:left;">
		<div class="content">
			<div class="module">
				<div class="module-head text-center">
					<h3>User List</h3>
				</div>
				<?php 
					if(isset($delteUser)){
						echo $delteUser;
					}
				?>
					<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
						<thead>
							<tr>
                                <th>NO.</th>
								<th>Name</th>
								<th>User Name</th>
								<th>Phone No</th>
								<th>Address</th>
								<th>Area</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                                $i = 0;
								$showUser = $show->ShowCustomerlist();
								foreach($showUser as $value){
							?>
							<tr class="odd gradeX">
                                <td><?php echo $i+= 1;?></td>
								<td><?php echo $value['firstName']." ".$value['lastName'] ?></td>
								<td><?php echo $value['customer_username'];?></td>
								<td><?php echo $value['customer_phone'] ?></td>
								<td><?php echo $value['customer_address'];?></td>
								<td><?php echo $value['areaName'] ?></td>
								<?php if ($adminrole==0) {  ?>
										<td>
										<a href="edit_user.php?userid=<?php echo $value['customer_id']?>">Edit</a>
									||
								
										<a href="?delUserid=<?php echo $value['customer_id']; ?>">Delete</a> 
								</td><?php }else{ echo "<td style='color:red;'>Locked</td>"; } ?>	
							</tr>
							<?php } ?>

						</tbody>
					</table>
				</div>
			</div>

		<br />
			
		</div>
</div>
	
<?php include "inc/footer.php"?>