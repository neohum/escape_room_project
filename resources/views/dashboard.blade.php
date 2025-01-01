<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach( $query as $q)
                    <a href="{{ route(game_maker_next/show) }}"
                      <div class="p-6 text-white">
                      {{ $loop->index+1 }}번 {{ $q->title }}
                      </div>
                  </a>
                    <div class="p-6 text-white">
                    {!!html_entity_decode($q->editorjs)!!}
                    </div>
                    @endforeach
               
            </div>
        </div>
    </div>
</x-app-layout>
