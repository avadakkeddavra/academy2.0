@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ 'Home' }}
@endsection

@section('htmllinks')
	<style>
		table td p{
			display: inline-block;
		}
	</style>
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">

	        <div class="col-lg-3 col-xs-6 connectedSortable ui-sortable">
	          <!-- small box -->
		          <div class="small-box bg-aqua">
		            <div class="inner">
		              <h3>{{ count($news) }}</h3>

		              <p>Новостей</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-file"></i>
		            </div>
		            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
	        </div>
       		
       		<div class="col-lg-3 col-xs-6 connectedSortable ui-sortable">
	          <!-- small box -->
		          <div class="small-box bg-green">
		            <div class="inner">
		              <h3>{{ count($articles) }}</h3>

		              <p>Статей</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-file"></i>
		            </div>
		            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
	        </div>

	        <div class="col-lg-3 col-xs-6 connectedSortable ui-sortable">
	          <!-- small box -->
		          <div class="small-box bg-yellow">
		            <div class="inner">
		              <h3>{{ count($actions) }}</h3>

		              <p>Событий</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-file"></i>
		            </div>
		            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
	        </div>

		</div>

		<div class="col-md-12 connectedSortable ui-sortable " >
			<div class="box">
				<div class="box-header ui-sortable-handle">
					<h3 class="box-title">Новости, статьи, события</h3>
				</div>
				<div class="box-body" style="margin-bottom: 10px;">
					<div class="row">
							<div class="col-md-8">
								<div class="btn-group typeSort">
			                      <button type="button" class="btn btn-info btn-flat" data-type="news">Новости</button>
			                      <button type="button" class="btn btn-info btn-flat" data-type="articles">Статьи</button>
			                      <button type="button" class="btn btn-info btn-flat" data-type="actions">События</button>
			                    </div>
							</div>
							<div class="col-md-4" style="text-align: left;">
								<button class="btn btn-primary"><i class="fa fa-pencil" style="margin-right: 5px"></i><span>Создать</span></button>
							</div>
					</div>
					
					
					<table id="newsTable" class="table dataTable table-hover">
						<thead>
							<th>Название</th>
						<th>Тип</th>
						<th>Текст</th>
						<th>Дата создания</th>
						</thead>
						
						<tbody>
							@foreach($news as $new)
								<tr>
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
									<td>@php echo substr($new->text,0,50);  @endphp ...</td>
									<td>{{ explode(' ',$new->updated_at)[0] }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>

				</div>
			</div>
		</div>
</div>
@endsection
@section('scriptcustom')
<script src="{{ asset('plugins/jQueryUI/jquery-ui.js') }}"></script>
<script src="{{ asset('js/sort.js') }}"></script>
@endsection