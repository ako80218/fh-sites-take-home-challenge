<?php
namespace PokerHand;

use PHPUnit\Framework\TestCase;

class PokerHandTest extends TestCase
{
    /**
     * @test
     */
    public function itCanRankARoyalFlush()
    {
        $hand = new PokerHand('As Ks Qs Js 10s');
        $this->assertEquals('Royal Flush', $hand->getRank());
    }

    /**
     * @test
     */
    public function itCanRankAPair()
    {
        $hand = new PokerHand('Ah As 10c 7d 6s');
        $this->assertEquals('One Pair', $hand->getRank());
    }

    /**
     * @test
     */
    public function itCanRankTwoPair()
    {
        $hand = new PokerHand('Kh Kc 3s 3h 2d');
        $this->assertEquals('Two Pair', $hand->getRank());
    }

    /**
     * @test
     */
    public function itCanRankAFlush()
    {
        $hand = new PokerHand('Kh Qh 6h 2h 9h');
        $this->assertEquals('Flush', $hand->getRank());
    }

    // TODO: More tests go here
        /**
     * @test
     */
    public function itCanRankAHighCard()
    {
        $hand = new PokerHand('Kh Js 10c 6h 3d');
        $this->assertEquals('High Card', $hand->getRank());
    }

    /**
     * @test
     */
    public function itCanRankThreeOfAKind()
    {
        $hand = new PokerHand('10h 10c 10s 3h 2d');
        $this->assertEquals('Three of a Kind', $hand->getRank());
    }

    /**
     * @test
     */
    public function itCanRankAFullHouse()
    {
        $hand = new PokerHand('10h 10c 10s 2h 2d');
        $this->assertEquals('Full House', $hand->getRank());
    }
    /**
     * @test
     */
    public function itCanRankFourOfAKind()
    {
        $hand = new PokerHand('Kh Kc Ks 3h Kd');
        $this->assertEquals('Four of a Kind', $hand->getRank());
    }
    /**
     * @test
     */
    public function itCanRankAStraight()
    {
        $hand = new PokerHand('5c 6h 7d 8c 9s');
        $this->assertEquals('Straight', $hand->getRank());
    }
    /**
     * @test
     */
    public function itCanRankAnotherStraight()
    {
        $hand = new PokerHand('8c 9h 10d Jc Ks');
        $this->assertEquals('Straight', $hand->getRank());
    }

    /**
     * @test
     */
    public function itCanRankAStraightFlush()
    {
        $hand = new PokerHand('8d 9d 10d Jd Kd');
        $this->assertEquals('Straight Flush', $hand->getRank());
    }
    /**
     * @test
     */
    public function itCanRankAnotherStraightFlush()
    {
        $hand = new PokerHand('2c 3c 4c 5c 6c');
        $this->assertEquals('Straight Flush', $hand->getRank());
    }

}