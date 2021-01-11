<?php include("config.php"); ?>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<br/>
	<br/>
	<h2>Welcome to Ventura2.0</h2>
	<h2>Login Page</h2>	
	<table>
			<form action="login.php" method="post" onSubmit="return validasi()"	>	
			<tr><td><label>Username:</label></td>
			<td><input type="text" name="username" id="username" /></td>
			</tr>
		<tr>	
			<td><label>Password:</label></td>
			<td><input type="password" name="password" id="password" /></td>
		</tr>
		<tr>	
			<td><label>Refferal Code:</label></td>
			<td><input type="text" name="refcode" id="refcode" /></td>
		</tr>
		<tr>
			<td><input type="submit" name="login" value="Login"></td>
		</tr>
		</table>
		</form>
		
		<form action="bridge.php" method="post">

		<p> Registrasi disini </p>	
			<select name="akses">
			<option>--- Registrasi Sebagai ---</option>
				<?php
					$sql = "SELECT * FROM akses";
       				 $query = mysqli_query($db, $sql); 
        			 while($akses = mysqli_fetch_array($query)){
							echo '<option>'.$akses['kategori'].'</option>';
						}
					?>
			</select>
				<input type="submit" name="registrasi" value="registrasi" />
		</form>			
		

</body>
<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {
			return true;
		}else{
			alert('Username dan Password harus di isi !');
			return false;
		}
	}
</script>
</html>


	