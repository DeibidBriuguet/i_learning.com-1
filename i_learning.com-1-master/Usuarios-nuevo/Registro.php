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


// Preguntaremos si se han enviado ya las variables necesarias
if (isset($_POST["username"] ) ) {
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$email = $_POST["email"];
// Hay campos en blanco
if($username==NULL|$password==NULL|$cpassword==NULL|$email==NULL) {
echo "Hay Campos Vacios";
}else{
// &iquest;Coinciden las contrase&ntilde;as?
if($password!=$cpassword) {
echo "Las Contrase&ntilde;as No Coinciden";
}else{
// Comprobamos si el nombre de usuario o la cuenta de correo ya exist&iacute;an
$checkuser = mysql_query("SELECT username FROM users WHERE username='$username'" ) ;
$username_exist = mysql_num_rows ($checkuser);

$checkemail = mysql_query("SELECT email FROM users WHERE email='$email'" ) ;
$email_exist = mysql_num_rows($checkemail);

if ($email_exist>0|$username_exist>0) {
echo "EL Nombre de Usuario o la Cuenta de Correo Estan ya en Uso";
}else{
//Todo parece correcto procedemos con la inserccion
$query = "INSERT INTO users (username, password, email) VALUES('$username','$password','$email')";
mysql_query($query) or die(mysql_error());
echo "El Usuario $username ha Sido Registrado de Manera Satisfactoria. Ahora Puedes Iniciar Session";
}
}
}
}
?>

 