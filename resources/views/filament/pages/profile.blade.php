<x-filament-panels::page>
    <x-filament-panels::form wire:submit="updateProfile">
        {{ $this->form }}
        <x-filament-panels::form.actions 
            :actions="$this->getUpdateProfileFormActions()"
        />
    </x-filament-panels::form>
</x-filament-panels::page>
