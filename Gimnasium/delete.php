<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="Project";
$id=$_SESSION["id"];
$conn = mysqli_connect($servername, $username, $password,$dbname);
$my_trigger = "CREATE TRIGGER account_delete AFTER DELETE on
            Customers
			FOR EACH ROW
			BEGIN
			DELETE FROM Pic
			    WHERE Pic.Id = Old.Email;
			DELETE FROM CustomerEx
			    WHERE CustomerEx.Id = Old.Email;
			DELETE FROM CustomerDiet
			    WHERE CustomerDiet.Id = Old.Email;
			DELETE FROM Comments
			    WHERE Comments.id = Old.Email;
			END";

$result=$conn->query($my_trigger);

$acc_del = "DELETE FROM Customers where Email= '$id' ";
$result2 = 	$conn->query($acc_del);

header("location:login.php");

?>
