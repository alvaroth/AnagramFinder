<?php

$input = ["eat", "bat", "tan", "ate", "nat", "tea"];
$output = null;

$counted_occurence_array = countCharacterOccurence($input);
$sorted_array = recursiveKsort($counted_occurence_array);
$result = findCharacterOccurenceMatch($sorted_array);
print_r($result);

/**
 * @param $word_list
 * @return array
 */
function countCharacterOccurence($word_list)
{
    foreach ($word_list as $word) {
        foreach (array_unique(str_split($word)) as $char) {
            $counter = substr_count($word, $char);
            $output[$word][$char] = $counter;
        }
    }
    return $output;
}

/**
 * @param $sorted_array
 * @return array
 */
function findCharacterOccurenceMatch($sorted_array)
{
    foreach ($sorted_array as $key => $char_array) {
        foreach ($sorted_array as $target_key => $target) {
            if ($target == $char_array && $key != $target_key) {
                $anagrams[$key][] = $target_key;
            }
        }
    }
    return $anagrams;
}

/**
 * @param $unsorted_array
 * @return array|mixed
 */
function recursiveKsort($unsorted_array)
{
    if (is_array($unsorted_array)) {
        ksort($unsorted_array);
        foreach ($unsorted_array as $key => $unsorted_sub_array) {
            $unsorted_array[$key] = recursiveKsort($unsorted_sub_array);
        }
    }
    return $unsorted_array;
}