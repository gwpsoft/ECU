<!-- Header -->

@include('admin/header')

<link rel="stylesheet" href="{{ URL::asset('assets/css/jquery.dataTables.min.css') }}">

<style>
.dataTables_length  { width:170px !important;}
.dataTables_length select { width:70px !important;}
</style>


<title>Artikellijst</title>
<div class="row">
  <div class="col-md-12">
    <ol class="breadcrumb">
      <li><a href="{{ url('admin/dashboard') }}">Huis</a></li>
      <li class="active">Artikellijst</li>
    </ol>
  </div>
</div>
<div class="row">
  @include('admin/sidebar')
  <div class="col-md-12">
    @if (Session::has('message'))
      <div class="alert alert-success">
        <b>Success!</b> {{Session::get('message')}}
        <button type="button" class="close" data-dismiss="alert">×</button>
      </div>
    @endif


    <div class="block">
      <div class="header">
        <h2>Artikellijst</h2>
        <div style="float:right"><a href="{{ url('admin/article-list/create') }}" class="btn btn-success">+ Voeg nieuw artikel toe</a>
        </div>
      </div>
      <div class="content">

        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="articleListTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Code</th>
              <th>Korte naam</th>
              <th>Lange naam</th>
              <th>Grootte</th>
              <th>Eenheid</th>
              <th>Type</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($articles as $key => $article)
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $article->article_code }}</td>
                <td>{{ $article->short_name }}</td>
                <td>{{ $article->long_name }}</td>
                <td>{{ $article->size }}</td>
                <td>{{ $article->unit }}</td>
                <td>{{ $article->type }}</td>
                <td>
                  <a href="{{ url('admin/article-list/show/'.$article->id) }}" title="uitzicht" class="widget-icon">
                    <span class="icon-eye-open"></span>
                  </a>
                  <a href="{{ url('admin/article-list/edit/'.$article->id) }}" title="Bewerk" class="widget-icon">
                    <span class="icon-pencil"></span>
                  </a>
                  <a href="{{ url('admin/article-list/destroy/'.$article->id) }}" title="verwijderen" class="widget-icon" onclick="return confirm('Weet je zeker dat je deze record wilt verwijderen?')">
                    <span class="icon-trash"></span>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>


@include('admin/footer')</div>

<script src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}" charset="utf-8"></script>

<script>
$(function () {
  $('#articleListTable').DataTable()
})
</script>
