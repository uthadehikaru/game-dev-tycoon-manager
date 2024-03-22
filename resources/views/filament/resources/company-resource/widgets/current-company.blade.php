<x-filament-widgets::widget>
    <x-filament::section>
        <label for="company">Current Company : </label>
        <select wire:model.live="current" wire:loading.attr="disabled"
        class="border rounded dark:bg-gray-900 dark:text-gray-950">
            @foreach ($companies as $id=>$name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    </x-filament::section>
</x-filament-widgets::widget>
