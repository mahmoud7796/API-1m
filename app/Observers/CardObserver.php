<?php

namespace App\Observers;

use App\Models\Card;

class CardObserver
{
    public function deleted(Card $card)
    {
        $card->contact()->detach();
    }
}
