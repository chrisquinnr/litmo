<?php

require_once 'Core.php';

$core = new Core();

$sentences['crimenpunsum']['title'] = 'Crimen Punsum';
$sentences['crimenpunsum']['real_title'] = 'Crime and Punishment';
$sentences['crimenpunsum']['anchor'] = 'crimenpunsum';
$sentences['crimenpunsum']['quote'] = $core->getSentence('source/pg2554.txt');

$sentences['talemtwosum']['title'] = 'Tailem Twosum';
$sentences['talemtwosum']['real_title'] = 'A Tail of Two Cities';
$sentences['talemtwosum']['anchor'] = 'tailemtwosum';
$sentences['talemtwosum']['quote'] = $core->getSentence('source/pg98.txt');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>Litmo - because life's too short for Lorem</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/jumbotron-narrow.css" rel="stylesheet">

</head>

<body>

<div class="container">
	<div class="header">
		<nav>
			<ul class="nav nav-pills pull-right">
				<li role="presentation" class="active"><a href="#">Home</a></li>
				<li role="presentation"><a href="#">About</a></li>
				<li role="presentation"><a href="#">Contact</a></li>
			</ul>
		</nav>
		<h3 class="text-muted">Litmo</h3>
	</div>

	<div class="jumbotron">
		<h1>Litmo</h1>
		<p class="lead">Life's too short for Lorem Ipsum. Get interesting filler for your website, now. It's as easy as copy paste, or use our API. <br/><br/>Help banish Lorem forever.</p>
		<p><a class="btn btn-lg btn-success" href="#crimenpunsum" role="button">Get Litmo</a></p>
	</div>

	<div class="row marketing">
		<div class="col-lg-6">
			<h4>No ads</h4>
			<p>You're getting your placeholder text from a site with <em>ads</em>? Jeez.</p>

			<h4>Interesting</h4>
			<p>What the hell does all that latin mean?. Turns out its sorta weird.</p>

			<h4>Unique</h4>
			<p>No client of yours is going to be turned off by dull placeholder text!</p>
		</div>

		<div class="col-lg-6">
			<h4>Simple copypasta...</h4>
			<p>Head on down to the samples below. Copy / paste. Then go away.</p>

			<h4>... or use our powerful API</h4>
			<p>Oh, now this is cool. Check this out. No more blank pages!</p>

			<h4>We need six headings</h4>
			<p>Run out of things to say? Like we have here? Your worries are at an end.</p>
		</div>
	</div>
	<div class="row marketing">
		<?php
			foreach ($sentences as $s){ ?>
				<hr/>
				<a name ='<? echo $s['anchor'] ?>'></a>
				<h2><? echo $s['title'] ?></h2>
				<p><em><? echo $s['real_title']; ?></em></p>
				<p class="well">
					<? echo $s['quote'] ?>
				</p>
			<? }
		?>
	</div>




	<footer class="footer">
		<p>&copy; Company 2014</p>
	</footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
