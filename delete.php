<?php 

session_start();

	if( !isset($_SESSION["login"]) ) { header("Location: login.php"); exit; }


require 'functions.php';

$id = $_GET["id"];

if( delete($id) > 0 ) {
	echo "
			<script>
				alert('Delete Succes'); document.location.href = 'datapasien';
			</script>
		";
	} else {
	echo "
			<script>
				alert('Delete Failed'); document.location.href = 'index.php';
			</script>
		";
	}


?>