<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("List Information") }} <br><br>
                    <form method="post" action="{{ route('post.update', $catatan->id) }}">
                        @method('PUT')
                      @csrf
                      <select class="select select-bordered w-full max-w-xs" name="kategori">
                        @foreach ($kategori as $index => $Item)
                            <option value="{{ $Item->id }}">{{ $Item->kategori }}</option>
                            @endforeach
                      </select>
                      <br><br>
                  <textarea placeholder="Berikan judul" class="textarea textarea-bordered textarea-xs w-full max-w-xs" name="judul">{{ $catatan->judul }}</textarea> <br>
                  <textarea placeholder="Tambahkan kegiatan?" class="textarea textarea-bordered textarea-xs w-full max-w-xs" name="kegiatan">{{ $catatan->kegiatan }}</textarea>
                  <button class="btn btn-outline">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
