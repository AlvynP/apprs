<?php 

$conn = mysqli_connect("localhost", "root", "", "apprs");


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;


// function query($query) {

// 	global $conn;

// 	$result = mysqli_query($conn, $query);
// 	$rows = [];
// 	while( $row = mysqli_fetch_assoc($result) ) {
// 		$rows[] = $row;
// 	}
// 	return $rows;
// }




function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	if(!$result) return false; while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}






function create($data) {
    setcookie("keyword", "", time() - 3600);
    global $conn;

    //  //upload gambar
    // $gambar = upload();
    // if( !$gambar ) {
    //     return false;
    // }
    
    $nama = htmlspecialchars( $data["nama"] );
    $jk = htmlspecialchars( $data["jk"] );
    $alamat = htmlspecialchars( $data["alamat"] );
    $email = htmlspecialchars( $data["email"] );
    $hp = htmlspecialchars( $data["hp"] );
    $nik = htmlspecialchars( $data["nik"] );
    $pl = htmlspecialchars( $data["pl"] );
    
   

    $query = "INSERT INTO pasien VALUES ('', '$nama', '$jk', '$alamat', '$email', '$hp', '$nik', '$pl')";

    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// function create($data) {

// 	global $conn;

// 	//$gambar = htmlspecialchars($data["gambar"]);

// 	// $gambar = upload();
// 	// if( !$gambar ) {
// 	// 	return false;
// 	// }

// 	$nim = htmlspecialchars($data["nim"]);
// 	$nama = htmlspecialchars($data["nama"]);
// 	$email = htmlspecialchars($data["email"]);
// 	$jurusan = htmlspecialchars($data["jurusan"]);

// 	$query = "INSERT INTO pasien VALUES ('', '$gambar', '$nim', '$nama', '$email', '$jurusan')";

// 	mysqli_query($conn, $query);

// 	return mysqli_affected_rows($conn);
// }


// function upload() {

// 	$nameFile = $_FILES['gambar']['name'];
// 	$sizeFile = $_FILES['gambar']['size'];
// 	$error = $_FILES['gambar']['error'];
// 	$tmpName = $_FILES['gambar']['tmp_name'];

// 	if( $error === 4 ) {
// 		echo "<script>alert('Select Image!');</script>";

// 		return false;
// 	}


// 	$ekstensiFileValid =['jpg', 'jpeg', 'png'];
// 	$ekstensiFile = explode('.', $nameFile);
// 	$ekstensiFile = strtolower(end($ekstensiFile));
// 	if( !in_array($ekstensiFile, $ekstensiFileValid) ) {
// 		echo "<script>alert('Your Choice Is Not Picture!');</script>";

// 		return false;
// 	}


// 	if( $sizeFile > 1000000 ) {
// 		echo "<script>alert('Limited File Size!');</script>";

// 		return false;
// 	}


// 	$newFileName = uniqid();
// 	$newFileName .= '.';
// 	$newFileName .= $ekstensiFile;

// 	move_uploaded_file($tmpName, 'picture/' . $newFileName);
// 		return $newFileName;

// }







function delete($id) {

	global $conn;

	mysqli_query($conn, "DELETE FROM pasien WHERE id = $id");

	return mysqli_affected_rows($conn);
}




function edit($data,$id) {
	global $conn;

	$id = $data["id"];
	//$gambar = htmlspecialchars($data["gambar"]);

	// $gambarLama = htmlspecialchars($data["gambarLama"]);
	// 	if( $_FILES['gambar']['error'] === 4 ) { $gambar = $gambarLama; } else { $gambar = upload(); }

	$nama = htmlspecialchars($data["nama"]);
	$jk = htmlspecialchars($data["jk"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$email = htmlspecialchars($data["email"]);
	$hp = htmlspecialchars($data["hp"]);
	$nik = htmlspecialchars($data["nik"]);
	$pl = htmlspecialchars($data["pl"]);

	$query = "UPDATE pasien SET nama = '$nama', jk = '$jk', alamat = '$alamat', email = '$email', hp = '$hp', nik = '$nik', pl = '$pl' WHERE id = $id";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}




function search($keyword) {
	global $conn;

	$query = "SELECT * FROM pasien WHERE nama LIKE '%$keyword%' OR jk LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR email LIKE '%$keyword%' OR hp LIKE '%$keyword%' OR nik LIKE '%$keyword%' OR pl LIKE '%$keyword%'";
	return query($query);
}





function registrasi($data) {
	global $conn;
	


	$username = strtolower(stripslashes($data["username"]));
	$telp = htmlspecialchars($data["telp"]);
	$email = htmlspecialchars($data["email"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
			  </script>";
		return false;
	}


	if( $password !== $password2 ) {
		echo "<script>
				alert('Konfirmasi password tidak sesuai!');
			  </script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$telp', '$email', '$password')");


// if (($result)) {
// 	$email_send = 'astarypapalia@gmail.com';
// 	$name_send = 'Alvyn Papalia';
// 	$email_accept = $data["email"];
// 	$subjek = 'Registrasi New User Alvyn Papalia';
// 	$message = 'Selamat, anda sudah terdaftar pada aplikasi. silahkan masuk ke aplikasi dengan username '.$username.' dan password '.$password.'.';

// 	$mail = new PHPMailer;
// 	$mail->isSMTP();

// 	$mail->Host = 'smtp.gmail.com';
// 	$mail->Username = $email_accept;
// 	$mail->Password = 'yqqqjtwyhdkkpslk';
// 	$mail->Port = 465;
// 	$mail->SMTPAuth = true;
// 	$mail->SMTPSecure = 'ssl';
// 	$mail->SMTPDebug = 2;

// 	$mail->setFrom($email_send, $email_accept);
// 	$mail->addAddress($email_send);
// 	$mail->isHTML(true);
// 	$mail->Subject = $subjek;
// 	$mail->Body = $message;

// 	$send = $mail->send();

// 	if($send){
// 		echo "<script>
// 				alert('Send email Successful!'); document.location.href = 'login.php';
// 			</script>";
// 	} else {
// 		"<script>
// 				alert('Send Failed!'); document.location.href = 'login.php';
// 			</script>";
// 	}

// }





	return mysqli_affected_rows($conn);

}










// function cetak($data) {
// 	global $conn;

// 	$id = $data["id"];
// 	//$gambar = htmlspecialchars($data["gambar"]);

// 	$gambarLama = htmlspecialchars($data["gambarLama"]);
// 		if( $_FILES['gambar']['error'] === 4 ) { $gambar = $gambarLama; } else { $gambar = upload(); }

// 	$nim = htmlspecialchars($data["nim"]);
// 	$nama = htmlspecialchars($data["nama"]);
// 	$email = htmlspecialchars($data["email"]);
// 	$jurusan = htmlspecialchars($data["jurusan"]);

// 	$query = "UPDATE mymind SET gambar = '$gambar', nim = '$nim', nama = '$nama', email = '$email', jurusan = '$jurusan' WHERE id = $id";

// 	mysqli_query($conn, $query);

// 	return mysqli_affected_rows($conn);
// }



// function validateForm() {
//     var radios = document.getElementsByName("jk");
//     var formValid = false;

//     var i = 0;
//     while (!formValid && i < radios.length) {
//         if (radios[i].checked) formValid = true;
//         i++;        
//     }

//     if (!formValid) alert("Must check some option!");
//     return formValid;
// }




// function send() {
//                 var genders = document.getElementsByName("jk");
//                 if (genders[0].checked == true) {
//                     alert("Your gender is male");
//                 } else if (genders[1].checked == true) {
//                     alert("Your gender is female");
//                 } else {
//                     // no checked
//                     var msg = '<span style="color:red;">You must select your gender!</span><br /><br />';
//                     document.getElementById('msg').innerHTML = msg;
//                     return false;
//                 }
//                 return true;
//             }

//             function reset_msg() {
//                 document.getElementById('msg').innerHTML = '';
//             }


?>