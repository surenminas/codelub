<?php

namespace App\View\Composers;

use App\Models\Post;
use Illuminate\View\View;

class PostComposer
{
    /**
     * Create a new post composer.
     */
    public function __construct(protected Post $posts)
    {
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('postCount', $this->posts->count());
    }
}
