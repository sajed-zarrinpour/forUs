<div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Position') }}
            </h2>
        </x-slot>
        <div class="flex">
            <div class="py-12 w-full max-w-xl">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6">
                            <form wire:submit.prevent="save" class="space-y-6">
                                
                                <!-- Title -->
                                <div class="grid items-end gap-6 mb-6">
                                    <div class="relative">
                                        <input type="text" wire:model="form.title" id="title" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                        <label for="title" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Title</label>
                                        @error('form.title') 
                                            <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- URL -->
                                <div class="grid items-end gap-6 mb-6">
                                    <div class="relative">
                                        <input type="text" wire:model="form.url" id="url" id="small_filled" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                        <label for="url" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">URL</label>
                                        @error('form.url') 
                                            <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                             
                                <div class="grid items-end gap-6 mb-6 md:grid-cols-2">
                                    <!-- Organization -->
                                    <div class="grid items-end gap-6 mb-6">
                                        <div class="relative">
                                            <input type="text" wire:model="form.organazaion" id="organization" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                            <label for="organization" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Organization</label>
                                            @error('form.organazaion') 
                                                <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <!-- Location -->
                                    <div class="grid items-end gap-6 mb-6">
                                        <div class="relative">
                                            <input type="text" wire:model="form.location" id="location" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                            <label for="location" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Location</label>
                                            @error('form.location') 
                                                <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="grid items-end gap-6 mb-6 md:grid-cols-2">
                                    <!-- Apply Link -->
                                    <div class="grid items-end gap-6 mb-6">
                                        <div class="relative">
                                            <input type="text" wire:model="form.apply_link" id="apply_link" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                            <label for="apply_link" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Apply Link</label>
                                            @error('form.apply_link') 
                                                <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <!-- Email -->
                                    <div class="grid items-end gap-6 mb-6">
                                        <div class="relative">
                                            <input type="email" wire:model="form.email" id="email" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                            <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email</label>
                                            @error('form.email') 
                                                <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                                <!-- Deadline -->
                                <div>
                                    <div class="relative">
                                        <input type="date" wire:model="form.deadline_at" id="deadline_at" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                        <label for="deadline_at" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Deadline</label>
                                        @error('form.deadline_at') 
                                            <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
    
                                <!-- Submit Button -->
                                <div class="flex items-center justify-between">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                        Save
                                        <div wire:loading class="ml-2">
                                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                            </svg>
                                        </div>
                                    </button>
                                </div>
    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>


{{-- 
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Position') }}
        </h2>
    </x-slot>
    <div class="flex flex-wrap">
        <div class="py-12 w-full max-w-xl mb-8 lg:mb-0">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <form wire:submit.prevent="save" class="space-y-6">
                            <!-- Title -->
                            <div class="grid items-end gap-6 mb-6">
                                <div class="relative">
                                    <input type="text" wire:model="form.title" id="title" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="title" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Title</label>
                                    @error('form.title') 
                                        <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- URL -->
                            <div class="grid items-end gap-6 mb-6">
                                <div class="relative">
                                    <input type="text" wire:model="form.url" id="url" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                    <label for="url" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">URL</label>
                                    @error('form.url') 
                                        <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid items-end gap-6 mb-6 md:grid-cols-2">
                                <!-- Organization -->
                                <div class="grid items-end gap-6 mb-6">
                                    <div class="relative">
                                        <input type="text" wire:model="form.organization" id="organization" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                        <label for="organization" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Organization</label>
                                        @error('form.organization') 
                                            <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="grid items-end gap-6 mb-6">
                                    <div class="relative">
                                        <input type="text" wire:model="form.location" id="location" ```html
                                        class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                        <label for="location" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Location</label>
                                        @error('form.location') 
                                            <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid items-end gap-6 mb-6 md:grid-cols-2">
                                <!-- Apply Link -->
                                <div class="grid items-end gap-6 mb-6">
                                    <div class="relative">
                                        <input type="text" wire:model="form.apply_link" id="apply_link" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                        <label for="apply_link" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Apply Link</label>
                                        @error('form.apply_link') 
                                            <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <!-- Email -->
                                <div class="grid items-end gap-6 mb-6">
                                    <div class="relative">
                                        <input type="email" wire:model="form.email" id="email" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                        <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Email</label>
                                        @error('form.email') 
                                            <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <!-- Deadline -->
                                    <div>
                                        <div class="relative">
                                            <input type="date" wire:model="form.deadline_at" id="deadline_at" class="block rounded-t-lg px-2.5 pb-1.5 pt-4 text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                            <label for="deadline_at" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3">Deadline</label>
                                            @error('form.deadline_at') 
                                                <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <!-- Submit Button -->
                                    <div class="flex items-center justify-between">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                            Save
                                            <div wire:loading class="ml-2">
                                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                                </svg>
                                            </div>
                                        </button>
                                    </div>
    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="py-12 w-full max-w-xl">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                            @isset($positions)
                                <ul class="space-y-4">
                                    @foreach ($positions as $item)
                                        <li class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-md p-4">
                                            <div class="flex justify-between items-start">
                                                <div>
                                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                                        {{ $item->location }} | {{ $item->organazaion }}
                                                    </p>
                                                    <div class="text-gray-900 dark:text-white font-bold text-xl mb-2">
                                                        <a href="{!! $item->url !!}">{{ $item->title }}</a>
                                                    </div>
                                                    <p class="text-gray-700 dark:text-gray-300 text-base mb-2">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                                                    </p>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-sm">
                                                        @isset($item->apply_link)
                                                            <p class="text-gray-900 dark:text-gray-300">
                                                                <a target="_blank" href="{{$item->apply_link}}" class="text-blue-500 hover:text-blue-700">Apply Link</a>
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
                                                            Deadline: {{ $item->deadline_at }} ({{\Carbon\Carbon::parse($item->deadline_at)->diffForHumans()}})
                                                        </p>
                                                        <hr>
                                                        <p class="text-gray-600 dark:text-gray-400">
                                                            Created At: {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }} | Updated At: {{ \Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-end mt-4">
                                                <a href="{{ route('application.new') }}" class="text-blue-500 hover:text-blue-700 mr-2">New Application</a>
                                                <a href="{{ route('position.edit', ['position' => $item]) }}" class="text-blue-500 hover:text-blue-700 mr-2">Update Position</a>
                                                
                                                <button
                                                    type="button"
                                                    wire:click="delete({{$item->id}})"
                                                    wire:confirm="Are you sure you want to delete this post?"
                                                    class="inline-flex items-center px-4 bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                                                >
                                                    Delete
                                                    <div wire:loading class="ml-2">
                                                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                                        </svg>
                                                    </div> 
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
    </div> --}}