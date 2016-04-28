@extends('layouts.app')

@section('title', 'Task Detail')

@section('content')
	@foreach ($tasks as $task)
	<table class="ui definition table">
	  	<thead>
		    <tr>
		    	<th></th>
				<th>Value</th>
		  	</tr>
		</thead>
	  	<tbody>
		    <tr>
		      <td>Id</td>
		      <td>{{ $task->id }}</td>
		    </tr>
		    <tr>
		      <td>Title</td>
		      <td>{{ $task->title }}</td>
		    </tr>
		    <tr>
		      <td>Description</td>
		      <td>{{ $task->description }}</td>
		    </tr>
		    <tr>
		      <td>Datetime</td>
		      <td>{{ $task->datetime }}</td>
		    </tr>
		    <tr>
		      <td>Status</td>
		      <td>{{ $task->status == 1 ? 'Active' : 'Inactive' }}</td>
		    </tr>
		</tbody>
		<tfoot class="full-width">
		    <tr>
		      <th colspan="4">
		      	<form action="/task/validate/{{$task->id}}" method="POST">
			        {!! csrf_field() !!}
			        <input id="validation_type" type="hidden" name="validation_type" value="" >
			        <button id="active_btn" name="active_btn" class="ui small button">
			          Activate
			        </button>
			        <button id="inactive_btn" name="inactive_btn" type="submit" class="ui small button">
			          Deactivate
			        </button>
		    	</form>
		      </th>
		    </tr>
		</tfoot>
	</table>
	@endforeach
	@if (isset($valMsg) && $valMsg != '')
		<div class="ui negative message">
		  <i class="close icon"></i>
		  <div class="header">
		    {{ $valMsg }}
		  </div>
		</p></div>
	@endif

<script>
	$(document).ready(function(){
		$('#active_btn').bind('click', function(){
			$('#validation_type').val('1');
		});
		$('#inactive_btn').bind('click', function(){
			$('#validation_type').val('0');
		});
		//hide validation message
		$(".close.icon").click(function(){
			$(".ui.negative.message").hide();
		});
	});

</script>

@endsection
