<?php

class ClassTypeController extends BaseController{

	//Creates a view to show all the classtypes
    public function ViewClassTypes()
	{	
		//Getting school_id
		$school_id = Auth::user()->school_id;

		//Gets classtypes for current school
		$classtypes = ClassType::where('school_id', '=', $school_id)->get();

        return View::make('admin.classtypes',array('classtypes'=>$classtypes));
	}

	//Adds a new classtype to the school		
    public function AddClassType()
	{
		//Getting school_id
		$school_id = Auth::user()->school_id;
		$name = Input::get('name');

		//Creates a new class type 
		$ClassType = ClassType::create(array('name'=>$name,'school_id'=>$school_id));

		//redirects to ViewClassType action
		return Redirect::action('ViewClassTypesController@ViewClassTypes');
	}

	//Deletes a classtype from a school
	public function DeleteClassType($classtype_id)
	{
		//deletes the classtype
		ClassType::destroy($classtype_id);
		
		//redirects to ViewClassType action
		return Redirect::action('ViewClassTypesController@ViewClassTypes');

	}
}

       