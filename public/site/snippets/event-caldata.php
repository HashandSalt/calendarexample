<?php
require_once 'vendor/autoload.php';

$currentdatetime = date('Y-m-d');

$client = new Google_Client();
$client->setAuthConfigFile(c::get('gcalcreds'));
$client->addScope(Google_Service_Calendar::CALENDAR_READONLY);
$calendarId = c::get('gcalid');
$service = new Google_Service_Calendar($client);

// Google Cal Events
$gcalevents = $service->events->listEvents($calendarId);



// var_dump($gcalevents);
$gcaleventlist = array ();

foreach ($gcalevents->getItems() as $gcalendarData) {

  $gstart = $gcalendarData->start->dateTime;
  $gend = $gcalendarData->end->dateTime;

  $gstartHumanDay = date("d",strtotime($gstart));
  $gstartHumanMonth = date("F",strtotime($gstart));
  $gstartHumanYear = date("Y",strtotime($gstart));
  $gstartHumanTime = date("g",strtotime($gstart));
  $gstartHumanAMPM = date("a",strtotime($gstart));

  $gendHumanDay = date("d",strtotime($gend));
  $gendHumanMonth = date("F",strtotime($gend));
  $gendHumanYear = date("Y",strtotime($gend));
  $gendHumanTime = date("g",strtotime($gend));
  $gendHumanAMPM = date("a",strtotime($gend));

  $geventdatetime = date('Y-m-d', strtotime($gstart));

  if ($geventdatetime >= $currentdatetime)
  {
    $gcaleventlist[] = array(
      'ETitle' => $gcalendarData->getSummary(),
      'EStart' => $gstart,
      'EEnd' => $gend,
      'EStartDay' => $gstartHumanDay,
      'EStartMonth' => $gstartHumanMonth,
      'EStartYear' => $gstartHumanYear,
      'EStartTime' => $gstartHumanTime,
      'EStartAMPM' => $gstartHumanAMPM,
      'EEndDay' => $gendHumanDay,
      'EEndMonth' => $gendHumanMonth,
      'EEndYear' => $gendHumanYear,
      'EEndTime' => $gendHumanTime,
      'EEndAMPM' => $gendHumanAMPM,
      'EDesc' => $gcalendarData->getDescription(),
      'ELink' => $gcalendarData->getHtmlLink(),
      'EID' => $gcalendarData->getId(),
      'ESum' => $gcalendarData->getSummary(),
      'ELoc' => $gcalendarData->getLocation(),
      'ESrc' => 'gcalev',
  );

  }

}

// Kirby Events
$kirbyevents = $site->find("events")->children()->visible();

$kcaleventlist = array ();

  foreach ($kirbyevents as $kcalendarData) {

  $kstartdate = $kcalendarData->startdate();
  $kstarttime = $kcalendarData->starttime();
  $kenddate = $kcalendarData->enddate();
  $kendtime = $kcalendarData->endtime();

  $kstartisoDate = date('Y-m-d\TH:i:s', strtotime("$kstartdate $kstarttime"));
  $kendisoDate = date('Y-m-d\TH:i:s', strtotime("$kenddate $kendtime"));

  $kstartHumanMonth = date("F",strtotime($kstartisoDate));
  $kstartHumanYear = date("Y",strtotime($kstartisoDate));

  $ktitle = $kcalendarData->title()->value();


  $keventdatetime = date('Y-m-d', strtotime($kstartdate));

  if ($keventdatetime >= $currentdatetime)
  {
    $kcaleventlist[] = array(
      'ETitle' => $ktitle,
      'EStart' => $kstartisoDate,
      'EEnd' => $kendisoDate,
      'ELink' => $kcalendarData->url(),
      'EStartMonth' => $kstartHumanMonth,
      'EStartYear' => $kstartHumanYear,
      'EID' => $kcalendarData->uid(),
      'ESrc' => 'kcalev',
    );
  }




  }

// Output the result...
$allevents = array_merge($kcaleventlist, $gcaleventlist);
$chronos = $allevents;
//var_dump($chronos);


?>
