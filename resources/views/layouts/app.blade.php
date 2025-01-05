<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Escape_Room_Project') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite([
          'resources/css/app.css',
          'resources/js/app.js',
          ])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
              <header class="shadow ">
                  <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                      {{ $header }}

                      {{-- check if there is a notif.success flash session --}}
                      @if (Session::has('notification.success'))
                      <div class="p-4 mt-2 bg-blue-300">
                          {{-- if it's there then print the notification --}}
                          <span class="text-white">{{ Session::get('notification.success') }}</span>
                      </div>
                      @endif
                  </div>
              </header>
          @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
         <script type="text/javascript">
          $(document).ready(function () {
            $('#summernote').summernote({

              placeholder: '내용을 작성해 주세요',
              tabsize: 2,
              height: 300,
              toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen',  'help']]
              ]
            });
          })





    </script>
      </body>
</html>
