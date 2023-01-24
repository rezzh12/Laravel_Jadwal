@include('admin.layouts.header')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top " style=" padding-left: 40px; padding-right: 40px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{asset('images/logo22.png')}}" alt="Ophelia Film"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-pills ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="#home">Home</a>
                </li>
                <li class="nav-item">
                <a  class="nav-link " aria-current="page" href="jadwal">Jadwal</a>
                </li>
                <li class="nav-item ">
                                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off text-red"></i>
                                     {{ __('Logout') }}
                                            </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
            </ul>
            </div>
        </div>
        </nav> 
        <div data-bs-spy="scroll" data-bs-target="#navbar-custom" data-bs-smooth-scroll="true"  class="scrollspy-example" tabindex="0"> 
        <section id="home">
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{asset('images/IMG_2.jpg')}}" class="d-block w-100" alt="..." style="  height:100vh;">
                    <div class="carousel-caption d-none d-md-block">
                     

                    </div>
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{asset('images/IMG_6.jpg')}}" class="d-block w-100" alt="..."  style="  height:100vh;">
                    <div class="carousel-caption d-none d-md-block">


                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{asset('images/IMG_7.jpg')}}" class="d-block w-100" alt="..."  style="  height:100vh;">
                    <div class="carousel-caption d-none d-md-block">
                      
                    </div>
                  </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
              </div>
</section>
            

              <section id = "info" style="padding-top:40px;">
            <div class="container" data-aos="fade-up">
                <h1 class="text-center" style="padding-bottom:50px;">Information</h1>
                <div class="row">
                    <div class="col-md-4">
              <div class="card card-custom" style="width: 25rem;" data-aos="fade-up-right">
                <div class="card-body">
                  <h5 class="card-title text-center" >VISI</h5>
                  <p class="card-text">SICANTIK” ( Siswa Indonesia Cerdas Akhlak mulia Nasionalis Tekun Integritas & Kreatif”</p>
                  <p class="card-text">Memiliki keimanan dan ketaqwaan yang baik dab berintegritas</p>
                  <p class="card-text">Terlaksananya proses belajar mengajar (PBM) yang bermutu</p>
                </div>
              </div>
              </div>

                <div class="col-md-4">
              <div class="card card-custom" style="width: 25rem;" data-aos="fade-up">
                <div class="card-body">
                  <h5 class="card-title text-center">Sejarah</h5>
                  <p class="card-text">Secara de facto sudah berdiri sejak tahun ajaran 1967/1968, dikukuhkan dengan Keputusan Departemen Pendidikan dan Kebudayaan Nomor</p>
                  <p class="card-text">132/UKK/3219/1968 tanggal 8 April 1968 dengan nama SMA XI Bandung, merupakan penegerian “Kelas Jauh” yang semula menginduk kepada SMA</p>
                  <p class="card-text">Negeri IV Bandung.</p>
                </div>
              </div>
              </div>

              <div class="col-md-4">
                <div class="card card-custom" style="width: 25rem;" data-aos="fade-up-left">
                  <div class="card-body">
                    <h5 class="card-title text-center">MISI</h5>
                    <p class="card-text">Terciptanya suasana keagamaan yang baik di lingkungan sekolah</p>
                    <p class="card-text">Menjadikan sekolah sebagai lingkungan pendidikan yang kondusif, menyenangkan dan bermutu.</p>
                    <p class="card-text">Mewujudkan kepribadian Pancasila dan jiwa integritas pada diri siswa.</p>
                  </div>
                </div>
                </div>
            </div>
            </div>
            </section>

            <section id="about" class="bg-light">
        <div class="container">
            <h1 class="text-center" style="padding-bottom: 50px;" data-aos="fade-up">About</h1>
            <div class="row" style="padding-bottom: 50px;">
                <div class="col-md-2 col-sm-12">
                    <img src="{{asset('images/akreditas.png')}}" class="img-rounded" width="90%" alt="" data-aos="fade-right">
                </div>
                <div class="col-md-10 col-sm-12">
                    <h3>Terakreditasi (A)</h3>
                    <p style="padding: 0px 0px;" data-aos="fade-left">
                        Akreditasi Sekolah Menengah Kejuruan Pasundan 2 Cianjur dengan Nomor SK: 204/SK/BAN-PT/Akred/PT/X/2018
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id, ea amet laborum cumque ad delectus dolore maxime quia sit autem maiores harum fuga eius at libero quibusdam eos deleniti nisi!
                    </p>
                </div>
            </div>
            <div class="row" style="padding-bottom: 50px;">
                <div class="col-md-2 col-sm-12">
                    <img src="{{asset('images/bangunan.png')}}" class="img-rounded" width="90%" alt="" data-aos="fade-right">
                </div>
                <div class="col-md-10 col-sm-12">
                    <h3>Kampus Luas, Suasana Asri & Fasilitas Lengkap</h3>
                    <p style="padding: 20px 0px;" data-aos="fade-left">
                    Akreditasi Sekolah Menengah Kejuruan Pasundan 2 Cianjur berdiri diatas lahan seluas hampir 5 Ha, mempunyai lingkungan yang asri, dengan fasilitas yang jarang dimiliki kampus lain adalah berupa lapangan sepak bola.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid impedit fugit aut maxime exercitationem ratione iste odit possimus, id tempore velit quisquam architecto eum ex at dolor, delectus nisi deleniti?
                    </p>
                </div>
            </div>
            <div class="row" style="padding-bottom: 50px;">
                <div class="col-md-2 col-sm-12">
                    <img src="{{asset('images/medal.png')}}" class="img-rounded" width="90%" alt="" data-aos="fade-right">
                </div>
                <div class="col-md-10 col-sm-12">
                    <h3>Beasiswa Siswa</h3>
                    <p style="padding: 20px 0px;" data-aos="fade-left">
                        Saat ini terdapat berbagai macam beasiswa yang dapat dimanfaatkan siswa baik dari Pemerintah Daerah, Pemerintah Propinsi maupun Pusat.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere ratione sint reprehenderit laborum corporis corrupti maxime ea laudantium iusto vero, suscipit perferendis cumque! Commodi, pariatur. Ullam labore magni molestias excepturi.
                    </p>
                </div>
            </div>
        </div>
    </section>

            <section id="lokasi"  style="padding-top:40px;">
        <div class="container-fluid" data-aos="fade-up">
            <h1 class="text-center" style="padding-bottom:50px;" >Lokasi</h1>
            <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.63833101528!2d107.14895551744384!3d-6.813769399999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e685302a228b751%3A0xdd07a32d87370719!2sSMK%20Pasundan%202%20Cianjur!5e0!3m2!1sid!2sid!4v1674177443340!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container-fluid bg-dark" style="padding: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <p>FAKULTAS & PASCASARJANA</p>
                        <ul>
                            <li><a href="">Fakultas Hukum</a></li>
                            <li><a href="">Fakultas Keguruan & Ilmu Pendidikan</a></li>
                            <li><a href="">Fakultas Teknik</a></li>
                            <li><a href="">Fakultas Sains Terapan</a></li>
                            <li><a href="">Fakultas Ekonomi & Bisnis Islam</a></li>
                            <li><a href="">Fakultas Ilmu Hukum</a></li>
                            <li><a href="">Fakultas Bahasa & Sastra Indonesia</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <p>PORTAL KAMPUS</p>
                        <ul>
                            <li><a href="">SPMI UNSUR</a></li>
                            <li><a href="">Jurnal Kampus</a></li>
                            <li><a href="">Repository Kampus</a></li>
                            <li><a href="">Dosen</a></li>
                            <li><a href="">Kemahasiswaan</a></li>
                            <li><a href="">LPPM</a></li>
                            <li><a href="">Inkubator Bisnis</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <p>KONTAK KAMI</p>
                        <P>Telepone : (0263) 270 106</P>
                        <p>FAX : 0263 261383</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        let navbar = document.getElementById('navbar');

        window.addEventListener('scroll', function(){
            let scroll = window.scrollY;

            if(scroll > 80){
                navbar.classList.add('navbar-white');
                navbar.classList.add('bg-dark');
                navbar.classList.remove('navbar-dark');
            
            } else {
                navbar.classList.remove('navbar-white');
                navbar.classList.add('navbar-dark');
                navbar.classList.remove('bg-dark');
            }
        });
    </script>
  </body>
</html>
@include('admin.layouts.footer')