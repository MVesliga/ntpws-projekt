<?php   

    function pickerDateToMysql($pickerDate){
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $pickerDate);
        return $date->format('d. m. Y H:i:s');
    }  

	
	# Update user profile
	if (isset($_POST['edit']) && $_POST['_action_'] == 'TRUE') {
		$query  = "UPDATE users SET firstname='" . $_POST['firstname'] . "', lastname='" . $_POST['lastname'] . "', email='" . $_POST['email'] . "', username='" . $_POST['username'] . "', country='" . $_POST['country'] . "', archive='" . $_POST['archive'] . "', userType='" . $_POST['userType'] . "'";
        $query .= " WHERE id=" . (int)$_POST['edit'];
        $query .= " LIMIT 1";
        $result = @mysqli_query($connection, $query);
		
		$_SESSION['message'] = '<br><p class="alert alert-success">You successfully changed user profile!</p>';
		
		# Redirect
        echo("<script>location.href = 'index.php?menu=8&action=1;</script>");
	}
	# End update user profile
	
	# Delete user profile
	if (isset($_GET['delete']) && $_GET['delete'] != '') {
	
		$query  = "DELETE FROM users";
		$query .= " WHERE id=".(int)$_GET['delete'];
		$query .= " LIMIT 1";
		$result = @mysqli_query($connection, $query);

		$_SESSION['message'] = '<br><p class="alert alert-success">You successfully deleted user profile!</p>';
		
		# Redirect
        echo("<script>location.href = 'index.php?menu=8&action=1;</script>");
	}
	# End delete user profile
	
	
	#Show user info
	if (isset($_GET['id']) && $_GET['id'] != '') {
		$query  = "SELECT * FROM users";
		$query .= " WHERE id=".$_GET['id'];
		$result = @mysqli_query($connection, $query);
		$row = @mysqli_fetch_array($result);
		print '
		<h2>User profile</h2>
		<p><b>First name:</b> ' . $row['firstname'] . '</p>
		<p><b>Last name:</b> ' . $row['lastname'] . '</p>
		<p><b>Username:</b> ' . $row['username'] . '</p>';
		$_query  = "SELECT * FROM countries";
		$_query .= " WHERE country_code='" . $row['country'] . "'";
		$_result = @mysqli_query($connection, $_query);
		$_row = @mysqli_fetch_array($_result);
		print '
		<p><b>Country:</b> ' .$_row['country_name'] . '</p>
		<p><b>Date:</b> ' . pickerDateToMysql($row['date']) . '</p>
		<hr>
		<p><a class="btn btn-secondary" href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
	}
	#Edit user profile
	else if (isset($_GET['edit']) && $_GET['edit'] != '') {
		$query  = "SELECT * FROM users";
		$query .= " WHERE id=".$_GET['edit'];
		$result = @mysqli_query($connection, $query);
		$row = @mysqli_fetch_array($result);
		$checked_archive = false;
		
		print '
		<h2>Edit user profile</h2>
        <form style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding: 5%; border-radius: 10px;" action="" id="registration_form" name="registration_form" method=POST>
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			<input type="hidden" id="edit" name="edit" value="' . $_GET['edit'] . '">
			
            <div class="form-group">
                <label for="firstName">First Name*</label>
                <input type="text" class="form-control" id="fname" name="firstname" value="' . $row['firstname'] . '" placeholder="Your name.." required>
            </div>

            <div class="form-group">
                <label for="lname">Last Name *</label>
                <input type="text" class="form-control" id="lname" name="lastname" value="' . $row['lastname'] . '" placeholder="Your last natme.." required>
            </div>

			<div class="form-group">
                <label for="email">Your E-mail *</label>
                <input type="email" class="form-control" id="email" name="email"  value="' . $row['email'] . '" placeholder="Your e-mail.." required>
            </div>
				
			<div class="form-group">
                <label for="username">Username *<small>(Username must have min 4 and max 10 char)</small></label>
                <input type="text" class="form-control" id="username" name="username" value="' . $row['username'] . '" pattern=".{4,10}" placeholder="Username.." required><br>
            </div>
			
			<div class="form-group">
                <label for="country">Country:</label>
                <select name="country" id="country" name="country" class="form-control">
                    <option value="">molimo odaberite</option>';
                        $_query  = "SELECT * FROM countries";
                        $_result = @mysqli_query($connection, $_query);
                        while($_row = @mysqli_fetch_array($_result)) {
                            print '<option value="' . $_row['country_code'] . '"';
                            if ($row['country'] == $_row['country_code']) { print ' selected'; }
                            print '>' . $_row['country_name'] . '</option>';
                        }
                    print '
                </select> 
            </div> 
            <div class="form-group">
                <label for="archive">Archive:</label><br />
                <input type="radio" name="archive" value="Y"'; if($row['archive'] == 'Y') { echo ' checked="checked"'; $checked_archive = true; } echo ' /> YES &nbsp;&nbsp;
                <input type="radio" name="archive" value="N"'; if($checked_archive == false) { echo ' checked="checked"'; } echo ' /> NO
            </div>
            <div class="form-group">
                <label for="userType">UserType:</label><br />
                <input type="radio" name="userType" value="A"'; if($row['userType'] == 'A') { echo ' checked="checked"'; } echo ' /> Admin &nbsp;&nbsp;
                <input type="radio" name="userType" value="E"'; if($row['userType'] == 'E') { echo ' checked="checked"'; } echo ' /> Editor &nbsp;&nbsp;
                <input type="radio" name="userType" value="U"'; if($row['userType'] == 'U') { echo ' checked="checked"'; } echo ' /> User
            </div>
			<hr>
			
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
        <hr>
		<p><a class="btn btn-secondary" href="index.php?menu='.$menu.'&amp;action='.$action.'">Back</a></p>';
	}
	else {
		print '
		<h2>List of users</h2>
		<div>
			<table class="table">
				<thead>
					<tr>
						<th>First name</th>
						<th>Last name</th>
						<th>E mail</th>
						<th>Country</th>
                        <th width=16>Activity</th>
                        <th width=16>Type</th>
						<th width=16></th>
                        <th width=16></th>
                        <th width=16></th>
					</tr>
				</thead>
				<tbody>';
				$query  = "SELECT * FROM users";
				$result = @mysqli_query($connection, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '
					<tr>
						<td><strong>' . $row['firstname'] . '</strong></td>
						<td><strong>' . $row['lastname'] . '</strong></td>
						<td>' . $row['email'] . '</td>
						<td>';
							$_query  = "SELECT * FROM countries";
							$_query .= " WHERE country_code='" . $row['country'] . "'";
							$_result = @mysqli_query($connection, $_query);
							$_row = @mysqli_fetch_array($_result, MYSQLI_ASSOC);
							print $_row['country_name'] . '
						</td>
						<td>';
							if ($row['archive'] == 'Y') { print 'Inactive'; }
                            else if ($row['archive'] == 'N') { print 'Active'; }
						print '
						</td>
                        <td>';
                            if ($row['userType'] == 'A') { print 'Admin'; }
                            else if ($row['userType'] == 'E') { print 'Editor'; }
                            else { print 'User'; }
                        print '
                        </td>
                        <td><a class="btn btn-outline-info" href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;id=' .$row['id']. '"><i class="fa fa-user"></i></a></td>
						<td><a class="btn btn-outline-secondary" href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;edit=' .$row['id']. '"><i class="fa fa-edit"></a></td>
						<td><a class="btn btn-outline-danger" href="index.php?menu='.$menu.'&amp;action='.$action.'&amp;delete=' .$row['id']. '"><i class="fa fa-trash"></a></td>
					</tr>';
				}
			print '
				</tbody>
			</table>
		</div>';
	}
	
	# Close MySQL connection
	@mysqli_close($connection);
?>