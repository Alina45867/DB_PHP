<?php
session_start();
if (!isset($_GET['go']) )
{
  echo "<form>
    Поставьте галочку для редактирования: <input type=radio name=n1 value=1>
    <br>
	<br>
     Поставьте галочку для ввода новой информации: <input type=radio name=n2 value=1>
	<br>
	<br>
    <input type=submit name=go value=Go>
  </form>";
}
else 
{
	if (isset($_GET['n1']))
	Header("Location: lab_5_6.php");
	if (isset($_GET['n2']))
		Header("Location: lab_5_3.php");
};
?>
