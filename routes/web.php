<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use App\Data;

Route::get('/', 'HomeController@index');
Route::get('/next-time', 'ApiController@getNextTime')->name('next-time');
Route::get('/translate/{name}', 'ApiController@translateSalat')->name('translate.salat');
Route::get('/wait/{name}', 'ApiController@getWait')->name('get.wait');
Route::get('/ayah', 'ApiController@getAyah')->name('get.ayah');
Route::get('/hadith/{id}', 'ApiController@getHadith')->name('get.hadith');

/*Route::get('/test', function () {
    $hs = include('../database/hadith.php');

    $a = [];
    $keys = array_keys($hs);
    foreach ($hs as $key => $ht) {
        $h = $ht['text'];
//        $h = str_replace("\n", " ", $h);
//        $h = str_replace(".", "&dot;.", $h);
//        $h = str_replace("?", "&err;?", $h);
        $h = str_replace("‟", "'", $h);
        $h = str_replace("`", "'", $h);
        $h = str_replace("„", "`", $h);
        $h = str_replace("  ", " ", $h);
        $h = str_replace("-qu’Allâh l’agrée-", "&lt;img class='rad'/&gt;", $h);
//        $h = str_replace("-qu’Allâh l’agrée-", "رضي الله عنه", $h);
//        $h = str_replace("-sallâ l-Lahû ‘aleyhi wa sallam-", "صَلَّى اللّٰهُ عَلَيْهِ وَسَلَّمَ", $h);
        $h = str_replace("-sallâ l-Lahû ‘aleyhi wa sallam-", "&lt;img class='saw'/&gt;", $h);
        $tmp = preg_split('/[\.]/', $h);
        $i = 0;
        foreach ($tmp as $t) {
            if (substr($t, 0, strlen(" »")) === " »")
                $tmp[$i - 1] .= " »";
            if ($t !== " »") {
                $tmp[$i] = $t . ".";
                $tmp[$i] = str_replace(" »\n", "", $t);
                $tmp[$i] = str_replace("» ", "", $tmp[$i]);
//                $tmp[$i] = str_replace("&err;", "?", $tmp[$i]);
//                $tmp[$i] = str_replace("&dot;", ".", $tmp[$i]);
                $tmp[$i] = trim($tmp[$i]);
                $i++;
            } else {
                unset($tmp[$i]);
            }

        }
        $a[] = [
            "id_title" => \App\Helpers::my_array_index($key, $keys),
            "text"     => $tmp,
            "report"   => \App\Helpers::getReport($ht['report']),
        ];
//        $a[$key] = explode('.', $h);
    }


    foreach ($keys as $i => $key) {
        echo "INSERT INTO hadith_title(id, title, `next`) VALUES($i, \"$key\", 0);<br>";
    }

    echo "<br><br>";

    foreach ($a as $h) {
        $index = 0;
        echo "INSERT INTO hadith(id_hadith_title, id_line, french, report, is_title) VALUES(" . $h['id_title'] . ", " . $index++ . ", \"" . $keys[$h['id_title']] . "\", \"" . $h['report'] . "\", 1);<br>";
        foreach ($h['text'] as $t)
            if (trim($t) !== "»" && trim($t) !== '')
                echo "INSERT INTO hadith(id_hadith_title, id_line, french, report, is_title) VALUES(" . $h['id_title'] . ", " . $index++ . ", \"$t\", \"" . $h['report'] . "\", 0);<br>";
    }

//    var_dump($a);
//    var_dump($a[count($a) - 2]);

//    $data = (new Data([
//        'keys'    => $keys,
//        'hadiths' => $a,
//    ]))->getData();
//
//    return view('test', compact('data'));

});*/