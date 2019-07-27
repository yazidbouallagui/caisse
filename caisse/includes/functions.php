<?php
function username_exist($username,$con)
{

	$row=mysqli_query($con,"SELECT id FROM commune WHERE username='$username'");
	{
		if (mysqli_num_rows($row)==1) {

			return true;
		}
		else {
			return false;
		}
	}
}

?>