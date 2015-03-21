<?php
/**
 * Create a word that uses consonants and vowels in such a way to make the word
 * pronounceable in English.
 */
function random_pronounceable_word($length = 6)
{

	// consonant sounds
	$cons = array(
		// single consonants. Beware of Q, it's often awkward in words
		'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm',
		'n', 'p', 'r', 's', 't', 'v', 'w', 'z',
		// possible combinations excluding those which cannot start a word
		'pt', 'gl', 'gr', 'ch', 'ph', 'ps', 'sh', 'st', 'th', 'wh',
	);

	// consonant combinations that cannot start a word
	$cons_cant_start = array(
		'bs',
		'ck', 'cm',
		'dr', 'ds',
		'ft',
		'gh', 'gn',
		'kr', 'ks',
		'ls', 'lt', 'lr',
		'mp', 'mt', 'ms',
		'ng', 'ns',
		'rd', 'rg', 'rs', 'rt',
		'ss',
		'ts', 'tch',
		'x',
	);

	// vowels
	$vows = array(
		// single vowels
		'a', 'e', 'i', 'o', 'u',
		// vowel combinations your language allows
		'ee', 'oa', 'oo', 'ou', 'ai', 'au',
	);

	// consonants that cannot end a word
	$cons_cant_end  = array(
		'f', 'j', 'v', 'c', 'gl', 'gr', 'dr', 'wh',
	);

	// consonants that can end a word, but cannot be contained within
	$cons_cant_contain = array(
		'y', 'que'
	);

	$vows_cant_end = array(
		'ai', 'au',
	);

	// vowels that can end a word, but cannot be contained within
	$vows_cant_contain = array(
		'y', 'ie',
	);

	$vows = array_merge( $vows, $vows_cant_contain);
	$cons = array_merge( $cons, $cons_cant_contain);

	// start by vowel or consonant ? Consonants four times more likely.
	$current = (mt_rand(0, 5) == '0' ? 'vows' : 'cons');

	$word = '';

	while (strlen($word) < $length) {

		// After first letter, use all consonant combos
		if (strlen($word) == 2)
			$cons = array_merge($cons, $cons_cant_start);

		// random sign from either $cons or $vows
		$rnd = ${$current}[mt_rand(0, count(${$current}) - 1)];

		if ( 'cons' == $current ) {
			if ( in_array($rnd, $cons_cant_contain) && $length !== strlen($word . $rnd)) {
				continue;
			}
			if ( in_array($rnd, $cons_cant_end) && $length == strlen($word . $rnd)) {
				continue;
			}
		} else {
			if (in_array($rnd, $vows_cant_contain) && $length !== strlen($word . $rnd)) {
				continue;
			}
			if (in_array($rnd, $vows_cant_end) && $length == strlen($word . $rnd)) {
				continue;
			}
		}

		// check if random sign fits in word length
		if (strlen($word . $rnd) <= $length) {
			$word .= $rnd;

			// alternate sounds
			$current = ($current == 'cons' ? 'vows' : 'cons');
		}
	}

	return $word;
}