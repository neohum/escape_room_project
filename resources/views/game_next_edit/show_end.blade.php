<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="card bg-base-100 w-96 shadow-xl " >

                        <div class="">

                            <div class="form-control w-100">

                                <label class=" card-title label cursor-pointer px-6 py-4">

                                    <h2 class="px-6 py-4">미리 보기 종료</h2>
                                    <div class="flex flex-row justify-between items-center">

                                        <div> </div>
                                    </div>

                                </label>
                            </div>
                        </div>

                        <br>
                        <div class="card-body">
                            <div class="card-actions justify-between flex flex-auto px-6 py-4">

                                <div class="justify-between">

                                    <a href="{{ route('dashboard') }}" type="button" class="btn btn-primary">방탈출 게임 리스트로 가기</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-white">

                    </div>


            </div>
            <div class="join">

            </div>

        </div>
    </div>
</div>
</x-app-layout>
