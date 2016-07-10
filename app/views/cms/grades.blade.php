@extends('dmaster')

@section('pagetitle')
Grades for {{{ $coursename }}}
@stop

@section('nesting')
../../
@stop

@section('content')
<!-- BEGIN PAGE HEADER-->
<div class="row">
   <div class="col-md-12">
      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
      <h3 class="page-title">
         Grades <small>{{{ $coursename }}}</small>
      </h3>
      <ul class="page-breadcrumb breadcrumb">
         <li>
            <i class="icon-home"></i>
            <a href="../../../portal">Home</a> 
            <i class="icon-angle-right"></i>
         </li>
         <li>
            Courses
            <i class="icon-angle-right"></i>
         </li>
         <li>
         	<a href="../../../portal/courses/{{{ $cs->id }}}">{{{ $coursename }}}</a>
            <i class="icon-angle-right"></i>
         </li>
         <li>
         	Grades
         </li>
      </ul>
      <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-9">
      <div class="portlet-body">
         <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
               <tr>
                  <th>Sr.</th>
                  <th>Name</th>
                  <th>Marks</th>
                  <th >Max Marks</th>
                  <th>Percentage</th>
               </tr>
            </thead>
            <tbody>
            @foreach($grades as $i => $grade)
               <tr>
                  <td>{{{ $i+1 }}}</td>
                  <td>{{{ $grade->gradeType->name }}}</td>
                  <td>{{{ $grade->marks }}}</td>
                  <td >{{{ $grade->gradeType->maxmarks }}}</td>
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
      <!-- END SAMPLE TABLE PORTLET-->
   </div>
   <div class="col-md-3">
     <!-- <h4 class="block">Other Courses</h4> -->
     <div class="list-group">
     @foreach($othercourses as $course)
        <a href="../../../portal/courses/{{{ $course->id }}}/grades" class="list-group-item {{{ ($course->id == $cs->id) ?'active bg-yellow':''}}}">
        	{{{ $course->course->name }}}
        </a>
     @endforeach
   </div>
</div>
    
@stop
