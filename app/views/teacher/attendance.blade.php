@extends('dmaster')

@section('pagetitle')
Attendance
@stop

@section('style')
   <link rel="stylesheet" href="../../../assets/plugins/data-tables/DT_bootstrap.css" />
@stop

@section('nesting')
../../
@stop

@section('scripts')
	<script type="text/javascript" src="../../../assets/plugins/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../../../assets/plugins/data-tables/DT_bootstrap.js"></script>
	<script type="text/javascript">
		$(function(){
			if (!jQuery().dataTable) {
                return;
            }

            // begin first table
            $('#sample_1').dataTable({
                "aoColumns": [
                  { "bSortable": false },
                  null,
                  { "bSortable": false },
                  { "bSortable": false },
                  { "bSortable": false }
                ],
                bPaginate:false,
                bInfo:false,
                // "aLengthMenu": [
                //     [5, 15, 20, -1],
                //     [5, 15, 20, "All"] // change per page values here
                // ],
                // set the initial value
                // "iDisplayLength": 5,
                // "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#sample_1 .group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                    } else {
                        $(this).attr("checked", false);
                    }
                    $(this).parents('tr').toggleClass("active");
                });
                jQuery.uniform.update(set);

            });

            jQuery('#sample_1 .checkboxes').each(function(){ if($(this).attr("checked")) $(this).parents('tr').addClass('active'); })

            jQuery('#sample_1 tbody tr .checkboxes').change(function(){
                 $(this).parents('tr').toggleClass("active");
            });

            jQuery('#sample_1_wrapper .dataTables_filter input').addClass("form-control input-medium"); // modify table search input
            jQuery('#sample_1_wrapper .dataTables_length select').addClass("form-control input-xsmall"); // modify table per page dropdown
            //jQuery('#sample_1_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
		})
	</script>
@stop

@section('content')
	<div class="row">
	   <div class="col-md-12">
	      <!-- BEGIN PAGE TITLE & BREADCRUMB-->
	      <h3 class="page-title">
	         Take Attendance <small>{{{ $course->course->name }}}</small>
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
	            <a href="../../portal/courses/{{{ $course->id }}}">{{{ $course->course->name }}}</a>
	            <i class="icon-angle-right"></i>
	         </li>
	         <li>
	            Attendance
	         </li>
	      </ul>
	      <!-- END PAGE TITLE & BREADCRUMB-->
	   </div>
	</div>
	<form method="post" action="../../../portal/attendance/{{{ $session->id }}}">
		    <div class="row">
	        <div class="col-md-12">
	    	   <table class="table table-striped table-bordered table-hover" id="sample_1">
	    	      <thead>
	    	         <tr>
	    	            <th class="table-checkbox"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
	    	            <th>Student Name</th>
	    	            <th>Email</th>
	    	            <th>Attendance</th>
	    	            <th>&nbsp; </th>
	    	         </tr>
	    	      </thead>
	    	      <tbody>
	    	      @foreach($attendances as $at)
	    	         <tr class="odd gradeX">
	    	            <td>
	    	            	<input type="checkbox" class="checkboxes" name="present[]" value="{{{ $at->student_id }}}" {{{ $at->present? 'checked':'' }}} />
	    	            </td>
	    	            <td>{{{ $at->user->name }}}</td>
	    	            <td ><a href="mailto:{{{ $at->user->email }}}">{{{ $at->user->email }}}</a></td>
	    	            <td class="center">12 Jan 2012</td>
	    	            <td><span class="label label-sm label-success">Good</span></td>
	    	         </tr>
	    	      @endforeach
	    	      </tbody>
	    	   </table>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-12 margin-top-10">
		    		<div class="pull-right">
				         <button id="sample_editable_1_new" type="submit" class="btn green">
				         Submit <i class="icon-plus"></i>
				         </button>
				         <a id="sample_editable_1_new" class="btn yellow" href="../../../portal/courses/{{{ $course->id }}}/attendance">
				         Cancel <i class="icon-minus"></i>
				         </a>
				         <a id="sample_editable_1_new" class="btn red" href="../../../portal/attendance/{{{ $session->id }}}/delete">
				         Delete Session <i class="icon-trash"></i>
				         </a>
				     </div>
		        </div>
		    </div>
	</form>


@stop
