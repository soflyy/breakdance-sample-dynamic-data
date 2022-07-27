<?php

use Breakdance\DynamicData\StringField;
use Breakdance\DynamicData\StringData;

class BreakdanceString extends StringField
{

    /**
     * @inheritDoc
     */
    public function label()
    {
        return 'Breakdance Move';
    }

    /**
     * @inheritDoc
     */
    public function category()
    {
        return 'Breakdance Field';
    }

    /**
     * @inheritDoc
     */
    public function slug()
    {
        return 'breakdance_move';
    }

    /**
     * @inheritDoc
     */
    public function handler($attributes): StringData
    {
        return StringData::fromString($this->getBreakdancingMove());
    }

    /**
     * Returns a random Breakdancing move name
     *
     * @return string
     */
    public function getBreakdancingMove()
    {
        $breakdancingMoves = [
            'Toprock',
            'Side-Step',
            'Boyoing',
            'Power Step',
            'Power Step Hop',
            'Latin Rock',
            '2 step',
            '3 step',
            '4 step',
            '5 step',
            '6 step',
            '7 step',
            '8 step',
            '10 step',
            '12 step',
            'Zulu Spins',
            'Kick-outs',
            'Spindle',
            'Swapping',
            'Shuffles',
            'Coffee Grinder',
            'Coin Drop',
            'Knee Drop',
            'Other Knee Drop',
            'Sweep Drop',
            'Thread Drop',
            'Corkscrew',
            'Scissors',
            'Belly Swim',
            'Body Glide',
            'Side Slide',
            'Figure 4',
            'Flare',
            'Swipe',
            'Windmill',
            'Back Spin',
            'Side Spin',
            'Halos',
            'Head Spin',
            'Head Slides',
            'Baby Freeze',
            'Air Chair',
            'Side Chair',
            'Elbow Freeze',
            'Dead Freeze',
            'Shoulder Freeze',
            'G-Kick',
            'Head Stand',
            'Hollowback',
            'Pike',
            'Flag',
            'Front Headflip',
            'Back Headflip',
            'Hard Drive',
            'Pencil Spin',
            'Suicide Rubberband',
            'Suicide Corkscrew',
            'Coin Drop',
        ];

        return $breakdancingMoves[array_rand($breakdancingMoves)];
    }
}
