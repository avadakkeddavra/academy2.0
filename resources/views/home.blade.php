@extends('layouts.app')
@section('content')


    <section class="latest-event container">
        <div class="row">
            <div class="col-md-6 img"><img src="img/slide1.jpg" alt="" class="img-responsive"></div>
            <div class="col-md-6 news-info">
                <h3 class="h-inline">{{ $lastnew->title }}<i class="fa fa-book"></i></h3>

                <p class="desc-info">{{ $lastnew->text }}</p>

                <a href="#" class="btn-standart">Подробнее</a>
            </div>
        </div>
    </section>

    <section class="about container">
        <h3 class="h-block">Про факультет<i class="fa fa-comment-o"></i></h3>
        <div class="row">
            <div class="col-md-3 about-item">
                <div class="circle"><i class="fa fa-suitcase"></i></div>
                <div class="desc">
                    <h3 class="h-desc">Lorem ipsum dolor.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore delectus aperiam libero nesciunt vel minus reiciendis sed, soluta perspiciatis dignissimos fuga rem, voluptate eos porro id molestiae ratione officiis totam!</p>
                </div>
            </div>
            <div class="col-md-3 about-item">
                <div class="circle"><i class="fa fa-diamond"></i></div>
                <div class="desc">
                    <h3 class="h-desc">Lorem ipsum dolor.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore delectus aperiam libero nesciunt vel minus reiciendis sed, soluta perspiciatis dignissimos fuga rem, voluptate eos porro id molestiae ratione officiis totam!</p>
                </div>
            </div>
            <div class="col-md-3 about-item">
                <div class="circle"><i class="fa fa-book"></i></div>
                <div class="desc">
                    <h3 class="h-desc">Lorem ipsum dolor.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore delectus aperiam libero nesciunt vel minus reiciendis sed, soluta perspiciatis dignissimos fuga rem, voluptate eos porro id molestiae ratione officiis totam!</p>
                </div>
            </div>
            <div class="col-md-3 about-item">
                <div class="circle"><i class="fa fa-plug"></i></div>
                <div class="desc">
                    <h3 class="h-desc">Lorem ipsum dolor.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore delectus aperiam libero nesciunt vel minus reiciendis sed, soluta perspiciatis dignissimos fuga rem, voluptate eos porro id molestiae ratione officiis totam!</p>
                </div>
            </div>
        </div>
    </section>


    <section class='departments container'>
       <h3 class="h-block">Кафедри факультету <i class="fa fa-heart-o"></i></h3>
        <div class="row">
            @foreach($cafedras as $key => $caf)

                <div class="col-md-4 col-sm-6 department">
                    <h3 class="h-desc"><a href="#" class="h-link">{{ $caf->name }}</a></h3>
                    <p>{{ $caf->description }}</p>
                </div>
                @if($key == 2)
                    <div class="clearfix"></div>
                @endif
            @endforeach
        </div>
    </section>


    <section class="container for-students">
        <h2 class="h-block">Студентам<i class="fa fa-graduation-cap"></i></h2>
        <div class="row">
            @foreach($data['students'] as $new)
                <div class="col-md-4 col-sm-6">
                    <a href="#" class="h-link"><img src="{{asset('img')}}/{{$new->img}}" alt="" class="img-responsive"></a>
                    <h3 class="h-desc"><a href="#" class="h-link">{{$new->title}}</a></h3>
                    @php echo $new->text; @endphp
                    <a href="#" class="btn-standart">Подробнее</a>
                </div>
            @endforeach


            {{--<div class="col-md-4 col-sm-6">--}}
                {{--<a href="#" class="h-link"><img src="img/for-students2.jpg" alt="" class="img-responsive"></a>--}}
                {{--<h3 class="h-desc"><a href="#" class="h-link">Розклад занять</a></h3>--}}
                {{--<p>Аудиторі навчання проводяться згідно затвердженого розкладу занять на поточний семестр навчального року. Нагадуємо, що перша пара занять починається о 08-45. Тривалість кожної пари 1 година 20 хвилин. </p>--}}
                {{--<a href="#" class="btn-standart">Подробнее</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-4 col-sm-6">--}}
                {{--<a href="#" class="h-link"><img src="img/for-students3.jpg" alt="" class="img-responsive"></a>--}}
                {{--<h3 class="h-desc"><a href="#" class="h-link">Розклад сесії</a></h3>--}}
                {{--<p>Розклад занять встановлюється на поточний семестр навчального року.</p>--}}
                {{--<a href="#" class="btn-standart">Подробнее</a>--}}
            {{--</div>--}}
        </div>
    </section>

    <section class="container teachers">
        <h2 class="h-block">Деканат<i class="fa fa-briefcase"></i></h2>
        <div class="row">
            <div class="col-md-4 col-sm-6 teacher">
                <img src="img/teacher_solodulhin.jpg" alt="" class="img-responsive">
                <div class="teacher-info">
                    <h3 class="h-desc">Декан факультету</h3>
                    <p class="teach_name">Солодухін Станіслав Володимирович</p>
                    <p class="teach_work">к.е.н., доцент</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 teacher">
                <img src="img/G150915_3.jpg" alt="" class="img-responsive">
                <div class="teacher-info">
                    <h3 class="h-desc">Заступник декана</h3>
                    <p class="teach_name">Крайнік Олена Миколаївна</p>
                    <p class="teach_work">к.е.н., доцент, доцент кафедри менеджменту організацій та управління проектами</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 teacher">
                <img src="img/itbb070416_8.jpg" alt="" class="img-responsive">
                <div class="teacher-info">
                    <h3 class="h-desc">Заступник декана</h3>
                    <p class="teach_name">Мержинський Євген Костянтинович</p>
                    <p class="teach_work">к.е.н., доцент, доцент кафедри економіки та інформаційних технологій</p>
                </div>
            </div>
        </div>
            <div class="row">
            <div class="col-md-4 col-sm-6 teacher">
                <img src="img/G011013_4.jpg" alt="" class="img-responsive">
                <div class="teacher-info">
                    <h3 class="h-desc">Фахівець</h3>
                    <p class="teach_name">Захарчук Олена Олександрівна </p>
                    <p class="teach_work">Методист заочної форми навчання</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 teacher">
                <img src="img/G110110_7.jpg" alt="" class="img-responsive">
                <div class="teacher-info">
                    <h3 class="h-desc">Фахівець</h3>
                    <p class="teach_name">Нідєлкова Любов Іллінічна </p>
                    <p class="teach_work">Методист заочної форми навчання</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 teacher">
                    <div class="contact_info">
                    <p>69006, Запоріжжя,</p>
                    <p>пр. Соборний 226, ауд. л315</p>
                    <p>+38(061)227-12-62</p>
                    <p>5-72, 5-92</p>
                    <p>fem.zgia@gmail.com</p>
                </div>
            </div>
        </div>
    </section>

    <section class="parallax latest-events">
        <div class="bg-overlay"></div>
        <div class="container">
            <h2 class="h-block">последние события</h2>
            <div class="row">


                    @foreach($data['events'] as $event)

                            <div class="col-md-4 col-sm-6 event">
                                <a href="/news/{{$event->id}}" class="h-link">
                                    @if($event->img != '')
                                        <img src="{{asset('img')}}/{{ $event->img }}" alt="" class="img-responsive">
                                    @else
                                        <img src="{{asset('img/default.jpg')}}" alt="" class="img-responsive">
                                    @endif
                                </a>
                                <div class="event-info">
                                    <a href="/news/{{$event->id}}" class="h-link"><h3 class="h-desc">{{ $event->title }}</h3></a>
                                    <p>{{ $event->text }}</p>
                                </div>
                            </div>

                    @endforeach
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

    <section class="latest-news container">
        <h2 class="h-block">Последние новости</h2>
        <div class="row">
            @foreach($data['news'] as $new)

                <div class="col-md-4 col-sm-6 new">
                    <a href="/news/{{$event->id}}" class="h-link">
                        @if($new->img != '')
                            <img src="{{asset('img')}}/{{ $new->img }}" alt="" class="img-responsive">
                        @else
                            <img src="{{asset('img/default.jpg')}}" alt="" class="img-responsive">
                        @endif
                    </a>
                    <h3 class="h-desc" style="margin-bottom: 0;"><a href="#" class="h-link">{{$new->title}}</a></h3>
                    <div class="" style="margin-bottom: 7px;">
                        <i class="fa fa-calendar"></i>
                        {{ explode(' ',$new->updated_at)[0] }}
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum perferendis, facilis provident ea reprehenderit alias fugit ratione perspiciatis necessitatibus libero eligendi laboriosam eveniet possimus soluta velit assumenda! Sit, maiores facere?</p><a href="#" class="btn-standart">Подробнее</a>
                </div>

            @endforeach
        </div>
    </section>

    <footer>
   <div class="container">
        <h2 class="h-block">Связяться с нами</h2>
               <div class="row form-rules">
                    <div class="col-md-6 contact-form">
                    <form action="" class="form" role="form">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Имя">
                        </div>

                        <div class="form-group">

                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input type="number" name="number" class="form-control" placeholder="Номер телефона">
                        </div>

                        <div class="form-group">
                            <input type="text" name="message-theme" class="form-control" placeholder="Тема сообщения">
                        </div>

                        <textarea name="message" class="form-control">Сообщение</textarea>
                        <button type="submit">Отправить</button>
                    </form>
                </div>
                <div class="col-md-6 rules">
                    <h3 class="h-desc">Lorem ipsum dolor sit.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium debitis iusto vero similique doloribus, nulla, consectetur, saepe rem quo cumque possimus. Asperiores, deleniti, impedit delectus voluptas similique saepe repellat aperiam!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium debitis iusto vero similique doloribus, nulla, consectetur, saepe rem quo cumque possimus. Asperiores, deleniti, impedit delectus voluptas similique saepe repellat aperiam!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium debitis iusto vero similique doloribus, nulla, consectetur, saepe rem quo cumque possimus. Asperiores, deleniti, impedit delectus voluptas similique saepe repellat aperiam!</p>
                </div>
            </div>
        </div>


        <div class="row footer-menu">
          <div class="container">
                  <div class="col-md-3 col-sm-6 footer-item">
                    <h4 class="h_col">Ближайшие события</h4>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 footer-item">
                    <h4 class="h_col">Страницы кафедр</h4>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 footer-item">
                    <h4 class="h_col">Для студентов</h4>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 footer-item">
                    <h4 class="h_col">для абитуриентов</h4>
                    <ul>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                        <li><a href="#">Lorem ipsum dolor.</a></li>
                    </ul>
                </div>
            </div>
        </div>
@endsection