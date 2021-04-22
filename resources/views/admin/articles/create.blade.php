@extends('admin.layouts.app')
@section('content')

    <div class="form-head d-flex mb-3 align-items-start">
        <div class="mr-auto d-none d-lg-block">
            <h2 class="text-black font-w600 mb-0">Создание артикла</h2>
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
                    <h4 class="card-title">Артикл </h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.article.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Марка</label>
                                <select name="mark_id" class="marks form-control" required>
                                    @foreach(\App\Models\Mark::all() as $mark)
                                        <option value="{{ $mark->id }}" >{{ $mark->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Модель</label>
                                <select name="model_id" class="models form-control" required >

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Поколение</label>
                                <select name="generation_id" class="generations form-control" required >

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Движок</label>
                                <select name="engine_id" class="engines form-control">

                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-default"
                                       placeholder="Артиклы" name="articles" required value="">
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

@section('scripts')
    <script>
        $(".marks").on('change keyup focus', function (){
            let marka = $(this).val();
            $.ajax({
                url: "/marka/"+marka,
                method: "GET",
                success: function (response) {
                    console.log(response)
                    let models = [];
                    for(i=0; i < response.length; i++){
                        models.push(`
                                <option value="${response[i].id}">${response[i].name}</option>
                                `)
                    }
                    $('.models').html(models)
                }
            })
        })
        $(".models").on('change keyup focus', function (){
            let models = $(this).val();
            $.ajax({
                url: "/models/"+models,
                method: "GET",
                success: function (response) {
                    console.log(response)
                    let models = [];
                    for(i=0; i < response.length; i++){
                        models.push(`
                                <option value="${response[i].id}">${response[i].name}</option>
                                `)
                    }
                    $('.generations').html(models)
                }
            })
        })
        $(".generations").on('change keyup focus', function (){
            let models = $(this).val();
            $.ajax({
                url: "/engine/"+models,
                method: "GET",
                success: function (response) {
                    console.log(response)
                    let models = [];
                    for(i=0; i < response.length; i++){
                        models.push(`
                                <option value="${response[i].id}">${response[i].name}</option>
                                `)
                    }
                    $('.engines').html(models)
                }
            })
        })
    </script>
@endsection
