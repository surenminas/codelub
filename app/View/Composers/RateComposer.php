<?php

namespace App\View\Composers;

use App\Models\Rate;
use Illuminate\View\View;

class RateComposer
{
    /**
     * Create a new post composer.
     */
    public function __construct(protected Rate $rates)
    {
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('rates', $this->rates->all());
    }
}
