<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="flex justify-center">
        <button wire:click="decrement">-</button>
        <span class="px-4">{{ $count }}</span>
        <button wire:click="increment">+</button>
    </div>
</div>
