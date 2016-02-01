<!doctype html>
<html>
<head>
	<title>Usuarios de mi aplicación</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Usuarios de la aplicación</h1>
	<?php
		$dbhost = getenv("OPENSHIFT_MYSQL_DB_HOST");
		$dbuser = getenv("OPENSHIFT_MYSQL_DB_USERNAME");
		$dbpassword = getenv("OPENSHIFT_MYSQL_DB_PASSWORD");
		$dbname = getenv("OPENSHIFT_APP_NAME");

		mysql_connect($dbhost, $dbuser, $dbpassword) or die(mysql_error());
		mysql_set_charset("utf8")
mysql_select_db($dbname) or die(mysql_error());
		$result = mysql_query("SELECT * FROM Usuarios") or die(mysql_error());
	?>
	<table border cellpadding=3>
		<tr>
			<td>Nombre Usuario</td>
			<td>Apellidos usuario</td>
		</tr>
	<?php	
		while($currentRow = mysql_fetch_array($result)){
			echo "<tr>";
			echo "<td>" . $currentRow['Nombre'] . "</td>";
			echo "<td>" . $currentRow['Apellidos'] . "</td>";
			echo "</tr>";
		}
	?>
	</table>
</body>
</html>
