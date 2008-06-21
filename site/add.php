<?php
if ($_POST["quote"] && $_POST["who"]) {
  require_once("../models/Base.php");
  require_once("../models/Quote.php");
  
  $quote = new Quote;
  
  $quote->newQuote($_POST["who"], strip_tags($_POST["quote"]));
  
  $message = "Your quote has been added, thank you. " . $_POST["who"];
}
?>
<?php
$title = "Add a quote";
require "header.php";
?>

<?php if ($message) { ?>
<h1><?php echo $message ?></h1>
<?php } ?>

<?php require "form.php"; ?>

<?php
require "footer.php";
?>