<x-app-layout>

    @php
        $categories = \App\Models\Category::all();
        $url = $_SERVER['REQUEST_URI'];
        $brands = \App\Models\Brand::all()->sortBy('name');

        if (count($requests) > 0){
            $link = $_SERVER['REQUEST_URI'];
        } else {
            $link  = '/';
        }
/*
        if (isset($requests['depth']) && $requests['depth'] != 0 && isset($requests['height']) && $requests['height'] != 0 && isset($requests['width']) && $requests['width'] != 0){
           $products = \App\Models\Product::where('depth', '=', $requests['depth'])
           ->where('height', '=', $requests['height'])
           ->where('width', '=', $requests['width'])
           ;
            $products = \App\Models\Product::paginate($products->get()->all());
        }
         if (isset($requests['sort'])){
          if ($requests['sort'] == 'desc'){
                $products = $products->sortBy([
                    ['price', 'desc'],
                ]);
                //$products = \App\Models\Product::paginate($products->all());
          }
          else {
                $products = $products->sortBy([
                    ['price', 'asc'],
                ]);
                //$products = \App\Models\Product::paginate($products->all());
          }
        }

         if(isset($requests['polarity']) && $requests['polarity'] != null){
            $products = \App\Models\Product::where('polarity', '=', $requests['polarity'])->get();

           // $products = \App\Models\Product::paginate($products->all());
         }
       if(isset($requests['amperes']) && $requests['amperes'] != null){
            $products = \App\Models\Product::where('capacity', '=', $requests['amperes'])->get();
            $products = \App\Models\Product::paginate($products);
       }

    if (isset($requests['mark_id']) && $requests['mark_id'] && isset($requests['model_id']) && $requests['mark_id']){

        $mark_id = $requests['mark_id'];
        $model_id = $requests['model_id'];
        $articles = \App\Models\Article::where('mark_id', $mark_id)->where('model_id', $model_id)->get()->first();
        if (!$articles){
            echo "по Вашему запросу ничего не найдено";
        } else {
            $list = $articles->list;
            $items = explode(',', $list);
            $products = \App\Models\Product::whereIn('article', $items)->get();
            $products = \App\Models\Product::paginate($products);
            
        }
    }
         */
       // dd($requests);                 

    @endphp
{{--    @section('header')--}}
{{--        <link rel="stylesheet" href="{{ mix('css/app.css') }}">--}}
{{--    @endsection--}}

    <div id="section3">
        <div class="uk-container">
            <div class="QueryTitle">
                <h1 class="QueryTitle__text">Аккумуляторы автомобильные</h1>
            </div>
        </div>

    </div>
    <!-- /#section3 -->
    <div id="section4">

        <div class="toUp">
            <a href="#header" class="toUp__btn" uk-scroll><i class="icon-angle-up toUp__icon"></i> Наверх</a>
        </div>

        <div class="uk-container">

            <div uk-grid>
                <div class="uk-width-1-4@m uk-visible@m">
                    <form class="aside">



                        <div class="aside__body">
                            <div class="AsideBlock">
                                <ul uk-accordion="multiple: true">
                                    <li class="AsideBlock__accordeon uk-open">
                                        <a class="uk-accordion-title AsideBlock__accordeonTitle" href="#">Цена</a>
                                        <div class="uk-accordion-content AsideBlock__accordeonContent">

                                            <div class="uk-grid-small" uk-grid>
                                                <div class="uk-width-1-2@m">
                                                    <div class="uk-inline">
                                                        <span class="uk-form-icon AsideBlock__inputText">от</span>
                                                        <input class="uk-input AsideBlock__input" id="priceFrom" name="priceFrom" type="text" value="">
                                                    </div>
                                                </div>

                                                <div class="uk-width-1-2@m">
                                                    <div class="uk-inline">
                                                        <span class="uk-form-icon AsideBlock__inputText">до</span>
                                                        <input class="uk-input AsideBlock__input" id="priceTo" name="priceTo" type="text" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="AsideBlock__sliderBlock">
                                                <div id="priceSlider" class="AsideBlock__sliderPrice"></div>
                                            </div>

{{--                                            <div class="AsideBlock__checkboxesBlock">--}}
{{--                                                <div class="AsideBlock__checkboxBlock">--}}
{{--                                                    <input class="AsideBlock__checkboxInput" id="stock" name="stock" type="checkbox">--}}
{{--                                                    <label class="AsideBlock__checkboxLabel" for="stock">В наличии</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="AsideBlock__checkboxBlock">--}}
{{--                                                    <input class="AsideBlock__checkboxInput" id="today" name="today" type="checkbox">--}}
{{--                                                    <label class="AsideBlock__checkboxLabel" for="today">Получить сегодня</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                        </div>
                                    </li>
                                </ul>
                            </div>

{{--                            <div class="AsideBlock">--}}
{{--                                <div class="AsideBlock__checkboxBlock">--}}
{{--                                    <input class="AsideBlock__checkboxInput" id="today" name="today" type="checkbox">--}}
{{--                                    <label class="AsideBlock__checkboxLabel" for="today">Со скидкой продавца</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="AsideBlock">--}}
{{--                                <div class="AsideBlock__checkboxBlock">--}}
{{--                                    <input class="AsideBlock__checkboxInput" id="today" name="today" type="checkbox">--}}
{{--                                    <label class="AsideBlock__checkboxLabel" for="today">С кешбеком</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <style>

                                .AsideBlock__checkboxInput {
                                    display: none;
                                }
                            </style>
                            <div class="AsideBlock">
                                <ul uk-accordion="multiple: true">
                                    <li class="AsideBlock__accordeon uk-open">
                                        <a class="uk-accordion-title AsideBlock__accordeonTitle" href="#">Бренд</a>
                                        <div class="uk-accordion-content AsideBlock__accordeonContent">


                                            <div class="AsideBlock__scrollContent">
                                                <input type="hidden" name="brands" value="{{ old('brands') }}" id="brands">
                                                 @foreach($brands as $brand)
                                                    <div class="AsideBlock__checkboxBlock">
                                                        <input class="AsideBlock__checkboxInput" class="brand__selected"  name="brand" id="{{ $brand->name }}" onclick="brands.push(this.previousElementSibling.id);"  type="checkbox" value="{{ $brand->name }}">
                                                        <label class="AsideBlock__checkboxLabel @if(@in_array($brand->name, json_decode(old('brands')))) AsideBlock__checkboxInputActive @endif" for="{{ $brand->name }}">{{ $brand->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </li>
                                </ul>

                            </div>
                            <div class="AsideBlock">
                                <ul uk-accordion="multiple: true">
                                    <li class="AsideBlock__accordeon uk-open">
                                        <a class="uk-accordion-title AsideBlock__accordeonTitle" href="#">Размеры</a>
                                        <div class="uk-accordion-content AsideBlock__accordeonContent">
                                            <div class="AsideBlock__scrollContent">
                                                <div class="uk-grid-small" uk-grid>
                                                    <div class="uk-width-1-1@m">
                                                        <div class="uk-inline">
                                                            <span class="uk-form-icon AsideBlock__inputText">Д</span>
                                                            <input class="uk-input AsideBlock__input"  name="depth" type="text" placeholder="0" value="{{ old('depth') }}">
                                                        </div>
                                                    </div>
                                                        <div class="uk-width-1-1@m">
                                                            <div class="uk-inline">
                                                                <span class="uk-form-icon AsideBlock__inputText">Ш</span>
                                                                <input class="uk-input AsideBlock__input"  name="width" type="text" placeholder="0" value="{{ old('width') }}">
                                                            </div>
                                                        </div>
                                                    <div class="uk-width-1-1@m">
                                                        <div class="uk-inline">
                                                            <span class="uk-form-icon AsideBlock__inputText">В</span>
                                                            <input class="uk-input AsideBlock__input" name="height" type="text" placeholder="0" value="{{ old('height') }}">
                                                        </div>
                                                    </div>

                                                    </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="AsideBlock">
                                <ul uk-accordion="multiple: true">
                                    <li class="AsideBlock__accordeon uk-open">
                                        <a class="uk-accordion-title AsideBlock__accordeonTitle" href="#">Полярность</a>
                                        <div class="uk-accordion-content AsideBlock__accordeonContent">
                                            <div class="AsideBlock__scrollContent">
                                                <input type="hidden" id="polarity" name="polarity" class="polarity">
                                                <div class="AsideBlock__checkboxBlock">
                                                    <input class="AsideBlock__checkboxInput" class="brand__selected"  id="obratnaya"  name="polarity" type="checkbox" value="Обратная">
                                                    <label class="AsideBlock__checkboxLabel  xyi @if(@in_array("Обратная", json_decode(old('polarity')))) AsideBlock__checkboxInputActive @endif" for="obratnaya">Обратная</label>
                                                </div>
                                                <div class="AsideBlock__checkboxBlock">
                                                    <input class="AsideBlock__checkboxInput" class="brand__selected"  id="pryamaya"  name="polarity" type="checkbox" value="Прямая">
                                                    <label class="AsideBlock__checkboxLabel xyi @if(@in_array("Прямая", json_decode(old('polarity')))) AsideBlock__checkboxInputActive @endif" for="pryamaya">Прямая</label>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="AsideBlock">
                                <ul uk-accordion="multiple: true">
                                    <li class="AsideBlock__accordeon uk-open">
                                        <a class="uk-accordion-title AsideBlock__accordeonTitle" href="#">Емкость</a>
                                        <div class="uk-accordion-content AsideBlock__accordeonContent">
                                            <div class="AsideBlock__scrollContent">
                                                <div class="AsideBlock__checkboxBlock">
                                                    <div class="uk-inline">
                                                        <span class="uk-form-icon AsideBlock__inputText">A</span>
                                                        <input class="uk-input AsideBlock__input" name="amperes" type="text" value="{{ old('amperes') }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="aside__head">
                            <button type="submit" class="uk-button uk-button-default aside__btnReset uk-width-1-1" style="background-color: #2A50B6 !important; color: #fff !important;">Применить фильтр</button>
                            {{--                            <a href="/" class="uk-button uk-button-default aside__btnReset uk-width-1-1" style="margin-top: 10px;background-color: #2A50B6 !important; color: #fff !important;">Очистить фильтр</a>--}}
                        </div>
                    </form>
                </div>
                <div class="uk-width-expand@m">
                    <div class="tagsHeader">
                        <div class="banners mb-2">
                            <a href="{{ route('info.promotions') }}#news" class="item">
                                <img src="/img/sliders/1.jpg" alt="">
                            </a>
                            <a href="{{ route('info.promotions')   }}#news" class="item">
                                <img src="/img/sliders/2.jpg" alt="">
                            </a>
                            <a href="{{ route('info.promotions') }}#news" class="item">
                                <img src="/img/sliders/3.jpg" alt="">
                            </a>
                            <a href="{{ route('info.promotions') }}#news" class="item">
                                <img src="/img/sliders/4.jpg" alt="">
                            </a>
                            <a href="{{ route('info.promotions') }}#news" class="item">
                                <img src="/img/sliders/5.jpg" alt="">
                            </a>
                            <a href="{{ route('info.promotions') }}#news" class="item">
                                <img src="/img/sliders/6.jpg" alt="">
                            </a>
                        </div>
                        <div class="Buttons">

                        </div>
                        <div class="tagsHeader__head" style="display:none"><!-- TODO: remove if not used-->
                            @foreach($categories as $category)
                            <a href="{{ route('category', $category->name) }}" class="MiniBtn uk-button uk-button-default">{{ $category->name }}</a>
                            @endforeach

                        </div>

                        <div class="tagsHeader__footer">

                            <div class="tagsHeader__mobile uk-hidden@m">

                                <div class="tagsHeader__mobileCount">
                                    {{ count(\App\Models\Product::all()) }} товаров
                                </div>

                                <div>
                                    <a href="#tagsFilter" class="tagsHeader__mobileBtn" uk-toggle><i class="icon-settings tagsHeader__mobileBtnIcon"></i> Фильтр</a>
                                </div>

                            </div>
                            
                             <form action="/" uk-grid class="uk-margin-small" method="GET">
                                <div class="uk-width-1-4@l">
                                    <label for="marka">Выберите марку</label> <br>
                                    <select name="mark_id" id="marka" class="marks" required>
                                    <option value="" selected disabled hidden>Выбрать</option>
                                       @foreach(\App\Models\Mark::all() as $mark)
                                            @if(strlen($mark->name) > 0)
                                                <option value="{{ $mark->id }}">{{ $mark->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="uk-width-1-4@l">
                                    <label for="model">Выберите модель</label> <br>
                                    <select name="model_id" id="model" class="models" required style="width:100%">
                                    <option value="" selected disabled hidden>Выбрать</option>
                                        @if (isset($requests['model_name']))
                                                <option value="{{ $requests['model_id'] }}">{{ $requests['model_name']}}</option>
                                        @endif


                                    </select>
                                </div>
                                <div class="uk-width-1-4@l">
                                    <label>Выберите поколение</label> <br>
                                    <select name="generation_id" class="generations" required style="width:100%">
                                    <option value="" selected disabled hidden>Выбрать</option>
                                        @if (isset($requests['generation_name']))
                                                <option value="{{ $requests['generation_id'] }}">{{ $requests['generation_name'] }}</option>
                                        @endif


                                    </select>
                                </div>
                                <div class="uk-width-1-4@l">
                                    <label >Выберите двигатель</label> <br>
                                    <select name="engine_id" class="engines" required style="width:100%">
                                    <option value="" selected disabled hidden>Выбрать</option>
                                        @if (isset($requests['engine_name']))
                                                <option value="{{ $requests['engine_id'] }}">{{ $requests['engine_name'] }}</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="uk-width-4-4@l  uk-align-center">
                                    <input type="submit" class="uk-button uk-button-default aside__btnReset uk-width-1-1" value="Подобрать" style="background-color: #2A50B6 !important; color: #fff !important;;">
                                </div>

                            </form>   
                            <div class="tagsHeaderContent">

                                <div class="uk-inline">
                                    <div class="uk-width-4-4@l  uk-align-center">
                                        <script data-b24-form="click/221/zceylj" data-skip-moving="true">
                                            (function(w,d,u){
                                                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
                                                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
                                            })(window,document,'https://cdn-ru.bitrix24.ru/b16395938/crm/form/loader_221.js');
                                        </script>
                                        <button  class="uk-button uk-button-default aside__btnReset uk-width-1-1"  style="background-color: #2A50B6 !important; color: #fff !important;">Подбор специалистом</button>
                                    </div>

                                    <button class="uk-button uk-button-default tagsHeader__filter" type="button" id="tagsHeaderFilter">
                                        <span class="tagsHeader__sortText">Сортировать: </span>
                                        <span class="tagsHeaderTag">
                                            @if(isset($requests['sort']) && $requests['sort'] == 'desc')
                                                По убыванию
                                            @else
                                                По возрастанию
                                            @endif
                                        </span>

                                        <i class="icon-angle-up tagsHeader__icon"></i>
                                    </button>
{{--                                    <form action="{{ $link }}">--}}
{{--                                        <select name="sort" id="" onchange="this.form.submit()">--}}
{{--                                            <option value="desc">По убыванию</option>--}}
{{--                                            <option value="asc">По возрастанию</option>--}}
{{--                                        </select>--}}
{{--                                    </form>--}}
                                    <div uk-dropdown="mode: click" class="tagsHeader__dropdown">
                                        <ul class="tagsHeader__list">

                                            <a class="tagsHeader__li" href="@if($link == '/') ?sort=asc @else {{$link}}&sort=asc @endif" style="width: 100%; display: block;">По возрастанию</a>
                                            <a class="tagsHeader__li" href="@if($link == '/') ?sort=desc @else {{$link}}&sort=desc @endif"  style="width: 100%; display: block;">По убыванию</a>
                                        </ul>
                                    </div>
                                    <form action="#" method="post">
                                        <input type="hidden" id="hiddenTag" name="hiddenTag">
                                    </form>
                                </div>

                                <div class="tags__view uk-visible@m">

                                    <a data-mode="grid" class="tagsGridIcon tagsGridIconActive"><i class="icon-grid"></i></a>
                                    <a data-mode="list" class="tagsGridIcon "><i class="icon-grid-list"></i></a>
                                </div>

                            </div>
                            <div  class="uk-label vin">для подбора по вин номеру свяжитесь с менеджером</div>
                            <style>
                                .vin {
                                    margin: 10px auto; text-align: center; color: #fff; text-transform: none;
                                    width: 100%;
                                }
                            </style>
                        </div>

                    </div>
                    <!-- /.tags -->
{{--                    {{ dd($requests['viewMode'] == 'list') }}--}}

{{--                   <a  href="javascript:;" class="cart-button"  data-fancybox="cart-wrapper" data-src="#cart-wrapper">--}}
{{--                       <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                           <path d="M0 1.5C0 1.36739 0.0526784 1.24021 0.146447 1.14645C0.240215 1.05268 0.367392 1 0.5 1H2C2.11153 1.00003 2.21985 1.03735 2.30773 1.10602C2.39561 1.1747 2.45801 1.27078 2.485 1.379L2.89 3H14.5C14.5734 3.00007 14.6459 3.0163 14.7124 3.04755C14.7788 3.0788 14.8375 3.12429 14.8844 3.1808C14.9313 3.23731 14.9651 3.30345 14.9835 3.37452C15.002 3.44558 15.0045 3.51984 14.991 3.592L13.491 11.592C13.4696 11.7066 13.4087 11.8101 13.3191 11.8846C13.2294 11.9591 13.1166 11.9999 13 12H4C3.88343 11.9999 3.77057 11.9591 3.68091 11.8846C3.59126 11.8101 3.53045 11.7066 3.509 11.592L2.01 3.607L1.61 2H0.5C0.367392 2 0.240215 1.94732 0.146447 1.85355C0.0526784 1.75979 0 1.63261 0 1.5ZM3.102 4L4.415 11H12.585L13.898 4H3.102ZM5 12C4.46957 12 3.96086 12.2107 3.58579 12.5858C3.21071 12.9609 3 13.4696 3 14C3 14.5304 3.21071 15.0391 3.58579 15.4142C3.96086 15.7893 4.46957 16 5 16C5.53043 16 6.03914 15.7893 6.41421 15.4142C6.78929 15.0391 7 14.5304 7 14C7 13.4696 6.78929 12.9609 6.41421 12.5858C6.03914 12.2107 5.53043 12 5 12ZM12 12C11.4696 12 10.9609 12.2107 10.5858 12.5858C10.2107 12.9609 10 13.4696 10 14C10 14.5304 10.2107 15.0391 10.5858 15.4142C10.9609 15.7893 11.4696 16 12 16C12.5304 16 13.0391 15.7893 13.4142 15.4142C13.7893 15.0391 14 14.5304 14 14C14 13.4696 13.7893 12.9609 13.4142 12.5858C13.0391 12.2107 12.5304 12 12 12ZM5 13C5.26522 13 5.51957 13.1054 5.70711 13.2929C5.89464 13.4804 6 13.7348 6 14C6 14.2652 5.89464 14.5196 5.70711 14.7071C5.51957 14.8946 5.26522 15 5 15C4.73478 15 4.48043 14.8946 4.29289 14.7071C4.10536 14.5196 4 14.2652 4 14C4 13.7348 4.10536 13.4804 4.29289 13.2929C4.48043 13.1054 4.73478 13 5 13ZM12 13C12.2652 13 12.5196 13.1054 12.7071 13.2929C12.8946 13.4804 13 13.7348 13 14C13 14.2652 12.8946 14.5196 12.7071 14.7071C12.5196 14.8946 12.2652 15 12 15C11.7348 15 11.4804 14.8946 11.2929 14.7071C11.1054 14.5196 11 14.2652 11 14C11 13.7348 11.1054 13.4804 11.2929 13.2929C11.4804 13.1054 11.7348 13 12 13V13Z" fill="black"/>--}}
{{--                       </svg>--}}
{{--                   </a>--}}


                        @if(count($products) == 0)
                           <span class="aside__count uk-padding" style="font-size: 20px"> По вашему запросу ничего не найдено или подбор не настроен :\</span>
                        @endif
                        <div class="productsMain product-grid uk-hidden">
                        @foreach($products as $product)
                            <!-- карточка -->
                                <div class="ProductList">
                                    <div class="ProductList__header">
                                        <a style="display: flex; width: 100%; height: 100%" href="{{ route('page.product', $product->id) }}">
                                            <img class="ProductList__img" src="{{ $product->img }}" alt="{{ $product->name }}" loading="lazy">
                                        </a>
                                    </div>

                                    <div class="ProductList__body">
                                        <div class="Product__description">
                                            <a href="{{ route('page.product', $product->id) }}" class="Product__name">{{ $product->name }}</a>

                                            <p class="Product__descriptionText">Емкость, в ампер часах: <span class="Product__descriptionCustom">{{ $product->capacity }}</span></p>
                                            <p class="Product__descriptionText">Пусковой ток, в амперах: <span class="Product__descriptionCustom">{{ $product->amperes }}</span></p>
                                            <p class="Product__descriptionText">Полярность: <span class="Product__descriptionCustom">{{ $product->polarity }}</span></p>
                                        </div>
                                    </div>

                                    <div class="ProductList__footer">
                                        <div class="ProductList__price">
                                            <div class="ProductList__priceText" uk-tooltip="title: Цена при сдаче старого аккумулятора;pos: top-left">от {{ $product->trade_price  - ($product->trade_price*8)/100 }} ₽</div>
                                            <div class="Product__priceFrom" uk-tooltip="title: Цена без обмена;pos: top-left">{{ $product->price  - ($product->price*8)/100 }} ₽</div>
                                        </div>

                                        <div class="ProductList__btn">
                                            <a style="background: #2A50B6" href="javascript:;"  class="Product__btn add-to-cart" data-name="{{ $product->name }}" data-price="{{ $product->price  - ($product->price*8)/100 }}">Купить</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.карточка -->
                            @endforeach
                        </div>
                        <div class="productsMain uk-child-width-1-3@m uk-grid-small product-inline " uk-grid>
                            @foreach($products as $product)
                            <!-- With price from -->
                            <div>
                                <div class="Product">

                                    <div class="Product__head">
                                        <a href="{{ route('page.product', $product->id) }}" style="display: block;">
                                            <img class="Product__image" src="{{ $product->img }}" alt="" loading="lazy">
                                        </a>
                                    </div>

                                    <div class="Product__body">
                                        <div class="Product__price uk-visible@m">
                                            <div class="Product__priceText" uk-tooltip="title: Цена при обмене старого аккумулятора; pos: top-left">от {{ $product->trade_price }} ₽</div>
                                            <div class="Product__priceFrom"  uk-tooltip="title: Цена без обмена; pos: top-left">{{ $product->price }}₽</div>
                                        </div>

                                        <div class="Product__description">
                                            <a href="{{ route('page.product', $product->id) }}" class="Product__name">{{ $product->name }}</a>
{{--                                            <div class="Product__review">--}}
{{--                                                <i class="icon-star Product__star"></i>--}}
{{--                                                <i class="icon-star Product__star"></i>--}}
{{--                                                <i class="icon-star Product__star"></i>--}}
{{--                                                <i class="icon-star Product__star"></i>--}}
{{--                                                <i class="icon-star Product__unstar"></i>--}}
{{--                                                <span uk-tooltip="Количество отзывов">(10)</span>--}}
{{--                                            </div>--}}
                                            <p class="Product__descriptionText uk-visible@m">Емкость, в ампер часах: <span
                                                    class="Product__descriptionCustom">{{ $product->capacity }}</span></p>
                                            <p class="Product__descriptionText uk-visible@m">Пусковой ток, в амперах: <span
                                                    class="Product__descriptionCustom">{{ $product->amperes }}</span></p>
                                            <p class="Product__descriptionText uk-visible@m">Полярность: <span
                                                    class="Product__descriptionCustom">{{ $product->polarity }}</span></p>
                                            <div class="Product__price uk-hidden@m">
                                                <div class="Product__priceText" uk-tooltip="title: Цена при обмене старого аккумулятора; pos: top-left">от {{ $product->trade_price  - ($product->trade_price*8)/100 }} ₽</div>
                                                <div class="Product__priceFrom"  uk-tooltip="title: Цена без обмена; pos: top-left">{{ $product->price  - ($product->price*8)/100 }} ₽</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="Product__footer">
                                        <a style="background: #2A50B6" href="javascript:;"  class="Product__btn add-to-cart" data-name="{{ $product->name }}" data-price="{{ $product->price  - ($product->price*8)/100 }}">Купить</a>
                                    </div>

                                </div>
                            </div>
                            <!-- With price from -->
                            @endforeach
                        </div>
{{--                    прямоугольные карточки--}}
{{--                    @if(isset($requests->priceFrom) && isset($requests->priceTo) && $products->total())--}}
                        {{ $products->links('vendor.pagination.tailwind') }}
{{--                    @endif--}}
                        <!-- /.products -->
                    <script>
                        $('.tagsGridIcon').on('click', function (e){
                            e.preventDefault()
                            if(($(this).data('mode')) == 'list') {
                                $('.product-grid, .product-inline').toggleClass('uk-hidden')
                                $(".tagsGridIcon").removeClass('tagsGridIconActive')
                                $(this).toggleClass('tagsGridIconActive')
                            }
                            if(($(this).data('mode')) == 'grid') {
                                $('.product-grid, .product-inline').toggleClass('uk-hidden')
                                $(".tagsGridIcon").removeClass('tagsGridIconActive')
                                $(this).toggleClass('tagsGridIconActive')
                            }
                        });
                        $(".brand__selected").on('change keyup select', function (e){
                            console.log($(this))
                        })
                    </script>
                                <div class="SectionTitle">
                <h1 class="SectionTitle__text">Схема проезда</h1>
            </div>
                <img src="img/map.jpg" alt="Схема проезда">

                </div>

            </div>

        </div>

    </div>
    <!-- /#section4 -->

    <div id="section5" class="footerContainer" style="display:none"><!-- TODO: remove if not used-->
        <div class="uk-container">
            <div class="SectionTitle">
                <h1 class="SectionTitle__text">Схема проезда</h1>
            </div>
            <div class="SectionBody">
            </div>
        </div>
    </div>
    <!-- /#section5 -->

{{--    <!-- /#section6 -->--}}
     @section('scripts')

        <script>
                $("#priceSlider").slider({
                    animate: "slow",
                    max: {{ $max }},
                    min: {{ $min }},
                    range: true,
                    @if(isset($requests['priceFrom']) && isset($requests['priceTo']))
                        values: [{{ $requests['priceFrom'] }}, {{ $requests['priceTo'] }}],
                    @else
                        values: [1000, {{ $max }}],
                    @endif
                    value: 50
                });
                $('#section4 #priceFrom').val($("#priceSlider").slider('values', 0));
                $('#section4 #priceTo').val($("#priceSlider").slider('values', 1));
                $("#section4 #priceSlider").on("slidechange slidecreate slide", function( event, ui ) {
                    $('#section4 #priceFrom').val($("#priceSlider").slider('values', 0));
                    $('#section4 #priceTo').val($("#priceSlider").slider('values', 1));
                });
            </script>
        <script>
        
        let searchParams = new URLSearchParams(window.location.search);
            $(".engines").val(searchParams.get('engine_id'));

            $(".generations").val(searchParams.get('generation_id'));

            $(".models").val(searchParams.get('model_id'));

            $(".marks").val(searchParams.get('mark_id'));
            
            $(".marks").on('change keyup focus', function (){
                let marka = $(this).val();
                $.ajax({
                    url: "/marka/"+marka,
                    method: "GET",
                    success: function (response) {
                        console.log(response)
                        let models = [];
                        //
                        models.push(`
                        <option value="" selected="" disabled="" hidden="">Выбрать</option>
                                `)
                        //
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
                        //
                        models.push(`
                        <option value="" selected="" disabled="" hidden="">Выбрать</option>
                                `)
                        //                     
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
                        //
                        models.push(`
                        <option value="" selected="" disabled="" hidden="">Выбрать</option>
                                `)
                        //                        
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
        <style>
            .Buttons {
                display: flex;
                justify-content: end;
            }
            .Buttons svg {
                cursor: pointer;
            }
            .slick-prev,
            .slick-next
            {
                z-index: 2;
                font-size: 0;
                line-height: 0;
                position: absolute;
                top: 50%;
                display: block;
                width: 20px;
                height: 20px;
                -webkit-transform: translate(0, -50%);
                -ms-transform: translate(0, -50%);
                transform: translate(0, -50%);
                cursor: pointer;
                color: transparent;
                border: none;
                outline: none;
                background: #fff;
                border-radius: 10px;
                padding: 5px;

            }
            .slick-prev:hover,
            .slick-prev:focus,
            .slick-next:hover,
            .slick-next:focus
            {
                color: transparent;
                outline: none;
                background: transparent;
            }
            .slick-prev:hover:before,
            .slick-prev:focus:before,
            .slick-next:hover:before,
            .slick-next:focus:before
            {
                opacity: 1;
            }
            .slick-prev.slick-disabled:before,
            .slick-next.slick-disabled:before
            {
                opacity: .25;
            }

            .slick-prev:before,
            .slick-next:before
            {
                font-family: 'slick';
                font-size: 20px;
                line-height: 1;

                opacity: .75;
                color: white;

                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            .slick-prev
            {
                left: 25px;
            }

            .slick-prev:before
            {
                content: '←';
            }


            .slick-next
            {
                right: 25px;
            }

        </style>
        <script>
            let next  = `<svg width="30" class="slick-next" style="margin-left: 10px"  viewBox="0 0 91 76" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.79166 41.8059L79.4354 41.8059L50.4766 69.4548C48.9599 70.9038 48.9125 73.3028 50.3344 74.8231C51.7799 76.3433 54.1734 76.3908 55.6901 74.9656L88.7724 43.3736C90.1943 41.9484 91 40.0244 91 38.0054C91 35.9863 90.218 34.0623 88.7013 32.5659L55.6901 1.04515C54.9555 0.332548 54.0076 2.09422e-06 53.0833 2.01342e-06C52.088 1.9264e-06 51.0927 0.403809 50.3344 1.18767C48.8888 2.70788 48.9599 5.10697 50.4766 6.55593L79.5539 34.2048L3.79166 34.2048C1.70625 34.2048 -4.12506e-06 35.9151 -4.3078e-06 38.0054C-4.49054e-06 40.0957 1.70625 41.8059 3.79166 41.8059Z" fill="#2A50B6"/>
</svg>
`
            let prev = `<svg width="30" class="slick-prev" viewBox="0 0 91 76" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M87.2083 34.1941L11.5646 34.1941L40.5234 6.54521C42.0401 5.09625 42.0875 2.69716 40.6656 1.17695C39.22 -0.343266 36.8266 -0.390772 35.3099 1.03443L2.2276 32.6264C0.80572 34.0516 -8.96862e-06 35.9756 -8.6156e-06 37.9946C-8.26258e-06 40.0137 0.782023 41.9377 2.29869 43.4342L35.3099 74.9549C36.0445 75.6675 36.9924 76 37.9167 76C38.912 76 39.9073 75.5962 40.6656 74.8123C42.1112 73.2921 42.0401 70.893 40.5234 69.4441L11.4461 41.7952L87.2083 41.7952C89.2937 41.7952 91 40.0849 91 37.9946C91 35.9043 89.2937 34.1941 87.2083 34.1941Z" fill="#2A50B6"/>
</svg>
`
            $('.banners').slick({
                autoplay: true,
                autoplaySpeed: 2000,
                // appendArrows: $(".Buttons"),
                nextArrow: next,
                prevArrow: prev,
            })
        </script>
    @endsection
<style>
    .Product__btn{
        border: solid 1px black;
    }
</style>
</x-app-layout>
