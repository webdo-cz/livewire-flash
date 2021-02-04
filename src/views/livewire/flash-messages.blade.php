<div class="fixed inset-0 flex items-center justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
    <div class="flex flex-col w-full max-w-xl">
        @foreach($messages as $message)
            <div wire:ignore id="{{ $message['uid'] }}" class="z-50 flex items-center w-full px-6 py-3 mb-3 transition-opacity duration-500 bg-white shadow-lg pointer-events-auto sm:rounded-3xl">
                <div class="mr-5">
                @switch($message['type'])
                    @case("success")
                        <div class="flex items-center justify-center w-10 h-10 text-green-500 bg-green-100 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        @break
                    @case("warning")
                        <div class="flex items-center justify-center w-10 h-10 text-yellow-500 bg-yellow-100 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        @break
                    @case("error")
                        <div class="flex items-center justify-center w-10 h-10 text-red-500 bg-red-100 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        @break
                @endswitch
                </div>
                <div class="flex-grow text-gray-700">
                    <p class="font-bold">{{ $message['title'] }}</p>
                    <p class="text-sm">{{ $message['message'] }}</p>
                </div>
                <div class="ml-5">
                    <div onclick="closeFlash('{{ $message['uid'] }}')" class="flex items-center justify-center w-8 h-8 rounded-full cursor-pointer hover:bg-light-blue-100 text-light-blue-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <script>
                window.addEventListener('DOMContentLoaded', (event) => {
                    // Used on redirect
                    setTimeout(() => {
                        closeFlash('{{ $message['uid'] }}');
                    }, 5000);
                });
            </script>
        @endforeach
        <div wire:ignore>
            <script>
                window.addEventListener('DOMContentLoaded', (event) => {
                    // Used on livewire
                    Livewire.on('flashMessageAdded', data => {
                        setTimeout(() => {
                            closeFlash(data.uid);
                        }, 5000);
                    });
                });
                function closeFlash(uid) {
                    var element = document.getElementById(uid);
                    if (typeof(element) != 'undefined' && element != null)
                    {
                        element.style.opacity = '0';
                        setTimeout(() => {
                            element.outerHTML = '';
                            window.livewire.emit('closeMessage', uid);
                        }, 500);
                    }
                }
            </script>
        </div>

    </div>
</div>
