@extends('adminlte::layouts.app')


@section('htmlheader_title')
	{{ 'Home' }}
@endsection

@section('contentheader_title')
	{{ $type }}
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
						<th>Тип</th>
						<th>Текст</th>
						<th>Изображение</th>
						<th>Дата создания</th>
						<th></th>
						</thead>
						
						<tbody id="newsTable">
							@foreach($news as $new)
								@if($new->trashed())
									<tr class="deleted" data-id="{{ $new->id }}">
								@else
									<tr data-id="{{ $new->id }}">
								@endif
									@php
										switch($new->type){
											case 0:
												$type = 'новость';
											break;
											
											case 1:
												$type = 'статья';
											break;
											
											case 2:
												$type = 'событие';
											break;
										}
									@endphp
									<td><a href="/update/new/{{ $new->id }}">{{ $new->title }}</a></td>
									<td>{{ $type }}</td>

									<td>@php echo substr($new->text,0,60);  @endphp ...</td>
									<td>{{ $new->img }}</td>
									<td>{{ explode(' ',$new->updated_at)[0] }}</td>
									<td>
										<button class="update"><i class="fa fa-pencil"></i></button>
										@if($new->trashed())
											<button class="restore"><i class="fa fa-reply"></i></button>
										@else
											<button class="delete"><i class="fa fa-trash"></i></button>
										@endif
										
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

				{{ $news->links() }}
		</div>
</div>
@endsection
@section('scriptcustom')
<script src="{{ asset('plugins/jQueryUI/jquery-ui.js') }}"></script>
<script src="{{ asset('js/sort.js') }}"></script>
<script>
	// MATERIALS CONTRoll 
type = 'News';
$(document).ready(function(){
    $('.delete').on('click',function(){
        var id = $(this).parents('tr').data('id');
        var $this = $(this);
        $.ajax({
            url:'/admin/delete',
            data:{id: id,type:type},
            type:'POST',
            dataType:'json',
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(response){
                noty('success','Успешно','Новость удалена');
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
	                noty('success','Успешно','Новость востановлена');
	            	$this.addClass('delete');
	            	$this.removeClass('restore');
	            	$this.html('<i class="fa fa-trash"></i>')
	            }
	        });        	
        })
    
})
</script>
@endsection