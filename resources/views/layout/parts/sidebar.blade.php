<aside class="w-full h-full" aria-label="Sidebar">
    <div
        class="overflow-y-auto py-4 px-3 h-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <a href="{{ '/' }}" class="flex items-center pl-2 mb-5">
            <img src="{{ asset('vendor/elastic-insight/images/logo/elastic_logo.png') }}" class="mr-3 h-6 sm:h-8"
                alt="Elastic Insight Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Elastic Insight</span>
        </a>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('elastic-insight.indices.index') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">All Indices</span>
                </a>
                <a href="{{ route('elastic-insight.aliases.index') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">All Aliases</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
