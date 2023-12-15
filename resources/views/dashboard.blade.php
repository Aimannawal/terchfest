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
                    <form method="post" action="/post">
                        @csrf
                        <select class="select select-bordered w-full max-w-xs" name="kategori">
                            @foreach ($kategori as $index => $Item)
                            <option value="{{ $Item->id }}">{{ $Item->kategori }}</option>
                            @endforeach
                        </select>
                        <br><br>
                    <textarea placeholder="Berikan judul" class="textarea textarea-bordered textarea-xs w-full max-w-xs" name="judul"></textarea> <br>
                    <textarea placeholder="Tambahkan kegiatan?" class="textarea textarea-bordered textarea-xs w-full max-w-xs" name="kegiatan"></textarea>
                   <br>
                    <button class="btn btn-outline">Submit</button>
                  </form>
                </div>
                <div class="overflow-x-auto">
                    <table class="table">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th>Hari</th>
                          <th>Judul</th>
                          <th>Option</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
@foreach ($catatan as $index => $Item)
    <tr>
        <td>{{ $Item->judul }}</td>
        <td>{{ $Item->kegiatan }}</td>
        <td>{{ $Item->kategori->kategori }}</td>
        <td>
            <button class="btn btn-warning"><a href="{{ route('post.edit',
                $Item->id) }}">Edit</a></button>
    
                  <form action="{{ route('post.destroy', $Item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-error" value="Delete">Delete</button>
        </td>
    </tr>
@endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>
