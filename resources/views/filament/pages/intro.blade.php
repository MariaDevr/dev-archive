<x-filament-panels::page>
    <div class="flex gap-4">
        <x-bladewind::card class="hover:shadow-gray-300 flex-1">
            @livewire(\App\Filament\Widgets\StatisticsCategories::class)
        </x-bladewind::card>

        <x-bladewind::card class="hover:shadow-gray-300 flex-1">
            <div>
                <x-bladewind::icon name="star"></x-bladewind::icon>
                <span class="text-center">Favoritos</span>
            </div>
            @php
                $favorites = $this->getFavorites();
            @endphp

            @foreach($favorites as $item)
                <li style="padding-left: 10px;" class=" py-1">
                    <a href="{{ $item->url }}" target="_blank" class="text-blue-600 hover:underline">
                        {{ $item->title }}
                    </a>
                </li>
            @endforeach
        </x-bladewind::card>

    </div>
</x-filament-panels::page>
