<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Multi Picture
        </h2>

    </x-slot>

    <div class="py-12">

        <div class="container">
            <div class="row">

                <div class="col-md-8">
                   <div class="card-group">
                        @foreach($images as $multi)
                            <div class="col-md-4 mt-5">
                                <div class="card">
                                    <img src=" {{ asset($multi->image) }}" alt="">
                                </div>
                            </div>
                       @endforeach
                   </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Multi Image</div>
                        <div class="card-body">

                            <form method="POST" action=" {{ route('store.image') }} " enctype="multipart/form-data">  {{--enctype ОБОВЯЗКОВО ВКАЗУВАТИ ДЛЯ КАРТИНОК--}}
                                @csrf


                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Логотип постачальника</label>
                                    <input multiple="" name="image[]" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    {{-- !!! Якщо ми вживаєм multiple="" ЗМОЖЕМО ЗАГРУЖАТИ БАГАТО ФОТО ЗРАЗУ  CTRL  --}}

                                    @error('image')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>



                                <button type="submit" class="btn btn-primary">Добавити фото</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>
</x-app-layout>

