<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    @yield('header')

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/Favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/Favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/Favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/Favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/Favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Uikit CSS -->
    <link rel="stylesheet" href="/css/uikit.min.css">
    <link rel="stylesheet" href="/css/dz.min.css">
    <!-- JQuery UI Slider -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!— Yandex.Metrika counter —>
   <!-- <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(73770181, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/73770181" style="position:absolute; left:-9999px;" alt="" /></div></noscript> -->
    <!— /Yandex.Metrika counter —>

</head>
<body>
<div class="sdai">
    <img src="/img/24-7.png" alt="" width="32">
    <div style="margin-left: 10px">
        Сдай старый аккумулятор и получи скидку от 50 до 3000₽ на новый
    </div>
   </div>
<style>
    .sdai {
        background-color: #2A50B6;
        padding: 10px 20px;
        text-align: center;
        font-size: 18px;
        color: yellow;
        font-weight: 700;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    @media screen and (max-width: 550px) {
        .sdai {
            font-size: 15px;
        }
    }
</style>
@php

    $settings = \App\Models\Settings::all()->first();

@endphp
<form id="tagsFilter" uk-offcanvas="flip: true; overlay: true; stack: true">
    <button class="uk-offcanvas-close tagsClose" type="button" uk-close></button>

    <div class="uk-offcanvas-bar tagsFilter">

        <div class="tagsFilter__head">Фильтр</div>

        <div class="tagsFilter__body">

            <div class="price">
                <ul uk-accordion="multiple: true">
                    <li class="accordLi uk-open">
                        <a class="uk-accordion-title accordLi__title" href="#">Цена</a>
                        <div class="uk-accordion-content accordLi__content">

                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-2">
                                    <div class="uk-inline">
                                        <span class="uk-form-icon inputText">от</span>
                                        <input class="uk-input input" id="priceFrom" name="priceFrom" type="text"
                                               value="{{ \App\Models\Product::min('price') }}" style="color: #000">
                                    </div>
                                </div>

                                <div class="uk-width-1-2">
                                    <div class="uk-inline">
                                        <span class="uk-form-icon inputText">до</span>
                                        <input class="uk-input input" id="priceTo" name="priceTo" type="text"
                                               value="{{ \App\Models\Product::max('price') }}" style="color: #000">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="brand">
                <ul uk-accordion="multiple: true">
                    <li class="accordLi uk-open">
                        <a class="uk-accordion-title accordLi__title" href="#">Бренд</a>
                        <div class="uk-accordion-content accordLi__content">

                            <div class="brand__content">
                                @foreach(\App\Models\Brand::all() as $brand)
                                    <div class="AsideBlock__checkboxBlock">
                                        <input class="AsideBlock__checkboxInput" class="brand__selected"
                                               id="{{ $brand->name }}"
                                               onclick="brands.push(this.previousElementSibling.id);" type="checkbox"
                                               value="{{ $brand->name }}">
                                        <label class="AsideBlock__checkboxLabel"
                                               for="{{ $brand->name }}">{{ $brand->name }}</label>
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
                                            <span class="uk-form-icon AsideBlock__inputText">В</span>
                                            <input class="uk-input AsideBlock__input" name="height" type="text"
                                                   placeholder="0">
                                        </div>
                                    </div>
                                    <div class="uk-width-1-1@m">
                                        <div class="uk-inline">
                                            <span class="uk-form-icon AsideBlock__inputText">Ш</span>
                                            <input class="uk-input AsideBlock__input" name="width" type="text"
                                                   placeholder="0">
                                        </div>
                                    </div>
                                    <div class="uk-width-1-1@m">
                                        <div class="uk-inline">
                                            <span class="uk-form-icon AsideBlock__inputText">Д</span>
                                            <input class="uk-input AsideBlock__input" name="depth" type="text"
                                                   placeholder="0">
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
                                <input type="hidden" class="polarity" name="polarity">
                                <div class="AsideBlock__checkboxBlock">
                                    <input class="AsideBlock__checkboxInput" class="brand__selected" id="obratnaya"
                                            type="checkbox" value="Обратная">
                                    <label class="AsideBlock__checkboxLabel xyi" for="obratnaya">Обратная</label>
                                </div>
                                <div class="AsideBlock__checkboxBlock">
                                    <input class="AsideBlock__checkboxInput" class="brand__selected" id="pryamaya"
                                           type="checkbox" value="Прямая">
                                    <label class="AsideBlock__checkboxLabel xyi" for="pryamaya">Прямая</label>
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
                                        <input class="uk-input AsideBlock__input" name="amperes" type="text" value="{{ old('amperes') }}" placeholder="0">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                </ul>
            </div>
            <button type="submit" style="background-color: #2A50B6 !important; color: #fff !important;" class="uk-button uk-button-default aside__btnReset uk-width-1-1 ">Применить фильтр
            </button>
        </div>

    </div>

</form>

<div id="mobileNav" class="mobileNavId" uk-offcanvas="overlay: true; stack: true">
    <button class="uk-offcanvas-close mobileClose" type="button" uk-close></button>

    <div class="uk-offcanvas-bar mobileNav">

        @guest
            <div class="logIn">
                <div class="logIn__text">
                    Войдите, чтобы накапливать и использовать бонусные рубли.
                </div>
                <a href="javascript:;" class="logIn__btn" data-fancybox="" data-src="#login"><i
                        class="icon-sign-in logIn__icon"></i> Войти</a>
            </div>

        @else
            @auth
                <div class="logIn">
                    <a href="{{ route('dashboard') }}" class="logIn__btn"><i
                            class="icon-sign-in logIn__icon"></i> {{ Auth::user()->name }}</a>
                </div>
            @endauth
        @endguest

        <div class="categories">
            <ul>
                @foreach(\App\Models\Category::all() as $category)
                    <li class="categories__li">
                        <a class="categories__link"
                           href="{{ route('category', $category->name) }}">{{ $category->name }}</a>
                    </li>
                @endforeach

                    @foreach(\App\Models\Brand::all() as $brand)
                        <li class="categories__li">
                            <a href="{{ route('brand_get', $brand->name) }}" class="categories__link">{{ $brand->name }}</a>
                        </li>
                    @endforeach
            </ul>
        </div>

        <div class="footer">
            <a href="tel:{{ $settings->phone }}" class="footer__phone">{{ $settings->phone }}</a>
            <span class="footer__text">Режим работы круглосуточно, без выходных</span>
        </div>

    </div>
</div>

<div id="mobileCategory1" class="mobileNavId" uk-offcanvas="overlay: true; stack: true">
    <div class="uk-offcanvas-bar mobileNav">



        <div class="categories">
            <ul>
                @foreach(\App\Models\Category::all() as $category)
                    <li class="catalog__li">
                        <a href="{{ route('category', $category->name) }}"
                           class="catalog__link">{{ $category->name }}</a>
                    </li>
                @endforeach

            </ul>
        </div>

    </div>
</div>

<div id="catalog" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar catalog">
        <ul class="catalog__list">
            <li class="catalog__liHead catalog__li">
                <a href="/" class="catalog__link">Каталог</a>
            </li>
            @foreach(\App\Models\Category::all() as $category)
                <li class="catalog__li">
                    <a href="{{ route('category', $category->name) }}" class="catalog__link">{{ $category->name }}</a>

                    {{--                <div class="catalog__item" uk-drop="pos: right-justify; boundary: #catalog .catalog; boundary-align: true">--}}
                    {{--                    test</div>--}}
                </li>
            @endforeach
            @foreach(\App\Models\Brand::all() as $brand)
                <li class="catalog__li">
                    <a href="{{ route('brand_get', $brand->name) }}" class="catalog__link">{{ $brand->name }}</a>
                </li>
            @endforeach


        </ul>
    </div>
</div>

<header id="header">
    <div id="section1">

        <div class="uk-container">

            <nav class="navbar" uk-navbar>
                <div class="uk-navbar-left">

                    <!--<div class="navbar__mobile uk-hidden@s">-->
                    <!--    <a class="uk-navbar-toggle navbar__mobileBtn" uk-navbar-toggle-icon uk-toggle-->
                    <!--       href="#mobileNav"></a>-->
                    <!--</div>-->

                    <div class="navbar__logo">
                        <a href="/" class="navbar__logoLink"><img class="navbar__logoImg" src="/img/Logo.png"
                                                                  alt="AKB24"></a>
                    </div>

                    <div class="navbar__phone uk-visible@s">
                        <a href="tel:{{ trim($settings->phone) }}" class="navbar__phoneText">{{ $settings->phone }}</a>
                        <a href="tel:89256019089" class="navbar__phoneText">+7 925 601-90-89</a>
                        <span class="navbar__phoneCity">{{ $settings->work_time }}</span>
                    </div>

                </div>

                <div class="uk-navbar-right uk-visible@s">
                    <ul class="uk-navbar-nav navbar__list">
                        @livewire('navigation-menu')
                    </ul>
                </div>

                <div class="uk-navbar-right uk-hidden@m mymargin">
                    <div>
                          <!--  <form action="{{ route('search') }}" method="GET"> -->
                        @csrf
                        	<div class="uk-inline">
                            <button class="uk-form-icon uk-form-icon-flip searchBar__btn mb-searchBar" type="submit"><i
                                    class="icon-search searchBar__btnIcon"></i></button>
                            <input class="uk-input searchBar__input mb-vers" type="text" name="search_value" placeholder="Поиск"  style="text-transform:uppercase">
                            <div class="searchBar__drop mb-search"
                                 uk-drop="mode: click; pos: bottom-justify; boundary: #section2 > .searchBar; boundary-align: true">
                                <div id="search_result1">

                                </div>
                            </div>
							<a href="javascript:;" class="navbar__mobileLink" data-fancybox="" data-src="#cart-wrapper"><i
                                class="icon-cart"></i></a>
                        </div>
                        <!--</form> -->

                    </div>
                </div>
            </nav>

        </div>

    </div>
    <!-- /#section1 -->
    <style>
        .AsideBlock__checkboxInput {
            display: none;
        }

        .searchBar__input::placeholder {
            font-size: 13px;
            font-weight: 400;
        }

        .cart-button {
            border-radius: 25px;
            font-family: sans-serif;
            font-size: 13px;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            position: fixed;
            right: 20px;
            top: 20%;
            z-index: 1000;
            background-color: #fff;
            box-shadow: 0 0 50px 0px rgba(0, 0, 0, .1);
        }

        #cart-wrapper, #order {
            display: none;
            max-width: 660px;
            width: 100%;
        }

        #cart {
            display: flex;
            flex-direction: column;

        }

        .cart-item {
            display: flex;
            margin: 10px 0;
        }

        .cart-item-name {
            font-size: 12px;
        }

        .cart-item-options {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .plus-item, .minus-item, .delete-item {
            background: #fff;
            border: none;
            width: 30px;
            height: 30px
        }

        .item-count {
            padding: 2px;
            border: 1px dashed #191921;
            width: 30%
        }

        .cart-sum {
            margin-bottom: 10px;
        }
    </style>
    <div id="cart-wrapper">
        <div id="cart">
            <ul id="show-cart">
                <li>???????</li>
            </ul>
            <div class="cart-sum">У вас в корзине <span id="count-cart" class="count-cart">X </span> товаров</div>
            <div class="cart-sum">Сумма: <span id="total-cart"></span>₽</div>
            <a href="javascript:;" class="Product__btn" data-fancybox="" data-src="#order">Оформить заказ</a>
        </div>
    </div>
    <div id="order" style="display: none;">
        <form method="POST" action="" class="order_cart">
            @csrf
            <div class="uk-text-lead">Оформление заказа</div>
            <div class="uk-inline uk-margin-small">
                <input type="text" class="uk-input pizdes" name="username" placeholder="Ваше имя" required>
            </div>
            <div class="uk-inline uk-margin-small">
                <input type="text" class="uk-input pizdes" name="phone" placeholder="Ваш телефон" required>
            </div>
            <div class="uk-inline uk-margin-small">
                <label class="uk-label">Способ получения</label> <br>
                <div class="uk-inline uk-margin-small">
                    <label for="d1">Доставка</label>
                    <input type="radio" id="d1" class="uk-radio delivery" name="delivery" value="Доставка" required>
                </div>
                <div class="uk-inline uk-margin-small">
                    <label for="d2">Самовывоз*</label>
                    <input type="radio" id="d2" class="uk-radio delivery" name="delivery" value="Самовывоз" required>
                </div>
                <input type="hidden" name="products" value="" class="cart-products">
            </div>
            <button type="submit" class="Product__btn">Оформить заказ</button>
        </form>
        <small>*Самовывоз с адреса <strong>МКАД, 65-й километр, вл420</strong></small>

    </div>
    <div id="section2" class="uk-visible@m" uk-sticky="media: @m">

        <div class="uk-container">

            <div class="searchBarContent">


                <div class="searchBar">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf
                        <div class="uk-inline">
                            <button class="uk-form-icon uk-form-icon-flip searchBar__btn" type="submit"><i
                                    class="icon-search searchBar__btnIcon"></i></button>
                            <input class="uk-input searchBar__input" type="text" name="search_value" style="text-transform:uppercase"
                                   placeholder="Для более быстрого поиска напишите сюда, что хотите найти">
                            <div class="searchBar__drop"
                                 uk-drop="mode: click; pos: bottom-justify; boundary: #section2 > .searchBar; boundary-align: true">
                                <div id="search_result">

                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="auth">
                    <div id="login" class="hidden">
                        @include('auth.login')
                    </div>
                    <div class="uk-button-group">
                        @guest
                            <a href="javascript:;" class="uk-button uk-button-default auth__btn auth__in"
                               data-fancybox="   login" data-src="#login">Войти</a>
                        @else
                            <a href="/user/profile" class="uk-button uk-button-default auth__btn auth__in">Профиль</a>
                        @endguest
                        <div class="uk-inline">
                            <a href="javascript:;" data-fancybox="" data-src="#cart-wrapper"
                               class="uk-button uk-button-default auth__btn auth__empty auth__cart" type="button"><i
                                    class="icon-cart auth__icon"></i><span class="count-cart">X </span> товаров</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /#section2 -->
</header>
<!-- /#header -->


<main id="main">
    {{ $slot }}
</main>
<!-- /#main -->


@stack('modals')

@livewireScripts
<footer id="footer">

    <div id="section8">

        <div class="uk-container">

            <div class="workContent">
                <div class="workPhone">
                    <p>Есть вопросы? Звоните! <a href="tel:{{ trim($settings->phone) }}"
                                                 class="workPhone__phone">{{ trim($settings->phone) }}</a> Режим работы
                       круглосуточно, без выходных</p>
                </div>


            </div>

        </div>

    </div>
    <!-- /#section8 -->

    <div id="section9">

        <div class="uk-container">

            <div class="footerLastContent">
                <div class="footerLastCompany">
                    © 2016-{{ date('Y') }}  «{{ env('APP_NAME') }}»
                </div>
              <!--  <iframe src="https://yandex.ru/sprav/widget/rating-badge/234101801638" width="150" height="50" frameborder="0"></iframe> -->
                <a href="https://итрр.рф/" title="Разработчик сайта" target="_blank" >
                    <span style="display: flex; align-items: center;" class="nonmobile"><img src="https://итрр.рф/favicon.ico" alt="" width="20">Инновационные Технологические Решения Развития РФ</span>
                    <img src="https://итрр.рф/assets/img/logo.svg" alt="" class="mobile" width="120">
                </a>


            </div>

        </div>

    </div>
    <!-- /#section9 -->
</footer>
<!-- /#footer -->
<a href="tel:+74994999097" class="call">
    <img src="/img/telephone.svg" alt="" width="75">
</a>
<style>
    .call {
        position: fixed;
        left: 20px;
        bottom: 20px;
        z-index: 10000;
    }

</style>

<!-- Optional JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


<!-- JQuery UI Slider -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://atuin.ru/demo/ui-slider/jquery.ui.touch-punch.min.js"></script>
<!-- Uikit JavaScript -->
<script src="/js/uikit.min.js"></script>
<script src="/js/uikit-icons.min.js"></script>
<!-- My JavaScript -->
<script src="/js/dz2.js"></script>
<script src="/js/AsideBlock__checkboxInput.js"></script>
<script src="/js/Catalog.js"></script>
@yield('scripts')
<script src="/js/shoppingCart.js"></script>

<script>

    $(".add-to-cart").click(function (event) {
        event.preventDefault();
        var name = $(this).attr("data-name");
        var price = Number($(this).attr("data-price"));

        shoppingCart.addItemToCart(name, price, 1);
        UIkit.notification({
            message: "Товар успешно добавлен в корзину",
            status: "success",
            pos: "top-left",
            timeout: 2500,
        })
        displayCart();
    });

    $("#clear-cart").click(function (event) {
        shoppingCart.clearCart();
        displayCart();
    });

    function displayCart() {
        $(".cart-products").val(localStorage.getItem('shoppingCart'))
        var cartArray = shoppingCart.listCart();
        // console.log(cartArray);
        var output = "";

        for (let i = 0; i < cartArray.length; i++) {
            output += "<li class='cart-item'>"
                + "<div class='cart-item-name'>" + cartArray[i].name + "</div>"
                + "<div class='cart-item-options'>"
                + " <input class='item-count' type='number' pattern='[0-9]+' title=\"please enter number only\"  data-name='"
                + cartArray[i].name
                + "' value='" + cartArray[i].count + "' >"
                + " <button class='plus-item' data-name='"
                + cartArray[i].name + "'><svg width=\"22\" height=\"22\" viewBox=\"0 0 22 22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                "<path d=\"M11 11H7M11 7V11V7ZM11 11V15V11ZM11 11H15H11Z\" stroke=\"black\" stroke-width=\"2\" stroke-linecap=\"round\"/>\n" +
                "<path d=\"M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z\" stroke=\"black\" stroke-width=\"2\"/>\n" +
                "</svg>\n</button>"
                + " <button class='subtract-item' data-name='"
                + cartArray[i].name + "'><svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                "<path d=\"M16 12H8\" stroke=\"black\" stroke-width=\"2\" stroke-linecap=\"round\"/>\n" +
                "<path d=\"M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z\" stroke=\"black\" stroke-width=\"2\"/>\n" +
                "</svg>\n</button>"
                + " <button class='delete-item' data-name='"
                + cartArray[i].name + "'><svg width=\"50\" height=\"50\" viewBox=\"0 0 50 50\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
                "<path d=\"M25 42C15.6 42 8 34.4 8 25C8 15.6 15.6 8 25 8C34.4 8 42 15.6 42 25C42 34.4 34.4 42 25 42ZM25 10C16.7 10 10 16.7 10 25C10 33.3 16.7 40 25 40C33.3 40 40 33.3 40 25C40 16.7 33.3 10 25 10Z\" fill=\"black\"/>\n" +
                "<path d=\"M32.283 16.302L33.697 17.717L17.717 33.697L16.303 32.283L32.283 16.302Z\" fill=\"black\"/>\n" +
                "<path d=\"M17.717 16.302L33.697 32.282L32.283 33.697L16.303 17.717L17.717 16.302Z\" fill=\"black\"/>\n" +
                "</svg>\n</button>"
                + "</div>"
                + "</li>";
        }

        $("#show-cart").html(output);
        $(".count-cart").html(shoppingCart.countCart() + "&nbsp;");
        $("#total-cart").html(shoppingCart.totalCart());
    }

    $("#show-cart").on("click", ".delete-item", function (event) {
        var name = $(this).attr("data-name");
        shoppingCart.removeItemFromCartAll(name);
        displayCart();
    });

    $("#show-cart").on("click", ".subtract-item", function (event) {
        var name = $(this).attr("data-name");
        shoppingCart.removeItemFromCart(name);
        displayCart();
    });

    $("#show-cart").on("click", ".plus-item", function (event) {
        var name = $(this).attr("data-name");
        shoppingCart.addItemToCart(name, 0, 1);
        displayCart();
    });

    $("#show-cart").on("change", ".item-count", function (event) {
        var name = $(this).attr("data-name");
        var count = Number($(this).val());
        shoppingCart.setCountForItem(name, count);
        displayCart();
    });


    displayCart();

</script>
<script>
    $(".order_cart").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
           url: "{{ route('order.create') }}",
           method: "POST",
           data: $(this).serialize(),
           success: function (response) {
               UIkit.notification({
                   message: "Заказ успешно оформлен",
                   status: "success",
                   pos: "top-center",
                   timeout: 2500,
               })
               shoppingCart.clearCart();
               displayCart();
               $.fancybox.close()
               $.fancybox.close()
           }
        });
    })
</script>
</body>
</html>
