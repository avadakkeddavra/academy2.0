@extends('layouts.app')
@section('content')
<section class="container news-list-container">
    <div class="news-list col-sm-9">
        @foreach($news as $new)

            <article class="new">
                @if($new->img)
                    <img src="{{asset('img').'/'.$new->img}}" alt="" class="img-responsive">
                @else
                    <img src="{{asset('img/default.jpg')}}" alt="" class="img-responsive">
                @endif
                <div class="entry-content">
                    <h3 class="h-desc"><a href="/news/{{$new->id}}" class="h-link">{{$new->title}}</a></h3>
                    <div class="row publish-info">
                        <div class="col-xs-12">
                            <span class="date"><i class="fa fa-calendar"></i>{{$new->created_at}}</span>
                            <span class="departement-from"><a href="#"><i class="fa fa-address-card"></i>{{$new->cafedra->name}}</a></span>
                        </div>
                    </div>
                    <div class="desc">
                        @php echo $new->text @endphp
                    </div>
                </div>
                <a href="/news/{{$new->id}}" class="btn-standart">Подробнее</a>
            </article>

        @endforeach

    </div>
    <div class="sidebar col-sm-3">
        <article class="sidebar-block">
            <h3 class="h_col">Последние новости</h3>
            <ul>
                <li><a href="#">news Lorem.</a></li>
                <li><a href="#">Lorem ipsum dolor.</a></li>
                <li><a href="#">Lorem ipsum.</a></li>
            </ul>
        </article>
        <article class="sidebar-block">
            <h3 class="h_col">События</h3>
            <ul>
                <li><a href="#">news Lorem.</a></li>
                <li><a href="#">Lorem ipsum.</a></li>
            </ul>
        </article>
        <article class="sidebar-block">
            <h3 class="h_col">Статьи</h3>
            <ul>
                <li><a href="#">news Lorem.</a></li>
                <li><a href="#">Lorem ipsum.</a></li>
            </ul>
        </article>
    </div>
</section>
@endsection