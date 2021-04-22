@extends('admin.layouts.app')
@section('content')

    <div class="form-head d-flex mb-3 align-items-start">
        <div class="mr-auto d-none d-lg-block">
            <h2 class="text-black font-w600 mb-0">Редактирование артикла</h2>
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
                    <h4 class="card-title">Артикл {{ $order->marks->name }}/{{$order->models->name }}</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.article.edit', $order->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Марка</label>
                                <select name="mark_id" class="marks" required>
                                    @foreach(\App\Models\Mark::all() as $mark)
                                        <option value="{{ $mark->id }}" @if($order->mark_id == $mark->id) selected @endif>{{ $mark->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Модель</label>
                                <select name="model_id" class="models" required>
                                    @foreach(\App\Models\Madel::all() as $model)
                                        <option value="{{ $model->id }}" @if($order->model_id == $model->id) selected @endif>{{ $model->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-default"
                                       placeholder="Поколение" name="pokolenie" required value="{{ $order->pokolenie }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-default"
                                       placeholder="Движок" name="engine" required value="{{ $order->engine }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-default"
                                       placeholder="Имя" name="articles" required value="{{ $order->list }}">
                            </div>
                            <div class="card-footer border-0">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

