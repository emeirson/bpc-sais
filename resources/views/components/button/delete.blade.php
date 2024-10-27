@props(['name'])
<button
    {{ $attributes->merge(['class' => 'w-full text-left block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white']) }}>
    {{ $name }}
</button>
