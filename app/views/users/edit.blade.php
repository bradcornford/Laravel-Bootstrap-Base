@extends('layouts.master')

@section('title')

Edit Profile

@stop

@section('content')

	<div class="row">

		<h1>Edit Profile</h1>

		<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">

			{{ Form::open(array('route' => array('user.update', $user->id), 'role' => 'form', 'method' => 'put')) }}

				{{ Form::hidden('user', $user->id) }}

				{{ Bootstrap::text('name', 'Name', $user->name , $errors) }}

				{{ Bootstrap::email('email', 'Email address', $user->email, $errors) }}

				{{ Bootstrap::password('password', 'Password', $errors) }}

				{{ Bootstrap::password('password_confirmation', 'Password confirmation', $errors) }}

				{{ Bootstrap::linkRoute('user.show', 'Back', array($user->id)) }}

				{{ Bootstrap::submit('Save') }}

			{{ Form::close() }}

		</div>

	</div>

@stop
