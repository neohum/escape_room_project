<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('활동 리스트') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach( $query as $q)
                        <div class="card bg-base-100 w-96 shadow-xl">
                            <h2 class="card-title px-6 py-4">활동명 : {{ $q->title }}</h2>
                            <figure class="card-body px-6 py-4">
                                {!!html_entity_decode($q->editorjs)!!}
                            </figure>
                            <br>
                            <div class="card-body">
                                <div class="card-actions justify-between flex flex-auto px-6 py-4">
                                    <a href="{{ route('game_maker_next.edit', $q->id) }}" class="btn btn-primary mt-4">편집하기</a>
                                    <div class="justify-between">
                                    </div>
                                    <a href="{{ route('game_maker_next.show',$q->id) }}" class="btn btn-primary mt-4 justify-end">결과 보기</a>
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
</x-app-layout>
