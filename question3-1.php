<?php
// 標準出力の取得
$input = fgets(STDIN);
$input_time = explode(":",$input);

$hour = $input_time[0] <= 12 ? $input_time[0] : $input_time[0] - 12;
$minute = $input_time[1];

if ($hour >= 25 || $minute >= 60 ) {
        echo  "正しく入力してください";
        return;
}
// 長針と短針の角度を取得
$degHour = $hour * (360 / 12) + $minute * (360 / 12 / 60);
$degMinute = $minute * (360 / 60);
// 角度の差を取得
$angle = abs($degHour - $degMinute);
$angleResult = $angle <= 180 ? $angle : 360 - $angle;

echo  "長針と短針のなす角度は、${angleResult}度です。";

?>
