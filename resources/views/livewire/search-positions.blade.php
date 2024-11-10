<div>
    
    <!-- Positions List -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6">
            <!-- Search Bar -->
            <div class="mb-4">
                <input type="text" wire:model.live.debounce.300ms="search" wire:keydown.enter="filter"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       placeholder="Search positions by title, location, or organization...">
            </div>
            @if($positions->isNotEmpty())
                <ul class="space-y-4">
                    @foreach ($positions as $item)
                        <li class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-md p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $item->location }} | {{ $item->organazaion }} <!-- Corrected spelling -->
                                    </p>
                                    <div class="text-gray-900 dark:text-white font-bold text-xl mb-2">
                                        <a href="{{ $item->url }}">{{ $item->title }}</a>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300 text-base mb-2">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                    </p>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm">
                                        @isset($item->apply_link)
                                            <p class="text-gray-900 dark:text-gray-300">
                                                <a target="_blank" href="{{ $item->apply_link }}" class="text-blue-500 hover:text-blue-700">Apply Link</a>
                                            </p>
                                            <hr>
                                        @endisset
                                        
                                        @isset($item->email)
                                            <p class="text-gray-900 dark:text-gray-300">
                                                <a href="mailto:{{ $item->email }}" class="text-blue-500 hover:text-blue-700">Send email to: {{ $item->email }}</a>
                                            </p>
                                            <hr>
                                        @endisset
                                        
                                        <p class="text-gray-600 dark:text-gray-400">
                                            Deadline: {{ \Carbon\Carbon::parse($item->deadline_at)->diffForHumans() }}
                                        </p>
                                        <hr>
                                        <p class="text-gray-600 dark:text-gray-400">
                                            Created At: {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }} | Updated At: {{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $positions->links() }} <!-- Generates pagination links automatically -->
                </div>
            @else
                <p class="text-gray-600 dark:text-gray-300">No positions found.</p>
            @endif
        </div>
    </div>
</div>