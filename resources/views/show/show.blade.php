<x-guest-layout>
        <div class="flex justify-between">
            <!-- Title for the page -->
            <h2 class="text-xl font-semibold leading-tight text-white mt-4">
                {{ '방탈출 게임 ' }} <!-- Static title -->
            </h2>
        </div>


    <div class="py-12 bg-white w-full h-full mt-5">
        <div class="mx-auto mb-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <!-- Title for uncompleted tasks -->
                    <h3 class="mb-4 text-lg font-semibold leading-tight text-white-100">{{ $game_maker->title }}</h3>

                    <!-- Table to display uncompleted tasks -->

                    <div class = " mt-4">
                        <div  class="form-group flex flex-col mt-4 ">
                            {!! $game_maker->editorjs !!}
                        </div>

                    </div>

                    <br>

                    <input hidden name="prev_id" value="{{ $game_maker->prev_id }}">
                    <input hidden name="next_id" value="{{ $game_maker->next_id }}">
                    <div id="input_area"></div>
                    <div class="flex flex-col mt-4">
                        @if($game_maker->prev_id == 0)
                            <a href="{{ route('show.show_next', ['prev_id' => $game_maker->next_id]) }}" class="px-4 py-2 mt-4 text-sm w-40 font-semibold leading-5 text-white transition duration-150 ease-in-out bg-violet-600 rounded-lg hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                                {{ '다음 페이지로 가기' }}
                            </a>
                        @elseif($game_maker->select == 0)
                            <a href="{{ route('show.show_next', ['prev_id' => $game_maker->next_id]) }}" class="px-4 py-2 mt-4 text-sm w-40 font-semibold leading-5 text-white transition duration-150 ease-in-out bg-violet-600 rounded-lg hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                                {{ '다음 페이지로 가기' }}
                            </a>
                        @elseif($game_maker->select == 1)
                            <div>
                                문제 : <button name="question" id="question" class="btn btn-primary">{{ $game_maker->question }}</button>
                            </div>
                            <br>
                            <div>
                                1. <button name='check1' id='check1' class="btn btn-primary" onclick=check({{ $game_maker->choice1 }})>{{ $game_maker->answer1 }}</button><p>

                            </div>
                            <br>
                            <div>
                                2. <button name='check2' id='check2' class="btn btn-primary" onclick=check({{ $game_maker->choice2 }})>{{ $game_maker->answer2 }}</button><p>

                            </div>
                            <br>
                            <div>
                                3. <button name='check3' id='check3' class="btn btn-primary" onclick=check({{ $game_maker->choice3 }})>{{ $game_maker->answer3 }}</button><p>

                            </div>
                            <br>
                            <div>
                                4. <button name='check4' id='check4' class="btn btn-primary" onclick=check({{ $game_maker->choice4 }})>{{ $game_maker->answer4 }}</button><p>

                            </div>
                            <br>
                            <div>
                                5. <button name='check5' id='check5' class="btn btn-primary" onclick=check({{ $game_maker->choice5 }})>{{ $game_maker->answer5 }}</button><p>

                            </div>


                        @elseif($game_maker->select == 2)
                            <div>
                                문제 : <button name="question" id="question" class="btn btn-primary">{{ $game_maker->question }}</button>
                            </div>
                            <br>
                            <div>
                                1. <button name='check1' id='check1' class="btn btn-primary" onclick=check({{ $game_maker->choice1 }})>{{ $game_maker->answer1 }}</button><p>

                            </div>
                            <br>
                            <div>
                                2. <button name='check2' id='check2' class="btn btn-primary" onclick=check({{ $game_maker->choice2 }})>{{ $game_maker->answer2 }}</button><p>

                            </div>
                            <br>
                            <div>
                                3. <button name='check3' id='check3' class="btn btn-primary" onclick=check({{ $game_maker->choice3 }})>{{ $game_maker->answer3 }}</button><p>

                            </div>

                        @elseif($game_maker->select == 3)
                            <div>
                                문제 : <button name="question" id="question" class="btn btn-primary">{{ $game_maker->question }}</button>
                            </div>
                            <br>
                            <div>

                                1. <button name='check1' id='check1' class="btn btn-primary" onclick="check({{ $game_maker->choice1 }})">정답 : O</button><p>


                            </div>
                            <br>
                            <div>

                                2. <button name='check2' id='check2' class="btn btn-primary" onclick="check({{ $game_maker->choice2 }})">정답 : X</button><p>

                            </div>

                        @elseif($game_maker->select == 4)
                            <div>
                                문제 : <button name="question" id="question" class="btn btn-primary">{{ $game_maker->question }}</button>
                            </div>
                            <br>
                            <div>
                                1. <button name='check1' id='check1' class="btn btn-primary" onclick=check({{ $game_maker->choice1 }})>{{ $game_maker->answer1 }}</button><p>

                            </div>
                            <br>
                            <div>
                                2. <button name='check2' id='check2' class="btn btn-primary" onclick=check({{ $game_maker->choice2 }})>{{ $game_maker->answer2 }}</button><p>

                            </div>
                            <br>
                            <div>
                                3. <button name='check3' id='check3' class="btn btn-primary" onclick=check({{ $game_maker->choice3 }})>{{ $game_maker->answer3 }}</button><p>

                            </div>
                            <br>
                            <div>
                                4. <button name='check4' id='check4' class="btn btn-primary" onclick=check({{ $game_maker->choice4 }})>{{ $game_maker->answer4 }}</button><p>

                            </div>
                            <br>
                            <div>
                                5. <button name='check5' id='check5' class="btn btn-primary" onclick=check({{ $game_maker->choice5 }})>{{ $game_maker->answer5 }}</button><p>

                            </div>
                        @elseif($game_maker->select == 5)
                            <div>
                                문제 : <div id='check1' class="btn btn-primary" >{{ $game_maker->question }}</div><p>

                            </div>
                            <div class="form-group flex flex-col mt-4 " >
                                정답 : <input name="checkAnswer" id="checkAnswer" type="text" class="form-control rounded text-black">
                            </div>

                            <div>
                                정답 확인 : <button name='check1' id='check1' class="btn btn-primary mt-4" onclick=checkAnswer("{{ $game_maker->choice1 }}")>정답확인</button><p>

                            </div>
                        @endif
                    </div>

                    <div class="justify-between flex flex-auto">


                        <div id="choice_area" class="flex flex-col mt-4"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script text="text/javascript" defer>


        function check(choice) {

            switch (choice) {

                case 0:
                    window.alert('오답입니다.')
                    document.getElementById('choice_area').innerHTML = `<a href="{{ route('show.show_next', ['prev_id' => $game_maker->next_id]) }}" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out bg-violet-600 rounded-lg hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                {{ '다음 페이지로 가기' }}
                    </a>`;
                    break;
                case 1:
                    window.alert('정답입니다.')
                    document.getElementById('choice_area').innerHTML = `<a href="{{ route('show.show_next', ['prev_id' => $game_maker->next_id]) }}" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out bg-violet-600 rounded-lg hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                {{ '다음 페이지로 가기' }}
                    </a>`;
                    break;
                case 2:
                    window.alert('정답입니다.')
                    document.getElementById('choice_area').innerHTML = `<a href="{{ route('show.show_next', ['prev_id' => $game_maker->next_id]) }}" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out bg-violet-600 rounded-lg hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                {{ '다음 페이지로 가기' }}
                    </a>`;
                    break;
                case 3:
                    window.alert('정답입니다.')
                    document.getElementById('choice_area').innerHTML = `<a href="{{ route('show.show_next', ['prev_id' => $game_maker->next_id]) }}" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out bg-violet-600 rounded-lg hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                {{ '다음 페이지로 가기' }}
                    </a>`;
                    break;
                case 4:
                    window.alert('정답입니다.')
                    document.getElementById('choice_area').innerHTML = `<a href="{{ route('show.show_next', ['prev_id' => $game_maker->next_id]) }}" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out bg-violet-600 rounded-lg hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                {{ '다음 페이지로 가기' }}
                    </a>`;
                    break;
                case 5:
                    window.alert('정답입니다.')
                    document.getElementById('choice_area').innerHTML = `<a href="{{ route('show.show_next', ['prev_id' => $game_maker->next_id]) }}" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out bg-violet-600 rounded-lg hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
                {{ '다음 페이지로 가기' }}
                    </a>`;
                    break;
                default:
                    window.alert('오답입니다.')
                    break;


            }

        }

        function checkAnswer(choice) {
            let answer = document.getElementById('checkAnswer').value;
            if (choice !== answer) {
                window.alert('오답입니다.');
            } else {
                window.alert('정답입니다.');
                document.getElementById('choice_area').innerHTML = `<a href="{{ route('show.show_next', ['prev_id' => $game_maker->next_id]) }}" class="px-4 py-2 mt-4 text-sm font-semibold leading-5 text-white transition duration-150 ease-in-out bg-violet-600 rounded-lg hover:bg-violet-500 focus:outline-none focus:shadow-outline-violet active:bg-violet-600">
            {{ '다음 페이지로 가기' }}
                </a>`;
            }

        }




    </script>
</x-guest-layout>
