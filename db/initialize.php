<?php
require_once("../models/Base.php");
require_once("../models/User.php");
require_once("../models/Quote.php");

// $user = new User;
$user = new Base();
$quote = new Quote();
$user = new User();

var_dump($quote);
die();
$user->migrate();
// $quote->migrate();
print system("sqlite3 inspire.sqlite3 '.schema'");
system("rm inspire.sqlite3");
print "\n";
die();

if(isset($_SERVER["SERVER_NAME"])) {
	die("This script must be run from the command line.");
}

require("../db/bootstrap.php");

print "Initializing the quotes database...";

$first = $quote->findByQuote($quotes[0]["quote"]);

if ($first) {
	print (" (already filled) ");
}
else {
	foreach($quotes as $q) {
		$quote->newQuote($q["who"], $q["quote"], 1);
	}	
}

print "done\n\n";

$stdin = fopen("php://stdin", "r");

print "Let's create a new user\n";
print "Please enter the administrator's email: ";
$email = trim(fgets($stdin));

print "Administrator's password: ";
$password = trim(fgets($stdin));

$user->newUser($email, $password, 1);

fclose($stdin);
?>