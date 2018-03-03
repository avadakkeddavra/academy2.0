
@php
    function cutText($text, $symbols)
    {
        echo substr($text,0,$symbols).'...';
    }

    function showHtml($html)
    {
        echo $html;
    }
    function getNewType($type)
    {
        switch($type)
        {
            case 0:
                $name = 'новость';
            break;
            case 1:
                $name = 'статья';
            break;
            case 2:
                $name = 'событие';
            break;
        }

        echo '<div class="chip">
                '.$name.'
              </div>';
    }
@endphp

@if( !isset($news[0]) )
    <h4>Нет элементов соответсвующих поиску</h4>
@endif
@foreach($news as $key => $new)
    @if( $new->priority == 3 && ($key+1)%4 != 0)
        <div class="col s12 m6">
    @else
        <div class="col s12 m3">
    @endif
        @if($ajax == true)
                <div class="card ajax">
        @else
                <div class="card">
        @endif

            @if($new->img == '')
                <div class="card-image" style="background: url({{asset('img/default.jpg')}}) center/cover;">
            @else
                <div class="card-image" style="background: url({{asset('img')}}/{{$new->img}}) center/cover;">
            @endif

                <span class="card-title">{{$new->title}}</span>
                    <div class="chips">
                        {{getNewType($new->type)}}
                        <div class="chip">{{$new->cafedra->name}}</div>
                    </div>

            </div>
            <div class="card-content">
                <p>{{ cutText($new->text,100) }}</p>
            </div>
            <div class="card-action">
                <a href="/news/{{$new->id}}">Подробнее</a>
            </div>
        </div>
    </div>
@endforeach
