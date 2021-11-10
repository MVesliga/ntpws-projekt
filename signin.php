<?php 
	print '
	<h1>Sign In form</h1>
	<div>';
	if ($_POST['_action_'] == false) {
		print '
		<form style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding: 5%; border-radius: 10px;" action="" id="login_form" name="login_form" method=POST>
            <input type="hidden" id="_action_" name="_action_" value="TRUE">
            <div class="form-group">
                <label for="username">Username:*</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password">Password* <small>(Password must have min 4 characters)</small></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password.." pattern=".{4,}" required>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Submit</button>
		</form>';
	}
	else if ($_POST['_action_'] == true) {
		
		$query  = "SELECT * FROM users";
		$query .= " WHERE username='" .  $_POST['username'] . "'";
		$result = @mysqli_query($connection, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if (password_verify($_POST['password'], $row['password'])) {
			$_SESSION['user']['valid'] = 'true';
			$_SESSION['user']['id'] = $row['id'];
			$_SESSION['user']['firstname'] = $row['firstname'];
			$_SESSION['user']['lastname'] = $row['lastname'];
			$_SESSION['message'] = '<p>Dobrodošli, ' . $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] . '</p>';
			header("Location: index.php?menu=1");
		}
		
		# Bad username or password
		else {
			unset($_SESSION['user']);
			$_SESSION['message'] = '<p>You entered wrong email or password!</p>';
			header("Location: index.php?menu=7");
		}
	}
	print '
	</div>';
?>