<div class="h-full min-h-screen">
    <x-app-layout>
        <div class="flex flex-col items-center py-6">
            <div class="w-full max-w-md sm:px-4 lg:px-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
                    <div class="p-4">
                        <div class="flex justify-between items-center">
                            <!-- Toolbar Menu -->
                            <menu class="flex space-x-4 text-sm">
                                <li class="list-none text-gray-700 dark:text-gray-300">
                                    <a href="{{ route('open-main-window', ['name'=>'dashboard'])}}" class="hover:text-blue-500" >Open Main Window</a>
                                </li>
                            </menu>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                                <a href="{{ route('open-main-window', ['name'=>'positions.new']) }}" class="text-blue-500 hover:text-blue-700 text-sm">New Position</a>
                            </h3>
                        </div>

                        
                    </div>
                </div>
                <!-- Tabs Container -->
                <div class="py-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                @isset($closest_deadlines)
                                    <ul class="space-y-4">
                                        @foreach ($closest_deadlines as $item)
                                            <li class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-md p-4">
                                                <div class="justify-between items-start">
                                                    <div class="flex-none text-right">
                                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                                            Deadline: {{ \Carbon\Carbon::parse($item->deadline_at)->diffForHumans() }}
                                                        </p>
                                                    </div>
                                                    <div class="flex-grow">
                                                        <div class="text-gray-900 dark:text-white font-semibold text-base">
                                                            <h4>{{ $item->title }}</h4>
                                                        </div>
                                                        
                                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                                            {{ $item->location }} | {{ $item->organazaion }}
                                                        </p>
                                                    </div>
                                                    
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endisset
                            </div>
            
                            <!-- Closest Interviews Tab -->
                            <div x-show="tab === 'interviews'">
                                @isset($closest_interview)
                                    <ul class="space-y-4">
                                        @foreach ($closest_interview as $item)
                                            <li class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-md p-4">
                                                <div class="justify-between items-start">
                                                    <div class="flex-none text-right">
                                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                                            Deadline: {{ \Carbon\Carbon::parse($item->deadline_at)->diffForHumans() }}
                                                        </p>
                                                    </div>
                                                    <div class="flex-grow">
                                                        <div class="text-gray-900 dark:text-white font-semibold text-base">
                                                            <h4>{{ $item->title }}</h4>
                                                        </div>
                                                        
                                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                                            {{ $item->location }} | {{ $item->organazaion }}
                                                        </p>
                                                    </div>
                                                    
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
        </div>
    </x-app-layout>
</div>
