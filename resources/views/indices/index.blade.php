@extends('elastic-insight::layout.app')
@section('content')
    <div x-data="setup()">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input x-model="searchInput" type="search" id="default-search"
                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search by alias name..." required>
            <button type="submit"
                class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        @foreach ($responseFields as $key)
                            <th scope="col" class="px-6 py-3">{{ $key }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(hit, index) in hits" :key="index">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <template x-for="fieldKey in responseFields" :key="index">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                        x-text="typeof getResponseFieldValue(hit, fieldKey) == 'object' ? JSON.stringify(getResponseFieldValue(hit, fieldKey)) : getResponseFieldValue(hit, fieldKey)">
                                    </th>
                         
                            {{-- <td class="text-center">
                                <button id="dropdownMenuIconHorizontalButton"
                                    x-bind:data-dropdown-toggle="'dropdownDotsHorizontal' + alias.uuid"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 16 3">
                                        <path
                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div x-bind:id="'dropdownDotsHorizontal' + alias.uuid"
                                    class="text-left z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownMenuIconHorizontalButton">
                                        <li>
                 
                                        </li>
                                    </ul>
                                    <div class="py-2">
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Separated
                                            link</a>
                                    </div>
                                </div>

                            </td> --}}
                            </template>
                        </tr>
                    </template>
                </tbody>
            </table>
          
        </div>
    </div>
    <script>
        function setup() {
            return {
                hits: @js($response['hits']->hits),
                responseFields: @js($responseFields),
                searchInput: '',
                currentPage: 1,
                perPage: 10,
                getResponseFieldValue(hit, key){
                    return hit['_source'][key];
                },
            }
        }
    </script>
@endsection
