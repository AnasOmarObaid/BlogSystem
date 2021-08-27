<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <h1 class="text-center font-bold text-xl">LOGIN TO OUR WEBSITE</h1>
            <form action=@route('login.store') method="post" class="mt-10">
                @csrf

                {{-- username --}}
                <div class="mb-6">
                    <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        username
                    </label>
                    <input type="text" name="username"   class="border border-gray-400 p-2 w-full @error('username') is-invalid @enderror"  value="@old('username')"/>
                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- password --}}
                <div class="mb-6">
                    <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        password
                    </label>
                    <input type="password" name="password" class="border border-gray-400 p-2 w-full  @error('password') is-invalid @enderror" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- btn for submit --}}
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
