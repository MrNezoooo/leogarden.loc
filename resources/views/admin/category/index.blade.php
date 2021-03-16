@extends('admin.admin_master')

@section('admin')
{{--<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Всі категорії
        </h2>

    </x-slot>--}}

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

                                <div class="card-header">Всі Категорії</div>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">№</th>
                                        <th scope="col">Імя Категорії</th>
                                        <th scope="col">Добавив (Імя)</th>
                                        <th scope="col">Добавлено (Дата)</th>
                                        <th scope="col">Дія</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    {{--@php($i = 1)--}}
                                    @foreach($categories as $category)
                                    <tr>
                                        <th scope="row"> {{ $categories->firstItem()+$loop->index }} </th> {{-- $i++ --}}
                                        <td> {{ $category->category_name }} </td>

                                        <td> {{ $category->user->name }} </td> {{--  I спосіб --}}
                                        {{-- user_id --}} {{--  II(a) спосіб (з допомогою query bilder) --}}
                                        {{--  $category->name --}} {{--  II(b) спосіб (з допомогою query bilder)реалізовано підстановку з іншої таблички поля  --}}

                                        <td>
                                        @if ( $category->created_at == NULL) {{--  пофіксино --}}
                                            <span class="text-danger"> Дата не введена!</span>
                                        @else
                                              {{--  {{ $category->created_at->diffForHumans() }} </td>--}}  {{--  I спосіб (з допомогою query bilder)--}}

                                        {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }} {{--  II спосіб (з допомогою query bilder)--}}
                                        @endif
                                        </td>

                                        {{--Дія--}}
                                        <td>
                                            <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">  <i class="right fas fa-edit"></i> </a> {{-- Редагувати --}}
                                            <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-danger">  <i class="right fas fa-trash-alt"></i> <i/> </a>  {{-- Видалити --}}
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                                {{ $categories->links() }} {{--paginate(5)--}}

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Добавити Категорію</div>
                                <div class="card-body">

                                    <form method="POST" action=" {{ route('store.category') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Імя категорії</label>
                                            <input name="category_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                            @error('category_name')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror

                                        </div>


                                        <button type="submit" class="btn btn-primary">Добавити категорію</button>
                                    </form>
                                </div>

                            </div>
                        </div>

            </div>
        </div>

        {{------ Trash Part--SoftDeletes -------------}}
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header">Смітник з видаленими категоріями</div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Імя Видаленої Категорії</th>
                                <th scope="col">Дія</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($trashCat as $category)
                                <tr>
                                    <th scope="row"> {{ $trashCat->firstItem()+$loop->index }} </th>
                                    <td> {{ $category->category_name }} </td>

                                    {{--Дія--}}
                                    <td>
                                        <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-info">Відновти</a>
                                        <a href="{{ url('delete/category/'.$category->id) }}" class="btn btn-danger">Видалити Остаточно</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        {{ $trashCat->links() }} {{--paginate(3)--}}

                    </div>
                </div>

                <div class="col-md-4"></div>

            </div>
        </div>
        {{--------------  End Trash -----------------------}}

    </div>
{{--</x-app-layout>--}}
@endsection
