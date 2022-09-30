<?php
if (!isset($_GET['go']) )
{
  echo "<form>
    Введите ID записи, которую хотите отредактировать: <input type=text name=id>
	<br>
	<br>
     Поставьте галочку, если хотите отредактировать имя: <input type=radio name=n1 value=1>
    <br>
	<br>
     Поставьте галочку, если хотите отредактировать телефон: <input type=radio name=n2 value=1>
	<br>
	<br>
	Поставьте галочку, если хотите отредактировать адресс: <input type=radio name=n3 value=1>
	<br>
	Введите новые данные: <input type=text name=new_inf>
	<br>
	<br>
    <input type=submit name=go value=Go>
  </form>";
}
else 
{
   $id=$_GET['id'];
   $new_inf=$_GET['new_inf'];
   $DBHost="localhost";
$DBUser="root";
$DBPassword="";
$DBName="lab_5_1";
$link= mysqli_connect($DBHost, $DBUser, $DBPassword);
mysqli_select_db($link,$DBName);//Выбираем бд
if ($_GET['n1']!=null)
	{
		 $array=explode(' ',$new_inf);
   $chr1 = mb_substr ($array[0], 0, 1, "UTF-8");
   $chr2 = mb_substr ($array[1], 0, 1, "UTF-8");
   $chr3 = mb_substr ($array[2], 0, 1, "UTF-8");
   if (preg_match('/\p{Cyrillic}/u',  $array[0])&&
		preg_match('/\p{Cyrillic}/u',  $array[1])&&
		preg_match('/\p{Cyrillic}/u',  $array[2])&&
		!ctype_upper($chr1)&& !ctype_upper($chr2) && !ctype_upper($chr3))
			{
			mysqli_query ($link,"UPDATE book SET Full_name='$new_inf' where ID='$id'");
			echo 'Данные отредактированы'.'</br>';
			echo "<a href='lab_5_6.php'>Отредактировать еще </a><br />";
			}
			else
			{
				echo 'Введены неверные данные, попробуйте снова <br>';
				echo "<a href='lab_5_6.php'>Попробовать еще раз</a><br />";
			};
  
	}
else
{
	if ($_GET['n2'!=null])
	{
		if (mb_substr ($new_inf, 0, 1, "UTF-8")=="+" && mb_substr ($new_inf, 1, 1, "UTF-8")=="7"||mb_substr ($new_inf, 0, 1, "UTF-8")=="8")
		{
		mysqli_query ($link,"UPDATE book SET number='$new_inf' where ID='$id'");
	echo 'Данные отредактированы'.'</br>';
	echo "<a href='lab_5_6.php'>Отредактировать еще </a><br />";
		}
		else
		{
					echo 'Введены неверные данные, попробуйте снова <br>';
				echo "<a href='lab_5_6.php'>Попробовать еще раз</a><br />";
		}
	}
	else 
	{
		if ($_GET['n3'!=null])
		{
			if ( preg_match('/\p{Cyrillic}/u',  $new_inf)&& !ctype_upper(mb_substr ($new_inf, 0, 1, "UTF-8")))
			mysqli_query ($link,"UPDATE book SET address='$new_inf' where ID='$id'");
			echo 'Данные отредактированы'.'</br>';
			echo "<a href='lab_5_6.php'>Отредактировать еще </a><br />";
		}
		else
		{
				echo 'Введены неверные данные, попробуйте снова <br>';
				echo "<a href='lab_5_6.php'>Попробовать еще раз</a><br />";
		};
	}
};
mysqli_close($link);
};
?>
