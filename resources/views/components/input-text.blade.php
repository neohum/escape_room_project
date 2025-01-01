@props(['disabled' => false])
 <x-input-label for="title" :value="__('주관식')" />
 <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800">
  문제 <input name='check1' id='check1' @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm px-60']) }}>

</p>
<p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800">
  정답
<input @disabled($disabled) {{ $attributes->merge(['class' => 'px-60 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}>
