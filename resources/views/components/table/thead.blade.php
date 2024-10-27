@props(['headers' => []])
<thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        @forelse ($headers as $header)
            <th scope="col" class="px-4 py-3">{{ $header}}</th>
        @empty
        @endforelse
        <th scope="col" class="px-4 py-3">
            <span class="sr-only">Actions</span>
        </th>
    </tr>
</thead>
