<?php
session_start();
if (!isset($_GET['go']) )
{
  echo "<form>
    FIO: <input type=text name=FIO>
	<br>
	<br>
    Number: <input type=text name=number>
	<br>
	<br>
	Address: <input type=address name=address>
    <input type=submit name=go value=Go>
  </form>";
}
else 
{
	$_SESSION['FIO']=$_GET['FIO'];
   $_SESSION['number']=$_GET['number'];
   $_SESSION['address']=$_GET['address'];
   $ad=$_GET['address'];
   $num=$_GET['number'];
   $fio=$_GET['FIO'];
   $array=explode(' ',$fio);
   $chr1 = mb_substr ($array[0], 0, 1, "UTF-8");
   $chr2 = mb_substr ($array[1], 0, 1, "UTF-8");
   $chr3 = mb_substr ($array[2], 0, 1, "UTF-8");
   $DBHost="localhost";
$DBUser="root";
$DBPassword="";
$DBName="lab_5_1";
$link= mysqli_connect($DBHost, $DBUser, $DBPassword);
mysqli_select_db($link,$DBName);//Выбираем бд
if (preg_match('/\p{Cyrillic}/u',  $array[0])&&
preg_match('/\p{Cyrillic}/u',  $array[1])&&
preg_match('/\p{Cyrillic}/u',  $array[2])&&
!ctype_upper($chr1)&& !ctype_upper($chr2) && !ctype_upper($chr3)&&
mb_substr ($num, 0, 1, "UTF-8")=="+" && mb_substr ($num, 1, 1, "UTF-8")=="7"
||mb_substr ($num, 0, 1, "UTF-8")=="8" && preg_match('/\p{Cyrillic}/u',  $ad)&& !ctype_upper(mb_substr ($ad, 0, 1, "UTF-8")))
	{
mysqli_query ($link,"INSERT INTO book(Full_name,Number,Address) values ($fio','$num','$ad')");
  echo "Данные введены верно <br>";
	echo "<a href='lab_5_3.php'>Ввести еще</a><br />";
	echo "<a href='lab_5_2.php'>Выйти</a><br />";
	}
else
{
	echo "Данные введены неверно <br>";
	echo "<a href='lab_5_3.php'>Ввести данные заново</a><br />";
	echo "<a href='lab_5_2.php'>Выйти</a><br />";
};
mysqli_close($link);
};
?>
