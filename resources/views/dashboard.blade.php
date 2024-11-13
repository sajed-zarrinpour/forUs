<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Tabs Container -->
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div x-data="{ tab: 'deadlines' }" class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <!-- Tab Buttons -->
            <div class="flex justify-around bg-gray-100 dark:bg-gray-900 p-4">
                <button
                    :class="tab === 'deadlines' ? 'text-blue-500 border-b-2 border-blue-500' : 'text-gray-600 dark:text-gray-300'"
                    class="px-4 py-2 focus:outline-none"
                    @click="tab = 'deadlines'">
                    Closest Deadlines
                </button>
                <button
                    :class="tab === 'interviews' ? 'text-blue-500 border-b-2 border-blue-500' : 'text-gray-600 dark:text-gray-300'"
                    class="px-4 py-2 focus:outline-none"
                    @click="tab = 'interviews'">
                    Closest Interviews
                </button>
            </div>

            <!-- Tab Content -->
            <div class="p-6">
                <!-- Closest Deadlines Tab -->
                <div x-show="tab === 'deadlines'">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Closest Deadlines</h3>
                        <a href="{{ route('positions.new') }}" class="text-blue-500 hover:text-blue-700 text-sm">New Position</a>
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
                                            <div class="text-sm">
                                                @isset($item->apply_link)
                                                    <p class="py-1 text-gray-900 dark:text-gray-300 leading-none">
                                                        <span class="py-2">Apply Link:</span><br>
                                                        <a href="{!! $item->apply_link !!}" class="exotic-links text-blue-500 hover:text-blue-700">{!! $item->apply_link !!}</a>
                                                    </p><hr>
                                                    @endisset
                                                    @isset($item->email)
                                                    <p class="py-1 text-gray-900 dark:text-gray-300 leading-none">
                                                        <span class="ml-2">{{ $item->email }}</span>
                                                    </p>
                                                    @endisset
                                                <p class="text-gray-600 dark:text-gray-400">Created At: {{ $item->created_at }}</p>
                                                <p class="text-gray-600 dark:text-gray-400">Updated At: {{ $item->updated_at }}</p>
                                            </div>
                                        </div>
                                        <div class="flex-none">
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                Deadline: {{ $item->deadline_at }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end mt-4">
                                        @if ($item->application)
                                            <a href="{{ route('application.view', ['position' => $item, 'application' => $item->application]) }}" class="text-blue-500 hover:text-blue-700 mr-2">View Application</a>
                                            <a href="{{ route('position.edit', ['position' => $item]) }}" class="text-blue-500 hover:text-blue-700 mr-2">Update Position</a>
                                            <button type="button" wire:click="deleteId({{ $item->id }})" class="text-red-500 hover:text-red-700">Delete</button>
                                        @else
                                            <a href="{{ route('application.new', ['position'=> $item]) }}" class="text-blue-500 hover:text-blue-700 mr-2">New Application</a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endisset
                </div>

                <!-- Closest Interviews Tab -->
                <div x-show="tab === 'interviews'">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Closest Interviews</h3>
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
                                            <div class="text-sm">
                                                <p class="text-gray-900 dark:text-gray-300 leading-none">
                                                    @isset($item->apply_link)
                                                        <a href="{!! $item->apply_link !!}" class="exotic-links text-blue-500 hover:text-blue-700">Apply Link</a>
                                                    @endisset
                                                    @isset($item->email)
                                                        <span class="ml-2">{{ $item->email }}</span>
                                                    @endisset
                                                </p>
                                                <p class="text-gray-600 dark:text-gray-400">Created At: {{ $item->created_at }}</p>
                                                <p class="text-gray-600 dark:text-gray-400">Updated At: {{ $item->updated_at }}</p>
                                            </div>
                                        </div>
                                        <div class="flex-none">
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                Deadline: {{ $item->deadline_at }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end mt-4">
                                        @if ($item->application)
                                            <a href="{{ route('application.view', ['position' => $item, 'application' => $item->application]) }}" class="text-blue-500 hover:text-blue-700 mr-2">View Application</a>
                                            <a href="{{ route('application.edit', ['position' => $item, 'application' => $item->application]) }}" class="text-blue-500 hover:text-blue-700 mr-2">Update Application</a>
                                            <button type="button" wire:click="deleteId({{ $item->id }})" class="text-red-500 hover:text-red-700">Delete</button>
                                        @else
                                            <a href="{{ route('application.new', ['position'=> $item]) }}" class="text-blue-500 hover:text-blue-700 mr-2">New Application</a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>