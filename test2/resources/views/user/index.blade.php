@extends('user.master')
@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@section('title', 'Homepage')
@section('content')

<div class="container">
</br></br>
  <h1>Users Manager</h1>
  <div align="right"><a href="{{url('user/create')}}" class="btn btn-success">Signup</a></div>

  <div class="row">
    <div class="col-md-12">
    </br></br>
    @if(\Session::has('success'))
    <div class="alert alert-success">
      <p>{{\Session::get('success')}}</p>
    </div>
    @endif
    <table class="table table-bordered table-striped">
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Industry</th>
        <th>Factory</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      @foreach($users as $row)
      <tr>
        <!-- please note that key must match with correct key -->
        <td>{{$row['id']}}</td>
        <td>{{$row['username']}}</td>
        <td>{{$row['industry_type']}}</td>
        <td>{{$row['factory_name']}}</td>
        <td>{{$row['address']}}</td>
        <td>{{$row['contact_info']}}</td>
        <td><a href="{{action('UsersController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form method="post" class="delete_form" action="{{action('UsersController@destroy', $row['id'])}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
  $('.delete_form').on('submit', function(){
  console.log("delete clicked ");
  if(confirm("Delete data ?")){
    return true;
  }
  else{
    return false;
  }
});
});
</script>
@section('footer')

@stop

