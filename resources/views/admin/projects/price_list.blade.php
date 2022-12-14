<!-- Header -->
@include('admin/header')
<title>Project prijslijst</title>
<link rel="stylesheet" href="{{  URL::asset('assets/css/font-awesome.min.css') }}">
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
      <li class="active">Project prijslijst</li>
    </ol>
  </div>
</div>

<div class="row">

  @include('admin/sidebar')
  <div class="col-md-12">
    <div class="col-md-12">

        <div class="block">
          <div class="header">
            <h2>Voeg nieuw artikel toe</h2>
            <div style="float:right">
            </div>
          </div>


          <div class="content" style="height: 100px;">

            {!! Form::open([ 'url' => 'admin/project/price_list/store' ]) !!}

            <input type="hidden" name="project_id" value="{{ $project->Id }}">

            <div class="col-md-4">
            </div>

            <div class="col-md-2">
              <select class="form-control" name="article">
                <option value="" selected disabled>Selecteer artikel</option>
                @foreach ($articleLists as $article)
                  <option value="{{ $article->id }}" {{ (Input::old("article") == $article->id ? "selected":"") }}>{{ $article->short_name }}</option>
                @endforeach
              </select>
              <span class="error">  {{ $errors->first( 'article' , ':message' ) }}</span>
              </div>

              <div class="col-md-2" style="margin-left:15px;">
                  <input type="number" name="price" value="{{ old('price') }}" placeholder="Prijs">
                  <span class="error">  {{ $errors->first( 'price' , ':message' ) }}</span>
              </div>

                <div class="col-md-1">
                  <button type="submit" style="border: none; background: transparent;">
                  <img class=" " src="{{ URL::asset('assets/img/icons/add_icon.png') }}" id="add_icon" style=" cursor:pointer">
                  </button>
                </div>
              </div> <!-- .content ENDs -->

              {!! Form::close() !!}

            </div><!-- .block ENDs -->

            <div class="block">
              <div class="content">

                <div class="row">
                  <div class="col-sm-12">
                    <table class="table table-responsive table-hover table-stripped table-bordered">
                      <thead>
                        <tr>
                          <th width="5%">#</th>
                          <th width="15%">Artikel</th>
                          <th width="15%">Prijs</th>
                          <th width="20%"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($lists as $key => $list)
                          <tr onchange="this.style.backgroundColor='#FFAD2A'" onkeyup="this.style.backgroundColor='#FFAD2A'">
                            <td>{{ ++$key }}</td>
                            <td>
                              <select class="form-control" name="article" id="selectedArticleId{{ $list->id }}">
                                @foreach ($articleLists as $article)
                                  <option value="{{ $article->id }}" {{ (Input::old("article", $list->articleList->id) == $article->id ? "selected":"") }}>{{ $article->short_name }}</option>
                                @endforeach
                              </select>
                            </td>
                            <td>
                              <input type="text" name="price" id="articlePrice{{ $list->id }}" value="{{ old('price', $list->price) }}">
                            </td>
                            <td>
                              <a href="#" onclick="recordsUpdated({{ $list }}); return false;"><i class="fa fa-save fa-2x" style="margin-top: 4px;"></i>
                              </a>
                              <a href="{{ url('admin/project/delete_price_list/'.$list->id) }}"  onclick="return confirm('Weet je zeker dat je deze record wilt verwijderen?')"><i class="fa fa-times-circle fa-2x" style="margin-top: 4px;"></i>
                              </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div><!-- .col-sm-12 ENDs -->
                </div><!-- .row ENDs -->

                <br>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="col-sm-2 col-sm-offset-5">
                      <h2>Totale prijs: {{ $totalPrice }}</h2>
                    </div>
                  </div><!-- .col-sm-12 ENDs -->
                </div><!-- .row ENDs -->

                <div class="row">
                  <div class="col-sm-12">
                    <div class="col-sm-3">
                      <a href="{{ url('admin/show_project/'.$project->Id) }}" class="btn btn-success" style="width:100%">Terug</a>
                    </div>
                  </div><!-- .col-sm-12 ENDs -->
                </div><!-- .row ENDs -->

              </div><!-- .content ENDs -->
            </div><!-- .block ENDs -->

    </div>
  </div>


</div>

</div>
<br>
@include('admin/footer')</div>

<script>
  var APP_URL = {!! json_encode(url('/').'/') !!}
</script>

<script type='text/javascript' src="{{ URL::asset('assets/js/axios.min.js') }}"></script>
<script>

  function recordsUpdated(list) {
    let data = {};
    data.id = list.id;
    data.project_id = list.project_id;
    data.article = document.getElementById('selectedArticleId' + list.id).value;
    data.price =document.getElementById('articlePrice' + list.id).value

    axios.post(APP_URL + `admin/project/price_list/update`, data).then(response => {
      window.location.reload(true);
    })
    .catch(err => console.log("Error: " + err));
  }

</script>
