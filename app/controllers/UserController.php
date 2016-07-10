<?php

class UserController extends BaseController{

	//Creates a view to show all users from a school
	public function ShowUsers()
	{
		$school_id = Auth::user()->school_id;		
		//Creates an array of user objects and paginates the data
		$users = User::where('school_id', '=', $school_id)->get()->paginate(20);
		$page = paginator::getcurrentpage();
		$pagecount = paginator::gettotal();	
		//No filters
		$filtername = '';
		$filterdata = '';

		return View::make('admin.users',array('users'=>$users,'page'=>$page,'pagecount'=>$pagecount,'filtername'=>$filtername,'filterdata'=>$filterdata));
	}

	//Adds a user to the database
	public function AddUser()
	{
		$school_id = Auth::user()->school_id;	
		//Gets the input from input class
		$name = Input::get('name');
		$dob = Input::get('dob');
		$email = Input::get('$email');
		$username = Input::get('username');
		$password = Input::get('password');
		$type = Input::get('type');
		$user = User::create(array('name'=>$name,'dob'=>$dob,'email'=>$email,'username'=>$username,'password'=>$password,'type'=>$type,'school_id'=>$school_id));

		//Redirects to the ShowUsers action
		return Redirect::action('UserController@ShowUsers');
		
	}

	//Deletes a user from the database
	public function DeleteUser($user_id)
	{			
		User::destroy($user_id);

		//Redirects to the ShowUsers action
		return Redirect::action('UserController@ShowUsers');
	}


	//Updates a users information
	public function EditUser($user_id)
	{
		//Gets the user object
		$user= User::find($user_id);
		//Updates the data using the input class
		$user->name = Input::get('name');
		$dob->dob = Input::get('dob');
		$email->email = Input::get('$email');
		$username->username = Input::get('username');
		$password->password = Input::get('password');
		$user->type = Input::get('type');
		$user->save();

		//Redirects to the ShowUsers action
		return Redirect::action('UserController@ShowUsers');
	}

	//Filters users by Name
	public function ShowUsersByName($filtervalue)
	{
		$school_id = Auth::user()->school_id;	
		//Creates an array of user objects and paginates the data
		$users = User::where('role', '=', $filtervalue)->where('school_id', '=', $school_id)->get()->paginate(20);
		$page = paginator::getcurrentpage();
		$pagecount = paginator::gettotal();	
		$filtername = 'Name';
		$filterdata = $filtervalue;

		return View::make('admin.users',array('users'=>$users,'page'=>$page,'pagecount'=>$pagecount,'filtername'=>$filtername,'filterdata'=>$filterdata));
	}

	//Filters users by Role
	public function ShowUsersByRole($filtervalue)
	{
		$school_id = Auth::user()->school_id;	
		//Creates an array of user objects and paginates the data
		$users = User::where('role', '=', $filtervalue)->where('school_id', '=', $school_id)->get()->paginate(20);
		$page = paginator::getcurrentpage();
		$pagecount = paginator::gettotal();	
		$filtername = 'Role';
		$filterdata = $filtervalue;

		return View::make('admin.users',array('users'=>$users,'page'=>$page,'pagecount'=>$pagecount,'filtername'=>$filtername,'filterdata'=>$filterdata));
	}

	//Makes a page to edit a particular user
	public function ShowUser($user_id)
	{
		$user = User::find($user_id);	
		
		return View::make('admin.edituser',array('user'=>$user));
	}

}
