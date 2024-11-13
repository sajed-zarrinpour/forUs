<div>
    <div class="flex">
        <div class="py-12 w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <div class="container mx-auto p-6">
                            <h1 class="text-2xl font-bold mb-6">Application Form</h1>
                        
                            @if (session()->has('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                                    <strong class="font-bold">Success!</strong>
                                    <span class="block sm:inline">{{ session('success') }}</span>
                                </div>
                            @endif
                        
                            <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-6">
                                <!-- Email Field -->
{{--                     
                                <div class="grid items-end gap-6 mb-6">
                                    <div class="relative">
                                        <input type="text" wire:model.defer="form.email" id="email" 
                                            class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder="example@example.com">
                                        <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email Text</label>
                                        @error('email')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="relative">
                                    <label for="email" class=" text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email Text</label>
                                    <textarea wire:model.defer="form.email" id="email" rows="4" 
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm 
                                        focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                        
                                <div class="grid items-end gap-6 mb-6 md:grid-cols-2">
                                    <!-- Applied At Date Field -->
                                    <div class="grid items-end gap-6 mb-6">
                                        <div class="relative">
                                            <input type="date" wire:model.defer="form.applied_at" id="applied_at" 
                                            class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                            <label for="applied_at" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Applied At</label>
                                            @error('applied_at')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <!-- Interview At Date Field -->
                                    <div class="grid items-end gap-6 mb-6">
                                        <div class="relative">
                                            <input type="date" wire:model.defer="form.interview_at" id="interview_at" 
                                            class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                            <label for="interview_at" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Interview At</label>
                                            @error('interview_at')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="grid items-end gap-6 mb-6 md:grid-cols-2">
                                    <!-- File Uploads -->
                                    @foreach (['sop', 'motivation_letter', 'cv', 'tr_bachelor', 'tr_master', 'tr_phd', 'crt_bachelor', 'crt_master', 'crt_phd', 'custom_form', 'refrence_letter'] as $field)
                                    <div class="grid items-end gap-6 mb-6">
                                        <div class="relative">
                                            
                                            <label for="{{ $field }}" class="block text-sm font-medium text-gray-700 capitalize">{{ str_replace('_', ' ', $field) }}</label>
                                            <input type="file" wire:model="{{ 'form.'.$field }}" id="{{ $field }}" 
                                            class="block rounded-t-lg px-2.5 pb-1.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                            @error($field)
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                            @isset($form->$field)
                                                @if ($form->$field instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
                                                    {{-- <embed src= "{{ route('serve-temp', ['filepath'=>$form->application->$field]) /*$form->$field->temporaryUrl()*/ }}" width= "500" height= "625"> --}}
                                                @else
                                                        <embed class="mx-auto mt-2" src= "{{ route('serve', ['filepath'=>$form->application->$field]) }}" width= "400" height= "525">
                                                @endif
                                            @endisset
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                        
                                <!-- Hidden Position ID -->
                                <input type="hidden" wire:model="form.position_id" value="{{ $position_id }}">
                        
                                <!-- Additional Info Field -->
                                <div class="relative">
                                    <label for="additional_info" class=" text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Additional Info</label>
                                    <textarea wire:model.defer="form.additional_info" id="additional_info" rows="4" 
                                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm 
                                        focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                    @error('additional_info')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                        
                                <!-- Submit Button -->
                                <div>
                                    <button type="submit" 
                                        class="inline-flex justify-center py-2 px-4 border border-transparent 
                                        shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 
                                        hover:bg-indigo-700 focus:outline-none focus:ring-2 
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                        Submit Application
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>