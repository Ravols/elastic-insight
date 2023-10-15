@extends('elastic-insight::layout.app')
@section('content')
<div>
    <div class="px-4 sm:px-6 lg:px-8 ">
        <div class="mt-8">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="max-x-full ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Query
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white ">
                                <tr>
                                    <td>
                                        <div class="flex h-10 my-2">
                                            <button type="button" wire:click="getResponse"
                                                class="mr-2 my-auto rounded-full h-7 bg-indigo-600 p-0.5 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                                <svg class="h-4 w-6" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                                </svg>
                                            </button>
                                            <div class="flex-1">
                                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 w-full">
                                                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">GET</span>
                                                    <span class="flex select-none items-center pl-1 text-gray-500 sm:text-sm">/{{ $index }}/</span>
                                                    <input type="text" name="query" id="query"  wire:model="query" class="block flex-1 border-0 bg-transparent py-1.5 pl-0
                                                     text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                                     placeholder="_mapping"
                                                     wire:keydown.enter="getResponse"
                                                     autofocus>
                                                  </div>
                                            </div>
                                           
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @if (!is_null($response))
                        <div wire:key="{{ rand() }}">
                            <div x-data="{
                                init() {
                                    function formatJson(value) {
                                        var elementExists = document.getElementById('json_formatter');
                            
                                        if(typeof elementExists !== 'undefined' && elementExists !== null && elementExists !== 'null' && elementExists !== '') {
                                            var formatter = new JSONFormatter(value);
                                            formatter.openAtDepth(Infinity);
                                            document.getElementById('json_formatter').appendChild(formatter.render());
                                        }
                                    }
                            
                                    formatJson({{ ($response) }});
                            
                                }
                            }">
                                <div id="json_formatter"></div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
