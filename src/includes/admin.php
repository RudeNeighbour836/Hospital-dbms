<?php 
function users()
{
	require("connect.php");
	$sql = "SELECT * FROM `users`";
	$query = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($query)) {
		echo "<tr height=30px'>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['type']."</td>";
		echo "<td><center><a href='edituser.php?name=".$row['username']."'><img src='../assets/img/glyphicons-151-edit.png' height='16px' width='17px'></a></center></td>";
		echo "<td><center><a href='deleteuser.php?name=".$row['username']."'><img src='../assets/img/glyphicons-17-bin.png' height='16px' width='12px'></a></center></td>";
	
		echo "</tr>";
	}
}


function adduser()
{
	require("connect.php");
	$username = trim(htmlspecialchars($_POST['username']));
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$type = trim(htmlspecialchars($_POST['type']));
	$password = trim(htmlspecialchars($_POST['password']));
	$pass = sha1($password);

	$sql1 = "SELECT * FROM `users` WHERE `username`='$username'";
	$query1 = mysqli_query($conn, $sql1);
	if (mysqli_num_rows($query1)==0) {
		$sql = "INSERT INTO `users` VALUES ('$username','$pass','$fname','$sname','$type')";
		$query = mysqli_query($conn, $sql);
		if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>User is Succesifully Added</b>";
		}
	}
	else{
		echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Choose Unique Name</b>";
	}

	
}


function updateuser()
{
	require("connect.php");
	//$username = trim(htmlspecialchars($_POST['username']));
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$type = trim(htmlspecialchars($_POST['type']));
	$password = trim(htmlspecialchars($_POST['password']));
	$pass = sha1($password);


	$name = $_GET['name'];
	
		$sql = "UPDATE `users` SET `fname`='$fname',`sname`='$sname',`type`='$type',`password`='$pass' WHERE `username`='$name'";
		$query = mysqli_query($conn, $sql);
		if (!empty($query)) {
			echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>User is Succesifully Updated</b>";

		}	
}

function settings()
{
	//$username = trim(htmlspecialchars($_POST['username']));
	$fname = trim(htmlspecialchars($_POST['fname']));
	$sname = trim(htmlspecialchars($_POST['sname']));
	$password2 = trim(htmlspecialchars($_POST['password2']));
	$password = trim(htmlspecialchars($_POST['password']));
	if ($password != $password) {
		echo "<br><b style='color:red;font-size:14px;font-family:Arial;'>Password Must Match</b>";
	}
	else{
		$pass = sha1($password);
		$name = $_SESSION['admin'];
		$type = $_SESSION['type'];
			
				$sql = "UPDATE `users` SET `fname`='$fname',`sname`='$sname',`password`='$pass' WHERE `username`='$name' AND `type`='$type'";
				$query = mysqli_query($conn, $sql);
				if (!empty($query)) {
					echo "<br><b style='color:#008080;font-size:14px;font-family:Arial;'>Succesifully Updated</b>";

				}	
		}
	}
	
?>