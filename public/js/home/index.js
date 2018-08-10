let arabN

function setTimeUntil(date, name) {

    let h = date.format('HH'), m = date.format('mm'), s = date.format('ss')

    if (parseInt(h) === 0 && parseInt(m) === 0 && parseInt(s) <= 13 && parseInt(data.attr('data-isAdhan')) === 0 && name !== 'shuruq') {
        data.attr('data-isAdhan', 1)
            $('.btn#btnModalPhone').click()
    }

    if (parseInt(s) === 0 || $('.info-next-time .info-next-time-label span#label span#arab').text() === '')
        axios.get('/translate/' + name).then((r) => {
            arabN = r.data
            setTimeName(name, arabN)
        })


    $('.info-next-time .info-next-time-value label#next-hour').text(h)
    $('.info-next-time .info-next-time-value label#next-minute').text(m)
    $('.info-next-time .info-next-time-value label#next-second').text(s)
}

function setTimeName(name, arab = null) {
    data.attr('data-next', name)
    $('.info-next-time .info-next-time-label span#label span#phonetic').text(name)
    $('.info-next-time .info-next-time-label span#label span#arab').text(!arab || arab === null ? '' : '\xa0\xa0-\xa0\xa0\xa0\xa0' + arab)
}

function setHour(hour) {
    $('.info-hour').text(hour)
}

function setCurrentTime(name) {
    $(`.time-item`).removeClass('bg-success text-white')
    $(`.time-item[data-time=${name}]`).addClass('bg-success text-white')
}

function intervalTime() {
    let now = moment(), next = moment(), last = moment(), times, time, name

    times = JSON.parse(atob(data.attr('data-times')))

    if (moment(times['isha'].date).date() !== now.date())
        location.reload()

    delete times["shuruq"]

    if (now.unix() <= moment(times['isha'].date).unix())
        Object.keys(times).map((key) => {
            time = times[key]
            if (next.unix() > last.unix() && now.unix() < moment(time.date).unix()) {
                name = key
                next = moment(time.date)
            }
            last = moment(time.date)
        })
    else {
        name = 'fajr'
        next = moment(JSON.parse(atob(data.attr('data-tomorrow'))).date)
    }
    if (next.unix() === now.unix()) {
        name = 'fajr'
        next = moment(times['fajr'].date);
    }

    setTimeUntil(moment.utc(moment(next).diff(moment(now))), name)
    setTimeName(name, arabN)
    setHour(moment().format("HH:mm"))
    setCurrentTime(name)

}

function getWeatherIcon(icon) {
    let current = 'clouds', icons = {
        '01': 'sun',
        '02': 'cloudy',
        '03': 'clouds',
        '09': 'rain-cloud',
        '10': 'raining',
        '11': 'thunder',
        '13': 'snow',
        '14': 'mist'
    }

    Object.keys(icons).map(function (key) {
        if (icon.indexOf(key) !== -1) {
            current = icons[key]
            return current
        }
    })
    return current || 'clouds'
}

function setWeather() {
    let lat = (data.attr('data-lat') || 50.367874), long = (data.attr('data-long') || 3.080602)
    if (online())
        axios.get(`http://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${long}&units=metric&appid=f9951f952aed12b5ca8d359528a08f2b&imgUrl=http//openweathermap.org/img/w/&lang=fr`).then((r) => {
            let temp = r.data.main && r.data.main.temp ? parseInt(r.data.main.temp) : '--',
                icon = r.data.weather && r.data.weather[0] ? r.data.weather[0].icon : ''
            $('.info-weather span#temp').text(temp)
            $('.info-weather img#wIcon').attr('src', `/img/weather/${getWeatherIcon(icon)}.svg`)
        })
}

function setBg() {
    let next = data.attr('data-next')

    $('.main').removeClass('fajr dhurh asr maghrib isha').addClass(next)
}

$(function () {
    setInterval(function () {
        intervalTime()
    }, 1000)
    setWeather()
    setTimeout(() => {
        setBg()
    }, 3000)

    setInterval(function () {
        setWeather()
        setBg()
    }, 6000000)


})