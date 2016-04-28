<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Task;
use Auth;

class HomeController extends Controller
{

    public function showTasks(Request $request){

		$seeAllTasks = ($request->input('chkAllTasks')) ? true : false;
		$tasks = $this->getTasks($seeAllTasks);
    	//Show view
    	return view('home', [
						 	'username' => Auth::User()->name, 
    						'tasks' => $tasks, 
    						'chkAllTasks' => $seeAllTasks
    						]);
    }

    public function newTask(Request $request){

       	$this->validate($request, [
	        'title' => 'required'
    	]);

    	$task = new Task;
		$task->title = $request->input('title');
		$task->description = $request->input('description');
		$task->datetime = date("Y-m-d H:i:s");
		$task->status = 1;
		$task->user_id = Auth::User()->id;
		$task->save();

		return redirect('home');
    }

    public function taskDetail($task_id){
    	$task = $this->getTaskByID($task_id);
    	return view('taskDetail', ['username' => Auth::User()->name, 'tasks' => $task, 'errorMsg' => '']);
    }

    public function taskValidation($task_id, Request $request){
    	$validation_type = $request->input('validation_type');
    	$taskDetail = Task::whereRaw('id = ? and status = ?', array($task_id, $validation_type))->get();
    	
    	if (count($taskDetail) > 0) {
    		return view('taskDetail', ['username' => Auth::User()->name, 'tasks' => $taskDetail, 'valMsg' => ($validation_type == 1) ? 'Already Active' : 'Already Inactive']);
    	}
    	else {
    		$task = Task::find($task_id);
    		$task->status = $validation_type;
    		$task->save();   
    		return view('taskDetail', ['username' => Auth::User()->name, 'tasks' => $this->getTaskByID($task_id), 'valMsg' => '']);
    	}
    }

    protected function getTaskByID($task_id){
    	return Task::where('id', '=', $task_id)->get();
    }

    protected function getTasks($allTasks){
	  		
		if ($allTasks){
			return Task::where('user_id', '=',Auth::User()->id)->get();
		}		
    	else {
    		return Task::whereRaw('user_id = ? and status = ?', array(Auth::User()->id, 1))->get();
    	}
    }

}
