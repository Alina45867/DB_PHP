<?php
//Создание базы данных с логинами и справочник
$DBHost="localhost";
$DBUser="root";
$DBPassword="";
$DBName="lab_5_1";
$link= mysqli_connect($DBHost, $DBUser, $DBPassword);
//mysqli_query($link,"CREATE DATABASE $DBName"); // создаем базу данных
mysqli_select_db($link,$DBName);//Выбираем бд
mysqli_query ($link,"CREATE TABLE logins(ID int not null primary key,
Login varchar(20) not null, 
Password varchar(20) not null,
Metka int(2) not null)");
mysqli_query ($link,"CREATE TABLE book(ID int primary key AUTO_INCREMENT,
Full_name varchar(20) not null, 
Number varchar(20) not null,
Address varchar(20))");
mysqli_query ($link,"INSERT INTO logins(ID,Login,Password, Metka) values (1,'admin','admin',1)");
mysqli_query ($link,"INSERT INTO logins(ID,Login,Password,Metka) values (2,'user','user',2)");
//$res=mysqli_query ($mysqli,"SELECT * from  `Info1 ` where  `Number`=89258042378");
//$row=mysqli_fetch_assoc($res);
//echo $row['_msg'];
mysqli_close($link);
?>
