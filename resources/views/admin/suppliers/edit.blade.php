@extends('admin.admin_master')

@section('admin')
{{--<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редагуваня Постачальника
        </h2>

    </x-slot>--}}

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> {{--https://getbootstrap.com/docs/5.0/components/alerts/--}}
            <strong>Holy guacamole! Повідомлення - {{ session ('success') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
                        <div class="card-header">Редагуваня Постачальника</div>
                        <div class="card-body">

                            <form method="POST" action=" {{ url('supplier/update/'.$suppliers->id) }} " enctype="multipart/form-data">  {{--enctype ОБОВЯЗКОВО ВКАЗУВАТИ ДЛЯ КАРТИНОК--}}
                                @csrf

                                {{-- Висвітлення старої фото перед зміною --}}
                                <input type="hidden" name="old_image" value=" {{$suppliers->supplier_image}} ">

                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Оновити Імя Постачальника</label>
                                    <input value="{{ $suppliers->supplier_name }}" name="supplier_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    @error('supplier_name')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Оновити Фото Бренду Постачальника</label>
                                    <input type="file" value="{{ $suppliers->supplier_image }}" name="supplier_image"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                    @error('supplier_image')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <img src=" {{ asset($suppliers->supplier_image) }}"  style="width:400px; height:200px;">  {{--asset покаже картинку--}}
                                </div>


                                <button type="submit" class="btn btn-primary">Оновити Постачальника</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
{{--</x-app-layout>--}}
@endsection

