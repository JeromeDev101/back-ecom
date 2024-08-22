<div>
    <x-page-header back="true" link="{{ route('curriculum-national-tvet.file') }}">Edit Certificates</x-page-header>

    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="save">

            <div class="grid gap-4 mb-3 grid-col-1">
                <div>
                    <x-label>Replace Image</x-label>
                    <x-input type="file" wire:model="files.newFile" accept="image/x-png,image/gif,image/jpeg" />

                    @if ($files['path'])
                        <a href="{{ asset('storage/'.$files['path']) }}" target="_blank">
                            <img class="h-auto max-w-lg p-2 mt-2 border rounded-lg" style="height: 150px;" src="{{ asset('storage/'.$files['path']) }}" alt="{{ $files['orig_file_name'] }}">
                        </a>
                    @endif

                    @error('files.newFile')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="grid gap-4 mb-3 grid-col-1">
                <div>
                    <x-label :required="true">Banner Text</x-label>
                    <x-textarea model="files.banner_text" placeholder="Please add banner text..."/>
                    @error('files.banner_text')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="my-5 border-t border-gray-300"></div>

            <div class="mt-5">
                <x-custom-button type="submit" wire:loading.attr="disabled">
                    Save
                </x-custom-button>
            </div>

        </form>
    </div>
</div>
