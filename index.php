<?php
 /*
 author: Thies Müller
 contact: contactme@td00.de
 source: https://github.com/td00/qrschnitzeljagd
 license: AGPL 3.0
 */
include 'inc/db.php';
include 'inc/header.php';
?>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">qrschnitzeljagd</h5>
      <nav class="my-2 my-md-0 mr-md-3">

        <a class="p-2 text-dark" href="https://github.com/td00/qrschnitzeljagd">Git</a>
        <a class="p-2 text-dark" href="createqr.php">Create new QR-Code</a>

      </nav>
    </div>
       <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">QR-Code Schnitzeljagd</h1>
      <p class="lead">Just a crappy Website written using PHP, HTML & MySQL.</p>
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">
      
      </div>
    </div>
      
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="https://web.td00.de/woddle.gif" alt="" >
            <small class="d-block mb-3 text-muted">&copy; NO RIGHTS RESERVED! 2021</small>
          </div>
          <div class="col-6 col-md">
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">None so far</a></li>
          
            </ul>
          </div>
      
          <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="https://thiesmueller.de">Me</a></li>
              <li><a class="text-muted" href="https://github.com/td00/qrschnitzeljagd">Git</a></li>
              <li><a class="text-muted" href="https://thiesmueller.de/dsgvo/datenschmutz.html">Privacy</a></li>
              <li><a class="text-muted" href="https://thiesmueller.de/impress/">Imprint</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="ressources/js/bootstrap.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>
