@props(['categories'])
<form method="GET" action="{{ route('post.index') }}">
    @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
    @endif
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            Latest <span class="text-blue-500">Laravel From Scratch</span> News
        </h1>

        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
            <!--  Category -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl category-btn"
                style="cursor: pointer">
                <div class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">

                    Category
                    <svg class="transform -rotate-90 absolute pointer-events-none"
                        style="right: 12px;display:inline-flex" width="22" height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path fill="#222"
                                d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                            </path>
                        </g>
                    </svg>
                </div>

                <div class="custom-linke" style="position: absolute;top: 40px;background-color: #f3f4f6;width: 100%;text-align: start;padding: 9px 6px;font-size: smaller;font-weight: 600;border-radius: 8%;display:none;z-index:50;    max-height: 150px;
                overflow: auto;
                ">
                    <ul>
                        <li>
                            <a href="{{ route('post.index') }}"
                                style="display: block;width: 100%;cursor: pointer;color: #3a3a3a;padding: 2px; {{ !request()->category ? 'background-color:#3b82f6;color:#fff' : '' }}">all
                            </a>
                        </li>
                        @foreach ($categories as $category)
                            <li>
                                <a href="?category={{ $category->name }}{{ request('search') ? '&search=' . request('search') : '' }}"
                                    style="display: block;width: 100%;cursor: pointer;color: #3a3a3a;padding: 2px; {{ request()->category == $category->name ? 'background-color:#3b82f6;color:#fff' : '' }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{-- script to show the category --}}
            <script>
                $(".category-btn").on('click', function() {
                    $(".custom-linke").toggle();
                });
            </script>
            <!-- Other Filters -->

            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <input type="text" name="search" placeholder="Find something" value="{{ request('search') }}"
                    class="bg-transparent placeholder-black font-semibold text-sm">
            </div>
        </div>
    </header>
</form>
