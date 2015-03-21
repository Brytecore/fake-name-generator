<?php
/**
 * Example uses of the Fake Name Generator
 */

namespace Brytecore;

include_once "namegen.php";

$name = new NameGen();
?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://rawgit.com/Brytecore/pwn/master/dist/css/pwn.min.css">
	<link rel="stylesheet" type="text/css" href="example.css">
	<title>Pwn components</title>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="pwn-xs-12">
					<h2>Fake Name Generator - Examples</h2>
					<p>
						Example uses of the brytecore.NameGen class. Refresh this page to regenerate the
						example results.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="pwn-xs-12">
				<h3>First Name + Short Random Last Name</h3>
				<ul>
<?php
		for ( $i = 0; $i < 5; $i ++ ) {
			echo "<li>{$name->firstName()} {$name->randomWord( 3, 6 )}</li>";
			echo "\n\t\t\t\t\t";
		}
?>
				</ul>
				<div class="syntax">
<code>
$name = new NameGen();<br>
<?php echo htmlentities( 'echo $name->firstName() . " " . $name->randomWord( 3, 6 );' ); ?>
</code>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="pwn-xs-12">
				<h3>Adjective + First Name + Medium Random Last Name</h3>
				<ul>
<?php
					for ( $i = 0; $i < 5; $i ++ ) {
						echo "<li>{$name->adjective()} {$name->firstName()} {$name->randomWord( 5, 8 )}</li>";
						echo "\n\t\t\t\t\t";
}
?>
				</ul>
				<div class="syntax">
<code>
$name = new NameGen();<br>
<?php echo htmlentities( 'echo $name->adjective() . " " . $name->firstName() . " " . $name->randomWord( 5, 8 );' ); ?>
</code>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="pwn-xs-12">
				<h3>Adjective + Long Random Last Name</h3>
				<ul>
<?php
					for ( $i = 0; $i < 5; $i ++ ) {
						echo "<li>{$name->adjective()} {$name->randomWord( 9, 12 )}</li>";
						echo "\n\t\t\t\t\t";
					}
?>
				</ul>
				<div class="syntax">
<code>
$name = new NameGen();<br>
<?php echo htmlentities( 'echo $name->adjective() . " " . $name->randomWord( 9, 12 );' ); ?>
</code>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="pwn-xs-12">
					<ul>
						<li><a href="https://github.com/brytecore/fake-name-generator">Fake Name Generator on Github</a></li>
						<li><a href="http://www.brytecore.com">Code Maintained by Brytecore</a></li>
						<li><a href="">Free for your Use - See License</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php

