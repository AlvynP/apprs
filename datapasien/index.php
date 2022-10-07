<?php 

session_start();

	if( !isset($_SESSION["login"]) ) { header("Location: ../login.php"); exit; }


//$conn = mysqli_connect("localhost", "root", "", "profil");

require '../functions.php';

//$result = mysqli_query($conn, "SELECT * FROM mymind");

// $profil = query("SELECT * FROM mymind");

$jumlahDataPerHalaman = 4;
$jumlahData = count(query("SELECT * FROM pasien"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;




$jumlahLink = 1;
if ($halamanAktif > $jumlahLink) {
	$star_number = $halamanAktif - $jumlahLink;
} else {
	$star_number = 1;
}

if ($halamanAktif < ($jumlahHalaman - $jumlahLink) ) {
	$end_number = $halamanAktif + $jumlahLink;
} else {
	$end_number = $jumlahHalaman;
}

$pasien = query("SELECT * FROM pasien LIMIT $awalData, $jumlahDataPerHalaman");

if( isset($_POST["search"]) ) {
	$pasien = search($_POST["keyword"]);
}


?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <link rel="stylesheet" href="../public/css/output.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Start Navbar -->
<header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
  <div class="container">
    <div class="flex items-center justify-between relative">
      <div class="px-4">
        <a href="#home" class="font-bold text-lg text-primary block py-6 lg:static">AlvynPapalia|</a>
      </div>
      <div class="flex items-center px-4"></div>
      <button id="hamburger" name="hamburger" type="button" class="block absolute right-3 lg:hidden">
        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
        <span class="hamburger-line transition duration-300 ease-in-out"></span>
        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
      </button>

      <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
        <ul class="block lg:flex lg:place-content-end">
          <li class="group">
            <a href="../index.html" class="flex lg:inline-flex text-base text-dark py-2 mx-8 group-hover:text-primary">Home</a>
          </li>
          <!-- <li class="group">
            <a href="#about" class="flex lg:inline-flex text-base text-dark py-2 mx-8 group-hover:text-primary">Tentang</a>
          </li>
          <li class="group">
            <a href="#document" class="flex lg:inline-flex text-base text-dark py-2 mx-8 group-hover:text-primary">Document</a>
          </li> -->
        </ul>
      </nav>
    </div>
  </div>
</header>
<!-- end -->





<!--  -->
<section id="daftar" class="pt-20 pb-32">
    <div class="container">
        <div class="w-full lg:w-11/12 lg:mx-auto">
        <div class="w-full">
            <h1 class="block font-bold text-dark text-3xl mt-1 lg:text-5xl mb-2">Data Pasien</h1>
            </div>

        </div>

        <div class="w-full px-4 lg:w-1/4 lg:ml-40 mb-3">
        <div class="w-full">
        <form action="" method="post">
                        <div class="flex">
                            <input type="text" class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" placeholder="masukan nama pencarian" autofocus required aria-label="Recipient's username" name="keyword" aria-describedby="button-addon2" autocomplete="off">
                            <button class="text-base font-semibold text-white bg-slate-800 py-1 ml-1 px-2 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out" type="submit" name="search" id="button-addon2">Cari</button>
                        </div>
                    </form>
            </div>
            
        </div>

        <div class="w-full px-4 lg:w-1/4 lg:ml-40 mb-3">
        <div class="w-full flex">
        <a class="text-base font-semibold text-white bg-slate-800 py-1 px-3 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out mr-3" href="../logout.php" class="btn btn-dark">Keluar</a> | <a href="../printer.php" target="_blank"><img src="../public/doc/printer.svg" class="ml-3" alt="Cetak"></a>
            </div>
            
        </div>

        <div class="w-full px-4 lg:w-4/5 lg:mx-auto text-center overflow-auto">
        <table class="table-auto w-full">
            <thead class="bg-slate-300 border-b-2 border-slate-200">
                <tr>
                <th class="p-3 text-sm font-semibold tracking-wide">#</th>
                <th class="p-3 text-sm font-semibold tracking-wide">Nama</th>
                <th class="p-3 text-sm font-semibold tracking-wide">Jenis Kelamin</th>
                <th class="p-3 text-sm font-semibold tracking-wide">Alamat</th>
                <th class="p-3 text-sm font-semibold tracking-wide">Email</th>
                <th class="p-3 text-sm font-semibold tracking-wide">No. Handphone</th>
                <th class="p-3 text-sm font-semibold tracking-wide">NIK</th>
                <th class="p-3 text-sm font-semibold tracking-wide">Poli Tujuan</th>
                <th class="p-3 text-sm font-semibold tracking-wide">Aksi</th>
                </tr>
            </thead>
            <tbody class="">

                <?php $i = $awalData + 1; ?>
      
              <?php foreach( $pasien as $p ) : ?>
                <tr class="hover:bg-primary hover:border-primary">
                <th class="p-3 text-sm font-semibold tracking-wide text-left"><?= $i; ?></th>
                <td class="p-3 text-sm text-gray-700"><?= $p['nama']; ?></td>
                <td class="p-3 text-sm text-gray-700"><?= $p['jk']; ?></td>
                <td class="p-3 text-sm text-gray-700"><?= $p['alamat']; ?></td>
                <td class="p-3 text-sm text-gray-700"><?= $p['email']; ?></td>
                <td class="p-3 text-sm text-gray-700"><?= $p['hp']; ?></td>
                <td class="p-3 text-sm text-gray-700"><?= $p['nik']; ?></td>
                <td class="p-3 text-sm text-gray-700"><?= $p['pl']; ?></td>
                <td class="p-3 text-sm text-gray-700">
                    <a href="../ubah/index.php?id=<?= $p["id"]; ?>" class="text-base font-semibold text-white bg-slate-800 py-1 ml-1 px-2 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out">Ubah</a>
                    <a href="../delete.php?id=<?= $p["id"]; ?>" class="text-base font-semibold text-white bg-orange-600 py-1 ml-1 px-2 rounded-md hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Hapus</a>
                </td>
                </tr>
                <?php $i++; ?>
      
              <?php endforeach; ?>
            </tbody>
        </table>
        </div>

<div class="container">
        <div class="pt-5 w-full px-2 lg:w-4/5 lg:mx-auto">
      <?php if( $halamanAktif > 1 ) : ?>
                 <span> <a class="text-base font-semibold text-white bg-primary py-1 px-3 rounded-full hover:shadow-lg hover:opacity-80 transition duration-200 ease-in-out" href="?halaman=1">First</a></span>
                 <span> <a class="text-base font-semibold text-white bg-primary py-1 px-3 rounded-full hover:shadow-lg hover:opacity-80 transition duration-200 ease-in-out" href="?halaman=<?= $halamanAktif - 1; ?>">..&laquo;</a></span>
                <?php endif; ?>
      
                <?php for( $i = $star_number; $i <= $end_number; $i++ ) : ?>
                  <?php if( $i == $halamanAktif ) : ?>
                    <span><a class="text-base font-semibold text-white bg-primary py-1 px-3 rounded-full hover:shadow-lg hover:opacity-80 transition duration-200 ease-in-out" href="?halaman=<?= $i; ?>" style="font-weight: bold; color: black;"><?= $i; ?></a></span>
                  <?php else : ?>
                    <span><a class="text-base font-semibold text-white bg-primary py-1 px-3 rounded-full hover:shadow-lg hover:opacity-80 transition duration-200 ease-in-out" href="?halaman=<?= $i; ?>"><?= $i; ?></a></span>
                  <?php endif; ?>
                <?php endfor; ?>
      
                <?php if( $halamanAktif < $jumlahHalaman ) : ?>
                  <span><a class="text-base font-semibold text-white bg-primary py-1 px-3 rounded-full hover:shadow-lg hover:opacity-80 transition duration-200 ease-in-out" href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;..</a></span>
                 <span> <a class="text-base font-semibold text-white bg-primary py-1 px-3 rounded-full hover:shadow-lg hover:opacity-80 transition duration-200 ease-in-out" href="?halaman=<?=$jumlahHalaman;?>">End</a></span>
                <?php endif; ?>
      </div>         
</div>

    </div>
</section>



      

        










<!-- start Footer -->
<footer class="bg-dark pt-24 pb-12">
      <div class="container">
        <div class="flex flex-wrap">
          <div class="w-full px-4 mb-12 text-slate-300 font-medium md:text-center">
            <h2 class="font-bold text-4xl text-white mb-4">RS. Bhayangkara Setukpa Lemdiklat Polri.</h2>
            <h3 class="font-bold text-2xl mb-2">Alamat</h3>
            <p>Jln Aminta Azmali Trip N0. 59 A</p>
            <p>Sukabumi</p>
          </div>
        </div>

        <div class="w-fill pt-10 border-t border-slate-700">
          <div class="flex items-center justify-center mb-5">
            <!-- Youtube -->
            <a
              href="https://www.youtube.com/channel/UCPKZcIFBLxZYxiEopTHSZqQ"
              target="_blank"
              class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white text-slate-500">
              <!--  -->
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>YouTube</title>
                <path
                  d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
              </svg>
            </a>
            <!-- Instagram -->
            <a
              href="https://www.instagram.com/alvynpapaliat/"
              target="_blank"
              class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white text-slate-500">
              <!--  -->
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>Instagram</title>
                <path
                  d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
              </svg>
            </a>
            <!-- Twitter -->
            <a
              href="#"
              target="_blank"
              class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white text-slate-500">
              <!--  -->
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>Twitter</title>
                <path
                  d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
              </svg>
            </a>
            <!-- Tik-tok -->
            <a
              href="#"
              target="_blank"
              class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white text-slate-500">
              <!--  -->
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>TikTok</title>
                <path
                  d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
              </svg>
            </a>
            <!-- Email -->
            <a
              href="#"
              target="_blank"
              class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 hover:border-primary hover:bg-primary hover:text-white text-slate-500">
              <!--  -->
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>Facebook</title>
                <path
                  d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
              </svg>
            </a>
          </div>
          <p class="font-medium text-sm text-slate-500 text-center">&copy;Dibuat oleh Alvyn Papalia</p>
        </div>
      </div>
    </footer>
    <!-- end -->

    <!-- kembali -->
    <a
      id="to-top"
      href="#daftar"
      class="hidden justify-center items-center h-9 w-9 bg-primary rounded-full fixed z-[9999] bottom-4 right-2 p-4 hover:animate-pulse">
      <span class="rotate-90">&laquo;</span>
    </a>
    <!--  -->

<script src="../public/js/script.js"></script>




</body>
</html>