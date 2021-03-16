<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редагуваня Категорії
        </h2>

    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>Це домашня сторінка</p>--}}{{--старий зпаис--}}{{----}}{{-- <x-jet-welcome />--}}{{--
             </div>
         </div>--}}
        <div class="container">
            <div class="row">


                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Редагуваня Категорії</div>
                        <div class="card-body">

                            <form method="POST" action=" {{ url('category/update/'.$categories->id) }} ">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Оновити категорію</label>
                                    <input value="{{ $categories->category_name }}" name="category_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    @error('category_name')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                </div>


                                <button type="submit" class="btn btn-primary">Оновити категорію</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>

