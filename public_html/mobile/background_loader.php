<?php

$backgrounds = array('blue_sky_background','lake_background','city_background','palm_tree_background','pyramid_background','snow_mountain_background');

$colors = array('white','white','orange','white','blue','red');

$random_number = rand(0,(count($backgrounds)-1));

echo '
<style>
body {
  background: url(images/backgrounds/'.$backgrounds[$random_number].'.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.main_font_color {
color: '.$colors[$random_number].';
}
</style>
<meta name="theme-color" content="'.$colors[$random_number].'" />
';

?>
