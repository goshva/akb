@extends('admin.layouts.app')
@section('content')

    <div class="form-head d-flex mb-3 align-items-start">
        <div class="mr-auto d-none d-lg-block">
            <h2 class="text-black font-w600 mb-0">Создание модели</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Модель</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.model.add') }}" method="POST" >
                            @csrf
                            <div class="form-group">
                                <label>Марка</label>
                                <select name="mark_id">
                                    @foreach($marks as $mark)
                                        <option value="{{ $mark->id }}">{{ $mark->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-default"
                                       placeholder="Название" name="name" required>
                            </div>
                            <div class="card-footer border-0">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
