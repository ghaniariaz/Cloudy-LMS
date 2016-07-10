<?php

class DiscussionController extends BaseController {

	public function ViewThread($thread_id) 
	{
		//getting model object
		$thread = Thread::find($thread_id);
		$courseItem = CourseItem::find($thread->courseitem_id);
		$courseSession = Course::find($courseItem->coursesession_id);
		$course = Course::find($courseSession->id);

		$messages = ThreadMessage::where('thread_id','=', $thread_id)->orderBy('created_at', 'DESC')->get();

		//to-do: sort and pagination

		//getting other required things
		$courseItemName = $courseItem->name;
		$courseName = $course->name;


		return View::make('cms.thread', array('item'=>$courseItemName, 'course'=>$courseName, 'thread'=>$thread, 'messages'=>$messages/*, 'page'=>$pageNo, 'pagecount'=>$totalPages*/));
	}

	
	public function AddMessage($thread_id) 
	{
		$threadMessage = new ThreadMessage();

		$user = Auth::User();

		$threadMessage->thread_id = $thread_id;
		$threadMessage->user_id = $user->id;
		$threadMessage->message = Input::get('message');
		$threadMessage->save();


		return Redirect::action('DiscussionController@ViewThread', $thread_id);
	}	

	public function DeleteThread($thread_id)
	{
		$thread = Thread::find($thread_id);
		$lecture_id = $thread->courseItem->id;
		$thread->delete();
		return Redirect::action('CourseController@ShowLecture', $lecture_id);
	}



	public function DeleteMessage($threadmessage_id)
	{
		$threadm = ThreadMessage::find($threadmessage_id);
		$thread_id = $threadm->thread->id;
		$threadm->delete();
	
		return Redirect::action('DiscussionController@ViewThread', $thread_id);
	}


	public function CreateThread($courseitem_id) 
	{
		$thread = new Thread();

		$user = Auth::User();
		$thread->courseitem_id = $courseitem_id;
		$thread->user_id = $user->id;
		$thread->name = Input::get('name');
		$thread->save();


		return Redirect::action('DiscussionController@ViewThread', $thread->id);
	}
}