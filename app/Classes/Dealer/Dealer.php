<?php

namespace CardGames\Classes\Dealer;

use CardGames\Classes\Deck\Deck;

class Dealer
{

    public $deck;
    public $card;

    public function setDeck($deck = null)
    {
        if ($deck) {
            $this->deck = $deck;
        } else {
            $this->deck = (new Deck())->cards;
        }

        return $this;
    }

    public function getDeck()
    {
        return $this->deck;
    }

    public function shuffle()
    {
        shuffle($this->deck);

        return $this;
    }

    public function pickCard(string $rank = null, string $suit = null)
    {
        if($rank === null && $suit === null){
            $card = array_shift($this->deck);

            $this->card = $card;

            $reject = array_filter($this->deck, function($value) use($card){
                return $value !== $card;
            });
            $this->deck = array_values($reject);

            return $this;
        }

        $filter = array_filter($this->deck, function($value) use($rank, $suit){
            return $value['rank'] === $rank && $value['suit'] === $suit;
        });
        $this->card = array_values($filter)[0];

        $card = $this->card;
        $reject = array_filter($this->deck, function($value) use($card){
            return $value !== $card;
        });
        $this->deck = array_values($reject);

        return $this;
    }

    public function getCard()
    {
        return $this->card;
    }
}
