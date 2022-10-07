<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$pasien = query("SELECT * FROM pasien");


$mpdf = new \Mpdf\Mpdf();



$html = '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Pasien Daftar Online</title>
</head>
<body>
<h1>Data Pasien Daftar Online</h1>
<table border="1" cellpadding="10" cellspacing="0" class="table table-bordered">
				
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>alamat</th>
					<th>Email</th>
					<th>No. Hp</th>
					<th>NIK</th>
					<th>Poli Tujuan</th>
				</tr>';

				$i = 1;
			foreach( $pasien as $p ) {
				$html .= '<tr>
					<td>'. $i++ .'</td>
					<td>'. $p["nama"] .'</td>
					<td>'. $p["jk"] .'</td>
					<td>'. $p["alamat"] .'</td>
					<td>'. $p["email"] .'</td>
					<td>'. $p["hp"] .'</td>
					<td>'. $p["nik"] .'</td>
					<td>'. $p["pl"] .'</td>
				</tr>';
			}


$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('Daftar Buronan', \Mpdf\Output\Destination::INLINE);

?>

