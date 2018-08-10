let ayahInterval, ayahTimeInterval = 30000, loopAyah = true

function startAyahModal() {
    $('.all-hour').addClass('text-dark').show()
    launchAyah()
}

function setAyah() {

    axios.get('/ayah').then((r) => {
        $('#modalAyahData #modalAyahDataArab span#sourateA').text(r.data.surah.arab)
        $('#modalAyahData #modalAyahDataFrench span#sourateF').text(r.data.surah.phonetic)
        $('#modalAyahMain .ayah-arab label').text('').text('“\xa0\xa0\xa0' + r.data.ayah.arab + '\xa0\xa0\xa0”')
        ayahTimeInterval = r.data.ayah.arab < 25 ? 4000 : r.data.ayah.arab < 100 ? 8000 : r.data.ayah.arab < 200 ? 12000 : 16000
        setTimeout(() => {
            if (loopAyah)
                setAyah()
        }, ayahTimeInterval)
    })
}

function launchAyah() {
    setAyah()
}

function closeAyahModal() {
    $('.all-hour').removeClass('text-dark')
    showTransition()
    setTimeout(() => {
        clearInterval(ayahInterval)
        loopAyah = false
        $('#modalAyah').modal('hide')
    }, 250)

}

$(function () {
    $('.btn#btnModalAyah').click(function () {
        startAyahModal()
    })

    $('#btnCloseAyah').click(function () {
        closeAyahModal()
    })
})