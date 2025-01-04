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
                    <form action="{{ route('game_maker_next.editnextupdate', ['prev_id' => $game_maker->next_id, 'title' => $game_maker->title]) }}"  method="post" class="mt-6 space" enctype="multipart/form-data">
                        @csrf
                                <input  type="text" name="title" class="input input-bordered w-full max-w-xs" value="{{ $title }}" />

                        <div class = "bg-white text-black mt-4">
                            <textarea id="summernote" class="text-black bg-white mt-4" name="editorjs" >{{ $game_maker->editorjs }}</textarea>
                        </div>

                        <div class="mt-4">
                            <h2 class="text-lg font-semibold leading-tight text-white-800">원하는 문제의 형태를 선택하세요</h2>

                            <select name="select" value="{{ $game_maker->select }}" id="select" class="block w-full py-4 mt-10 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:border-gray-600 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 dark:focus:ring-opacity-50">
                                        <option value="0" >문제 유형 선택</option>
                                        <option value="1"  >5지선다</option>
                                        <option value="2" >3지선다</option>
                                        <option value="3" >ox문제</option>
                                        <option value="4" >다답형</option>
                                        <option value="5" >주관식</option>
                            </select>
                        </div>
                        <br>

                        <input hidden name="prev_id" value="">

                        <div id="input_area"></div>

                        <div class="flex flex-auto mt-4">

                          @if ( $game_maker->next_id == 0)
                          <a href="{{ route('dashboard') }}" type="submit" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out bg-red-600 rounded-lg px- hover:bg-red-500 focus:outline-none focus:shadow-outline-violet active:bg-red-600">
                            {{ '종료하기' }}
                          </a>
                          @else
                                <div class="justify-between flex flex-auto">

                                    <button type="submit" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out rounded-lg bg-violet-600 hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                                        {{ '다음 페이지로 가기' }}
                                    </button>
                                </div>
                          @endif
                    </form>


                </div>
            </div>
        </div>
    </div>
    <script text="text/javascript">
        window.onload = function() {
            var select = document.getElementById('select');
            var value = {{ $game_maker->select }};

            var game_maker = []
            {{--game_maker = JSON.stringify({{ $game_maker }});--}}
            console.log(game_maker);


            if (value === 1) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-label for="title" :value="__('5지선다')" />

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        문제 <input name='question' value='{{ $game_maker->question }}'  id='question' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
      </p>

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        1. <input name='check1' value='{{ $game_maker->answer1 }}' id='check1' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="radio" name='radio1' id='radio1' onchange="handleChange(this) class='radio radio-primary'
            @if($game_maker->choice1)
                value="1" checked
            @endif
                " class="ml-5" >
      </p>

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        2. <input name='check2' value='{{ $game_maker->answer2 }}' id='check2'  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="radio" name="radio2" id="radio2" onchange="handleChange(this)
           @if($game_maker->choice2)
                value="2" checked
           @endif" class="ml-5">
      </p>

      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
        3. <input name='check3' value='{{ $game_maker->answer3 }}' id='check3' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']"}>
          <span class="ml-4">정답</span>
           <input type="radio" name="radio3" id="radio3" onchange="handleChange(this)
           @if($game_maker->choice3)
                value="3" checked
            @endif
                " class="ml-5">
           </p>

           <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
             4. <input name='check4' value='{{ $game_maker->answer4 }}' id='check4' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="radio" name="radio4" id="radio4" onchange="handleChange(this)
           @if($game_maker->choice4)
                value="4" checked
@endif
                " class="ml-5">
           </p>

           <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
             5. <input name='check5' value='{{ $game_maker->answer5 }}' id='check5' class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']">
          <span class="ml-4">정답</span>
           <input type="radio" name="radio5" id="radio5" onchange="handleChange(this)
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
        document.getElementById('select').addEventListener('change', function() {
            var select = document.getElementById('select');
            var value = select.options[select.selectedIndex].value;
            if(value == 1) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-5radio name="radio" id="radio" required autofocus />
                `;
            } else if(value == 2) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-3radio name="radio" id="radio" required autofocus />
                `;
            } else if(value == 3) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-2radio name="radio" id="radio" required autofocus />
                `;
            } else if(value == 4) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-5checkbox name="radio" id="radio" required autofocus />
                `;
            } else if(value == 5) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-one-answer name="radio" id="radio" required autofocus />
                `;
            }
        });




    </script>
</x-app-layout>
