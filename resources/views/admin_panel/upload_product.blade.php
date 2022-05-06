@extends('layouts.admin')
@section('title-block')Upload Product @endsection

@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <form enctype="multipart/form-data" action="{{ route('admin.productSubmit') }}" method="post" class="form col-md-16 col-xs-6">
                    @csrf
                    <div class="form-group">
                        <label for="name">Наименование</label>
                        <input type="text" name="name" placeholder="Name" id="name" class="form-control">
                    </div>

                    <label for="category">Категория</label><br>
                    <select class="form-select mt-3" name="category">
                        
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    
                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input type="number" name="price" placeholder="price" id="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <label for="stock" class="form-check-label">Наличие</label>
                            <input type="checkbox" name="stock" placeholder="stock" id="stock" class="form-check-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sale">Размер скидки, %</label>
                        <input type="number" name="sale" placeholder="sale" id="sale" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Короткое описание</label>
                        <textarea name="short_description" placeholder="short_description" id="short_description" class="form-control richtextarea" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="description">Полное описание</label>
                        <textarea name="description" placeholder="description" id="description" class="form-control richtextarea" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="images">Изображения</label>
                        <input required type="file"  name="images[]" placeholder="images" id="images" class="form-control" multiple>
                    </div>

                    <button type="submit" id="btn-form" class="form-control">Подтвердить</button>
                </form>
            </div>
        </div>
    </div>
@endsection