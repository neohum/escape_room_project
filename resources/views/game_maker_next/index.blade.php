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
                    제목 : {{ $title }}
                    <form action="{{ route('game_maker_next.store') }}" method="post" class="mt-6 space" enctype="multipart/form-data">
                        @csrf
                        <div class="text-black bg-white ">
                          <input hidden name="title" value="{{ $title }}"/>
                          <textarea id="summernote" name="editorjs"></textarea>
                        </div>

                        <div class="mt-4">
                            <h2 class="text-lg font-semibold leading-tight text-white-800 mt-4">원하는 문제의 형태를 선택하세요</h2>

                            <select name="select" id="select" class="block w-full py-4 mt-4 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:border-gray-600 dark:focus:border-indigo-500 dark:focus:ring-indigo-500 dark:focus:ring-opacity-50">
                                <option value="0">문제 유형 선택</option>
                                <option value="1" >5지선다</option>
                                <option value="2">3지선다</option>
                                <option value="3">ox문제</option>
                                <option value="4">다답형</option>
                                <option value="5">주관식</option>

                        </select>
                        </div>
                        <br>

                        <input hidden name="prev_id" value="{{ $prev_id }}">
                        <input hidden name="title" value="{{ $title }}">
                        <div id="input_area"></div>
                        <div class="flex flex-auto justify-between mt-4">
                          <div class="flex-auto">

                              <button type="submit" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out rounded-lg bg-violet-600 hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                                {{ '다음 페이지 만들기' }}
                              </button>
                          </div>
                            <div class="text-red-600">
                                "문제 내기를 종료 하시려면 "다음 페이지 만들기"를 클릭 후 다음 페이지에서 "종료하기" 버튼을 클릭해주세요.

                            </div>
                            <div class="flex-auto">

                                <a href="{{ route('dashboard') }}" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out rounded-lg bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600">
                                    {{ '종료하기' }}
                                </a>
                            </div>





                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script text="text/javascript">
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



        $(document).on('change', "input:radio[name='radio1']", function() {
            $("#radio1").prop('checked', true).prop('required', true);
            $("#radio2").prop('checked', false);
            $("#radio3").prop('checked', false);
            $("#radio4").prop('checked', false);
            $("#radio5").prop('checked', false);
        });
        $(document).on('change', "input:radio[name='radio2']", function() {
            $("#radio1").prop('checked', false);
            $("#radio2").prop('checked', true);
            $("#radio3").prop('checked', false);
            $("#radio4").prop('checked', false);
            $("#radio5").prop('checked', false);

        });
        $(document).on('change', "input:radio[name='radio3']", function() {
            $("#radio1").prop('checked', false);
            $("#radio2").prop('checked', false);
            $("#radio3").prop('checked', true);
            $("#radio4").prop('checked', false);
            $("#radio5").prop('checked', false);
        });
        $(document).on('change', "input:radio[name='radio4']", function() {
            $("#radio1").prop('checked', false);
            $("#radio2").prop('checked', false);
            $("#radio3").prop('checked', false);
            $("#radio4").prop('checked', true);
            $("#radio5").prop('checked', false);
        });
        $(document).on('change', "input:radio[name='radio5']", function() {
            $("#radio1").prop('checked', false);
            $("#radio2").prop('checked', false);
            $("#radio3").prop('checked', false);
            $("#radio4").prop('checked', false);
            $("#radio5").prop('checked', true);
        });

    </script>
</x-app-layout>
