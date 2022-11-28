<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?= $title; ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="/logoisceer2022.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/event/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/event/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/event/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/event/lib/venobox/venobox.css" rel="stylesheet">
  <link href="/event/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/event/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="#intro" class="scrollto"><img src="/event/img/home/<?=$logo;?>" width="120px" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#publication">Publication and Index</a></li>
          <li><a href="#download">Article Template</a></li>
          
          <li><a href="#gallery">Poster Presentation</a></li>
          
          <li class="buy-tickets"><a href="/signup">Register</a></li>
          <li class="buy-tickets"><a href="/login">Sign in</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      
      
      
    </div>
  </section>

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="time">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>Conference Date</h2>
            
            <?php $d = date_create($tanggal); echo date_format($d,'F j, Y'); ?>
          </div>
          <div class="col-lg-6">
            <h2 id="demo"></h2>
            <p>DAY&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; HOUR&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;MINUTE&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;    SECOND     &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</p>
          </div>
          
        </div>
      </div>
    </section>
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>About The Conference</h2>
            <p align="justify">International Student Conference on Engineering and Environmental Research (ISCEER) is an
               annual program hosted by Universitas Komputer Indonesia (UNIKOM). ISCEER aims to share students' 
               ideas and current researches in the areas of Engineering, Environmental Science and Technology. 
               It brings together the students' and lecturers' research to be fit in practical applications and industries. 
               This conference will be held in 11 August 2022. Taking "Empowering Students' Research in Engineering and 
               Environmental Science Facing Covid-19 Post-Pandemic Recovery Condition" is the main theme. We would like 
               to invite all students' to participate in the student conference to share your current research and studies. 
               It is expected to serve as a gathering for anyone interested in exploring optimism and potential solutions 
               as well as answering issues and challenges in Covid-19 post-pandemic recovery.

            </p>
          </div>
          <div class="col-lg-3">
            <h2>Scope</h2>
            
              <b>Engineering and Computer Science</b>
              <ul>
                <li>Computer Science</li>
                <li>Big Data</li>
                <li>E-commerce and E-governance</li>
                <li>Geographic information system (GIS)</li>
                <li>Software Engineering, Information Security and Networks</li>
                <li>Architecture</li>
                <li>Urban & Regional Planning</li>
                <li>Virtual Reality</li>
                <li>Augmented Reality</li>
                <li>Fuzzy Logic</li>
              </ul>
              
          </div>
          <div class="col-lg-3">
            <br><br>
            <b>Environmental Science</b>
            <ul>
              <li>Physics</li>
              <li>Chemistry</li>
              <li>Physical Chemistry</li>
              <li>Physics Education</li>
              <li>Chemical Engineering</li>
              <li>Physics Engineering</li>
              <li>Instrumental Physics</li>
              <li>Energy and Environment Physics</li>
            </ul>
            
          </div>
        </div>
      </div>
    </section>

    <!--==========================
      Speakers Section
    ============================-->
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Speakers</h2>
          <p>Here are some of our speakers</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="speaker" align="center">
              <img src="/event/img/speakers/keynote.jpg" alt="Speaker 1" class="img-fluid" align="jusify">
              <div class="details">
                <h3><a href="speaker-details.html">Assoc. Prof. Abdulkareem Shafiq M. Al-Obaidi </a></h3>
                <p>Taylors University, Malaysia</p>
                <div class="social"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="/event/img/speakers/keynote4.jpg" alt="Speaker 2" class="img-fluid">
              <div class="details">
                <h3><a href="speaker-details.html">Irfan Dwiguna Sumitra, Ph.D</a></h3>
                <p>Universitas Komputer Indonesia</p>
                <div class="social">
                
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>

    </section>

    <!--==========================
      Sponsors Section
    ============================-->
    <section id="publication" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Publication and indexing</h2>
          <p></p>
        </div>

        <div class="row no-gutters sponsors-wrap clearfix">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="/event/img/sponsors/injuratech.png" class="img-sponsorr" alt="">
            </div>
          </div>

          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="/event/img/sponsors/injiiscom.png" class="img-sponsorr" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="/event/img/sponsors/injurplan.png" class="img-sponsorr" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="/event/img/sponsors/aip.jpg" class="img-sponsorr" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="/event/img/sponsors/scopus (1).png" class="img-sponsorr" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="/event/img/sponsors/doaj.png" class="img-sponsorr" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="/event/img/sponsors/scholar.png" class="img-sponsorr" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="/event/img/sponsors/doi-crossref.png" class="img-sponsorr" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="sponsor-logo">
              <img src="/event/img/sponsors/garuda.png" class="img-sponsorr" alt="">
            </div>
          </div>

        </div>

      </div>

    </section>
    <!--==========================
      Contact Section
    ============================-->
    <section id="important" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <br><br>
          <h2>Important Dates</h2>
          <p></p>
        </div>

        <div class="row contact-info">

          <div class="col-md-12">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <address align="left">
                <ul>
                  <li>Abstract Submission Deadline: 9 May 2022 </li>
                  <li>Review (Double blind review) abstract : 10 - 20 May 2022 </li>
                  <li>Notification of Abstract Acceptance: 21 May 2022 </li>
                  <li>Full Paper Submission Deadline: 9 June 2022 </li>
                  <li>1st Review Full Paper (Double blind review by 2 Reviewers) : 10 - 25 June 2022 </li>
                  <li>Notification of Paper Review Result: 26 June 2022 </li>
                  <li>Revised Paper Submission Deadline: 2 July 2022 </li>
                  <li>2nd Round Review Full Paper (Double blind review by 2 Reviewers) : 3 - 22 July 2022 </li>
                  <li>Notification of Paper Acceptance: 23 July 2022 </li>
                  <li>Announcement of Presentation Schedule: 1 August 2022 </li>
                  <li>Conference Date: 11 August 2022 </li>
                </ul>
                <br><br><br><br>
              </address>
            </div>
          </div>

          

        </div>

        

      </div>
    </section><!-- #contact -->
    <!--==========================
      Contact Section
    ============================-->
    <section id="download" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <br><br>
          <h2>Download</h2>
          <p></p>
        </div>

        <div class="row contact-info">

          <div class="col-md-12">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <address align="left">
                <ul>
                  <li><a href="https://docs.google.com/document/d/1v2Zmi4pNz8w6rv5pTr5KJeLy0RYisnyB/edit?usp=sharing&ouid=107835428925957359706&rtpof=true&sd=true" target="_blank" class="btn mb-1 btn-rounded btn-primary" ><span class="btn-icon-left"><i class="fa fa-download color-warning"></i> </span>Article Template</a> </li>
                  
                  
                </ul>
                <br><br><br><br>
              </address>
            </div>
          </div>

          

        </div>

        

      </div>
    </section><!-- #contact -->

    <!--==========================
      Buy Ticket Section
    ============================-->
    <section id="payment" class="section-with-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <br>
          <h2>Registration Fee</h2>
          <p></p>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Indonesian Presenter </h5>
                <h6 class="card-price text-center">IDR 2.500.000 /paper</h6>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Indonesian Presenter (Student)</h5>
                <h6 class="card-price text-center">IDR 2.000.000 /paper</h6>
                
              </div>
            </div>
          </div>
          <!-- Pro Tier -->
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">International Presenter and Participant</h5>
                <h6 class="card-price text-center">USD 300 /paper</h6>
              </div>
            </div>
            <br>
          </div>
          
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">International Presenter and Participant <b>(Student)</b></h5>
                <h6 class="card-price text-center">USD 200 /paper</h6>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Indonesian Participant </h5>
                <h6 class="card-price text-center">IDR 1.000.000 </h6>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Indonesian Participant <b>(Student)</b></h5>
                <h6 class="card-price text-center">IDR 750.000 </h6>
              </div>
            </div>
            <br>
          </div>
          
          <div class="col-lg-12">
            <div class="section-header">
          <h2>Payment</h2>
          <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
        </div>
            <div class="card">
              <div class="card-body">
                
                <h6 class="card-price text-center">
                  
                    Bank Name: <b>Bank Negara Indonesia</b>  <br>
                    Swift/BIC: <b>BNINIDJA</b> <br>
                    Account Number: <b>1141121143</b> <br>
                    Account Holder: <b>INCITEST</b>  <br>
                  </ul> 
                </h6>
              </div>
            </div>
            <br>
          </div>

        </div>

      </div>


    </section>
    <!--==========================
      Venue Section
    ============================-->
    <section id="venue" class="wow fadeInUp">

      <div class="container-fluid">

        <div class="section-header">
          <h2> Venue</h2>
          <p>Venue location info and gallery</p>
        </div>

        <div class="row no-gutters">
          <div class="col-lg-6 venue-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d17763.89472531951!2d107.6162545824724!3d-6.886877898422779!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x632d24e6061e8903!2sUniversitas%20Komputer%20Indonesia!5e0!3m2!1sen!2sid!4v1664602885927!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8">
                <h3>Universitas Komputer Indonesia, Bandung, Indonesia</h3>
                <p><br><br><br><br><br><br></p>
              </div>
            </div>
          </div>
        </div>

      </div>

      

    </section>

    <!--==========================
      Hotels Section
    ============================-->
    

    <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Poster Presentation</h2>
          <p>Check our Poster Presentation </p>
        </div>
      </div>

      <div class="owl-carousel gallery-carousel">
        
        <?php foreach($pos as $p): ?>
        <a href="/poster/<?=$p['poster']?>" class="venobox" data-gall="gallery-carousel"><img src="/poster/<?=$p['poster']?>" alt=""></a>
        <?php endforeach; ?>
      </div>

    </section>

    

    

    

    <!--==========================
      Contact Section
    ============================-->
    

  </main>


  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Tim Konferensi UNIKOM</strong>. All Rights Reserved 2022
      </div>
      <div class="credits">
        
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="/event/lib/jquery/jquery.min.js"></script>
  <script src="/event/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/event/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/event/lib/easing/easing.min.js"></script>
  <script src="/event/lib/superfish/hoverIntent.js"></script>
  <script src="/event/lib/superfish/superfish.min.js"></script>
  <script src="/event/lib/wow/wow.min.js"></script>
  <script src="/event/lib/venobox/venobox.min.js"></script>
  <script src="/event/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="/event/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="/event/js/main.js"></script>
  <script>
    //get Tanggal
    var tgl = <?php echo json_encode($tanggal, JSON_HEX_TAG);?>
// Set the date we're counting down to
var countDownDate = new Date(tgl).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;" + hours + "  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; "
  + minutes + "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " + seconds + "   &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = 00 + "  &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;" + 00 + "  &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; "
  + 00 + "&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   " + 00 + "   &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;";
  }
}, 1000);
</script>
</body>

</html>
