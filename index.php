<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- iOS Full Screen -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="white">
<title> Yearbook </title>
<link rel="author" href="humans.txt" />
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mobile.custom.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mobile.custom.theme.css">
<link rel="stylesheet" type="text/css" href="css/spectrum.css">
<link rel="stylesheet" type="text/css" href="css/colorbox.css">

<link rel="apple-touch-icon-precomposed" href="Icon.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="Icon-72.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="Icon@2x.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="Icon-72@2x.png" />
<!--
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.css">
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/ui-lightness/jquery-ui.min.css">
-->
<link rel="stylesheet" type="text/css" href="css/style.css">



<script src="http://code.jquery.com/jquery-latest.min.js"> </script>
<script src="js/jquery.preload-min.js"> </script>
<script src="js/jquery.colorbox-min.js"></script>
<!--
<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"> </script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"> </script>
<script src="https://raw.github.com/WickyNilliams/enquire.js/master/dist/enquire.min.js"> </script>
-->
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/spectrum.js"> </script>
<script src="js/functions.js"> </script>
<script src="js/canvas.js"> </script>
<script src="js/style.js"> </script>
<script>
    var individualPage = false;
    <?php
        if(isset($_GET['student'])){
            echo 'individualPage = true;';
        }

    ?>    
    
    $(document).ready(function(){
    <?php
        if(isset($_GET['student'])){
            echo '$(\'li[data-fname='.$_GET['student'].']\').trigger("tap");';
            echo '$(\'li[data-fname='.ucfirst($_GET['student']).']\').trigger("tap");';
            echo '$("#landing").css({"display":"none"});';
            echo '$("#studentBtn").css({"display":"none"});';
            echo '$("#logoBtn").css({"display":"none"});';
            echo '$("#infoBtn").css({"display":"none"});';

        }
    ?>
    });
    
</script>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="poitrait_cover">
    <div id="go_away">
        <h1> Portrait Mode is not Supported </h1>
        <p> This application doesn't support Portrait Mode on your device, please switch your device to Landscape Mode and Lock Device Orientation for better experiences </p>
    </div>
</div>

<div id="wrapper">
    <div id="canvas_container">
        <canvas id="canvas" width="1px" height="1px"></canvas>
        <ul>
            <li class="canvas_options" id="fat_brush"><img src="imgs/fatBrush.png" alt=""></li>
            <li class="canvas_options" id="normal_brush"><img src="imgs/normalBrush.png" alt=""></li>
            <li class="canvas_options" id="skinny_brush"><img src="imgs/thinBrush.png" alt=""></li>
            <li class="canvas_options" id="colorPicker"><input class="minicolors"></li>
            <li class="canvas_options" id="eraser"><img src="imgs/eraser.png" alt=""></li>
            <li class="canvas_options" id="undo"><img src="imgs/undo.png" alt=""></li>
            <li class="canvas_options" id="clear"><img src="imgs/clear.png" alt=""></li>
            <li class="canvas_options" id="saveCanvas"><img src="imgs/save.png" alt=""></li>
            <li class="canvas_options" id="cancleCanvas"><img src="imgs/cancel.png" alt=""></li>
        </ul>
    </div>
    
    <div id="loading">
        <div id="loading_text">
            <h1> <span id="loadingPercent">0%</span> <br>Loading Assets </h1>
        </div>
        
    </div>
	<aside>
    	<ul>
        	<li id="logoBtn"><img alt="" src="imgs/ic-04.svg"></li>
            <li id="studentBtn"><img alt="" src="imgs/ic-01.svg"></li>
            <!-- <li id="facilityBtn"><img alt="" src="imgs/ic-02.svg"></li>
            <li id="galleryBtn"><img alt="" src="imgs/ic-03.svg"></li> -->
            <li id="infoBtn"><img alt="" src="imgs/ic-05.svg"></li>
        </ul>
    </aside>
    <nav>
    	<div id="nav_container">
        	<ul id="nav_top">
            	<li id="allBtn"><div class="nav_top_item"><div class="nav_top_icon"><img alt="" src="imgs/ic-10.svg"></div><p> Everyone </p></div></li>
            	<li id="designBtn"><div class="nav_top_item"><div class="nav_top_icon"><img alt="" src="imgs/ic-06.svg"></div><p> Designers </p></div></li>
                <li id="developBtn"><div class="nav_top_item"><div class="nav_top_icon"><img alt="" src="imgs/ic-07.svg"></div><p> Developers </p></div></li>
                <li id="videoBtn"><div class="nav_top_item"><div class="nav_top_icon"><img alt="" src="imgs/ic-08.svg"></div><p> Film/Video </p></div></li>
                <li id="hybridBtn"><div class="nav_top_item"><div class="nav_top_icon"><img alt="" src="imgs/ic-09.svg"></div><p> Hybrids </p></div></li>
            </ul>
            
            <div class="black_line">
                <div class="black_stroke"></div>
            </div>
            <ul id="nav_main">
                <!--

				<li class="designStudent"> <img alt="" src="imgs/studentPic/821208238.png"> <p>Design</p> </li>

                <li class="developStudent"> <img alt="" src="imgs/studentPic/820549772.png"> <p>Develop Student</p> </li>

                <li class="videoStudent"> <img alt="" src="imgs/studentPic/820549772.png"> <p>Video Student</p> </li>

                <li class="hybridStudent"> <img alt="" src="imgs/studentPic/820549772.png"> <p>hybrid Student</p> </li>

                 1-10 -->
                
                
                

                <li class="hybridStudent" data-fname="umar" data-image="umar_bacchus.png"> <img alt="" src="imgs/studentPic/umar_bacchus.png"> <p>Umar Bacchus</p> </li>

                <li class="developStudent" data-fname="Meghan" data-image="meghan_berman.png"> <img alt="" src="imgs/studentPic/meghan_berman.png"> <p>Meghan Berman</p> </li>

                <li class="videoStudent" data-fname="Chris" data-image="chris_blackford.png"> <img alt="" src="imgs/studentPic/chris_blackford.png"> <p>Chris Blackford</p> </li>

                <li class="hybridStudent" data-fname="ivan" data-image="ivan_cubus.png"> <img alt="" src="imgs/studentPic/ivan_cubus.png"> <p>Ivan Cabus</p> </li>

                <li class="hybridStudent" data-fname="Kevin" data-image="kevin_cox.png"> <img alt="" src="imgs/studentPic/kevin_cox.png"> <p>Kevin Cox</p> </li>

                <li class="designStudent" data-fname="Alex" data-image="alex_defrancesco.png"> <img alt="" src="imgs/studentPic/alex_defrancesco.png"> <p>Alex DeFrancesco</p> </li>

                <li class="hybridStudent" data-fname="Vince" data-image="vince_dirosa.png"> <img alt="" src="imgs/studentPic/vince_dirosa.png"> <p>Vince Di Rosa</p> </li>

                <li class="designStudent" data-fname="Daniel" data-image="daniel_donnelly.png"> <img alt="" src="imgs/studentPic/daniel_donnelly.png"> <p>Daniel Donnelly</p> </li>

                <li class="designStudent" data-fname="DeShawn" data-image="deshawn_downs.png"> <img alt="" src="imgs/studentPic/deshawn_downs.png"> <p>DeShawn Downs</p> </li>
                
                <li class="hybridStudent" data-fname="jeffrey-ace" data-image="jeff_fulgar.png"><img alt="" src="imgs/studentPic/jeff_fulgar.png"> <p>Jeffrey Ace N Fulgar</p> </li>
                

                <li class="designStudent" data-fname="shigeo" data-image="shigeo_katsura.png"><img alt="" src="imgs/studentPic/shigeo_katsura.png"> <p>Shigeo Katsura-Gordon</p> </li>

                <!-- 11-20 -->

                <li class="designStudent" data-fname="Riley" data-image="riley_garciastanley.png"> <img alt="" src="imgs/studentPic/riley_garciastanley.png"> <p>Riley Garcia-Stanley</p> </li>

                <li class="developStudent" data-fname="Francesco" data-image="franceso_gisonni.png"> <img alt="" src="imgs/studentPic/franceso_gisonni.png"> <p>Francesco Gisonni</p> </li>

                <li class="hybridStudent" data-fname="Celestina" data-image="celestina_gomes.png"> <img alt="" src="imgs/studentPic/celestina_gomes.png"> <p>Celestina Gomes</p> </li>

                <li class="videoStudent" data-fname="Raguvarathan" data-image="ragu_g.png"> <img alt="" src="imgs/studentPic/ragu_g.png"> <p>Raguvarathan Gopalasingam</p> </li>

                <li class="designStudent" data-fname="Lisa" data-image="lisa_hill.png"> <img alt="" src="imgs/studentPic/lisa_hill.png"> <p>Lisa Hill</p> </li>

                <li class="videoStudent" data-fname="Liana" data-image="liana_jocson.png"> <img alt="" src="imgs/studentPic/liana_jocson.png"> <p>Liana Jocson</p> </li>

                <li class="designStudent" data-fname="Cassie" data-image="cass_kaiser.png"> <img alt="" src="imgs/studentPic/cass_kaiser.png"> <p>Cassie Kaiser</p> </li>

                <li class="designStudent" data-fname="Akhil" data-image="akhil_katoch.png"> <img alt="" src="imgs/studentPic/akhil_katoch.png"> <p>Akhil Katoch</p> </li>

                <li class="designStudent" data-fname="Yukari" data-image="yukari_kawasaki.png"> <img alt="" src="imgs/studentPic/yukari_kawasaki.png"> <p>Yukari Kawasaki</p> </li>

                <li class="videoStudent" data-fname="Ivona" data-image="ivona_k.png"> <img alt="" src="imgs/studentPic/ivona_k.png"> <p>Ivona Kmiecik-Buczynska</p> </li>

                <!-- 21-30 -->

                <li class="designStudent" data-fname="Karysa" data-image="karysa_knott.png"> <img alt="" src="imgs/studentPic/karysa_knott.png"> <p>Karysa Knott</p> </li>

                <li class="hybridStudent" data-fname="Marianne" data-image="marianne_landry.png"> <img alt="" src="imgs/studentPic/marianne_landry.png"> <p>Marianne Landry</p> </li>

                <li class="hybridStudent" data-fname="Justin" data-image="justin_liu.png"> <img alt="" src="imgs/studentPic/justin_liu.png"> <p>Justin Liu</p> </li>

                <li class="designStudent" data-fname="Edward" data-image="edward_makolomi.png"> <img alt="" src="imgs/studentPic/edward_makolomi.png"> <p>Edward Makolomi</p> </li>

                <li class="hybridStudent" data-fname="Shahina" data-image="shahina_meru.png"> <img alt="" src="imgs/studentPic/shahina_meru.png"> <p>Shahina Meru</p> </li>

                <li class="developStudent" data-fname="Ryan" data-image="ryan_moreau.png"> <img alt="" src="imgs/studentPic/ryan_moreau.png"> <p>Ryan Moreau</p> </li>

                <li class="hybridStudent" data-fname="candi" data-image="candi_pusey.png"> <img alt="" src="imgs/studentPic/candi_pusey.png"> <p>Candi Pusey</p> </li>

                <!--<li class="videoStudent"> <img alt="" src="imgs/studentPic/821208238.png"> <p>Yannick  Nair</p> </li>-->

                <li class="hybridStudent" data-fname="Volodymyr" data-image="vlad_pekh.png"> <img alt="" src="imgs/studentPic/vlad_pekh.png"> <p>Volodymyr Pekh</p> </li>

                <li class="hybridStudent" data-fname="Stephan" data-image="stephan_peralta.png"> <img alt="" src="imgs/studentPic/stephan_peralta.png"> <p>Stephan Peralta</p> </li>

                <!-- <li class="designStudent"> <img alt="" src="imgs/studentPic/821208238.png"> <p>Andrew Puntillo</p> </li> -->

                <!-- 31-40 -->

                <li class="designStudent" data-fname="Fabian" data-image="fabian_quezada.png"> <img alt="" src="imgs/studentPic/fabian_quezada.png"> <p>Fabian Quezada</p> </li>

                <!-- <li class="designStudent"> <img alt="" src="imgs/studentPic/821208238.png"> <p>Gabriel Rojas</p> </li> -->

                <li class="videoStudent" data-fname="Myles" data-image="myles_smith.png"> <img alt="" src="imgs/studentPic/myles_smith.png"> <p>Myles Smith</p> </li> 

                <!-- <li class="videoStudent"> <img alt="" src="imgs/studentPic/821208238.png"> <p>Josh Taruc-Crispin</p> </li> -->

                <li class="developStudent" data-fname="Navdeep" data-image="navdeep_saini.png"> <img alt="" src="imgs/studentPic/navdeep_saini.png"> <p>Navdeep Saini</p> </li>

                <li class="designStudent" data-fname="Hira" data-image="hira_shoukat.png"> <img alt="" src="imgs/studentPic/hira_shoukat.png"> <p>Hira Shoukat</p> </li>

                <li class="designStudent" data-fname="Jaswinder" data-image="jas_singh.png"> <img alt="" src="imgs/studentPic/jas_singh.png"> <p>Jaswinder Singh</p> </li>

                <li class="designStudent" data-fname="Maninder" data-image="manny_singh.png"> <img alt="" src="imgs/studentPic/manny_singh.png"> <p>Maninder Singh</p> </li>
                
                <li class="developStudent" data-fname="keo" data-image="keo_strife.png"> <img alt="" src="imgs/studentPic/keo_strife.png"> <p>Keo Strife</p> </li>

                <li class="hybridStudent" data-fname="Aleshia" data-image="aleshia_wojdylo.png"> <img alt="" src="imgs/studentPic/aleshia_wojdylo.png"> <p>Aleshia Wojdylo</p> </li>

			</ul>
            <div class="black_line">
                <div class="black_stroke"></div>
            </div>
        </div>
    </nav>

    <section>
        <div id="landing">
            <div id="landing-01">
                <h2>Congratulations Class of 2013</h2>
                <br>
                
                <p><img src="imgs/swipeup.svg" alt=" "><br>
                    swipe up to continue</p>
            </div>
            <div id="landing-02" class="clearfix">
                <div class="left_div">
                    <img src="imgs/thedean.png" alt=" ">
                </div>
                <div class="right_div">
                    <h2>Welcome</h2><br>
                    <p>The School of Media Studies &amp; Information Technology offers the largest college-level combination of media-sector programs in Canada. We love what we do and we are very proud of our students’ success and achievements. Faculty, support staff, administrators and industry partners are focused on creating a learning environment where our students can develop to their full potential.</p><br>
                    <p>Our students are exposed to a broad variety of teaching methods and learning experiences designed to develop multifaceted professionals ready to succeed in their chosen field. From traditional classroom spaces and delivery, to leading-edge technology studios for highly experiential learning, the opportunities to experiment, learn and grow are endless.</p><br>
                    <p>Award-winning students, countless success stories, and graduates developing fantastic careers in all aspects of media and information technology, are the best testimonies to the work we do.</p><br>
                    <p><img src="imgs/deansig.png"></p>
                    <p>Guillermo Acosta,<br>
                        Dean</p>
                </div>
            </div>

            <div id="landing-03" class="clearfix">
                    <h2>Multimedia Design and Production Technician</h2><br>
                    <h3>Diploma | 2011-2013 | North Campus</h3><br>
                    <img src="imgs/profs/george.png" alt=" ">
                    <img src="imgs/profs/tom.png" alt=" ">
                    <img src="imgs/profs/linda.png" alt=" ">
                    <img src="imgs/profs/greg.png" alt=" ">
                    <img src="imgs/profs/chris.png" alt=" ">
                    <img src="imgs/profs/dwayne.png" alt=" ">
                    <img src="imgs/profs/amit.png" alt=" ">
                    <img src="imgs/profs/curtis.png" alt=" ">
                    <img src="imgs/profs/andrew.png" alt=" ">
                    <img src="imgs/profs/adam.png" alt=" "><br><br>
                    <h3 class="bold">Thank you to the entire faculty who taught over the last two years</h3><br>
                    <p class="small"><i>In order LtoR:<i> George Paravantes, Tom Green, Linda Nakanishi, Greg Goralski, Chris Maissan, <br>Dwayne (The Rock) Johnson, Amit Chail, Curtis Brown, Andrew Dertinger, Adam Leon.<br>
                    <i>Missing: </i> Arthur Campus, Jordan McCarthy, Domenic Ubaldino.<br>
                    <i>Honourable Mention:</i> James Cullin</p><br>
                    <img src="imgs/profs/james.png" alt=" ">
            </div>

            <div id="landing-04" class="clearfix">
                <h2>Yearbook Touch Gestures</h2>
                <p>Learn how navigate the app by learning which areas are interactive.</p>
                <p><u>Swipe left and right</u> on the image below to view it. <br><u>Tap on the image</u> below to overlay the gesture controls. </p><br><br>
                <div id="instructions">
                    <div id="instructions_container">
                        <img src="imgs/overview.png" alt=" " id="overview">
                        <img src="imgs/overlay.png" alt=" " id="overlay">
                    </div>
                        
                </div>
                <br><br>
                <h3>Ready to give it a shot? Open the grad menu on the left!</h3><br>
            </div>
        </div>



        <div id="info">

            <h2>Meet the teams!</h2>
            <p>Swipe up to view the various teams that contributed to the Grad Show.</p>

            <div class="team clearfix">
                <h2>Tablet Experience Team</h2>
                <p>Jeffrey Ace Fulgar &amp; Keo Strife</p>
                <img src="imgs/tabletteam.png" alt="">         
            </div>
            <div class="team clearfix">
                <h2>Responsive Website Team</h2>
                <p>Shigeo Katsura-Gordon, Shahina Meru, Stephan Peralta, Meghan Berman</p>
                <p class="small">MIA: Christopher Regnier-Davies, Elizbeth Shannon</p>
                <img src="imgs/webteam.png" alt="">       
            </div>
            <div class="team clearfix">
                <h2>Mobile App Team</h2>
                <p>Cassie Kaiser, Francesco Gisonnni</p>
                <img src="imgs/appteam.png" alt="">     
            </div>
            <div class="team clearfix">
                <h2>Photography Crew</h2>
                <p>Daniel Donnelly &amp; Ivona Kmiecik-Buczynska</p>
                <img src="imgs/camteam.png" alt="">  
            </div>
            <div class="team clearfix">
                <h2>Evolusion Brand Designer</h2>
                <p>Celestina Gomes</p>
                <img src="imgs/studentPose1/celestina_gomes.png" alt="">      
            </div>
            <div class="team clearfix">
                <h2>Evolusion Video Reel</h2>
                <p>Liana Jocson, Ivan Cubus, Jermaine Stephenson</p>
                <img src="imgs/vidteam.png" alt=""> 
            </div>
            <div class="team clearfix">
                <h2>Augmented Reality Team</h2>
                <p>Umar Bacchus, Candice Pusey, Yukari Kawasaki, Kevin Cox</p>
                <p class="small">MIA: Jermaine Stephenson</p>
                <img src="imgs/fitcteam.png" alt="">   
            </div>
        </div>

        <div id="main_content_container">
            <div id="main_content_header">
                <div id="main_content_cover"></div>
            </div>
            <div id="main_content">
                <div id="pose">
                    <img src="imgs/SW-blank.png" alt=" " id="pose1">
                    <img src="imgs/SW-blank.png" alt=" " id="pose2">
                </div>
                <div id="slider">
                    <div id="slider_container">
                        
                        <div id="selected_work1">
                            <img class="last loading-bg" src="imgs/SW-blank.png" alt=" ">
                        </div>
                        <div id="selected_work2">
                            <img class="last loading-bg" src="imgs/SW-blank.png" alt=" ">
                        </div>
                    </div>
                </div>
            </div>
            <div id="main_content_footer">
                <div class="name">
                    <a class="about_lightbox" id="student_bio" href="">
                        <img src="imgs/ic-about.svg" alt=" ">
                        <p id="student_name"> </p>
                    </a>
                </div>
                <div class="links">
                    <a class="yearbook_lightbox" id="link-website" href="" target="_blank">
                        <img src="imgs/ic-website.svg" alt=" ">
                        <p> </p>
                    </a>
                </div>

            </div>
        </div>
        <div id="yearbook">
            <div id="yearbook_header">
                <div id="signBtn" class="action"><img src="imgs/signmyyrbk.png" alt=""></div>
            </div>
            <div id="yearbook_main">
                
                <ul></ul>
            </div>
        </div>
    </section>
</div>
</body>
</html>
