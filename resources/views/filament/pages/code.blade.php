<x-filament-panels::page>
    <div class="grid  gap-4">
        @foreach($this->content as $content)

            <x-bladewind::card class="w-full" radius="large">
                <x-bladewind::button.circle size="regular"  color="green" icon="document-duplicate"></x-bladewind::button.circle>
                <div class="space-y-3">
                    <h2 style="color: #115b33;" class="text-lg text-center font-semi-bold">
                        {{ $content->title }}
                    </h2>
                    <div  class=" max-w-none">
                        {!! \Illuminate\Support\Str::markdown($content->content) !!}
                    </div>
                </div>
            </x-bladewind::card>
        @endforeach
    </div>
</x-filament-panels::page>
