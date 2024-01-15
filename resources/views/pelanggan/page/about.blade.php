@extends('pelanggan.layout.index')

@section('content')
<style>
    #hotel {
        background: #f2f2f2;
        /* background: f2f2f2 linear; */
        /* height: 100vh; */
        width: 100%;
        padding: 0px 0px 100px 0px;
       
       
    }

    .catalog-hotel {
        height: 100vh;
        width: 100%;
    }

    .hero-tagline h1 {
        color: #fafafa;
        font-weight: 700;
        font-size: 48px;
        line-height: 72px;

    }

    .hero-tagline p {
        font-size: 18px;
        color: #fafafa;
        width: 90%;
    }

    .hero-tagline h4 {
        color: #fafafa;
        font-size: 18px;
        line-height: 200%
    }
    /* about */
        
        .heading {
            color: #uuuu;
            text-align: center;
            margin:20px auto;
            width: 100%;
            
        }
       
        .heading h2 {
            font-size: 36px;
            color: #333; /* Warna teks, sesuaikan dengan desain Anda */
            margin-bottom: 15px;
        }

        /* Garis bawah di bawah judul */
        .heading h2::after {
            content: "";
            display: block;
            width: 200px; /* Panjang garis bawah, sesuaikan dengan kebutuhan Anda */
            height: 2px;
            background-color: #4caf50; /* Warna garis bawah, sesuaikan dengan desain Anda */
            margin: 10px auto;
        }
      
        .about-image img {
            max-width: 80%; /* Maksimum lebar gambar adalah lebar parent */
            /* max-height: 300px; / */
            border-radius: 8px;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left:80px;
        
        }
        .about-image img:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
         }
        .row {
            display: flex;
            align-items: center;
        }

        .about-image{
            flex: 1;
            margin-right:40px;
            overflow: hidden;
        }

        .header-desk h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #666;
           
        }
        .header-desk{
            margin-left: 10px;
        }

        .body-desk p {
            font-size: 16px;
            line-height: 1.6;
            color: #6666;
        }
        .body-desk {
            padding: 15px; /* Sesuaikan dengan kebutuhan Anda */
        }
        .content-right {
            /* border: 2px solid #4caf50; Warna dan ketebalan garis tepi */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            background-color:#C3E2C2; 
        } 

        /* Style untuk tombol "See More" */
        .see-more-btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 15px;
            text-decoration: none;
            color: #ffffff; /* Warna teks */
            background-color: #4caf50; /* Warna latar belakang */
            border-radius: 20px; /* Border radius */
            transition: background-color 0.3s;
        }

        /* Hover state untuk tombol "See More" */
        .see-more-btn:hover {
            background-color: #45a049; /* Warna latar belakang saat dihover */
        }
        .social-icons {
            display: flex;
            margin-bottom: 5px;
            margin-top: 15px;
        }

        .social-icon {
            margin-right: 10px;
            color: #4caf50; /* Warna ikon sosial, sesuaikan dengan desain Anda */
            text-decoration: none;
        }
        .see-more-btn{
            width:30% ;
        }
        .container-content{
            background-color:#fff ;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding:30px;
        }
        .content-contact{
            margin-top:30px;
           
            background-color:#fff ;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding:30px;
        }

        .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .col {
            flex: 1;
            margin: 10px;
        }

        iframe {
            border: 0;
            border-radius: 10px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #666;
            margin-bottom: 10px;
        }

        .icon-contact {
            margin-right: 5px;
            font-size: 18px;
            color: #4caf50;
        }
        
        .icon-contact {
            transition: transform 0.3s ease-in-out;
        }

        .icon-contact:hover {
            transform: translateY(-10px); /* Pergeseran vertikal saat dihover, sesuaikan dengan desain Anda */
        }
        /* Define the animation class */
       
        

        

       
</style>

<section id="hotel" class="m-0 animate-scroll">
 <img class="w-100" src="{{ asset('assets/images/hom2-banner-1.png')}}" alt="Image">
    <div class="container container-fluid">
        <div class="heading ">
            <h2>About us</h2>
        </div>
        <div class="container-content">
            <div class="row">
                <div class="col">
                    <div class="about-image">
                        <img src="{{ asset('assets/images/grns.jpg')}}" >
                    </div>
                </div>

                <div class="col">
                    <div class="content-right">
                            <div class="header-desk"> 
                                <h2>Greensa Inn</h2>
                            </div>
                                <div class="body-desk">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente soluta unde dolorum assumenda nesciunt doloremque eveniet. Recusandae hic sit magni nobis ab impedit vel dolorem. Dolore inventore in hic ipsam.
                                </p>
                                <div class="social-icons">
                                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                </div>
                            <a href="#" class="see-more-btn text-center">See More</a>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="heading">
            <h2>
                contact us
            </h2>
        </div>
    <div class="content-contact">
        <div class="content-contacts" >
            <div class="row">
                <div class="col">
                    <iframe class="w-100" height="250" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d476.7755613007506!2d112.73423118312087!3d-7.322540260898505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb6c094d1b87%3A0xbc3def4f4bd2fa7!2sUniversitas%20Islam%20Negeri%20Sunan%20Ampel!5e0!3m2!1sid!2sid!4v1705291305070!5m2!1sid!2sid"   style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                
                    <div class="col">
                        <h2>Find Us</h2>
                        <p>
                            <i class="icon-contact fas fa-map-marker-alt"></i> Jl. Contoh No. 123, Kota Anda
                        </p>
                        <h2>Mail Us</h2>
                        <p>
                            <i class="icon-contact fas fa-envelope"></i> info@example.com
                        </p>
                        <h2>Call Us</h2>
                        <p>
                            <i class="icon-contact fas fa-phone"></i> +123 456 789
                        </p>
                    </div>
                  
            </div>
        </div>   
    </div>

</section>
<script>
  
</script>
@endsection
