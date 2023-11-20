<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('main.index');
// });

// Route::get('/', function () {
//     return view('');
// })->middleware(['auth', 'verified'])->name('main.index');

Route::get('/', [App\Http\Controllers\Main\MainController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['namespace' => 'App\Http\Controllers\Contact', 'prefix' => 'contact'], function () {
    Route::get('/', [App\Http\Controllers\Contact\ContactController::class, 'index'])->name('contact.index');
    Route::post('/', [App\Http\Controllers\Contact\ContactController::class, 'store'])->name('contact.store');
});



Route::group(['namespace' => 'App\Http\Controllers\Search', 'prefix' => 'search'], function () {
    Route::get('/', [App\Http\Controllers\Search\SearchController::class, 'index'])->name('search.index');
});

Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {
    Route::get('/', [App\Http\Controllers\Post\PostController::class, 'index'])->name('post.index');
    Route::get('/{post}', [App\Http\Controllers\Post\PostController::class, 'show'])->name('post.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comment'], function () {
        Route::post('/', [App\Http\Controllers\Post\Comment\CommentController::class, 'store'])->name('post.comment.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/like'], function () {
        Route::post('/', [App\Http\Controllers\Post\Like\LikeController::class, 'store'])->name('post.like.store');
    });
});

Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
    Route::get('/', [App\Http\Controllers\Category\CategoryController::class, 'index'])->name('category.index');

    Route::group(['namespace' => 'Post', 'prefix' => '{category}'], function () {
        Route::get('/', [App\Http\Controllers\Category\Post\CategoryController::class, 'index'])->name('category.post.index');
    });
});

Route::group(['namespace' => 'Album', 'prefix' => 'albums'], function () {
    Route::get('/', [App\Http\Controllers\Album\AlbumController::class, 'index'])->name('album.index');

    Route::group(['namespace' => 'Gallery', 'prefix' => '{album}'], function () {
        Route::get('/', [App\Http\Controllers\Album\Gallery\GalleryController::class, 'index'])->name('album.gallery.index');
    });
});

Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth']], function () {

    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [App\Http\Controllers\Personal\Main\MainController::class, 'index'])->name('personal.main.index');
    });

    Route::group(['namespace' => 'Like', 'prefix' => 'like'], function () {
        Route::get('/', [App\Http\Controllers\Personal\Like\LikeController::class, 'index'])->name('personal.like.index');
        Route::delete('/{post}', [App\Http\Controllers\Personal\Like\LikeController::class, 'destroy'])->name('personal.like.delete');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function () {
        Route::get('/', [App\Http\Controllers\Personal\Comment\CommentController::class, 'index'])->name('personal.comment.index');
        Route::get('/{comment}', [App\Http\Controllers\Personal\Comment\CommentController::class, 'edit'])->name('personal.comment.edit');
        Route::patch('/{comment}', [App\Http\Controllers\Personal\Comment\CommentController::class, 'update'])->name('personal.comment.update');
        Route::delete('/{comment}', [App\Http\Controllers\Personal\Comment\CommentController::class, 'destroy'])->name('personal.comment.delete');
    });
});






//||||||||||||||||
//     Admin    ||
//||||||||||||||||


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {


    // Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {

    //     Route::group(['namespace' => 'Main'], function () {
    //         Route::get('/', [App\Http\Controllers\Admin\Personal\Main\MainController::class, 'index'])->name('admin.personal.main.index');
    //     });

    //     Route::group(['namespace' => 'Like', 'prefix' => 'like'], function () {
    //         Route::get('/', [App\Http\Controllers\Admin\Personal\Like\LikeController::class, 'index'])->name('admin.personal.like.index');
    //         Route::delete('/{post}', [App\Http\Controllers\Admin\Personal\Like\LikeController::class, 'destroy'])->name('admin.personal.like.delete');
    //     });

    //     Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function () {
    //         Route::get('/', [App\Http\Controllers\Admin\Personal\Comment\CommentController::class, 'index'])->name('admin.personal.comment.index');
    //         Route::get('/{comment}', [App\Http\Controllers\Admin\Personal\Comment\CommentController::class, 'edit'])->name('admin.personal.comment.edit');
    //         Route::patch('/{comment}', [App\Http\Controllers\Admin\Personal\Comment\CommentController::class, 'update'])->name('admin.personal.comment.update');
    //         Route::delete('/{comment}', [App\Http\Controllers\Admin\Personal\Comment\CommentController::class, 'destroy'])->name('admin.personal.comment.delete');
    //     });
    // });


    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Main\MainController::class, 'index'])->name('admin.main.index');
    });



    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function () {
        // Route::resource( 'post', App\Http\Controllers\Admin\Post\PostController::class, ['as' => 'admin.']);

        Route::get('/', [App\Http\Controllers\Admin\Post\PostController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [App\Http\Controllers\Admin\Post\PostController::class, 'create'])->name('admin.post.create');
        Route::post('/', [App\Http\Controllers\Admin\Post\PostController::class, 'store'])->name('admin.post.store');
        Route::get('/{post}', [App\Http\Controllers\Admin\Post\PostController::class, 'show'])->name('admin.post.show');
        Route::get('/edit/{post}', [App\Http\Controllers\Admin\Post\PostController::class, 'edit'])->name('admin.post.edit');
        Route::patch('/{post}', [App\Http\Controllers\Admin\Post\PostController::class, 'update'])->name('admin.post.update');
        Route::delete('/{post}', [App\Http\Controllers\Admin\Post\PostController::class, 'destroy'])->name('admin.post.destroy');


        Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comment'], function () {
            Route::get('/', [App\Http\Controllers\Admin\Post\Comment\CommentController::class, 'index'])->name('admin.post.comment.index');
            Route::delete('/{comment}', [App\Http\Controllers\Admin\Post\Comment\CommentController::class, 'destroy'])->name('admin.post.comment.delete');
        });
    });

    Route::get('/search', [App\Http\Controllers\Admin\SearchController::class, 'search'])->name('admin.search');

    Route::group(['namespace' => 'Album', 'prefix' => 'album'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Album\AlbumController::class, 'index'])->name('admin.album.index');
        Route::get('/create', [App\Http\Controllers\Admin\Album\AlbumController::class, 'create'])->name('admin.album.create');
        Route::post('/', [App\Http\Controllers\Admin\Album\AlbumController::class, 'store'])->name('admin.album.store');
        Route::get('/edit/{album}', [App\Http\Controllers\Admin\Album\AlbumController::class, 'edit'])->name('admin.album.edit');
        Route::patch('/{album}', [App\Http\Controllers\Admin\Album\AlbumController::class, 'update'])->name('admin.album.update');
        Route::delete('/{album}', [App\Http\Controllers\Admin\Album\AlbumController::class, 'destroy'])->name('admin.album.destroy');
    });


    Route::group(['namespace' => 'Gallery', 'prefix' => 'galleries'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Gallery\GalleryController::class, 'index'])->name('admin.gallery.index');
        Route::get('/create', [App\Http\Controllers\Admin\Gallery\GalleryController::class, 'create'])->name('admin.gallery.create');
        Route::post('/', [App\Http\Controllers\Admin\Gallery\GalleryController::class, 'store'])->name('admin.gallery.store');
        Route::get('/edit/{gallery}', [App\Http\Controllers\Admin\Gallery\GalleryController::class, 'edit'])->name('admin.gallery.edit');
        Route::patch('/{gallery}', [App\Http\Controllers\Admin\Gallery\GalleryController::class, 'update'])->name('admin.gallery.update');
        Route::delete('/{gallery}', [App\Http\Controllers\Admin\Gallery\GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Category\CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [App\Http\Controllers\Admin\Category\CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/', [App\Http\Controllers\Admin\Category\CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{category}', [App\Http\Controllers\Admin\Category\CategoryController::class, 'show'])->name('admin.category.show');
        Route::get('/edit/{category}', [App\Http\Controllers\Admin\Category\CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/{category}', [App\Http\Controllers\Admin\Category\CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/{category}', [App\Http\Controllers\Admin\Category\CategoryController::class, 'destroy'])->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Tag\TagController::class, 'index'])->name('admin.tag.index');
        Route::get('/create', [App\Http\Controllers\Admin\Tag\TagController::class, 'create'])->name('admin.tag.create');
        Route::post('/', [App\Http\Controllers\Admin\Tag\TagController::class, 'store'])->name('admin.tag.store');
        Route::get('/{tag}', [App\Http\Controllers\Admin\Tag\TagController::class, 'show'])->name('admin.tag.show');
        Route::get('/edit/{tag}', [App\Http\Controllers\Admin\Tag\TagController::class, 'edit'])->name('admin.tag.edit');
        Route::patch('/{tag}', [App\Http\Controllers\Admin\Tag\TagController::class, 'update'])->name('admin.tag.update');
        Route::delete('/{tag}', [App\Http\Controllers\Admin\Tag\TagController::class, 'destroy'])->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', [App\Http\Controllers\Admin\User\UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [App\Http\Controllers\Admin\User\UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [App\Http\Controllers\Admin\User\UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}', [App\Http\Controllers\Admin\User\UserController::class, 'show'])->name('admin.user.show');
        Route::get('/edit/{user}', [App\Http\Controllers\Admin\User\UserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/{user}', [App\Http\Controllers\Admin\User\UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [App\Http\Controllers\Admin\User\UserController::class, 'destroy'])->name('admin.user.delete');
    });


    Route::group(['namespace' => 'Rate', 'prefix' => 'rates'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Rate\RateController::class, 'index'])->name('admin.rates.index');
        Route::get('/create', [App\Http\Controllers\Admin\Rate\RateController::class, 'create'])->name('admin.rates.create');
        Route::post('/', [App\Http\Controllers\Admin\Rate\RateController::class, 'store'])->name('admin.rates.store');
        Route::get('/edit/{rate}', [App\Http\Controllers\Admin\Rate\RateController::class, 'edit'])->name('admin.rates.edit');
        Route::patch('/{rate}', [App\Http\Controllers\Admin\Rate\RateController::class, 'update'])->name('admin.rates.update');
        Route::delete('/{rate}', [App\Http\Controllers\Admin\Rate\RateController::class, 'destroy'])->name('admin.rates.destroy');

        Route::get('/rates-update', [App\Http\Controllers\Admin\Rate\RateController::class, 'updateRateData'])->name('admin.rates.updateRateData');
    });
});



require __DIR__ . '/auth.php';
