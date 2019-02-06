var assert = require('assert');
var PokerHand = require('../pokerHand.js');

/**
 * test
 */
describe('Rank a Royal Flush', function() {
  it('Return royal flush when hand given', function() {
    var hand = new PokerHand('As Ks Qs Js 10s');
    assert.equal(hand.getRank(), 'Royal Flush');
  });
});

/**
 * test
 */
describe('Rank a Pair', function() {
  it('Return one pair when hand given', function() {
    var hand = new PokerHand('Ah As 10c 7d 6s');

    assert.equal(hand.getRank(), 'One Pair');
  });
});

/**
 * test
 */
describe('Rank Two Pair', function() {
  it('Return two pair when hand given', function() {
    var hand = new PokerHand('Kh Kc 3s 3h 2d');

    assert.equal(hand.getRank(), 'Two Pair');
  });
});

/**
 * test
 */
describe('Rank A Flush', function() {
  it('Return flush when hand given', function() {
  var hand = new PokerHand('Kh Qh 6h 2h 9h');

    assert.equal(hand.getRank(), 'Flush');
  });
});

// More tests go here

/**
 * test again for flush
 */
describe('Rank A Flush', function() {
  it('Return flush when hand given', function() {
  var hand = new PokerHand('Kc 10c 6c 3c 9c');
  
    assert.equal(hand.getRank(), 'Flush');
  });
});

/**
 * test for straight 
 */
describe('Rank A Straight', function() {
  it('Return straight when hand given', function() {
  var hand = new PokerHand('5c 6h 7d 8c 9s');
  
    assert.equal(hand.getRank(), 'Straight');
  });
});

/**
 * test for straight flush
 */
describe('Rank A Straight Flush', function() {
  it('Return straight flush when hand given', function() {
  var hand = new PokerHand('5c 6c 7c 8c 9c');
  
    assert.equal(hand.getRank(), 'Straight Flush');
  });
});



/**
 * test for short hand
 */
describe('Handle a short hand', function() {
  var hand = new PokerHand('Kh Qh 6h 2h');

  it('Return "Not a hand!" when short hand given', function() {
    assert.equal(hand.getRank(), 'Not a hand!');
  });
});

/**
 * test for long hand
 */
describe('Handle a long hand', function() {
  var hand = new PokerHand('Kh Qh 6h 2h 9h 8c');

  it('Return "Not a hand!" when long hand given', function() {
    assert.equal(hand.getRank(), 'Not a hand!');
  });
});

/**
 * test for malformed string
 */
describe('Handle a malformed string', function() {
  var hand = new PokerHand('KhQh6h 2h');

  it('Return "Not a hand!" when malformed string given', function() {
    assert.equal(hand.getRank(), 'Not a hand!');
  });
});

/**
 * test for three of a kind
 */
describe('Rank Three of a Kind', function() {
  it('Return three of a kind when hand given', function() {
    var hand = new PokerHand('10h 10c 10s 3h 2d');

    assert.equal(hand.getRank(), 'Three of a Kind');
  });
});

/**
 * test for four of a kind
 */
describe('Rank Four of a Kind', function() {
  it('Return four of a kind when hand given', function() {
    var hand = new PokerHand('Kh Kc Ks 3h Kd');

    assert.equal(hand.getRank(), 'Four of a Kind');
  });
});




/**
 * test for full house
 */
describe('Rank Full House', function() {
  it('Return three of a kind when hand given', function() {
    var hand = new PokerHand('10h 10c 10s 2h 2d');

    assert.equal(hand.getRank(), 'Full House');
  });
});


/**
 * test for high card
 */
describe('Rank High Card', function() {
  it('Return high card when hand given', function() {
    var hand = new PokerHand('Kh Js 10c 6h 3d');

    assert.equal(hand.getRank(), 'High Card');
  });
});



