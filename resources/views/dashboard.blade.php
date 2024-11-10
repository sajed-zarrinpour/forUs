<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <div class="row flex">
                            <div class="mx-3 text-gray-900 dark:text-white font-bold text-xl mb-2">
                                <h3>Closest Deadlines</h3>
                            </div>
                            <div class="mb-4">
                                <a href="{{ route('positions.new') }}" class="text-blue-500 hover:text-blue-700">New Position</a>
                            </div>
                        </div>
    
                        @isset($closest_deadlines)
                            <ul class="space-y-4">
                                @foreach ($closest_deadlines as $item)
                                    <li class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-md p-4">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                                    {{ $item->location }} | {{ $item->organazaion }}
                                                </p>
                                                
                                                <div class="text-gray-900 dark:text-white font-bold text-xl mb-2">
                                                    <a href="{!! $item->url !!}">{{ $item->title }}</a>
                                                </div>
                                                {{-- <p class="text-gray-700 dark:text-gray-300 text-base mb-2">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                                </p> --}}
                                                <div class="flex-none">
                                                    <div class="text-sm">
                                                        <p class="text-gray-900 dark:text-gray-300 leading-none">
                                                            @isset($item->apply_link)
                                                                <span>Apply Link</span>
                                                                <a href="{!! $item->apply_link !!}" class="exotic-links text-blue-500 hover:text-blue-700">{!! $item->apply_link !!}</a>
                                                            @endisset
                                                            @isset($item->email)
                                                                <span class="ml-2">{{ $item->email }}</span>
                                                            @endisset
                                                        </p>
                                                        <p class="text-gray-600 dark:text-gray-400">
                                                            Created At: {{ $item->created_at }}
                                                        </p>
                                                        <p class="text-gray-600 dark:text-gray-400">
                                                            Updated At: {{ $item->updated_at }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-none">
                                                <div class="text-sm">
                                                    <p class="text-gray-600 dark:text-gray-400">
                                                        Deadline: {{ $item->deadline_at }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-end mt-4">
                                            <a href="{{ route('application.new', ['position' => $item]) }}" class="text-blue-500 hover:text-blue-700 mr-2">New Application</a>
                                            <a href="{{ route('position.edit', ['position' => $item]) }}" class="text-blue-500 hover:text-blue-700 mr-2">Update Position</a>
                                            <button type="button" wire:click="deleteId({{ $item->id }})" class="text-red-500 hover:text-red-700">
                                                Delete
                                            </button>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endisset
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <div class="row flex">
                            <div class="mb-4 mx-3 text-gray-900 dark:text-white font-bold text-xl mb-2">
                                <h3>Closest Interviews</h3>
                            </div>
                        </div>
    
                        @isset($closest_interview)
                            <ul class="space-y-4">
                                @foreach ($closest_interview as $item)
                                    <li class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-md p-4">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                                    {{ $item->location }} | {{ $item->organazaion }}
                                                </p>
                                                <div class="text-gray-900 dark:text-white font-bold text-xl mb-2">
                                                    <a href="{!! $item->url !!}">{{ $item->title }}</a>
                                                </div>
                                                {{-- <p class="text-gray-700 dark:text-gray-300 text-base mb-2">
                                                    {!! Str::words('Lorem ipsum dolor', 2, ' ...') !!}
                                                </p> --}}
                                                <div class="flex-none">
                                                    <div class="text-sm">
                                                        <p class="text-gray-900 dark:text-gray-300 leading-none">
                                                            @isset($item->apply_link)
                                                                <a href="{!! $item->apply_link !!}" class="exotic-links text-blue-500 hover:text-blue-700">Apply Link</a>
                                                            @endisset
                                                            @isset($item->email)
                                                                <span class="ml-2">{{ $item->email }}</span>
                                                            @endisset
                                                        </p>
                                                        <p class="text-gray-600 dark:text-gray-400">
                                                            Created At: {{ $item->created_at }}
                                                        </p>
                                                        <p class="text-gray-600 dark:text-gray-400">
                                                            Updated At: {{ $item->updated_at }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-none">
                                                <div class="text-sm">
                                                    <p class="text-gray-600 dark:text-gray-400">
                                                        Deadline: {{ $item->deadline_at }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-end mt-4">
                                            @isset($item->application)
                                            <a href="{{ route('application.view', ['position' => $item, 'application' => $item->application]) }}" class="text-blue-500 hover:text-blue-700 mr-2">view Application</a>
                                            <a href="{{ route('application.edit', ['position' => $item, 'application' => $item->application]) }}" class="text-blue-500 hover:text-blue-700 mr-2">Update application</a>
                                            @endisset
                                            <button type="button" wire:click="deleteId({{ $item->id }})" class="text-red-500 hover:text-red-700">
                                                Delete
                                            </button>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
