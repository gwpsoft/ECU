<!-- Header -->
@include('admin/header')
<title>Bekijk artikel</title>
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
      <li class="active">Bekijk artikel</li>
    </ol>
  </div>
</div>

<div class="row">

  @include('admin/sidebar')

  <div class="col-md-12">


    <div class="col-md-6">

      <div class="block">
      <div class="content controls">

        <div class="form-row">
          <div class="col-md-4">Code:</div>
          <div class="col-md-7">
            {{ $article->article_code }}
          </div>
        </div>


        <div class="form-row">
          <div class="col-md-4">Korte naam:</div>
          <div class="col-md-7">
            {{ $article->short_name }}
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-4">Lange naam:</div>
          <div class="col-md-7">
            {{ $article->long_name }}
          </div>
        </div>


        <div class="form-row">
          <div class="col-md-4">Beschrijving:</div>
          <div class="col-md-7">
            {{ $article->description }}
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-4">Grootte:</div>
          <div class="col-md-7">
            {{ $article->size }}
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-4">Eenheid:</div>
          <div class="col-md-7">
            {{ $article->unit }}
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-4">Type:</div>
          <div class="col-md-7">
            {{ $article->type }}
          </div>
        </div>

      </div>

    </div>

  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="col-md-3" align="center" >
        <a href="{{ url('admin/article-list') }}" class="btn btn-success" style="width:100%">Terug</a>
      </div>

    </div>
  </div>


</div>
</div>
<br>
@include('admin/footer')</div>
