@extends('user/master')
@section('title', 'Signup')
@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12"><br/>
      <h3 align='center'>Signup</h3></br>
      @if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul> @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      @if(\Session::has('success'))
      <div class="alert alert-success">
        <p>{{\Session::get('success')}}</p>
      </div>
      @endif
      <form method="post" action="{{url('user')}}">
        {{csrf_field()}}
        <div class="form-group">
          <input type="text" name="username" class="form-control" placeholder="Username" />
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password" />
        </div>
        <div class="form-group">
          <input type="text" name="industry_type" class="form-control" placeholder="Industry" />
        </div>
        <div class="form-group">
          <input type="text" name="factory_name" class="form-control" placeholder="Factory" />
        </div>
        <div class="form-group">
          <input type="text" name="address" class="form-control" placeholder="Address" />
        </div>
        <div class="form-group">
          <input type="text" name="contact_info" class="form-control" placeholder="Contact" />
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Signup"/>
        </div>
      </form>
    </div>
  </div>
  <a href="{{route('user.index')}}">Home</a>
</div>
@section('footer')
@stop

