$(document).ready(function(){
    console.log('hola mundo')
    $(".addPhotos").hide();
    $("#newPhotos").click(function(){
        console.log('hola')
        $('.addPhotos').show('delay')
    });
});