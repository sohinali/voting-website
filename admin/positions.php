<?php
	session_start();
	require('../connection.php');
	//If your session isn't valid, it returns you to the login screen for protection
	if( empty($_SESSION['admin_id']) ){
	   header("location:access-denied.php");
	}
	//retrive positions from the tbpositions table
$result = mysqli_query($mysqli, "SELECT * FROM tbPositions");
	if (mysqli_num_rows($result)<1){
	    $result = null;
	}
	?>
	<?php
	// inserting sql query
	if (isset($_POST['Submit']))
	{

	$newPosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

	$sql = mysqli_query($mysqli, "INSERT INTO tbPositions(position_name) VALUES ('$newPosition')");


	// redirect back to positions
	   header("Location: positions.php");
	}
?>
<?php
	// deleting sql query
	// check if the 'id' variable is set in URL
	 if (isset($_GET['id']))
	 {
	 // get id value
	 $id = $_GET['id'];
	 
	 // delete the entry
	 $result = mysqli_query($mysqli, "DELETE FROM tbPositions WHERE position_id='$id'");

	 // redirect back to positions
	 header("Location: positions.php");
	 }
	 else
	 // do nothing
    
?>


<!DOCTYPE html>

<html>
<head>
<title>voting website</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<script language="JavaScript" src="js/user.js">
</script>

</head>
<body id="top">


<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    
    <div id="logo" class="fl_left">
      <h1><a href="index.php">VOTING WEBSITE</a></h1>
    </div>
    
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="positions.php">Home</a></li>
        <li><a class="drop" href="#">Admin Panel Pages</a>
          <ul>
            <li><a href="positions.php">Manage Positions</a></li>
            <li><a href="candidates.php">Manage Candidates</a></li>
            <li><a href="refresh.php">Results</a></li>
          </ul>
        </li>
        
        <li><a href="http://localhost/online_voting/index.php">Voter Panel</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
    </nav>
   
  </header>
</div>

<div >
	<table width="380" align="center">
	<CAPTION><h3 style="color:white;">ADD NEW POSITION</h3></CAPTION>
	<form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)">
	<tr>
	    <td bgcolor="green" style="color:white;">Position Name</td>
	    <td bgcolor="#808080"><input type="text" name="position" /></td>
	    <td bgcolor="#00FF00" style="color:black;"><input type="submit" name="Submit" value="Add" /></td>
	</tr>
	</table>

	<table border="0" width="420" align="center" style="color:black;">
		<CAPTION><h3  style="color:white;">AVAILABLE POSITIONS</h3></CAPTION>
		<tr>
		<th style="background-color:black; color: white;">Position ID</th>
		<th style="background-color:black; color: white;">Position Name</th>
		</tr>

		<?php
			//loop through all table rows
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

			echo "<tr>";
			echo "<td>" . $row['position_id']."</td>";
			echo "<td>" . $row['position_name']."</td>";
			echo '<td><a href="positions.php?id=' . $row['position_id'] . '">Delete Position</a></td>';
			echo "</tr>";
			}
			mysqli_free_result($result);
		
		?>

	</table>
	<hr>
</div>

<div class="wrapper row4" style="background-color:grey; color: black;">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 class="title" style="color: black;">Address</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
         
          <p>
          Name        : Sohin Ali <br>
          University  : career point university<br>
          Batch       : 2022-2024 <br>
          Dept        : Computer application <br>
          </p>
          </address>
        </li>
      </ul>
    </div>

    <div class="one_third">
      <h6 class="title" style="color: black;">Phone</h6>
      <ul class="nospace linklist contact">
       
        <li><i class="fa fa-phone"></i> +917728868387<br>
        </li>


      </ul>
    </div>

    <div class="one_third">
      <h6 class="title" style="color: black;">Email</h6>
      <ul class="nospace linklist contact">
        
        <li><i class="fa fa-envelope-o"></i> sohinali786@gmail.com </li>

      </ul>
    </div>


    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2023- All Rights Reserved - <a href="#">Sohin Ali</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>





