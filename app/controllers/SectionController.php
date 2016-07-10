<?php

class SectionController extends BaseController{

	//Views all sections of a school
	public function ViewSections()
	{
		$school_id = Auth::User()->school_id;	
		//Creates an array of sections for a school
		$sections = Section::where('school_id', '=', $school_id)->get();

		return View::make('admin.sections',array('sections'=>$sections));
	}

	//Adds a section to a school
    public function AddSection()
	{
		$school_id = Auth::User()->school_id;	
		$name = Input::get('name'); 
		$passoutyear = Input::get('passoutyear');
		//Adds the section to the database 
		$section = Section::create(array('name'=>$name,'passoutyear'=>$passoutyear,'school_id'=>$school_id));
		
		//Redirects to the ViewSections action
		return Redirect::action('SectionController@ViewSections');	
	}

	//Shows all the members of a section
	public function ShowSectionMembers($section_id)

	{   	
		$section = Section::find($section_id);
		//Returns an array of the members of a section
        $users = User::where('sectionID', '=', $section_id)->get();  

		return View::make('admin.sectionbrowser',array('section'=>$section,'students'=>$users));

	}

    //Deletes a section from the school  
    public function DeleteSection($section_id)
	{
		Section::destroy($section_id);

		//Redirects to the ViewSections action
		return Redirect::action('SectionController@ViewSections');	
	}

	//Deletes the user from a section
	public function DeleteSectionMember($section_id, $user_id)
    {
    	
	    $user = User::find($user_id);
	    //Sets the section ID to null
	    $user->section_id = NULL;
		
		//Redirects to the ShowSectionMembers action
	 	return Redirect::action('SectionController@ShowSectionMembers');	
    }
  
   }