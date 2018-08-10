function iqamaModalInitialState() {
    $('#modalIqamaMain').show()
    $('#modalIqama .iqama-item').hide()
}

function startIqamaModal(timeout = 0) {
    $('.all-hour').addClass('text-dark')
    $('#modalIqama').modal('show')

    setTimeout(function () {
        $('#modalIqamaMain').hide()
        $('#modalIqama .iqama-item').fadeIn()
        setTimeout(() => {
            closeIqamaModal()
        }, timeout + 4000)
    }, timeout)

}

function closeIqamaModal() {
    $('.all-hour').removeClass('text-dark')
    showTransition()
    $('#modalIqama').modal('hide')
    setTimeout(() => {
        location.reload()
    }, 1000)
}

$(function () {
    $('.btn#btnModalIqama').click(function () {
        iqamaModalInitialState()
        startIqamaModal(4000)
    })
})