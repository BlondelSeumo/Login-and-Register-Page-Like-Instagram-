/*JavaScript Document*/
$(document).ready(function(){
	$('.ham_menu , .lang_menu').dropdown();
/*Declare Variables from Login Form*/
var formLogin = $('#loginform');
var login_Btn = $('#login_submit');
var email = $('input[name="login_username"]');
var password = $('input[name="login_password"]');
var login_error = $('.lgnError');
formLogin.on('submit', function(e) {
    /*prevent default action*/ 
    e.preventDefault();
	/*Check email is empty*/
	if (email.val() === ''){ 
		  $("#fill_ue").attr("fill",'#e53935');
		  return false;
    }else{
	      $("#fill_ue").attr("fill",'#d8dbdf');
	}
	if(password.val() === '' ){ 
		  $("#fill_pass").attr("fill",'#e53935');
		  return false;
	 }else{
	      $("#fill_pass").attr("fill",'#d8dbdf');
	}
	 /*Login*/
	 jQuery.ajax({
		 type: "POST",
             url: siteurl+"requests/do_login.php", 
             data: formLogin.serialize(),
		     beforeSend: function(){ 
				 $(".ol_b").addClass('scale-out-ver-top'); 
				 setTimeout(function() {
					 $(".ol_b").hide();
					 $(".o_l_b").append('<div class="progress"><div class="indeterminate"></div></div>');
			     }, 300); 
			 },
			 success:function(data){
				 if($.trim(data) === 'login_ok'){  
					    window.location.href = siteurl; 
			     } else {
					 setTimeout(function() {
						 $(".progress").remove();
						 $(".ol_b").removeClass('scale-out-ver-top'); 
						 $(".ol_b").show(); 
						 $("#fill_ue").attr("fill",'#e53935');
						 $("#fill_pass").attr("fill",'#e53935');
						  login_error.fadeIn();
					 }, 400);  
					 setTimeout(function() {
						 login_error.fadeOut();
					 }, 5000);  
				 }
			 }
	 });
});
$("body").on("keyup", "#o_u_pass", function(){
	var ps = $(this).val();
    if (ps.length > 3) { 
	     $(".o_l_s_p_s").show();
	}else{
	     $(".o_l_s_p_s, .o_l_s_p_h").hide();
	}
});
$("body").on("keyup", "#reg_password", function(){
	var ps = $(this).val();
    if (ps.length > 3) { 
	     $(".shw").show();
	}else{
	     $(".shw, .hde").hide();
	}
});
$("body").on("click",".rshp", function(){
     var showThisPass = $("#reg_password");
     var checkType = showThisPass.attr("type");
     if(checkType == 'text'){
		 $(".hde").hide();
		 $(".shw").show();
         showThisPass.attr("type","password");
     }else{
		 $(".shw").hide();
		 $(".hde").show();
         showThisPass.attr("type","text");
     } 
});
$("body").on("click",".shp", function(){
     var showThisPass = $("#o_u_pass");
     var checkType = showThisPass.attr("type");
     if(checkType == 'text'){
		 $(".o_l_s_p_h").hide();
		 $(".o_l_s_p_s").show();
         showThisPass.attr("type","password");
     }else{
		 $(".o_l_s_p_s").hide();
		 $(".o_l_s_p_h").show();
         showThisPass.attr("type","text");
     } 
});
/*Open Register*/
$("body").on("click",".u_register", function(){
    $(".o_b_register").addClass("slide-in-fwd-center").show();
});
/*Check Username Exist*/
var timer = null; 
$('body').delegate('#register_username', 'keyup', function() {
    clearTimeout(timer);
    timer = setTimeout(function() {
       var userCheck = $("#register_username").val();
	   var data = 'username='+ userCheck;
	   if( userCheck.length < 3 ) {
		  /*Do something*/
	   }else{
          $.ajax({
            type: 'POST',
            url: siteurl + "requests/checkusername.php",
            data: data,
            cache: false,
            success: function(response) {
               if(response == 1){
				    $('.o_username_alert').fadeIn();
					$('.username_used').show();
					$('.dont_use_special').hide();
					return false;
			   }else if(response == 4){ 
			        $('.o_username_alert').fadeIn();
					$('.username_used').hide();
					$('.dont_use_special').show();
					return false;
			   }else if(response == 2){ 
					$('.username_used').hide();
					$('.dont_use_special').hide();
					$('.o_username_alert').fadeOut();
					return false;
			   }
            } 
          }); 
		  } 
    }, 500); 
});
var timer = null; 
$('body').delegate('#reg_email', 'keyup', function() {
  clearTimeout(timer);
  timer = setTimeout(function() {
	 var emailCheck = $("#reg_email").val();
	 var data = 'email='+ emailCheck;
	 if( emailCheck.length < 3 ) {
		 //Do something
	 }else{
		$.ajax({
		  type: 'POST',
		  url: siteurl + "requests/checkemail.php",
		  data: data,
		  cache: false,
		  success: function(response) {
			  if(response == 1){
			        $('.o_email_alert').fadeIn();
					$('.email_used').show();
					$('.not_valid_email').hide();
					return false;
			  }else if(response == 3){
			        $('.o_email_alert').fadeIn();
					$('.email_used').hide();
					$('.not_valid_email').show();
					return false;
			  }else if(response == 2){
			        $('.o_email_alert').fadeOut();
					$('.email_used').hide();
					$('.not_valid_email').hide();
					return false;
			  }else {
			        $('.o_email_alert').fadeOut();
					$('.email_used').hide();
					$('.not_valid_email').hide();
					return false;
			  }
		  } 
		}); 
		} 
  }, 500); 
});
/*Declare Variables from Register Form */
var formRegister = $('#registerform');
var submit_register = $('#register');

var reg_username = $('#register_username');
var reg_fullname = $("#reg_fullname");
var reg_email = $('#reg_email');
var reg_password = $('#reg_password');
var reg_gender = $("input[type='radio'][name='gender']:checked");
var reg_birthday = $("select[name='birth_day']");
var reg_birthmonth = $("select[name='birth_month']");
var reg_birthyear = $("select[name='birth_year']");
formRegister.on('submit', function(e) { 
    e.preventDefault(); 
	if ($.trim(reg_username.val() ) === '' ){
		 $("#fill_rue").attr("fill","#e53935");
		 return false;
	}else{
	    $("#fill_rue").attr("fill","#d8dbdf");
	}
	if ($.trim(reg_fullname.val() ) === '' ){
		 $("#fill_rfu").attr("fill","#e53935");
		 return false;
	}else{
	    $("#fill_rfu").attr("fill","#d8dbdf");
	}
	if ($.trim(reg_email.val() ) === '' ){
		 $("#fill_rfe").attr("fill","#e53935");
		 return false;
	}else{
	    $("#fill_rfe").attr("fill","#d8dbdf");
	}
	if(reg_password.val().length < 8 ){
		 $(".o_pass_alert").fadeIn(); 
		 $("#fill_passa").attr("fill","#e53935");
		return false;
    }else{
		 $("#fill_passa").attr("fill","#d8dbdf");
	     $(".o_pass_alert").fadeOut(); 
	}
	if($.trim(reg_birthday.val()) === ''){
		$("#subscription_day").css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'transition': 'all 0.15s ease-out;'});
	    return false;
	}else{
	    $("#subscription_day").css({'border':'2px solid rgba(239, 239, 239)', 'transition': 'all 0.15s ease-out;'}); 
	}
	if($.trim(reg_birthmonth.val()) === ''){
		$("#subscription_month").css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'transition': 'all 0.15s ease-out;'});
	    return false;
	}else{
	    $("#subscription_month").css({'border':'2px solid rgba(239, 239, 239)', 'transition': 'all 0.15s ease-out;'}); 
	}
	if($.trim(reg_birthyear.val()) === ''){
		$("#subscription_year").css({'border':'2px solid rgba(255, 0, 0, 0.6)', 'transition': 'all 0.15s ease-out;'});
	    return false;
	}else{
	    $("#subscription_year").css({'border':'2px solid rgba(239, 239, 239)', 'transition': 'all 0.15s ease-out;'}); 
	}
	if(!$(".wgen:checked").val()){
		$(".o_gender_alert").fadeIn(); 
	    return false;
	}else{
	    $(".o_gender_alert").fadeOut(); 
	}
	jQuery.ajax({
			type: "POST",
			url: siteurl+"requests/register.php",
			data: formRegister.serialize(),
			beforeSend: function(){
				$(".o_sbmnt_re").addClass('scale-out-ver-top'); 
				 setTimeout(function() { 
				     $(".o_sbmnt_re").hide(); 
					 $(".o_register_submit").append('<div class="progress"><div class="indeterminate"></div></div>');
			     }, 300); 
				 
			},success:function(data){ 
			     if($.trim(data) === '1'){
				       $("#fill_rue").attr("fill","#e53935");
					   $('.o_username_alert').fadeIn();
					   $('.username_used').show();
					   $(".o_sbmnt_re").removeClass('scale-out-ver-top'); 
						 setTimeout(function() { 
							$(".progress").remove();
							$(".o_sbmnt_re").fadeIn(); 
						 }, 400);
				 }
				 if($.trim(data) === '2'){
				       $("#fill_rfe").attr("fill","#e53935");
					   $('.o_email_alert').fadeIn();
					   $('.email_used').show();
					   $(".o_sbmnt_re").removeClass('scale-out-ver-top'); 
						 setTimeout(function() { 
							$(".progress").remove();
							$(".o_sbmnt_re").fadeIn(); 
						 }, 400);
				 }
				 if($.trim(data) === '3'){
				       $("#fill_rfe").attr("fill","#e53935");
					   $('.o_email_alert').fadeIn();
					   $('.not_valid_email').show();
					   $(".o_sbmnt_re").removeClass('scale-out-ver-top'); 
						 setTimeout(function() { 
							$(".progress").remove();
							$(".o_sbmnt_re").fadeIn(); 
						 }, 400);
				 }
				 if($.trim(data) === '4'){
				       $("#fill_rue").attr("fill","#e53935");
					   $('.o_username_alert').fadeIn();
					   $('.dont_use_special').show();
					   $(".o_sbmnt_re").removeClass('scale-out-ver-top'); 
						 setTimeout(function() { 
							$(".progress").remove();
							$(".o_sbmnt_re").fadeIn(); 
						 }, 400);
				 }
				 if($.trim(data) === '5'){
				       $(".ip_limit").fadeIn();
					   $(".o_sbmnt_re").removeClass('scale-out-ver-top'); 
						 setTimeout(function() { 
							$(".progress").remove();
							$(".o_sbmnt_re").fadeIn(); 
						 }, 400);
				 }
				 if($.trim(data) === '6'){
				      window.location.href = siteurl + "sources/blocked.php";
				 }
				 if($.trim(data) === 'ok'){ 
				      window.location.href = siteurl;
				 }   
			}
	});
});
$(".numeric").livequery(function() {
	$(this).alphanum({
		  allow: "_-",
		  disallow: "#!@$%^&*()+=[]\\';,/{}|\":<>?~`.",
		  allowSpace: false,
		  allowNumeric: true
	});
});
$(".a_pass").livequery(function() {
	$(this).alphanum({ 
		  allowSpace: false,
		  allowNumeric: true
	});
}); 
$("body").on("click",".o_close_register", function(){
    $(".o_b_register").addClass('scale-out-center');
	setTimeout(function() {
		$(".o_b_register").hide();
		$(".o_b_register").removeClass("scale-out-center"); 
   }, 500);  
}); 
/*Change Language From WellCome Page*/ 
$("body").on("click",".lang_name_box", function(){
   var lang = $(this).attr("data-lang");
   var change = 'lang='+lang; 
   $.ajax({
      type: 'GET',
      url: siteurl + "wellcome.php",
      data: change,
      cache: false,
      beforeSend: function() {
        /*Do Something*/
      },
      success: function(response) {
        $('body').html(response);  
      }
  });
});
}); 