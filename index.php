<?php
  // controllo che sia stato cliccato il submit
  if(isset($_POST['submit'])) {
    // setto il mittente della mail
    $from = $_POST['email'];
    // setto il destinatario
    $to = 'info@startae14.gq';
    // l'oggetto
    $subject = 'Email signup';
    $subjectConf = 'Email confirmation';
    
    // ed il corpo
    $body = file_get_contents("email_template/thanks_email.html");
    //$body = 'Please sign me up to the mailing list';
    
    $response = 'Thank you. See you soon!';
    
    // Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Additional headers
    $headers .= 'From: ' . $from . "\r\n";
    $headers .= 'Reply-To: ' . $from . "\r\n";
    
    // controllo se nn è stato inserito un valore per la email
    if(!$_POST['email']) {
      // setto il messaggio errore
      $emailError = '<script> toastMessage("<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> &nbsp;Please enter a valid email address", "error"); </script>';
    }
    
    // se invece nn ci sono errori
    if (!$emailError) {
      // se va a buon fine l'invio email
      if (mail ($to, $subject, $body, $headers)) {
        // do messaggio di successo
        $result = '<script> toastMessage("<i class=\"fa fa-check\" aria-hidden=\"true\"></i> &nbsp;thank you we\'ll keep you updated", "success"); </script>';
        // Set content-type header for sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // Additional headers
        $headers .= 'From: ' . $to . "\r\n";
        $headers .= 'Reply-To: ' . $to . "\r\n";
        mail ($from, $subjectConf, $body, $headers);
      // se invece qualcosa nell'invio mail nn va a buon fine
      } else {
        // do il messaggio di errore
        $result = '<script> toastMessage("<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\"></i> &nbsp;sorry there is been an error, please try again", "error"); </script>';
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700" rel="stylesheet">
  </head>
  <body>
    <!-- LOGO -->
    <section id="logo">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-xs-center">
            <img src="img/my-logo.png" class="img-fluid" alt="Logo Image">
          </div>
        </div>
      </div>
    </section>
    <!-- END LOGO -->
    
    <!-- INTRO -->
    <section id="intro">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>
              we're working hard, we'll be ready to launch in...
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- END INTRO -->

    <!-- COUNTER -->
    <section id="counter">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="countdown"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- END COUNTER -->
    
    <!-- ICONS -->
    <section id="icons">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="list-inline">
              <a href="#" target="_blank">
                <li class="list-inline-item"><i class="fa fa-twitter-square fa-3x twitter" aria-hidden="true"></i></li>
              </a>
              <a href="#" target="_blank">
                <li class="list-inline-item"><i class="fa fa-facebook-square fa-3x facebook" aria-hidden="true"></i></li>
              </a>
              <a href="#" target="_blank">
                <li class="list-inline-item"><i class="fa fa-google-plus-square fa-3x google-plus" aria-hidden="true"></i></li>
              </a>
              <a href="#" target="_blank">
                <li class="list-inline-item"><i class="fa fa-instagram fa-3x instagram" aria-hidden="true"></i></li>
              </a>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- END ICONS -->
    
    <!-- SIGNUP -->
    <section id="signup">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form class="form-inline" role="form" method="post" action="#signup">
              <input type="email" class="form-control form-control-sm" name="email" placeholder="Enter your email">
              <button type="submit" class="btn btn-signup btn-sm" name="submit" value="send">find out more</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- END SIGNUP -->    

    <div id="snackbar">Some text some message..</div>

    
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.countdown.min.js"></script>
    <script>
      $(function() {  
        $('.countdown').countdown({
            date: "June 7, 2027 15:03:26"
        });
      });

      function toastMessage(message, classEle) {
        // Get the snackbar DIV
        var x = document.getElementById("snackbar")
        // Add the "show" class to DIV
        x.className = "show " + classEle;
        x.innerHTML = message;

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
    </script>
    <?php echo $emailError;?>
    <?php echo $result;?>
  </body>
</html>