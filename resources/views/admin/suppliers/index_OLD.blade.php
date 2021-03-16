<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Список Постачальників
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

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{--https://getbootstrap.com/docs/5.0/components/alerts/--}}
                                <strong>Holy guacamole! Повідомлення - {{ session ('success') }} </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card-header">Всі Постачальникі</div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Імя Постачальника</th>
                                <th scope="col">Логотип</th>
                                <th scope="col">Добавлено (дата)</th>
                                <th scope="col">Дія</th>
                            </tr>
                            </thead>
                            <tbody>

                            {{--@php($i = 1)--}}
                            @foreach($suppliers as $supplier)
                                <tr>
                                    <th scope="row"> {{ $suppliers->firstItem()+$loop->index }} </th> {{-- $i++ --}}
                                    <td> {{ $supplier->supplier_name }} </td>

                                    <td> <img src="{{ asset($supplier->supplier_image) }}" style="height:40px; width:70px; " alt="{{ $supplier->supplier_name }}"> </td>  {{-- asset зробить видимим картинку --}}


                                    <td>
                                        @if ( $supplier->created_at == NULL)   пофіксино
                                        <span class="text-danger"> Дата не введена!</span>
                                        @else
                                            {{ Carbon\Carbon::parse($supplier->created_at)->diffForHumans() }}
                                        @endif
                                    </td>

                                    {{--Дія--}}
                                    <td>
                                        <a href="{{ url('supplier/edit/'.$supplier->id) }}" class="btn btn-info">Редагувати</a>
                                        <a href="{{ url('supplier/delete/'.$supplier->id) }}" onclick="return confirm('Ти впевнений що хочеш видалити цього постачальника?')" class="btn btn-danger">Видалити</a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        {{ $suppliers->links() }} {{--paginate(5)--}}

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Добавити Нового Постачальника</div>
                        <div class="card-body">

                            <form method="POST" action=" {{ route('store.supplier') }} " enctype="multipart/form-data">  {{--enctype ОБОВЯЗКОВО ВКАЗУВАТИ ДЛЯ КАРТИНОК--}}
                                @csrf

                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Ім'я постачальника</label>
                                    <input name="supplier_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    @error('supplier_name')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Логотип постачальника</label>
                                    <input name="supplier_image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    @error('supplier_image')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>



                                <button type="submit" class="btn btn-primary">Добавити Нового Постачальника</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>
</x-app-layout>

