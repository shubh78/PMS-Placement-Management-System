
<!DOCTYPE HTML>
<html>
<head>
<title>Placement Management System
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Upturn Smart Online Exam System" />

</head> 
<body>
<div class="page-container">
   <!--/content-inner-->
<div class="left-content">
<div class="mother-grid-inner">
<?php 
session_start();

if($_SESSION["userid"]==true)
{

 include("connect.php");
include("header.php"); 
 $sql="select * from studenttbl where verified=1";
$result = mysql_query($sql);
?>
<div class="agile-grids">
<div class="agile-tables">
<ol class="breadcrumb">
	             <li class="breadcrumb-item text-white" ><h4 ><a href = "addpass.php" " class=" btn btn-primary hvr-icon-float-away col-9">Add Student </a></h4></li>
               
            </ol>
<div class="w3l-table-info">
<h2>Student Login Details</h2>
<table width="100%" id="table">
<thead>
<tr>
               <th align="left">Id</th>
               <th align="left">Enrollment</th>
			   <th align="left">First Name</th>
			   <th align="left">Last Name</th>
         <th align="left">Email</th>
               <th align="left">Branch.</th>
			   <th align="left">Password</th>
			   <th align="left">File</th>
               <th align="left">&nbsp;</th>
                <th align="left">Block</th>
                <th align="left">delete</th>			    
</tr>
</thead>
<tbody>
<?php 
$count=1;
while($rows=mysql_fetch_array($result))
{
	extract($rows);
	?>

    <tr>
    <td height="81"><?php echo $count;?></td>
     <td><?php echo $rows['s_roll'];?></td>
    <td><?php echo $rows['fname'];?></td>
	<td><?php echo $rows['lname'];?> </td>
    <td><?php echo $rows['email'];?></td>
	<td><?php echo $rows['branch'];?></td>
  <td>
<i class="fa fa-eye fa-1x" aria-hidden="true" onclick="document.getElementById(<?php echo $count;?>).type='text'"></i>
<i class="fa fa-eye-slash fa-x" onclick="document.getElementById(<?php echo $count;?>).type='password'"></i>
<input type="Password"  id="<?php echo $count;?>" value="<?php echo $rows['password'];?>" style="width:100px" readonly>

</td>
	<td><?php echo($rows['file']!=NULL)?'<img src="uploaded/'.$rows['file'].'" width="50" height="50">' :'' ;?></td>
	<td align="left">&nbsp;</td>

	  <?php
	$status=$rows['block'];
$status=$rows['block'];
if(($block)=='1')
{
?>

<form method='post' action='studentblock.php'>
    <td>   <input  type='hidden' value="<?php echo $rows['s_roll']; ?>" name='id'>
        <button class="btn bg-danger" name='allow'  type='submit' value='allow'><i class="fas fa-ban" style="font-size:20px;color:black;"></i></button>
       
      </td>  </form>
<?php
}
if(($block)=='0')
{
?>

<form method='post' action='studentblock.php'>
     <td>  <input  type='hidden' value="<?php echo $rows['s_roll']; ?>" name='id'>
        <button class="btn bg-success text-white " name='block' type='submit' value='block'  ><i class="fa fa-check-square-o" style="font-size:20px;color: green;"></i></button>
<?php
}
?>

       
       <form method='post' action='#'>
  <td>     <input  type='hidden' value="<?php echo $rows['s_roll']; ?>" name='id'>
        <button class="btn btn-dark text-white " name='delete' type='submit' value='delete'  ><i class="fas fa-trash-alt" style="font-size:20px;color: red;"></i></button>
      </td>  </form>     
    </tr>
<?php
$count++;
 }?>
</tbody>
</table>
</div>
</div>
</div>
<?php include("footer.php"); ?>
</div></div>

	<?php include("sidebar.php"); ?>
	<?php }
else
	header('location:login.php');
?>
	
	</div>
</body>

</html>