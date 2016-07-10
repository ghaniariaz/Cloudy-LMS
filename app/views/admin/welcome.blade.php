@extends('dmaster')

@section('pagetitle')
Admin Dashboard
@stop

@section('nesting')
public/
@stop

@section('content')
<!-- BEGIN PAGE HEADER-->
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PAGE TITLE & BREADCRUMB-->
		<h3 class="page-title">
			Welcome, {{{ Auth::User()->name }}} &nbsp;
			<small>Administration Dashboard</small>
		</h3>
		<ul class="page-breadcrumb breadcrumb">
			<li> <i class="icon-home"></i>
				{{{ $school->name }}}
			</li>
		</ul>
		<!-- END PAGE TITLE & BREADCRUMB-->
	</div>
</div>
<!-- END PAGE HEADER-->

<!-- <div class="row">
	<div class="col-md-12">
		<div class="alert alert-info">
			Use this administration panel to manage your school and view statistics.
		</div>
		<h2>
			Stats
		</h2>
	</div>
</div> -->

<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat blue">
			<div class="visual"> <i class="icon-group"></i>
			</div>
			<div class="details">
				<div class="number">{{{ $studentcount }}}</div>
				<div class="desc">Students</div>
			</div>
			<a class="more" href="#">
				View more
				<i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat purple">
			<div class="visual">
				<i class="icon-user"></i>
			</div>
			<div class="details">
				<div class="number">{{{ $teachercount }}}</div>
				<div class="desc">Teachers</div>
			</div>
			<a class="more" href="#">
				View more
				<i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat green">
			<div class="visual">
				<i class="icon-globe"></i>
			</div>
			<div class="details">
				<div class="number">{{{ $coursecount }}}</div>
				<div class="desc">Courses</div>
			</div>
			<a class="more" href="#">
				View more
				<i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat yellow">
			<div class="visual">
				<i class="icon-bar-chart"></i>
			</div>
			<div class="details">
				<div class="number">{{{ $sectioncount }}}</div>
				<div class="desc">Sections</div>
			</div>
			<a class="more" href="#">
				View more
				<i class="m-icon-swapright m-icon-white"></i>
			</a>
		</div>
	</div>
</div>

<!-- PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		<h2>Manage</h2>
		<div class="tiles">
			<a href="admin/users">
				<div class="tile double-down bg-red">
					<div class="tile-body">
						<i class=" icon-group"></i>
					</div>
					<div class="tile-object">
						<div class="number">Users</div>
					</div>
				</div>
			</a>
			<a href="admin/courses">
				<div class="tile double bg-blue">
					<div class="corner"></div>
					<div class="check"></div>
					<div class="tile-body">
						<h4>Manage Courses</h4>
						<p>Update Course</p>

					</div>
					<div class="tile-object">
						<div class="name">
							<i class="icon-envelope"></i>
						</div>

					</div>
				</div>
			</a>
			<a href="admin/classes">
				<div class="tile bg-red">
					<div class="corner"></div>
					<div class="tile-body">
						<i class="icon-qrcode"></i>
					</div>
					<div class="tile-object">

						<div class="number">Manage Classes</div>
					</div>
				</div>
			</a>
			<a href="admin/sections">
				<div class="tile double bg-purple">
					<div class="tile-body">

						<h4>Manage Sections</h4>
						<p>Create and manage student groups</p>

					</div>
				</div>
			</a>
			<a href="admin/settings">
				<div class="tile bg-dark">
					<div class="corner"></div>
					<div class="check"></div>
					<div class="tile-body">
						<i class="icon-cogs"></i>
					</div>
					<div class="tile-object">

						<div class="number">Settings</div>

					</div>
				</div>
			</a>
			<a href="admin">
				<div class="tile bg-green">
					<div class="tile-body">
						<i class="icon-bar-chart"></i>
					</div>
					<div class="tile-object">
						<div class="number">Stats</div>
						<div class="number"></div>
					</div>
				</div>
			</a>
			<a href="admin/classtypes">
				<div class="tile double bg-yellow">

					<div class="tile-body">

						<h4>Manage Class Types</h4>
						<p>Control the Class Structure of the schools</p>

					</div>
				</div>
			</a>
		</div>
	</div>
</div>
<!-- END PAGE CONTENT-->
@stop