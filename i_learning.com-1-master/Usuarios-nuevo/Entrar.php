<?php
// Configura los datos de tu cuenta

//puedes cambiar las frases sin quitar las comillas ""
$dbhost='mysql.webcindario.com';
$dbusername='tu usuario en MySQL miarroba';
$dbuserpass='El password de MySQL miarroba';
$dbname='Tu base de datos MySQL de miarroba';
// Conexi&oacute;n a la base de datos
mysql_connect("mysql.webcindario.com", "Tu usuario en MySQL miarroba otra vez", "El password de MySQL miarroba otra vez" ) or die(mysql_error());
mysql_select_db("Tu base de datos MySQL miarroba otra vez" ) or die(mysql_error());

if ($_POST['username'] ) {
//Comprobacion del envio del nombre de usuario y password
$username=$_POST['username'];
$password=$_POST['password'];
if ($password==NULL) {
echo "Debes Escribir el Password";
}else{
$query = mysql_query("SELECT username,password FROM users WHERE username = '$username'" ) or die(mysql_error());
$data = mysql_fetch_array($query);
if($data['password'] != $password) {
echo "Usuario o Contrase&ntilde;a Incorrecto, sino eres Usuario Puedes Registrarte <a href='registro.html'>Aqu&iacute;</a>";
}else{
$query = mysql_query("SELECT username,password FROM users WHERE username = '$username'" ) or die(mysql_error());
$row = mysql_fetch_array($query);
$_SESSION["s_username"] = $row['username'];
echo "<html><head></head><meta HTTP-EQUIV='Refresh' CONTENT='3; URL=session.html'><body>Hola ".$_SESSION['s_username']." Te Vamos a Redireccionar a Tu Cuenta</body></html>";
}
}
}
?>