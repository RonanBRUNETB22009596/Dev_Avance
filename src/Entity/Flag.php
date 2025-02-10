<?php

namespace App\Entity;

class Flag
{
    private $id;
    private $country;
    private $correctAnswer;
    private $choices = [];

    public function __construct($country, $correctAnswer, $choices)
    {
        $this->country = $country;
        $this->correctAnswer = $correctAnswer;
        $this->choices = $choices;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function getCorrectAnswer(): string
    {
        return $this->correctAnswer;
    }

    public function setCorrectAnswer(string $correctAnswer): self
    {
        $this->correctAnswer = $correctAnswer;
        return $this;
    }

    public function getChoices(): array
    {
        return $this->choices;
    }

    public function setChoices(array $choices): self
    {
        $this->choices = $choices;
        return $this;
    }
}