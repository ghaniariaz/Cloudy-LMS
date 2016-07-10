@extends('dmaster')

@section('pagetitle')
Dashboard
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
            Welcome, {{{ Auth::User()->name }}} <small>Student Dashboard</small>
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
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
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
      <div class="col-md-8 col-sm-6">
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
		                                    <span class="small">
		                                    	{{{ $lecture->courseSession->course->name }}}
	                                    	</span>
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
      <div class="col-md-4 col-sm-6">
         <div class="portlet box green tasks-widget">
            <div class="portlet-title">
               <div class="caption">
               	<i class="icon-check"></i>Attendance &nbsp; &nbsp; &nbsp; 
                  <small><a href="portal/attendance" style="color:inherit;">See All
                  </a><i class="m-icon-swapright m-icon-white"></i></small>
               </div>
            </div>
            <div class="portlet-body" style="height:330px;">
               <div class="task-content">
					<div class="easy-pie-chart">
					   <div class="number transactions" data-percent="{{{ $overallattendance }}}">
					      <span>
					         <strong>Overall </strong>({{{ $overallattendance }}}%)  
					      </span>
					   </div>
					</div>
               </div>
               <div class="task-footer">
                  <span class="pull-right">
<!--                   	<a href="portal/attendance">
                  		See All <i class="m-icon-swapright m-icon-gray"></i>
                  	 &nbsp;
                  	</a> -->
                  </span>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="clearfix"></div>
   <div class="row ">
      <div class="col-md-8 col-sm-8">
			<div class="portlet box purple">
				<div class="portlet-title line">
					<div class="caption"> <i class="icon-book"></i>
						Discussion Threads
					</div>
				</div>
				<div class="portlet-body">
					<!--BEGIN TABS-->
					<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible="0">
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
											<span class="label label-default">{{{ $thread->courseItem->courseSession->course->name }}}</span>  &nbsp;
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
      <div class="col-md-4 col-sm-4">
         <div class="portlet box blue">
            <div class="portlet-title">
               <div class="caption"><i class="icon-calendar"></i>Recent Grades</div>
            </div>
            <div class="portlet-body">
				<div class="row">
					<div class="col-md-12">
						<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible="0">
				            <table class="table table-striped table-hover">
				            <thead>
				               <tr>
				                  <th>Name</th>
				                  <th>Course</th>
				                  <th>Marks</th>
				               </tr>
				            </thead>
				            <tbody>
				            @foreach($recentgrades as $i => $grade)
					                <tr>
					                    <td>
						                  	<a href="portal/courses/{{{$grade->gradeType->courseSession->id}}}/grades">
					                    		{{{ $grade->gradeType->name }}}
							                </a>
					                    </td>
					                    <td>
						                  	<a href="portal/courses/{{{$grade->gradeType->courseSession->id}}}/grades">
						              			<small>{{{ $grade->gradeType->courseSession->course->name }}}</small>
						              		</a>
				                  	    </td>
					                    <td>
					                  		<span class="label label-sm label-{{{ ($grade->marks/$grade->gradeType->maxmarks*100 > 75)? 'success' : (($grade->marks/$grade->gradeType->maxmarks*100 >50)? 'warning':'danger')}}}">
					                  			{{{ number_format($grade->marks/$grade->gradeType->maxmarks*100, 2) }}} %
						                 	</span>
					                    </td> 
					                </tr>
				            @endforeach
				            </tbody>
				            </table>
				        </div>
					</div>
				</div>
            </div>
         </div>
      </div>
   </div>
   <div class="clearfix"></div>
@stop

@section('style')
   <style type="text/css">
      .easy-pie-chart canvas {
         position: absolute;
         left: 0;
         top: 0;
      }
      .easy-pie-chart {
         position: absolute;
      }
      .subjects {
         margin: 0 auto;
      }
   </style>
@stop

@section('scripts')
   <script src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
   <script type="text/javascript">
      $(function() {
         //create instance
         $('.transactions').easyPieChart({
            animate: 2000,
            size: 300,
            lineWidth: 8,
            barColor: "#2c3e50"
         });
         $('.subjects').easyPieChart({
            animate: 2000,
            size: 110,
            lineWidth: 3
         });
      });
   </script>
@stop