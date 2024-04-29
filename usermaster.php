<?php include("include/top.php");?>
<?php
if((!isset($_SESSION['sessUserId'])))
{
	header('Location:login.php');
	exit();
}
include("classes/cls_users.php");
$objUser = new users(); 
$result = $objUser->displayusers();
$DataCount = count($result);

$uid = $_SESSION['sessUserId'];

?>
<body>

<!-- main body strats here -->
<div id="main_container">
	<!-- js and css for TableSorter Start here -->
    <link rel="stylesheet" href="themes/green/tablesorter.css" type="text/css" media="print, projection, screen" />
    
    <script type="text/javascript" src="js/jquery-latest.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter-2.0.3.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.filer.js"></script>
	<script type="text/javascript">
		
		
		function redirect()
		{
			window.location = "adduser.php";
		}

	</script>
    <!-- js and css for TableSorter Ends here -->
	<?php include("include/header.php");?>
	
	<!-- content starts here -->
	<div id="main_container">
        
		<!-- content column main text srats here -->
		<div id="content_column_main">
			
			<br><br>
			<div style="clear:both"></div>
		</div>
		<div id="content_column_main">
			<div style="text-align:center;"><h6>Users Mater</h6></div>    
		
			<br><br>
			<div style="clear:both"></div>
		</div>
		<br>
			<?php 
			if($DataCount == 0)
			{
				echo "<center style='color:red;margin-top:50px;'>No Records Found...</center>";
			}
			else
			{
			?>            
			<table width="100%" cellspacing="1" class="tablesorter">
				<thead>
					<tr>
						<th>Sr</th>
						<th>Profile Pic</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<!-- <th>Edit</th>					 -->
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Sr</th>
						<th>Profile Pic</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<!-- <th>Edit</th> -->
					</tr>
				</tfoot>
				<tbody>
					<?php
						$j = 0;
						$t = count($result);
						//print_r($result);
						foreach($result AS $Data)
						{
							$j++;
							$UserId	= stripslashes($Data['uid']);
							$ProfilePic	= $baseURL . "uploads/" .stripslashes($Data['profile_pic']) ;
							$Name	= stripslashes($Data['name']);
							$Email	= stripslashes($Data['email']);
							$Phone	= stripslashes($Data['mobile']);
							
							if (file_exists("uploads/" .stripslashes($Data['profile_pic']))) {
								$ProfilePic1 = $ProfilePic;
							} else {
								$ProfilePic1 = $baseURL . "uploads/default.png";
							}
							
							echo "<tr><td>".$j."</td>";
							echo "<td><img src='".$ProfilePic1 . "' style='width:60px;'></td>";
							echo "<td>".$Name."</td>";
							echo "<td>".$Email."</td>";
							echo "<td>".$Phone."</td>";
							echo "</tr>";
						}
						?>
			</tbody>
			</table>

			
			<?php
			}
			?>
			<br />
			<br />
			<br />
       
		</div>
		<!-- content column main text ends here -->
	
	</div>
	<!-- content ends here -->
    	
	<div style="clear:both"></div><br />

	<?php //include("include/footer.php");?>

	<div style="clear:both"></div>

</div>
<!-- main body ends here -->

</body>
</html>
