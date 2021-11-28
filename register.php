<?php 
    print '
        <h1>Registration Form</h1>
        <div>';

        if ($_POST['_action_'] == false) {
                print '
                    <form style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding: 5%; border-radius: 10px;" action="" id="registration_form" name="registration_form" method=POST>
                    <input type="hidden" id="_action_" name="_action_" value="TRUE">
                    <div class="form-group">
                        <label for="firstName">First Name*</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" aria-describedby="firstNameHelp" placeholder="Enter your first name">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name*</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="lastNameHelp" placeholder="Enter your last name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address*</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="email" name="email" class="form-text text-muted">We\'ll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:* <small>(Username must have min 4 and max 10 characters)</small></label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="userNameHelp" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password* <small>(Password must have min 4 characters)</small></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password.." pattern=".{4,}" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <select name="country" id="country" name="country" class="form-control">
                            <option value="">molimo odaberite</option>';
                            $query  = "SELECT * FROM countries";
                            $result = @mysqli_query($connection, $query);
                            while($row = @mysqli_fetch_array($result)) {
                                print '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
                            }
                        print '
                        </select> 
                    </div> 
                    <br/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <br/>';
        }
        else if ($_POST['_action_'] == true) {
		
            $query  = "SELECT * FROM users";
            $query .= " WHERE email='" .  $_POST['email'] . "'";
            $query .= " OR username='" .  $_POST['username'] . "'";
            $result = @mysqli_query($connection, $query);
            $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_email = $row['email'] ?? '';
            $_username = $row['username'] ?? '';
            
            if ($_email == '' || $_username == '' ) {
                $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
                
                $query  = "INSERT INTO users (firstname, lastname, email, username, password, country)";
                $query .= " VALUES ('" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $pass_hash . "', '" . $_POST['country'] . "')";
                $result = @mysqli_query($connection, $query);
                
                echo '<br><p class="alert alert-success">' . ucfirst(strtolower($_POST['firstName'])) . ' ' .  ucfirst(strtolower($_POST['lastName'])) . ', thank you for registration </p><br />
                <hr>';
            }
            else {
                echo '<br><p class="alert alert-danger">User with this email or username already exist!</p>';
            }
        }
        print '
	</div>';
?>