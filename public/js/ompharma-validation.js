
var hostname = $(location).attr('origin') + "/ompharmacy/"; //Localpath
//var hostname = $(location).attr('origin') + "/demo/ompharmacy/"; //Serverpath
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

$('.sign-upform').on('click', function () {
	$('.popup-container').fadeIn('slow');
	$('#phone').focus();
});

$('.closesignup').on('click', function () {
    $('.popup-container').fadeOut('slow');
    $("#confirmation").html('');
});

$('.loginform').on('click', function () {
	$('.login-popup-container').fadeIn('slow');
	$('.forgot-popup-container').fadeOut('slow');
	$("#confirmation").html('');
	$('#user_email').focus();
});

$('.closelogin').on('click', function () {
    $('.login-popup-container').fadeOut('slow');
    $("#confirmation").html('');
});

$('.new-account').on('click', function(){
	$('.login-popup-container').fadeOut('slow');
	$('.popup-container').fadeIn('slow');
});

$('.forgot-pswd').on('click', function(){
	$('.login-popup-container').fadeOut('slow');
	$('.forgot-popup-container').fadeIn('slow');
	$('#phone_no').focus();
});

$('.closeforgot').on('click', function () {
    $('.forgot-popup-container').fadeOut('slow');
    $("#confirmation").html('');
});

$('form#user-signup').submit(function(e) {
	var phone = $('#phone').val();
	var verification = $('#verification').val();
	var otp = $('#otp').val();
	var fname = $('#fname').val();
	var lname = $('#lname').val();
	var email = $('#email').val();
	var password = $('#password').val();

	if(phone == ""){
		$('#phone').addClass('find-error');
		$('.error-msg').remove();
		$('#phone').after('<span class="error-msg">Please enter a valid Mobile number</span>');
		$('#phone').focus();
		return false;
	}else if(phone.length != 10){
		$('#phone').addClass('find-error');
		$('.error-msg').remove();
		$('#phone').after('<span class="error-msg">Please enter a valid Mobile number</span>');
		$('#phone').focus();
		return false;
	}else if(verification == 0){
		e.preventDefault();
		$.ajax({
			url: hostname + "sendOtp",
			type: "POST",
			data:  $("#user-signup").serialize(),
			dataType: 'json',
			beforeSend: function () {
			$("#user-submit").html('Please Wait...');
		},
		success: function(data) {
		  if (data.response == "success") {
		  		$("#confirmation").html('<div class="confir-msg"><div class="txticon"> <i class="fa fa-check"></i></div><div class="add-txt">'+data.msg+'</div></div>');
				$("#confirmation").show();
				//setTimeout(function() { $("#confirmation").fadeOut(); }, 6000);
		  		$('#verification').val('1');
			  	$('#phone').removeClass('find-error');
				$('.error-msg').remove();
				$('#user-signup .form-group').after('<div class="user-field"><div class="form-group"><input type="text" class="form-control" name="otp" id="otp" onkeypress="return numeric(event)" placeholder="Enter OTP *" maxlength="4" /><span class="resend" onclick="resendOtp()">Resend?</span></div><div class="form-group"><div class="input-group"><input type="text" class="fname" name="first_name" id="fname" placeholder="First Name *" /></div><div class="input-group"><input type="text" class="lname" name="last_name" id="lname" placeholder="Last Name *" /></div></div><div class="form-group"><input type="text" class="form-control" name="email" id="email" placeholder="Email *" /></div><div class="form-group"><input type="password" class="form-control" name="password" id="password" placeholder="Password *" /></div><div style="font-size:13px;color:#ff0; text-align:left;">By clicking signup button your are abide by our Terms and conditions.</div></div>');
				$('#phone').after('<span class="change" onclick="changePhone()">Change?</span>');
				$('#phone').prop('readonly', true);
				$('#user-submit').html('SIGNUP');
				$('#otp').focus();
			}else{
				$('.error-msg').remove();
				$("#confirmation").html('<div class="confir-msg"><div class="txticon"> <i class="fa fa-info-circle"></i></div><div class=" add-txt">You are already registered. Please log in</div></div>');
				$("#confirmation").show();
				setTimeout(function() { $("#confirmation").fadeOut(); }, 6000);
				$('#user-submit').html('CONTINUE')
			}
			}
		});
	}
	if(otp == "") {
		$('#otp').addClass('find-error');
		$('.error-msg').remove();
		$('#otp').after('<span class="error-msg">Please enter valid OTP</span>');
		$('#otp').focus();
		return false;
	}else{
		$('#otp').removeClass('find-error');
		$('.error-msg').remove();
	}
	if(fname == ""){
		$('#fname').addClass('find-error');
		$('.error-msg').remove();
		$('#fname').after('<span class="error-msg">Please enter First Name</span>');
		$('#fname').focus();
		return false;
	}else{
		$('#fname').removeClass('find-error');
		$('.error-msg').remove();
	}
	if(lname == ""){
		$('#lname').addClass('find-error');
		$('.error-msg').remove();
		$('#lname').after('<span class="error-msg">Please enter Last Name</span>');
		$('#lname').focus();
		return false;
	}else{
		$('#lname').removeClass('find-error');
		$('.error-msg').remove();
	}
	if(email == ""){
		$('#email').addClass('find-error');
		$('.error-msg').remove();
		$('#email').after('<span class="error-msg">Please enter valid Email</span>');
		$('#email').focus();
		return false;
	}else{
		$('#email').removeClass('find-error');
		$('.error-msg').remove();
	}
	if (!emailExp.test(email)) {
        $("#email").addClass('find-error');
        $('.error-msg').remove();
        $('#email').after('<span class="error-msg">Please enter valid Email</span>');
        $("#email").focus();
        return false;
    } else {
        $("#email").removeClass('find-error');
    	$('.error-msg').remove();
    }
    if(password == "") {
    	$('#password').addClass('find-error');
		$('.error-msg').remove();
		$('#password').after('<span class="error-msg">Please enter Password</span>');
		$('#password').focus();
		return false;
    }else{
    	$("#password").removeClass('find-error');
    	$('.error-msg').remove();
    }

	if(verification =='1') {
		e.preventDefault();
		$.ajax({
			url: hostname + "user-signup",
			type: "POST",
			data:  $("#user-signup").serialize(),
			dataType: 'json',
			beforeSend: function () {
			$("#user-submit").html('Please Wait...');
		},
		success: function(data) {
			  if (data.response == "success") {
					$('#user-submit').html('SIGNUP');
					$("#user-signup")[0].reset();
					$('#user-signup').before('<span class="success-msg">'+data.msg+'</span>');
					setTimeout(function() { location.reload(); }, 3000);
				}else if(data.response == "otperror"){
					$('.error-msg').remove();
					$('#otp').after('<span class="error-msg">'+data.msg+'<span>');
					$('#otp').focus();
					$('#user-submit').html('SIGNUP');
				}else if(data.response == "emailerror"){
					$('.error-msg').remove();
					$('#email').after('<span class="error-msg">'+data.msg+'</span>');
					$('#email').focus();
					$('#user-submit').html('SIGNUP');
				}
			}
		});
	}
});


function changePhone() {
	$('#verification').val('0');
	$('.user-field').remove();
	$('.change').remove();
	$("#phone").attr("readonly", false);
	$('#confirmation').html('');
	$('#phone').val('');
}

function resendOtp() {
$.ajax({
	url: hostname + "resendotp",
	type: "POST",
	data:  $("#user-signup").serialize(),
	dataType: 'json',
	success: function(data) {
		  if (data.response == "success") {
				$("#confirmation").html('<div class="confir-msg"><div class="txticon"> <i class="fa fa-check"></i></div><div class=" add-txt">'+data.msg+'</div></div>');
				$("#confirmation").show();
				setTimeout(function() { $("#confirmation").fadeOut(); }, 6000);
			}else{
				$("#confirmation").html('<div class="confir-msg"><div class="txticon"> <i class="fa fa-info-circle"></i></div><div class=" add-txt">Please check your internet.</div></div>');
				$("#confirmation").show();
				setTimeout(function() { $("#confirmation").fadeOut(); }, 6000);
			}
		}
	});
}


$('form#user-forgot').submit(function(e) {
	var phone = $('#phone_no').val();
	var verification = $('#forgot_verification').val();
	var otp = $('#otp').val();
	var password = $('#password').val();

	if(phone == ""){
		$('#phone_no').addClass('find-error');
		$('.error-msg').remove();
		$('#phone_no').after('<span class="error-msg">Please enter a valid Mobile number</span>');
		$('#phone_no').focus();
		return false;
	}else if(phone.length != 10){
		$('#phone_no').addClass('find-error');
		$('.error-msg').remove();
		$('#phone_no').after('<span class="error-msg">Please enter a valid Mobile number</span>');
		$('#phone_no').focus();
		return false;
	}else if(verification == 0){
		e.preventDefault();
		$.ajax({
			url: hostname + "forgototp",
			type: "POST",
			data:  $("#user-forgot").serialize(),
			dataType: 'json',
			beforeSend: function () {
			$("#btn-forgot").html('Please Wait...');
		},
		success: function(data) {
		  if (data.response == "success") {
		  		$("#confirmation").html('<div class="confir-msg"><div class="txticon"> <i class="fa fa-check"></i></div><div class=" add-txt">'+data.msg+'</div></div>');
				$("#confirmation").show();
				setTimeout(function() { $("#confirmation").fadeOut(); }, 6000);
				$('#forgot_verification').val('1');
			  	$('#phone_no').removeClass('find-error');
				$('.error-msg').remove();
				$('#user-forgot .form-group').after('<div class="user-field"><div class="form-group"><input type="text" class="form-control" name="otp" id="otp" onkeypress="return numeric(event)" placeholder="Enter OTP *" maxlength="4" /><span class="resend" onclick="resendOtpforgot()">Resend?</span></div><div class="form-group"><input type="password" class="form-control" name="password" id="password" placeholder="Password *" /></div></div>');
				$('#phone_no').after('<span class="change" onclick="changePhoneforgot()">Change?</span>');
				$('#phone_no').prop('readonly', true);
				$('#btn-forgot').html('Confirm')
			}else{
				$('.error-msg').remove();
				$("#confirmation").html('<div class="confir-msg"><div class="txticon"> <i class="fa fa-info-circle"></i></div><div class=" add-txt">You are not registered with us. Please sign up.</div></div>');
				$("#confirmation").show();
				setTimeout(function() { $("#confirmation").fadeOut(); }, 6000);
				$('#btn-forgot').html('Send');
			}
			}
		});
	}

	if(otp == "") {
		$('#otp').addClass('find-error');
		$('.error-msg').remove();
		$('#otp').after('<span class="error-msg">Please enter valid OTP</span>');
		$('#otp').focus();
		return false;
	}else{
		$('#otp').removeClass('find-error');
		$('.error-msg').remove();
	}
	if(password == "") {
    	$('#password').addClass('find-error');
		$('.error-msg').remove();
		$('#password').after('<span class="error-msg">Please enter Password</span>');
		$('#password').focus();
		return false;
    }else{
    	$("#password").removeClass('find-error');
    	$('.error-msg').remove();
    }
    if(verification =='1') {
		e.preventDefault();
		$.ajax({
			url: hostname + "user-forgot",
			type: "POST",
			data:  $("#user-forgot").serialize(),
			dataType: 'json',
			beforeSend: function () {
			$("#btn-forgot").html('Please Wait...');
		},
		success: function(data) {
			  if (data.response == "success") {
					$('#btn-forgot').html('Send');
					$("#user-forgot")[0].reset();
					$('#user-forgot').before('<span class="success-msg">'+data.msg+'</span>');
					setTimeout(function() { location.reload(); }, 3000);
				}else{
					$('.error-msg').remove();
					$('#otp').after('<span class="error-msg">'+data.msg+'<span>');
					$('#otp').focus();
					$('#btn-forgot').html('Confirm');
				}
			}
		});
	}
});

function changePhoneforgot() {
	$('#verification').val('0');
	$('.user-field').remove();
	$('.change').remove();
	$("#phone_no").attr("readonly", false);
	$('#phone_no').val('');
	$("#confirmation").html('');
}

function resendOtpforgot() {
$.ajax({
	url: hostname + "resendotpforgot",
	type: "POST",
	data:  $("#user-forgot").serialize(),
	dataType: 'json',
	success: function(data) {
		  if (data.response == "success") {
				$("#confirmation").html('<div class="confir-msg"><div class="txticon"> <i class="fa fa-check"></i></div><div class=" add-txt">'+data.msg+'</div></div>');
				$("#confirmation").show();
				setTimeout(function() { $("#confirmation").fadeOut(); }, 6000);
			}else{
				$("#confirmation").html('<div class="confir-msg"><div class="txticon"> <i class="fa fa-info-circle"></i></div><div class=" add-txt">Please check your internet.</div></div>');
				$("#confirmation").show();
				setTimeout(function() { $("#confirmation").fadeOut(); }, 6000);
			}
		}
	});
}

$('form#user-signin').submit(function(e) {
	var user_email = $('#user_email').val();
	var user_password = $('#user_password').val();

	if(user_email == ""){
		$('#user_email').addClass('find-error');
		$('.error-msg').remove();
		$('#user_email').after('<span class="error-msg">Please enter a valid Email</span>');
		$('#user_email').focus();
		return false;
	} else {
        $("#user_email").removeClass('find-error');
    	$('.error-msg').remove();
    }

    if(user_password == "") {
    	$('#user_password').addClass('find-error');
		$('.error-msg').remove();
		$('#user_password').after('<span class="error-msg">Please enter your password</span>');
		$('#user_password').focus();
		return false;
    }else{
    	$("#user_password").removeClass('find-error');
    	$('.error-msg').remove();
    }
	e.preventDefault();
	$.ajax({
		url: hostname + "user-signin",
		type: "POST",
		data:  $("#user-signin").serialize(),
		dataType: 'json',
		beforeSend: function () {
		$("#btn-signin").html('Please Wait...');
	},
	success: function(data) {
	  if(data.response == 'success'){
	  	$('.log-msg').html('');
	  	$('.log-suc').html('<i class="fa fa-check"></i> '+data.msg);
	  	$("#btn-signin").html('LOGIN');
	  	setTimeout(function() { location.reload(); }, 1000);
	  }else{
	  	$('.log-suc').html('');
	  	$('.log-msg').html('<i class="fa fa-warning"></i> '+data.msg);
	  	$("#btn-signin").html('LOGIN');
	  }
	}
	});
});

// $('form#user-signin').submit(function(e)){
// 	console.log('here'); return false;
// }

/*************Document ready function***************/

$(document).ready(function () {
    $('.sign-upform').on('click', function () {
    	$('.success-msg').remove();
    	$('#verification').val('0');
        $("#user-signup")[0].reset();
        $("#phone").attr("readonly", false);
        $('#phone').removeClass('find-error');
        $('.error-msg').remove();
        $('.user-field').remove();
        $('.change').remove();
        $('#user-submit').html('CONTINUE');
    });

    $('.forgot-pswd').on('click', function () {
    	$('#forgot_verification').val('0');
    	$('.success-msg').remove();
        $("#user-forgot")[0].reset();
        $("#phone_no").attr("readonly", false);
        $('#phone_no').removeClass('find-error');
        $('.error-msg').remove();
        $('.user-field').remove();
        $('.change').remove();
        $('#btn-forgot').html('Send');
    });

    $('.loginform').on('click', function(){
    	$('.log-msg').html('');
    	$("#user-signin")[0].reset();
    	$('#user_email').removeClass('find-error');
    	$('#user_password').removeClass('find-error');
        $('.error-msg').remove();
    });
});

function numeric(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

/****************************
 *   Validate Contact Form  *
 ****************************/
        
var $form = $("#contactform");
if ($form.length > 0) {
    $form.validate({
        rules: {
        	type: {
        		required: true
        	},
            first_name: {
                required: true,
                minlength: 3
            },
            last_name: {
                required: true
            },
            company: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                number: true,
                minlength: 10
            }
        },
        messages: {
        	type: {
        		required: "Please select your inquiry type"
        	},
            first_name: {
                required: "Please Enter First Name",
                minlength: "Name must consist of at least 3 characters"
            },
            last_name: {
                required: "Please Enter Last Name",
                minlength: "Name must consist of at least 3 characters"
            },
            email: {
                required: "Please provide an Email",
                email: "Please enter a valid Email"
            },
            phone: {
                required: "Please provide Phone Number",
                number: "Please enter only digits",
                minlength: "Phone Number must be atleast 10 Numbers"
            },

        },

        submitHandler: function ($form) {
            //Send Mail AJAX
            var formdata = $("#contactform").serialize();
            $.ajax({
                type: "POST",
                url: hostname +"contact",
                data: formdata,
                dataType: 'json',beforeSend: function () {
					$("#contact-submit").val('Please Wait...');
				},
                success: function (data) {
                    if (data.success) {
                        $('.msg').removeClass('msg-error');
                        $('.msg').addClass('msg-success');
                        $('.msg').text('Thank You, Your Message Has been Sent');
                        $("#contactform")[0].reset();
                        $('#contact-submit').val('SUBMIT')
                    } else {
                        $('.msg').removeClass('msg-success');
                        $('.msg').addClass('msg-error');
                        $('.msg').text('Error on Sending Message, Please Try Again');
                    }
                }
            });
        }
    });
}

/****************************
 *   Validate Comment Form  *
 ****************************/

var $blog_form = $("#blogcomment");
if ($blog_form.length > 0) {
    $blog_form.validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            comment: {
                required: true,
                minlength: 10
            }
        },
        messages: {
            name: {
                required: "Please Enter Full Name",
                minlength: "Name must consist of at least 3 characters"
            },
            email: {
                required: "Please provide an Email",
                email: "Please enter a valid Email"
            },
            comment: {
                required: "Please Enter Your Comment",
                minlength: "Comment must be atleast 10 characters"
            },

        },

        submitHandler: function ($form) {
            //Send Mail AJAX
            var formdata = $("#blogcomment").serialize();
            $.ajax({
                type: "POST",
                url: hostname +"postcomment",
                data: formdata,
                dataType: 'json',beforeSend: function () {
					$("#comment-submit").html('Please Wait...');
				},
                success: function (data) {
                    if (data.response == 'success') {
                        $("#blogcomment")[0].reset();
                        $('#comment-submit').html('Post Comment <i class="fa fa-play-circle"></i>');
				  		$("#confirmation").html('<div class="confir-msg"><div class="txticon"> <i class="fa fa-check"></i></div><div class=" add-txt">'+data.msg+'</div></div>');
						$("#confirmation").show();
						setTimeout(function() { $("#confirmation").fadeOut(); }, 6000);
                    } else {
                    	$("#confirmation").html('<div class="confir-msg"><div class="txticon"> <i class="fa fa-info-circle"></i></div><div class=" add-txt">'+data.msg+'</div></div>');
						$("#confirmation").show();
						setTimeout(function() { $("#confirmation").fadeOut(); }, 6000);
                        $('#comment-submit').html('Post Comment <i class="fa fa-play-circle"></i>');
                    }
                }
            });
        }
    });
}

/****************************
 *   Validate My Account  *
 ****************************/

 $('form#my-account').submit(function() {
	var first_name = $('#first_name').val();
	var last_name = $('#last_name').val();
	var phone_ = $('#phone_').val();
	var email = $('#email').val();
	var address = $('#address').val();
	var pin = $('#pin').val();
	if(first_name == ""){
		$('#first_name').addClass('find-error');
		$('.error-message').remove();
		$('#first_name').after('<span class="error-message">Please enter your first Name</span>');
		$('#first_name').focus();
		return false;
	}else{
		$('.error-message').remove();
		$('#first_name').removeClass('find-error');
	}

	if(last_name == ""){
		$('#last_name').addClass('find-error');
		$('.error-message').remove();
		$('#last_name').after('<span class="error-message">Please enter your last Name</span>');
		$('#last_name').focus();
		return false;
	}else{
		$('.error-message').remove();
		$('#last_name').removeClass('find-error');
	}

	if(phone_ == ""){
		$('#phone_').addClass('find-error');
		$('.error-message').remove();
		$('#phone_').after('<span class="error-message">Please enter your Mobile number</span>');
		$('#phone_').focus();
		return false;
	}
	else if(phone_.length != 10){
		$('#phone_').addClass('find-error');
		$('.error-message').remove();
		$('#phone_').after('<span class="error-message">Please enter a valid Mobile number</span>');
		$('#phone_').focus();
		return false;
	}else{
		$('.error-message').remove();
		$('#phone_').removeClass('find-error');
	}

	if(email == ""){
		$('#email').addClass('find-error');
		$('.error-message').remove();
		$('#email').after('<span class="error-message">Please enter valid Email</span>');
		$('#email').focus();
		return false;
	}else if (!emailExp.test(email)) {
        $("#email").addClass('find-error');
        $('.error-message').remove();
        $('#email').after('<span class="error-message">Please enter valid Email</span>');
        $("#email").focus();
        return false;
    } else {
        $("#email").removeClass('find-error');
    	$('.error-message').remove();
    }

    if(address == ""){
		$('#address').addClass('find-error');
		$('.error-message').remove();
		$('#address').after('<span class="error-message">Please enter your Address</span>');
		$('#address').focus();
		return false;
	}else{
		$('.error-message').remove();
		$('#address').removeClass('find-error');
	}
	
	if(pin == ""){
		$('#pin').addClass('find-error');
		$('.error-message').remove();
		$('#pin').after('<span class="error-message">Please enter your Pin</span>');
		$('#pin').focus();
		return false;
	}else if(pin.length != 6){
		$('#pin').addClass('find-error');
		$('.error-message').remove();
		$('#pin').after('<span class="error-message">Please enter a valid pin</span>');
		$('#pin').focus();
		return false;
	}else{
		$('.error-message').remove();
		$('#pin').removeClass('find-error');
	}
});

/****************************
 *   Validate change password  *
 ****************************/

 $('form#change-password').submit(function() {
	var old_password = $('#old_password').val();
	var new_password = $('#new_password').val();
	var repeat_password = $('#repeat_password').val();
	if(old_password == ""){
		$('#old_password').addClass('find-error');
		$('.error-message').remove();
		$('#old_password').after('<span class="error-message">Please enter your Old Password</span>');
		$('#old_password').focus();
		return false;
	}else{
		$('.error-message').remove();
		$('#old_password').removeClass('find-error');
	}

	if(new_password == ""){
		$('#new_password').addClass('find-error');
		$('.error-message').remove();
		$('#new_password').after('<span class="error-message">Please enter your New Password</span>');
		$('#new_password').focus();
		return false;
	}else{
		$('.error-message').remove();
		$('#new_password').removeClass('find-error');
	}

	if(repeat_password == ""){
		$('#repeat_password').addClass('find-error');
		$('.error-message').remove();
		$('#repeat_password').after('<span class="error-message">Please enter Repeat Password</span>');
		$('#repeat_password').focus();
		return false;
	}else{
		$('.error-message').remove();
		$('#repeat_password').removeClass('find-error');
	}

	if(new_password != repeat_password){
		$('#repeat_password').addClass('find-error');
		$('.error-message').remove();
		$('#repeat_password').after('<span class="error-message">The repeat password and new password must match.</span>');
		$('#repeat_password').focus();
		return false;
	} else {
    	$('.error-message').remove();
        $("#repeat_password").removeClass('find-error');
    }
});

setTimeout(function() { $('.fadeout').fadeOut(); }, 5000 );

// $('.service-category').on('click', function(){
// 	var filter = [];
// 	$('.service-category:checked').each(function() {
// 	    filter.push($(this).val());
// 	});

// 	$.ajax({
//         type: "POST",
//         url: hostname +"filter",
//         data: { id: filter },
//         dataType: 'json',
//         beforeSend: function () {
// 			$(".loading").css('display','block');
// 		},
//         success: function (data) {
//             if (data.success) {
//                 console.log('hii');
//             } else {
//                 console.log('byye');
//             }
//         }
//     });
// });

/*********** Check Remainig***************/
function checkremaining(id){
	if(id != ''){
	$.ajax({
            type: "POST",
            url: hostname +"checkRemaining",
            data: {id:id,},
            dataType: 'json',
            beforeSend: function () {
				$(".waitimg").css('display', 'block');
			},
            success: function (data) {
                if (data.response == 'success') {
                    $('.waitimg').css('display', 'none');
                    window.location.href = hostname+"booking-service/"+id;
                } else {
                	$('.waitimg').css('display', 'none');
                	$.alert({
                		icon: 'fa fa-exclamation-triangle',
					    title: 'Encountered an error!',
					    content: data.msg,
					    type: 'red'
					});
                }
            }
        });
	}else{
		$.alert({
        		icon: 'fa fa-exclamation-triangle',
			    title: 'something went wrong!',
			    content: data.msg,
			    type: 'red'
			});
	}
}

function getMoreContent(id,views){
	if(id != ''){
		$.ajax({
			type: "POST",
            url: hostname +"getMoreContent",
            data: {id:id,},
            dataType: 'json',
            beforeSend: function () {
				$(".waitimg").css('display', 'block');
			},
            success: function (data) {
                if (data.response == 'success') {
                    $('.waitimg').css('display', 'none');
                    $('.get_content'+views).html(data.getcontent)
                } else {
                	$('.waitimg').css('display', 'none');
                	$.alert({
                		icon: 'fa fa-exclamation-triangle',
					    title: 'Encountered an error!',
					    content: data.msg,
					    type: 'red'
					});
                }
            }
		});
	}else{
		$.alert({
        		icon: 'fa fa-exclamation-triangle',
			    title: 'something went wrong!',
			    content: data.msg,
			    type: 'red'
			});
	}
}

$('form#prescription-upload').submit(function() {
	var prescription = $('#prescription').val();
	var note = $('#note').val();
	var address = $('#address').val();
	if(prescription == ""){
		$('#prescription').addClass('find-error');
		$('.error-message').remove();
		$('#prescription').after('<span class="error-message">Upload Your prescription</span>');
		$('#prescription').focus();
		return false;
	}else{
		$('.error-message').remove();
		$('#prescription').removeClass('find-error');
	}

	if(address == ""){
		$('#address').addClass('find-error');
		$('.error-message').remove();
		$('#address').after('<span class="error-message">Please enter your Full address</span>');
		$('#address').focus();
		return false;
	}else{
		$('.error-message').remove();
		$('#address').removeClass('find-error');
	}
});

$('.viewFeedback').on('click',function(){
	var id = $(this).attr("data-id");
	if(id != ''){
		$.ajax({
			type: "POST",
            url: hostname +"viewFeedback",
            data: {id:id},
            dataType: 'json',
            beforeSend: function () {
				$(".waitimg").css('display', 'block');
			},
            success: function (data) {
                if (data.response == 'success') {
                    $('.waitimg').css('display', 'none');
					$.dialog({
					    title: 'Admin Message',
					    content: data.data,
					    columnClass: 'medium',
					    backgroundDismiss: function(){
					        return true; // modal wont close.
					    },
					});

                } else {
                	$('.waitimg').css('display', 'none');
                	$.alert({
                		icon: 'fa fa-exclamation-triangle',
					    title: 'Encountered an error!',
					    content: data.msg,
					    type: 'red'
					});
                }
            }
		});
	}else{
		$.alert({
        		icon: 'fa fa-exclamation-triangle',
			    title: 'something went wrong!',
			    content: data.msg,
			    type: 'red'
			});
	}
});


var $form = $("#transfer");
if ($form.length > 0) {
    $form.validate({
        rules: {
        	name: {
                required: true,
                minlength: 4
            },
        	account_number: {
                required: true,
                number: true,
                minlength: 11
            },
            branch_name: {
                required: true
            },
            bank_name: {
                required: true
            },
            ifsc_code: {
                required: true
            },
            amount: {
                required: true,
                number: true
            },
        },
        messages: {
        	name: {
        		required: "Please Enter your bank passbok name"
        	},
            account_number: {
                required: "Please Enter your bank account number",
                minlength: "Account number must be 11 number"
            },
            branch_name: {
                required: "Please Enter your branch name"
            },
            bank_name: {
                required: "Please Enter your bank name"
            },
            ifsc_code: {
                required: "Please Enter your IFSC code"
            },
            amount: {
                required: "Please Enter transfer amount"
            },

        },

        submitHandler: function ($form) {
            //Send Mail AJAX
            var formdata = $("#transfer").serialize();
            $.ajax({
                type: "POST",
                url: hostname +"transfer",
                data: formdata,
                dataType: 'json',beforeSend: function () {
					$(".waitimg").css('display','block');
				},
                success: function (data) {
                	//console.log(data);
                    if (data.response == 'success') {
                    	$("#transfer")[0].reset();
                        $(".waitimg").css('display','none');
                        $('.alert').remove();
                        $('#transfer').before('<div class="alert alert-success">Waiting for confirmation from administrator.</div>');
                    } else {
                        $(".waitimg").css('display','none');
                        $('.alert').remove();
                        $('#transfer').before('<div class="alert alert-danger">'+data.msg+'</div>');
                    }
                }
            });
        }
    });
}

$('.link').on('click',function(){
	var id = $(this).attr("data-id");
	if(id != ''){
		$.ajax({
			type: "POST",
            url: hostname +"account-details",
            data: {id:id},
            dataType: 'json',
            beforeSend: function () {
				$(".waitimg").css('display', 'block');
			},
            success: function (data) {
                if (data.response == 'success') {
                    $('.waitimg').css('display', 'none');
                    $('.transferid__').html("TRANSFER ID #"+data.data.id);
                    $('.acname__').html(data.data.transfer.account_holder_name);
                    $('.acno__').html(data.data.transfer.account_number);
                    $('.branch__').html(data.data.transfer.branch_name);
                    $('.bank__').html(data.data.transfer.bank_name);
                    $('.ifsc__').html(data.data.transfer.ifsc_code);
                    $('.amount__').html(data.data.transfer.amount+'/-');
                    $('.transactionid__').html(data.data.transaction_id);
                } else {
                	alert("something went wrong !");
                }
            }
		});
	}else{
		alert("something went wrong !");
	}
});