<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/line-icons.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!--navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white" data-aos="fade-down">
        <div class="container">
            <a class="navbar-brand" href="#">INVENTORY MATE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--hero-->
    <section id="home" class="bg-cover hero-section" style="background-image: url(img/bg.jpeg);">
        <div class="overlay"></div>
        <div class="container text-white text-center">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-4" data-aos="zoom-in">INVENTORY<br>
                        MATE</h1>
                    <h2 class="my-4" data-aos="fade-up">Inventory yang mudah digunakan untuk mengelola barangmu!!
                </div>
            </div>
        </div>
    </section>

    <!--About Us-->
    <section id="about" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12 section-intro text-center" data-aos="fade-up">
                    <h1>About Us</h1>
                    <div class="divider"></div>
                    <p>dibawah ini adalah anggota tim kami.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="service">
                        <div class="service-img">
                            <img src="img/nv.jpeg" alt="">
                            <div class="icon"><i class="icon-camera"></i></div>
                        </div>
                        <div class="kotak" style="color: rgb(255, 252, 252)">
                            <h3 class="mt-5 pt-4">Muhammad Naufal Aji
                                <h4>Backend<br><br></h4>
                                <h6>
                                    <p> 1. membuat kode untuk menangani proses
                                    <p> register, login, logout</p>
                                    <p> 2. membuat kode untuk menangani form</p>
                                    <p> 3. membuat kode crud </p>
                        </div>

                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="service">
                        <div class="service-img">
                            <img src="img/aul.JPG" alt="">
                            <div class="icon"><i class="icon-camera"></i></div>
                        </div>
                        <div class="kotak" style="color: rgb(255, 252, 252)">
                            <h3 class="mt-5 pt-4">Austazdhah Aulia Oktafia</h3>
                            <h4>Frontend<br><br></h4>
                            <h6>
                                <p> 1. menampilkan data dari backend</p>
                                <p> 2. membuat tampilan login</p>
                                <p>3. membuat tampilan register
                                <p>4. membuat Laporan

                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="service">
                        <div class="service-img">
                            <img src="img/cda.jpg" alt="">
                            <div class="icon"><i class="icon-camera"></i></div>
                        </div>
                        <div class="kotak" style="color: rgb(255, 252, 252)">
                            <h3 class="mt-5 pt-4">Cindi Dila Apriliana</h3>
                            <h4>Frontend<br><br></h4>
                            <h6>
                                <p>1. membuat about us
                                <p> 2. membuat tampilan form</p>
                                <p> 3. membuat tampilan dashboard</p>
                                <p>4. membuat Laporan
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('dashboard.home') }}" data-aos="fade-up" class="btn btn-main">Get started</a>
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/app.js"></script>
</body>

</html>