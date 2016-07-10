@extends('dmaster')

@section('pagetitle')
Attendance
@stop

@section('content')
         <!-- BEGIN PAGE HEADER-->
         <div class="row">
            <div class="col-md-12">
               <!-- BEGIN PAGE TITLE & BREADCRUMB-->
               <h3 class="page-title">
                  Attendance <small>all courses</small>
               </h3>
               <ul class="page-breadcrumb breadcrumb">
                  <li>
                     <i class="icon-home"></i>
                     <a href="../portal">Home</a> 
                     <i class="icon-angle-right"></i>
                  </li>
             
                  <li><a href="../../portal/attendance">Attendance</a></li>
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
                           <th>Course</th>
                           <th>Instructor</th>
                           <th >Attendance</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach($attendance as $i => $at)
                        <tr>
                           <td>{{{ $i+1 }}}</td>
                           <td>{{{ $at['coursename'] }}}</td>
                           <td>{{{ $at['teacher'] }}}</td>
                           <td >{{{ $at['attendance'] }}} %</td>
                           <td><span class="label label-sm label-{{{ ($at['attendance']>80)? 'success' : (($at['attendance']>75)? 'warning':'danger')}}}">{{{ ($at['attendance']>80)? 'Good' : (($at['attendance']>75)? 'Warning':'Short')}}}</span></td> 
                        </tr>
                     @endforeach
                     </tbody>
                     </table>
                  </div>
               </div>
               <!-- END SAMPLE TABLE PORTLET-->
            </div>
            <div class="col-md-3">
               <div class="easy-pie-chart">
                  <div class="number transactions" data-percent="{{{ $overall }}}">
                     <span>
                        <strong>Overall </strong>({{{ $overall }}}%)  
                     </span>
                  </div>
               </div>
            </div>
         </div>
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
   <script src="../assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="../assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
   <script type="text/javascript">
      $(function() {
         //create instance
         $('.transactions').easyPieChart({
            animate: 2000,
            size: 240,
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