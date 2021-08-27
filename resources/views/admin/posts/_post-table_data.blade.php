<x-tables.panel>
    <x-tables.table>
        <x-tables.thead>
            <x-tables.th name="title" />
            <x-tables.th name="body" />
            <x-tables.th name="Published" />
            <x-tables.th name="Author" />
            <x-tables.th name="Category" />
            <x-tables.th name="Action" />
        </x-tables.thead>
        <x-tables.tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    <a href="@route('admin.posts.show', [$post->slug])"> {{ $post->title }}</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ Str::limit($post->body, 50, '.....') }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            publiched
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold  text-green-800">
                            {{ $post->author->full_name }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $post->category->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="@route('admin.posts.edit', [$post])"
                            class="text-indigo-600 hover:text-indigo-900">Edit</a> |
                        <form action="@route('admin.posts.destroy', $post)" method="POST" style="display: inline-block">
                            @csrf
                            @method("DELETE")
                            <button type="submit" style="color: red">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-tables.tbody>
    </x-tables.table>
</x-tables.panel>
