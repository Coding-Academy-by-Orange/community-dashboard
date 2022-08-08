// $(".next1").attr("disabled", true);
// // $('.signup-step2').hide();
// // $('#back').hide();
// $('.email-validation-message').hide();
// $('.password-validation-message').hide();
// $(".finish-register-btn").attr("disabled", true);
//
// // $('.resend').hide();
// var time = 60;
// var flag = true;
// $('.next1').click(function() {
//     $(this).attr("disabled", true);
//     $('.timer').show();
//     if (flag) {
//         var timer = setInterval(function () {
//             flag = false;
//             if (time == 0) {
//                 // $('.resend').show();
//                 $('.timer').hide();
//                 clearInterval(timer);
//                 time = 60;
//                 flag = true;
//             } else {
//                 $(".timer").html( "Resend code in " + time + " s ");
//                 time--;
//             }
//         }, 1000);
//     }
// });
//
//     function showPass() {
//     var x = document.getElementById("password");
//     if (x.type === "password") {
//         x.type = "text";
//         $('.eye').removeClass( "fa-eye-slash" );
//         $('.eye').addClass( "fa-eye" );
//     } else {
//         x.type = "password";
//         $('.eye').addClass( "fa-eye-slash" );
//         $('.eye').removeClass( "fa-eye" );
//     }
// }
//
// function validate() {
//     var validEmail = true;
//     var validPassword  = true;
//     validEmail = checkEmail($(".email"));
//     validPassword = checkPassword($(".password"));
//     var checkBox = document.getElementById("chAgree");
//
//
//     if(validEmail && ($(".password").val() == '')) {
//         $('.email').addClass("is-valid");
//         $('.email').removeClass("is-invalid");
//         $('.email-validation-message').hide();
//     }
//     else if(!validEmail && ($(".password").val() == '')){
//         $('.email').addClass("is-invalid");
//         $('.email-validation-message').show();
//         $('.email').removeClass("is-valid");
//     }
//     else if (validPassword && ($(".email").val() == '')) {
//         $('.password').addClass("is-valid");
//         $('.password').removeClass("is-invalid");
//         $('.password-validation-message').hide();
//     }
//     else if(!validPassword && ($(".email").val() == '')){
//         $('.password').addClass("is-invalid");
//         $('.password-validation-message').show();
//         $('.password').removeClass("is-valid");
//     }
//     else if(validPassword && validEmail){
//         $('.email').addClass("is-valid");
//         $('.email').removeClass("is-invalid");
//         $('.email-validation-message').hide();
//         $('.password').addClass("is-valid");
//         $('.password').removeClass("is-invalid");
//         $('.password-validation-message').hide();
//     }
//     else if(!validPassword && !validEmail){
//         $('.email').addClass("is-invalid");
//         $('.email-validation-message').show();
//         $('.email').removeClass("is-valid");
//         $('.password').addClass("is-invalid");
//         $('.password-validation-message').show();
//         $('.password').removeClass("is-valid");
//     }
//     else if(!validPassword && validEmail){
//         $('.email').addClass("is-valid");
//         $('.email').removeClass("is-invalid");
//         $('.email-validation-message').hide();
//         $('.password').addClass("is-invalid");
//         $('.password-validation-message').show();
//         $('.password').removeClass("is-valid");
//     }
//     else if(validPassword && !validEmail){
//         $('.email').addClass("is-invalid");
//         $('.email-validation-message').show();
//         $('.email').removeClass("is-valid");
//         $('.password').addClass("is-valid");
//         $('.password').removeClass("is-invalid");
//         $('.password-validation-message').hide();
//     }
//     if (validPassword && validEmail && checkBox.checked == true) {
//         $(".next1").attr("disabled", false);
//     }
// }
//
// function checkEmail(obj) {
//     var emailResult = true;
//     var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,3})+$/;
//     emailResult = $.trim($(obj).val()).match(email_regex) ? true : false;
//     return emailResult;
// }
//
// function checkPassword(obj) {
//     var passwordResult = true;
//     var password_regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
//     passwordResult = $.trim($(obj).val()).match(password_regex) ? true : false;
//     return passwordResult;
// }
//
// function validateForm2() {
//     var email_verification = $(".email_verification").val();
//     var email_verification_regex = /^[0-9]{4}$/;
//     if (email_verification_regex.test(email_verification)) {
//         $(".finish-register-btn").attr("disabled", false);
//     }
//     else {
//         $(".finish-register-btn").attr("disabled", true);
//     }
// }
// function validateVerificationEmail(){
//     var email_verification = $(".email_verification").val();
//     var email_verification_regex = /^[0-9]{4}$/;
//     if (!email_verification_regex.test(email_verification)) {
//         $('.email_verification').addClass("is-invalid");
//     }
//     else {
//         $('.mobile_verification').removeClass("is-invalid");
//     }
// }
//
//
