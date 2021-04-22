@extends('admin.layouts.app')
@section('content')

    <div class="form-head d-flex mb-3 align-items-start">
        <div class="mr-auto d-none d-lg-block">
            <h2 class="text-black font-w600 mb-0">Создание движка</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Движок</h4>
                </div>

                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.engine.add') }}" method="POST" >
                            @csrf
                            <div class="form-group">
                                <label>Марка</label>
                                <select name="mark_id" class="marks">
                                    @foreach(App\Models\Mark::all() as $mark)
                                        <option value="{{ $mark->id }}">{{ $mark->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Модель</label>
                                <select name="model_id" class="models">

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Выберите поколение</label> <br>
                                <select name="generation_id" class="generations form-control">
                                    <option value="Поколение" selected>Поколение</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Движок">
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
