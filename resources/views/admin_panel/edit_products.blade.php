@extends('layouts.admin')
@section('title-block')Edit Products @endsection

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <a href="{{ route('admin.uploadProduct') }}" class="btn btn-success"><i class="fa fa-angle-left"></i> Добавить новый продукт</a>
        </div>
        <div class="row">
            <table id="cart" class="table table-hover dataTable" style="overflow:hidden;">
                <thead>
                    <tr>
                        <th >id</th>
                        <th >Товар</th>
                        <th >Категория</th>
                        <th  class="text-center">Изображение</th>
                        <th  class="text-center">Цена, руб.</th>
                        <th  class="text-center">Скидка, %</th>
                        <th  class="text-center">В наличии?</th>
                        <th  class="text-center">Описание</th>
                        <th  class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                        @php $imageURL = $item->images[0]->url; @endphp
                        <tr data-id="{{ $item->id }}">
                            <td data-th="ID" class="text-center">{{ $item->id }}</td>
                            <td data-th="Product">
                                <p class="nomargin">{{ $item->name }}</p>
                            </td>
                            <td>
                                @if (App\Models\Category::find($item->category) != null)
                                    <p class="product-category nomargin">{{ App\Models\Category::find($item->category)->name }}</p>
                                @else
                                    <p class="product-category nomargin">NO CATEGORY</p>
                                @endif
                            </td>
                            <td data-th="Image">
                                <img src="{{asset("storage/image/$imageURL")}}" width="100" height="100" class="img-responsive tooltiptext"/>
                            </td>
                            <td data-th="Price" class="text-center">{{ $item->price }}</td>
                            <td data-th="Sale" class="text-center">{{ $item->sale }}</td>
                            <td data-th="Stock" class="text-center">
                                @if ($item->stock)
                                    Да
                                @else
                                    Нет
                                @endif    
                            </td>
                            <td data-th="Description" class="text-center">
                                <div class="tooltip_bs"  data-toggle="tooltip" title="{!! $item->short_description !!}">Краткое описание
                                    {{-- <span class="tooltiptext">{!! $item->short_description !!}</span> --}}
                                </div>   
                                <div class="tooltip_bs"  data-toggle="tooltip" title="{!! $item->description !!}">Описание
                                    {{-- <span class="tooltiptext">{!! $item->short_description !!}</span> --}}
                                </div> 
                            </td>
                            <td class="actions" data-th="">
                                @if (App\Models\Category::find($item->category) != null)
                                    <a target="blank" href="{{route('open-product', [App\Models\Category::find($item->category)->name, $item->id])}}" class="btn btn-info btn-sm link-to-product"><i class="fa fa-link"></i></a>
                                @else
                                    <a target="blank" href="{{route('open-product', ['no', $item->id])}}" class="btn btn-info btn-sm link-to-product"><i class="fa fa-link"></i></a>
                                @endif
                                <a href="{{route('admin.editProduct', $item->id)}}" class="btn btn-warning btn-sm update-product"><i class="fa fa-refresh"></i></a>
                                <a href="{{route('admin.removeProduct', $item->id)}}" class="btn btn-danger btn-sm remove-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection