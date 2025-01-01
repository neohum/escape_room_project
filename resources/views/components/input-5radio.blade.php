@props(['disabled' => false])


 <x-input-label for="title" :value="__('5지선다')" />
 <table>

    <tr>
      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800">
        문제 <input name='question' id='question' @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']) }}>
      </p>
    <tr>
      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800">
        1. <input name='check1' id='check1' @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']) }}>
          <span class="ml-4">정답 :</span>
           <input type="radio" name='radio1' id='radio1' value="1" class="ml-5">
      </p>
    </tr>
    <tr>
      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800">
        2. <input name='check2' id='check2'  @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']) }}>
          <span class="ml-4">정답 :</span>
           <input type="radio" name="radio2" id="radio2" value="2" class="ml-5">
      </p>
    </tr>

    <tr>
      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800">
        3. <input name='check3' id='check3' @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']) }}>
          <span class="ml-4">정답 :</span>
           <input type="radio" name="radio3" id="radio3" value="3" class="ml-5">
      </p>
    </tr>
    <tr>
      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800">
        4. <input name='check4' id='check4' @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']) }}>
          <span class="ml-4">정답 :</span>
           <input type="radio" name="radio4" id="radio4" value="4" class="ml-5">
      </p>
    </tr>
    <tr>
      <p class="p-4 px-4 mt-4 text-sm font-semibold leading-tight text-white-800">
        5. <input name='check5' id='check5' @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm input input-bordered w-full max-w-xs']) }}>
          <span class="ml-4">정답 :</span>
           <input type="radio" name="radio5" id="radio5" value="5" class="ml-5">
      </p>
    </tr>

</table>
    

