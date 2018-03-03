@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ 'Создать новость' }}
@endsection
<!-- 
	Подкулючение сторонних стилей только на этой странице
 -->
@section('htmllinks')
	<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
	
	<style>
		#cke_text{
			width: 100% !important;
		}
		.cke_inner.cke_reset
		{
			width: 100% !important;
		}
		.errors p{
		    color: red;
		}
		.notify{
			position: fixed;
			bottom: 100px;
			right: -500px;
			display: none;
			width: 500px;
			height: 100px;
			background-color: #fff;
			z-index: 100000;
			box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px -1px rgba(0,0,0,0.3)
		}
		.notify.success .notify_type{
			background-color: #54efb9;
			color: #fff;
		}
		.notify.error .notify_type{
			background-color:#ef6d54;
			color: #fff;
		}
		.notify.default .notify_type{
			background-color:#9d9d9d;
			color: #fff;
		}
		.notify_type{
			float: left;
			width: 100px;
			height: 100%;
			line-height: 100px;
			text-align: center;
			font-size: 30px;
		}
		.notify_body{
			float: left;
			width: 350px;
			padding-left: 30px;
		}
		.notify_header{
			font-size: 16px;
			text-transform: uppercase;
			font-weight: bold;
			position: relative;
			padding: 10px 0px;
			margin-bottom: 5px;	
		}
		.notify_close{
			position: absolute;
			font-size: 12px;
			top: 10px;
			right: 10px;

		}
		.notify_close button{
			background-color: transparent !important;
			border:none;
		}
		.imager{
			background-color: #00000059;
			position: absolute;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
			z-index: 10000;
			display: none;
		}
		.imager .imager_container{
			position: absolute;
			top: 50%;
			left: 50%;
			width: 800px;
			margin: -200px -400px;
			background-color: #fff;
			border-radius: 5px;
		}
		.imager .image-pick{
			height: 150px;
			padding: 0;
			cursor:pointer;
			-webkit-background-size: cover !important;
			background-size: cover !important;
		}
		.imager .imager_body{
			height: 400px;
			overflow-y: scroll;
		}
		.imager .settings{
			padding: 15px 15px;
		}
		.imager .imager_title{
			border-radius: 5px;
			padding: 10px 15px;
			border-bottom: 1px solid #eee;
			font-size: 16px;
		}
		.imager .imager_title button{
			float: right;
			background-color: transparent;
			border:none;
		}
		.imager .image-pick .bg_overlay{
			position: absolute;
			visibility: hidden;
			opacity: 0;
			transition: .3s;
			top: 0;left: 0;right: 0;bottom: 0;
			background-color: #00000059;
			line-height: 150px;
			color: #fff;
			text-align: center;
		}
		.imager .image-pick:hover .bg_overlay{
			opacity: 1;
			visibility: visible;
		}
	</style>	
@endsection

@section('contentheader_title')
	{{ 'Создать новость' }}
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="imager">
			<div class="imager_container">
				<div class="imager_header">
					<div class="imager_title">
						Менеджер файлов
						<button class="close_imager"><i class="fa fa-close"></i></button>
					</div>
					<div class="form-block settings col-md-6">
						<label for="">Search</label>
						<input type="text" class="form-control" name="search_file" id="search_file" placeholder="Search">
					</div>
					<div class="clearfix"></div>
					
				</div>
				<div class="clearfix"></div>
				<div class="imager_body">			
					@foreach(scandir('img') as $key => $item)
						@if($key != 0 && $key != 1 && strpos($item, '.') != 0)
							<div class="col-md-2 image-pick" data-name="{{ $item }}"
								 style="background: url({{ asset('img') }}/{{ $item }}) center"
							><div class="bg_overlay"><i class="fa fa-plus"></i></div>
							</div>
						@endif
					@endforeach		
				</div>
			</div>
				
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<div class="box-title">Создать</div>
					</div>
					<div class="box-body">
						
						<form class="createNew" role="form">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Название</label>
									<div class="input-group">
						                <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>
						                <input type="text" id="title" class="form-control" placeholder="Название">
						            </div>
								</div>
								
							</div>
							
							<div class="col-md-6">

								<div class="form-group">
									<label for="">Тип</label>
									<div class="input-group">
					                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
					                <select name="type" id="type" class="form-control">
					                	<option value="0">Новость</option>
					                	<option value="1">Статья</option>
					                	<option value="2">Событие</option>
					                </select>
					            </div>
								</div>
								
							</div>
								<div class="clearfix"></div>
							<br>

							<div class="col-md-6">

								<div class="form-group">
									<label for="">Кафедра</label>
									<div class="input-group">
						                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						                <select name="" id="caf_id" class="form-control">
						                	@foreach($cafedras as $caf)
						                		<option value="{{ $caf->id }}">{{ $caf->name }}</option>
						                	@endforeach
						                </select>
						            </div>
								</div>
								
							</div>

							<div class="col-md-6">

								<div class="form-group">
									<label for="">Картинка</label>
									<div class="input-group">
						                <input type="file" id="file" name="image" style="display: inline-block;" accept="image/jpeg,image/png,image/gif">
						                <button type="button" id="uploadImg" class="btn btn-primary">Загрузить</button>
						                <input type="hidden" name="file_name" id="file_name">
						                <button type="button" class="btn btn-primary" onclick="$('.imager').fadeIn(200);" style="margin-left: 10px;"><i class="fa fa-file"></i></button><p class="file_checked_name"></p>
						            </div>
								</div>
								
							</div>

							<div class="col-md-6">

								<div class="form-group">
									<label for="">Приоритет</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-exclamation"></i></span>
										<select name="priority" id="priority" class="form-control">
											<option value="1">Для студентов</option>
											<option value="2">Обычная</option>
											<option value="3">Высокий приоритет</option>
										</select>
									</div>
								</div>

							</div>

							<div class="clearfix"></div>
							<br>
							<div class="col-md-12">
								<div class="input-group" style='display: block;'>
					                <textarea id="text" style="width: 100%;"></textarea>
					            </div>
								<br>
								<div class="errors">
									
								</div>
					            <div class="form-group">
					            	<button type="button" id="create" class="btn btn-primary">Создать</button>
					            </div>
							</div>
								
						</form>
					</div>
				</div>

			</div>
		</div>

	</div>

@endsection

@section('scriptcustom')
<script src="{{ asset('js/admin.js') }}"></script>
@endsection