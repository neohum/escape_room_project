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
                    <h3 class="mb-4 text-lg font-semibold leading-tight text-white-800">컨텐츠 생성 화면</h3>

                    <!-- Table to display uncompleted tasks -->
                    <form action="{{ route('game_next_edit.first_update', ['id' => $game_maker->id]) }}"  method="POST" class="mt-6 space" enctype="multipart/form-data">

                        @csrf
                        <div class="bg-slate-800 text-white ">

                            <h1 class="mt-4">활동명 </h1>
                            <input type="text" name="title" class="input input-bordered w-full max-w-xs" value="{{ $game_maker->title }}" disabled/>


                        </div>
                        <div class = "bg-white text-black mt-4">
                            <textarea id="summernote" class="text-black bg-white mt-4" name="editorjs">{{ $game_maker->editorjs }}</textarea>
                        </div>
                        <div id="input_area"></div>
                        <br>
                        {{ $game_maker->select }}
                        <input hidden name="prev_id" value="{{ $game_maker->prev_id }}">
                        <input hidden name="next_id" value="{{ $game_maker->next_id }}">

                        <div class="flex flex-auto mt-4">

                        </div>

                        <div class="justify-between flex flex-auto">

                            <button type="submit" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out rounded-lg bg-violet-600 hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                                {{ '저장하기' }}
                            </button>

                            <a href="{{ route('game_next_edit.edit', ['prev_id' => $game_maker->next_id]) }}" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out bg-violet-600 rounded-lg px- hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                                {{ '다음 페이지 편집하기' }}
                            </a>
                        </div>

                        <div class="justify-between flex flex-auto">



                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
    <script text="text/javascript" defer>
        window.onload = function() {
            var value = {{ $game_maker->select }};

            if (value === 1) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-label for="title" :value="__('5지선다')" />

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        문제 <input name='question' value='{{ $game_maker->question }}'  id='question' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
      </p>

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        1. <input name='check1' value='{{ $game_maker->answer1 }}' id='check1' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="radio" name='radio1' id='radio1'
            @if($game_maker->choice1)
                value="1" checked
            @endif
                " class="ml-5" >
      </p>

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        2. <input name='check2' value='{{ $game_maker->answer2 }}' id='check2'  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="radio" name="radio2" id="radio2"
           @if($game_maker->choice2)
                value="2" checked
           @endif" class="ml-5">
      </p>

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        3. <input name='check3' value='{{ $game_maker->answer3 }}' id='check3' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']"}>
          <span class="ml-4">정답</span>
           <input type="radio" name="radio3" id="radio3"
           @if($game_maker->choice3)
                value="3" checked
            @endif
                " class="ml-5">
           </p>

           <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
             4. <input name='check4' value='{{ $game_maker->answer4 }}' id='check4' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="radio" name="radio4" id="radio4"
           @if($game_maker->choice4)
                value="4" checked
@endif
                " class="ml-5">
           </p>

           <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
             5. <input name='check5' value='{{ $game_maker->answer5 }}' id='check5' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="radio" name="radio5" id="radio5"
           @if($game_maker->choice5)
                value="5" checked
           @endif
                " class="ml-5">
      </p>

                `;
            } else if (value === 2) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-label for="title" :value="__('3지선다')" />

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        문제 <input name='question' value='{{ $game_maker->question }}'  id='question' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
      </p>

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        1. <input name='check1' value='{{ $game_maker->answer1 }}' id='check1' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="radio" name='radio1' id='radio1'
            @if($game_maker->choice1)
                value="1" checked
            @endif
                " class="ml-5" >
      </p>

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        2. <input name='check2' value='{{ $game_maker->answer2 }}' id='check2'  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="radio" name="radio2" id="radio2"
           @if($game_maker->choice2)
                value="2" checked
           @endif" class="ml-5">
      </p>

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        3. <input name='check3' value='{{ $game_maker->answer3 }}' id='check3' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']"}>
          <span class="ml-4">정답</span>
           <input type="radio" name="radio3" id="radio3"
           @if($game_maker->choice3)
                value="3" checked
            @endif
                " class="ml-5">
      </p>
          `;
            } else if (value === 3) {
                document.getElementById('input_area').innerHTML = `
                     <x-input-label for="title" :value="__('ox문제')" />
 <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800">
        문제 <input name='question' id='question'  class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs'>
      </p>
<p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800">
    <span class="ml-4">정답 O:</span>
     <input type="radio" name='radio1' id='radio1' value="1" class="ml-5">
    <span class="ml-4">정답 X:</span>
     <input type="radio" name='radio2' id='radio2' value="2" class="ml-5">

</p>
                    `;
            } else if (value === 4) {
                document.getElementById('input_area').innerHTML = `
                      <x-input-label for="title" :value="__('다답형')" />

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex justify-item-center items-center">
        문제 <input name='question' value='{{ $game_maker->question }}'  id='question' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
      </p>

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        1. <input name='check1' value='{{ $game_maker->answer1 }}' id='check1' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="checkbox" name='radio1' id='radio1'
            @if($game_maker->choice1)
                value="1" checked
            @endif
                " class="ml-5" >
      </p>

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        2. <input name='check2' value='{{ $game_maker->answer2 }}' id='check2'  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="checkbox" name="radio2" id="radio2"
           @if($game_maker->choice2)
                value="2" checked
           @endif" class="ml-5">
      </p>

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        3. <input name='check3' value='{{ $game_maker->answer3 }}' id='check3' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']"}>
          <span class="ml-4">정답</span>
           <input type="checkbox" name="radio3" id="radio3"
           @if($game_maker->choice3)
                value="3" checked
            @endif
                " class="ml-5">
           </p>

           <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
             4. <input name='check4' value='{{ $game_maker->answer4 }}' id='check4' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="checkbox" name="radio4" id="radio4"
           @if($game_maker->choice4)
                value="4" checked
            @endif
                " class="ml-5">
           </p>

           <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
             5. <input name='check5' value='{{ $game_maker->answer5 }}' id='check5' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="checkbox" name="radio5" id="radio5"
           @if($game_maker->choice5)
                value="5" checked
           @endif
                " class="ml-5">
      </p>
                     `;
            } else if (value === 5) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-label for="title" :value="__('주관식 문제')" />
<p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800">
  문제 <input name='check1' id='check1' class ='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs'>
  <br>
  정답 <input name='radio1' id='radio1' class = 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs mt-4'>


</p>

                    `;
            }

        }






    </script>
</x-app-layout>
