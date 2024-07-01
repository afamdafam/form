
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <title>Survei Keefektifan Angkutan Umum Massal</title>

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/cover.css'); }}" rel="stylesheet">
  </head>

  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">Survei Keefektifan Angkutan Umum Massal</h1>
        <p class="card-text text-justify">Pembangunan infrastruktur dan pelayanan angkutan umum massal seperti Kereta Cepat, MRT, LRT dan BRT sudah dilakukan oleh pemerintah. Namun demikian, patut diduga pelayanan angkutan umum massal tersebut belum menjadi pilihan yang menarik bagi pelaku perjalanan.
        Terdapat evaluasi pelayanan angkutan umum yang menunjukkan indikator kinerja angkutan umum dengan penilaian yang baik, namun disisi lain, penggunaan kendaraan pribadi masih dominan di jalan raya. Oleh karena itu perlu kajian yang mendalam untuk mengetahui keefektifan pelayanan angkutan umum tersebut.
        Survei ini dilakukan untuk mengulas keefektifan pelayanan angkutan umum massal. Hasil dari survei ini diharapkan dapat memberi gambaran lebih mendalam berkaitan dengan keefektifan pelayanan angkutan umum massal yang harus diukur secara terperinci sehingga memberi manfaat kepada masyarakat dan dapat memberi arah pengembangan angkutan umum dimasa mendatang.
        </p>
        <p><b>Bagi responden yang berpartisipasi akan ada reward secara acak bagi responden yang mengisi. Terima kasih atas partisipasinya. </b></p>
        <p><b>Silakan pilih wilayah pelayanan angkutan umum yang biasa digunakan:</b></p>
          <a href="{{ route('forms.jabodetabek.index') }}" class="btn btn-lg btn-secondary">Wilayah JABODETABEK</a>
          <a href="{{ route('forms.jateng-diy.index') }}" class="btn btn-lg btn-secondary">Wilayah JATENG - DIY</a>
          <a href="{{ route('forms.solo.index') }}" class="btn btn-lg btn-secondary">Wilayah Solo</a>
        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
