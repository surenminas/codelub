<div class="col-md-4 sidebar" data-aos="fade-left">
    <div class="search">
        <div class="d-flex justify-content-center h-100">
            {{-- <div class="searchbar">
                <form action="{{ route('search.index') }}" method="GET">
                    <input class="search_input" type="text" name="s" placeholder="Search...">
                    <button class="search_icon"><i class="fas fa-search"></i></button>
                </form>

            </div> --}}
        </div>
    </div>

    <div class="widget widget-post-list">
        <h5 class="widget-title">Most Popular Posts</h5>
        <ul class="post-list">
            @foreach ($mostPopularPosts as $post)
                <li class="post">
                    <a href="{{ route('post.show', $post->slug) }}" class="post-permalink media">
                        <img src="{{ asset('storage/image/' . $post->image_preview) }}" alt="blog post">
                        <div class="media-body">
                            <h6 class="post-title webkit-line-clamp">{{ $post->title }}</h6>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="widget widget-post-list">

        <h5>Exchange rates</h5>
        <div class="table_rate pb-3 c">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th colspan="3">
                            <div class="text-center">
                                <span>{{ date('d.m.Y') }}</span>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <span>Currency</span>
                        </td>
                        <td>
                            <span>AMD</span>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rates as $rate)
                        <tr>
                            <td>{{ $rate->currency }}</td>
                            <td>{{ $rate->exchange_rate }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
