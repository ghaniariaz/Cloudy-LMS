@extends('dmaster')
<?php
   $colorings = array('timeline-yellow', 'timeline-blue', 'timeline-green', 'timeline-red', 'timeline-grey');
?>

@section('pagetitle')
{{{ $coursesession->course->name }}}
@stop

@section('nesting')
../
@stop

@section('style')
      <link href="../../assets/css/pages/timeline.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
         <!-- BEGIN PAGE HEADER-->
         <div class="row">
            <div class="col-md-12">
               <!-- BEGIN PAGE TITLE & BREADCRUMB-->
               <h3 class="page-title">
                  {{{ $coursesession->course->name }}} <small> &nbsp; Lectures | Assignments | Others&nbsp; </small>
               </h3>
               <ul class="page-breadcrumb breadcrumb bold">
               @if(Auth::User()->type=='teacher')
                  <li class="btn-group">
                     <a href="{{{ $coursesession->id }}}/addlecture" class="btn blue">
                     <span>Add Lecture</span> <i class="icon-plus"></i>
                     </a>
                     <a href="{{{ $coursesession->id }}}/attendance" class="btn purple">
                     <span>Take Attendance</span> <i class="icon-ok"></i>
                     </a>
                  </li>
               @endif
                  <li>
                     <i class="icon-home"></i>
                     <a href="../../portal">Home</a>
                     <i class="icon-angle-right"></i>
                  </li>
                  <li>
                     Courses
                     <i class="icon-angle-right"></i>
                  </li>
                  <li>{{{ $coursesession->course->name }}}</li>
               </ul>
               <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
         </div>
         <!-- END PAGE HEADER-->

         <!-- BEGIN PAGE CONTENT-->
         <div class="row">
            <div class="col-md-12">
               <ul class="timeline">
               @foreach($coursesession->courseItems as $citem)
                  <li class="{{{ $colorings[$citem->id % 5] }}}">
                     <div class="timeline-time">
                        <span class="date">{{{ $citem->updated_at->format('d/m/y') }}}</span>
                        <span class="time">{{{ $citem->updated_at->format('H:i') }}}</span>
                        <span class="date">{{{ $citem->threads->count() }}} Threads</span>
                     </div>
                     <div class="timeline-icon">
                        <i class="{{{ $citem->content_type=='File'? 'icon-cloud-download':'icon-file' }}}"></i>
                     </div>
                     <div class="timeline-body">
                        <h2>{{{ $citem->name }}}</h2>
                        <div class="timeline-content">
                       {{{ $citem->brief }}}
                         
                        </div>
                        <div class="timeline-footer">
                           <a href="../lectures/{{{ $citem->id }}}" class="nav-link pull-right">
                           Go to Lecture <i class="m-icon-swapright m-icon-white"></i>                              
                           </a>  
                        </div>
                     </div>
                  </li>
               @endforeach
               </ul>
            </div>
         </div>
         <!-- END PAGE CONTENT-->
@stop