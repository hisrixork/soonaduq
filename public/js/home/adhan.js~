function adhanModalInitialState() {
    $('#modalAdhanTitle').show()
    $('#modalAdhan .adhan-item').hide()
}

function startAdhanModal(speed = 2000, timeout = 0) {
    let i = 1, nb = 0, interval, adhanItem = $('#modalAdhan .adhan-item'), max = adhanItem.length || 8, curr

    $('#modalAdhan').modal('show')

    setTimeout(function () {
        interval = setInterval(() => {
            $('#modalAdhanTitle').hide()
            curr = $(`#modalAdhan .adhan-item[data-item=${i}]`)
            if (++nb > parseInt(curr.attr('data-nb'))) {
                i++
                nb = 1
            }
            adhanItem.hide()
            setTimeout(() => {
                $(`#modalAdhan .adhan-item[data-item=${i}]`).show()
            }, 250)

            if (i >= parseInt(max) + 1) {
                clearInterval(interval)
                closeAdhanModal()
            }

        }, speed)
    }, timeout)

}

function closeAdhanModal() {
    showTransition()
    $('#modalAdhan').modal('hide')
    setTimeout(() => {
        adhanModalInitialState()
        $('.btn#btnModalDuaa').click()
    }, 250)
}

$(function () {
    $('.btn#btnModalAdhan').click(function () {
        adhanModalInitialState()
        startAdhanModal(2750, 1000)
    })
})