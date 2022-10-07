<?php 

session_start();

    // if( !isset($_SESSION["login"]) ) { header("Location: login.php"); exit; }


require '../functions.php';

if( isset($_POST["submit"]) ) {

    if( create($_POST) > 0 ) {
        echo "
            <script>
                alert('Anda telah berhasil mendaftar, silahkan periksa email atau nomor telephone anda untuk informasi lebih lanjut!'); document.location.href = '../index.html';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Send Failed!'); document.location.href = '../index.html';
            </script>
        ";
    }

}

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Online!</title>
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
    


<!-- Start Daftar -->
<section id="daftar" class="pt-36 pb-32">
    <div class="container">
        <div class="w-full px-4 lg:w-2/3 lg:mx-auto">
            <h1 class="block font-bold text-dark text-3xl lg:text-5xl">Daftar Online <span class="text-base font-semibold text-primary md:text-xl lg:text-2xl">Pasien!</span></h1>
        </div>

        <div class="w-full lg:w-2/3 lg:mx-auto py-2">
          <button class="text-base font-semibold text-white bg-primary py-1 px-3 rounded-full hover:shadow-lg hover:opacity-80 transition duration-300 ease-in-out show-modal">Cek Dokter</button>
        </div>
        <div class="w-full lg:w-2/3 lg:mx-auto">
        <div class="w-full px-4 mb-8">
        <form action="" name="check" method="post" onclick="validateForm()" onsubmit="return validate()">

<div class="my-3">
    <label for="nama" class="text-base font-bold text-primary">Nama</label>
    <input class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" autofocus type="text" class="form-control" id="nama" name="nama" required minlength="2" autofocus autocomplete="off" value="">
</div>




<div class="mb-3">
    <label for="" class="text-base font-bold text-primary">Jenis Kelamin</label>
    <!-- <div class="row">
        <div class="col-6"> -->
            <div class="form-check mb-3">
                <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                <input class="form-check-input" type="radio" value="Laki-laki" name="jk" id="Laki-laki" >
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label" for="Perempuan">Perempuan</label>
                <input class="form-check-input" type="radio" value="Perempuan" name="jk" id="Perempuan" >
            </div>
        <!-- </div>
    </div> -->
    
</div>

<div class="mb-3">
    <label for="alamat" class="text-base font-bold text-primary">Alamat</label>
    <input type="text" class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" id="alamat" name="alamat" value="" required autocomplete="off">
    
</div>

<div class="mb-3">
    <label for="email" class="text-base font-bold text-primary">Email</label>
    <input type="email" class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" id="email" name="email" value="" required autocomplete="off">
    
</div>


<div class="mb-3">
    <label for="hp" class="text-base font-bold text-primary">No. Handphone</label>
    <input type="tel" class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" id="hp" name="hp" value="" required autocomplete="off" onkeypress="return hanyaAngka(event)" pattern="(\+62|62|0)8[1-9][0-9]{6,13}$">
    
</div>

<div class="mb-3">
    <label for="nik" class="text-base font-bold text-primary">No. KTP</label>
    <input type="number" pattern="{14,16}$" class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" id="nik" name="nik" value="" required autocomplete="off" onkeypress="return hanyaAngka(event)">
</div>

<label for="pl" class="text-base font-bold text-primary">Poli Tujuan</label>

<select class="form-select w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary" id="pl" name="pl">
    <option selected required="required"></option>
                <option value="ORTOPHEDI">Ortophedi</option>
    <option value="PENYAKIT DALAM">Penyakit Dalam</option>
    <option value="OBGYN">Obgyn</option>
    <option value="SEPESIALIS PARU">Sepesialis Paru</option>
    <option value="SEPESIALIS JANTUNG">Sepesialis Jantung</option>
    <option value="SEPESIALIS BEDAH">Sepesialis Bedah</option>
    <option value="SEPESIALIS PENYAKIT UROLOGI">Sepesialis Urologi</option>
    <option value="SEPESIALIS KULIT">Sepesialis Kulit</option>
    <option value="SEPESIALIS SYARAF">Sepesialis Syaraf</option>
    <option value="SEPESIALIS ANAK">Sepesialis Anak</option>
    <option value="GIGI">GIGI</option>
</select>
<!-- <label class="input-group-text" for="pl">Options</label> -->

<div class="w-full px-4 mt-5">
<button class="text-base font-semibold text-white bg-primary py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500" type="submit" name="submit" onsubmit="return validate()" class="btn btn-primary mt-3">Kirim</button>
</div>
        </form>
        </div>
        </div>
    </div>
</section>
<!-- end Daftar -->


<!-- Dokter -->
<section class="pt-36 pb-32">
  <div class="container">
<div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded shadow-lg w-4/5 h-4/5">
    <!--  -->
    <div class="border-b-2 flex w-full px-4 py-2 ">
      <h3 class="font-semibold text-lg">Jadwal Dokter</h3>
      <button class="text-black close-modal ml-auto">&cross;</button>
    </div>
      <!-- content -->
      <div class="py-3 w-full lg:ml-44 text-center overflow-auto">
      <table class="table-auto">
        <thead class="bg-slate-300 p-10">
            <tr>
                <th class="px-20 py-1.5 text-sm font-semibold tracking-wide">Nama Dokter</th>
                <th class="px-20 py-1.5 text-sm font-semibold tracking-wide">Hari</th>
                <th class="px-20 py-1.5 text-sm font-semibold tracking-wide">Waktu</th>
            </tr>
        </thead>
        <tbody>
    <tr class="hover:bg-cyan-200">
      <td>dr. Ismu Sp.OG</td>
      <td>Selasa & Kamis</td>
      <td>Pukul 09:00-12:00 WIB</td>
    </tr>
    <tr class="hover:bg-cyan-200">
      <td>dr. Hendri Ginting Sp.OG</td>
      <td>Senin, Rabu & Jum'at<br>Selasa & Kamis</td>
      <td>Pukul 09:00 WIB<br>Pukul 13:00 WIB</td>
    </tr>
    <tr class="hover:bg-cyan-200">
      <td>dr. Dedy Panhar Sp.OG</td>
      <td>Senin S/D Jum'at</td>
      <td>Pukul 15:00 WIB</td>
    </tr>
    <tr class="hover:bg-cyan-200">
      <td>dr. Sofwan Sp.OT</td>
      <td>Senin S/D Jum'at</td>
      <td>Pukul 08:00-16:00 WIB</td>
    </tr>
    <tr class="hover:bg-cyan-200">
      <td>dr.Rofiman Sp.P</td>
      <td>Senin S/D Jum'at</td>
      <td>Pukul 09:00-15:00 WIB</td>
    </tr>
    <tr class="hover:bg-cyan-200">
      <td>dr. Pandang Sp.PD</td>
      <td>Selasa & Kamis</td>
      <td>Pukul 12:00 WIB</td>
    </tr>
    <tr class="hover:bg-cyan-200">
      <td>dr. Camelia Sp.PD</td>
      <td>Senin S/D Jum'at</td>
      <td>Pukul 18:30 WIB</td>
    </tr>
    <tr class="hover:bg-cyan-200">
      <td>dr. Herwin Hasan Sp.PD</td>
      <td>Selasa</td>
      <td>Pukul 15:00 WIB</td>
    </tr>
    <tr class="hover:bg-cyan-200">
      <td>dr. Wahyudi Sp.B</td>
      <td>Senin S/D Jum'at</td>
      <td>Pukul 07:00 WIB</td>
    </tr>
    <tr class="hover:bg-cyan-200">
      <td>dr. Sumaryono Sp.B</td>
      <td>Senin S/D Jum'at</td>
      <td>Pukul 13:00 WIB</td>
    </tr>
    <tr class="hover:bg-cyan-200">
      <td>dr. Ratna Dewi Sp.JP</td>
      <td>Selasa, Rabu, Kamis</td>
      <td>Pukul 15:00-17.00</td>
    </tr>
    <tr class="hover:bg-cyan-200">
      <td>dr. Hasan Basri Sp.A</td>
      <td>Senin, Rabu, Jum'at</td>
      <td>Pukul 11:00 WIB</td>
    </tr>
    <tr class="hover:bg-cyan-200">
      <td>dr. Dewi Kania Maemunah, Dr. Sp.m</td>
      <td>Senin & Kamis</td>
            <td>-- .. --</td>
    </tr>
        </tbody>
    </table>
      </div>
      <div class="flex justify-end items-center w-100 border-t p-3">
        <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
</div>
</section>
<!-- end -->


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



<script>
                          function hanyaAngka(evt) {
                            var charCode = (evt.which) ? evt.which : event.keyCode
                             if (charCode > 31 && (charCode < 48 || charCode > 57))
                       
                              return false;
                            return true;
                          }
// function send() {
//     var gen=document.forms["check"]["jk"];
//     if(gen[0].checked==false&&gen[1].checked==false) {
//         alert("babi");
//     }
// }

function validateForm() {
    var radios = document.getElementsByName("jk");
    var formValid = false;

    var i = 0;
    while (!formValid && i < radios.length) {
        if (radios[i].checked) formValid = true;
        i++;        
    }

    if (!formValid) alert("Jangan lupa pilih jenis kelamin!");
    return formValid;
}

// select = document.getElementById('select');
// if (select.value) {
//     return true;
// }
// return false;
// if (select == "") {
//     alert("babi");
//     return false;
// }


function validate() {
    var pl = document.check.pl.value;
    if(pl==""){
        alert("Pilih poli tujuan");
        document.check.pl.focus();
        return false;
    }else{
        return true;
    }
}


// function validateForm() {
//     var valid = false;
//     var x = document.check.jk;

//     for(var i=0;1<x.length;i++){
//         if(x[i].checked){
//             valid = true;
//             break;
//         }
//     }
//     if(valid){
//         return true;
//     }
//     else{
//         alert("babi");
//         return false;
//     }
// }



// popup
const modal = document.querySelector('.modal');

const showModal = document.querySelector('.show-modal');
const closeModal = document.querySelectorAll('.close-modal');

showModal.addEventListener('click', function(){
  modal.classList.remove('hidden')
});

closeModal.forEach(close => {
  close.addEventListener('click', function(){
    modal.classList.add('hidden')
  });
});


//klick
// window.addEventListener("click", function (e) {
//   if (e.target != showModal && e.target != closeModal) {
//     // showModal.classList.remove("modal");
//     closeModal.classList.add("hidden");
//   }
// });




</script>
</body>
</html>