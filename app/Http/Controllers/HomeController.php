<?php

namespace App\Http\Controllers;

use App\Data;
use App\Helpers;
use App\Models\Times;
use App\Models\PrayTime;
use Carbon\Carbon;
use GeniusTS\HijriDate\Date;
use GeniusTS\HijriDate\Hijri;
use GeniusTS\HijriDate\Translations\Arabic;

class HomeController extends Controller
{
    public function index()
    {
        setlocale(LC_ALL, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');
        Date::setTranslation(new Arabic());
        Hijri::setDefaultAdjustment(-1);

        $latitude = Helpers::getLat();
        $longitude = Helpers::getLon();

        $prayTime = new PrayTime(0);
        $prayTime->setDhuhrMinutes(Times::where('phonetic', 'dhuhr')->first()->adjustment);
        $prayTime->setMaghribMinutes(Times::where('phonetic', 'maghrib')->first()->adjustment);

        $n = Carbon::now('Europe/Paris');
        $n->addSeconds(20);

        // Adhan test : simule un adhan dans 20 secondes
        $times = $this->adjustTime($prayTime->getPrayerTimes($n->timestamp, $latitude, $longitude));
        $times['asr'] = $n;

        // Réel
        $times = $this->adjustTime($prayTime->getPrayerTimes(Carbon::now('Europe/Paris')->timestamp, $latitude, $longitude));

        $data = (new Data([
            'lat'      => $latitude,
            'long'     => $longitude,
            'adhan'    => Helpers::getAdhan(),
            'times'    => $times,
            'tomorrow' => ($prayTime->getPrayerTimes(Carbon::parse(Carbon::now()->addDay(), 'Europe/Paris')->timestamp, $latitude, $longitude))['fajr'] ?? null,
            'hijri'    => Date::now('Europe/Paris')->format('l j F o', \GeniusTS\HijriDate\Date::ARABIC_NUMBERS)
        ]))->getData();

        return view('pages.home', compact('data'));

    }

    function adjustTime($times)
    {
        foreach ($times as $name => $time) {
            $funcName = 'set' . ucfirst($name) . 'Minutes';
            if (!method_exists(new PrayTime(), $funcName)) {
                if (($a = Times::where('phonetic', strtolower($name))->first()) === null)
                    $m = 0;
                else
                    $m = $a->adjustment;
                $n = Carbon::parse($time->toDateTimeString(), 'Europe/Paris');
                $n->addMinutes($m);
                $times[$name] = $n;
            }
        }
        return $times;
    }
}
