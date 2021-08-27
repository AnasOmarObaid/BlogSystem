<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <h1 class="text-center font-bold text-xl">REGISTER TO OUR WEBSITE</h1>
            <form action=@route('register.store') method="post" class="mt-10">
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

                {{-- full name --}}
                <div class="mb-6">
                    <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        full name
                    </label>
                    <input type="text" name="full_name" class="border border-gray-400 p-2 w-full  @error('full_name') is-invalid @enderror" value="@old('full_name')"/>
                    @error('full_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- email --}}
                <div class="mb-6">
                    <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        email
                    </label>
                    <input type="email" name="email" class="border border-gray-400 p-2 w-full @error('email') is-invalid @enderror" value="@old('email')"/>
                    @error('email')
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

                {{-- confirm password --}}
                <div class="mb-6">
                    <label for="" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        confirm password
                    </label>
                    <input type="password" name="password_confirmation" class="border border-gray-400 p-2 w-full" />
                </div>

                {{-- btn for submit --}}
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
