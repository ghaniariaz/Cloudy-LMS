@extends('dmaster')

@section('pagetitle')
Teacher Dashboard
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
            Welcome, {{{ Auth::User()->name }}} <small>Teacher Dashboard</small>
         </h3>
         <ul class="page-breadcrumb breadcrumb">
            <li>
               <i class="icon-home"></i>
               Home
               <i class="icon-angle-right"></i>
            </li>
            <li>Dashboard</li>
         </ul>
         <!-- END PAGE TITLE & BREADCRUMB-->
      </div>
   </div>
   <!-- END PAGE HEADER-->
   <!-- BEGIN DASHBOARD STATS -->
   <?php
   		$colors = array('blue', 'green', 'yellow', 'red', 'purple');
   ?>
   <div class="row">
   @foreach($courses as $i => $course)
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
         <div class="dashboard-stat {{{ $colors[$i%5] }}}">
            <div class="visual">
               <!-- <i class="icon-briefcase"></i> -->
               <i class="icon-comments"></i>
            </div>
            <div class="details">
               <div class="number">
                  {{{$course->courseItems()->count()}}} <small>lectures</small>
               </div>
               <div class="desc">                           
                  {{{$course->course->name}}}
               </div>
            </div>
            <a class="more" href="portal/courses/{{{ $course->id }}}">
            View more <i class="m-icon-swapright m-icon-white"></i>
            </a>                 
         </div>
      </div>
   @endforeach
   </div>
   <!-- END DASHBOARD STATS -->
      <div class="clearfix"></div>
      <div class="row ">
         <div class="col-md-6 col-sm-6">
            <div class="portlet box blue">
               <div class="portlet-title">
                  <div class="caption"><i class="icon-bell"></i>Recent Lectures</div>
               </div>
               <div class="portlet-body">
                  <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                     <ul class="feeds">
                        @foreach($recentlectures as $lecture)
                        <li>
                        	<a href="portal/lectures/{{{ $lecture->id }}}">
   	                        <div class="col1">
   	                           <div class="cont">
   	                              <div class="cont-col1">
   	                                 <div class="label label-sm label-warning">                        
   	                                    <i class="icon-bolt"></i>
   	                                 </div>
   	                              </div>
   	                              <div class="cont-col2">
   	                                 <div class="desc">
   	                                    {{{ $lecture->name }}} &nbsp;
   	                                    <span class="label label-sm label-success">
   		                                    <small>
   		                                    	{{{ $lecture->courseSession->course->name }}}
   	                                    	</small>
   	                                    </span>
   	                                 </div>
   	                              </div>
   	                           </div>
   	                        </div>
   	                        <div class="col2" style="width:120px; margin-left:-120px;">
   	                           <div class="date">
   	                              {{{ $lecture->created_at->diffForHumans() }}}
   	                           </div>
   	                        </div>
   	                    </a>
                        </li>
                        @endforeach
                     </ul>
                  </div>
                  <div class="scroller-footer">
                     <div class="pull-right">
                        <!-- <a href="#">See All Records <i class="m-icon-swapright m-icon-gray"></i></a> &nbsp; -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-sm-6">
   			<div class="portlet box purple">
   				<div class="portlet-title line">
   					<div class="caption"> <i class="icon-book"></i>
   						Discussion Threads
   					</div>
   				</div>
   				<div class="portlet-body">
   					<!--BEGIN TABS-->
   					<div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
   						<ul class="feeds">
   						@foreach($recentthreads as $thread)
   							<li>
   								<div class="col1">
   									<div class="cont">
   										<div class="cont-col1">
   											<div class="label label-sm label-info"> <i class="icon-bullhorn"></i>
   											</div>
   										</div>
   										<div class="cont-col2">
   											<div class="desc">
   											<span class="label label-default"><small>{{{ $thread->courseItem->courseSession->course->name }}}</small></span>  &nbsp;
   											<a href="portal/threads/{{{ $thread->id }}}">{{{ $thread->name }}}</a>
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
      </div>
      <div class="clearfix"></div>

@stop
