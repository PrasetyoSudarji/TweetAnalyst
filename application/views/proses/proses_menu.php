<?php 
	include ("../config/connect_db.php");
	
	extract ($_GET);

	$result = pg_query($conn, "SELECT * FROM menu");
	while ($data = pg_fetch_assoc($result)){
		if($id_menu == 1){
			$result = pg_query($conn, "UPDATE menu SET status='1' WHERE id=$id_menu");
			include "../page/template/navbar-1.php";
			include "../page/home.php";
		}else{
			$result = pg_query($conn, "UPDATE menu SET status='0' WHERE id!=$id_menu");
		}

		if($id_menu == 2){
			$result = pg_query($conn, "UPDATE menu SET status='1' WHERE id=$id_menu");
			include "../page/template/navbar-2.php";
			include "../page/about.php";
		}else{
			$result = pg_query($conn, "UPDATE menu SET status='0' WHERE id!=$id_menu");
		}

		if($id_menu == 3){
			$result = pg_query($conn, "UPDATE menu SET status='1' WHERE id=$id_menu");
			include "../page/template/navbar-3.php";
			include "../page/contact.php";
		}else{
			$result = pg_query($conn, "UPDATE menu SET status='0' WHERE id!=$id_menu");
		}

		if($id_menu == 4){
			$result = pg_query($conn, "UPDATE menu SET status='1' WHERE id=$id_menu");
			include "../page/template/navbar.php";
			include "../page/input_data.php";
		}else{
			$result = pg_query($conn, "UPDATE menu SET status='0' WHERE id!=$id_menu");
		}
	}
?>