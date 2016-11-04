<html>

  <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact</title>
  <meta name="description" content="Where past and present meets in Sound!">
  <!--[if lte IE 8]><script src="/js/ie/html5shiv.js"></script><![endif]-->
  <link rel="canonical" href="/9_contact.html">
  <link rel="stylesheet" href="/css/main.css" />
  <link rel="stylesheet" href="/css/responsiveslides.css" />
  <script src="https://www.google.com/recaptcha/api.js"></script>
    <!--[if lte IE 8]><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
  <!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
  <link rel="alternate" type="application/rss+xml" title="Ludwig Sound" href="/feed.xml">
</head>


  <body>

    <!-- Page Wrapper -->
    <div id="page-wrapper">

      <!-- Header -->
<header id="header" >


<form action="/search.html" method="get">
  <input type="text" id="search-box"  name="query">
  <h1><a href="/index.html">Ludwig Sound</a></h1>
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
                    <li><a href="/index.html">Home</a></li>

                    <li><a href="/artist.html">Artist</a></li>

                    <li><a href="/references.html">References</a></li>

                    <li><a href="/sponsor.html">Sponsoring</a></li>

                    <li><a href="/contact.php">Contact</a></li>
                    <!-- <li><a href="#">Sign Up</a></li> -->
                    <!-- <li><a href="#">Log In</a></li> -->
                    <li><a href=" /feed.xml " class="icon fa-feed"> RSS Feed</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
</header>


      <article id="main">

    <header>
        <div class="inner">
            <h2>Contact</h2>
            <p>Let's get connected!</p>
        </div>
    </header>

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

</article>


      <!-- Footer -->
<footer id="footer">
  <ul class="icons">



    <li><a target="_blank" href="https://twitter.com/ludwigsound" class="icon fa-twitter"
           ><span class="label">twitter</span></a></li>





    <li><a target="_blank" href="https://linkedin.com/in/ludwigsound" class="icon fa-linkedin-square"
           ><span class="label">linkedin-square</span></a></li>





    <li><a target="_blank" href="https://facebook.com/ludwigsound" class="icon fa-facebook-official"
           ><span class="label">facebook-official</span></a></li>





    <li><a target="_blank" href="https://plus.google.com/u/0/+<username>" class="icon fa-google-plus-square"
           ><span class="label">google-plus-square</span></a></li>





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
<!-- Lunar Search -->
<script>
  window.store = {

      "1-artist-html": {
        "title": "Artist",
        "author": "",
        "category": "",
        "content": "    Live Roster            Live Roster        Vintage Electro        Balkan/World        Blues/Rock                                                                                                                Balca Bandanica                                                                                                              Batiar Gang                                                                                                              Bomba Titinka                                                                                                              Budzillus                                                                                                              Club des Belugas                                                                                                              Coogans Bluff                                                                                                                                        Ginkgoa                                                                                                              Grant Lazlo                                                                                                              John Fairhurst                                                                                                                                        La Fanfarria del Capitan                                                                                                              Lamuzgueule                                                                                                                                                                  Pep's Show Boys                                                                                                                                        Rumba de Bodas                                                                                                              Tankus the henge                                                                                                              Tape Five                                                                                                              The Carny Villians                                                                                                              Babbutzi Orkestar                                                                                                                                        Jenova Collective                                                                                                                                                                  Tantz                                                                                                                                                                                                                                                                                                              DJ Roster            DJ Roster        Vintage Electro        Global Bass                                                                                                                                                                                                                                                                            DJ Farrapo                                                                                                                                                                                            Kiwistar                                                                                                                                                                  LordJustice                                                                                                              Nellski                                                                                                                                        Rosantique                                                                                                                                                                                                                                                Cab Canavaral                                                                                                                                        Mr. Woox                                                                                                              Offbeatterrorist                                                                                                                                                                                                                                                                                                                                    ",
        "url": "/1_artist.html"
      }
      ,

      "artist-2016-09-balca-bandanica-html": {
        "title": "Balca Bandanica",
        "author": "",
        "category": "",
        "content": "                                             Born from the intersection of varied experiences Folk, the Balca Bandanica captures the festive excuse like that to create a unique blend.            The Balca stems from the button to develop a folk / Balkan group that contemplates inside the mind \"BANDANICO\" that distinguishes this band. This project sees the light in August 2011 when, as a joke, addressed for the first time a concert                tour.            Thanks to the results, totally unexpected, if you started with a series of live who have seen the involvement of several great musicians. Always looking for new sounds to interpret the \"BALKA\" retraces a repertoire minded but clear Balkan                matrix. Energy, radiant sunshine and fantasy are the basic elements of this group, but not only ...            ",
        "url": "/artist/2016_09_balca_bandanica.html"
      }
      ,

      "artist-2016-09-batiar-gang-html": {
        "title": "Batiar Gang",
        "author": "",
        "category": "",
        "content": "                                                    There it is: the pure, bare bones of our Balkan-Blatnik-trash-mashup-Project with that highly tragic name Batiar Gang. We are eight young people from Leipzig, Saxony, Germany that decided to dedicate our live and liver to sex, Balkan music and vodka in November 2014. We, that is namely, Melanka (vocals/violin), Alex (guitar/vocals), Sebbel (drums), Josie (trumpet), Hannes (bass), Stefan (accordion/trombone), Tony (horn/trumpet) and Matze (baritone sax/clarinet) and all we                do is music.            ",
        "url": "/artist/2016_09_batiar_gang.html"
      }
      ,

      "artist-2016-09-bomba-titinka-html": {
        "title": "Bomba Titinka",
        "author": "",
        "category": "",
        "content": "                                          When jazz was the most popular and most danced to music in America, when parties were over the top and women were scantily dressed, SWING was the password.Bomba Titinka is the name of a project whose goal is to unite an international audience by bringing the magical formula of electronic digital music to the stage and combining it with talented musicians from the Swing scene.                                          Press                        Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum                ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.            ",
        "url": "/artist/2016_09_bomba_titinka.html"
      }
      ,

      "artist-2016-09-budzillus-html": {
        "title": "Budzillus",
        "author": "",
        "category": "",
        "content": "                                                  Founded in 2008 by five local Berliners, BudZillus have developed into one of the German capital's most successful bands; their first two albums presenting a mix of swing, punk and balkan beat that created a very own Berlin-sound that started on the streets.                After more than 500 concerts, nationally and internationally, including tours in the USA, Russia and Mexico, the band have earned themselves a loyal fanbase, filling concert-halls with 500-1000 capacity. The well-known Berliner Schnauze meets international flair and hand-made warmth. BudZillus's concerts are like a big balkan wedding party – people singing along, people dancing, people sweating, both on stage and in front of it.                                        On Tour                        Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing                blandit tempus accumsan.                                        Press                        It's insane balkan music, crazy like a young monkey, musically a wild mix of styles – a bit of              swing, a bit of ska, a lot of polka. But it's not about the genre, it's about the huge excess in              itself, the exuberant, pure energy. The jokey lyrics are thrown out like you'd chuck vodka              glasses at a wall with the aim of shattering them today to find happiness tomorrow.              - FAZ            ",
        "url": "/artist/2016_09_budzillus.html"
      }
      ,

      "artist-2016-09-club-des-belugas-html": {
        "title": "Club des Belugas",
        "author": "",
        "category": "",
        "content": "                                                            Club des Belugas is one of the leading Nujazz bands in Europe, perhaps in the world.                They combine contemporary European Lounge &amp; Nujazz Styles with Brazilian Beats, Swing and American Black Soul of the fifties, sixties and seventies using their unique creativity and intensity.                                                                    Press                                Club des Belugas tracks have been licensed for compilations more than 220 times. They have also been licensed for advertisements and TV commercials from companies like: Mercedes-Benz, BMW, Lexus (Toyota), Ford Mondeo, Smart, KIA motors,                    Campari, Martini, Strenesse, The German National Soccerteam, Kaufhof, Burlington, Unilever, Telekom Germany, Telekom South Korea, IGEDO …                - ChinChin Records                    ",
        "url": "/artist/2016_09_club_des_belugas.html"
      }
      ,

      "artist-2016-09-coogans-bluff-html": {
        "title": "Coogans Bluff",
        "author": "",
        "category": "",
        "content": "                                                    ! Booking requests only for Italy !            Where other bands stuck within their creative process or completely dissolve, COOGANS BLUFF managed to reinvent themselves during challenging times. Their singer left the band 2012 and bassist Clemens Marasus took the job whereupon their unique                sound and own style completely emerged.            COOGANS BLUFF is a band that knows how to combine the best of both worlds ... in fact best of some more worlds/far more than two actually. With a sound that is retro and contemporary at the same time they win over the hearts of Retro-Rock                traditionalists and still show experimental, fresh and daring ideas. Buckle up, kick back and listen without distraction! We'll meet again in outer space.                                        Press                        [Coogans Bluff creates a] blend of 60s/70s-Hardrock, Hippie-Funk and some kind of Captain Beefheartesque Blues deconstruction.            - Rolling Stone            ",
        "url": "/artist/2016_09_coogans_bluff.html"
      }
      ,

      "artist-2016-09-dj-farrapo-html": {
        "title": "DJ Farrapo",
        "author": "",
        "category": "",
        "content": "                                                              Italian dj, musician and producer. His solid reputation as a dj has seen him perform in clubs from Italy, Austria, Germany, England, Portugal, Spain, Bulgaria, Polonia, Hungaria, Slovakia, Czech Republic, Greece, Belgium, France, Switzerland,                    Denmark, Brasil.                His research and production style is influenced by his love of traditional music from all over the world and he has perfected a unique blend of Balkan, Brazilian and Afro sounds mixed up with contemporary dancefloor rhythms such as drum’n’bass,                    broken beat &amp; break beat.                                He remixed well known bands and artists like The New Mastersound, Ojos De Brujos, Solo Moderna, Roy Paci, Janko Nilovic, Makala, Municiplae Balcanica…                                                                    Press                                As a producer behind tons of massive releases Farrapo is an originator of mixing global sounds with contemporary dance floor flavours from Brazilian drum and bass to Afro-Latin and swing – he's also one of the finest global beat DJs around.                - Rythm Passport                    ",
        "url": "/artist/2016_09_dj_farrapo.html"
      }
      ,

      "artist-2016-09-ginkgoa-html": {
        "title": "Ginkgoa",
        "author": "",
        "category": "",
        "content": "                                                                    She comes from New York, he leaves in Paris - her name is Nicolle Rochelle, his name is Antoine Chatenet and fighting against all the odds of their geographic destiny, they have found each other.                                        As a hybrid genre between Caro Emerald and Caravan Palace, they only have one idea in mind: to make generations of people dance, sway, and sing along to melodies that stay in your head long after GINKGOA has left the building, as long as the Ginkgo, their tree totem namesake, continues to survive.                             Ginkgoa is a French/American Pop Electroswing band founded in Paris in 2010. The band is composed of Nicolle Rochelle (American singer, author and dancer) and Antoine Chatenet (French composer and producer). The duo has been backed on stage by the drummer Grégory D’Addario, the bassist Anne-Colombe Martin and the clarinetist, keyboardist Corentin Giniaux.                                                    Press                        They played more than 200 shows in China, the USA and Europe and gained several prices for their work. Together they form GINKGOA,- alias Nicolle Rochelle and Antoine Chatenet- and they create a colorful mix out of french chansons with american vibes and american songs with french touch. Their musical influences lie in current pop melodies, Swing of the old New York and it reaches to modern Electro. Inspired by artists such as Caro Emerald or Caravan Palace, they are a real experience                when you see them live.                            - Schlachthof HNA                        ",
        "url": "/artist/2016_09_ginkgoa.html"
      }
      ,

      "artist-2016-09-grant-lazlo-html": {
        "title": "Grant Lazlo",
        "author": "",
        "category": "",
        "content": "                                                              Grant Lazlo is Paul Hézard, a French electronic music producer from cosmopolitan Marseille who takes vintage sounds and brings them up to date with a sprinkling of electro. It’s sociable, party music, sure to make you smile and most importantly, guaranteed to make you dance.                                      His love of music started at an early age, growing up listening to the music of the greats, such as Duke Ellington, Stevie Wonder and Django Reinhardt, paving the way for the unique eclectic sound he’s known for today. From his earliest steps in the music scene, to his latest minimal vintage production, Grant Lazlo always pays tribute to his many musical idols, by mashing beats and melodies from the greatest songbooks in history.                                        Lazlo recently signed to Loop De Loop Music, also home to dance music band, The Egg. He will be releasing a complication series through the label over Summer 2016 coinciding with his appearance at Glastonbury.                                        No stranger to playing live, Grant’s sets are always full of good vibes and energy, crisscrossing genres to combine, electro, soul, jazz, reggae, funk and blues. He has toured playing to crowds in clubs and festivals all over the world including Rainbow                Serpent Festival (Australia), Fusion (Germany), Ressonar (Brazil), Marsatac (France), Ritter Butzke (Berlin), La Bellevilloise (Paris), Astra (Berlin) and at most of the major UK festivals.                                                    On Tour                        Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing                blandit tempus accumsan.                                        Press                        Lazlo is no stranger to playing live, his superfunky sets are a journey through music history, crisscrossing genres to combine electro, soul, jazz, reggae, funk and blues. The EP comes off the back of three storming sets at Glastonbury, Fusion Festival and GIVE! He will also play later this summer at 3000grad festival, and Human Evolution Festival.                              - I House U about \"Shoeshine Rag\"-EP                          ",
        "url": "/artist/2016_09_grant_lazlo.html"
      }
      ,

      "artist-2016-09-john-fairhurst-html": {
        "title": "John Fairhurst",
        "author": "",
        "category": "",
        "content": "                                                                            The British rock guitar phenomenon. Sucker punch solos and a gravel swilled belter of a voice.            The new album is a big, loud dirty affair. The band have once again enlisted producer Alex Beitzke (Jamiroquai, Florence and The Machine, Nigel Kennedy) and are currently laying down tracks at Dean Street Studios in London and Clifthouse Studios in Bristol. After a great year on the road, in the studio and in each other’s pockets, the band have refined their sound and this record represents a musical evolution, with John citing a melting pot of influences from Jack White and The Black Keys to Queens of the Stone Age, Black Sabbath, Hendrix, Zappa, Iggy Pop, Captain Beefheart and Led Zeppelin. Alongside the heavy electric guitar riffs, face-melting solos and unmistakeable growling vocals we have to come expect from John Fairhurst, this album is an outspoken expression of his view on the world and our position in it, and is due for release in late 2016.                                        Press                        If you’re sick of hearing second and third generation blues revivalists recycling smooth guitar licks and bland vocals (no, I’m not naming names) then this could be just the album for you; don’t file under easy listening.            - Allan Mackay, Music Riot            ",
        "url": "/artist/2016_09_john_fairhurst.html"
      }
      ,

      "artist-2016-09-kiwistar-html": {
        "title": "Kiwistar",
        "author": "",
        "category": "",
        "content": "                                                    Kiwistar is A French-Indian Dj Based in Paris.                        Well Known in the electro swing circle all around the world since few years, Kiwistar has play with the major acts of the genre and win some awards at electro swing awards.                        He has the reputation to bring the Electro Swing Jazzy Funky Style to another level melting it with Dubstep DNB Trap or Hard Techno in Live, melting the happiness and heavyness.                        As a producer, Kiwistar has follow the same path of eclectism and diversity and can produce from 100 to 190 BPM from Chill tracks to Party Anthems.                        His Next releases will be delivered soon on SpoonS Records.                                                    Press                        Kiwistar is a Paris Based Dj specialising in the Electro Swing Style. His Dj sets are a melting pot of influences like French Touch Dubstep and Electro DNB and many more styles besides, bringing a diversity of musical styles into a single                Electro Swing Set. He has shared the stage with many famous artists inside the Electro Swing World (Bart and Baker, Swing Republic, Dutty Moonshine, Odjbox, Dj Switch, The Killers Dillers, Josh et le Chat, Vassili Gemini, Paul H4ck, Swingrovers,                Nick Hollywood, Movits!, The Correspondents) or outside (Spiral Tribe, Elisa Do Brasil, Bobmo, DVNO, Minitel, Rose QG Obey!, Flechette, Kenhutchinson). He's an accomplished Live DJ who has been nominated and awarded 3 times at Electro                Swing Awards (3rd Best DJ 2010, 1st Best DJ 2011, 2nd Best Live DJ 2012).            - Resident Advisor            ",
        "url": "/artist/2016_09_kiwistar.html"
      }
      ,

      "artist-2016-09-la-fanfarria-del-capitan-html": {
        "title": "La Fanfarria del Capitan",
        "author": "",
        "category": "",
        "content": "                                          Area for booking request: Italy                        Like a pirate crew the musicians of the 'Capitán' from Argentina travel the whole globe, spreading their self made genre ,Fanfarria Latina‘. This is an explosive mixture of Balkan Beat, Cumbia, Rock, Reggae, Ska and other colorful sounds. With this unique combination of stirring Latin American rhythms and rousing Balkan Styles, they inspire their delighted fans worldwide! But it’s not only about music, it’s the special awareness of life full of passion and dancing mania, celebrated on stage with plenty of fun and positive energy. Capitan Tifus was founded 2006 in Buenos Aires and bring their powerful melodies and beats to all continents, with lots of heavy acclaimed gigs in Europe, South America, Russia, China and Japan. On their forthcoming mammoth tour in summer 2016 through whole Europe, La Fanfarria del Capitán present their new album \"La Giravida\"!                                            On Tour                    Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing              blandit tempus accumsan.                                            ",
        "url": "/artist/2016_09_la_fanfarria_del_capitan.html"
      }
      ,

      "artist-2016-09-lamuzgueule-html": {
        "title": "Lamuzgueule",
        "author": "",
        "category": "",
        "content": "                                                              Grant Lazlo is Paul Hézard, a French electronic music producer from cosmopolitan Marseille who takes vintage sounds and brings them up to date with a sprinkling of electro. It’s sociable, party music, sure to make you smile and most importantly, guaranteed to make you dance.                                      His love of music started at an early age, growing up listening to the music of the greats, such as Duke Ellington, Stevie Wonder and Django Reinhardt, paving the way for the unique eclectic sound he’s known for today. From his earliest steps in the music scene, to his latest minimal vintage production, Grant Lazlo always pays tribute to his many musical idols, by mashing beats and melodies from the greatest songbooks in history.                                        Lazlo recently signed to Loop De Loop Music, also home to dance music band, The Egg. He will be releasing a complication series through the label over Summer 2016 coinciding with his appearance at Glastonbury.                                        No stranger to playing live, Grant’s sets are always full of good vibes and energy, crisscrossing genres to combine, electro, soul, jazz, reggae, funk and blues. He has toured playing to crowds in clubs and festivals all over the world including Rainbow                Serpent Festival (Australia), Fusion (Germany), Ressonar (Brazil), Marsatac (France), Ritter Butzke (Berlin), La Bellevilloise (Paris), Astra (Berlin) and at most of the major UK festivals.                                                    On Tour                        Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing                blandit tempus accumsan.                                        Press                        Lazlo is no stranger to playing live, his superfunky sets are a journey through music history, crisscrossing genres to combine electro, soul, jazz, reggae, funk and blues. The EP comes off the back of three storming sets at Glastonbury, Fusion Festival and GIVE! He will also play later this summer at 3000grad festival, and Human Evolution Festival.                              - I House U about \"Shoeshine Rag\"-EP                          ",
        "url": "/artist/2016_09_lamuzgueule.html"
      }
      ,

      "artist-2016-09-lordjustice-html": {
        "title": "LordJustice",
        "author": "",
        "category": "",
        "content": "                                                                                                      LordJustice brings to you the finest in British Electro-Swing. Old fashioned as he is, he mixes everything per hand, providing a 1920s retrospective spanning everything with a jive, a groove or a swing to it. Obscure samples and cinematic                          breaks is what sets LordJustice apart from the rest, this vinyl archaeologist is someone definitely not to be missed.                                            LordJustice began his career in Switzerland learning the ropes with a diet of deep-house/minimal-tech, before moving to London in 2009, where he discovered Electro-Swing. After organising parties throughout London, he set his sights on Berlin                          where he currently resides as the King of Swing. Throwing regular events in Chalet and Brunnen70, Lordjustice is very much a part of the Berlin scene.                                                                                            Press                                            Not one, not two but three decks pumping out electroswing madness!                      - Rumpus London                              ",
        "url": "/artist/2016_09_lordjustice.html"
      }
      ,

      "artist-2016-09-nellski-html": {
        "title": "Nellski",
        "author": "",
        "category": "",
        "content": "                                                    Nellski’s musical roots are electronic. Nevertheless, his DJ career began with Balkan brass music. First on stage and then in radio multicult.fm. It was not long until he was looking for combinations with electronic music. Of corse Electro                Swing was added quickly. Today, his repertoire has grown immensely.                        He combines the 4/4-beat with music of all corners of the world or juicy times and likes to play with nice memories of his audience. Without a doubt in Nellski’s world danceability and humor belong together.                        As a part of the Monda Exotica DJ team with DJ Tomahawk he organizes parties with same name in Berlin. After his first Releases with Bomba Titinka on ChinChin Records and Skazka Orchestra on Acker Records won recognition he became part of                the LudwigSound family.                        Furthermore he works as audio engineer and occasional broadcaster for the Berlin based broadcast and YouTube talkshow Rederei FM as well as graphic artist for event and music promotion.                                                    Press                        Berlins legendary vintage remix DJ and the producer of Bomba Titinka, Italians support band of Parov Stelar ...            - Electro Swing Club London            ",
        "url": "/artist/2016_09_nellski.html"
      }
      ,

      "artist-2016-09-peps-show-boys-html": {
        "title": "Pep&#39;s Show Boys",
        "author": "",
        "category": "",
        "content": "                                             Pep Alegria (aka Groovy Joy) and Pep Durán join together their career as professional deejays to offer the most elegant Swing music with electronic flavors. A powerful trend, very popular in the North of Europe, recently reaching Spain through                many advertising spots. A perfect product to create the best of the shows. Charisma and freshness along with a selection of authentic music are the values of a demanding audience, who wish to enjoy the perfect combination between art and                entertainment.                        A live show designed for exclusive private parties, exclusive events or first class clubs.            ",
        "url": "/artist/2016_09_peps_show_boys.html"
      }
      ,

      "artist-2016-09-rosantique-html": {
        "title": "Rosantique",
        "author": "",
        "category": "",
        "content": "                                                    Blessed with a cultural heritage that stretches back for centuries, Milan is home to many of the worlds leading artistic, cultural and fashion icons. With genes seemingly cherry-picked from that cultural DNA, we have Rosantique. Talented and stylish, she is also gifted with an ability to enter into her music, gift wrap it’s soul and then give it to her audience so that they might bathe in the glow of her renditions. In addiction, she reflects the typical Italian classy attention to all the details and performing in sought dresses and accessories matching with pure pin up hairstyle and makeup.                                                    Press                        Rosantique is currently at the forefront of the Italian Electro Swing scene, acting as a triple-threat pin-up, DJ, and vocalist. Back in April, she released a new single, Walk Your Shoes, complete with a roaring 20’s speakeasy vibe music video. \"Walk your shoes\" is a great mix of live band elements and electronics, allowing the instrumentalists to do their thing, with the drum machine back beat providing a firm foundation to the overall mix.            - After Retro            ",
        "url": "/artist/2016_09_rosantique.html"
      }
      ,

      "artist-2016-09-rumba-de-bodas-html": {
        "title": "Rumba de Bodas",
        "author": "",
        "category": "",
        "content": "                                                                    RUMBA de BODAS formed in 2008, from the union of eight musician with very different energies, experiences and ideas. Over the years it developed an exquisitely singular style, which blends together latin grooves, Balkan, Swing, Ska and Reggae and has                had people dancing under stages everywhere from Italy to London, and from Romania to Spain.                                        They love brass sections, upbeat music, all sort of traditional folky sort of stuff, but mainly they love to mix all of this together, throwing in half a kilo of chili powder to make sure you're going to stomp your feet as much as possible. It is this                very mix of genres, freely mixing south American vibes, Middle European melodies and Ska, the whole mixed up with a touch of Carnival Jazziness.                                                    On Tour                        Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing                blandit tempus accumsan.                                        Press                        The perfect post-Carnival shot. The exuberant cabaret-swing of Rumba da Bodas returns after a series of sell out shows last year. Starting life as a loose collective in the backstreet music bars of Bologna, Italy, they fuse Latin, Ska, Balkan                and Swing ideas into an ever-changing musical mix.             - The List Edinburgh            ",
        "url": "/artist/2016_09_rumba_de_bodas.html"
      }
      ,

      "artist-2016-09-tankus-the-henge-html": {
        "title": "Tankus the henge",
        "author": "",
        "category": "",
        "content": "                                        The world of Tankus the Henge is uplifting and wild, dark and heartfelt. A six piece powerhouse of a band drawing visual and musical influences from old time Fairgrounds to modern day Circus; The Beatles to Tom Waits and Gogol Bordello to Radiohead, they embody a look and a sound that lies somewhere between their South East London home and the carnival town of New Orleans.                    With their charismatic frontman, Jaz Delorean, looking like a lost character from a Terry Gilliam film and the pump and grind of the Tankus the Henge sound generating a groove that makes it impossible to stand still, their live show ebbs and flows like a small boat on a turbulent sea.                            Any other band who billed themselves as \"the most fantastic band in the world\" would rightly quake in their boots at having to live up to such fanfare. Tankus the Henge defy you to contradict them!                                            Press                        Intelligent, uplifting gypsy style jump about and stomp your feet music, Tankus the Henge bring colour and sound to life, as vivid and as vibrant as your psychedelic dreams […] A raucously sonorous and gloriously vintage-sounding six-piece band of incredibly talented musicians playing not just the usual guitars and drums, but a piano, trumpet, sax and even an accordion! And rumour has it there was also a trombone. I thought I’d imagined it but it was real.            - Kate Thompson for Chelle's Rock Blog            ",
        "url": "/artist/2016_09_tankus_the_henge.html"
      }
      ,

      "artist-2016-09-tape-five-html": {
        "title": "Tape Five",
        "author": "",
        "category": "",
        "content": "                                             TAPE FIVE is an international studio project based in Germany created by multi-instrumentalist songwriter-producer Martin Strathausen. Their debut album released in 2006 sold out in Europe, USA and Asia.                        TAPE FIVE combines a variety of styles and influences: The focus on Swing or Electro-Swing, but also Bossanova, Latin, Soul and NuJazz with their very own vivid retro interpretation in a classy way.                        TAPE FIVE recordings and live sets have been put together with hand picked musicians from all over the world. For example singers from England, California, Siberia, Brazil and South Africa. To name just a few: Dionne Wudu, Henrik Wager, Brenda                Boykin, Yuliet Topaz, Iain Mackenzie and Sha.                                                    Press                        If you want Swing style original compositions with class, detail, musical depth, brilliant instrumental and vocal performances, and lyrics with that special vintage atmosphere...TAPE FIVE is the best on the scene!            - ChinChin Records            ",
        "url": "/artist/2016_09_tape_five.html"
      }
      ,

      "artist-2016-09-the-carny-villians-html": {
        "title": "The Carny Villians",
        "author": "",
        "category": "",
        "content": "                                                    The carny villains are a raucous circus show band from Bristol, U.K. Known for their high energy original stomping swing and ska with balkan-esque folk.            Live they are full sensory theatrical experience. Clowning and antics that keep crowds laughing and dancing until the end where the entire place will be jumping.                                        Press                        This band of top musicians has travelled the world as house band for the Invisible Circus and impressively scored over 50 live shows; they’ve become a real standalone draw where the only thing for sure is to expect the unexpected. What you                know you’ll always get is variety, theatre and fun as anyone who has ever seen them at Carny Ville can testify.            - This Is Music - Brizzle Gig Reviews            ",
        "url": "/artist/2016_09_the_carny_villians.html"
      }
      ,

      "artist-2016-10-babbutzi-orkestar-html": {
        "title": "Babbutzi Orkestar",
        "author": "",
        "category": "",
        "content": "                                            The Babbutzi Orkestar was born in September 2007 with the idea of offering a repertoire of Balkan music around the traditional sounds of Eastern Europe.                        In 2009 they released their first album \"Babbutzi Orkestar\" after an intense live activity that has seen the 8 musicians of Babbutzi Orkestar propose on many stages and squares in Italy. The output of the first job begins to circulate more                the name of the ensemble, also increasing the number of performances and invitations to important festivals. By the many amazing concert that release an intense energy and transform any situation in a party of colors and crazy dances will                come to a second disc in 2011 titled \"Baro Shero\". A more mature album with new sounds that create a beat stronger and at times a little punk with a pounding rhythmic cadence, but that does not abandon the traditional Balkan sounds. The                new sound bound to Baro Shero is very compelling and the proof comes from the fiery live band that takes you around squares and stages all over Italy. Until you get to 2013, an important period for the BABBUTZI ORKESTAR, which see the                band featured on important stages of Italy and not also to the side of artists such as Kocani ORKESTAR and SHANTEL; many invitations even at important festivals such as the GUCA NA KRASU in Trieste and HIDRELLEZ 2013 in ISTANBUL. In May                comes a compilation for the Guca Na Krasu Fest where one own song is selected (\"Bum Bum Boje,\") to support the now widely known DUBIOZA KOLEKTIV, BOBAN I MARKO MARKOVIC and MAGNIFICO.                        After Babbutzi Orkestar of 2009 and Baro Shero of 2011, the Balkan Band that made everyone dance throughout Italy and Europe with their own Balkan Sexy Music - a mix of Balkan, punk, folk “Osteria” music and even the extreme roots of Surf                Music - returns in 2014 with a new album titled Vodka, Polka &amp; Vina.                        BABBUTZI ORKESTAR is coming back! The balkan band that has dragged and upset thousands of people with its energy, is returning with a new work that shows a different approach to Balkan music compared with previous works. The band changes its                skin and turns into a beat more surfing and punk, influenced by electronic music, but always linked to Balkan Beat, which is recognizable within each of the 13 tracks on the disc.                        The album is built on the explosive energy that the band gives out during their live performances. “Vodka, Polka &amp; Vina”, that it will release on the11th of March, emphasizes the aggressive sound of the guitars and fanfare always linked                with frantic themes inspired by Gypsy music present in all thirteen tracks. Electro sounds and synthesizers create a carpet derived from dub and soul, leaving space for dreamy violins and poetic accordions. The sounds are raw and undercooked,                but crossed with stable rhythmic waves, punchy bass and drums with a rock soul that make it stand out, giving balance to the organic and new idea of playing the Balkan rhythms. All topped off with powerful and scratchy voices that exceed                the limits of madness, passion and feverish sensual visions, and even scream current topics such as the bitter destructive capacity of man.                        The 13 songs in the album were written by G. Roccato and Babbutzi Orkestar, except for the Italian classic from the 1958 Buona Sera Signorina rearranged in the Balkan Sexy Music version. The album was produced with the help of last generation                machines, synthesizers and vintage tube amps. Recorded entirely by Antonio Polidoro, who previously collaborated with the band in the two previous works.                        Among melodic ballads, polkas and fiery rhythms surf, psychobilly, punk, hip-hop, funky, soul, pop and sometimes even balkan, Vodka, Polka &amp; Vina drag the audience into a delirious and insane dimension from which it will be difficult to                escape.                        ",
        "url": "/artist/2016_10_babbutzi_orkestar.html"
      }
      ,

      "artist-2016-10-cab-canaveral-html": {
        "title": "Cab Canavaral",
        "author": "",
        "category": "",
        "content": "                                      Cab Canavaral is DJ and saxplayer. He is member of austrias #1 swing combo \"5 IN LOVE\".  He started to work as a DJ when he hosted viennas first regulary swing club \"Klub Shwing\" at Ost Klub.  Due to his knowledge and musicalitity he became one of the favourite Swing DJs in Town.  He mixes traditional Swing, old Rhythm &amp; Blues, Neo Swing, Gypsy and Ska, so his sets are quite eclectic, interesting and always swingin!At the end of 2010 he started to remix some tunes of the lates album of 5 in Love as electroswing. His first productions got very good responses via soundcloud and many DJs worldwide are playing his tracks.              ",
        "url": "/artist/2016_10_cab_canaveral.html"
      }
      ,

      "artist-2016-10-jenova-collective-html": {
        "title": "Jenova Collective",
        "author": "",
        "category": "",
        "content": "                    Causing a scene amongst the UK’s hottest underground clubs and festivals, their ‘no holds barred, take no prisoners’ attitude has been relentlessly smothered over unsuspecting audiences all across Europe. Not afraid to go off the rails with tune selection you can guarantee these reprobates will hunt down and deliver dance-floor fillers and swung-out bombs for an all out infectiously pumping set that’ll have the whole discotheque bouncing.  The Jenova Collective have spent the last 2 years staring through the looking glass, dropping an extensive list of free downloads and remixes along the way. Never pinning themselves to one genre, previous tracks have taken influence from house, drum &amp; bass and glitch hop whilst still keeping their signature vintage sound along with a healthy serving of block-rocking bass and relentless energy.  Their debut release on Ragtime Records, Champagne Machine, went down a treat and they have loads in the pipeline. Continued support from top dogs in the game prove these guys are ones to watch for the future!  These guys are available as a 7-piece live band, DJ sets or DJ sets with live vocalists and instruments. Get in touch for a quote!        PressEnergetic electro swing meets thumping drum and bass: there’s no better way to spend an evening in The Ballroom than by attempting to swing from its chandeliers to the sound of Jenova Collective.  - Virtual Festivals    ",
        "url": "/artist/2016_10_jenova_collective.html"
      }
      ,

      "artist-2016-10-mr-woox-html": {
        "title": "Mr. Woox",
        "author": "",
        "category": "",
        "content": "                                            His sound merges a forgotten era of Swing, Jazz, Dixieland, New Orleans with the contemporary sound of Big band breaks &amp; bad boy bass.                        Some people call it Electro Swing, but he prefers \"Ghetto Swing &amp; Swing Hop!\" His music, although very close and important to the \"electro swing\" movement, borrows heavily from the old school hip hop breaks, Nu-school bass lines, dusty                drum loops and dreamy jazz &amp; swing era samples.            With his sound-mix of jazz breaks and abstract swinging beats with spoken word , Mr.Woox has created his own unique position as a DJ and beatmaker in his hometown and country.                        ",
        "url": "/artist/2016_10_mr_woox.html"
      }
      ,

      "artist-2016-10-offbeatterrorist-html": {
        "title": "Offbeatterrorist",
        "author": "",
        "category": "",
        "content": "                                                Janeck’s uptempo beats or deep grooves have inspired devoted club-goers of his “La Bolschevita” nights and other parties all over Germany, as well as in Lithuania, Poland, Ukraine, Russia, Slovakia or Czech Republic, Kosovo, France or England for years with wild dance orgies. His unique blend of balkan tuba bass and klezmer melodies from his homeland Ukraine with cumbia and other tropical music, swing &amp; electroswing is his way to energize the dance floor.                  Mazeltov, mis amigos!             ",
        "url": "/artist/2016_10_offbeatterrorist.html"
      }
      ,

      "artist-2016-10-tantz-html": {
        "title": "Tantz",
        "author": "",
        "category": "",
        "content": "                                      Over the last few years, Leeds' based klezmer/Balkan beats/gypsy jazz bohemians Tantz have taken the UK world/roots music scene apart with their full-on musical attack on audiences across the length and breadth of this nation. With awesome musical chops, an energy not seen since punk rock's halcyon days and ability to turn a gentle world music festival crowd into a heaving, pogoing mosh-pit, there's something special about this band that manages to touch almost everyone who hears and sees them live, no matter what music they're into.                                            Press                        PREPARE TO DANCE TILL IT NEARLY DOES YOU IN              - Alan Raw for BBC Leeds            ",
        "url": "/artist/2016_10_tantz.html"
      }
      ,

      "7-sponsor-html": {
        "title": "Sponsoring",
        "author": "",
        "category": "",
        "content": "                        Quality events affort quality partners                Ludwig Sound and our artists are involved into many great projects and events like Cirque Musical or Zoot Suit Riot. It's an fabulous revenue to experience the reception of the audience and we plan to go on organizing our own events for the next decades.                Unfortunately best ideas cost often also good money. So it's sometimes demeaning that we can't affort realising some of our best ideas in order to create optimal events for everyone.                This kind of events are always visited by a significant number (from 150 to >1000 guests) of openminded people. In fact we are gathering a solid customer base for anyone who is aiming that crowd. That's the point where Ludwig Sound is calling upon you.                If you want to become an official event sponsor we are offering you scalable solutions regarding your budget and pointing to best results in visibility and attraction. Please use our Contact Form or write to info[at]ludwigsound.com for requesting                    an individual offer.            ",
        "url": "/7_sponsor.html"
      }
      ,

      "8-references-html": {
        "title": "References",
        "author": "",
        "category": "",
        "content": "                                Glashütte            Following the performance, Milanese DJane Rosantique delivered a lively selection of Electro-Swing numbers that drew many of the guests to the dance floor.                                            Zalando             Zalando GmbH and Ludwig Sound Booking Agency have been cooperating for the big Zalando Sommerparty. DJ Badre and DJ Farrapo were providing this event with exotical world tunes in the unique venue of Malzfabrik in Kreuzberg, Berlin.                                            Green Lounge            The Green Lounge was an evening event within Berlin’s Fashion Week 2013. This event was organized in the context of green fashion by Messe Frankfurt Exhibition GmbH. Ludwig Sound supports the Green Lounge with a DJ Set of Berlin’s Electro Swing Professional Aviv Shwartz.                                            Hutball Dresden            Dresdens Hutball is an outstanding event which is especially reknown for its glamour and visuality. Beneath amazing fashion there also gather loads of well known musical artists from all over europe. Ludwig Sound supports Hutball since 2014 with artists and ideas.            ",
        "url": "/8_references.html"
      }
      ,

      "9-contact-html": {
        "title": "Contact",
        "author": "",
        "category": "",
        "content": "\t\t\t\t\t\t\tPlease pull your request.\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t- Category -\t\t\t\t\t\t\t\t\tBook an artist\t\t\t\t\t\t\t\t\tAssign for Event Consultant\t\t\t\t\t\t\t\t\tWedding\t\t\t\t\t\t\t\t\tOther\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t",
        "url": "/9_contact.html"
      }
      ,

      "feed-xml": {
        "title": "",
        "author": "",
        "category": "",
        "content": "      {{ site.title | xml_escape }}    {{ site.description | xml_escape }}    {{ site.url }}{{ site.baseurl }}/        {{ site.time | date_to_rfc822 }}    {{ site.time | date_to_rfc822 }}    Jekyll v{{ jekyll.version }}    {% for post in site.posts limit:10 %}              {{ post.title | xml_escape }}        {{ post.content | xml_escape }}        {{ post.date | date_to_rfc822 }}        {{ post.url | prepend: site.baseurl | prepend: site.url }}        {{ post.url | prepend: site.baseurl | prepend: site.url }}        {% for tag in post.tags %}        {{ tag | xml_escape }}        {% endfor %}        {% for cat in post.categories %}        {{ cat | xml_escape }}        {% endfor %}          {% endfor %}  ",
        "url": "/feed.xml"
      }
      ,

      "css-ie8-css": {
        "title": "",
        "author": "",
        "category": "",
        "content": "@import 'libs/vars';@import 'libs/functions';@import 'libs/mixins';@import 'libs/skel';/*\tSpectral by HTML5 UP\thtml5up.net | @n33co\tFree for personal and commercial use under the CCA 3.0 license (html5up.net/license)*//* Icon */\t.icon {\t\t&.major {\t\t\tborder: none;\t\t\t&:before {\t\t\t\tfont-size: 3em;\t\t\t}\t\t}\t}/* Form */\tlabel {\t\tcolor: _palette(accent7, fg-bold);\t}\tinput[type=\"text\"],\tinput[type=\"password\"],\tinput[type=\"email\"],\tselect,\ttextarea {\t\tborder: solid 1px _palette(accent7, border);\t}/* Button */\tinput[type=\"submit\"],\tinput[type=\"reset\"],\tinput[type=\"button\"],\tbutton,\t.button {\t\tborder: solid 2px _palette(accent7, border);\t\t&.special {\t\t\tborder: 0 !important;\t\t}\t}/* Page Wrapper + Menu */\t#menu {\t\tdisplay: none;\t}\tbody.is-menu-visible {\t\t#menu {\t\t\tdisplay: block;\t\t}\t}/* Header */\t#header {\t\tnav {\t\t\t> ul {\t\t\t\t> li {\t\t\t\t\t> a {\t\t\t\t\t\t&.menuToggle {\t\t\t\t\t\t\t&:after {\t\t\t\t\t\t\t\tdisplay: none;\t\t\t\t\t\t\t}\t\t\t\t\t\t}\t\t\t\t\t}\t\t\t\t}\t\t\t}\t\t}\t}/* Banner + Wrapper (style4) */\t#banner,\t.wrapper.style4 {\t\t-ms-behavior: url('js/ie/backgroundsize.min.htc');\t\t&:before {\t\t\tdisplay: none;\t\t}\t}/* Banner */\t#banner {\t\t.more {\t\t\theight: 4em;\t\t\t&:after {\t\t\t\tdisplay: none;\t\t\t}\t\t}\t}/* Main */\t#main {\t\t> header {\t\t\t-ms-behavior: url('js/ie/backgroundsize.min.htc');\t\t\t&:before {\t\t\t\tdisplay: none;\t\t\t}\t\t}\t}",
        "url": "/css/ie8.css"
      }
      ,

      "css-ie9-css": {
        "title": "",
        "author": "",
        "category": "",
        "content": "@import 'libs/vars';@import 'libs/functions';@import 'libs/mixins';@import 'libs/skel';/*\tSpectral by HTML5 UP\thtml5up.net | @n33co\tFree for personal and commercial use under the CCA 3.0 license (html5up.net/license)*//* Spotlight */\t.spotlight {\t\tdisplay: block;\t\t.image {\t\t\tdisplay: inline-block;\t\t\tvertical-align: top;\t\t}\t\t.content {\t\t\t@include padding(4em, 4em);\t\t\tdisplay: inline-block;\t\t}\t\t&:after {\t\t\tclear: both;\t\t\tcontent: '';\t\t\tdisplay: block;\t\t}\t}/* Features */\t.features {\t\tdisplay: block;\t\tli {\t\t\tfloat: left;\t\t}\t\t&:after {\t\t\tcontent: '';\t\t\tdisplay: block;\t\t\tclear: both;\t\t}\t}/* Banner + Wrapper (style4) */\t#banner,\t.wrapper.style4 {\t\tbackground-image: url(\"../../images/banner.jpg\");\t\tbackground-position: center center;\t\tbackground-repeat: no-repeat;\t\tbackground-size: cover;\t\tposition: relative;\t\t&:before {\t\t\tbackground: #000000;\t\t\tcontent: '';\t\t\theight: 100%;\t\t\tleft: 0;\t\t\topacity: 0.5;\t\t\tposition: absolute;\t\t\ttop: 0;\t\t\twidth: 100%;\t\t}\t\t.inner {\t\t\tposition: relative;\t\t\tz-index: 1;\t\t}\t}/* Banner */\t#banner {\t\t@include padding(14em, 0);\t\theight: auto;\t\t&:after {\t\t\tdisplay: none;\t\t}\t}/* CTA */\t#cta {\t\t.inner {\t\t\theader {\t\t\t\tfloat: left;\t\t\t}\t\t\t.actions {\t\t\t\tfloat: left;\t\t\t}\t\t\t&:after {\t\t\t\tclear: both;\t\t\t\tcontent: '';\t\t\t\tdisplay: block;\t\t\t}\t\t}\t}/* Main */\t#main {\t\t> header {\t\t\tbackground-image: url(\"../../images/banner.jpg\");\t\t\tbackground-position: center center;\t\t\tbackground-repeat: no-repeat;\t\t\tbackground-size: cover;\t\t\tposition: relative;\t\t\t&:before {\t\t\t\tbackground: #000000;\t\t\t\tcontent: '';\t\t\t\theight: 100%;\t\t\t\tleft: 0;\t\t\t\topacity: 0.5;\t\t\t\tposition: absolute;\t\t\t\ttop: 0;\t\t\t\twidth: 100%;\t\t\t}\t\t\t> * {\t\t\t\tposition: relative;\t\t\t\tz-index: 1;\t\t\t}\t\t}\t}",
        "url": "/css/ie9.css"
      }
      ,

      "": {
        "title": "",
        "author": "",
        "category": "",
        "content": "            {{ site.title }}        {{ site.description | markdownify }}                                                        Honest moments braught to you by gifted Bands and DJ's of Ludwig Sound.            Ludwig Sound started as a barebone booking agency for electronic music artists with an attitude to vintage soundscapes. But over the years LS became way more than this. Take a look around and get an impression of our professional                approach for working on events in general.                                                    Booking Agency            Ludwig Sound is known as one of the leading booking agencies on the european scene. With more than 500 deals since we kick off in 2013, our expertise in intermediating artists is unchalllenged. Our Booking activities are mainly focused                on Europe with an rock-solid network in Italy, Germany, Switzerland, Austria and the UK. Have a dip into our artist roster gettin together leading artist of Europes Live and DJ cartell.                                            Event Consulting            It's not only about having good artist booked than organizing the event itself on best way. That's why we are planning your events step by step everytime close to your ideas and image. La Notte Nera, Mercalingano Music Festival or Campari                are just a few in row of partners which were contributing by our services. Get in touch for an initial and free consulation and let's get started an awesome event.                                            Art direction for wedding            Bringing humans together was always one of our strengths. So why not going on if those decide for their probably biggest step in live. Like our original approach for projects, we are staying close to the client side ideas and contributing                where it fits. LS is collaborating with reliable and highly professional partners specialized in wedding organisation. Celebrating with Ludwig Sound makes your wedding as special as it should be. Ask for an consulatation.                                    Spotlight            Some of our featured artist.                                                                                        Bomba Titinka                                                                                                Grant Lazlo                                                                                                Rumba de Bodas                                                                                    {% for post in site.posts %}                            {{ post.title }}\t      {{ post.excerpt }}            {% endfor %}      ",
        "url": "/"
      }
      ,

      "css-main-css": {
        "title": "",
        "author": "",
        "category": "",
        "content": "$baseurl: '{{ site.baseurl }}/images';@import 'libs/vars';@import 'libs/functions';@import 'libs/mixins';@import 'font-awesome.min.css';@import url('http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,800,800italic');/*\tSpectral by HTML5 UP\thtml5up.net | @n33co\tFree for personal and commercial use under the CCA 3.0 license (html5up.net/license)*/\t@import 'libs/skel';\t@include skel-breakpoints((\t\txlarge: '(max-width: 1680px)',\t\tlarge: '(max-width: 1280px)',\t\tmedium: '(max-width: 980px)',\t\tsmall: '(max-width: 736px)',\t\txsmall: '(max-width: 480px)'\t));\t@include skel-layout((\t\treset: 'full',\t\tboxModel: 'border',\t\tgrid: ( gutters: 1.5em )\t));\t@keyframes imageAnimation {\t    0% { opacity: 0; animation-timing-function: ease-in; }\t    8% { opacity: 1; animation-timing-function: ease-out; }\t    17% { opacity: 1 }\t    25% { opacity: 0 }\t    100% { opacity: 0 }\t}/* Basic */\t@-ms-viewport {\t\twidth: device-width;\t}\tbody {\t\tbackground: _palette(bg);\t\t&.is-loading {\t\t\t*, *:before, *:after {\t\t\t\t@include vendor('animation', 'none !important');\t\t\t\t@include vendor('transition', 'none !important');\t\t\t}\t\t}\t}\tbody, input, select, textarea {\t\tcolor: _palette(fg);\t\tfont-family: _font(family);\t\tfont-size: 15pt;\t\tfont-weight: _font(weight);\t\tletter-spacing: _size(letter-spacing);\t\tline-height: 1.65em;\t\t@include breakpoint(xlarge) {\t\t\tfont-size: 13pt;\t\t}\t\t@include breakpoint(large) {\t\t\tfont-size: 12pt;\t\t}\t\t@include breakpoint(small) {\t\t\tfont-size: 11pt;\t\t\tletter-spacing: _size(letter-spacing) * 0.5;\t\t}\t}\ta {\t\t@include vendor('transition', ('color #{_duration(transitions)} ease', 'border-bottom-color #{_duration(transitions)} ease'));\t\t// border-bottom: dotted 1px;\t\tcolor: _palette(accent1, bg);\t\ttext-decoration: none;\t\t&:hover {\t\t\tborder-bottom-color: transparent;\t\t}\t}\tstrong, b {\t\tcolor: _palette(fg-bold);\t\tfont-weight: _font(weight-bold);\t}\tem, i {\t\tfont-style: italic;\t}\tp {\t\tmargin: 0 0 _size(element-margin) 0;\t}\th1, h2, h3, h4, h5, h6 {\t\tcolor: _palette(fg-bold);\t\tfont-weight: _font(weight-extrabold);\t\tletter-spacing: _size(letter-spacing-alt);\t\tline-height: 1em;\t\tmargin: 0 0 (_size(element-margin) * 0.5) 0;\t\ttext-transform: uppercase;\t\ta {\t\t\tcolor: _palette(accent1, bg);\t\t\ttext-decoration: none;\t\t}\t}\th2 {\t\tfont-size: 1.35em;\t\tline-height: 1.75em;\t\t@include breakpoint(small) {\t\t\tfont-size: 1.1em;\t\t\tline-height: 1.65em;\t\t}\t}\th3 {\t\tfont-size: 1.15em;\t\tline-height: 1.75em;\t\t@include breakpoint(small) {\t\t\tfont-size: 1em;\t\t\tline-height: 1.65em;\t\t}\t}\th4 {\t\tfont-size: 1em;\t\tline-height: 1.5em;\t}\th5 {\t\tfont-size: 0.8em;\t\tline-height: 1.5em;\t}\th6 {\t\tfont-size: 0.7em;\t\tline-height: 1.5em;\t}\tsub {\t\tfont-size: 0.8em;\t\tposition: relative;\t\ttop: 0.5em;\t}\tsup {\t\tfont-size: 0.8em;\t\tposition: relative;\t\ttop: -0.5em;\t}\thr {\t\tborder: 0;\t\tborder-bottom: solid 2px _palette(border);\t\tmargin: (_size(element-margin) * 1.5) 0;\t\t&.major {\t\t\tmargin: (_size(element-margin) * 2.25) 0;\t\t}\t}\tblockquote {\t\tborder-left: solid 4px _palette(border);\t\tfont-style: italic;\t\tmargin: 0 0 _size(element-margin) 0;\t\tpadding: 0.5em 0 0.5em 2em;\t}\tcode {\t\tbackground: _palette(border-bg);\t\tborder-radius: 3px;\t\tfont-family: _font(family-fixed);\t\tfont-size: 0.9em;\t\tletter-spacing: 0;\t\tmargin: 0 0.25em;\t\tpadding: 0.25em 0.65em;\t}\tpre {\t\t-webkit-overflow-scrolling: touch;\t\tfont-family: _font(family-fixed);\t\tfont-size: 0.9em;\t\tmargin: 0 0 _size(element-margin) 0;\t\tcode {\t\t\tdisplay: block;\t\t\tline-height: 1.75em;\t\t\tpadding: 1em 1.5em;\t\t\toverflow-x: auto;\t\t}\t}\t.align-left {\t\ttext-align: left;\t}\t.align-center {\t\ttext-align: center;\t}\t.align-right {\t\ttext-align: right;\t}/* Section/Article */\tsection, article {\t\t&.special {\t\t\ttext-align: center;\t\t}\t}\theader {\t\tp {\t\t\tcolor: _palette(fg-light);\t\t\tposition: relative;\t\t\ttop: -0.25em;\t\t}\t\th2 + p {\t\t}\t\th3 + p {\t\t\tfont-size: 1.1em;\t\t}\t\th4 + p,\t\th5 + p,\t\th6 + p {\t\t\tfont-size: 0.9em;\t\t}\t\t&.major {\t\t\tmargin: 0 0 (_size(element-margin) * 1.75) 0;\t\t\th2, h3, h4, h5, h6 {\t\t\t\tborder-bottom: solid 2px _palette(border);\t\t\t\tdisplay: inline-block;\t\t\t\tpadding-bottom: 1em;\t\t\t\tposition: relative;\t\t\t\t&:after {\t\t\t\t\tcontent: '';\t\t\t\t\tdisplay: block;\t\t\t\t\theight: 1px;\t\t\t\t}\t\t\t}\t\t\tp {\t\t\t\tcolor: _palette(fg);\t\t\t\ttop: 0;\t\t\t}\t\t\t@include breakpoint(small) {\t\t\t\tmargin: 0 0 _size(element-margin) 0;\t\t\t}\t\t}\t\t@include breakpoint(medium) {\t\t\tbr {\t\t\t\tdisplay: none;\t\t\t}\t\t}\t}/* Form */\tform {\t\tmargin: 0 auto _size(element-margin) 0;\t}\tlabel {\t\tcolor: _palette(fg-bold);\t\tdisplay: block;\t\tfont-size: 0.9em;\t\tfont-weight: _font(weight-bold);\t\tmargin: 0 0 (_size(element-margin) * 0.5) 0;\t}\tinput[type=\"text\"],\tinput[type=\"password\"],\tinput[type=\"email\"],\tselect,\ttextarea {\t\t@include vendor('appearance', 'none');\t\tbackground: _palette(bg);\t\tborder-radius: 3px;\t\tborder: none;\t\tcolor: inherit;\t\tdisplay: block;\t\toutline: 0;\t\tpadding: 0 1em;\t\ttext-decoration: none;\t\twidth: 100%;\t\t&:invalid {\t\t\tbox-shadow: none;\t\t}\t\t&:focus {\t\t\tbox-shadow: 0 0 0 2px _palette(accent1, bg);\t\t\t& + h1 {\t\t\t\topacity: 0.2;\t\t\t}\t\t}\t}\t.select-wrapper {\t\t@include icon;\t\tdisplay: block;\t\tposition: relative;\t\t&:before {\t\t\t@include vendor('pointer-events', 'none');\t\t\tcolor: _palette(border);\t\t\tcontent: '\\f078';\t\t\tdisplay: block;\t\t\theight: _size(element-height);\t\t\tline-height: _size(element-height);\t\t\tposition: absolute;\t\t\tright: 0;\t\t\ttext-align: center;\t\t\ttop: 0;\t\t\twidth: _size(element-height);\t\t}\t\tselect::-ms-expand {\t\t\tdisplay: none;\t\t}\t}\tinput[type=\"text\"],\tinput[type=\"password\"],\tinput[type=\"email\"],\tselect {\t\theight: _size(element-height);\t}\ttextarea {\t\tpadding: 0.75em 1em;\t}\tinput[type=\"checkbox\"],\tinput[type=\"radio\"], {\t\t@include vendor('appearance', 'none');\t\tdisplay: block;\t\tfloat: left;\t\tmargin-right: -2em;\t\topacity: 0;\t\twidth: 1em;\t\tz-index: -1;\t\t& + label {\t\t\t@include icon;\t\t\tcolor: _palette(fg);\t\t\tcursor: pointer;\t\t\tdisplay: inline-block;\t\t\tfont-size: 1em;\t\t\tfont-weight: _font(weight);\t\t\tpadding-left: (_size(element-height) * 0.6) + 0.75em;\t\t\tpadding-right: 0.75em;\t\t\tposition: relative;\t\t\t&:before {\t\t\t\tbackground: _palette(border-bg);\t\t\t\tborder-radius: 3px;\t\t\t\tcontent: '';\t\t\t\tdisplay: inline-block;\t\t\t\theight: (_size(element-height) * 0.6);\t\t\t\tleft: 0;\t\t\t\tline-height: (_size(element-height) * 0.575);\t\t\t\tposition: absolute;\t\t\t\ttext-align: center;\t\t\t\ttop: 0;\t\t\t\twidth: (_size(element-height) * 0.6);\t\t\t}\t\t}\t\t&:checked + label {\t\t\t&:before {\t\t\t\tbackground: _palette(bg);\t\t\t\tcolor: _palette(fg-bold);\t\t\t\tcontent: '\\f00c';\t\t\t}\t\t}\t\t&:focus + label {\t\t\t&:before {\t\t\t\tbox-shadow: 0 0 0 2px _palette(accent1, bg);\t\t\t}\t\t}\t}\tinput[type=\"checkbox\"] {\t\t& + label {\t\t\t&:before {\t\t\t\tborder-radius: 3px;\t\t\t}\t\t}\t}\tinput[type=\"radio\"] {\t\t& + label {\t\t\t&:before {\t\t\t\tborder-radius: 100%;\t\t\t}\t\t}\t}\t::-webkit-input-placeholder {\t\tcolor: _palette(fg-light) !important;\t\topacity: 1.0;\t}\t:-moz-placeholder {\t\tcolor: _palette(fg-light) !important;\t\topacity: 1.0;\t}\t::-moz-placeholder {\t\tcolor: _palette(fg-light) !important;\t\topacity: 1.0;\t}\t:-ms-input-placeholder {\t\tcolor: _palette(fg-light) !important;\t\topacity: 1.0;\t}\t.formerize-placeholder {\t\tcolor: _palette(fg-light) !important;\t\topacity: 1.0;\t}/* Box */\t.box {\t\tborder-radius: 3px;\t\tborder: solid 2px _palette(border);\t\tmargin-bottom: _size(element-margin);\t\tpadding: 1.5em;\t\t> :last-child,\t\t> :last-child > :last-child,\t\t> :last-child > :last-child > :last-child {\t\t\tmargin-bottom: 0;\t\t}\t\t&.alt {\t\t\tborder: 0;\t\t\tborder-radius: 0;\t\t\tpadding: 0;\t\t\ttext-align: left;\t\t}\t}/* Icon */\t.icon {\t\t@include icon;\t\tborder-bottom: none;\t\tposition: relative;\t\t> .label {\t\t\tdisplay: none;\t\t}\t\t&.major {\t\t\t@include vendor('transform', 'rotate(-45deg)');\t\t\tborder-radius: 3px;\t\t\tborder: solid 2px _palette(border);\t\t\tdisplay: inline-block;\t\t\tfont-size: 1.35em;\t\t\theight: calc(3em + 2px);\t\t\tline-height: 3em;\t\t\ttext-align: center;\t\t\twidth: calc(3em + 2px);\t\t\t&:before {\t\t\t\t@include vendor('transform', 'rotate(45deg)');\t\t\t\tdisplay: inline-block;\t\t\t\tfont-size: 1.5em;\t\t\t}\t\t\t@include breakpoint(small) {\t\t\t\tfont-size: 1em;\t\t\t}\t\t}\t\t&.style1 {\t\t\tcolor: _palette(accent2, bg);\t\t}\t\t&.style2 {\t\t\tcolor: _palette(accent3, bg);\t\t}\t\t&.style3 {\t\t\tcolor: _palette(accent4, bg);\t\t}\t}/* Image */\t.image {\t\tborder-radius: 3px;\t\tborder: 0;\t\tdisplay: inline-block;\t\tposition: relative;\t\timg {\t\t\tborder-radius: 3px;\t\t\tdisplay: block;\t\t}\t\t&.left {\t\t\tfloat: left;\t\t\tmargin: 0 2em 2em 0;\t\t\ttop: 0.25em;\t\t}\t\t&.right {\t\t\tfloat: right;\t\t\tmargin: 0 0 2em 2em;\t\t\ttop: 0.25em;\t\t}\t\t&.left,\t\t&.right {\t\t\tmax-width: 40%;\t\t\timg {\t\t\t\twidth: 100%;\t\t\t}\t\t}\t\t&.fit {\t\t\tdisplay: block;\t\t\tmargin: 0 0 _size(element-margin) 0;\t\t\twidth: 100%;\t\t\timg {\t\t\t\twidth: 100%;\t\t\t}\t\t}\t}/* Roster Styles */.grid div {\tmargin: 0;\tposition: relative;}.grid div img {\tmax-width: 100%;\tdisplay: block;\tposition: relative;}.grid div.caption {\tposition: absolute;\ttop: 0;\tleft: 0;\tpadding: 20px;\tbackground: #000000;\tcolor: #ed4e6e;}.grid div.caption a {\t// text-align: center;\t// padding: 5px 10px;\t// border-radius: 2px;\t// display: inline-block;\t// background: #ED4933;\tfont-size: 1vw;\tcolor: _palette(accent1, fg);\tfont-weight: bold;}.cs-style-6 div img {\tz-index: 10;\ttransition: transform 0.4s;}.cs-style-6 div:hover img,.cs-style-6 div.cs-hover img {\ttransform: translateY(-25px) scale(0.75);}.cs-style-6 div.caption {\theight: 100%;\twidth: 100%;}.cs-style-6 div.caption a {\tposition: absolute;\tbottom: 10%;\tright: 12%;}// Video Styling.video iframe {position: absolute;top: 0;left: 0;width: 100%;height: 100%;}.video {position: relative;padding-bottom: 56.25%; /* Default for 1600x900 videos 16:9 ratio*/padding-top: 0px;height: 0;overflow: hidden;margin-bottom: 2em;}/* List */\tol {\t\tlist-style: decimal;\t\tmargin: 0 0 _size(element-margin) 0;\t\tpadding-left: 1.25em;\t\tli {\t\t\tpadding-left: 0.25em;\t\t}\t}\tul {\t\tlist-style: disc;\t\tmargin: 0 0 _size(element-margin) 0;\t\tpadding-left: 1em;\t\tli {\t\t\tpadding-left: 0.5em;\t\t}\t\t&.alt {\t\t\tlist-style: none;\t\t\tpadding-left: 0;\t\t\tli {\t\t\t\tborder-top: solid 1px _palette(border);\t\t\t\tpadding: 0.5em 0;\t\t\t\t&:first-child {\t\t\t\t\tborder-top: 0;\t\t\t\t\tpadding-top: 0;\t\t\t\t}\t\t\t}\t\t}\t\t&.icons {\t\t\tcursor: default;\t\t\tlist-style: none;\t\t\tpadding-left: 0;\t\t\tli {\t\t\t\tdisplay: inline-block;\t\t\t\tpadding: 0 1em 0 0;\t\t\t\t&:last-child {\t\t\t\t\tpadding-right: 0 !important;\t\t\t\t}\t\t\t}\t\t\t&.major {\t\t\t\tpadding: 1em 0;\t\t\t\tli {\t\t\t\t\tpadding-right: 3.5em;\t\t\t\t\t@include breakpoint(small) {\t\t\t\t\t\tpadding: 0 1em !important;\t\t\t\t\t}\t\t\t\t}\t\t\t}\t\t}\t\t&.actions {\t\t\tcursor: default;\t\t\tlist-style: none;\t\t\tpadding-left: 0;\t\t\tli {\t\t\t\tdisplay: inline-block;\t\t\t\tpadding: 0 (_size(element-margin) * 0.75) 0 0;\t\t\t\tvertical-align: middle;\t\t\t\t&:last-child {\t\t\t\t\tpadding-right: 0;\t\t\t\t}\t\t\t}\t\t\t&.small {\t\t\t\tli {\t\t\t\t\tpadding: 0 (_size(element-margin) * 0.375) 0 0;\t\t\t\t}\t\t\t}\t\t\t&.vertical {\t\t\t\tli {\t\t\t\t\tdisplay: block;\t\t\t\t\tpadding: (_size(element-margin) * 0.75) 0 0 0;\t\t\t\t\t&:first-child {\t\t\t\t\t\tpadding-top: 0;\t\t\t\t\t}\t\t\t\t\t> * {\t\t\t\t\t\tmargin-bottom: 0;\t\t\t\t\t}\t\t\t\t}\t\t\t\t&.small {\t\t\t\t\tli {\t\t\t\t\t\tpadding: (_size(element-margin) * 0.375) 0 0 0;\t\t\t\t\t\t&:first-child {\t\t\t\t\t\t\tpadding-top: 0;\t\t\t\t\t\t}\t\t\t\t\t}\t\t\t\t}\t\t\t}\t\t\t&.fit {\t\t\t\tdisplay: table;\t\t\t\tmargin-left: (_size(element-margin) * -0.75);\t\t\t\tpadding: 0;\t\t\t\ttable-layout: fixed;\t\t\t\twidth: calc(100% + #{(_size(element-margin) * 0.75)});\t\t\t\tli {\t\t\t\t\tdisplay: table-cell;\t\t\t\t\tpadding: 0 0 0 (_size(element-margin) * 0.75);\t\t\t\t\t> * {\t\t\t\t\t\tmargin-bottom: 0;\t\t\t\t\t}\t\t\t\t}\t\t\t\t&.small {\t\t\t\t\tmargin-left: (_size(element-margin) * -0.375);\t\t\t\t\twidth: calc(100% + #{(_size(element-margin) * 0.375)});\t\t\t\t\tli {\t\t\t\t\t\tpadding: 0 0 0 (_size(element-margin) * 0.375);\t\t\t\t\t}\t\t\t\t}\t\t\t}\t\t\t@include breakpoint(small) {\t\t\t\tli {\t\t\t\t\tdisplay: block;\t\t\t\t\tpadding: (_size(element-margin) * 0.5) 0 0 0;\t\t\t\t\ttext-align: center;\t\t\t\t\twidth: 100%;\t\t\t\t\t&:first-child {\t\t\t\t\t\tpadding-top: 0;\t\t\t\t\t}\t\t\t\t\t> * {\t\t\t\t\t\tmargin: 0 auto !important;\t\t\t\t\t\tmax-width: 30em;\t\t\t\t\t\twidth: 100%;\t\t\t\t\t\t&.icon {\t\t\t\t\t\t\t&:before {\t\t\t\t\t\t\t\tmargin-left: -1em;\t\t\t\t\t\t\t}\t\t\t\t\t\t}\t\t\t\t\t}\t\t\t\t}\t\t\t\t&.small {\t\t\t\t\tli {\t\t\t\t\t\tpadding: (_size(element-margin) * 0.25) 0 0 0;\t\t\t\t\t\t&:first-child {\t\t\t\t\t\t\tpadding-top: 0;\t\t\t\t\t\t}\t\t\t\t\t}\t\t\t\t}\t\t\t}\t\t}\t}\tdl {\t\tmargin: 0 0 _size(element-margin) 0;\t}/* Table */\t.table-wrapper {\t\t-webkit-overflow-scrolling: touch;\t\toverflow-x: auto;\t}\ttable {\t\tmargin: 0 0 _size(element-margin) 0;\t\twidth: 100%;\t\ttbody {\t\t\ttr {\t\t\t\tborder: solid 1px _palette(border);\t\t\t\tborder-left: 0;\t\t\t\tborder-right: 0;\t\t\t\t&:nth-child(2n + 1) {\t\t\t\t\tbackground-color: _palette(border-bg);\t\t\t\t}\t\t\t}\t\t}\t\ttd {\t\t\tpadding: 0.75em 0.75em;\t\t}\t\tth {\t\t\tcolor: _palette(fg-bold);\t\t\tfont-size: 0.9em;\t\t\tfont-weight: _font(weight-bold);\t\t\tpadding: 0 0.75em 0.75em 0.75em;\t\t\ttext-align: left;\t\t}\t\tthead {\t\t\tborder-bottom: solid 2px _palette(border);\t\t}\t\ttfoot {\t\t\tborder-top: solid 2px _palette(border);\t\t}\t\t&.alt {\t\t\tborder-collapse: separate;\t\t\ttbody {\t\t\t\ttr {\t\t\t\t\ttd {\t\t\t\t\t\tborder: solid 1px _palette(border);\t\t\t\t\t\tborder-left-width: 0;\t\t\t\t\t\tborder-top-width: 0;\t\t\t\t\t\t&:first-child {\t\t\t\t\t\t\tborder-left-width: 1px;\t\t\t\t\t\t}\t\t\t\t\t}\t\t\t\t\t&:first-child {\t\t\t\t\t\ttd {\t\t\t\t\t\t\tborder-top-width: 1px;\t\t\t\t\t\t}\t\t\t\t\t}\t\t\t\t}\t\t\t}\t\t\tthead {\t\t\t\tborder-bottom: 0;\t\t\t}\t\t\ttfoot {\t\t\t\tborder-top: 0;\t\t\t}\t\t}\t}/* Button */\tinput[type=\"submit\"],\tinput[type=\"reset\"],\tinput[type=\"button\"],\tbutton,\t.button {\t\t@include vendor('appearance', 'none');\t\t@include vendor('transition', ('background-color #{_duration(transitions)} ease-in-out', 'color #{_duration(transitions)} ease-in-out'));\t\tbackground-color: transparent;\t\tborder-radius: 3px;\t\tborder: 0;\t\tbox-shadow: inset 0 0 0 2px _palette(border);\t\tcolor: _palette(fg-bold);\t\tcursor: pointer;\t\tdisplay: inline-block;\t\tfont-size: 0.8em;\t\tfont-weight: _font(weight-bold);\t\theight: 3.125em;\t\tletter-spacing: _size(letter-spacing-alt);\t\tline-height: 3.125em;\t\tpadding: 0 2em;\t\ttext-align: center;\t\ttext-decoration: none;\t\ttext-transform: uppercase;\t\twhite-space: nowrap;\t\toverflow: hidden;\t\ttext-overflow: ellipsis;\t\t&:hover {\t\t\tbackground-color: _palette(border-bg);\t\t}\t\t&:active {\t\t\tbackground-color: _palette(border2-bg);\t\t}\t\t&.icon {\t\t\t&:before {\t\t\t\tmargin-right: 0.5em;\t\t\t}\t\t}\t\t&.fit {\t\t\tdisplay: block;\t\t\tmargin: 0 0 (_size(element-margin) * 0.5) 0;\t\t\twidth: 100%;\t\t}\t\t&.small {\t\t\tfont-size: 0.8em;\t\t}\t\t&.big {\t\t\tfont-size: 1.35em;\t\t}\t\t&.special {\t\t\tbackground-color: _palette(accent6, bg);\t\t\tbox-shadow: none !important;\t\t\tcolor: _palette(accent6, fg-bold) !important;\t\t\t&:hover {\t\t\t\tbackground-color: lighten(_palette(accent6, bg), 5) !important;\t\t\t}\t\t\t&:active {\t\t\t\tbackground-color: darken(_palette(accent6, bg), 5) !important;\t\t\t}\t\t}\t\t&.disabled,\t\t&:disabled {\t\t\t@include vendor('pointer-events', 'none');\t\t\topacity: 0.25;\t\t}\t\t@include breakpoint(small) {\t\t\theight: 3.75em;\t\t\tline-height: 3.75em;\t\t}\t}/* Features */\t.features {\t\t@include vendor('display', 'flex');\t\t@include vendor('flex-wrap', 'wrap');\t\t@include vendor('justify-content', 'center');\t\tlist-style: none;\t\tpadding: 0;\t\twidth: 100%;\t\tli {\t\t\t@include padding(4em, 4em, (0,0,0,2em));\t\t\tdisplay: block;\t\t\tposition: relative;\t\t\ttext-align: left;\t\t\twidth: 50%;\t\t\t@for $i from 1 through _misc(max-features) {\t\t\t\t$j: 0.035 * $i;\t\t\t\t&:nth-child(#{$i}) {\t\t\t\t\tbackground-color: rgba(0,0,0, $j);\t\t\t\t}\t\t\t}\t\t\t&:before {\t\t\t\tdisplay: block;\t\t\t\tcolor: _palette(accent2, bg);\t\t\t\tposition: absolute;\t\t\t\tleft: 1.75em;\t\t\t\ttop: 2.75em;\t\t\t\tfont-size: 1.5em;\t\t\t}\t\t\t&:nth-child(1) {\t\t\t\tborder-top-left-radius: 3px;\t\t\t}\t\t\t&:nth-child(2) {\t\t\t\tborder-top-right-radius: 3px;\t\t\t}\t\t\t&:nth-last-child(1) {\t\t\t\tborder-bottom-right-radius: 3px;\t\t\t}\t\t\t&:nth-last-child(2) {\t\t\t\tborder-bottom-left-radius: 3px;\t\t\t}\t\t\t@include breakpoint(medium) {\t\t\t\t@include padding(3em, 2em);\t\t\t\ttext-align: center;\t\t\t\t&:before {\t\t\t\t\tleft: 0;\t\t\t\t\tmargin: 0 0 (_size(element-margin) * 0.5) 0;\t\t\t\t\tposition: relative;\t\t\t\t\ttop: 0;\t\t\t\t}\t\t\t}\t\t\t@include breakpoint(small) {\t\t\t\t@include padding(3em, 0);\t\t\t\tbackground-color: transparent !important;\t\t\t\tborder-top: solid 2px _palette(border);\t\t\t\twidth: 100%;\t\t\t\t&:first-child {\t\t\t\t\tborder-top: 0;\t\t\t\t}\t\t\t}\t\t}\t}/* Spotlight */\t.spotlight {\t\t@include vendor('align-items', 'center');\t\t@include vendor('display', 'flex');\t\t.image {\t\t\t@include vendor('order', '1');\t\t\tborder-radius: 0;\t\t\twidth: 40%;\t\t\timg {\t\t\t\tborder-radius: 0;\t\t\t\twidth: 100%;\t\t\t}\t\t}\t\t.content {\t\t\t@include padding(2em, 4em);\t\t\t@include vendor('order', '2');\t\t\tmax-width: 48em;\t\t\twidth: 60%;\t\t}\t\t&:nth-child(2n) {\t\t\t@include vendor('flex-direction', 'row-reverse');\t\t}\t\t@for $i from 1 through _misc(max-spotlights) {\t\t\t$j: 0.075 * $i;\t\t\t&:nth-child(#{$i}) {\t\t\t\tbackground-color: rgba(0,0,0, $j);\t\t\t}\t\t}\t\t@include breakpoint(large) {\t\t\t.image {\t\t\t\twidth: 45%;\t\t\t}\t\t\t.content {\t\t\t\twidth: 55%;\t\t\t}\t\t}\t\t@include breakpoint(medium) {\t\t\tdisplay: block;\t\t\tbr {\t\t\t\tdisplay: none;\t\t\t}\t\t\t.image {\t\t\t\twidth: 100%;\t\t\t}\t\t\t.content {\t\t\t\t@include padding(4em, 3em);\t\t\t\tmax-width: none;\t\t\t\ttext-align: center;\t\t\t\twidth: 100%;\t\t\t}\t\t}\t\t@include breakpoint(small) {\t\t\t.content {\t\t\t\t@include padding(3em, 2em);\t\t\t}\t\t}\t}/* Wrapper */\t@mixin wrapper($p) {\t\tbackground-color: _palette($p, bg);\t\tcolor: _palette($p, fg);\t\t// Basic\t\t\tstrong, b {\t\t\t\tcolor: _palette($p, fg-bold);\t\t\t}\t\t\th2, h3, h4, h5, h6 {\t\t\t\tcolor: _palette($p, fg-bold);\t\t\t}\t\t\thr {\t\t\t\tborder-color: _palette($p, border);\t\t\t}\t\t\tblockquote {\t\t\t\tborder-color: _palette($p, border);\t\t\t}\t\t\tcode {\t\t\t\tbackground: _palette($p, border-bg);\t\t\t}\t\t// Section/Article\t\t\theader {\t\t\t\tp {\t\t\t\t\tcolor: _palette($p, fg-light);\t\t\t\t}\t\t\t\t&.major {\t\t\t\t\th2, h3, h4, h5, h6 {\t\t\t\t\t\tborder-color: _palette($p, border);\t\t\t\t\t}\t\t\t\t\tp {\t\t\t\t\t\tcolor: _palette($p, fg);\t\t\t\t\t}\t\t\t\t}\t\t\t}\t\t// Form\t\t\tlabel {\t\t\t\tcolor: _palette($p, fg-bold);\t\t\t}\t\t\tinput[type=\"text\"],\t\t\tinput[type=\"password\"],\t\t\tinput[type=\"email\"],\t\t\tselect,\t\t\ttextarea {\t\t\t\tbackground: _palette($p, border-bg);\t\t\t}\t\t\t.select-wrapper {\t\t\t\t&:before {\t\t\t\t\tcolor: _palette($p, border);\t\t\t\t}\t\t\t}\t\t\tinput[type=\"checkbox\"],\t\t\tinput[type=\"radio\"], {\t\t\t\t& + label {\t\t\t\t\tcolor: _palette($p, fg);\t\t\t\t\t&:before {\t\t\t\t\t\tbackground: _palette($p, border-bg);\t\t\t\t\t}\t\t\t\t}\t\t\t\t&:checked + label {\t\t\t\t\t&:before {\t\t\t\t\t\tbackground: _palette($p, fg-bold);\t\t\t\t\t\tcolor: _palette($p, bg);\t\t\t\t\t}\t\t\t\t}\t\t\t}\t\t\t::-webkit-input-placeholder {\t\t\t\tcolor: _palette($p, fg-light) !important;\t\t\t}\t\t\t:-moz-placeholder {\t\t\t\tcolor: _palette($p, fg-light) !important;\t\t\t}\t\t\t::-moz-placeholder {\t\t\t\tcolor: _palette($p, fg-light) !important;\t\t\t}\t\t\t:-ms-input-placeholder {\t\t\t\tcolor: _palette($p, fg-light) !important;\t\t\t}\t\t\t.formerize-placeholder {\t\t\t\tcolor: _palette($p, fg-light) !important;\t\t\t}\t\t// Icon\t\t\t.icon {\t\t\t\t&.major {\t\t\t\t\tborder-color: _palette($p, border);\t\t\t\t}\t\t\t}\t\t// List\t\t\tul {\t\t\t\t&.alt {\t\t\t\t\tli {\t\t\t\t\t\tborder-color: _palette($p, border);\t\t\t\t\t}\t\t\t\t}\t\t\t}\t\t// Table\t\t\ttable {\t\t\t\ttbody {\t\t\t\t\ttr {\t\t\t\t\t\tborder-color: _palette($p, border);\t\t\t\t\t\t&:nth-child(2n + 1) {\t\t\t\t\t\t\tbackground-color: _palette($p, border-bg);\t\t\t\t\t\t}\t\t\t\t\t}\t\t\t\t}\t\t\t\tth {\t\t\t\t\tcolor: _palette($p, fg-bold);\t\t\t\t}\t\t\t\tthead {\t\t\t\t\tborder-color: _palette($p, border);\t\t\t\t}\t\t\t\ttfoot {\t\t\t\t\tborder-color: _palette($p, border);\t\t\t\t}\t\t\t\t&.alt {\t\t\t\t\ttbody {\t\t\t\t\t\ttr {\t\t\t\t\t\t\ttd {\t\t\t\t\t\t\t\tborder-color: _palette($p, border);\t\t\t\t\t\t\t}\t\t\t\t\t\t}\t\t\t\t\t}\t\t\t\t}\t\t\t}\t\t// Button\t\t\tinput[type=\"submit\"],\t\t\tinput[type=\"reset\"],\t\t\tinput[type=\"button\"],\t\t\tbutton,\t\t\t.button {\t\t\t\tbox-shadow: inset 0 0 0 2px _palette($p, border);\t\t\t\tcolor: _palette($p, fg-bold);\t\t\t\t&:hover {\t\t\t\t\tbackground-color: _palette($p, border-bg);\t\t\t\t}\t\t\t\t&:active {\t\t\t\t\tbackground-color: _palette($p, border2-bg);\t\t\t\t}\t\t\t}\t\t// Features\t\t\t.features {\t\t\t\tli {\t\t\t\t\t@include breakpoint(small) {\t\t\t\t\t\tborder-top-color: _palette($p, border);\t\t\t\t\t}\t\t\t\t}\t\t\t}\t}\t.wrapper {\t\t@include padding(6em, 0);\t\t> .inner {\t\t\twidth: 60em;\t\t\tmargin: 0 auto;\t\t\t@include breakpoint(large) {\t\t\t\twidth: 90%;\t\t\t}\t\t\t@include breakpoint(medium) {\t\t\t\twidth: 100%;\t\t\t}\t\t}\t\t&.alt {\t\t\tpadding: 0;\t\t}\t\t&.style1 {\t\t\t@include wrapper(accent1);\t\t}\t\t&.style2 {\t\t\tbackground-color: _palette(bg);\t\t}\t\t&.style3 {\t\t\t@include wrapper(accent5);\t\t}\t\t&.style4 {\t\t\tbackground-color: transparent;\t\t}\t\t&.style5 {\t\t\t@include wrapper(accent7);\t\t}\t\t@include breakpoint(medium) {\t\t\t@include padding(4em, 3em);\t\t}\t\t@include breakpoint(small) {\t\t\t@include padding(3em, 2em);\t\t}\t}/* Page Wrapper + Menu */\t#page-wrapper {\t\t@include vendor('transition', 'opacity #{_duration(menu)} ease');\t\topacity: 1;\t\tpadding-top: 3em;\t\t&:before {\t\t\tbackground: rgba(0,0,0,0);\t\t\tcontent: '';\t\t\tdisplay: block;\t\t\tdisplay: none;\t\t\theight: 100%;\t\t\tleft: 0;\t\t\tposition: fixed;\t\t\ttop: 0;\t\t\twidth: 100%;\t\t\tz-index: _misc(z-index-base) + 1;\t\t}\t}\t#menu {\t\t@include vendor('transform', 'translateX(20em)');\t\t@include vendor('transition', 'transform #{_duration(menu)} ease');\t\t-webkit-overflow-scrolling: touch;\t\tbackground: _palette(accent1, bg);\t\tcolor: _palette(accent1, fg-bold);\t\theight: 100%;\t\tmax-width: 80%;\t\toverflow-y: auto;\t\tpadding: 3em 2em;\t\tposition: fixed;\t\tright: 0;\t\ttop: 0;\t\twidth: 20em;\t\tz-index: _misc(z-index-base) + 2;\t\tul {\t\t\tlist-style: none;\t\t\tpadding: 0;\t\t> li {\t\t\t\tborder-top: solid 1px _palette(accent1, border);\t\t\t\tmargin: 0.5em 0 0 0;\t\t\t\tpadding: 0.5em 0 0 0;\t\t\t\t&:first-child {\t\t\t\t\tborder-top: 0 !important;\t\t\t\t\tmargin-top: 0 !important;\t\t\t\t\tpadding-top: 0 !important;\t\t\t\t}\t\t\t\t> a {\t\t\t\t\tborder: 0;\t\t\t\t\tcolor: inherit;\t\t\t\t\tdisplay: block;\t\t\t\t\tfont-size: 0.8em;\t\t\t\t\tletter-spacing: _size(letter-spacing-alt);\t\t\t\t\toutline: 0;\t\t\t\t\ttext-decoration: none;\t\t\t\t\ttext-transform: uppercase;\t\t\t\t\t@include breakpoint(small) {\t\t\t\t\t\tline-height: 3em;\t\t\t\t\t}\t\t\t\t}\t\t\t}\t\t}\t\t.cd-accordion-menu input[type=checkbox] {\t\t/* hide native checkbox */\t\tposition: absolute;\t\topacity: 0;\t}\t\t// .cd-accordion-menu input[type=checkbox]#group-1 {\t\t//\t\t// }\t\t.cd-accordion-menu label, .cd-accordion-menu a {\t\t\tposition: relative;\t\t\tdisplay: block;\t\t\tpadding: 0;\t\t\tborder: 0;\t\t\tcolor: inherit;\t\t\tdisplay: block;\t\t\tletter-spacing: _size(letter-spacing-alt);\t\t\toutline: 0;\t\t\ttext-decoration: none;\t\t\ttext-transform: uppercase;\t\t\tfont-size: 0.8em;\t\t\t&:before {\t\t\t\tdisplay: none;\t\t\t}\t\t}\t\t\t\t\t.cd-accordion-menu ul {\t\t\t\t/* by default hide all sub menus */\t\t\t\tdisplay: none;\t\t\t}\t\t\t\t\t\t.cd-accordion-menu input[type=checkbox]:checked + label + ul,\t\t\t\t\t\t.cd-accordion-menu input[type=checkbox]:checked + label:nth-of-type(n) + ul {\t\t\t\t\t\t\t/* use label:nth-of-type(n) to fix a bug on safari ( li {\t\t\t\t\t\t\t\t\tpadding-left: 1em;\t\t\t\t\t\t\t\t}\t\t\t\t\t\t}\t\t\t\t\t\t.cd-accordion-menu.animated label::before {\t\t\t\t\t\t  /* this class is used if you're using jquery to animate the accordion */\t\t\t\t\t\t  -webkit-transition: -webkit-transform 0.3s;\t\t\t\t\t\t  -moz-transition: -moz-transform 0.3s;\t\t\t\t\t\t  transition: transform 0.3s;\t\t\t\t\t\t}\t\t.close {\t\t\tbackground-image: url('images/close.svg');\t\t\tbackground-position: 4.85em 1em;\t\t\tbackground-repeat: no-repeat;\t\t\tborder: 0;\t\t\tcursor: pointer;\t\t\tdisplay: block;\t\t\theight: 3em;\t\t\tposition: absolute;\t\t\tright: 0;\t\t\ttop: 0;\t\t\tvertical-align: middle;\t\t\twidth: 7em;\t\t}\t\t@include breakpoint(small) {\t\t\tpadding: 3em 1.5em;\t\t}\t}\tbody.is-menu-visible {\t\t#page-wrapper {\t\t\topacity: 0.35;\t\t\t&:before {\t\t\t\tdisplay: block;\t\t\t}\t\t}\t\t#menu {\t\t\t@include vendor('transform', 'translateX(0)');\t\t}\t}/* Header */\t#header {\t\t@include vendor('transition', 'background-color #{_duration(transitions)} ease');\t\tbackground: _palette(bg);\t\theight: 3em;\t\tleft: 0;\t\tline-height: 3em;\t\tposition: fixed;\t\ttop: 0;\t\twidth: 100%;\t\tz-index: _misc(z-index-base);\t\th1 {\t\t\t@include vendor('transition', 'opacity #{_duration(transitions)} ease');\t\t\theight: inherit;\t\t\tleft: 1.25em;\t\t\tline-height: inherit;\t\t\tposition: absolute;\t\t\ttop: 0;\t\t\ta {\t\t\t\tborder: 0;\t\t\t\tdisplay: block;\t\t\t\theight: inherit;\t\t\t\tline-height: inherit;\t\t\t\tcolor: _palette(fg);\t\t\t\t@include breakpoint(small) {\t\t\t\t\tfont-size: 0.8em;\t\t\t\t}\t\t\t}\t\t}\t\tnav {\t\t\theight: inherit;\t\t\tline-height: inherit;\t\t\tposition: absolute;\t\t\tright: 0;\t\t\ttop: 0;\t\t\t> ul {\t\t\t\tlist-style: none;\t\t\t\tmargin: 0;\t\t\t\tpadding: 0;\t\t\t\twhite-space: nowrap;\t\t\t\t> li {\t\t\t\t\tdisplay: inline-block;\t\t\t\t\tpadding: 0;\t\t\t\t\t> a {\t\t\t\t\t\tborder: 0;\t\t\t\t\t\tcolor: _palette(fg-bold);\t\t\t\t\t\tdisplay: block;\t\t\t\t\t\tfont-size: 0.8em;\t\t\t\t\t\tletter-spacing: _size(letter-spacing-alt);\t\t\t\t\t\tpadding: 0 1.5em;\t\t\t\t\t\ttext-transform: uppercase;\t\t\t\t\t\t&.menuToggle {\t\t\t\t\t\t\toutline: 0;\t\t\t\t\t\t\tposition: relative;\t\t\t\t\t\t\t&:after {\t\t\t\t\t\t\t\tbackground-image: url('images/bars.svg');\t\t\t\t\t\t\t\tbackground-position: right center;\t\t\t\t\t\t\t\tbackground-repeat: no-repeat;\t\t\t\t\t\t\t\tcontent: '';\t\t\t\t\t\t\t\tdisplay: inline-block;\t\t\t\t\t\t\t\theight: 3.75em;\t\t\t\t\t\t\t\tvertical-align: top;\t\t\t\t\t\t\t\twidth: 2em;\t\t\t\t\t\t\t}\t\t\t\t\t\t\t@include breakpoint(small) {\t\t\t\t\t\t\t\tpadding: 0 1.5em;\t\t\t\t\t\t\t\tspan {\t\t\t\t\t\t\t\t\tdisplay: none;\t\t\t\t\t\t\t\t}\t\t\t\t\t\t\t}\t\t\t\t\t\t}\t\t\t\t\t\t@include breakpoint(small) {\t\t\t\t\t\t\tpadding: 0 0 0 1.5em;\t\t\t\t\t\t}\t\t\t\t\t}\t\t\t\t\t&:first-child {\t\t\t\t\t\tmargin-left: 0;\t\t\t\t\t}\t\t\t\t}\t\t\t}\t\t}\t\t&.alt {\t\t\tbackground: transparent;\t\t\th1 {\t\t\t\t@include vendor('pointer-events', 'none');\t\t\t\topacity: 0;\t\t\t}\t\t}\t}/* Banner */\t#banner {\t\t@include vendor('display', 'flex');\t\t@include vendor('flex-direction', 'column');\t\t@include vendor('justify-content', 'space-around');\t\tcursor: default;\t\theight: 100vh;\t\tmin-height: 35em;\t\toverflow: hidden;\t\tposition: relative;\t\ttext-align: center;\t\th2 {\t\t\t@include vendor('transform', 'scale(1)');\t\t\t@include vendor('transition', ('transform 0.5s ease', 'opacity 0.5s ease'));\t\t\tdisplay: inline-block;\t\t\tfont-size: 1.75em;\t\t\topacity: 1;\t\t\tpadding: 0.35em 1em;\t\t\tposition: relative;\t\t\tz-index: 1;\t\t\t&:before, &:after {\t\t\t\t@include vendor('transition', 'width 0.85s ease');\t\t\t\t@include vendor('transition-delay', '0.25s');\t\t\t\tbackground: _palette(fg-bold);\t\t\t\tcontent: '';\t\t\t\tdisplay: block;\t\t\t\theight: 2px;\t\t\t\tposition: absolute;\t\t\t\twidth: 100%;\t\t\t}\t\t\t&:before {\t\t\t\ttop: 0;\t\t\t\tleft: 0;\t\t\t}\t\t\t&:after {\t\t\t\tbottom: 0;\t\t\t\tright: 0;\t\t\t}\t\t}\t\tp {\t\t\tletter-spacing: _size(letter-spacing-alt);\t\t\ttext-transform: uppercase;\t\t\ta {\t\t\t\tcolor: inherit;\t\t\t}\t\t}\t\t.more {\t\t\t@include vendor('transition', ('transform 0.75s ease', 'opacity 0.75s ease'));\t\t\t@include vendor('transition-delay', '3.5s');\t\t\t@include vendor('transform', 'translateY(0)');\t\t\tborder: none;\t\t\tbottom: 0;\t\t\tcolor: inherit;\t\t\tfont-size: 0.8em;\t\t\theight: 8.5em;\t\t\tleft: 50%;\t\t\tletter-spacing: _size(letter-spacing-alt);\t\t\tmargin-left: -8.5em;\t\t\topacity: 1;\t\t\toutline: 0;\t\t\tpadding-left: _size(letter-spacing-alt);\t\t\tposition: absolute;\t\t\ttext-align: center;\t\t\ttext-transform: uppercase;\t\t\twidth: 16em;\t\t\tz-index: 1;\t\t\t&:after {\t\t\t\tbackground-image: url('images/arrow.svg');\t\t\t\tbackground-position: center;\t\t\t\tbackground-repeat: no-repeat;\t\t\t\tbackground-size: contain;\t\t\t\tbottom: 4em;\t\t\t\tcontent: '';\t\t\t\tdisplay: block;\t\t\t\theight: 1.5em;\t\t\t\tleft: 50%;\t\t\t\tmargin: 0 0 0 -0.75em;\t\t\t\tposition: absolute;\t\t\t\twidth: 1.5em;\t\t\t}\t\t}\t\t&:after {\t\t\t@include vendor('pointer-events', 'none');\t\t\t@include vendor('transition', 'opacity #{_duration(fadein)} ease-in-out');\t\t\t@include vendor('transition-delay', '1.25s');\t\t\tcontent: '';\t\t\tbackground: _palette(bg);\t\t\tdisplay: block;\t\t\twidth: 100%;\t\t\theight: 100%;\t\t\tposition: absolute;\t\t\tleft: 0;\t\t\ttop: 0;\t\t\topacity: 0;\t\t}\t\t@include breakpoint(small) {\t\t\t@include padding(7em, 3em);\t\t\theight: auto;\t\t\tmin-height: 0;\t\t\th2 {\t\t\t\tfont-size: 1.25em;\t\t\t}\t\t\tbr {\t\t\t\tdisplay: none;\t\t\t}\t\t\t.more {\t\t\t\tdisplay: none;\t\t\t}\t\t}\t}\tbody.is-loading {\t\t#banner {\t\t\th2 {\t\t\t\t@include vendor('transform', 'scale(0.95)');\t\t\t\topacity: 0;\t\t\t\t&:before, &:after {\t\t\t\t\twidth: 0;\t\t\t\t}\t\t\t}\t\t\t.more {\t\t\t\t@include vendor('transform', 'translateY(8.5em)');\t\t\t\topacity: 0;\t\t\t}\t\t\t&:after {\t\t\t\topacity: 1;\t\t\t}\t\t}\t}/* CTA */\t#cta {\t\t.inner {\t\t\t@include vendor('display', 'flex');\t\t\tmax-width: 45em;\t\t\theader {\t\t\t\t@include vendor('order', '1');\t\t\t\tpadding-right: 3em;\t\t\t\twidth: 70%;\t\t\t\tp {\t\t\t\t\tcolor: inherit;\t\t\t\t}\t\t\t}\t\t\t.actions {\t\t\t\t@include vendor('order', '2');\t\t\t\twidth: 30%;\t\t\t}\t\t\t@include breakpoint(medium) {\t\t\t\tdisplay: block;\t\t\t\ttext-align: center;\t\t\t\theader {\t\t\t\t\tpadding-right: 0;\t\t\t\t\twidth: 100%;\t\t\t\t}\t\t\t\t.actions {\t\t\t\t\tmargin-left: auto;\t\t\t\t\tmargin-right: auto;\t\t\t\t\tmax-width: 20em;\t\t\t\t\twidth: 100%;\t\t\t\t}\t\t\t}\t\t\t@include breakpoint(small) {\t\t\t\t.actions {\t\t\t\t\tmax-width: none;\t\t\t\t}\t\t\t}\t\t}\t}/* Main */\t#main {\t\t> header {\t\t\t@include padding(12em, 0);\t\t\t@include vendor('background-image', ('linear-gradient(top, rgba(0,0,0,0.5), rgba(0,0,0,0.5))', 'url(\"#{$baseurl}/000_banner.jpg\")'));\t\t\t// padding: 10em 0 20em 0;\t\t\tbackground-attachment: fixed;\t\t\tbackground-position: center center;\t\t\tbackground-repeat: no-repeat;\t\t\tbackground-size: cover;\t\t\ttext-align: center;\t\t\theight: 100vh;\t\t\tdisplay: flex;\t\t\tjustify-content: space-around;\t\t\tmin-height: 35em;\t\t\toverflow: hidden;\t\t\th2 {\t\t\t\tfont-size: 1.75em;\t\t\t\tmargin: 0 0 (_size(element-margin) * 0.25) 0;\t\t\t\ttext-shadow: 3px 2px 2px black;\t\t\t}\t\t\tp {\t\t\t\tcolor: inherit;\t\t\t\tletter-spacing: _size(letter-spacing-alt);\t\t\t\ttext-transform: uppercase;\t\t\t\ttop: 0;\t\t\t\ttext-shadow: 2px 1px 2px black;\t\t\t\ta {\t\t\t\t\tcolor: inherit;\t\t\t\t}\t\t\t}\t\t\t@include breakpoint(xlarge) {\t\t\t\t@include padding(10em, 0);\t\t\t}\t\t\t@include breakpoint(large) {\t\t\t\t@include padding(8em, 3em);\t\t\t}\t\t\t@include breakpoint(medium) {\t\t\t\t@include padding(10em, 3em);\t\t\t}\t\t\t@include breakpoint(small) {\t\t\t\t@include padding(5em, 3em);\t\t\t\th2 {\t\t\t\t\tfont-size: 1.25em;\t\t\t\t\tmargin: 0 0 (_size(element-margin) * 0.5) 0;\t\t\t\t\ttext-shadow: 1px 1px 2px black;\t\t\t\t}\t\t\t}\t\t}\t}\tbody.is-mobile {\t\t#main {\t\t\t> header {\t\t\t\tbackground-attachment: scroll;\t\t\t}\t\t}\t}/* Footer */\t#footer {\t\t@include padding(6em, 0);\t\tbackground-color: darken(_palette(bg), 8);\t\ttext-align: center;\t\t.icons {\t\t\tfont-size: 1.25em;\t\t\ta {\t\t\t\tcolor: _palette(fg-light);\t\t\t\t&:hover {\t\t\t\t\tcolor: _palette(fg);\t\t\t\t}\t\t\t}\t\t}\t\t.copyright {\t\t\tcolor: _palette(fg-light);\t\t\tfont-size: 0.8em;\t\t\tletter-spacing: _size(letter-spacing-alt);\t\t\tlist-style: none;\t\t\tpadding: 0;\t\t\ttext-transform: uppercase;\t\t\tli {\t\t\t\tborder-left: solid 1px _palette(fg-light);\t\t\t\tdisplay: inline-block;\t\t\t\tline-height: 1em;\t\t\t\tmargin-left: 1em;\t\t\t\tpadding-left: 1em;\t\t\t\t&:first-child {\t\t\t\t\tborder-left: 0;\t\t\t\t\tmargin-left: 0;\t\t\t\t\tpadding-left: 0;\t\t\t\t}\t\t\t\ta {\t\t\t\t\tcolor: inherit;\t\t\t\t\t&:hover {\t\t\t\t\t\tcolor: _palette(fg);\t\t\t\t\t}\t\t\t\t}\t\t\t\t@include breakpoint(xsmall) {\t\t\t\t\tborder: 0;\t\t\t\t\tdisplay: block;\t\t\t\t\tline-height: 1.65em;\t\t\t\t\tmargin: 0;\t\t\t\t\tpadding: 0.5em 0;\t\t\t\t}\t\t\t}\t\t}\t\t@include breakpoint(medium) {\t\t\t@include padding(4em, 3em);\t\t}\t\t@include breakpoint(small) {\t\t\t@include padding(3em, 2em);\t\t}\t}/* Landing */\tbody.landing {\t\t#page-wrapper {\t\t\tpadding-top: 0;\t\t\tbackground-repeat: no-repeat;\t\t\tbackground-attachment: fixed;\t\t\tbackground-position: center center;\t\t\tbackground-size: cover;\t\t\t@include vendor('background-image', ('linear-gradient(top, rgba(0,0,0,0.5), rgba(0,0,0,0.5))', 'url(\"#{$baseurl}/000_banner.jpg\")'));\t\t}\t\t#footer {\t\t\tbackground-color: darken(transparentize(_palette(bg), 0.1), 8);\t\t}\t}\tbody.is-mobile {\t\t&.landing {\t\t\t#page-wrapper {\t\t\t\tbackground: none;\t\t\t}\t\t\t#banner,\t\t\t.wrapper.style4 {\t\t\t\tbackground-repeat: no-repeat;\t\t\t\tbackground-position: center center;\t\t\t\tbackground-size: cover;\t\t\t\t@include vendor('background-image', ('linear-gradient(top, rgba(0,0,0,0.5), rgba(0,0,0,0.5))', 'url(\"#{$baseurl}/000_banner.jpg\")'));\t\t\t}\t\t\t#footer {\t\t\t\tbackground-color: darken(_palette(bg), 8);\t\t\t}\t\t}\t}",
        "url": "/css/main.css"
      }
      ,

      "search-html": {
        "title": "Results",
        "author": "",
        "category": "",
        "content": "",
        "url": "/search.html"
      }


  };
</script>
<script src="/js/lunr.min.js"></script>
<script src="/js/search.js"></script>
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
