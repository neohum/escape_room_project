@props(['disabled' => false])



<x-input-label for="title" :value="__('3지선다')" />

<p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
    문제 <input name='question'  id='question' @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']) }}>
</p>

<p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
    1. <input name='check1' id='check1' @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']) }}>
    <span class="ml-4">정답</span>
    <input type="radio" name='radio1' id='radio1' value="1" class="ml-5">
</p>

<p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
    2. <input name='check2' id='check2'  @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']) }}>
    <span class="ml-4">정답</span>
    <input type="radio" name="radio2" id="radio2" value="2" class="ml-5">
</p>

<p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800 flex items-center">
    3. <input name='check3' id='check3' @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']) }}>
    <span class="ml-4">정답</span>
    <input type="radio" name="radio3" id="radio3" value="3" class="ml-5">
</p>





