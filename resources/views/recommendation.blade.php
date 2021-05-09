<x-app-layout>
    <div class="uk-container">
        <div class="QueryTitle__text">Рекомендации</div>

        <div  id="{{$id}}" class="title-post">"{{strtoupper($id)}}"</div><br>

    @include("rec.".$id);
    </div>
</x-app-layout>
