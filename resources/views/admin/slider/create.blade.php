@extends('admin.admin_master')

@section('admin')

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Створити слайдер</h2>
            </div>
            <div class="card-body">

                <form method="POST" action=" {{ route('store.slider') }} " enctype="multipart/form-data">  {{--enctype ОБОВЯЗКОВО ВКАЗУВАТИ ДЛЯ КАРТИНОК--}}
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заголовок Слайдера</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Введіть заголовок">
                        <span class="mt-2 d-block">Поле не є обовязкове.</span>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Текстове Поле</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Фото Слайдера</label>
                        <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Створити</button>
                    </div>
                </form>
            </div>
        </div>


@endsection
