@extends('user.master')
@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@section('title', 'User edit')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12"><br/>
      <h3 align='center'>Edit user informations</h3></br>
      @if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul> @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <script type="text/javascript">
      console.log("id=", "{{$id}}");
      </script>

      <form method="post" action="{{action('UsersController@update', $id)}}">
        {{csrf_field()}}
        <div class="form-group">
          <input type="text" name="username" class="form-control" value="{{$user->username}}" />
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="New password" />
        </div>
        <div class="form-group">
          <input type="text" name="industry_type" class="form-control" value="{{$user->industry_type}}" />
        </div>
        <div class="form-group">
          <input type="text" name="factory_name" class="form-control" value="{{$user->factory_name}}" />
        </div>
        <div class="form-group">
          <input type="text" name="address" class="form-control" value="{{$user->address}}" />
        </div>
        <div class="form-group">
          <input type="text" name="contact_info" class="form-control" value="{{$user->contact_info}}" />
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Save"/>
        </div>
        <input type="hidden" name="_method" value="PATCH"/>
      </form>
    </div>
  </div>
  <a href="{{route('user.index')}}">Home</a>
</div>
@section('footer')

@stop

