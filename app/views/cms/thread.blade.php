@extends('dmaster')

@section('pagetitle')
{{{ $thread->name }}}
@stop

@section('nesting')
../
@stop

@section('content')
         <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                     <h4 class="modal-title">Modal title</h4>
                  </div>
                  <div class="modal-body">
                     Widget settings form goes here
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn blue">Save changes</button>
                     <button type="button" class="btn default" data-dismiss="modal">Close</button>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->
         <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <!-- BEGIN PAGE HEADER-->
         <div class="row">
            <div class="col-md-12">
               <!-- BEGIN PAGE TITLE & BREADCRUMB-->
               <h3 class="page-title">
                  {{{ $course }}} <small>{{{ $item }}}</small>
               </h3>
               <ul class="page-breadcrumb breadcrumb">
               @if(Auth::user()->type == 'teacher')
                  <li class="btn-group">
                     <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                     <span>Options</span> <i class="icon-angle-down"></i>
                     </button>
                     <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href=""><i class="icon-refresh"></i> Refresh</a></li>
                        <li class="divider"></li>
                        <li><a href="../../portal/threads/{{{ $thread->id }}}/delete"><i class="icon-trash"></i> Delete thread</a></li>
                     </ul>
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
                  <li>
                     <a href="../../portal/courses/{{{ $thread->courseItem->courseSession->id }}}">{{{ $course }}}</a>
                     <i class="icon-angle-right"></i>
                  </li>
                  <li>
                     <a href="../../portal/lectures/{{{ $thread->courseItem->id }}}">{{{ $item }}}</a>
                     <i class="icon-angle-right"></i>
                  </li>
                  <li>{{{ $thread->name }}}</li>
               </ul>
               <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <!-- BEGIN PORTLET-->
               <div class="portlet">
                  <div class="portlet-title line">
                     <div class="caption"><i class="icon-comments"></i>Thread: {{{ $thread->name }}}</div>
                  </div>
                  <div class="portlet-body" id="chats">
                     <div class="scroller" style="height: 435px;" data-always-visible="1" data-rail-visible1="1">
                        <ul class="chats">
                        @foreach($messages as $m)
                           <li class="{{{ ($m->user->id == Auth::user()->id) ? 'out' : 'in' }}}">
                              <img class="avatar img-responsive" alt="" src="../../assets/img/avatar1.jpg" />
                              <div class="message">
                                 <span class="arrow"></span>
                                 <a href="#" class="name">{{{ $m->user->name }}}</a>
                                 <span class="datetime">about {{{ $m->created_at->diffForHumans() }}}</span>
                                 <span class="body">
                                 {{{ $m->message }}}
                                 </span>
                              </div>
                           </li>
                        @endforeach
                        </ul>
                     </div>
                     <form class="chat-form" action="../../portal/threads/{{{ $thread->id }}}/message" method="post">
                        <div class="input-cont">   
                           <input class="form-control" name="message" type="text" placeholder="Type a message here..." autofocus autocomplete="off" />
                        </div>
                        <div class="btn-cont"> 
                           <span class="arrow"></span>
                           <button type="submit" class="btn blue icn-only"><i class="icon-ok icon-white"></i></button>
                        </div>
                     </form>
                  </div>
               </div>
               <!-- END PORTLET-->
            </div>
         </div>
@stop