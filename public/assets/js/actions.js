var actions = {};
$(document).ready(function(){
    actions.main();
});

actions.main = function () {
    console.log('hola');
    $('#login-form').hide();
    actions.login();
};

actions.login = function () {
    $('#login-start').on('click',function () {
        $('#login-form').show('fade');
        $('#login-start').hide('fade');
    });
};