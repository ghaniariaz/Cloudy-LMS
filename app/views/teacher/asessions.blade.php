@extends('dmaster')

@section('pagetitle')
Attendance
@stop

@section('nesting')
../../
@stop

@section('style')
   <link rel="stylesheet" type="text/css" href="../../../assets/plugins/clockface/css/clockface.css" />
@stop

@section('scripts')
	<script type="text/javascript" src="../../../assets/plugins/clockface/js/clockface.js"></script>
	<script type="text/javascript">
		$(function() {
			$('.clockface_1').clockface();
		});
	</script>
@stop

@section('content')
		<div class="row">
		   <div class="col-md-12">
		      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
		      <h3 class="page-title">
		         Attendance <small>{{{ $course->course->name }}}</small>
		      </h3>
		      <ul class="page-breadcrumb breadcrumb">
		         <li>
		            <i class="icon-home"></i>
		            <a href="../../../portal/">Home</a> 
		            <i class="icon-angle-right"></i>
		         </li>
		         <li>
		            <a href="../../../portal/courses/{{{ $course->id }}}">{{{ $course->course->name }}}</a> 
		            <i class="icon-angle-right"></i>
		         </li>
		    
		         <li>Attendance</li>
		      </ul>
		      <!-- END PAGE TITLE & BREADCRUMB-->
		   </div>
		</div>
		<div class="row">
			<div class="col-md-8">
	             <div class="table-responsive">
                     <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                           <tr>
                              <th><i class="icon-shopping-cart"></i> Created</th>
                              <th><i class="icon-briefcase"></i> Start Time</th>
                              <th><i class="icon-user"></i> End Time</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
		                @foreach($sessions as $session)
                           <tr>
                              <td class="highlight">
                                 <div class="success"></div> &nbsp;
                                 {{{ date_format(new DateTime($session->created_at), 'jS F Y') }}}
                              </td>
                              <td>{{{ date_format(new DateTime($session->starttime), 'G:i A') }}}</td>
                              <td>{{{ date_format(new DateTime($session->endtime), 'G:i A') }}}</td>
                              <td>
	                              @if ($session->attendances->count())
		                              <a href="../../../portal/attendance/{{{ $session->id }}}/edit" class="btn default btn-xs purple"><i class="icon-edit"></i> Edit</a>
		                          @else
		                              <a href="../../../portal/attendance/{{{ $session->id }}}/take" class="btn default btn-xs purple"><i class="icon-edit"></i> Take</a>
		                          @endif
	                              <a href="../../../portal/attendance/{{{ $session->id }}}/delete" class="btn default btn-xs black"><i class="icon-trash"></i> Delete</a>
                              </td>
                           </tr>
                        @endforeach
                        </tbody>
                     </table>
                  </div>
	         </div>
	        <div class="col-md-4">
				<div class="portlet box blue">
	              <div class="portlet-title">
	                 <div class="caption"><i class="icon-reorder"></i>
	                    Create Attendance Session
	                 </div>
	              </div>
	              <div class="portlet-body form">
	                 <form action="../../../portal/courses/{{{ $course->coursesession_id }}}/attendance" class="form-horizontal form-bordered" method="post">
	                    <div class="form-body">
	                       <div class="form-group">
	                          <label class="control-label col-md-3">Start</label>
	                          <div class="col-md-9">
	                             <input type="text" name="starttime" data-format="hh:mm A" class="form-control clockface_1" />
	                          </div>
	                       </div>
   	                       <div class="form-group">
	                          <label class="control-label col-md-3">End</label>
	                          <div class="col-md-9">
	                             <input type="text" name="endtime" data-format="hh:mm A" class="form-control clockface_1" />
	                          </div>
	                       </div>
	                       <div class="form-group last">
	                          <label class="control-label col-md-3"></label>
	                          <div class="col-md-3">
	                             <button type="submit" class="btn yellow">
	                             Create <i class="icon-share"></i>
	                             </button>  
	                          </div>
	                       </div>
	                    </div>
	                 </form>
	              </div>
	           	</div>	        	
	        </div>
	     </div>

@stop
