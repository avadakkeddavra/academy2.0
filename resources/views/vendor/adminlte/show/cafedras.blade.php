@extends('adminlte::layouts.app')


@section('htmlheader_title')
    {{ 'Teachers' }}
@endsection

@section('contentheader_title')
    Преподаватели
@endsection

@section('htmllinks')
    <style>
        .connectedSortable{
            text-align: center;
        }
        table thead{
            background-color: #2c2633;
            border-radius: 5px;
        }
        table thead th:first-child{
            border-radius: 5px 0px 0px 0px;
        }
        table thead th:last-child{
            border-radius: 0px 5px 0px 0px;
        }
        table thead th{
            padding: 25px 20px !important;
            color: #fff;
            background-color: #2c2633;
        }
        table {
            text-align: left;
            border-radius: 5px;
            margin-bottom: 0 !important;
            background-color: #fff;
            box-shadow: 0 8px 10px 1px rgba(0,0,0,0.14), 0 3px 14px 2px rgba(0,0,0,0.12), 0 5px 5px -3px rgba(0,0,0,0.3);
        }
        .pagination{
            box-shadow: 0 8px 10px 1px rgba(0,0,0,0.14), 0 3px 14px 2px rgba(0,0,0,0.12), 0 5px 5px -3px rgba(0,0,0,0.3);
            display: block;
            margin: 0 auto;
        }
        table td{
            padding: 15px 15px !important;
        }
        table tr {
            background-color: #fff;
        }
        table tr.deleted{

        }
        table td p{
            display: inline-block;
        }
        table td button{
            background-color: transparent;
            border:none;
        }
        .update{
            color: #79df90;
        }
        .delete{
            color: red;
        }
    </style>
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="col-md-12 connectedSortable ui-sortable">


            <table id="newsTable" class="table dataTable table-hover">
                <thead>
                <th>Название</th>
                <th>SRC картинки</th>
                <th>Описание</th>
                <th>Заведующий</th>
                <th>Дата создания</th>
                <th></th>
                </thead>

                <tbody id="newsTable">
                @foreach($cafedras as $cafedra)

                    <tr data-id="{{ $cafedra->id }}">
                        <td>{{ $cafedra->name }}</td>
                        <td>{{ $cafedra->img }}</td>
                        <td>{{ $cafedra->text }}</td>
                        <td>{{ $cafedra->header->name }}</td>
                        <td>{{ explode(' ',$cafedra->updated_at)[0] }}</td>
                        <td>
                            <a href="/admin/update/cafedra/{{$cafedra->id}}" target="_blank" class="update"><i class="fa fa-pencil"></i></a>
                            @if($cafedra->trashed())
                                <button class="restore"><i class="fa fa-reply"></i></button>
                            @else
                                <button class="delete"><i class="fa fa-trash"></i></button>
                            @endif

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
@section('scriptcustom')

    <script src="{{ asset('js/sort.js') }}"></script>
    <script>

        // Teachers CONTRoll
        type = 'Cafedras';
        $(document).ready(function(){
            $('.delete').on('click',function(){
                var id = $(this).parents('tr').data('id');
                var $this = $(this);
                $.ajax({
                    url:'/admin/delete',
                    data:{id: id,type: type},
                    type:'POST',
                    dataType:'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(response){
                        noty('success','Успешно','Кафедра удалена');
                        $this.addClass('restore');
                        $this.removeClass('delete');
                        $this.html('<i class="fa fa-reply"></i>')
                    }
                });
            }) ;
            $('#newsTable').find('tr').children('td').on('click','button.restore',function(){
                var id = $(this).parents('tr').data('id');
                var $this = $(this);
                $.ajax({
                    url:'/admin/restore',
                    data:{id: id,type:type},
                    type:'POST',
                    dataType:'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(response){
                        noty('success','Успешно','Кафедра востановлена');
                        $this.addClass('delete');
                        $this.removeClass('restore');
                        $this.html('<i class="fa fa-trash"></i>')
                    }
                });
            })

        }) ;

    </script>
@endsection