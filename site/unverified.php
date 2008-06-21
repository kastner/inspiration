<?php
require_once("../models/Base.php");
require_once("../models/Quote.php");

$quote = new Quote;

$quotes = $quote->findUnverified();
?>

<?php
$title = "Unverified quotes";
require "header.php";
?>

<ul>
	<?php foreach($quotes as $q) { ?>
	<li><em><?php echo $q["quote"]; ?></em> by <span><?php echo $q["who"]; ?></span></li>
	<?php } ?>
</ul>

<?php
require "footer.php";
?>