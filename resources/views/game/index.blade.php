{{-- we are using AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}
<x-app-layout>
    <!-- Define a slot named "header" -->
    <x-slot name="header">
        <!-- Flex container with space between elements -->
        <div class="flex justify-between">
            <!-- Title for the page -->
            <h2 class="text-xl font-semibold leading-tight text-white">
                {{ '방탈출 게임 만들기' }} <!-- Static title -->
            </h2>
            <!-- Link to add a new task -->
         </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto mb-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                     <!-- Title for uncompleted tasks -->
                    <h3 class="mb-4 text-lg font-semibold leading-tight text-white-800">방탈출 초기 화면 생성</h3>
                    <!-- Table to display uncompleted tasks -->
                    <form action="{{ route('game.store') }}" method="post" class="mt-6 space" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="title" value="게임 제목" />
                            <x-text-input id="title" name="title" type="text" class="block w-full mt-1" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                              
                        </div>
                        <div class="mt-4">
                            <x-input-label for="description" value="게임 설명" />
                         
                        </div>
                        <div class="text-black bg-white ">
                           
                          <textarea id="summernote" class="text-black bg-white" name="editorjs"></textarea>
                        </div>
                        
                        
                        <div class="mt-4">
                          <button type="submit" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out rounded-lg bg-violet-600 hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                            {{ '게임 만들기' }}
                          </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
