<div
    x-data="{
        state: @entangle('state').live,
        init() {
            Livewire.on('modal.open', ({component, arguments}) => {
                this.state.show = true;
                this.state.component = component;
                this.state.arguments = arguments;
            })
        }
    }"
    x-show="state.show" x-cloak
    class="relative z-10" area-labelledby="modal-title" role="dialog" aria-model="true"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0">
    <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex items-end justify-center min-h-full text-center p4 sm:items-center sm:p-0">
            <div class="relative lg:max-w-[60rem] px-4 pt-5 pb-4 text-left transition-all transform bg-white rounded-lg shadow-xl overlow-hidden sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                {{ $slot }}
            </div>
        </div>
</div>