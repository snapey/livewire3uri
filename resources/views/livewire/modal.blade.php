<x-modal>
    @if($state->component)
        <livewire:dynamic-component :is="$state->component" />
    @endif
</x-modal>