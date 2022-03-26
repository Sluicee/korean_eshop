@extends('layouts.admin')
@section('title-block')Edit {{$product->name}} @endsection

@section('content')
    <div class="section">
        <div class="container">
            <h1>Редактирование {{$product->name}}</h1>
            <div class="row">
                <form enctype="multipart/form-data" action="{{ route('admin.editProductSubmit', $product->id) }}" method="POST" class="form col-md-16 col-xs-6">
                    @csrf
                    <div class="form-group">
                        <label for="name">Наименование</label>
                        <input type="text" name="name" placeholder="Name" id="name" class="form-control" value="{{$product->name}}">
                    </div>

                    <label for="category">Категория</label><br>
                    <select class="form-select mt-3" name="category">
                        
                        @foreach($categories as $category)
                        @if ($category->id == $product->category)
                            <option value="{{ $category->id }}" selected>
                                {{ $category->name }}
                            </option>
                        @else
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endif
                        
                        @endforeach
                    </select>
                    
                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input type="number" name="price" placeholder="price" id="price" class="form-control" value="{{$product->price}}">
                    </div>

                    <div class="form-group">
                        <label for="stock" class="form-check-label">Наличие</label>
                        @if ($product->stock)
                            <input type="checkbox" name="stock" placeholder="stock" id="stock" class="form-check-input" checked>
                        @else
                            <input type="checkbox" name="stock" placeholder="stock" id="stock" class="form-check-input">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="sale">Размер скидки, %</label>
                        <input type="number" name="sale" placeholder="sale" id="sale" class="form-control" value="{{$product->sale}}">
                    </div>

                    <div class="form-group">
                        <label for="description">Короткое описание</label>
                        <textarea name="short_description" placeholder="short_description" id="short_description" class="form-control richtextarea" cols="30" rows="10">{{$product->short_description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="description">Полное описание</label>
                        <textarea name="description" placeholder="description" id="description" class="form-control richtextarea" cols="30" rows="10">{{$product->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="mass">Масса, г</label>
                        <input type="number" name="mass" placeholder="mass" id="mass" class="form-control" value="{{$product->mass}}">
                    </div>

                    <div class="form-group">
                        <label for="taste">Вкус</label>
                        <input type="text" name="taste" placeholder="taste" id="taste" class="form-control" value="{{$product->taste}}">
                    </div>

                    <div class="form-group">
                        <label for="code">Код</label>
                        <input type="number" name="code" placeholder="code" id="code" class="form-control" value="{{$product->code}}">
                    </div>

                    <div class="form-group">
                        <label for="expiration_date">Скок годности, м</label>
                        <input type="number" name="expiration_date" placeholder="expiration_date" id="expiration_date" class="form-control" value="{{$product->expiration_date}}">
                    </div>

                    <div class="form-group">
                        <label for="storage_conditions">Условия хранения</label>
                        <textarea name="storage_conditions" placeholder="storage_conditions" id="storage_conditions" class="form-control richtextarea" cols="30" rows="10">{{$product->storage_conditions}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="energy_value">Энергетическая ценность, кДж</label>
                        <input type="number" name="energy_value" placeholder="energy_value" id="energy_value" class="form-control" value="{{$product->energy_value}}">
                    </div>

                    <div class="form-group">
                        <label for="composition">Состав</label>
                        <textarea name="composition" placeholder="composition" id="composition" class="form-control richtextarea" cols="30" rows="10">{{$product->composition}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="replaceImages" class="form-check-label">Заменить изображения?</label>
                        <input type="checkbox" name="replaceImages" placeholder="replaceImages" id="replaceImages" class="form-check-input">
                    </div>

                    <div class="form-group">
                        <label for="images">Новые изображения</label>
                        <input type="file"  name="images[]" placeholder="images" id="images" class="form-control" multiple>
                    </div>

                    <button type="submit" id="btn-form" class="form-control ">Подтвердить</button>
                </form>
            </div>
        </div>
    </div>
@endsection