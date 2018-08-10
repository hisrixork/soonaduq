let hadithInterval, hadithTimeInterval = 5000, id = 0, loopHadith = true

function startHadithModal() {
    let n = data.attr('data-current'), t
    $('.all-hour').addClass('text-dark')
    axios.get('/wait/' + n).then((r) => {
        t = parseInt(r.data) > 0 ? (parseInt(r.data) * 60000) : 300000
        t -= 45000
        t = 10000
        launchHadith()
        setTimeout(() => {
            closeHadithModal()
        }, t)
    })
}

async function setHadith() {
    axios.get('/hadith/' + id).then((r) => {
        let data = r.data
        $('#modalHadithMain .ayah-arb label').hide().html('\xa0\xa0\xa0' + data.hadith.french + '\xa0\xa0\xa0').fadeIn()
        $('#modalHadithTitle #modalHadithTitleValue').html('\xa0\xa0\xa0' + data.title + '\xa0\xa0\xa0')
        $('#modalHadithReport #modalHadithReportValue').html('Rapporté par ' + data.hadith.report + '\xa0\xa0\xa0')
        $('img.rad').attr('src', '/img/radi.png').attr('height', 50).attr('width', 50)
        $('img.saw').attr('src', '/img/saws.png').attr('height', 50).attr('width', 50)
        id = parseInt(data.hadith.id_line) + 1
        hadithTimeInterval = data.hadith.french.length < 25 ? 4000 : data.hadith.french.length < 100 ? 8000 : data.hadith.french.length < 200 ? 12000 : 16000
        setTimeout(() => {
            if (loopHadith)
                setHadith()
        }, hadithTimeInterval)
    })
}

function launchHadith() {
    setHadith()
}

function closeHadithModal() {
    $('.all-hour').removeClass('text-dark')
    showTransition()
    setTimeout(() => {
        clearInterval(hadithInterval)
        loopHadith = false
        $('.btn#btnCloseHadith').click()
        $('#modalHadith').modal('hide')
        startNoPhoneModal('iqama')
    }, 250)
}

$(function () {
    $('.btn#btnModalHadith').click(function () {
        startHadithModal()
    })
})