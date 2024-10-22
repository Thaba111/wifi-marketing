<x-filament::page>
    <div class="space-y-6">
        <h1 class="text-2xl font-semibold">System Configuration</h1>

        <form wire:submit.prevent="submit" class="space-y-4">
            {{ $this->form }}

            <div class="flex justify-end">
                <x-filament::button type="submit" class="bg-green-600 hover:bg-green-700">
                    Save Changes
                </x-filament::button>
            </div>
        </form>
    </div>
</x-filament::page>
