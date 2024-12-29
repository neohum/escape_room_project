<x-app-layout>
    {{-- Header section with 'Edit' or 'Create' depending on the existence of $task --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{-- Use 'Edit' for edit mode and 'Create' for create mode --}}
            {{ __('방탈출 게임 만들기') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Form for task creation/updation with file upload --}}
                    <form method="post" action="{{ route('game.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf {{-- CSRF protection --}}
            
                        <div>
                            <x-input-label for="title" value="게임 제목" /> {{-- Label for task content --}}
                            <x-text-input id="title" name="title" type="text" class="block w-full mt-1" required autofocus /> {{-- Input field for task content --}}
                            <x-input-error class="mt-2" :messages="$errors->get('title')" /> {{-- Display validation errors for task content --}}
                        </div>
                        <div>
                            <x-input-label for="description" value="게임 설명" /> {{-- Label for task content --}}
                            <x-text-input id="description" name="description" type="text" class="block w-full mt-1" required autofocus /> {{-- Input field for task content --}}
                            <x-input-error class="mt-2" :messages="$errors->get('description')" /> {{-- Display validation errors for task content --}}
                        </div>

                        <x-input-label for="image" value="Info File" /> {{-- Label for info file --}}
                            <label class="block mt-2">
                                <span class="sr-only">Choose file</span> {{-- Screen reader text --}}
                                <input type="file" id="image" name="image" accept=".jpg,.jpeg,.gif,.JPEG,.JPG,.GIF,.png" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 " /> {{-- File input field --}}
                            </label>

                        {{-- Save and Cancel Buttons --}}
                        <div class="flex items-center gap-2">
                            <x-primary-button>{{ __('Save') }}</x-primary-button> {{-- Primary button for saving --}}
                            <x-secondary-button onclick="history.back()">{{ __('Cancel') }}</x-secondary-button> {{-- Secondary button for canceling --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>