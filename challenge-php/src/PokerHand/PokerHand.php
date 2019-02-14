<?php

namespace PokerHand;

class PokerHand
{
	private $cards_array = array();

	/**
	  * Utilize array index to store card ranks
	 **/
	private $rank_index = array('2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'K', 'Q', 'A');
	//private $suits = array('s', 'c', 'h', 'd');


    public function __construct( $hand )
    {

 	/**Confirm that hand submitted is a string.
      *Store cards in array to check number and 
      *suit individually.
    **/
 		$this->cards_array = ( gettype($hand) === 'string' ) ? explode(" ", $hand) : null;


    }

	/**
	* get_ranks and get_suits both test for 3 character strings  
	* to account for the 10 cards E.G. '10c' or '10s'  
	**/ 
    protected function get_ranks( $card ){

    	return strlen ( $card ) === 3 ? substr( $card , 0 , 2) : $card[0];

    }

    protected function get_suits( $card ){

    	return strlen ( $card ) === 3 ? substr( $card , -1 ) : $card[1];
    }

    protected function occurrences_of($values){

    	$counted_values = array_values(array_count_values($values));

    	sort($counted_values, SORT_NUMERIC);

    	//return string in order to make strict comparisons 
    	return implode( '', $counted_values );

    }

    protected function is_flush(){

    	$suits = array_map( array( $this, 'get_suits' ), $this->cards_array );

    	if (count(array_unique($suits)) === 1 && !empty($suits)){

    		return true;

    	}else{

    		return false;

    	}
    }

    protected function sorted_ranks($arr){

    	sort($arr);
    	return implode("", $arr);


    } 

    //lookup the index for each card rank
    protected function index_lookup($elem){

    	return array_search($elem, $this->rank_index);
    }


    protected function is_straight($ranks){
    	$card_indexes = array_map(array($this, 'index_lookup'), $ranks);
    	$truth_index = array();
    	
    	sort($card_indexes);

    	for ($i=0; $i < count($card_indexes) ; $i++) { 
	    	if ($card_indexes[$i] === $card_indexes[$i+1] -1  || $i === count($card_indexes) -1){

	    		$truth_index[] = true;

	    	}else{

	    			$truth_index[] = false;

	    	}
    	}

    	$the_truth = array_unique($truth_index);
    	
    	return $the_truth[0] === true && count($the_truth) === 1 ? true : false;



    } 


    public function getRank(){

    	//define string to hold hand ranking stays High Card if none of the below conditions are met.
    	$result_string = "High Card";

    	$ranks = array_map( array( $this, 'get_ranks' ), $this->cards_array );

    	$rank_occurrences = $this->occurrences_of($ranks);

    	


    	switch ($rank_occurrences){
   			case '1112':
   			    $result_string = "One Pair";
   			    break;
   			case '122':
   			    $result_string = "Two Pair";
   			    break;
   			case "113":
		    	$result_string = "Three of a Kind";
		    	break;
   			case "23":
		    	$result_string = "Full House";
		    	break;
   			case "14":
   			    $result_string = "Four of a Kind";
   			    break;   
		}

		if ($this->sorted_ranks($ranks) === "10AJKQ" && $this->is_flush() ){

			$result_string = "Royal Flush";

		} elseif ( $this->is_straight($ranks) && $this->is_flush()){

			$result_string = "Straight Flush";

		} elseif ( $this->is_flush() ){

			$result_string = "Flush";

		} elseif ( $this->is_straight($ranks) ){
			
			$result_string = "Straight";
			
		}else{

			$result_string;

		}

			return $result_string;

        
    }

    /**
    * Utility Functions
    */ 

}