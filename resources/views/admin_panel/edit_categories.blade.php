@extends('layouts.admin')
@section('title-block')Edit Categories @endsection

@section('content')

    <div class="section">
        <div class="container">
            <div class="row">
                <form enctype="multipart/form-data" action="{{ route('admin.categorySubmit') }}" method="post" class="form ">
                    @csrf
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text" name="name" placeholder="Название категории" id="name" class="form-control">
                    </div>
            
                    <button type="submit" id="btn-form" class="form-control"><a href="">Добавить категорию</a></button>
                </form>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <form method="GET" action="{{ route('admin.categoryUpdate') }}" id="cat_edit_form">
                    @csrf
                    <button type="button" class="btn btn-xs btn-info btn-flat show_confirm edit_category edit_btn">Редактировать</button>
                    <button type="submit" class="btn btn-xs btn-success btn-flat show_confirm edit_category cat_new_name_disabled" data-toggle="tooltip" title='Delete'>Подтеврдить</button>
                    <button type="button" class="btn btn-xs btn-secondary btn-flat show_confirm edit_category cat_new_name_disabled cancel_btn">Отмена</button>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Название</th>
                                <th scope="col">Предметов в категории</th>
                                <th scope="col">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>
                                    <span class="edit_category">{{$item->name}}</span>
                                    <div class="form-group edit_category cat_new_name_disabled">
                                        <input type="text" name="new_cat_name[]" id="new_cat_name" placeholder="{{$item->name}}" value="{{$item->name}}" class="form-control cat_new_name">
                                    </div>
                                </td>
                                
                                <td>{{$item->products->count()}}</td>
                                <td style="display: flex; gap: 10px">
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete' formaction="{{ route('admin.categoryDelete', $item->id) }}">Удалить</button>
                                </td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <script>
        
    </script>
@endsection