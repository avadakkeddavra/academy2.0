    <header>
      <div class="bg-overlay"></div>
       <div class="menu-row row">
          <div class="logo col-sm-4"><img src="" alt=""></div>
           <ul class="menu col-sm-6 pull-right">
               <li><a href="{{route('home')}}">Головна</a></li>
               <li><a href="{{ route('news') }}">Новини</a></li>
               {{--<li><a href="#">Деканат</a></li>--}}
               {{--<li><a href="#">Кафедри</a></li>--}}
               {{--<li><a href="#">Студентам</a></li>--}}
               <li><a href="#">Контакти</a></li>
           </ul>
       </div>
        @if(Route::currentRouteName() == 'departement')
            <div class="site-title">
                <h1>Кафедра економики предприятия</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus atque vitae molestiae et soluta aperiam modi quos, quod accusantium optio.</p>
                <a href="#">Связаться с нами</a>
            </div>
            @else
            <div class="site-title">
                @if( $title != '')
                    <h1>{{$title}}</h1>
                @endif
                <div class="link-pannel">
                    <a href="/">Главная</a>
                    <a href="/news">Новости</a>
                    @if(Route::currentRouteName() == 'new.single')
                        <span class="current-page"> {{$title}}</span>
                    @endif
                </div>
            </div>
        @endif



    </header>