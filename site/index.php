<?php
require "../models/Base.php";
require "../models/Quote.php";

$quote = new Quote;
foreach($quote->findAll() as $q) $quotes[] = array("q" => $q["quote"], "w" => $q["who"]);

$quotes_json = json_encode($quotes);
$random_quote = $quotes[rand(0, count($quotes) - 1)];

?>
<?php
require "header.php";
?>
	<h1 id="quote"><?php echo $random_quote["q"] ?></h1>
	<p>this inspires <em id="who"><?php echo $random_quote["w"] ?></em></p>
	<p id="another"><a href="/" id="another">Give me another</a></p>
	<div id="add-your-own">
	  <a href="/add.php">add your own</a>
	  <div id="add-form" style="display: none;">
	    <?php require "form.php"; ?>
	  </div>
	</div>
	<script type="text/javascript" charset="utf-8">
		function random() {
			var quote = quotes[Math.round(Math.random() * (quotes.length - 1))];
			$("#quote").html(quote.q);
			$("#who").html(quote.w);
		}
		$(function() {  
			$("#another").click(function() { random(); return(false); });
			$("#add-your-own a").click(function() { $("#add-form").toggle(); return false; });
		});
		quotes = <?php echo $quotes_json; ?>;
	</script>
	
<?php
require "footer.php";
?>