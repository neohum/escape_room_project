<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('활동 리스트') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-600 dark:text-gray-100">
                    @foreach( $query as $q)
                        <div class="bg-base-100  shadow-xl " >

                            <div class="">

                                <div >

                                    <label class=" card-title label cursor-pointer px-6 py-4">

                                        <h2 class="px-6 py-4">활동명 : {{ $q->title }}</h2>
                                        <div class="flex flex-row justify-between items-center">
                                            @if($q->publish == 'on')

                                            <form action="{{ route('dashboard.store', $q->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$q->id}}" />
                                                <button type="submit" class="btn btn-primary w-full">공개</button>
                                            </form>
                                            @else

                                            <form action="{{ route('dashboard.store', $q->id) }}" method="POST">
                                                @csrf
                                                 <input type="hidden" name="id" value="{{$q->id}}" />
                                                <button type="submit" class="btn btn-primary">비공개</button>
                                            </form>
                                            @endif
                                            <div> </div>
                                        </div>

                                    </label>
                                </div>
                            </div>
                            <figure class="card-body px-6 py-4">
                                {!!$q->editorjs!!}
                            </figure>
                            <br>
                            <div class="card-body">
                                <div class="card-actions justify-between flex flex-auto px-6 py-4">
                                    <a href="{{ route('game_next_edit.index', $q->id) }}" class="btn btn-primary mt-4">편집하기</a>
                                    <div class="justify-between">

                                        <form action="{{ route('game_next_edit.delete', $q->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <div x-data="{ open: false }" class="flex justify-center">
                                                <!-- Trigger -->
                                                <span x-on:click="open = true">
                                                    <button type="button" class="btn btn-accent mt-4"> 삭제하기
                                                    </button>
                                                </span>

                                                <!-- Modal -->
                                                <div
                                                    x-show="open"
                                                    style="display: none"
                                                    x-on:keydown.escape.prevent.stop="open = false"
                                                    role="dialog"
                                                    aria-modal="true"
                                                    x-id="['modal-title']"
                                                    :aria-labelledby="$id('modal-title')"
                                                    class="fixed inset-0 z-10 overflow-y-auto"
                                                >
                                                    <!-- Overlay -->
                                                    <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black/25"></div>

                                                    <!-- Panel -->
                                                    <div
                                                        x-show="open" x-transition
                                                        x-on:click="open = false"
                                                        class="relative flex min-h-screen items-center justify-center p-4 rounded-xl bg-white dark:bg-gray-800"
                                                    >
                                                        <div
                                                            x-on:click.stop
                                                            x-trap.noscroll.inert="open"
                                                            class="relative min-w-96 max-w-xl rounded-xl bg-white p-6 shadow-lg"
                                                        >
                                                            <!-- Title -->
                                                            <h2 class="font-medium text-gray-800" :id="$id('modal-title')">삭제 확인</h2>

                                                            <!-- Content -->
                                                            <p class="mt-2 text-gray-500 max-w-xs">삭제하시겠습니까?</p>

                                                            <!-- Buttons -->
                                                            <div class="mt-6 flex justify-end space-x-2">
                                                                <button type="button" x-on:click="open = false" class="relative flex items-center justify-center gap-2 whitespace-nowrap rounded-lg border border-transparent bg-transparent px-4 py-2 text-gray-800 hover:bg-gray-800/10">
                                                                    취소
                                                                </button>

                                                                <button type="submit" x-on:click="open = false" class="relative flex items-center justify-center gap-2 whitespace-nowrap rounded-lg border border-transparent bg-gray-800 px-4 py-2 text-white hover:bg-gray-900">
                                                                    삭제
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                        </div>
                                    <a href="{{ route('game_next_edit.show',$q->id) }}" target="_blank" class="btn btn-primary mt-4 justify-end">미리 보기</a>
                                </div>
                            </div>
                        </div>
                      <div class="p-6 text-white">

                      </div>

                    @endforeach
                </div>
                <div class="join">
                    {{ $query->links() }}
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">

    </script>
</x-app-layout>
