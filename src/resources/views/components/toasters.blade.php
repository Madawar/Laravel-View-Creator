<div x-cloak x-data="toaster()" x-init="init()" x-on:livewire-toaster.window="trigger"
    class="fixed bottom-0 right-0 flex flex-col max-w-sm p-4 space-y-3 w-80">

    <template x-for="(toast,index) in toasters" :key="index">

        <div x-show="toasters.indexOf(toast) >= 0" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-50"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-50">

            <div class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                :class="toast.type">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <template x-if="toast.type == 'success'">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </template>
                    <template x-if="toast.type == 'info'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </template>
                    <template x-if="toast.type == 'error'">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </template>
                </div>
                <span x-html="toast.message" class="ml-3 text-sm font-normal"></span>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-success" aria-label="Close" x-on:click="close(toast)"
                    x-show="toast.persistent">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

        </div>

    </template>

</div>

<script>
    function toaster() {
        return {
            toasters: [],
            flash: JSON.parse(JSON.stringify(@json(session('livewire.toaster')))),
            trigger(event = null) {
                if (event == null) return;
                this.flash = event.detail ? event.detail : event;
                let toast = {
                    type: this.flash.type,
                    message: this.flash.message,
                    persistent: this.flash.persistent,
                    timeout: this.flash.timeout
                }
                this.toasters.push(toast)
                if (!toast.persistent) {
                    this.autoClose(toast)
                }
            },
            autoClose(toast) {
                setTimeout(() => {
                    this.close(toast)
                }, toast.timeout);
            },
            close(toast) {
                this.toasters.splice(this.toasters.indexOf(toast), 1)
            },
            init() {
                if (this.flash) {
                    this.trigger(this.flash)
                }
            },
        }
    }
</script>
