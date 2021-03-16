@extends('admin.admin_master')
@section('admin')
<div class="py-12">
    {{---------count products-------------------------}}
    <div class="font-semibold text-xl text-grey-800 leading-tight">
        <b style="float: right"> Загальна Кількість Товарів
            <span class="badge badge-danger"> {{ count($products) }} </span>
        </b>
    </div>
<div class="container">

    <div class="row">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Імя Товару</th>
            <th scope="col">Категорія</th>
            <th scope="col">Постачальник</th>
            <th scope="col">Ціна</th>
            <th scope="col">Дата</th>
            <th scope="col">Редагувати</th>
            <th scope="col">Видалити</th>
        </tr>
        </thead>
        <tbody>
        @php($i = 1)
        @foreach($products as $product)
        <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $product->product_name }}</td>  {{-- Імя Товару --}}
            <td>{{ $product->category->category_name }}</td> {{-- Категорія --}}
            <td>{{ $product->supplier->supplier_name }}</td> {{-- Постачальник --}}
            <td>{{ $product->selling_price }}</td> {{-- Ціна --}}
            <td> {{ Carbon\Carbon::parse($product->created_at)->diffForHumans() }} </td> {{-- Дата --}}

            <td><a href="{{ url('category/edit/'.$product->id) }}" class="btn btn-info">Редагувати</a></td>
            <td><a href="{{ url('softdelete/category/'.$product->id) }}" class="btn btn-danger">Видалити</a></td>

        </tr>
        @endforeach
        </tbody>
    </table>

    </div>
</div>
</div>
@endsection
