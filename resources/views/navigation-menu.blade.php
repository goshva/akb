<li class="navbar__navLi">
    <x-jet-nav-link href="https://wa.me/74994999097" class="navbar__navLink" target="_blank">
        <img src="/img/whatsapp.svg" alt="" width="32">
    </x-jet-nav-link>
</li>

<li class="navbar__navLi">
    <script data-b24-form="click/215/2p1nwf" data-skip-moving="true"> (function(w,d,u){ var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0); var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h); })(window,document,'https://cdn-ru.bitrix24.ru/b16395938/crm/form/loader_215.js'); </script>
    <x-jet-nav-link href="javascript:;" class="navbar__navLink">
        {{ __('Заказать звонок') }}
    </x-jet-nav-link>
</li>
<li class="navbar__navLi">
    <x-jet-nav-link href="{{ route('about') }}" class="navbar__navLink">
            {{ __('О компании') }}
    </x-jet-nav-link>
</li>
<li class="navbar__navLi">
    <x-jet-nav-link href="{{ route('pay') }}" class="navbar__navLink">
            {{ __('Доставка и оплата') }}
    </x-jet-nav-link>
</li>
<li class="navbar__navLi">
    <x-jet-nav-link href="javascript:;" class="navbar__navLink">
        {{ __('Услуги') }}
    </x-jet-nav-link>
    <div uk-dropdown="mode: click">
        <ul class="uk-nav uk-dropdown-nav">
            <li><a href="{{ route('charging') }}">Зарядка аккумулятора</a></li>
            <li><a href="{{ route('installing') }}">Установка аккумулятора</a></li>
            <li><a href="{{ route('podmena') }}">Подменный аккумулятора</a></li>
            <li><a href="{{ route('check') }}">Проверка генератора</a></li>
        </ul>
    </div>
</li>


<li class="navbar__navLi">
    <x-jet-nav-link href="{{ route('guarantee') }}" class="navbar__navLink">
            {{ __('Гарантии') }}
    </x-jet-nav-link>
</li>
<li class="navbar__navLi">
    <x-jet-nav-link href="javascript:;" class="navbar__navLink">
        {{ __('Информация') }}
    </x-jet-nav-link>
    <div uk-dropdown="mode: click">
        <ul class="uk-nav uk-dropdown-nav">
            <li><a href="{{ route('info.promotions') }}">Акции</a></li>
            <li><a href="{{ route('info.news') }}">Новости</a></li>

            <li><a href="{{ route('info.capacity') }}">Ёмкость аккумулятора</a></li>
            <li><a href="{{ route('info.reviews') }}">Отзывы</a></li>
            <li><a href="{{ route('info.policy') }}">Политика конфиденциальности</a></li>
            <li><a href="{{ route('info.replacement') }}">Подменный аккумулятор</a></li>
        </ul>
    </div>
</li>
<li class="navbar__navLi">
    <x-jet-nav-link href="{{ route('recommendation') }}" class="navbar__navLink">
        {{ __('Рекомендации') }}
    </x-jet-nav-link>


    <div uk-dropdown="mode: click">
    @php
    $files = File::allFiles(resource_path('views/rec'));
    foreach ($files as &$file) {
        $name = explode(".",(pathinfo($file)['filename']));

    @endphp
        <ul class="uk-nav uk-dropdown-nav">
            <li><a href="/recommendation/{{$name[0]}}">{{strtoupper($name[0])}}</a></li>
        </ul>
    @php
    }
    @endphp


    </div>
</li>



@guest

@else
        <li class="navbar__navLi">
            <a href="/user/profile" class="navbar__navLink">
                {{ Auth::user()->name }}
            </a>
        </li>
        <div uk-dropdown="mode: hover">
                @if(Auth::user()->admin)
                <x-jet-nav-link href="{{ route('admin') }}" target="_blank" class="navbar__navLink">
                    <strong class="text-danger"> {{ __('Админ панель') }}</strong>
                </x-jet-nav-link>
                @endif
                    <a href="/user/profile" class="navbar__navLink">Профиль</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="navbar__navLink"
                   onclick="event.preventDefault();
                            this.closest('form').submit();">
                    {{ __('Выйти') }}
                </a>
            </form>

        </div>
@endguest
