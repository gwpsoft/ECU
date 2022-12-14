<!-- Header -->
@include('admin/header')
<title>Nieuw Artikel Toevoegen</title>
<style>
.checker {float:right !important; }
.error { color:#fff; }
</style>

@if (Session::has('message'))

  <div class="alert alert-success">

    <b>Success!</b> {{Session::get('message')}}

    <button type="button" class="close" data-dismiss="alert">×</button>

  </div>

@endif

<div class="row">
  <div class="col-md-12">
    <ol class="breadcrumb">
      <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>
      <li class="active">Nieuw Artikel Toevoegen</li>
    </ol>
  </div>
</div>

<div class="row">

  @include('admin/sidebar')
  {!! Form::open(['route'=> 'articleList.store']) !!}
  <div class="col-md-12">

    <!--@if ($errors->any())
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <b>Error!</b>  <br />
    @foreach ($errors->all() as $error)
    {{$error}}<br />
  @endforeach
</div>
@endif-->
<div class="col-md-6">

  <div class="block">
    {{-- <div class="header" >

    <h2>Persoonlijke data</h2>

  </div> --}}
  <div class="content controls">

    <div class="form-row">
      <div class="col-md-4">Code:</div>
      <div class="col-md-7">
        <input type="text" class="form-control" placeholder="Code" name="code" value="{{ (Input::old('code')) ? Input::old('code') : '' }}">
        <span class="error">  {{ $errors->first( 'code' , ':message' ) }}</span>
      </div>

    </div>


    <div class="form-row">
      <div class="col-md-4">Korte naam:</div>
      <div class="col-md-7">
        <input type="text" class="form-control" placeholder="Korte naam" name="short_name" value="{{ (Input::old('short_name')) ? Input::old('short_name') : '' }}"><span class="error">  {{ $errors->first( 'short_name' , ':message' ) }}</span>

      </div>

    </div>

    <div class="form-row">
      <div class="col-md-4">Lange naam:</div>
      <div class="col-md-7">
        <input type="text" class="form-control" placeholder="Lange naam" name="long_name" value="{{ (Input::old('long_name')) ? Input::old('long_name') : '' }}"><span class="error">  {{ $errors->first( 'long_name' , ':message' ) }}</span>

      </div>

    </div>


    <div class="form-row">
      <div class="col-md-4">Beschrijving:</div>
      <div class="col-md-7">
        <textarea name="description" rows="8" cols="80" class="form-control" placeholder="Beschrijving">
          {{{ Input::old('description') }}}
        </textarea>
        <span class="error">  {{ $errors->first( 'description' , ':message' ) }}</span>

      </div>

    </div>

    <div class="form-row">
      <div class="col-md-4">Grootte:</div>
      <div class="col-md-7">
        <input type="text" class="form-control" placeholder="Grootte" name="size" value="{{ (Input::old('size')) ? Input::old('size') : '' }}"><span class="error">  {{ $errors->first( 'size' , ':message' ) }}</span>
      </div>

    </div>

    <div class="form-row">
      <div class="col-md-4">Eenheid:</div>
      <div class="col-md-7">
        <input type="number" class="form-control" placeholder="Eenheid" name="unit" value="{{ (Input::old('unit')) ? Input::old('unit') : '' }}"><span class="error">  {{ $errors->first( 'unit' , ':message' ) }}</span>
      </div>

    </div>

    <div class="form-row">
      <div class="col-md-4">Type:</div>
      <div class="col-md-7">
        <input type="text" class="form-control" placeholder="Type" name="type" value="{{ (Input::old('type')) ? Input::old('type') : '' }}"><span class="error">  {{ $errors->first( 'type' , ':message' ) }}</span>
      </div>

    </div>

  </div>

</div>

</div>

<div class="row">
  <div class="col-md-12">
    <div class="col-md-3" align="center" >
      <a href="<?php echo URL:: to( 'admin/article-list' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
    </div>

    <div class="col-md-3" align="center">
      {!! Form::submit('Opslaan', ['class' => 'btn btn-success','name' => 'Save']) !!}
    </div>

    <div class="col-md-3" align="center">
      {!! Form::submit('Opslaan & Afsluiten', ['class' => 'btn btn-success','name' => 'Save_Close']) !!}
    </div>

    <div class="col-md-3" align="center">
      {!! Form::submit('Opslaan & Nieuw', ['class' => 'btn btn-success','name' => 'Save_New']) !!}
    </div>
  </div>
</div>


</div>

{!! Form::close() !!}
</div>
<br>
@include('admin/footer')</div>
