<?php
//авторизация пользователем
session_start();
if (!isset($_GET['go']) )
{
  echo "<form>
    Login: <input type=text name=login>
	<br>
    Password: <input type=password name=passwd>
	<br>
    <input type=submit name=go value=Go>
  </form>";
}
else 
{
 $_SESSION['login']=$_GET['login'];
 $_SESSION['passwd']=$_GET['passwd'];
 $login=$_GET['login'];
 $password=$_GET['passwd'];
 $DBHost="localhost";
 $DBUser="root";
 $DBPassword="";
 $DBName="lab_5_1";
 $link= mysqli_connect($DBHost, $DBUser, $DBPassword);
mysqli_select_db($link,$DBName);//Выбираем бд
$log_res=mysqli_query($link,"SELECT Login, Password FROM logins 
where Login='$login' AND Password='$password'");
if (null==(mysqli_fetch_array($log_res)))
{
	echo 'Введены неверные данные, попробуйте снова <br>';
	echo "<a href='lab_5_2.php'>Войти заново</a><br />";
}
else {
	$res=mysqli_query($link, "SELECT Metka FROM logins 
	where Login='$login' AND Password='$password'");
	$result=mysqli_fetch_array($res);
	if ($result[0]==1)
	Header("Location: lab_5_3.php");
	else
		Header ("Location: lab_5_4.php");
};
mysqli_close($link);
};
?>
