<?php 
if(file_exists('install/install.lock')) { 
    header('Location: ./install/index.php'); 
    exit;
} 
include_once 'functions/user.php';  
$DotOut = new DOT_USER($db); 
$page_Lang =  $DotOut->Dot_Languages();
$siteConfigurations = $DotOut->Dot_Configurations();
$siteTitle = $siteConfigurations['script_title'];
$siteLogo = $siteConfigurations['script_logo'];
$siteName = $siteConfigurations['script_name'];
$maintenance = $siteConfigurations['maintenance_mode'];
$wellcomeTheme = $siteConfigurations['wellcome_theme'];
$DefaultLang = $siteConfigurations['default_lang']; 
$canRegister = $siteConfigurations['enable_disable_register'];
if(isset($_GET['lang'])){ 
   $DefaultLang = mysqli_real_escape_string($db, $_GET['lang']);
} 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title><?php echo $siteTitle;?></title>
  <link rel="shortcut icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo $base_url;?>uploads/logo/favicon.ico" type="image/x-icon"> 
  
  <link rel="stylesheet" href="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/css/<?php echo $wellcomeTheme;?>.css">
  <link rel="stylesheet" href="<?php echo $base_url;?>css/materialize.css">  
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery-3.3.1.min.js"></script>  
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.livequery.js"></script>  
  <script type="text/javascript" src="<?php echo $base_url;?>js/jquery.alphanum.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>js/materialize.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/js/<?php echo $wellcomeTheme;?>.js"></script> 
  <script type="text/javascript">
    var siteurl = '<?php echo $base_url;?>';   
  </script>
</head>

<body>
<div class="fzCXy"></div>
<div class="parentDiv">
    <!---->
    <div class="o_main">
                  <!--mS-->
                 <div class="left_m">
                      <div class="ham_menu slide-in-top waves-effect waves-yellow" data-target='dropdown1'><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#666666"><path d="M86,22.93333c-9.4993,0 -17.2,7.7007 -17.2,17.2c0,9.4993 7.7007,17.2 17.2,17.2c9.4993,0 17.2,-7.7007 17.2,-17.2c0,-9.4993 -7.7007,-17.2 -17.2,-17.2zM86,68.8c-9.4993,0 -17.2,7.7007 -17.2,17.2c0,9.4993 7.7007,17.2 17.2,17.2c9.4993,0 17.2,-7.7007 17.2,-17.2c0,-9.4993 -7.7007,-17.2 -17.2,-17.2zM86,114.66667c-9.4993,0 -17.2,7.7007 -17.2,17.2c0,9.4993 7.7007,17.2 17.2,17.2c9.4993,0 17.2,-7.7007 17.2,-17.2c0,-9.4993 -7.7007,-17.2 -17.2,-17.2z"></path></g></g></svg></div>
                      <div class="lang_menu slide-in-top-two waves-effect waves-yellow" data-target='dropdown2'><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#666666"><path d="M28.66667,21.5c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v86c0,7.91917 6.41417,14.33333 14.33333,14.33333h100.33333l28.66667,28.66667v-129c0,-7.91917 -6.41417,-14.33333 -14.33333,-14.33333zM51.50683,50.16667h11.64583l22.84733,57.33333h-13.4375l-4.257,-11.868h-21.94433l-4.257,11.868h-13.4375zM113.31933,50.16667h9.85417v9.632h20.15983v9.40267c-1.45483,12.427 -7.02333,21.6935 -16.125,27.993c2.46533,0.39417 5.03817,0.67367 7.84033,0.67367v9.632c-7.5035,0 -14.49817,-1.45483 -20.382,-3.8055c-6.7725,2.54417 -15.394,3.8055 -21.5,3.8055v-9.632c2.74483,0 7.5035,-0.2795 10.52783,-0.89583c-5.43233,-4.86617 -10.52783,-15.17183 -10.52783,-22.1665h10.07633c0,5.289 5.40367,14.67017 11.868,18.361c9.48867,-4.5365 15.62333,-12.57033 17.47233,-23.96533h-39.41667v-9.40267h20.15267zM57.33333,64.72217l-7.61817,21.5h15.22917z"></path></g></g></svg></div>
                 </div>
                 <!--mF-->
                 <!--rBS-->
                 <div class="o_r_b_r slide-in-top">
                      <div class="o_register waves-effect waves-yellow u_register"><?php echo $page_Lang['register'][$DefaultLang];?></div>
                 </div>
                 <!--rBF-->
                 <!--wS-->
                 <div class="o_wellcome">
                       <div class="o_wellcome_title flip-in-hor-bottom"><?php echo $page_Lang['wellcome_to'][$DefaultLang];?></div>
                       <div class="o_wellcome_de flip-in-hor-bottom-two"><?php echo $page_Lang['slogan'][$DefaultLang];?></div>
                 </div>
                 <!--wF-->
          <!--1S-->
          <div class="o_container">  
                 <!---->
                 <div class="lgn_popup lgnError">
                       <?php echo $page_Lang['username_email_or_password_incorrect'][$DefaultLang];?><strong class="rcln" style="cursor:pointer; text-decoration:underline;"><?php echo $page_Lang['do_you_want_to_register'][$DefaultLang];?></strong>
                 </div> 
                 <!---->
                 <!--MiS-->
                 <div class="o_middle">
                      <div class="o_middle_in">
                             <div class="o_name tracking-in-expand-fwd"><?php echo $siteName;?></div>
                             <div class="o_login_boxs scale-in-ver-top">
                                  <form class="login-form" enctype="multipart/form-data" method="post" id='loginform'>
                                       <!--sI-->
                                       <div class="o_l_i">
                                           <div class="o_l_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="fill_ue" fill="#d8dbdf"><path d="M164.46984,83.98416c-1.86792,-2.58344 -46.28176,-63.34416 -92.22984,-63.34416c-36.04088,0 -65.36,29.31912 -65.36,65.36c0,36.04088 29.31912,65.36 65.36,65.36c45.94808,0 90.36192,-60.76072 92.22984,-63.34416c0.86688,-1.204 0.86688,-2.82768 0,-4.03168zM99.76,113.52h-55.04c0,-13.76 17.4064,-11.8336 20.0724,-19.01632c0.22016,-2.4596 0.1376,-4.17272 0.1376,-6.41904c-1.118,-0.5848 -3.19232,-4.31032 -3.526,-7.45448c-0.87376,-0.07224 -2.2532,-0.92536 -2.65912,-4.29656c-0.21672,-1.80944 0.65016,-2.82768 1.17648,-3.1476c-2.9584,-11.38984 -1.32784,-21.33832 12.17072,-21.586c3.37464,0 5.97184,0.90128 6.98664,2.6832c9.85216,1.36912 6.89376,14.62 5.4696,18.9028c0.52976,0.31992 1.3932,1.33816 1.17648,3.1476c-0.40592,3.3712 -1.78192,4.22432 -2.65912,4.29656c-0.33712,3.1476 -2.32888,6.86968 -3.44344,7.45448c0,2.24632 -0.08256,3.96288 0.1376,6.41904c2.35984,6.33648 18.67232,5.35608 20.00016,17.39952z"></path></g></g></svg></div>
                                           <input type="text" class="o_input border-first" name="login_username" id="o_u_unm" placeholder="<?php echo $page_Lang['username'][$DefaultLang];?>" />
                                       </div>
                                       <div class="o_l_i">
                                           <div class="o_l_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="28" height="28" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="fill_pass" fill="#d8dbdf"><path d="M86,11.46667c-22.09818,0 -40.13333,18.03515 -40.13333,40.13333v11.46667h-11.46667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v68.8c0,6.33533 5.13133,11.46667 11.46667,11.46667h103.2c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-68.8c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667h-11.46667v-11.46667c0,-21.37626 -16.99027,-38.59356 -38.09531,-39.71901c-0.64841,-0.26118 -1.33911,-0.4016 -2.03802,-0.41432zM86,22.93333c15.90235,0 28.66667,12.76431 28.66667,28.66667v11.46667h-57.33333v-11.46667c0,-15.90235 12.76431,-28.66667 28.66667,-28.66667zM51.6,97.46667c6.33533,0 11.46667,5.13133 11.46667,11.46667c0,6.3296 -5.13133,11.46667 -11.46667,11.46667c-6.33533,0 -11.46667,-5.13707 -11.46667,-11.46667c0,-6.33533 5.13133,-11.46667 11.46667,-11.46667zM86,97.46667c6.33533,0 11.46667,5.13133 11.46667,11.46667c0,6.3296 -5.13133,11.46667 -11.46667,11.46667c-6.33533,0 -11.46667,-5.13707 -11.46667,-11.46667c0,-6.33533 5.13133,-11.46667 11.46667,-11.46667zM120.4,97.46667c6.33533,0 11.46667,5.13133 11.46667,11.46667c0,6.3296 -5.13133,11.46667 -11.46667,11.46667c-6.33533,0 -11.46667,-5.13707 -11.46667,-11.46667c0,-6.33533 5.13133,-11.46667 11.46667,-11.46667z"></path></g></g></svg></div>
                                           <input type="password" class="o_input border-middle" name="login_password" id="o_u_pass" placeholder="<?php echo $page_Lang['password'][$DefaultLang];?>" />
                                           <div class="o_l_s_p_s shp">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#2ecc71"><path d="M86,28.66667c-57.33333,0 -78.83333,57.33333 -78.83333,57.33333c0,0 21.5,57.33333 78.83333,57.33333c57.33333,0 78.83333,-57.33333 78.83333,-57.33333c0,0 -21.5,-57.33333 -78.83333,-57.33333zM86,50.16667c19.78717,0 35.83333,16.04617 35.83333,35.83333c0,19.78717 -16.04617,35.83333 -35.83333,35.83333c-19.78717,0 -35.83333,-16.04617 -35.83333,-35.83333c0,-19.78717 16.04617,-35.83333 35.83333,-35.83333zM86,64.5c-11.87412,0 -21.5,9.62588 -21.5,21.5c0,11.87412 9.62588,21.5 21.5,21.5c11.87412,0 21.5,-9.62588 21.5,-21.5c0,-11.87412 -9.62588,-21.5 -21.5,-21.5z"></path></g></g></svg>
                                           </div>
                                           <div class="o_l_s_p_h shp">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M30.15039,20.01628l-10.13411,10.13411l16.36296,16.36296c-20.61726,16.82709 -29.21257,39.48665 -29.21257,39.48665c0,0 21.5,57.33333 78.83333,57.33333c14.8749,0 27.27635,-3.90777 37.56901,-9.63021l18.2806,18.2806l10.13411,-10.13411zM86,28.66667c-8.686,0 -16.44179,1.43132 -23.52962,3.66732l18.35059,18.35059c1.6985,-0.25083 3.40887,-0.5179 5.17903,-0.5179c19.78717,0 35.83333,16.04617 35.83333,35.83333c0,1.77017 -0.26707,3.48053 -0.51791,5.17903l24.57943,24.57943c13.23683,-14.69167 18.93848,-29.75847 18.93848,-29.75847c0,0 -21.5,-57.33333 -78.83333,-57.33333zM56.14355,66.27767l10.48405,10.48405c-1.35246,2.79422 -2.1276,5.917 -2.1276,9.23828c0,11.87517 9.62483,21.5 21.5,21.5c3.32128,0 6.44406,-0.77515 9.23828,-2.1276l10.48405,10.48405c-5.66105,3.75348 -12.41755,5.97689 -19.72233,5.97689c-19.78717,0 -35.83333,-16.04617 -35.83333,-35.83333c0,-7.30478 2.2234,-14.06128 5.97689,-19.72233z"></path></g></g></svg> </div>
                                       </div>
                                       <div class="o_l_i o_l_b">
                                            <button type="submit" name="submit" class="o_sbmnt_l waves-effect waves-yellow ol_b" id='login_submit'><?php echo $page_Lang['login'][$DefaultLang];?></button>
                                       </div>
                                       <div class="o_l_i" style="padding-top:5px;">
                                           <a href="<?php echo $base_url;?>forgot-password" class="_m6qul">
											  <?php echo $page_Lang['forgot_password'][$DefaultLang];?>
                                            </a>
                                       </div>
                                       <!--fI-->
                                   </form>
                             </div>
                      </div>
                 </div>
                 <!--MiF--> 
                 <div class="can" id="large-header"></div>
          <!--1F-->        
          </div> 
    </div>
    <!---->
</div>  
<div id='dropdown1' class='dropdown-content'>
   <div class="o_fmenu">
       <a href="<?php echo $base_url;?>about-us"><div class="o_fm_item waves-effect waves-teal">About Us</div></a>
       <a href="<?php echo $base_url;?>privacy-policies"><div class="o_fm_item waves-effect waves-teal">Privacy Policies</div></a> 
   </div>   
</div>
<div id='dropdown2' class='dropdown-content'>
   <div class="o_fmenu">
       <?php 
	         $langs = $DotOut->Dot_Lngs();
			 if($langs){
				  foreach($langs as $column){
				      $lang_name = $column['Field'];
					  $flag = array(
					   $lang_name => $base_url.'uploads/flags/'.$lang_name.'.png'
					   );
					   echo '
					   <div class="lang_name_box waves-effect waves-teal" data-lang="'.$lang_name.'">
					       <div class="lang_flag"><img src="'.$flag[$lang_name].'"></div>
						   <div class="langName">'.$lang_name.'</div>
					   </div>';
				  }
		     } 
	   ?>
   </div>   
</div>
<!---->
<div class="o_b_register">
       <!--rcBS-->
       <div class="o_close_register"><div class="slide-in-top waves-effect waves-yellow"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#666666"><path d="M86,6.88c-43.6552,0 -79.12,35.4648 -79.12,79.12c0,43.6552 35.4648,79.12 79.12,79.12c43.6552,0 79.12,-35.4648 79.12,-79.12c0,-43.6552 -35.4648,-79.12 -79.12,-79.12zM86,13.76c39.9368,0 72.24,32.3032 72.24,72.24c0,39.9368 -32.3032,72.24 -72.24,72.24c-39.9368,0 -72.24,-32.3032 -72.24,-72.24c0,-39.9368 32.3032,-72.24 72.24,-72.24zM113.4864,54.99297c-0.90737,0.02145 -1.76951,0.4006 -2.39859,1.05485l-25.08781,25.08781l-25.08781,-25.08781c-0.64765,-0.66575 -1.53698,-1.04135 -2.46578,-1.04141c-1.39982,0.00037 -2.65984,0.84884 -3.18658,2.14577c-0.52674,1.29693 -0.21516,2.7837 0.78799,3.76001l25.08781,25.08781l-25.08781,25.08781c-0.89867,0.86281 -1.26068,2.14404 -0.94641,3.34956c0.31427,1.20552 1.2557,2.14696 2.46122,2.46122c1.20552,0.31427 2.48675,-0.04774 3.34956,-0.94641l25.08781,-25.08781l25.08781,25.08781c0.86281,0.89867 2.14404,1.26068 3.34956,0.94641c1.20552,-0.31427 2.14696,-1.2557 2.46122,-2.46122c0.31427,-1.20552 -0.04774,-2.48675 -0.94641,-3.34956l-25.08781,-25.08781l25.08781,-25.08781c1.02251,-0.98325 1.33669,-2.4933 0.79119,-3.80279c-0.5455,-1.30949 -1.83881,-2.1499 -3.25697,-2.11643z"></path></g></g></svg></div></div>
       <!--rcBF-->
      <div class="o_pop_register">
            <!---->
            <div class="o_register_container">
                   <div class="o_name tracking-in-expand-fwd"><?php echo $siteName;?></div>
                   <div class="o_login_boxs scale-in-ver-top">
                     <form class="register-form" method="POST" id='registerform'>
                         <!---->
                         <div class="o_l_i">
                             <div class="o_l_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="fill_rue" fill="#d8dbdf"><path d="M164.46984,83.98416c-1.86792,-2.58344 -46.28176,-63.34416 -92.22984,-63.34416c-36.04088,0 -65.36,29.31912 -65.36,65.36c0,36.04088 29.31912,65.36 65.36,65.36c45.94808,0 90.36192,-60.76072 92.22984,-63.34416c0.86688,-1.204 0.86688,-2.82768 0,-4.03168zM99.76,113.52h-55.04c0,-13.76 17.4064,-11.8336 20.0724,-19.01632c0.22016,-2.4596 0.1376,-4.17272 0.1376,-6.41904c-1.118,-0.5848 -3.19232,-4.31032 -3.526,-7.45448c-0.87376,-0.07224 -2.2532,-0.92536 -2.65912,-4.29656c-0.21672,-1.80944 0.65016,-2.82768 1.17648,-3.1476c-2.9584,-11.38984 -1.32784,-21.33832 12.17072,-21.586c3.37464,0 5.97184,0.90128 6.98664,2.6832c9.85216,1.36912 6.89376,14.62 5.4696,18.9028c0.52976,0.31992 1.3932,1.33816 1.17648,3.1476c-0.40592,3.3712 -1.78192,4.22432 -2.65912,4.29656c-0.33712,3.1476 -2.32888,6.86968 -3.44344,7.45448c0,2.24632 -0.08256,3.96288 0.1376,6.41904c2.35984,6.33648 18.67232,5.35608 20.00016,17.39952z"></path></g></g></svg></div>
                             <input type="text" name="reusername" id="register_username" class="o_input numeric border-first" placeholder="<?php echo $page_Lang['username'][$DefaultLang];?>" />
                         </div>
                         <!---->
                         <div class="alert_reg o_username_alert" style="display:none;">
                             <div class="o_alert_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></div>
                             <div class="alert_color username_used" style="display:none;"><?php echo $page_Lang['username_already_in_use'][$DefaultLang];?></div>
                             <div class="alert_color dont_use_special" style="display:none;"><?php echo $page_Lang['only_english_character'][$DefaultLang];?></div>
                         </div>
                         <!---->
                         <div class="o_l_i">
                             <div class="o_l_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="fill_rfu" fill="#d8dbdf"><path d="M136.16667,21.5h-100.33333c-7.91917,0 -14.33333,6.41417 -14.33333,14.33333v100.33333c0,7.91917 6.41417,14.33333 14.33333,14.33333h100.33333c7.91917,0 14.33333,-6.41417 14.33333,-14.33333v-100.33333c0,-7.91917 -6.41417,-14.33333 -14.33333,-14.33333zM86,43c12.18333,0 21.5,9.31667 21.5,21.5c0,12.18333 -9.31667,21.5 -21.5,21.5c-12.18333,0 -21.5,-9.31667 -21.5,-21.5c0,-12.18333 9.31667,-21.5 21.5,-21.5zM129,129h-86c0,0 0,-4.1925 0,-7.16667c0,-11.25883 19.50767,-21.5 43,-21.5c23.49233,0 43,10.24117 43,21.5c0,2.97417 0,7.16667 0,7.16667z"></path></g></g></svg></div>
                             <input type="text" name="fullname" id="reg_fullname" class="o_input border-middle" placeholder="<?php echo $page_Lang['full_name'][$DefaultLang];?>" />
                         </div>
                         <!---->
                         <!---->
                         <div class="o_l_i">  
                            <div class="o_l_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="fill_rfe" fill="#d8dbdf"><path d="M28.66667,28.66667c-7.33867,0 -13.32686,5.53715 -14.16536,12.65365l71.4987,44.67969l71.49869,-44.67969c-0.83849,-7.1165 -6.82669,-12.65365 -14.16536,-12.65365zM14.33333,55.55566v73.44434c0,7.91917 6.41417,14.33333 14.33333,14.33333h87.23177l-18.53255,-18.53256c-2.6875,-2.6875 -4.19922,-6.33578 -4.19922,-10.13411v-18.8125l-3.37337,2.11361c-2.322,1.45483 -5.26459,1.45483 -7.58659,0zM157.66667,55.55566l-48.72493,30.44434h12.8916c3.79833,0 7.44661,1.51172 10.13411,4.19922l25.69922,25.69922zM107.5,100.33333v14.33333l36.88314,36.88314l14.33333,-14.33333l-36.88314,-36.88314zM163.78353,142.28353l-14.33333,14.33333l7.16667,7.16667c1.3975,1.3975 3.66239,1.3975 5.06706,0l9.26628,-9.26628c1.3975,-1.3975 1.3975,-3.66956 0,-5.06706z"></path></g></g></svg></div>
                             <input type="text" class="o_input border-middle" name="regemail" id="reg_email" placeholder="<?php echo $page_Lang['email'][$DefaultLang];?>" />
                         </div>
                         <!---->
                         <div class="alert_reg o_email_alert" style="display:none;">
                             <div class="o_alert_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></div>
                             <div class="alert_color email_used" style="display:none;"><?php echo $page_Lang['email_already_in_use'][$DefaultLang];?></div>
                             <div class="alert_color not_valid_email" style="display:none;"><?php echo $page_Lang['not_a_valid_email_addresss'][$DefaultLang];?></div>
                         </div>
                         <!---->
                         <div class="o_l_i">   
                              <div class="o_l_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="fill_passa" fill="#d8dbdf"><path d="M86,11.46667c-22.09818,0 -40.13333,18.03515 -40.13333,40.13333v11.46667h-11.46667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v68.8c0,6.33533 5.13133,11.46667 11.46667,11.46667h103.2c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-68.8c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667h-11.46667v-11.46667c0,-21.37626 -16.99027,-38.59356 -38.09531,-39.71901c-0.64841,-0.26118 -1.33911,-0.4016 -2.03802,-0.41432zM86,22.93333c15.90235,0 28.66667,12.76431 28.66667,28.66667v11.46667h-57.33333v-11.46667c0,-15.90235 12.76431,-28.66667 28.66667,-28.66667zM51.6,97.46667c6.33533,0 11.46667,5.13133 11.46667,11.46667c0,6.3296 -5.13133,11.46667 -11.46667,11.46667c-6.33533,0 -11.46667,-5.13707 -11.46667,-11.46667c0,-6.33533 5.13133,-11.46667 11.46667,-11.46667zM86,97.46667c6.33533,0 11.46667,5.13133 11.46667,11.46667c0,6.3296 -5.13133,11.46667 -11.46667,11.46667c-6.33533,0 -11.46667,-5.13707 -11.46667,-11.46667c0,-6.33533 5.13133,-11.46667 11.46667,-11.46667zM120.4,97.46667c6.33533,0 11.46667,5.13133 11.46667,11.46667c0,6.3296 -5.13133,11.46667 -11.46667,11.46667c-6.33533,0 -11.46667,-5.13707 -11.46667,-11.46667c0,-6.33533 5.13133,-11.46667 11.46667,-11.46667z"></path></g></g></svg></div>
                             <input type="password" name="password" class="o_input border-middle a_pass bottom-border" id="reg_password" placeholder="<?php echo $page_Lang['password'][$DefaultLang];?>" autocomplete="new-password" />
                             <div class="o_l_s_p_s shw rshp">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#2ecc71"><path d="M86,28.66667c-57.33333,0 -78.83333,57.33333 -78.83333,57.33333c0,0 21.5,57.33333 78.83333,57.33333c57.33333,0 78.83333,-57.33333 78.83333,-57.33333c0,0 -21.5,-57.33333 -78.83333,-57.33333zM86,50.16667c19.78717,0 35.83333,16.04617 35.83333,35.83333c0,19.78717 -16.04617,35.83333 -35.83333,35.83333c-19.78717,0 -35.83333,-16.04617 -35.83333,-35.83333c0,-19.78717 16.04617,-35.83333 35.83333,-35.83333zM86,64.5c-11.87412,0 -21.5,9.62588 -21.5,21.5c0,11.87412 9.62588,21.5 21.5,21.5c11.87412,0 21.5,-9.62588 21.5,-21.5c0,-11.87412 -9.62588,-21.5 -21.5,-21.5z"></path></g></g></svg>
                                           </div>
                                           <div class="o_l_s_p_h hde rshp">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M30.15039,20.01628l-10.13411,10.13411l16.36296,16.36296c-20.61726,16.82709 -29.21257,39.48665 -29.21257,39.48665c0,0 21.5,57.33333 78.83333,57.33333c14.8749,0 27.27635,-3.90777 37.56901,-9.63021l18.2806,18.2806l10.13411,-10.13411zM86,28.66667c-8.686,0 -16.44179,1.43132 -23.52962,3.66732l18.35059,18.35059c1.6985,-0.25083 3.40887,-0.5179 5.17903,-0.5179c19.78717,0 35.83333,16.04617 35.83333,35.83333c0,1.77017 -0.26707,3.48053 -0.51791,5.17903l24.57943,24.57943c13.23683,-14.69167 18.93848,-29.75847 18.93848,-29.75847c0,0 -21.5,-57.33333 -78.83333,-57.33333zM56.14355,66.27767l10.48405,10.48405c-1.35246,2.79422 -2.1276,5.917 -2.1276,9.23828c0,11.87517 9.62483,21.5 21.5,21.5c3.32128,0 6.44406,-0.77515 9.23828,-2.1276l10.48405,10.48405c-5.66105,3.75348 -12.41755,5.97689 -19.72233,5.97689c-19.78717,0 -35.83333,-16.04617 -35.83333,-35.83333c0,-7.30478 2.2234,-14.06128 5.97689,-19.72233z"></path></g></g></svg> </div>
                         </div>
                         <!---->
                         <div class="o_pass_alert" style="display:none;">
                             <div class="o_alert_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></div>
                             <div class="alert_color pass_mustbe"><?php echo $page_Lang['password_must_be_at_x_chhracter'][$DefaultLang];?></div>
                         </div>
                         <!---->
                         <div class="o_l_i_plus">
                                <div class="o_d_m_y_c"><?php echo $page_Lang['main_birth_day'][$DefaultLang];?></div>
                                <div class="o_d_m_y">
                                        <!---->
                                        <select class="fn" name="birth_day" id="subscription_day">
                                              <option value=""><?php echo $page_Lang['day'][$DefaultLang];?></option>
                                                <?php
                                                   $strDay='';
                                                   for ($i=1; $i<=31; $i++) {
                                                      $strDay=(string)$i;
                                                      if($i<10) $strDay='0'.$strDay;
                                               ?> 
                                               <option value="<?php echo $i; ?>">
                                                   <?php echo $strDay; ?>
                                               </option>
                                               <?php } ?>
                                        </select>
                                        <div class="i_d_icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="21" height="21" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#95a5a6"><path d="M86,16.125c-38.52783,0 -69.875,31.34717 -69.875,69.875c0,38.52783 31.34717,69.875 69.875,69.875c38.52783,0 69.875,-31.34717 69.875,-69.875c0,-38.52783 -31.34717,-69.875 -69.875,-69.875zM86,26.875c32.71192,0 59.125,26.41309 59.125,59.125c0,32.71192 -26.41308,59.125 -59.125,59.125c-32.71191,0 -59.125,-26.41308 -59.125,-59.125c0,-32.71191 26.41309,-59.125 59.125,-59.125zM57.61328,68.69922l-7.72656,7.72656l32.25,32.25l3.86328,3.69531l3.86328,-3.69531l32.25,-32.25l-7.72656,-7.72656l-28.38672,28.38672z"></path></g></g></svg>
                                        </div>
                                        <!---->
                                </div>
                                <div class="o_d_m_y padding_left">
                                       <!---->
                                       <select class="fn" name="birth_month" id="subscription_month">
                                            <option value=""><?php echo $page_Lang['month'][$DefaultLang];?></option>
                                            <?php
                                                $months = array(1 => $page_Lang['jan'][$DefaultLang], 2 => $page_Lang['feb'][$DefaultLang], 3 => $page_Lang['mar'][$DefaultLang], 4 => $page_Lang['apr'][$DefaultLang], 5 => $page_Lang['may'][$DefaultLang], 6 => $page_Lang['jun'][$DefaultLang], 7 => $page_Lang['jul'][$DefaultLang], 8 => $page_Lang['aug'][$DefaultLang], 9 => $page_Lang['sep'][$DefaultLang], 10 =>$page_Lang['oct'][$DefaultLang], 11 => $page_Lang['nov'][$DefaultLang], 12 => $page_Lang['dec'][$DefaultLang]);
                                                $transposed = array_slice($months, date('n'), 12, true) + array_slice($months, 0, date('n'), true);
                                                $last8 = array_reverse(array_slice($transposed, -8, 12, true), true); 
                                              foreach ($months as $num => $name) {
                                            ?> <option value="<?php echo $num; ?>">
                                            <?php echo $name; ?>
                                            </option>
                                            <?php } ?>
                                         </select> 
                                         <div class="i_d_icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="21" height="21" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#95a5a6"><path d="M86,16.125c-38.52783,0 -69.875,31.34717 -69.875,69.875c0,38.52783 31.34717,69.875 69.875,69.875c38.52783,0 69.875,-31.34717 69.875,-69.875c0,-38.52783 -31.34717,-69.875 -69.875,-69.875zM86,26.875c32.71192,0 59.125,26.41309 59.125,59.125c0,32.71192 -26.41308,59.125 -59.125,59.125c-32.71191,0 -59.125,-26.41308 -59.125,-59.125c0,-32.71191 26.41309,-59.125 59.125,-59.125zM57.61328,68.69922l-7.72656,7.72656l32.25,32.25l3.86328,3.69531l3.86328,-3.69531l32.25,-32.25l-7.72656,-7.72656l-28.38672,28.38672z"></path></g></g></svg>
                                        </div>
                                       <!---->
                                </div>
                                <div class="o_d_m_y padding_left">
                                      <!---->
                                      <select class="fn" name="birth_year" id="subscription_year">
                                           <option value=""><?php echo $page_Lang['year'][$DefaultLang];?></option>
                                           <?php  for ($i=1950; $i<date('Y'); $i++) { ?>
                                           <option value="<?php echo $i; ?>">
                                           <?php echo $i; ?>
                                            </option>
                                           <?php } ?>
                                        </select>
                                        <div class="i_d_icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="21" height="21" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#95a5a6"><path d="M86,16.125c-38.52783,0 -69.875,31.34717 -69.875,69.875c0,38.52783 31.34717,69.875 69.875,69.875c38.52783,0 69.875,-31.34717 69.875,-69.875c0,-38.52783 -31.34717,-69.875 -69.875,-69.875zM86,26.875c32.71192,0 59.125,26.41309 59.125,59.125c0,32.71192 -26.41308,59.125 -59.125,59.125c-32.71191,0 -59.125,-26.41308 -59.125,-59.125c0,-32.71191 26.41309,-59.125 59.125,-59.125zM57.61328,68.69922l-7.72656,7.72656l32.25,32.25l3.86328,3.69531l3.86328,-3.69531l32.25,-32.25l-7.72656,-7.72656l-28.38672,28.38672z"></path></g></g></svg>
                                        </div>
                                      <!---->
                                </div>
                                <div class="o_d_m_y_g"><?php echo $page_Lang['gender'][$DefaultLang];?></div>
                                <!---->
                                <div class="alert_reg o_gender_alert" style="display:none;">
                                     <div class="o_alert_icon"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#e74c3c"><path d="M86,6.61538c-43.85276,0 -79.38462,35.53185 -79.38462,79.38462c0,43.85276 35.53185,79.38462 79.38462,79.38462c43.85276,0 79.38462,-35.53185 79.38462,-79.38462c0,-43.85276 -35.53185,-79.38462 -79.38462,-79.38462zM86,136.67488c-6.20192,0 -10.4399,-4.78065 -10.4399,-10.98257c0,-6.38281 4.41887,-10.98257 10.4399,-10.98257c6.38281,0 10.4399,4.59976 10.4399,10.98257c0,6.20192 -4.05709,10.98257 -10.4399,10.98257zM90.10878,94.73438c-1.57632,5.40084 -6.56371,5.47837 -8.21755,0c-1.91226,-6.33113 -8.70853,-30.33774 -8.70853,-45.92008c0,-20.56971 25.73798,-20.67308 25.73798,0c0,15.6857 -7.15805,40.3125 -8.8119,45.92008z"></path></g></g></svg></div>
                                     <div class="alert_color"><?php echo $page_Lang['please_select_yoour_gender'][$DefaultLang];?></div> 
                                 </div>
                                <!---->
                                <div class="o_g_c">
                                      <input type="radio" id="male" class="wgen" name="gender" value="male" >
                                      <label for="male"><div class="emji"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/img/man.png" /></div><?php echo $page_Lang['male'][$DefaultLang];?></label>
                                </div>
                                <div class="o_g_c" style="padding-left:8px;">
                                      <input type="radio" id="female" class="wgen" name="gender" value="female" >
                                      <label for="female"><div class="emji"><img src="<?php echo $base_url;?>wellcome_themes/<?php echo $wellcomeTheme;?>/img/woman.png" /></div><?php echo $page_Lang['female'][$DefaultLang];?></label>
                                </div>
                         </div>
                         <!---->
                         <div class="o_l_i_agree"><?php echo $page_Lang['auto_agree'][$DefaultLang];?></div>
                         <!---->
                         <div class="o_register_submit">
                               <button id="register" class="o_sbmnt_re waves-effect waves-light" type="submit"><?php echo $page_Lang['register'][$DefaultLang];?></button>
                         </div>
                         <!---->
                         </form>
                   </div>
            </div>
            <!---->
      </div>
</div>
<!----> 
</body>
</html>