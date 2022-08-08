
$('.basic-info-step2').hide();
$('.basic-info-step3').hide();
$('#non_jordanian_fields').hide();
$('#ID-document').hide();
$(".basic-info-save1").attr("disabled", true);
$(".basic-info-sms-btn").attr("disabled", true);
$(".finish-basic-inf-btn").attr("disabled", true);
$('.en-name-err-msg').hide();


$('.resend').hide();
var time = 60;
var flag = true;
$('.basic-info-sms-btn').click(function() {
    $(this).attr("disabled", true);
    $('.timer').show();
    if (flag) {
        var timer = setInterval(function () {
            flag = false;
            if (time == 0) {
                $('.resend').show();
                $('.timer').hide();
                clearInterval(timer);
                time = 60;
                flag = true;
            } else {
                $(".timer").html( "Resend code in " + time + " s ");
                time--;
            }
        }, 1000);
    }
});
$('#nationality').change(function () {
    // console.log($(this).val());
    let nationality = $(this).val();
    if (nationality === '0') {
        $('#national-ID').hide();
        $('#en_third_name').hide();
        $('#ar_third_name').hide();
        $('#non_jordanian_fields').show();
        $('#ID-document').show();
    } else {
        $('#national-ID').show();
        $('#en_third_name').show();
        $('#ar_third_name').show();
        $('#non_jordanian_fields').hide();
        $('#ID-document').hide();

    }
});


function validateForm() {
    var national = $(".national").val();
    var residency = $(".residency").val();
    var en1 = $(".en_name1").val();
    var en2 = $(".en_name2").val();
    var en3 = $(".en_name3").val();
    var en4 = $(".en_name4").val();
    var ar1 = $(".ar_name1").val();
    var ar2 = $(".ar_name2").val();
    var ar3 = $(".ar_name3").val();
    var ar4 = $(".ar_name4").val();
    var nation_regex = /^[0-9]{10}$/;
    var en_regex = /^[a-zA-Z]{3,20}$/;
    var ar_regex = /^[\u0621-\u064A]{3,20}$/;
    if (nation_regex.test(national) == true && ar_regex.test(ar1) == true && ar_regex.test(ar2) == true && ar_regex.test(ar3) == true && ar_regex.test(ar4) == true && en_regex.test(en1) == true && en_regex.test(en2) == true && en_regex.test(en3) == true && en_regex.test(en4) == true
        && $('.year').val() != '' && $('.month').val() != '' && $('.day').val() != '') {
        $(".basic-info-save1").attr("disabled", false);
    }else if (nation_regex.test(residency) == true  && ar_regex.test(ar1) == true && ar_regex.test(ar2) == true && ar_regex.test(ar4) == true && en_regex.test(en1) == true && en_regex.test(en2) == true && en_regex.test(en4) == true
        && $('.year').val() != '' && $('.month').val() != '' && $('.day').val() != '') {
        $(".basic-info-save1").attr("disabled", false);
    }
    else {
        $(".basic-info-save1").attr("disabled", true);
    }
}

function validateYear(){
    if(document.getElementById('year').value == ''){
        $('.year').addClass("is-invalid");
        $(".basic-info-save1").attr("disabled", false);
    }else{
        $('.year').removeClass("is-invalid");
    }
}
function validateMonth(){
    if(document.getElementById('month').value == ''){
        $('.month').addClass("is-invalid");
        $(".basic-info-save1").attr("disabled", false);
    }else{
        $('.month').removeClass("is-invalid");
    }
}
function validateDay(){
    if(document.getElementById('day').value == ''){
        $('.day').addClass("is-invalid");
        $(".basic-info-save1").attr("disabled", false);
    }else{
        $('.day').removeClass("is-invalid");
    }
}
function validateNational() {
    var validNationalNum = true;
    validNationalNum = checkNationalNum($(".national"));

    function checkNationalNum(obj) {
        var nationalNumResult = true;
        var national_num_regex = /^[0-9]{10}$/;
        nationalNumResult = national_num_regex.test($(obj).val()) ? true : false;
        return nationalNumResult;
    }

    if (!validNationalNum) {
        $('.national').addClass("is-invalid");
        $(".basic-info-save1").attr("disabled", false);
    } else {
        $('.national').removeClass("is-invalid");
    }
    return validNationalNum;
}

function validateResidency() {
    var validResidencyNum = true;
    validResidencyNum = checkResidencyNum($(".residency"));

    function checkResidencyNum(obj) {
        var residencyNumResult = true;
        var residency_num_regex = /^[0-9]{10}$/;
        residencyNumResult = residency_num_regex.test($(obj).val()) ? true : false;
        return residencyNumResult;
    }

    if (!validResidencyNum) {
        $('.residency').addClass("is-invalid");
        $(".basic-info-save1").attr("disabled", false);
    } else {
        $('.residency').removeClass("is-invalid");
    }
}

function checkEnName(obj) {
    var enResultResult = true;
    var en_name_regex = /^[a-zA-Z]{3,20}$/;
    enResultResult = en_name_regex.test($(obj).val()) ? true : false;
    return enResultResult;
}

function checkArName(obj) {
    var arResultResult = true;
    var ar_name_regex = /^[\u0621-\u064A]{3,20}$/;
    arResultResult = ar_name_regex.test($(obj).val()) ? true : false;
    return arResultResult;
}

function validateEnName1() {
    var validEnName1 = true;
    validEnName1 = checkEnName($(".en_name1"));
    if (!validEnName1) {
        $('.en_name1').addClass("is-invalid");
        $('.en-name-err-msg').show();
        $(".basic-info-save1").attr("disabled", false);
    } else {
        $('.en_name1').removeClass("is-invalid");
        $('.en-name-err-msg').hide();
    }
}

function validateEnName2() {
    var validEnName2 = true;
    validEnName2 = checkEnName($(".en_name2"));
    if (!validEnName2) {
        $('.en_name2').addClass("is-invalid");
        $('.en-name-err-msg').show();
        $(".basic-info-save1").attr("disabled", false);
    } else {
        $('.en_name2').removeClass("is-invalid");
        $('.en-name-err-msg').hide();
    }
}

function validateEnName3() {
    var validEnName3 = true;
    validEnName3 = checkEnName($(".en_name3"));
    if (!validEnName3) {
        $('.en_name3').addClass("is-invalid");
        $('.en-name-err-msg').show();
        $(".basic-info-save1").attr("disabled", false);
    } else {
        $('.en_name3').removeClass("is-invalid");
        $('.en-name-err-msg').hide();
    }
}

function validateEnName4() {
    var validEnName4 = true;
    validEnName4 = checkEnName($(".en_name4"));
    if (!validEnName4) {
        $('.en_name4').addClass("is-invalid");
        $('.en-name-err-msg').show();
        $(".basic-info-save1").attr("disabled", false);
    } else {
        $('.en_name4').removeClass("is-invalid");
        $('.en-name-err-msg').hide();
    }
}


function validateArName1() {
    var validArName1 = true;
    validArName1 = checkArName($(".ar_name1"));
    if (!validArName1) {
        $('.ar_name1').addClass("is-invalid");
        $('.ar-name-err-msg').show();
        $(".basic-info-save1").attr("disabled", false);
    } else {
        $('.ar_name1').removeClass("is-invalid");
        $('.ar-name-err-msg').hide();
    }
}

function validateArName2() {
    var validArName2 = true;
    validArName2 = checkArName($(".ar_name2"));
    if (!validArName2) {
        $('.ar_name2').addClass("is-invalid");
        $('.ar-name-err-msg').show();
        $(".basic-info-save1").attr("disabled", false);
    } else {
        $('.ar_name2').removeClass("is-invalid");
        $('.ar-name-err-msg').hide();
    }
}

function validateArName3() {
    var validArName3 = true;
    validArName3 = checkArName($(".ar_name3"));
    if (!validArName3) {
        $('.ar_name3').addClass("is-invalid");
        $('.ar-name-err-msg').show();
        $(".basic-info-save1").attr("disabled", false);
    } else {
        $('.ar_name3').removeClass("is-invalid");
        $('.ar-name-err-msg').hide();
    }
}

function validateArName4() {
    var validArName4 = true;
    validArName4 = checkArName($(".ar_name4"));
    if (!validArName4) {
        $('.ar_name4').addClass("is-invalid");
        $('.ar-name-err-msg').show();
        $(".basic-info-save1").attr("disabled", false);
    } else {
        $('.ar_name4').removeClass("is-invalid");
        $('.ar-name-err-msg').hide();
    }
}


function validateForm2() {
    var mobile = $(".mobile").val();
    var mobile_regex = /^[0-9]{10}$/;
    if (mobile_regex.test(mobile)) {
        $(".basic-info-sms-btn").attr("disabled", false);
    }
    else {
        $(".basic-info-sms-btn").attr("disabled", true);
    }
}
function validateMobile(){
    var mobile = $(".mobile").val();
    var mobile_regex = /^[0-9]{10}$/;
    if (!mobile_regex.test(mobile)) {
        $('.mobile').addClass("is-invalid");
    }
    else {
        $('.mobile').removeClass("is-invalid");
    }
}
function validateForm3() {
    var mobile_verification = $(".mobile_verification").val();
    var mobile_verification_regex = /^[0-9]{4}$/;
    if (mobile_verification_regex.test(mobile_verification)) {
        $(".finish-basic-inf-btn").attr("disabled", false);
    }
    else {
        $(".finish-basic-inf-btn").attr("disabled", true);
    }
}
function validateVerificationMobile(){
    var mobile_verification = $(".mobile_verification").val();
    var mobile_verification_regex = /^[0-9]{4}$/;
    if (!mobile_verification_regex.test(mobile_verification)) {
        $('.mobile_verification').addClass("is-invalid");
        $('.err-msg-verification').show();
    }
    else {
        $('.mobile_verification').removeClass("is-invalid");
        $('.err-msg-verification').hide();
    }
}





