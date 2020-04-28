<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Bidan Online</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="../favicon.png" type="png" sizes="16x16">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../style5.css">



    <!-- tabulator -->
    <link href="{{ url("tabulator.min.css") }}" rel="stylesheet">
    <script src="{{ url("tabulator.min.js") }}"></script>

     <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script>
         $(function(){

            $(".dropdown-menu").on('click', 'a', function(){
              $(".btn:first-child").text($(this).text());
              $(".btn:first-child").val($(this).text());
           });

        });

         $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

</head>



<body>

<div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <a href="/"><img style="height: 120px; margin-top: 20px;" src="../logo-bidanku.png" class="rounded mx-auto d-block"></a>
            <div class="sidebar-header">
                <h3></h3>
            </div>

            
            <ul style="margin-left: 10px;" class="list-unstyled">

                <!-- <li>
                    <a href="{{ url('') }}">Generate Nomor Surat</a>
                </li>
                <li>
                    <a href="{{ url('surat/list') }}">Upload Surat</a>
                </li> -->
                
                <li>
                    <a href="../daftarkia">Kesehatan Ibu Anak</a>
                </li>
                <!-- <li>
                    <a href="{{ url('admin/jenissurat') }}">Keluarga Berencana</a>
                </li> -->
             
                <!-- <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Daftar Pasien</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ url('admin/register') }}">Ibu</a>
                        </li>
                        <li>
                            <a href="{{ url('user/logout') }}">Anak</a>
                        </li>
                    </ul>
                </li> -->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Daftar Pasien
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../daftaribu">Ibu</a>
                        <a class="dropdown-item" href="../daftaranak">Anak</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session.get('bidan')['username'] }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profil</a>
                        <a class="dropdown-item" href="../logoutbidan">Keluar</a>
                </li>

                <!-- <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"></a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ url('admin/register') }}">Daftar</a>
                        </li>
                        <li>
                            <a href="{{ url('user/logout') }}">Keluar</a>
                        </li>
                    </ul>
                </li> -->
            </ul>

            

           <!--  <ul style="margin-left: 10px;" class="list-unstyled">

                <li>
                    <a href="{{ url('') }}">Generate Nomor Surat</a>
                </li>
                <li>
                    <a href="{{ url('surat/daftarsurat') }}">List Surat</a>
                </li>
                <li>
                    <a href="{{ url('surat/list') }}">Upload Surat</a>
                </li>
               <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"></a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ url('user/logout') }}">Keluar</a>
                        </li>
                        <!-- <li>
                            <a href="{{ url('admin/logout') }}">Keluar</a>
                        </li> -->
                    <!-- </ul>
                </li>
            </ul> -->


        </nav>



 <div id="content">

       <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="">

                    <button style="margin-right: 30px;" type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <h2 style="font-family:'GothamRounded-Medium'; float: right;">Lihat Detail KB</h2>

                    
                    <!--  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button> -->



                </div>
            </nav>

            <div style=" margin-top: 10px; margin-left: 90px;margin-right: 50%;" class="alert alert-success" role="alert">
                    Detail Keluarga Berencana Ibu
                </div>
            <div>
                <ul style="margin-top: 20px;  margin-left: 90px; margin-right: 50%;" class="list-group">
                        <li class="list-group-item list-group-item-primary">Tanggal Datang: {{data['tanggal_datang']}}</li>
                        <li class="list-group-item list-group-item-primary">Berat Badan: {{data['berat_badan']}}</li>
                        <li class="list-group-item list-group-item-primary">Tekanan Darah: {{data['tekanan_darah']}}</li>
                        <li class="list-group-item list-group-item-primary">Tanggal Kembali: {{data['tanggal_kembali']}}</li>
                </ul>
            </div>

            <a href="{{ url('daftarkb') }}" style="margin-top: 20px; margin-left: 90px;" class="btn btn-danger">Kembali</a>     


    <!-- <div>
        <h5 style="font-family:'GothamRounded-Medium'; margin-top: 30px; margin-left: 30px; font-weight: bold; float: none;">Keterangan:</h5>
    </div>


    <div>
        <h5 style="font-family:'GothamRounded-Medium'; font-size: 13pt; margin-top: 20px; margin-left: 30px; float: none;">Sudah Upload: {{data[0]}}</h5>
    </div>

    <div>
        <h5 style="font-family:'GothamRounded-Medium'; font-size: 13pt; margin-top: 10px; margin-left: 30px; float: none;">Belum Upload: {{data[1]}}</h5>
    </div>

    <div>
        <h5 style="font-family:'GothamRounded-Medium'; margin-top: 30px; margin-left: 30px; float: none; font-weight: bold;">Download File Excel:</h5>
    </div>
 -->
   <!--  <a style="font-family:'GothamRounded-Medium'; font-size: 13pt; margin-top: 10px; margin-left: 30px; float: none;" href="export" class="btn btn-primary">Data Keseluruhan</a>
    <a style="font-family:'GothamRounded-Medium'; font-size: 13pt; margin-top: 10px; margin-left: 0px; float: none;" href="exportsudah" class="btn btn-success">Data Sudah Upload</a>
    <a style="font-family:'GothamRounded-Medium'; font-size: 13pt; margin-top: 10px; margin-left: 0px; float: none;" href="exportbelum" class="btn btn-danger">Data Belum Upload</a> -->
</div>



</body>


</html>