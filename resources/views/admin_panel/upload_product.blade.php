@extends('layouts.admin')
@section('title-block')Upload Product @endsection

@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <form enctype="multipart/form-data" action="{{ route('admin.productSubmit') }}" method="post" class="form ">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Name" id="name" class="form-control">
                    </div>

                    <label for="category">category</label><br>
                    <select class="form-select mt-3" name="category">
                        
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="number" name="price" placeholder="price" id="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="stock">stock</label>
                        <input type="checkbox" name="stock" placeholder="stock" id="stock" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="sale">sale</label>
                        <input type="number" name="sale" placeholder="sale" id="sale" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text" name="description" placeholder="description" id="description" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mass">mass</label>
                        <input type="number" name="mass" placeholder="mass" id="mass" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="taste">taste</label>
                        <input type="text" name="taste" placeholder="taste" id="taste" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="code">code</label>
                        <input type="number" name="code" placeholder="code" id="code" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="expiration_date">expiration_date</label>
                        <input type="number" name="expiration_date" placeholder="expiration_date" id="expiration_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="storage_conditions">storage_conditions</label>
                        <input type="text" name="storage_conditions" placeholder="storage_conditions" id="storage_conditions" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="energy_value">energy_value</label>
                        <input type="number" name="energy_value" placeholder="energy_value" id="energy_value" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="composition">composition</label>
                        <input type="text" name="composition" placeholder="composition" id="composition" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="images">images</label>
                        <input required type="file"  name="images[]" placeholder="images" id="images" class="form-control" multiple>
                    </div>

                    <button type="submit" id="btn-form" class="form-control"><a href="">Submit</a></button>
                </form>
            </div>
        </div>
    </div>
@endsection