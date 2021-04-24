<x-app-layout>
    <div id="section10">

        <div class="uk-container">

            <div class="product">

                <div class="product__head">
                    <h1 class="product__name" style="word-wrap: anywhere">{{ $prod->name }}</h1>
                    <span class="product__articule">Артикул {{ $prod->article }}</span>
                </div>
                <style>
                    .table {
                        width: 100%;
                    }
                </style>
                <div class="product__body">
                    <div class="uk-child-width-1-2@m" uk-grid>

                        <div>
                            <div class="product__slider">

                                <div id="productSlider" uk-slideshow="min-height: 400">
                                    <div class="product__sliderBlock">
                                        <div class="product__sliderNav">
                                            <ul class="uk-slideshow-nav uk-thumbnav uk-thumbnav-vertical">
                                                <li uk-slideshow-item="0">
                                                    <a class="product__sliderThumb" href="#"><img src="{{ $prod->img }}" width="100" alt=""></a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="product__sliderContent">
{{--                                            <div class="product__sliderBadge" uk-tooltip="На этот товар начисляется дополнительный cashback">--}}
{{--                                                <img src="{{ $prod->img }}" alt="{{ $prod->name }}">--}}
{{--                                            </div>--}}

                                            <ul class="uk-slideshow-items product__sliderList">
                                                <li id="imgContainer1" class="product__sliderLi">
                                                    <img class="product__sliderImage" src="/img/big/{{ $prod->img }}" alt="" width="350">
                                                </li>
                                            </ul>

                                            <ul class="uk-slideshow-nav uk-dotnav"></ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="mobileSlider uk-hidden@m" uk-slideshow>

                                    <ul class="uk-slideshow-items mobileSlider__list">
                                        <li>
                                            <img class="mobileSlider__img" src="{{ $prod->img }}" alt="">
                                        </li>
                                    </ul>

                                    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center mobileSlider__nav"></ul>

                                </div>

                            </div>
                        </div>

                        <div>
                            <div class="uk-grid-collapse uk-child-width-1-2@m" uk-grid>

                                <div>

                                    <div class="product__description uk-visible@m">
                                        <ul>
                                            <li class="product__descList">
                                                <span class="product__descDef">Емкость, в ампер часах: <span class="product__descItem">{{ $prod->capacity }}</span></span>
                                            </li>
                                            <li class="product__descList">
                                                <span class="product__descDef">Напряжение, в Вольтах: <span class="product__descItem">{{ $prod->vv }}</span></span>
                                            </li>
                                            <li class="product__descList">
                                                <span class="product__descDef">Пусковой ток, в амперах: <span class="product__descItem">{{ $prod->amperes }}</span></span>
                                            </li>
                                            <li class="product__descList">
                                                <span class="product__descDef">Полярность: <span class="product__descItem">{{ $prod->polarity }}</span></span>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <div>

                                    <div class="product__buy">
                                        <div class="product__buyHead">
                                            <span class="product__price" style="color: red">от {{ $prod->trade_price }} ₽</span>
                                            <span class="Product__priceFrom">{{ $prod->price }} ₽</span>
                                        </div>
{{--                                        <div class="product__buyBody">--}}

{{--                                            <div class="delivery">--}}
{{--                                                <div class="delivIcon"><i class="icon-location"></i></div>--}}
{{--                                                <div class="delivText">--}}
{{--                                                    <span class="delivDeliv">Пункт выдачи(в разработке) - 1 ₽</span>--}}
{{--                                                    <span class="delivDay">18 марта</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="product__buyFooter">
                                            <button type="submit" class="product__buyBtn add-to-cart" data-name="{{ $prod->name }}" data-price="{{ $prod->price }}">Купить</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- /#section10 -->

    <div id="section11">

        <div class="uk-container">

            <div class="characteristics">

                <div class="title">
                    <h2 class="title__text">Характеристики</h2>
                </div>

                <div class="table">
                    <div class="table__head">
                        <h3 class="table__headText">Заводские данные о товаре</h3>
                    </div>
                    <div class="table__body uk-grid-medium uk-child-width-1-2@m" uk-grid>

                        <div>
                            <table class="table__table">
                                <tbody>
                                <tr>
                                    <td class="table__left table__td">Артикул производителя</td>
                                    <td class="table__right table__td">{{ $prod->article }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div>
                            <table class="table__table">
                                <tbody>
                                <tr>
                                    <td class="table__left table__td">Бренд</td>
                                    <td class="table__right table__td">{{ $prod->brand_id }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="table">
                    <div class="table__head">
                        <h3 class="table__headText">Основные характеристики</h3>
                    </div>
                    <div class="table__body uk-grid-medium uk-child-width-1-2@m" uk-grid>

                        <div>
                            <table class="table__table">
                                <tbody>
                                <tr>
                                    <td class="table__left table__td">Емкость, в ампер часах</td>
                                    <td class="table__right table__td">{{ $prod->capacity }}</td>
                                </tr>
                                <tr>
                                    <td class="table__left table__td">Напряжение, в Вольтах</td>
                                    <td class="table__right table__td">{{ $prod->vv }}</td>
                                </tr>
                                <tr>
                                    <td class="table__left table__td">Пусковой ток, в амперах</td>
                                    <td class="table__right table__td">{{ $prod->amperes }}</td>
                                </tr>
                                <tr>
                                    <td class="table__left table__td">Полярность</td>
                                    <td class="table__right table__td">{{ $prod->polarity }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div>
                            <table class="table__table">
                                <tbody>
                                <tr>
                                    <td class="table__left table__td">Назначение</td>
                                    <td class="table__right table__td">{{ $prod->purpose }}</td>
                                </tr>
                                <tr>
                                    <td class="table__left table__td">Размеры</td>
                                    <td class="table__right table__td">{{ $prod->depth }}x{{ $prod->width }}x{{ $prod->height }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- /#section11 -->
</x-app-layout>
