<?php

namespace App\View\Composers;

use App\Models\Post;
use Illuminate\View\View;

class MostPopularPostComposer
{
    /**
     * Create a new post composer.
     */
    public function __construct(
        protected Post $posts,
    ) {
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {    
        $view->with('mostPopularPosts', $this->posts->withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->take(4)->get());
	
    }
}
