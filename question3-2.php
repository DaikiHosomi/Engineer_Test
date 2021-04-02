<?php
// 標準出力の取得
$input = fgets(STDIN);
$input_dates = array_filter(explode(" ",$input));

function getZodiacSign($Y, $m, $d) {
    $zodiacs = array(
        array('Aries',  3, 21,  4, 19),
        array('Taurus',  4, 20,  5, 20),
        array('Gemini',  5, 21,  6, 21),
        array('Cancer',  6, 22,  7, 22),
        array('Leo',  7, 23,  8, 22),
        array('Virgo',  8, 23,  9, 22),
        array('Libra',  9, 23, 10, 23),
        array('Scorpio',   10, 24, 11, 22),
        array('Sagittarius', 11, 23, 12, 21),
        array('Capricorn', 12, 22,  1, 19),
        array('Aquarius',  1, 20,  2, 18),
        array('Pisces',    2, 19,  3, 20)
    );
    
    foreach($zodiacs as $zodiac){
        list($zodiac_name, $start_month, $start_day, $end_month, $end_day) = $zodiac;
        if(
            ($m == $start_month && $d >= $start_day) || ($m == $end_month && $d <= $end_day)
        ){
            return $zodiac_name;
        }
    }
    return false;
}

function getJapaneseZodiac($Y) {
    //西暦で表す値で12で割れるのは2016年。2016年の申年を配列の先頭[0]とし順番に格納する
    $JapaneseZodiacs = array("申","酉","戌","亥","子","丑","寅","卯","辰","巳","午","未");
    $index = $Y % 12;
    
    return $JapaneseZodiacs[$index];
}

for($i = 0; $i < count($input_dates); $i ++) {
    list($Y, $m, $d) = explode('/', $input_dates[$i]);
    if (checkdate($m, $d, $Y) === true) {
            echo $input_dates[$i]," ".getZodiacSign($Y, $m, $d)." ".getJapaneseZodiac($Y);
            echo "<br>";
    } else {
        echo '存在しない日付です。';
    }
}

?>