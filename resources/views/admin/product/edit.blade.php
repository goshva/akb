@extends('admin.layouts.app')
@section('content')

    <div class="form-head d-flex mb-3 align-items-start">
        <div class="mr-auto d-none d-lg-block">
            <h2 class="text-black font-w600 mb-0">Редактирование продукта</h2>
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
                    <h4 class="card-title">Продукт</h4>
                    Марка: {{ $product->marks->name }}
                    Модель: {{ $product->models->name }}
                </div>

                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.edit.product', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control input-default"
                                       placeholder="Название" name="name" required value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-default"
                                       placeholder="Артикул" name="article" required value="{{ $product->article }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-default"
                                       placeholder="Назначение" name="purpose" required value="{{ $product->purpose }}">
                            </div>

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img">
                                    <label class="custom-file-label">Выберите картинку</label>
                                </div>
                            </div>
                            <div class="form-group my-4">
                                <input type="text" class="form-control input-default"
                                       placeholder="Емкость" name="capacity" required value="{{ $product->capacity }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-default"
                                       placeholder="Цена" name="price" required value="{{ $product->price }}">
                            </div>
                           <div class="form-group">
                               <label>Марка</label>
                               <select name="mark_id" class="marks">
                                   @foreach($marks as $mark)
                                        <option value="{{ $mark->id }}" @if($product->mark_id == $mark->id) selected @endif>{{ $mark->name }}</option>
                                   @endforeach
                               </select>
                           </div>
                            <div class="form-group">
                                <label>Модель</label>
                                <select name="model_id" class="models">

                                </select>
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
            $(".marks").on('change keyup', function (){
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
    </script>
@endsection
