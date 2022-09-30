<?php
if (!isset($_GET['go']) )
{
  echo "<form>
    Поставьте галочку для поиска по телефону: <input type=radio name=n1 value=1>
    <br>
     Поставьте галочку для поиска по имени: <input type=radio name=n2 value=1>
	<br>
   Введите критерий поиска: <input type=criteria name=criteria>
	<br>
    <input type=submit name=go value=Go>
  </form>";
}
else 
{
   $cr=$_GET['criteria'];
$DBHost="localhost";
$DBUser="root";
$DBPassword="";
$DBName="lab5";
$link= mysqli_connect($DBHost, $DBUser, $DBPassword);
mysqli_select_db($link,$DBName);//Выбираем бд
if (isset($_GET['n1']))
$r=mysqli_query($link, "SELECT * from book WHERE Number='$cr'");
else
{
	if (isset($_GET['n2']))
	$r=mysqli_query($link, "SELECT * from book WHERE Full_name='$cr'");
};
if (null==(mysqli_fetch_array($r)))
{ 
	echo 'Ничего не найдено <br>';
	echo "<a href='lab_5_4.php'>Попробовать поискать заново</a><br />";
	echo "<a href='lab_5_2.php'>Выйти</a><br />";
}
else
{
while ($Rows= mysqli_fetch_array($r))
{
	printf("ID: %d, Name: %s, Number: %s, Address: %s",
$Rows['ID'], $Rows['Full_name'],  $Rows['Number'],  $Rows['Address']); 
}
	echo "<a href='lab_5_4.php'>Искать еще</a><br />";
	echo "<a href='lab_5_2.php'>Выйти</a><br />";
};
mysqli_close($link);
};
?>
