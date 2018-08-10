function duaaModalInitialState() {
    $('#modalDuaaTitle').show()
    $('#modalDuaa .duaa-item').hide()
}

function startDuaaModal(speed = 2000, timeout = 0) {
    let i = 1, interval, duaaItem = $('#modalDuaa .duaa-item'), max = duaaItem.length || 5, curr

    $('#modalDuaa').modal('show')

    interval = setInterval(() => {
        $('#modalDuaaTitle').fadeOut(200)
        curr = $(`#modalDuaa .duaa-item[data-item=${i}]`)
        duaaItem.hide()
        setTimeout(() => {
            curr.show()
        }, 300)

        if (i >= parseInt(max) + 1) {
            clearInterval(interval)
            closeDuaaModal()
        }
        i++
    }, speed * 1.5)

}

function closeDuaaModal() {
    $('.all-hour').removeClass('text-dark')
    showTransition()
    setTimeout(() => {
        duaaModalInitialState()
        $('.btn#btnCloseDuaa').click()
        $('#modalDuaa').modal('hide')
        $('.btn#btnModalHadith').click()
    }, 250)
}

$(function () {
    $('.btn#btnModalDuaa').click(function () {
        duaaModalInitialState()
        startDuaaModal(3000, 1000)
    })
})