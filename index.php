<?php 

$unsorted_deck = array('4C','1C','4H','QD', '10C','JC','4H','4S','QH', '1S', '10D','10H','10S');

$sorted_deck = sort_card_deck($unsorted_deck);

var_dump($sorted_deck);

function sort_card_deck( $deck_to_sort ) {
    $cards = array('2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', '1');
    $suits = array('S'=>0, 'C'=>2, 'H'=>3, 'D'=>4);
    $sorted_deck = array();
    $deck_to_sort_length = count($deck_to_sort);
    foreach ( $cards as $card ) {
        for ( $i=0; $i < $deck_to_sort_length; $i++ ) { 
            if ( $card == $deck_to_sort[$i][0] && $deck_to_sort[$i][1] != '0' && $card != '10' ) {
                    $sorted_deck[$card][] = $deck_to_sort[$i];
                } else if( $card == '10' && '0' == $deck_to_sort[$i][1] ) {
                    $sorted_deck[$card][] = $deck_to_sort[$i];
            }
        } 
    }
    // show sperated cards;
    // var_dump($sorted_deck);

    foreach ($sorted_deck as $key => $card_with_suits ) {
            // If count is less than 1 it is already sorted;
            if ( count( $card_with_suits ) <= 1 ) {
                continue ;
            }
            //  get the current cards count
            $cards_count = count( $card_with_suits );
            // Selection Sort
            for ($i=0; $i < $cards_count; $i++) { 
                    $min[$i] = $card_with_suits[$i];
                    $changed = false;
                    for ($j=$i+1; $j < $cards_count; $j++) {
                        if ( $key != '10' && $suits[$min[$i][1]]  > $suits[$card_with_suits[$j][1]] ) {
                            $min['min'] = $j;
                            $changed = true;
                        } else if ($key == '10' && $suits[$min[$i][2]]  > $suits[$card_with_suits[$j][2]]){
                            $min['min'] = $j;
                            $changed = true;
                        }
                    }
                    if ( $changed == true ) {
                        $card_with_suits[$i] = $card_with_suits[$min['min']];
                        $card_with_suits[$min['min']] = $min[$i];
                    }
            }
            $sorted_deck[$key] = $card_with_suits;
    }

    return $sorted_deck;
}