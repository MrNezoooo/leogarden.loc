@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>Це домашня сторінка</p>--}}{{--старий зпаис--}}{{----}}{{-- <x-jet-welcome />--}}{{--
             </div>
         </div>--}}
        <div class="container">
            <div class="row">

                <h4>Home Slider</h4>
                <a href="{{ route('add.slider') }}"> <button class="btn btn-info">Добавити слайдер</button></a>
                <br><br>

                <div class="col-md-12">
                    <div class="card">

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"> {{--https://getbootstrap.com/docs/5.0/components/alerts/--}}
                                <strong>Holy guacamole! Повідомлення - {{ session ('success') }} </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card-header">Всі Слайдери</div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">№</th>
                                <th scope="col" width="15%">Заголовок</th>
                                <th scope="col" width="25%">Опис</th>
                                <th scope="col" width="15%">Банер</th>
                                <th scope="col" width="15%">Дія</th>
                            </tr>
                            </thead>
                            <tbody>

                          @php($i = 1)

                            @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row"> {{ $i++ }} </th> {{-- $i++ --}}
                                    <td> {{ $slider->title }} </td>
                                    <td> {{ $slider->description }} </td>
                                    <td> <img src="{{ asset($slider->image) }}" style="height:40px; width:70px; " alt="{{ $slider->title }}"> </td>  {{-- asset зробить видимим картинку --}}


                                    {{--Дія--}}
                                    <td>
                                        <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">Редагувати</a>
                                        <a href="{{ url('slider/delete/'.$slider->id) }}" onclick="return confirm('Ти впевнений що хочеш видалити цей слайдер?')" class="btn btn-danger">Видалити</a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection

