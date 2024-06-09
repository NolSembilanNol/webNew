<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEALS.</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include('partials/navbar.php') ?>

    <div class="wrapper">
        <!-- untuk home -->
        <section id="home">
            <img src="assets/img/gambar.png"/>  
            <div class="kolom_home">
                <p class="deskripsi">Halloo...</p>
                <h2>Selamat datang di website kami</h2>
                <p class="informasi">Website kami menyediakan informasi terkait distribusi fasilitas kesehatan, seperti rumah sakit, puskesmas, apotek, secara informatif. Anda dapat mengetahui fasilitas-fasilitas kesehatan yang tersedia di beberapa tempat di kota Mataram.</p>
                <p><a href="" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
            </div>
        </section>

        <!-- untuk courses -->
        <section id="courses">
            <div class="kolom">
                <!-- <p class="deskripsi">You Will Need This</p> -->
                <h2>Temukan fasilitas kesehatan terdekat dengan mudah!!</h2>
                <p>Dengan HEALS, Anda dapat dengan mudah menemukan fasilitas kesehatan terdekat di Kota Mataram. Kami menyediakan informasi lengkap dan akurat tentang rumah sakit, puskesmas, dan klinik untuk memenuhi kebutuhan kesehatan Anda. Jangan khawatir mencari fasilitas kesehatan, karena kami siap membantu Anda menemukan yang terbaik.</p>
                <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed deserunt voluptatibus possimus blanditiis reiciendis. Qui, facilis! Delectus exercitationem dolores sapiente?</p> -->
                <p><a href="" class="tbl-biru">Pelajari Lebih Lanjut</a></p>
            </div>
            <img src="assets/img/lokasi.png"/>
        </section>

        <!-- untuk tutors -->
        <section id="tutors">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi"></p>
                    <h2>Our Team</h2>
                    <p>Tim kami berdedikasi tinggi dalam memberikan informasi mengenai fasilitas kesehatan terdekat. Dengan pengalaman yang dimiliki, kami siap memberikan informasi dan layanan terbaik untuk membantu Anda menemukan fasilitas kesehatan terdekat yang sesuai dengan kebutuhan Anda. Kami percaya bahwa kesehatan adalah aset berharga, dan kami berkomitmen untuk mendukung Anda dalam menjaga kesehatan dengan menyediakan informasi yang akurat dan terpercaya.</p>
                </div>

                <div class="tutor-list">
                    <div class="kartu-tutor">
                        <img src="assets/img/F1D022090.jpg"/>
                        <p>Ridho Adhimam Putra</p>
                    </div>
                    <div class="kartu-tutor">
                        <img src="https://img.freepik.com/premium-photo/illustration-anime-girl_796245-2.jpg?w=740"/>
                        <p>Ida Ayu Dewi Purnama Anjani</p>
                    </div>
                    <div class="kartu-tutor">
                        <img src="https://img.freepik.com/premium-photo/smiling-woman-glowing-with-positive-energy-creativity-cute-simple-anime-style-illustration_1061358-8713.jpg?w=740"/>
                        <p>Ameylia Intan Zurtika Ayu</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- untuk partners -->
        <section id="partners">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Our Top Partners</p>
                    <h2>Partners</h2>
                    <p>Kami bekerja sama dengan berbagai mitra terpercaya yang berkomitmen untuk memberikan pelayanan kesehatan terbaik, yang terdiri dari rumah sakit, puskesmas, dan klinik sekitar kota Mataram. Kami bergerak dibawah Universitas Mataram dan Prodi Teknik Informatika.</p>
                </div>

                <div class="partner-list">
                    <div class="kartu-partner">
                        <img src="https://unram.ac.id/wp-content/uploads/2018/09/UNRAM-LOGO-FIX-STATUTA--600x584.png"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="https://avatars.githubusercontent.com/u/118701312?s=280&v=4"/>
                    </div>
                    <!-- <div class="kartu-partner">
                        <img src="assets/img/https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-62.jpg"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="assets/img/https://www.designevo.com/res/templates/thumb_small/encircled-branches-and-book.png"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="assets/img/https://image.freepik.com/free-vector/campus-collage-university-education-logo-design-template_7492-64.jpg"/>
                    </div> -->
                </div>
            </div>
        </section>
    </div>
    
    <!-- Footer -->
    <?php include('partials/footer.php') ?>
</body>
</html>