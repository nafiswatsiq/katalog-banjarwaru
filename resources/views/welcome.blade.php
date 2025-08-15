{{-- @extends('layouts.app')

@section('content')

    <style>
        @media(prefers-color-scheme: dark){ .bg-dots{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(200,200,255,0.15)'/%3E%3C/svg%3E");}}@media(prefers-color-scheme: light){.bg-dots{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,50,0.10)'/%3E%3C/svg%3E")}}
    </style>

    <div class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center bg-dots dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">
        
        @if (Route::has('login'))
            <div class="p-6 text-right sm:fixed sm:top-0 sm:right-0">
                @auth
                    <a href="{{ route('home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Home</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="p-6 mx-auto max-w-7xl lg:p-8">
            <div class="flex justify-center">
                <svg class="w-auto h-16 text-indigo-600 bg-gray-100 dark:bg-gray-900" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="currentColor"/>
                </svg>
            </div>
            <div class="mt-16">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:gap-8">
                    <a href="https://tailwindcss.com/docs" target="_blank" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">
                        <div>
                            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-indigo-50 dark:bg-indigo-900/20">
                                <svg class="text-indigo-400 fill-current w-7 h-7" viewBox="0 0 50 31" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)"><path fill-rule="evenodd" clip-rule="evenodd" d="M25 0c-6.667 0-10.833 3.382-12.5 10.146 2.5-3.382 5.417-4.65 8.75-3.805 1.902.482 3.261 1.882 4.766 3.432 2.45 2.524 5.288 5.445 11.484 5.445 6.667 0 10.833-3.382 12.5-10.145-2.5 3.382-5.417 4.65-8.75 3.804-1.902-.482-3.261-1.882-4.766-3.431C34.034 2.922 31.196 0 25 0ZM12.5 15.218C5.833 15.218 1.667 18.6 0 25.364c2.5-3.382 5.417-4.65 8.75-3.805 1.902.483 3.261 1.883 4.766 3.432 2.45 2.524 5.288 5.445 11.484 5.445 6.667 0 10.833-3.381 12.5-10.145-2.5 3.382-5.417 4.65-8.75 3.805-1.902-.483-3.261-1.883-4.766-3.432-2.45-2.524-5.288-5.446-11.484-5.446Z" fill="currentColor"/></g><defs><clipPath id="a"><rect width="50" height="31" fill="currentColor"/></clipPath></defs></svg>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Tailwind CSS</h2>

                            <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                Tailwind CSS is a popular utility-first CSS framework that makes it easy to style pages by applying pre-defined classes to HTML elements.
                            </p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center w-6 h-6 mx-6 shrink-0 stroke-indigo-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>
                    <a href="https://alpinejs.dev/docs" target="_blank" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">
                        <div>
                            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-indigo-50 dark:bg-indigo-900/20">
                                <svg class="text-indigo-400 fill-current w-7 h-7" viewBox="0 0 55 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="m42.753 0 12.112 12.06-12.112 12.058L30.641 12.06 42.753 0Z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="m12.473 0 25.11 25H13.358L.36 12.06 12.473 0Z" fill="currentColor"/></svg>
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">AlpineJS</h2>

                            <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                AlpineJS is a lightweight JavaScript framework that allows you to add interactivity to your HTML using simple declarative syntax.
                            </p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center w-6 h-6 mx-6 shrink-0 stroke-indigo-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>
                    <a href="https://laravel.com/docs" target="_blank" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">
                        <div>
                            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-indigo-50 dark:bg-indigo-900/20">
                                <svg class="text-indigo-400 translate-x-px translate-y-px fill-current w-7 h-7" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="currentColor"/></svg>
                                
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Laravel</h2>

                            <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                Laravel is a free and open-source PHP web framework that allows developers to build web applications quickly and easily.
                            </p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center w-6 h-6 mx-6 shrink-0 stroke-indigo-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>
                    <a href="https://livewire.laravel.com/docs" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500">
                        <div>
                            <div class="flex items-center justify-center w-16 h-16 rounded-full bg-indigo-50 dark:bg-indigo-900/20">
                                <svg class="text-indigo-400 translate-x-px translate-y-px fill-current w-7 h-7" viewBox="0 0 40 45" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M37.47 29.484c-.717 1.084-1.262 2.42-2.72 2.42-2.455 0-2.588-3.784-5.044-3.784-2.456 0-2.323 3.785-4.777 3.785-2.455 0-2.588-3.785-5.043-3.785-2.456 0-2.324 3.785-4.778 3.785-2.455 0-2.587-3.785-5.043-3.785s-2.323 3.785-4.778 3.785c-.771 0-1.313-.374-1.77-.887C1.76 27.962.75 24.38.75 20.55.75 9.34 9.41.25 20.095.25c10.683 0 19.344 9.089 19.344 20.3 0 3.206-.708 6.238-1.969 8.934Z" fill="currentColor"/><mask id="a-livewire" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="6" y="23" width="27" height="22"><path d="M12.37 27.48v8.408a2.732 2.732 0 0 1-5.465 0v-10.15c.51-.937 1.093-1.747 2.143-1.747 1.71 0 2.307 2.148 3.321 3.489Zm10.32.438v13.296a3.036 3.036 0 0 1-6.07 0V26.165c.57-1.102 1.16-2.174 2.368-2.174 1.912 0 2.433 2.687 3.703 3.927Zm9.715-.244v9.653a2.732 2.732 0 1 1-5.465 0V25.462c.476-.814 1.043-1.471 1.988-1.471 1.795 0 2.364 2.367 3.477 3.683Z" fill="white"/></mask><g mask="url(#a-livewire)"><path d="M12.37 27.48v8.408a2.732 2.732 0 0 1-5.465 0v-10.15c.51-.937 1.093-1.747 2.143-1.747 1.71 0 2.307 2.148 3.321 3.489Zm10.32.438v13.296a3.036 3.036 0 0 1-6.07 0V26.165c.57-1.102 1.16-2.174 2.368-2.174 1.912 0 2.433 2.687 3.703 3.927Zm9.715-.244v9.653a2.732 2.732 0 1 1-5.465 0V25.462c.476-.814 1.043-1.471 1.988-1.471 1.795 0 2.364 2.367 3.477 3.683Z" fill="currentColor"/></g><mask id="b-livewire" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="6" y="19" width="27" height="14"><path d="M12.37 30.057c-.485-.594-1.059-1.034-1.889-1.034-1.97 0-2.332 2.483-3.576 3.602v-10.71a2.732 2.732 0 1 1 5.464 0v8.142Zm10.32.191c-.516-.687-1.12-1.225-2.037-1.225-2.192 0-2.393 3.073-4.034 3.923V28.21a3.036 3.036 0 0 1 6.072 0v2.038Zm9.715-.531c-.42-.414-.92-.694-1.58-.694-2.124 0-2.38 2.884-3.884 3.837v-9.613a2.732 2.732 0 1 1 5.464 0v6.47Z" fill="white"/></mask><g mask="url(#b-livewire)"><path d="M12.37 30.057c-.485-.594-1.059-1.034-1.889-1.034-1.97 0-2.332 2.483-3.576 3.602v-10.71a2.732 2.732 0 1 1 5.464 0v8.142Zm10.32.191c-.516-.687-1.12-1.225-2.037-1.225-2.192 0-2.393 3.073-4.034 3.923V28.21a3.036 3.036 0 0 1 6.072 0v2.038Zm9.715-.531c-.42-.414-.92-.694-1.58-.694-2.124 0-2.38 2.884-3.884 3.837v-9.613a2.732 2.732 0 1 1 5.464 0v6.47Z" fill="black" fill-opacity="0.298514"/></g><path fill-rule="evenodd" clip-rule="evenodd" d="M37.47 29.484c-.717 1.084-1.262 2.42-2.72 2.42-2.455 0-2.588-3.784-5.044-3.784-2.456 0-2.323 3.785-4.777 3.785-2.455 0-2.588-3.785-5.043-3.785-2.456 0-2.324 3.785-4.778 3.785-2.455 0-2.587-3.785-5.043-3.785s-2.323 3.785-4.778 3.785c-.771 0-1.313-.374-1.77-.887C1.76 27.962.75 24.38.75 20.55.75 9.34 9.41.25 20.095.25c10.683 0 19.344 9.089 19.344 20.3 0 3.206-.708 6.238-1.969 8.934Z" fill="currentColor"/><path fill-rule="evenodd" clip-rule="evenodd" d="M33.284 31.5c5.07-7.541 5.2-15.906.393-25.095a20.248 20.248 0 0 1 5.762 14.188c0 3.194-.734 6.214-2.04 8.9-.744 1.08-1.31 2.412-2.821 2.412-.517 0-.935-.156-1.294-.405Z" fill="black" fill-opacity="0.15"/><path fill-rule="evenodd" clip-rule="evenodd" d="M19.057 25.614c6.728 0 9.56-3.902 9.56-9.445 0-5.542-4.28-10.643-9.56-10.643s-9.56 5.101-9.56 10.643c0 5.543 2.833 9.445 9.56 9.445Z" fill="white"/><path d="M16.487 16.483c1.98 0 3.585-1.771 3.585-3.957 0-2.185-1.605-3.956-3.585-3.956s-3.585 1.771-3.585 3.956c0 2.186 1.605 3.957 3.585 3.957Z" fill="currentColor"/><path d="M15.89 13.44c.99 0 1.792-.818 1.792-1.827 0-1.008-.802-1.826-1.792-1.826s-1.793.818-1.793 1.826c0 1.009.803 1.827 1.793 1.827Z" fill="white"/></svg> 
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Livewire</h2>

                            <p class="mt-4 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                Livewire is a tool that simplifies the process of creating interactive and dynamic user interfaces using PHP and Laravel.
                            </p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center w-6 h-6 mx-6 shrink-0 stroke-indigo-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex justify-center px-0 mt-16 sm:items-center sm:justify-between">
                <div class="text-sm text-center text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a href="https://github.com/sponsors/taylorotwell" class="inline-flex items-center group hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-5 h-5 mr-1 -mt-px stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            Sponsor
                        </a>
                    </div>
                </div>
                <div class="ml-4 text-sm text-center text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) & Livewire
                    {{ \Composer\InstalledVersions::getPrettyVersion('livewire/livewire') }}
                </div>
            </div>
        </div>
    </div>
@endsection --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerajinan Bambu Banjarwaru - Karya Seni Bambu Berkualitas</title>
    
    <!-- Tailwind CSS CDN v4 -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- SwiperJS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        :root {
            --forest-green: #2F4F4F;
            --bamboo-brown: #D2B48C;
            --cream: #F5F5DC;
            --dark-gray: #333333;
        }
    </style>
</head>
<body class="bg-stone-50 text-gray-800">

    <!-- Header & Navigation Bar -->
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-green-800">Kerajinan Bambu Banjarwaru</h1>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#beranda" class="text-gray-700 hover:text-green-800 transition duration-300">Beranda</a>
                    <a href="#koleksi" class="text-gray-700 hover:text-green-800 transition duration-300">Koleksi Produk</a>
                    <a href="#tentang" class="text-gray-700 hover:text-green-800 transition duration-300">Tentang Kami</a>
                    <a href="#kontak" class="text-gray-700 hover:text-green-800 transition duration-300">Kontak</a>
                </div>
                
                <!-- CTA Button -->
                <div class="hidden md:block">
                    <button class="bg-green-800 text-white px-6 py-2 rounded-lg hover:bg-green-900 transition duration-300">
                        Lihat Semua Produk
                    </button>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-gray-700 hover:text-green-800">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
            
            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 py-4 border-t border-gray-200">
                <div class="flex flex-col space-y-3">
                    <a href="#beranda" class="text-gray-700 hover:text-green-800 transition duration-300">Beranda</a>
                    <a href="#koleksi" class="text-gray-700 hover:text-green-800 transition duration-300">Koleksi Produk</a>
                    <a href="#tentang" class="text-gray-700 hover:text-green-800 transition duration-300">Tentang Kami</a>
                    <a href="#kontak" class="text-gray-700 hover:text-green-800 transition duration-300">Kontak</a>
                    <button class="bg-green-800 text-white px-6 py-2 rounded-lg hover:bg-green-900 transition duration-300 w-full mt-3">
                        Lihat Semua Produk
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="beranda" class="relative px-20 rounded-2xl">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-black bg-opacity-40 z-10"></div>
                    <img src="https://picsum.photos/seed/bamboo1/1920/1080" alt="Kerajinan Bambu" class="w-full h-full object-cover">
                    <div class="absolute inset-0 z-20 flex items-center justify-center">
                        <div class="text-center text-white px-4">
                            <h2 class="text-4xl md:text-6xl font-bold mb-4 leading-tight">
                                Keindahan Alam dalam<br>Setiap Anyaman
                            </h2>
                            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">
                                Rasakan kemewahan produk bambu berkualitas tinggi yang dibuat dengan cinta oleh pengrajin lokal
                            </p>
                            <button class="bg-amber-600 text-white px-8 py-4 rounded-lg text-lg hover:bg-amber-700 transition duration-300 transform hover:scale-105">
                                Jelajahi Koleksi
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 -->
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-black bg-opacity-40 z-10"></div>
                    <img src="https://picsum.photos/seed/bamboo2/1920/1080" alt="Kerajinan Bambu" class="w-full h-full object-cover">
                    <div class="absolute inset-0 z-20 flex items-center justify-center">
                        <div class="text-center text-white px-4">
                            <h2 class="text-4xl md:text-6xl font-bold mb-4 leading-tight">
                                Tradisi Berkualitas<br>Warisan Nusantara
                            </h2>
                            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">
                                Setiap produk adalah hasil dari teknik tradisional yang diwariskan turun temurun
                            </p>
                            <button class="bg-amber-600 text-white px-8 py-4 rounded-lg text-lg hover:bg-amber-700 transition duration-300 transform hover:scale-105">
                                Jelajahi Koleksi
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Slide 3 -->
                <div class="swiper-slide relative">
                    <div class="absolute inset-0 bg-black bg-opacity-40 z-10"></div>
                    <img src="https://picsum.photos/seed/bamboo3/1920/1080" alt="Kerajinan Bambu" class="w-full h-full object-cover">
                    <div class="absolute inset-0 z-20 flex items-center justify-center">
                        <div class="text-center text-white px-4">
                            <h2 class="text-4xl md:text-6xl font-bold mb-4 leading-tight">
                                Ramah Lingkungan<br>Masa Depan Berkelanjutan
                            </h2>
                            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">
                                Pilihan cerdas untuk rumah modern yang peduli lingkungan
                            </p>
                            <button class="bg-amber-600 text-white px-8 py-4 rounded-lg text-lg hover:bg-amber-700 transition duration-300 transform hover:scale-105">
                                Jelajahi Koleksi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="koleksi" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Koleksi Unggulan Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Produk-produk pilihan yang menggabungkan keindahan, fungsi, dan kualitas terbaik
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="https://picsum.photos/seed/lamp/400/300" alt="Lampu Gantung Rotan" class="w-full h-64 object-cover hover:scale-110 transition duration-300">
                        <div class="absolute top-4 right-4 bg-green-800 text-white px-3 py-1 rounded-full text-sm">
                            Terlaris
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Lampu Gantung Rotan</h3>
                        <p class="text-gray-600 mb-4">Lampu gantung elegan dengan anyaman rotan natural</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-amber-600">Rp 250.000</span>
                            <button class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300 flex items-center space-x-2">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="https://picsum.photos/seed/basket/400/300" alt="Keranjang Anyaman" class="w-full h-64 object-cover hover:scale-110 transition duration-300">
                        <div class="absolute top-4 right-4 bg-amber-600 text-white px-3 py-1 rounded-full text-sm">
                            Baru
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Keranjang Anyaman</h3>
                        <p class="text-gray-600 mb-4">Keranjang serbaguna dengan desain minimalis</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-amber-600">Rp 125.000</span>
                            <button class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300 flex items-center space-x-2">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="https://picsum.photos/seed/furniture/400/300" alt="Kursi Bambu Modern" class="w-full h-64 object-cover hover:scale-110 transition duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Kursi Bambu Modern</h3>
                        <p class="text-gray-600 mb-4">Kursi ergonomis dengan finishing premium</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-amber-600">Rp 450.000</span>
                            <button class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300 flex items-center space-x-2">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 4 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-2">
                    <div class="relative overflow-hidden">
                        <img src="https://picsum.photos/seed/tray/400/300" alt="Nampan Bambu Set" class="w-full h-64 object-cover hover:scale-110 transition duration-300">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Nampan Bambu Set</h3>
                        <p class="text-gray-600 mb-4">Set nampan ukuran berbeda untuk kebutuhan harian</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-amber-600">Rp 175.000</span>
                            <button class="bg-green-800 text-white px-4 py-2 rounded-lg hover:bg-green-900 transition duration-300 flex items-center space-x-2">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="tentang" class="py-20 bg-stone-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Mengapa Memilih Bambu Lestari?</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Komitmen kami terhadap kualitas, keberlanjutan, dan kepuasan pelanggan
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Feature 1 -->
                <div class="text-center">
                    <div class="bg-green-800 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-leaf text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Bahan Ramah Lingkungan</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Dibuat dari bambu pilihan yang berkelanjutan, mendukung pelestarian lingkungan untuk generasi mendatang
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="text-center">
                    <div class="bg-amber-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-hand-holding-heart text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">100% Buatan Tangan</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Setiap produk adalah karya seni unik dari pengrajin lokal berpengalaman dengan teknik tradisional
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="text-center">
                    <div class="bg-blue-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shield-alt text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Kualitas Terjamin</h3>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Melalui proses finishing yang teliti untuk daya tahan maksimal dan kepuasan pelanggan yang terjamin
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Apa Kata Pelanggan Kami</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Kepuasan pelanggan adalah prioritas utama kami
                </p>
            </div>
            
            <div class="swiper testimonials-swiper max-w-4xl mx-auto">
                <div class="swiper-wrapper">
                    <!-- Testimonial 1 -->
                    <div class="swiper-slide">
                        <div class="bg-stone-50 rounded-xl p-8 text-center">
                            <div class="flex justify-center mb-6">
                                <div class="flex space-x-1">
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                </div>
                            </div>
                            <blockquote class="text-xl text-gray-700 mb-6 italic leading-relaxed">
                                "Produk bambu dari Banjarwaru benar-benar berkualitas tinggi. Lampu gantung yang saya beli sudah 2 tahun masih terlihat seperti baru. Sangat merekomendasikan!"
                            </blockquote>
                            <div class="flex items-center justify-center">
                                <img src="https://picsum.photos/seed/person1/80/80" alt="Sari Dewi" class="w-12 h-12 rounded-full mr-4">
                                <div class="text-left">
                                    <h4 class="font-semibold text-gray-800">Sari Dewi</h4>
                                    <p class="text-gray-600">Jakarta</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="swiper-slide">
                        <div class="bg-stone-50 rounded-xl p-8 text-center">
                            <div class="flex justify-center mb-6">
                                <div class="flex space-x-1">
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                </div>
                            </div>
                            <blockquote class="text-xl text-gray-700 mb-6 italic leading-relaxed">
                                "Pelayanan yang sangat memuaskan! Pesanan sampai dengan cepat dan dikemas dengan sangat rapi. Kualitas keranjang anyamannya luar biasa detail."
                            </blockquote>
                            <div class="flex items-center justify-center">
                                <img src="https://picsum.photos/seed/person2/80/80" alt="Budi Santoso" class="w-12 h-12 rounded-full mr-4">
                                <div class="text-left">
                                    <h4 class="font-semibold text-gray-800">Budi Santoso</h4>
                                    <p class="text-gray-600">Surabaya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="swiper-slide">
                        <div class="bg-stone-50 rounded-xl p-8 text-center">
                            <div class="flex justify-center mb-6">
                                <div class="flex space-x-1">
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                    <i class="fas fa-star text-yellow-400 text-xl"></i>
                                </div>
                            </div>
                            <blockquote class="text-xl text-gray-700 mb-6 italic leading-relaxed">
                                "Sebagai pecinta produk ramah lingkungan, saya sangat senang menemukan Bambu Banjarwaru. Produknya cantik dan berkualitas. Akan pesan lagi!"
                            </blockquote>
                            <div class="flex items-center justify-center">
                                <img src="https://picsum.photos/seed/person3/80/80" alt="Maya Putri" class="w-12 h-12 rounded-full mr-4">
                                <div class="text-left">
                                    <h4 class="font-semibold text-gray-800">Maya Putri</h4>
                                    <p class="text-gray-600">Bandung</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation buttons -->
                <div class="swiper-button-next text-green-800"></div>
                <div class="swiper-button-prev text-green-800"></div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-gray-800 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold mb-4">Kerajinan Bambu Banjarwaru</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Menghadirkan keindahan dan fungsi melalui kerajinan bambu berkualitas tinggi. 
                        Setiap produk dibuat dengan penuh dedikasi oleh pengrajin lokal berpengalaman.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-green-800 p-3 rounded-full hover:bg-green-700 transition duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="bg-green-800 p-3 rounded-full hover:bg-green-700 transition duration-300">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="bg-green-800 p-3 rounded-full hover:bg-green-700 transition duration-300">
                            <i class="fab fa-pinterest text-xl"></i>
                        </a>
                        <a href="#" class="bg-green-800 p-3 rounded-full hover:bg-green-700 transition duration-300">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-xl font-semibold mb-4">Link Cepat</h4>
                    <ul class="space-y-3">
                        <li><a href="#beranda" class="text-gray-300 hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="#koleksi" class="text-gray-300 hover:text-white transition duration-300">Koleksi Produk</a></li>
                        <li><a href="#tentang" class="text-gray-300 hover:text-white transition duration-300">Tentang Kami</a></li>
                        <li><a href="#kontak" class="text-gray-300 hover:text-white transition duration-300">Kontak</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition duration-300">FAQ</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h4 class="text-xl font-semibold mb-4">Kontak Kami</h4>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-green-400 mt-1"></i>
                            <p class="text-gray-300">Jl. Bambu Raya No. 123<br>Banjarwaru, Indonesia</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-green-400"></i>
                            <p class="text-gray-300">+62 812-3456-7890</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-green-400"></i>
                            <p class="text-gray-300">info@bambubanjarwaru.com</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bottom Footer -->
            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                <p class="text-gray-300">
                    © 2025 Kerajinan Bambu Banjarwaru. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- SwiperJS JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Hero Swiper
        const heroSwiper = new Swiper('.hero-swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            speed: 1000,
        });

        // Testimonials Swiper
        const testimonialsSwiper = new Swiper('.testimonials-swiper', {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 1,
                    spaceBetween: 40,
                },
            },
            speed: 800,
        });

        // Smooth Scrolling for Navigation Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    
                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobile-menu');
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.classList.add('backdrop-blur-sm', 'bg-white/95');
            } else {
                header.classList.remove('backdrop-blur-sm', 'bg-white/95');
            }
        });
    </script>

</body>
</html>