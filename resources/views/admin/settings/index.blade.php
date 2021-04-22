@extends('admin.layouts.app')

@section('content')

    <div class="form-head d-flex mb-3 align-items-start">
        <div class="mr-auto d-none d-lg-block">
            <h2 class="text-black font-w600 mb-0">Общие настройки сайта</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                @if(session('message'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        <strong>Успешно</strong>  {{ session('message')}}
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                    </div>
                @endif


                <div class="card-body">
                    <div class="basic-form">
                            <form action="{{ route('admin.add.settings') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Время работы</label>
                                <input type="text" class="form-control input-default"
                                       name="work_time" value="{{ $setting->work_time }}">
                            </div>
                            <div class="form-group">
                                <label>Телефон</label>
                                <input type="text" class="form-control input-default"
                                       name="phone" value="{{ $setting->phone }}">
                            </div>
                            <div class="form-group">
                                <label>Телеграм</label>
                                <input type="text" class="form-control input-default"
                                        name="telegram" value="{{ $setting->telegram }}">
                            </div>
                            <div class="form-group">
                                <label>Телеграм</label>
                                <input type="text" class="form-control input-default"
                                       value="{{ $setting->vk }}">
                            </div>
                            <div class="form-group">
                                <label>Whatsapp</label>
                                <input type="text" class="form-control input-default"
                                       name="whatsapp" value="{{ $setting->whatsapp }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-default"
                                        name="facebook" value="{{ $setting->facebook }}">
                            </div>
                            <div class="form-group">
                                <label>Viber</label>
                                <input type="text" class="form-control input-default"
                                       name="viber" value="{{ $setting->viber }}">
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
