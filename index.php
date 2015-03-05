<?php
require_once 'Core.php';

$core = new Core();

$sentences = $core->getData('all');

$site_name = sprintf(
	"%s://%s%s",
	isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	$_SERVER['SERVER_NAME'],
	$_SERVER['REQUEST_URI']
);
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
<script>
	function copyToClipboard(text) {
		window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
	}
</script>
<div class="container">
	<div class="header">
		<nav>
			<ul class="nav nav-pills pull-right">
				<li role="presentation" class="active"><a href="#">Home</a></li>
				<li role="presentation"><a href="#about">About</a></li>
				<li role="presentation"><a href="#faq">FAQ</a></li>

			</ul>
		</nav>
		<h3 class="text-muted">Litmo</h3>
	</div>

	<div class="jumbotron">
		<h1>Litmo</h1>
		<p class="lead">Life's too short for Lorem Ipsum. Get interesting filler for your website, now. It's as easy as copy paste, or use our API. <br/><br/>Help banish Lorem forever.</p>
		<p><a class="btn btn-lg btn-success" href="#samples" role="button">Get Litmo</a></p>
	</div>
	<div>
		<p class="alert alert-success">
			<a href="https://github.com/chrisquinnr/litmo/">Check out this project on Github</a>
		</p>
	</div>
	<div class="row marketing">
		<div class="col-lg-6">
			<h4>No ads</h4>
			<p>You're getting your placeholder text from a site with <em>ads</em>? Jeez.</p>

			<h4>Interesting</h4>
			<p>What the hell does all that latin mean? Turns out its <a href='http://www.lipsum.com/'>sorta weird.</a></p>

			<h4>Unique</h4>
			<p>No client of yours is going to be turned off by dull placeholder text!</p>
		</div>

		<div class="col-lg-6">
			<h4>Simple copypasta...</h4>
			<p>Head on down to the <a href="#samples">samples below</a>. Copy / paste. Then go away.</p>

			<h4>... or use our powerful API</h4>
			<p>Oh, now this is cool. <a href="#api">Check this out</a>. No more blank pages!</p>

			<h4>We need six headings</h4>
			<p>Run out of things to say? Like we have here? Your worries are at an end.</p>
		</div>
	</div>
	<div class="row marketing">

		<hr/>
		<a name="api"></a>
		<h2>API</h2>

			<h3>How to:</h3>
			<p>
				It's as simple as:
			</p>
				<pre><?php echo $site_name; ?>api/?action=litmo</pre>
			<p>
				Which returns a random string from a random classic novel.
			</p>
			<p>
				Or, if you want something specific, choose a text from our library.
			</p>
				<pre><?php echo $site_name; ?>api/?action=id&id=1</pre>
			<p class="alert alert-info">
				Bear in mind we're not Gutenberg. If you want to get clever, go ahead and fork this project and find a way of making <em>that</em> happen, because that would be even more awesome.
			</p>
			<br/>
		<h3>What the hell would I use this for?</h3>

			<small></small>
			<p>
				Mainly for wireframes / "greysites" / prototypes / mockups. See, Lorem Ipsum screams <em>unfinished</em>, whereas some real, albeit random, text gives the impression of a living, breathing entity.
			</p>
			<p>
				Makes most sense if you're using templates expecting to load content within the context of a CMS. So, typically, you could test to see if any content will be output, and if not, grab some Litmo.<br/><br/> For example:
			</p>
			<pre>if(strlen($content < 1)){
	echo file_get_contents('<?php echo $site_name; ?>api/?action=litmo');
}
</pre>
			<br/>
		<h3>Coming soon</h3>
			<p>
				> Pass the API a character limit and it will cap the return for you, which I guess could be handy for testing apps that pump out content to twitter.
			</p>
			<p>
				> Offer options to strip quotes and other non alphanumeric chars
			</p>


	</div>
	<div class="row marketing">
		<a name="samples"></a>
		<h2>Samples!</h2>
		<?php
			foreach ($sentences as $s){ ?>
				<hr/>
				<a name ='<? echo $s['anchor'] ?>'></a>
				<h3><? echo $s['title'] ?></h3>
				<p><em><? echo $s['real_title']; ?></em></p>
				<p><small>1. Click the text below<br/>
						2. Ctrl + C  &nbsp;/&nbsp;  Cmd + C to copy<br/>
						3. Hit enter</small></p>
				<p class="well">
					<textarea cols="80" rows="8" onclick="copyToClipboard(this.value)"><?php echo preg_replace( "/\r|\n/", "", $core->getSentence($s['source'])) ?></textarea>
				</p>
			<?php }
		?>
	</div>
	<div class="row marketing">
		<hr/>
		<a name="about"></a>
		<h2>About</h2>
		<p>
			My name is Chris Quinn, find me on <a href="https://www.linkedin.com/in/chrisquinnr">LinkedIn</a>, <a href="http://q.branded.me">my landing page</a> or <a href="https://twitter.com/chrisquinnr">Twitter</a>. I'm the tech lead at an advertising agency in Bath, UK and a general developer of web things, from sites to fully fledged RIAs. This project is something I do in any spare time left over at the end of the day <small>which may explain a lot</small>.
		</p>
	</div>
	<div class="row marketing">
		<hr/>
		<a name="faq"></a>
		<h2>FAQ</h2>
			<h3>Could you add "Title I really want"?</h3>
				<p>No. I might open up a vote based system for adding new stuff later, but the current roster is at my discretion to avoid copyright wrangles and being swamped by requests for the Karma Sutra.</p>

			<h3>Your code is awful</h3>
				<p>Yes, but that's not a question. Pull requests welcome.</p>

			<h3>I have a feature request!</h3>
				<p>Hooray!</p>

			<h3>I've already seen this app done before</h3>
				<p>Probably. I just made this for fun :) I have no doubt wiser and better coders have made something like this in FORTRAN or in Biscuit.js or whatever the newest JS "framework" is.</p>

			<h3>Ewww, PHP?</h3>
				<p>Haters gonna hate. I actually like PHP. Proud to say so.</p>

	</div>


	<footer class="footer">
		<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Litmo</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="https://limitless-sea-7817.herokuapp.com" property="cc:attributionName" rel="cc:attributionURL">Chris Quinn</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>.
	</footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
