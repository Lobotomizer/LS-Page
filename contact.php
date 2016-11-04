---
layout: page
title: Contact
subtitle: Let's get connected!
---

    <section class="wrapper style5">
        <div class="inner">
                  <section>
        <h4>Please pull your request.</h4>
    <?php

    $error = 0;
    $successMessage = '';


    if (!empty($_POST['Submit']))
    {
      $reURL = 'https://www.google.com/recaptcha/api/siteverify';
      $reSecret   = '6Leq1gkUAAAAAI9OgZTe9zwKAfzdljNaBFyJ86jC';
      $reResponse = $_POST['g-recaptcha-response'];
      $reSubmission = json_decode(file_get_contents($reURL."?secret=".$reSecret."&response=".$reResponse), true);

    	if(isset($_POST['name']) && trim($_POST['name']) == '')
      {
      	$error = 1;
        $errormessage[] = 'Name Field is empty';
      }

    	if(isset($_POST['phone']) && trim($_POST['phone']) == '')
      {
      	$error = 1;
          $errormessage[] = 'Phone Field is empty';
      }

      if(isset($_POST['email']) && trim($_POST['email']) == '')
      {
      	$error = 1;
          $errormessage[] = 'Email Field is empty';
      }

      if(isset($_POST['message']) && trim($_POST['message']) == '')
      {
      	$error = 1;
        $errormessage[] = 'Message Field is empty';
      }

      if($reSubmission['success'] != 1)
      {
        $error = 1;
        $errormessage[] = 'Recaptcha failed to verify';
      }

      if($error != 1)
      {
        //$successMessage = 'Congrats! Your request has been submitted.';
      	$successMessage = 'Thank you, we will contact you shortly.';

        $message = 'Name: '. $_POST['name']."\n\n";
        $message .= 'Fon: '. $_POST['phone']."\n\n";
        $message .= 'Mail: '. $_POST['email']."\n\n";
        $message .= "\n\n".$_POST['message']."\n\n";

        if (!empty($_POST['p'])) {
          $message .= "\n\n". strip_tags($_POST['p'])."\n\n";
        }

        mail('info@ludwigsound.com', 'Ludwig Sound Submission', $message);
      }
    }
    ?>


    <?php
    // Display Error Message(s)
    if($error == 1)
    {
      foreach ($errormessage as $l)
      {
        echo '<font color="red">'.$l.'</font>'."<br />";
      }
    }

    // Display Success Message
    if(!empty($successMessage))
    {
      echo '<font color="green">'.$successMessage.'</font>'."<br />";
    }
    ?>


      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <? if (!empty($_REQUEST['p'])) { ?><input name="p" type="hidden" value="<?= $_REQUEST['p'] ?>"><? } ?>
      <div>
        Name:
        <input name="name" type="text" size="30">
      </div>

      <div>
        Mobile:
        <input name="phone" type="text" size="30">
      </div>

      <div>
        Email:
        <input name="email" type="text" size="30">
      </div>

      <div>
        Message:
        <textarea name="message" cols="40" rows="4" ></textarea>
      </div>

      <div class="g-recaptcha" data-sitekey="6Leq1gkUAAAAAMFDFxPFMsIF1vfofnLAjJ_omC_w"></div>

      <div>
        <input name="Submit" type="submit" id="Send" value="Submit" />
      </div>
      </form>


			</section>

        </div>
    </section>
