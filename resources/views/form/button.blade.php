<button
    type="button"
    class="px-4 py-2 rounded-md {{ $confirm ? 'bg-blue-600 text-white' : 'bg-gray-300 text-black' }} {{ $ghost ? 'border border-gray-300 bg-transparent' : '' }}"
    onclick="{{ $onClick }}">
    {{ $label }}
</button>
