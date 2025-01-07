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
                    <form action="{{ route('game_next_edit.first_update', ['id' => $game_data->id]) }}"  method="POST" class="mt-6 space" enctype="multipart/form-data">

                        @csrf
                        <div class="bg-slate-800 text-white ">

                            <h1 class="mt-4">활동명 </h1>
                            <input type="text" name="title" class="input input-bordered w-full max-w-xs" value="{{ $game_data->title }}" disabled/>


                        </div>
                        <div class = "bg-white text-black mt-4">
                            <textarea id="summernote" class="text-black bg-white mt-4" name="editorjs">{{ $game_data->editorjs }}</textarea>
                        </div>

                        <br>

                        <input hidden name="prev_id" value="{{ $game_data->prev_id }}">
                        <input hidden name="next_id" value="{{ $game_data->next_id }}">
                        <div id="input_area"></div>
                        <div class="flex flex-auto mt-4">

                        </div>

                                <div class="justify-between flex flex-auto">

                                    <button type="submit" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out rounded-lg bg-violet-600 hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                                        {{ '저장하기' }}
                                    </button>

                                    <a href="{{ route('game_next_edit.edit', ['prev_id' => $game_data->next_id]) }}" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out bg-violet-600 rounded-lg px- hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
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
    <script text="text/javascript">
        document.getElementById('select').addEventListener('change', function() {
            var select = document.getElementById('select');
            var value = select.options[select.selectedIndex].value;
            if(value == 1) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-5radio name="radio" id="radio"  />
                `;
            } else if(value == 2) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-3radio name="radio" id="radio"  />
                `;
            } else if(value == 3) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-2radio name="radio" id="radio"  />
                `;
            } else if(value == 4) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-5checkbox name="radio" id="radio" />
                `;
            } else if(value == 5) {
                document.getElementById('input_area').innerHTML = `
                    <x-input-one-answer name="radio" id="radio"  />
                `;
            }
        });

        $(document).onplay('change', "input:radio[name='radio1']", function() {
            $("#radio1").prop('checked', true).prop('required', true);
            $("#radio2").prop('checked', false);
            $("#radio3").prop('checked', false);
            $("#radio4").prop('checked', false);
            $("#radio5").prop('checked', false);
        });
        $(document).onplay('change', "input:radio[name='radio2']", function() {
            $("#radio1").prop('checked', false);
            $("#radio2").prop('checked', true);
            $("#radio3").prop('checked', false);
            $("#radio4").prop('checked', false);
            $("#radio5").prop('checked', false);

        });
        $(document).onplay('change', "input:radio[name='radio3']", function() {
            $("#radio1").prop('checked', false);
            $("#radio2").prop('checked', false);
            $("#radio3").prop('checked', true);
            $("#radio4").prop('checked', false);
            $("#radio5").prop('checked', false);
        });
        $(document).onplay('change', "input:radio[name='radio4']", function() {
            $("#radio1").prop('checked', false);
            $("#radio2").prop('checked', false);
            $("#radio3").prop('checked', false);
            $("#radio4").prop('checked', true);
            $("#radio5").prop('checked', false);
        });
        $(document).onplay('change', "input:radio[name='radio5']", function() {
            $("#radio1").prop('checked', false);
            $("#radio2").prop('checked', false);
            $("#radio3").prop('checked', false);
            $("#radio4").prop('checked', false);
            $("#radio5").prop('checked', true);
        });



    </script>
</x-app-layout>
