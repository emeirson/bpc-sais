@props(['collections', 'column', 'display', 'placeholder'])
<select
    {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500']) }}>

    <option>{{ $placeholder }}</option>
    @foreach ($collections as $item)
        <option @selected(old($column) == $item->id) value="{{ $item->id }}">
            {{ $item->$display }}
        </option>
    @endforeach

</select>
