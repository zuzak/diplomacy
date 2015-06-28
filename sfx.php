<?php
header('Content-type: audio/wav');

$name = "nope";
if ( isset($_GET["name"])) {
  $data = json_decode(file_get_contents('people.json'));
  foreach($data as $sound) {
    if($sound->sound == $_GET["name"]) {
      $name = $sound->sound;
      break;
    }
  }
}
$name = escapeshellarg($name);
passthru("espeak $name --stdout", $data);
//echo $data;
