@extends('dmaster')

@section('pagetitle')
{{{ $item->name }}}
@stop

@section('nesting')
../
@stop

@section('content')
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
         {{{ $item->name }}} <small>{{{ $coursename }}}</small>
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="../../portal">Home</a> 
            <i class="icon-angle-right"></i>
         </li>
         <li>
            Courses
            <i class="icon-angle-right"></i>
         </li>
         <li>
         	<a href="../../portal/courses/{{{ $item->coursesession_id }}}">{{{ $coursename }}}</a>
            <i class="icon-angle-right"></i>
         </li>
         <li>
            Lectures
            <i class="icon-angle-right"></i>
         </li>
         <li>
         	{{{ $item->name }}}
         </li>
      </ul>
      <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
</div>
<div class="row margin-bottom-20">
	<div class="col-md-2">
		@if($item->content_type == 'Note')
			<img src="../../assets/img/text.png" class="img-responsive">
		@else
			<img src="../../assets/img/file.png" class="img-responsive">
		@endif
	</div>
	<div class="col-md-10">
		<p>
			@if($item->content_type == 'Note')
				{{ \Michelf\MarkdownExtra::defaultTransform($item->content->text) }}
			@else
				<h2>File: {{{$item->content->filepath}}}</h2>
				<h3><a href="../../portal/files/{{{$item->content->filepath}}}">Download Now</a></h3>
			@endif
		</p>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<!-- BEGIN PORTLET-->
		<div class="portlet paddingless">
			<div class="portlet-title line">
				<div class="caption"> <i class="icon-book"></i>
					Discussion Threads
				</div>
			</div>
			<div class="portlet-body">
				<!--BEGIN TABS-->
				<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible="0">
					<ul class="feeds">
					@foreach($threads as $thread)
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info"> <i class="icon-bullhorn"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
										<span class="label label-default">{{{ $thread->user->name }}}</span>  &nbsp;
										<a href="../threads/{{{ $thread->id }}}">{{{ $thread->name }}}</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col2" style="width:120px;margin-left:-120px;">
								<div class="date">{{{ $thread->updated_at->diffForHumans() }}}</div>
							</div>
						</li>
					@endforeach
					</ul>
				</div>
			</div>
			<!--END TABS-->
		</div>
	</div>
	<div class="col-md-4">
		<div class="portlet paddingless">
			<div class="portlet-title line">
				<div class="caption"> <i class="icon-book"></i>
					Create New Thread
				</div>
			</div>
			<div class="portlet-body">
				<form action="{{{ $item->id }}}/threads" method="post">
					<div class="form-group">
					    <label for="name">Topic Name</label>
					    <input type="text" class="form-control" name="name" placeholder="Enter topic name">
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>	
		</div>
	</div>
</div>
<!-- END PORTLET-->
@stop