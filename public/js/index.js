let data = $('.data')

function showTransition() {
    $('.transition-block').fadeIn()
    $('.transition-block img').addClass('rotateInDownLeft')
    setTimeout(function () {
        $('.transition-block img').addClass('pulse infinite').removeClass('rotateInDownLeft')
    }, 1000)
    setTimeout(function () {
        $('.transition-block img').addClass('rotateOutUpRight').removeClass('pulse infinite')
    }, 2000)
    setTimeout(function () {
        $('.transition-block img').removeClass('rotateOutUpRight')
        $('.transition-block').fadeOut()
    }, 3000)
}

$(function () {

    let token = $('meta[name="csrf-token"]').attr('content')

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    })

})


$(document).ready(function () {

    setTimeout(function () {
        $('#preload img').addClass('pulse infinite').removeClass('flip')
    }, 1000)
    setTimeout(function () {
        $('#preload img').addClass('flipOutY').removeClass('pulse infinite')
    }, 3000)
    setTimeout(function () {
        $('#preload img').removeClass('flipOutY').addClass('flip')
        $('#preload').fadeOut()
    }, 4000)
})