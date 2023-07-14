<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee A/C</title>
</head>
<body>

<center>
		<h1>Create Employee Account</h1>
			<form method="post" action="Registration.php">
				<table>
					<tr>
						<td>First Name:</td>
						<td><input type="text" name="fname" placeholder="Enter your first name" required>
					</tr>
					<tr>
						<td>Last Name:</td>
						<td><input type="text" name="lname" placeholder="Enter your last name" required>
					</tr>
                    
					<tr>
						<td>User Name:</td>
						<td><input type="text" name="uname" placeholder="Enter your user name" required>
					</tr>
                    <tr>
						<td>Designation:</td>
						<td><input type="text" name="uname" placeholder="Enter your Designation" required>
					</tr>
					<tr>
                        <tr>
						<td>Email Address:</td>
						<td><input type="email" name="email" placeholder="Enter your email" required>
					</tr>
                    <tr>
						<td>Phone Number:</td>
						<td><input type="tel" name="number" placeholder="Enter your phone number" required>
					</tr>
                    
						<td>Gender:</td>
						<td>
							<input type="radio" name="gender" value="male" required> Male
							<input type="radio" name="gender" value="female" required> Female 
						</td>
					</tr>
					<tr>
						<td>Address:</td>
						<td><textarea name ="address" placeholder="Enter your address" required></textarea></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="pass1" placeholder="Enter your password" required>
					</tr>
					<tr>
						<td>Confirm Password:</td>
						<td><input type="password" name="pass2" placeholder="Enter your password again" required>
					</tr>
				</table>
                <br>
				<input type="submit" name="creat_A/c" value="Creat Account">
			</form>
    
</body>
</html>