class PokerHand {
  constructor(cards) {
      //Confirm that hand submitted is a string.
      //Store cards in array to check number and 
      //suit individually.
      this.cardsArray = typeof cards === 'string' ? cards.split(" ") : null;
  }
  
  getCardValues(cards, prop){
      let cardValues = cards.map(function(card){
        if( prop === 'ranks' ){
          let value = card.length === 3 ? card.slice(0,2) : card[0];
          return value;
        }

        if( prop === 'suits' ){
          let value = card.length === 3 ? card.slice(2) : card[1];
          return value;
        }
      //Need to handle illegal two-digit numbers and malformed cards E.G. 12c or 7cc
    });
    return cardValues;
  }

  occurrencesOf(values){
    let a = [], b = [], prev;
    values.sort();
    for( var i = 0; i < values.length; i++ ) {
      if ( values[i] !== prev ) {
        a.push(values[i]);
        b.push(1);
      } else {
        b[b.length-1]++;
      }
             prev = values[i];
    }    
    return [a, b];
  }

  isFlush(){
    let suits = this.getCardValues(this.cardsArray, 'suits');

    let filteredSuits = suits.filter(function(item, pos) {
      return suits.indexOf(item) === pos;
    })

    return filteredSuits.length === 1 ? true : false;


  }


    
  getRank() {
    //define string to hold hand ranking stays High Card if none of the below conditions are met
    let resultString = "High Card";

    //Handle malformed string  or incomplete hand with message
    if( this.cardsArray.length !== 5 || this.cardsArray === null ){
        return "Not a hand!";
    }
    
    //
    let ranks = this.getCardValues(this.cardsArray, 'ranks');

    let rankOccurances = this.occurrencesOf(ranks);

    // Implement poker hand ranking
    switch(rankOccurances[1].sort().join('')){
        case '1112':
              resultString = "One Pair";
              break;
        case '122':
              resultString = "Two Pair";
              break;
        case "113":
              resultString = "Three of a Kind";
              break;
        case "23":
              resultString = "Full House";
              break;
        case "14":
              resultString = "Four of a Kind";
              break;
    }

    if( this.isFlush() ){
      resultString = "Flush";    
    } 

    if( ranks.sort().join('') === "10AJKQ"  && this.isFlush()){
      resultString = "Royal Flush";
    }
    return resultString;
  }
}

module.exports = PokerHand;
