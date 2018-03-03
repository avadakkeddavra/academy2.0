@extends('layouts.app')

@section('content')

    <main>
        <section class="header">
            <div class="description">
                <h4>Новости факультета</h4>
            </div>
        </section>
        <section class="news_container">
            <div class="settings row z-depth-4">
                <h4 class="title">Настройки поиска</h4>
                <div class="input-field col s12 m4 caf_select">
                    <select id="caf">
                        <option value="" disabled selected>Выберите кафедру</option>
                        <option value="">Все</option>
                        @foreach($cafedras as $cafedra)
                            <option value="{{$cafedra->id}}">{{$cafedra->name}}</option>
                        @endforeach
                    </select>
                    <label>Kafedra</label>
                </div>
                <div class="input-field col m4">
                    <label><i class="fa fa-calendar"></i> Дата создания </label>
                    <input type="text" id="date" class="datepicker" placeholder="Choose a date">
                </div>

                <div class="input-field col s12 m2">
                    <select id="type">
                        <option value="1" disabled selected>Выберите тип</option>
                        <option value="0">Новость</option>
                        <option value="1">Статья</option>
                        <option value="2">Событие</option>
                    </select>
                    <label>Тип</label>
                </div>

                <div class="input-field col s12 m2">
                    <button class="waves-effect waves-light btn" id="search">Поиск</button>
                </div>

            </div>
            <div class="filters-row">

            </div>
            <div class="preloader-wrapper active" style="display:none;margin: 0 auto;">
                <div class="spinner-layer spinner-red-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <div class="row news_input_container">
                @include('layouts.partials.news_template')
            </div>
            <button id="loadmore" class="waves-effect waves-light btn z-depth-3" style="margin: 0 auto;display: block;margin-bottom: 50px;">Ещё</button>
        </section>

    </main>
@endsection
@section('custom_scripts')
    <script>
        $(document).ready(function() {
            $('select').material_select();
            $('#type').on('change',function(){
               var val = $(this).val();

               if(val == 0)
               {
                   var name = 'новость';
               }else if(val == 1){
                   var name = 'статья';
               }else{
                   var name = 'событие';
               }
               $('.filters-row .type').remove();
               $('.filters-row').append('<div class="chip type">'+name+'</div>');
            });

            $('.caf_select ul.dropdown-content li').on('click','span',function(){
                var name = $(this).text();
                $('.filters-row .caf').remove();
                $('.filters-row').append('<div class="chip caf">'+name+'</div>');
            })

            $('#search').on('click',function(){
                var data = {
                    type:$('#type').val(),
                    date:$('#date').val(),
                    caf_id:$('#caf').val()
                };
                var chip = '<div class="chip"></div>';

                $('.preloader-wrapper').show();
                $('.news_input_container').empty();
                //$('.news_input_container').attr('data-param',JSON.stringify(data));

                $.ajax({
                    url:'/news/search',
                    data:data,
                    type:'POST',
                    success:function(response)
                    {
                        $('.news_input_container').append(response);
                        console.log(response);
                        $('.preloader-wrapper').hide();
                        setTimeout(function(){
                            $('body').find('.news_input_container').find('.card.ajax').css({
                                transform:'scale(1)',
                            })

                        },200);
                    }
                })
            });

            $('#loadmore').on('click',function(){
                var data = {
                    type:$('#type').val(),
                    date:$('#date').val(),
                    caf_id:$('#caf').val(),
                    skip:$('body').find('.news_input_container').find('.col').length
                };

                $.ajax({
                    url:'/news/search',
                    data:data,
                    type:'POST',
                    success:function(response)
                    {
                        $('.news_input_container').append(response);

                        setTimeout(function(){
                            $('body').find('.news_input_container').find('.card.ajax').css({
                                    transform:'scale(1)',
                                })

                        },200);

                    }
                })
            })
        });

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false, // Close upon selecting a date,
            format: 'yyyy-mm-d'
        });
    </script>
@endsection