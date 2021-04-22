<x-app-layout>


    <div id="app" class="app-layout-default"><!----><!---->

        <main>
            <div class="page-index">
                <div class="bg-grey">
                    <div class="home-aside-slider container desktop-only">
                        <div class="home-aside-slider__wrap">
                            <div class="base-swiper home-aside-slider__slides">
                                <div class="base-swiper__content-wrapper">
                                    <div class="base-swiper__content" >
                                        <div draggable="false" data-campaign-id="000010752"
                                             class="base-swiper__slide-item home-aside-slider__slide">
                                            <div class="banner-view"><a
                                                    href="#"
                                                    data-campaign-id="000010752"
                                                    class="banner-image ddl_campaign ddl_campaign_link"><img
                                                        src="https://main-cdn.goods.ru/upload/mnt/84ef18cc-3dd8-4489-8a0b-f222e4fa9bda.jpg"
                                                        alt=""></a><!----></div>
                                        </div>
                                        <div draggable="false" data-campaign-id="000010461"
                                             class="base-swiper__slide-item home-aside-slider__slide">
                                            <div class="banner-view"><a href="#"
                                                                        data-campaign-id="000010461"
                                                                        class="banner-image ddl_campaign ddl_campaign_link"><img
                                                        src="https://main-cdn.goods.ru/upload/mnt/522aa515-fae9-4b51-acf0-1f2b93ebb691.jpg"
                                                        alt=""></a><!----></div>
                                        </div>
                                        <div draggable="false" data-campaign-id="000010229"
                                             class="base-swiper__slide-item home-aside-slider__slide">
                                            <div class="banner-view"><a
                                                    href="#"
                                                    data-campaign-id="000010229"
                                                    class="banner-image ddl_campaign ddl_campaign_link"><img
                                                        src="https://main-cdn.goods.ru/upload/mnt/4881dc05-7c11-4dd8-bb4d-55ebf2ee6a7e.jpg"
                                                        alt=""></a><!----></div>
                                        </div>
                                        <div draggable="false" data-campaign-id="000010389"
                                             class="base-swiper__slide-item current home-aside-slider__slide">
                                            <div class="banner-view"><a
                                                    href="#"
                                                    data-campaign-id="000010389"
                                                    class="banner-image ddl_campaign ddl_campaign_link"><img
                                                        src="https://main-cdn.goods.ru/upload/mnt/f5135e2d-65e3-453e-a54e-4ab9cef26a9d.jpg"
                                                        alt=""></a><!----></div>
                                        </div>
                                        <div draggable="false" data-campaign-id="000009986"
                                             class="base-swiper__slide-item home-aside-slider__slide">
                                            <div class="banner-view"><a
                                                    href="#/"
                                                    data-campaign-id="000009986"
                                                    class="banner-image ddl_campaign ddl_campaign_link"><img
                                                        src="https://main-cdn.goods.ru/upload/mnt/4f19821a-e169-4f57-a98f-e94c532f91e0.jpg"
                                                        alt=""></a><!----></div>
                                        </div>
                                        <div draggable="false" data-campaign-id="000009815"
                                             class="base-swiper__slide-item home-aside-slider__slide">
                                            <div class="banner-view"><a
                                                    href="#"
                                                    data-campaign-id="000009815"
                                                    class="banner-image ddl_campaign ddl_campaign_link"><img
                                                        src="https://main-cdn.goods.ru/upload/mnt/34aea67c-17ad-49b7-a370-be3aba588e71.jpg"
                                                        alt=""></a><!----></div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="home-aside-slider__aside">
                                <div class="banner-view"><a
                                        href="#"
                                        data-campaign-id="000009552"
                                        class="banner-image ddl_campaign ddl_campaign_link"><img
                                            src="https://main-cdn.goods.ru/upload/mnt/127973d3-f7aa-4747-b1dc-5bf01a5c0bdd.png"
                                            alt=""></a><!----></div>
                                <div class="banner-view"><a
                                        href="#"
                                        data-campaign-id="000010053"
                                        class="banner-image ddl_campaign ddl_campaign_link"><img
                                            src="https://main-cdn.goods.ru/upload/mnt/1c8c5e5c-5dc3-4df3-90ae-6dc240e73073.jpg"
                                            alt=""></a><!----></div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-view page-index__banner-mobile mobile-only"><a
                            href="#"
                            data-campaign-id="000010707" class="banner-image ddl_campaign ddl_campaign_link"><img
                                src="https://main-cdn.goods.ru/upload/mnt/c8452b4a-fcb0-4ea9-9577-42a2e83a3a66.jpg" alt=""></a>
                        <!----></div>

                </div>



                <div class="product-block">
                    <div class="container"><h2 class="page-title">Популярные товары</h2>
                        <div class="expandable-product-list has-more">
                            <div class="outer">
                                <div class="inner">
                                    <div class="product-list with-first-banner">
                @foreach($products as $product)

                                        <div class="col">
                                            <div class="item item-product"><!----><a
                                                    href="#"
                                                    class="item-link ddl_product ddl_product_link">
                                                    <div class="item-pic-container">
                                                        <img
                                                            src="{{ $product->img }}"
                                                            class="item-pic">

                                                    </div>
                                                    <div class="item-title">{{ $product->name }}</div>
                                                    <div class="item-price">
                                                        <div class="amount">{{ $product->price }} ₽</div>
                                                        <div class="money-bonus xs">
                                                            <span class="bonus-percent">
                                                                <span>0%</span>
                                                            </span>
                                                            <span class="bonus-amount">
                                                                <span>496</span>
                                                            </span>
                                                            <svg class="svg-icon">
                                                                <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     xlink:href="#i-coins"></use>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </a></div>
                                        </div>
                @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!---->

                <div class="brand-block">
                    <div class="container"><h2 class="page-title">представленные бренды</h2>
                        <div class="scroll">
                            <div class="brand-list">
                                <div class="brand-list__col">
                                    <div class="banner-view brand-list__item"><a href="#"
                                                                                 data-campaign-id="000000320"
                                                                                 class="banner-image ddl_campaign ddl_campaign_link"><img
                                                src="https://main-cdn.goods.ru/upload/mnt/8cefb55d-6fd7-4e47-b0a6-f2df3e06ebd6.png"
                                                alt=""></a><!----></div>
                                </div>
                                <div class="brand-list__col">
                                    <div class="banner-view brand-list__item"><a href="#"
                                                                                 data-campaign-id="000000320"
                                                                                 class="banner-image ddl_campaign ddl_campaign_link"><img
                                                src="https://main-cdn.goods.ru/upload/mnt/8cefb55d-6fd7-4e47-b0a6-f2df3e06ebd6.png"
                                                alt=""></a><!----></div>
                                </div>  <div class="brand-list__col">
                                    <div class="banner-view brand-list__item"><a href="#"
                                                                                 data-campaign-id="000000320"
                                                                                 class="banner-image ddl_campaign ddl_campaign_link"><img
                                                src="https://main-cdn.goods.ru/upload/mnt/8cefb55d-6fd7-4e47-b0a6-f2df3e06ebd6.png"
                                                alt=""></a><!----></div>
                                </div>  <div class="brand-list__col">
                                    <div class="banner-view brand-list__item"><a href="#"
                                                                                 data-campaign-id="000000320"
                                                                                 class="banner-image ddl_campaign ddl_campaign_link"><img
                                                src="https://main-cdn.goods.ru/upload/mnt/8cefb55d-6fd7-4e47-b0a6-f2df3e06ebd6.png"
                                                alt=""></a><!----></div>
                                </div>  <div class="brand-list__col">
                                    <div class="banner-view brand-list__item"><a href="#"
                                                                                 data-campaign-id="000000320"
                                                                                 class="banner-image ddl_campaign ddl_campaign_link"><img
                                                src="https://main-cdn.goods.ru/upload/mnt/8cefb55d-6fd7-4e47-b0a6-f2df3e06ebd6.png"
                                                alt=""></a><!----></div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
        <footer id="page-footer">
            <div class="page-footer-top">
                <div class="container">
                    <nav class="page-footer-menu">
                        <div class="inner">
                            <div class="block-title"><span>{{ env('APP_NAME') }}</span>
                                <svg class="caret svg-icon">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#i-angle-down"></use>
                                </svg>
                            </div>
                            <ul>
                                <li class="item"><a href="#" class="">О компании</a></li>
                                <li class="item"><a href="#" class="">Контакты</a></li>
                                <li class="item"><a href="/rekvizity/" class="">Реквизиты</a></li>
                            </ul>
                        </div>
                    </nav>


                </div>
            </div>

            <div class="page-footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col copyright">
                            <div class="by">маркетплейс <b>goods</b><br>создан и поддерживается <b>М.Видео</b></div>
                            <div class="who">© 2000-{{ date('Y') }} ООО «{{ env('APP_NAME') }}»</div>
                        </div>

                    </div>
                </div>
            </div>
        </footer><!---->
        <noindex>
            <div data-nosnippet="">
                <div class="ie-stub">
                    <div class="ie-stub-modal-wrapper">
                        <div class="ie-stub-modal">
                            <svg class="ie-stub-modal__close-button svg-icon">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#i-cross"></use>
                            </svg>
                            <div class="ie-stub-modal__header">Откройте {{ env("APP_URL") }} в другом браузере</div>
                            <div class="ie-stub-modal-body">Сайт больше не поддерживает ваш браузер.<br>Пожалуйста,
                                используйте другой.
                            </div>
                            <div class="ie-stub-modal-recommend-browsers"><a target="_blank"
                                                                             href="https://www.google.com/intl/ru_ru/chrome/"
                                                                             class="ie-stub-modal-recommend-browsers__chrome">Chrome</a><a
                                    target="_blank" href="https://browser.yandex.ru/"
                                    class="ie-stub-modal-recommend-browsers__yandex">Yandex</a><a target="_blank"
                                                                                                  href="https://www.opera.com/ru"
                                                                                                  class="ie-stub-modal-recommend-browsers__opera">Opera</a><a
                                    target="_blank" href="https://www.mozilla.org/ru/firefox/download/thanks/"
                                    class="ie-stub-modal-recommend-browsers__firefox">Firefox</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </noindex>
    </div>
</x-app-layout>
