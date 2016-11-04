<html>

  <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact</title>
  <meta name="description" content="Where past and present meet in Sound!">
  <!--[if lte IE 8]><script src="/js/ie/html5shiv.js"></script><![endif]-->
  <link rel="canonical" href="http://ludwigsound.com/contact.php">
  <link rel="stylesheet" href="/css/main.css" />
  <link rel="stylesheet" href="/css/responsiveslides.css" />
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
  function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
        document.getElementById("livesearch").style.border="1px solid #A5ACB2";
        document.getElementById("pagetitle").style.visibilty='hidden';
      }
    }
    xmlhttp.open("GET","http://ludwigsound.com/livesearch.php?q="+str,true);
    xmlhttp.send();
  }
  </script>
    <!--[if lte IE 8]><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
  <!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
  <link rel="alternate" type="application/rss+xml" title="Ludwig Sound" href="http://ludwigsound.com/feed.xml">
</head>


  <body>

    <!-- Page Wrapper -->
    <div id="page-wrapper">

      <!-- Header -->
<header id="header" >

  <h1><a href="http://ludwigsound.com">Ludwig Sound</a></h1>
  <form>
  <input placeholder="&#xf002;" aria-hidden="true" type="text" onkeyup="showResult(this.value)">
  <div id="livesearch"></div>
  </form>



    <nav id="nav">
        <ul>
            <li class="special">
                <a href="#menu" class="menuToggle"><span>Menu</span></a>
                <div id="menu">
                    <!-- <ul class="cd-accordion-menu animated">
                        <li><a href="/index.html">Home</a></li>
                        <li class="has-children">
                            <input type="checkbox" name="group-1" id="group-1">
                            <label for="group-1">Private</label>
                            <ul>
                                                                                                              
                            </ul>
                        </li>
                        <li class="has-children">
                            <input type="checkbox" name="group-2" id="group-2">
                            <label for="group-2">Business</label>
                            <ul>
                                                                                                              
                            </ul>
                        </li> -->
                        <ul>
                        <li><a href="http://ludwigsound.com">Home</a></li>
                                                            
                        <li><a href="/artist/">Artist</a></li>
                                                    
                        <li><a href="/references/">References</a></li>
                                
                        <li><a href="/sponsor/">Sponsoring</a></li>
                                    
                        <li><a href="/contact.php">Contact</a></li>
                        <!-- <li><a href="#">Sign Up</a></li> -->
                        <!-- <li><a href="#">Log In</a></li> -->
                        <li><a href=" /feed.xml " class="icon fa-feed"> RSS Feed</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
  <div class="clear"></div>
</header>


      <article id="main">

    <header >
        <div class="inner">
            <h2>Contact</h2>
            <p>Let's get connected!</p>
        </div>
    </header>

    <section class="wrapper style5">
        <div class="inner">
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

        </div>
    </section>

</article>


      <!-- Footer -->
<footer id="footer">
  <ul class="icons">
    
    
    
    <li><a target="_blank" href="https://twitter.com/ludwigsound" class="icon fa-twitter"
           ><span class="label">twitter</span></a></li>
    
    
    
    
    
    <li><a target="_blank" href="https://facebook.com/ludwigsound" class="icon fa-facebook-official"
           ><span class="label">facebook-official</span></a></li>
    
    
    
    
    
    <li><a target="_blank" href="mailto:info@ludwigsound.com" class="icon fa-envelope-o"
           ><span class="label">E-mail</span></a></li>
    
    
    
  </ul>
  <ul class="copyright">
    <li>&copy; 
    
      
      
    
    2016
    Ludwig Sound</li>
    <li>Design: <a href="http://html5up.net" target="_blank">HTML5 UP</a></li>
    <li>Built with: <a href="http://jekyllrb.com" target="_blank">Jekyll</a></li>
  </ul>
</footer>


      <!-- Scripts -->
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.scrollex.min.js"></script>
<script src="/js/jquery.scrolly.min.js"></script>
<script src="/js/skel.min.js"></script>
<script src="/js/util.js"></script>
<!-- Filterizr -->
<!--[if lte IE 8]><script src="js/ie/respond.min.js"></script><![endif]-->
<script src="/js/main.js"></script>
<script src="/js/jquery.filterizr.js"></script>
<!-- <script src="/js/controls.js"></script> -->
<script src="/js/filterizr-app.js"></script>
<!-- Responsive Slider -->
<script src="/js/responsiveslides.min.js"></script>
<script>
  $(function() {
    $(".artist-spotlight").responsiveSlides();
  });
</script>


    </div>

  </body>

</html>
