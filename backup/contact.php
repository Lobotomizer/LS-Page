<?php
if(isset($_POST['submit'])):
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
    //your site secret key
        $secret = '6Leq1gkUAAAAAI9OgZTe9zwKAfzdljNaBFyJ86jC';
    //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

    $name = !empty($_POST['name'])?$_POST['name']:'';
    $email = !empty($_POST['email'])?$_POST['email']:'';
    $message = !empty($_POST['message'])?$_POST['message']:'';
    $category = !empty($_POST['category'])?$_POST['category']:'';
        if($responseData->success):
      //contact form submission code
      $to = 'info@ludwigsound.com';
      $subject = 'Kontaktersuch: Ludwigsound.com';
      $htmlContent = "
        <h1>Contact request details</h1>
        <p><b>Name: </b>".$name."</p>
        <p><b>Email: </b>".$email."</p>
        <p><b>Kategorie: </b>".$category."</p>
        <p><b>Message: </b>".$message."</p>
      ";
      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      // More headers
      $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
      //send email
      @mail($to,$subject,$htmlContent,$headers);

            $succMsg = 'Your contact request have submitted successfully.';
      $name = '';
      $email = '';
      $category = '';
      $message = '';
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
  $name = '';
  $email = '';
  $category = '';
  $message = '';
endif;
?>
