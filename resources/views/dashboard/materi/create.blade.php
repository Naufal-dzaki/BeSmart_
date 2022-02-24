@extends('dashboard.main')

@section('DashboardContent')
    <h1 class="text-3xl text-black pb-4">Membuat Materi Baru</h1>

    <div class="form-control ">
        <form method="post" action="/dashboard/learns">
            @csrf
            <div class="w-full mb-3 mt-4">
                <label class="label label-text mb-1 pb-1" for="judul">
                  Judul
                </label>
                <input type="text" placeholder="Type here" class="input input-bordered w-10/12" id="judul" name="judul" required autofocus value="{{ old('judul') }}">
                @error('judul')
                <div class="alert-error">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="w-full mb-3 mt-4">
                <label class="label label-text mb-1 pb-1" for="slug">
                  slug
                </label>
                <input type="text" class="input input-bordered w-10/12" id="slug" name="slug" value="{{ old('slug') }}">
                @error('slug')
                <div class="alert-error">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <input type="hidden" id="image" name="image" value="materi.png">

            <div class="w-10/12">
                <label class="label" for="subject">
                  <span class="label-text">Mata Pelajaran</span>
                </label>
                <select class="select select-bordered" name="subject_id">
                    @foreach ($subjects as $subject)
                    @if ( old('subject_id') == $subject->id)
                    <option value="{{ $subject->id }}" selected>{{ $subject->name }}</option>
                    @else
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="w-full mb-3 mt-4">
                <label class="label label-text mb-1 pb-1" for="bab">
                  bab
                </label>
                <input type="number" placeholder="Type here" class="input input-bordered w-10/12" id="bab" name="bab" required value="{{ old('bab') }}">
                @error('bab')
                <div class="alert-error">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="w-full mb-3 mt-4">
                <label class="label label-text mb-1 pb-1" for="body">
                  body
                </label>
                <input type="hidden" id="body" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
                @error('body')
                <div class="alert-error">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <input type="hidden" id="tipe" name="tipe" value="0">

            <div class="w-full mb-3 mt-4">
                <label class="label label-text mb-1 pb-1" for="link">
                  link
                </label>
                <input type="text" placeholder="Type here" class="input input-bordered w-10/12" id="link" name="link" required value="{{ old('link') }}">
                @error('link')
                <div class="alert-error">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-primary"><i data-feather="file-plus" class="mr-2 text-bwhite "></i>Buat Materi</button>
        </form>
    </div>

    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function(){
            fetch('/dashboard/learns/checkSlug?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
    </script>
@endsection
