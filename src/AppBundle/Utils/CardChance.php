<?php

// src/AppBundle/Utils/CardChance.php
namespace AppBundle\Utils;

/**
 * Simulates the continuous draw of cards from a deck
 */
class CardChance
{
    /**
     * Array of cards in the deck
     * 
     * @var array 
     */
    private $cards = array(
        'H2', 'H3', 'H4', 'H5', 'H6', 'H7', 'H8', 'H9', 'H10', 'HA', 'HJ', 'HQ', 'HK', 
        'S2', 'S3', 'S4', 'S5', 'S6', 'S7', 'S8', 'S9', 'S10', 'SA', 'SJ', 'SQ', 'SK', 
        'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8', 'D9', 'D10', 'DA', 'DJ', 'DQ', 'DK', 
        'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'CA', 'CJ', 'CQ', 'CK'
    );

    /**
     * Already drafted cards
     * 
     * @var array
     */
    private $drafted_cards = array();

    /**
     * Last drafted card
     * 
     * @var string 
     */
    private $last_drafted = false;

    /**
     * Get all the cards in the deck
     * 
     * @return array
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * Set the cards in the deck
     * 
     * @param array $cards
     */
    public function setCards($cards)
    {
        $this->cards = $cards;
    }

    /**
     * Draft a card and return it.
     * 
     * @return string
     */
    public function draftCard()
    {
        $remaining_cards = array_intersect($this->cards, $this->drafted_cards);

        $this->last_drafted = $remaining_cards[array_rand($remaining_cards)];

        $this->drafted_cards[] = $this->last_drafted;

        return $this->last_drafted;
    }

    /**
     * Get the chance of a single card in the next draft
     * 
     * @return float
     */
    public function getChance()
    {
        return 1 / (52 - count($this->drafted_cards));
    }

    /**
     * Get the last drafted card
     * 
     * @return string
     */
    public function getLastDraftedCard()
    {
        return $this->last_drafted;
    }
}