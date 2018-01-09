<?php

  $timestamp = time();
    // # avoid execution lag
  echo "Today's date is " . date('D, d M Y', $timestamp );
  echo '<br />';
  echo "The time is " . date('H:i:s', $timestamp );
  echo '<br />';
  echo "The sun will set at aproximately " . date_sunset( $timestamp, SUNFUNCS_RET_STRING, 42.70, -71.52 );

?>
