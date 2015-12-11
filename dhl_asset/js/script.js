function change_captch($id){
    $('#imgcaptcha').attr('src','/smartdhl/ajax/get_captcha/' + $id  + '/' + $.now());
}
