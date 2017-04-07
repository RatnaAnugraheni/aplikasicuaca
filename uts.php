<h1>Suatu kondisi di suatu wilayah</h1>
<?php
$json_string = file_get_contents("http://api.wunderground.com/api/8933eac1e54aee69/conditions/q/CA/San_Francisco.json");
$parsed_json = json_decode ($json_string);
$city = $parsed_json->{'current_observation'}->{'display_location'}->{'full'};
$name = $parsed_json->{'current_observation'}->{'display_location'}->{'state_name'};
$loc = $parsed_json->{'current_observation'}->{'display_location'}->{'longitude'};
$lat = $parsed_json->{'current_observation'}->{'display_location'}->{'latitude'};

echo "Kota : ${city}<br>
 Nama Negara: ${name}<br>
Garis Bujur: ${loc}<br>
Garis Lintang : ${lat}";
?>
<h1>Cuaca dalam 2 hari kedepan</h1>
<?php
$json_string = file_get_contents("http://api.wunderground.com/api/8933eac1e54aee69/forecast10day/q/CA/San_Francisco.json");
$parsed_json = json_decode ($json_string);

$waktu = $parsed_json->{'forecast'}->{'txt_forecast'}->{'date'};
$title = $parsed_json->{'forecast'}->{'txt_forecast'}->forecastday[0]->{'title'};
$ket = $parsed_json->{'forecast'}->{'txt_forecast'}->forecastday[0]->{'fcttext'};
$info = $parsed_json->{'forecast'}->{'txt_forecast'}->forecastday[0]->{'fcttext_metric'};

$title2 = $parsed_json->{'forecast'}->{'txt_forecast'}->forecastday[1]->{'title'};
$ket2 = $parsed_json->{'forecast'}->{'txt_forecast'}->forecastday[1]->{'fcttext'};
$info2 = $parsed_json->{'forecast'}->{'txt_forecast'}->forecastday[1]->{'fcttext_metric'};

echo
"Waktu : ${waktu}<br>
Hari: ${title}<br>
Keterangan Cuaca : ${ket}<br>
Informasi Cuaca Pada Hari ini : ${info}<br>
<b>Periode 1</b><br>
Hari : ${title2}<br>
Keterangan Cuaca : ${ket2}<br>
Informasi Cuaca Pada Hari ini : ${info2}";
?>
<h1>Informasi Suhu Udara</h1>
<?php
$json_string = file_get_contents("http://api.wunderground.com/api/8933eac1e54aee69/planner_07010731/q/CA/San_Francisco.json");
$parsed_json = json_decode ($json_string);
$ket = $parsed_json->{'trip'}->{'chance_of'}->{'tempoversixty'}->{'description'};
$min = $parsed_json->{'trip'}->{'temp_high'}->{'min'}->{'F'};
$min2 = $parsed_json->{'trip'}->{'temp_high'}->{'min'}->{'C'};
$max = $parsed_json->{'trip'}->{'temp_high'}->{'max'}->{'F'};
$max2 = $parsed_json->{'trip'}->{'temp_high'}->{'max'}->{'C'};
echo
"<b>Suhu Maksimum</b><br>
Dalam Farenheit : ${max}<sup>o</sup>F<br>
Dalam Celcius : ${max2}<sup>o</sup>c<br>
<b>Suhu Minumum</b><br>
Dalam Farenheit : ${min}<sup>o</sup>F<br>
Dalam Celcius: ${min2}<sup>o</sup>C<br>
Keterangan : ${ket}<br>";
?>