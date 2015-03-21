<?php

namespace brytecore;

require_once "firstnames.php";
require_once "randomword.php";
require_once "adjectives.php";

/**
 * Class NameGen
 *
 * Object to create random names using commons firstnames, adjectives and/or random fake words.
 */
class NameGen {

	/**
	 * Generate a random first name from the most common US names.
	 *
	 * @return string
	 */
	function firstName() {
		global $first_names;

		$total = count($first_names );
		$index = rand( 0, $total - 1 );
		return  ucfirst( strtolower($first_names[$index] ) );
	}

	/**
	 * Generate a random, non-offensive adjective.
	 *
	 * @return string
	 */
	function adjective() {
		global $adjectives;

		$total = count($adjectives);
		$index = rand(0, $total - 1);
		return ucfirst(strtolower($adjectives[$index]));
	}

	/**
	 * Generate a random, pronounceable word.
	 *
	 * @param int $minLength
	 * @param int $maxLength
	 *
	 * @return string
	 */
	function randomWord( $minLength = 5, $maxLength = 10) {
		return ucfirst( random_pronounceable_word( rand( $minLength, $maxLength ) ) );
	}

}

