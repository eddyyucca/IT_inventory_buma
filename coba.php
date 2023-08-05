<?php

/**
 * @file
 * Show the status of various Apple TVs.
 */

// Place Ping.php in the same folder as this script.
require_once('pages/layout/ping.php');

use JJG\Ping as Ping;

// Define a list of servers to check. Each item in the array is one server; the
// key is the title of the server, and the value is the ip address or host name
// that will be checked.
$servers_to_check = array(
  'www.google.com',
  'www.apple.com',
  'www.yahoo.com',
  '10.10.0.1',
  '10.10.0.2',
  '10.10.0.3',
  '10.10.0.4',
  '192.168.30.164', 
  '10.10.0.2',// Define as many as you'd like.
);

// Print a tite for the page.
print '<h1 class="title">' . 'Server Status Page' . '</h1>';
// Begin an unordered list.
print '<ul class="server-list">' . "\r\n";
// Loop through the servers defined above, and print the status of each.
foreach ($servers_to_check as $name => $address) {
  // Begin the list definition.
  print '<li class="server"><span class="server-name">' . $name . '</span>';
  // Ping the server, and print an up or down status. You can use CSS to hide
  // the 'Up' or 'Down' text and replace it with a graphic like a red or green
  // status indicator.
  $ping = new Ping($address);
  $latency = $ping->ping();
  if ($latency) {
    print '<span style="color:green;">Up</span>';
  }
  else {
    print '<span  style="color:red;">Down</span>';
  }

  // End the list item definition.
  print '</li>';
}

// End the unordered list.
print '</ul>';

?>