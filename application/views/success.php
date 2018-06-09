<?php
if (isset($_GET['name'])) {
  echo "<h1>Success</h1><br>";
  $name = $_GET['name'];
  $results = json_decode($_GET['results']);

  if (empty($results->getItems())) {
      print "No upcoming events found.\n";
  } else {
      print "Upcoming events:\n";
      foreach ($results->getItems() as $event) {
          $start = $event->start->dateTime;
          if (empty($start)) {
              $start = $event->start->date;
          }
          printf("%s (%s)\n", $event->getSummary(), $start);
      }
  }
}
