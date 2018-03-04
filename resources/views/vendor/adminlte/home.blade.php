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

	        <div class="col-lg-4 col-xs-6 connectedSortable ui-sortable">
	          <!-- small box -->
		          <div class="small-box bg-aqua">
		            <div class="inner">
		              <h3>{{ $news }}</h3>

		              <p>Новостей</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-file"></i>
		            </div>
		            <a href="/admin/materials/news" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
	        </div>
       		
       		<div class="col-lg-4 col-xs-6 connectedSortable ui-sortable">
	          <!-- small box -->
		          <div class="small-box bg-green">
		            <div class="inner">
		              <h3>{{ $articles }}</h3>

		              <p>Статей</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-file"></i>
		            </div>
		            <a href="/admin/materials/articles" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
	        </div>

	        <div class="col-lg-4 col-xs-6 connectedSortable ui-sortable">
	          <!-- small box -->
		          <div class="small-box bg-yellow">
		            <div class="inner">
		              <h3>{{ $actions }}</h3>

		              <p>Событий</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-file"></i>
		            </div>
		            <a href="/admin/materials/actions" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
	        </div>

			<div class="col-lg-4 col-xs-6 connectedSortable ui-sortable">
				<!-- small box -->
				<div class="small-box bg-purple">
					<div class="inner">
						<h3>{{ $teachers }}</h3>

						<p>Преподавателей</p>
					</div>
					<div class="icon">
						<i class="fa fa-file"></i>
					</div>
					<a href="/admin/teachers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-4 col-xs-6 connectedSortable ui-sortable">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3>{{ $cafedras }}</h3>

						<p>Кафедр</p>
					</div>
					<div class="icon">
						<i class="fa fa-file"></i>
					</div>
					<a href="/admin/cafedras" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-4 col-xs-6 connectedSortable ui-sortable">
				<!-- small box -->
				<div class="small-box bg-black">
					<div class="inner">
						<h3>{{ $users }}</h3>

						<p>Пользователей</p>
					</div>
					<div class="icon">
						<i class="fa fa-file"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>

		</div>

		<canvas id="myChart" width="400" height="400"></canvas>

</div>
@endsection
@section('scriptcustom')
	<script src="{{asset('plugins/chartjs/Chart.js')}}"></script>
	<script>

		
	</script>
@endsection