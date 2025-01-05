@props(['disabled' => false])


 <x-input-label for="title" :value="__('ox문제')" />
 <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800">
        문제 <input name='question' id='question' @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']) }}>
      </p>
<p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
    <span class="ml-4">정답 O:</span>
     <input type="radio" name='radio1' id='radio1' value="1" class="ml-5">
    <span class="ml-4">정답 X:</span>
     <input type="radio" name='radio2' id='radio2' value="2" class="ml-5">

</p>

