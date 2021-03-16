@extends('admin.admin_master')

@section('admin')
    <div class="sl-page-title">
        <h5>Form Layouts</h5>
        <p>Forms are used to collect user information with different element types of input, select, checkboxes, radios and more.</p>
    </div><!-- sl-page-title -->


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Основні налаштування</div>
            <div class="card-body">

                <form method="post" action="{{ route('store.product') }} ">
                    @csrf
                    <div class="form-group">
                        <label for="product" class="form-label">Код товару</label>
                        <input name="product_code" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Введіть код товару">
                    </div>

                    <div class="form-group">
                        <label for="product" class="form-label">Назва товару</label>
                        <input name="product_name" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Введіть імя товару">
                    </div>

                    <div class="form-group">
                        <label for="category_id" >Виберіть Категорію</label>
                        <select  class="form-control" id="category_id">
                            <option value="1">Rubric 1</option>
                            <option value="2">Rubric 2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="product" class="form-label">Ціна</label>
                        <input name="product_quantity" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Введіть імя товару">
                    </div>

                        @error('')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror

                    </div>


                    <button type="submit" class="btn btn-primary">Добавити товар</button>
                </form>

          {{-- ---------------------------------------}}
            <div class="card pd-20 pd-sm-40">
                <form method="post" action="{{ route('store.product') }} enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <hr>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Назва: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name" placeholder="Введіть імя продукту">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Id (код): <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_code" placeholder="Введіть id(код) продукту">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Кількість: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_quantity" placeholder="Введіть кількість продукту">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Категорії: <span class="tx-danger">*</span></label>
                                <select name="category_id" class="form-control select2" data-placeholder="Виберіть категорію">
                                    <option label="Виберіть категорію"></option>
                                    <option value="USA">United States of America</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="China">China</option>
                                    <option value="Japan">Japan</option>
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Підкатегорії: <span class="tx-danger">*</span></label>
                                <select name="subcategory_id" class="form-control select2" {{--data-placeholder="Choose country"--}}>

                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Бренд: <span class="tx-danger">*</span></label>
                                <select name="subcategory_id" class="form-control select2" data-placeholder="Choose country">
                                    <option label="Виберіть категорію"></option>
                                    <option value="USA">United States of America</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="China">China</option>
                                    <option value="Japan">Japan</option>
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        {{--------------}}
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <select class="form-control select2" data-placeholder="Choose Browser" multiple>
                                <option value="Firefox">Firefox</option>
                                <option value="Chrome selected">Chrome</option>
                                <option value="Safari"selected>Safari</option>
                                <option value="Opera" >Opera</option>
                                <option value="Internet Explorer">Internet Explorer</option>
                            </select>
                        </div><!-- col-4 -->
                        {{--------------}}

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Розмір: <span class="tx-danger">*</span></label>
                                <input id="size" type="text" data-role="tagsinput" class="form-control"  name="product_size" placeholder="Введіть розмір" value="/10, /11, /12" />
                            </div>
                        </div><!-- col-4 -->


                            <div class="form-group">
                                <label class="form-control-label">Колір: <span class="tx-danger">*</span></label>
                                <input id="color" type="text" data-role="tagsinput" class="form-control"  name="product_color" placeholder="Введіть колір" value="red, white, yelow, green" />
                            </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Ціна продажу: <span class="tx-danger">*</span></label>
                                <input  type="text"  class="form-control"  name="selling_price" placeholder="Введіть ціну" />
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Деталі продукту: <span class="tx-danger">*</span></label>
                                <input id="summernote" class="form-control" name="product_details">
                            </div>
                        </div><!-- col-12 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Лінк відео: <span class="tx-danger">*</span></label>
                                <input class="form-control" name="video_link" placeholder="Лінк відео">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Фото Перше (Головне): <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <input name="image_one" type="file" id="file" class="custom-file-input">
                                    <span class="custom-file-control"></span>
                                </label>
                            </div>
                        </div><!-- col-4 -->

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Фото Перше (Головне): </label>
                            <input class="form-control" type="file" id="formFile">
                        </div>


                        <div class="col-lg-8">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Mail Address: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="address" value="Market St. San Francisco" placeholder="Enter address">
                            </div>
                        </div><!-- col-8 -->
                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button  type="submit" class="btn btn-info mg-r-5">Добавити товар</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form>
            </div>
        </div>

        {{-- -----------bootstrap multi tags input cdn----------- --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        {{--<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
@endsection
