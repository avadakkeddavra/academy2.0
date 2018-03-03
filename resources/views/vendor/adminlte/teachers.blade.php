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
							<th>Имя</th>
							<th>Кафедра</th>
							<th>Должность</th>
							<th>Дата создания</th>
							<th></th>
						</thead>
						
						<tbody id="newsTable">
							@foreach($teachers as $teacher)

								<tr data-id="{{ $teacher->id }}">
									<td>{{ $teacher->name }}</td>
									<td>
										<select class="form-control changeCaf" style="display: inline-block;width: auto;">
											<option value="{{ $teacher->cafedra->id }}" disabled selected>{{ $teacher->cafedra->name }}</option>
											@foreach($cafedras as $caf)
												<option value="{{ $caf->id }}">{{ $caf->name }}</option>
											@endforeach
										</select>
									</td>
									<td><input type="text" style="display: inline-block;width: auto;" class="form-control positionChange" data-value="{{ $teacher->position }}" value="{{ $teacher->position }}"></td>
									<td>{{ explode(' ',$teacher->updated_at)[0] }}</td>
									<td>
										<button class="update"><i class="fa fa-pencil"></i></button>
										@if($teacher->trashed())
											<button class="restore"><i class="fa fa-reply"></i></button>
										@else
											<button class="delete"><i class="fa fa-trash"></i></button>
										@endif
										
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

				{{ $teachers->links() }}
		</div>
</div>
@endsection
@section('scriptcustom')

<script src="{{ asset('js/sort.js') }}"></script>
<script>

// Teachers CONTRoll 
type = 'Teachers';
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
                noty('success','Успешно','Преподаватель удален');
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
	                noty('success','Успешно','Преподаватель востановлена');
	            	$this.addClass('delete');
	            	$this.removeClass('restore');
	            	$this.html('<i class="fa fa-trash"></i>')
	            }
	        });        	
        })
    
}) ;

$('#newsTable').find('.changeCaf').on('change',function(){
	var id = $(this).parents('tr').data('id');
	var value = $(this).val();
	$.ajax({
		url:'/admin/update',
		data:{type:type,id:id,key:'caf_id',value:value},
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    dataType:'json',
	    type:'POST',
	    success:function(response){
	    	if(response.success = 1){
	    		noty('success','Успешно','Преподаватель переведен');
	    	}
	    }
	})
});

$('#newsTable').find('.positionChange').on('change',function(){
	var id = $(this).parents('tr').data('id');
	var value = $(this).val();
	if(value != $(this).attr('data-value'))
	{
		$.ajax({
			url:'/admin/update',
			data:{type:type,id:id,key:'position',value:value},
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
		    dataType:'json',
		    type:'POST',
		    success:function(response){
		    	if(response.success = 1){
		    		noty('success','Успешно','Должность обновлена');
		    	}
		    }
		})
	}

})
</script>
@endsection