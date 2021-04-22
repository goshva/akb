@extends('admin.layouts.app')
@section('content')



    <div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
        <div class="card">
            @if(session('message'))
                <div class="alert alert-success solid alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    <strong>Успешно</strong>  {{session('message')}}
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                </div>
            @endif
            <div class="card-header">
                <h4 class="card-title">Все товары</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive recentOrderTable">
                    <table class="table verticle-middle table-responsive-md">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Название</th>
                            <th scope="col">Фото</th>
                            <th scope="col">Создано</th>
                            <th scope="col">Цена</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ $product->img }}" width="30" alt="{{ $product->name }}"></td>
                            <td>{{ date('d.m.Y H:i:s', strtotime($product->created_at)) }}</td>
                            <td>₽ {{ $product->price }}</td>
                            <td>
                                <div class="dropdown custom-dropdown mb-0">
                                    <div class="btn sharp btn-primary tp-btn" data-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(40px, 41px, 0px);">
                                        <a class="dropdown-item" href="{{ route('admin.edit.product', $product->id) }}">Редактировать</a>
                                        <a class="dropdown-item text-danger" href="{{ route('admin.product.destroy', $product->id) }}">Удалить</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
