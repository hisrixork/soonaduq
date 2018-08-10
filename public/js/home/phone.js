function startNoPhoneModal(type = 'adhan') {
    initialState()
    $('.all-hour').fadeIn()
    $('#modalPhone').modal('show')
    setTimeout(function () {
        showPhoneParts(1000)
        setModalPhoneBg('black', 2000)
        setModalPhoneBg('white', 3000)
        setModalPhoneImg(4000)
        closeNoPhoneModal(type, 10000)
    }, 2000)
}

function initialState() {
    let noPhoneImg = $('.no-phone img')
    $('.part').removeClass().addClass('part col-6')
    $('.no-phone').removeClass().addClass('no-phone bg-white rounded-circle d-block m-auto')
    noPhoneImg.removeAttr('class src').addClass('animated').attr('src', "/img/no-phone/no-phone-w.svg")
}

function showPhoneParts(timeout = 0) {
    setTimeout(function () {
        $('#modalPhone .part').addClass('in')
    }, timeout)
}

function setModalPhoneBg(color, timeout = 0) {
    setTimeout(function () {
        if (color === 'black') {
            $('#modalPhone').addClass('modal-black')
            $('.no-phone').removeClass('bg-white')
        }
        else {
            $('.part').addClass('bg-white')
            $('#modalPhone').removeClass('modal-black')
        }
    }, timeout)
}

function setModalPhoneImg(timeout = 0) {
    setTimeout(function () {
        let noPhoneImg = $('.no-phone img')
        noPhoneImg.addClass('flash infinite').attr('src', noPhoneImg.attr('src').replace('no-phone-w', 'no-phone-r'))
    }, timeout)
}

function closeNoPhoneModal(type, timeout = 0) {
    setTimeout(function () {
        initialState()
        showTransition()
        setTimeout(() => {
            $('#modalPhone').removeClass('modal-black').modal('hide')
            $('.btn#btnClosePhone').click()
            if (type === 'adhan')
                $('.btn#btnModalAdhan').click()
            if (type === 'iqama')
                $('.btn#btnModalIqama').click()
        }, 250)
    }, timeout)
}

$(function () {
    $('.btn#btnModalPhone').click(function () {
        showTransition()
        data.attr('data-current', data.attr('data-next'))
        startNoPhoneModal('adhan')
    })
})