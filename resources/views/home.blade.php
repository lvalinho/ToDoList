@extends('layouts.app')

@section('title', 'tasks')

@section('content')
	<form id="allTasks" method="POST" action="/task">
		{!! csrf_field() !!}
		<div class="ui toggle checkbox">
		  <input id="chkAllTasks" type="checkbox" name="chkAllTasks" {{ ($chkAllTasks) ? 'checked' : '' }}>
		  <label>See inactive tasks</label>
		</div>
	</form>
	@if (count($tasks) > 0)
	<table class="ui celled table">
	  <thead>
	    <tr>
	    <th>ID</th>
	    <th>Title</th>
	    <th>Description</th>
	    <th>Datetime</th>
	  </tr>
	  </thead>
	  <tbody>
	  	@foreach ($tasks as $task)
		    <tr>
		      <td>{{ $task->id }}</td>
		      <td>
		      	<a @if ($task->status === 0 )
		      			style="text-decoration: line-through; color: grey"
		      		@endif
		      		href="/task/{{ $task->id }}">
		      		
		      		{{ $task->title }}
		      	</a>
		      </td>
		      <td>{{ $task->description }}</td>
		      <td>{{ $task->datetime }}</td>
		    </tr>
	    @endforeach
	  </tbody>	  
	</table>
	@else
	<div class="ui info message">
	  <div class="header">
	    No Tasks Available
	  </div>
	</div>
	@endif

  	<h3 class="ui header" id="addNewTasksSection">Add New Task</h3>
	<div class="ui section divider"></div>
	<form method="POST" action="/task/new">
		{!! csrf_field() !!}
		<div class="ui large form">
		  <div class="two fields">
		  	
			    <div class="field">
			      <label>Title</label>
			      <input name="title" placeholder="Title" type="text">

			    </div>
			    <div class="field">
			      <label>Description</label>
			      <input name="description" placeholder="Description" type="text">
			    </div>
			
		  </div>
		  <button type="submit" class="ui submit button">Submit</button>
		</div>
	</form>

	@if (count($errors) > 0)
        @foreach ($errors->all() as $error)
			<div class="ui negative message">
			  <i class="close icon"></i>
			  <div class="header">
			    {{ $error }}
			  </div>
			 
			</p></div>
        @endforeach
	@endif
	
<script>
	
	$("#chkAllTasks").click(function(){
		$("#allTasks").submit();
	});

	//hide validation message
	$(".close.icon").click(function(){
		$(".ui.negative.message").hide();
	});
</script>

@endsection
