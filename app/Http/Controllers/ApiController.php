<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\Models\Hadith;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getNextTime(Request $request)
    {
        if (($times = $request->get('times')) === null)
            return '00:00:00';
        return Helpers::nextTime(json_decode(base64_decode($times)));
    }

    public function translateSalat(Request $request, $name)
    {
        return Helpers::translate($name);
    }

    public function getWait(Request $request, $name)
    {
        return Helpers::getWait($name);
    }

    public function getAyah()
    {
        if (($a = DB::table('quran')->where('read', 0)->first()) === null) {
            DB::update('UPDATE quran SET `read` = 0');
            $a = DB::table('quran')->where('read', 0)->first();
        }
        DB::update('UPDATE quran SET `read` = 1 WHERE id_surah = ? AND id_verse = ?', array($a->id_surah, $a->id_verse));
        $surah = DB::table('surah')->where('id', $a->id_surah)->first();

        return response()->json(['ayah' => $a, 'surah' => $surah]);
    }

    public function getHadith(Request $request, $id)
    {
        if (($a = DB::table('hadith_title')->where('next', 0)->first()) === null) {
            DB::update('UPDATE hadith_title SET `next` = 0');
            $a = DB::table('hadith_title')->where('next', 0)->first();
        }

        if (($h = Hadith::where('id_line', $id)->where('id_hadith_title', $a->id)->first()) === null) {
            DB::update('UPDATE hadith_title SET `next` = 1 WHERE id = ? ', array($a->id));
            if (($a = DB::table('hadith_title')->where('next', 0)->first()) === null) {
                DB::update('UPDATE hadith_title SET `next` = 0');
            }
            $a = DB::table('hadith_title')->where('next', 0)->first();
            $h = Hadith::where('id_line', 0)->where('id_hadith_title', $a->id)->first();
        }

        return response()->json(['title' => $a->title, 'hadith' => $h]);
    }

}
