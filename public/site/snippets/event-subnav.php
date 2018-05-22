<h3><?php if (!empty($navheadertext)): ?><?= $navheadertext ?><?php else: ?><?= $page->title()->html() ?><?php endif ?></h3>

<?php

// Rearrange the array by months
$fullmonty = array();

// get all the month keys
foreach($eventroot as $key => $item)
{
  $fullmonty[$item['EStartMonth']][$key] = $item;
}

// sort them:
ksort($fullmonty, SORT_NUMERIC);

// Spit the list out
foreach ($fullmonty as $monthName => $month) {

  echo '<h3>' . $monthName . '</h3>';

  echo '<ul class="event-subnav">';
  foreach ($month as $event) {

    if (strpos(parse_url($event['ELink'], PHP_URL_HOST), 'google') !== false) {
        echo '<li><a href="#E' . $event['EID'].'" class="calpopme" href="' . $event['ELink'] . '">' . $event['ETitle'] . '</a>';

        echo '<div class="mfp-hide white-popup-block calpopcontent" id="E' . $event['EID'].'">';
        echo '<h2>' . $event['ETitle'] . '</h2>';
        echo '<p><strong>Description: </strong>' . $event['EDesc'] . '</p>';
        echo '<p><strong>Where: </strong>' . $event['ELoc'] . '</p>';
        echo '<p><strong>Start Date: </strong>' . $event['EStartDay'] . '&nbsp;' . $event['EStartMonth'] . '&nbsp;' . $event['EStartYear'] . '</p>';
        echo '<p><strong>Start Time: </strong>' . $event['EStartTime'] . '&nbsp;' . $event['EStartAMPM'] . '</p>';
        echo '<p><strong>End Date: </strong>' . $event['EEndDay'] . '&nbsp;' . $event['EEndMonth'] . '&nbsp;' . $event['EEndYear'] . '</p>';
        echo '<p><strong>End Time: </strong>' . $event['EEndTime'] . '&nbsp;' . $event['EEndAMPM'] . '</p>';
        echo '</div>';

        echo '</li>';

    } else {
        echo '<li><a href="' . $event['ELink'] . '">' . $event['ETitle'] . '</a></li>';
    }



  }
  echo '</ul>';


}

?>

<script>
$(document).ready(function() {
  $('.calpopme').magnificPopup({type:'inline'});
});
</script>
