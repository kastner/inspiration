<?php
require_once("../models/Base.php");
require_once("../models/User.php");
require_once("../models/Quote.php");

$user = new User;
$quote = new Quote;

$user->migrate();
$quote->migrate();

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

print "Let's create a new user\n";
print "Please enter the administrator's email: ";
$email = trim(fgets(STDIN));

print "Administrator's password: ";
$password = trim(fgets(STDIN));

$user->newUser($email, $password, 1);
?>