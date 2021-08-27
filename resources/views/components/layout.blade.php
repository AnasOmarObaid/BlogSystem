<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('app.css') }}">

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="{{ route('post.index') }}">
                    <img src="{{ asset('images/logo.svg') }}" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0">

                @auth
                    <form action="@route('logout')" method="post" style="display: inline-block">
                        @csrf
                        <input type="submit" value="logout"
                            style="background: #fff;font-size: 13px;color: #3b82f6;cursor: pointer;">
                    </form>
                @else
                    <a href="@route('register.create')" class="text-xs font-bold uppercase">Register</a> |
                    <a href="@route('login.create')" class="text-xs font-bold uppercase">Login</a>
                @endauth

                <a href="#subscribe"
                    class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="subscribe"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-10">
            <img src="{{ asset('images/lary-newsletter-icon.svg') }}" alt="" class="mx-auto -mb-6"
                style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="@route('subscribe.subscribe')" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <div>
                                <label for="email" class="hidden lg:inline-block">
                                    <img src="{{ asset('images/mailbox-icon.svg') }}" alt="mailbox letter">
                                </label>

                                <input id="email" name="email" type="text" placeholder="Your email address"
                                    value="@old('email')"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    <x-alerts.success />

</body>
