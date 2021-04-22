@extends('admin.layouts.app')
@section('content')

    <div class="form-head d-flex mb-3 align-items-start">
        <div class="mr-auto d-none d-lg-block">
            <h2 class="text-black font-w600 mb-0">Редактирование заказа</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6">
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
                    <h4 class="card-title">Заказ #{{$order->id}}</h4>
                    <h4 class="card-title">Создан {{$order->created_at}}</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.order.edit', $order->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control input-default"
                                       placeholder="Имя" name="username" required value="{{ $order->username }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-default"
                                       placeholder="Телефон" name="phone" required value="{{ $order->phone }}">
                            </div>
                            <div class="card-footer border-0">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                            <tr>
                                <th class="align-middle">#</th>
                                <th class="align-midle">Продукты</th>
                                <th class="align-midle">Цена</th>
                                <th class="align-midle">Кол-во</th>
                            </tr>

                            </thead>

                            <tbody>
                            @foreach(json_decode($order->products) as $key  => $product)
                                <tr class="btn-reveal-trigger">
                                    <td class="py-2">{{ $key+1 }}</td>
                                    <td class="py-2">{{ $product->name }}</td>
                                    <td class="py-2">{{ $product->price }}</td>
                                    <td class="py-2">{{ $product->count }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
