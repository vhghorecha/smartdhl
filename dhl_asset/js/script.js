function change_captch($id){
    $('#imgcaptcha').attr('src','ajax/get_captcha/' + $id  + '/' + $.now());
}
