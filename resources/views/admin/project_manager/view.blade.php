<!-- Header -->
    @include('admin/header')
     <title>Uitzicht Project Manager</title>
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style>
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>
                    <li class="active">Uitzicht Project Manager</li>
                </ol>
            </div>
        </div>

        <div class="row">

    @include('admin/sidebar')
    {!! Form::open(['url'=> 'projectmanagers']) !!}
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
                    <div class="header" >

                       <h2>Persoonlijke data</h2>

                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-4">Aanhef:</div>
                            <div class="col-md-4">
                            <?php echo $data->Gender == 1 ? 'Mr.' : 'Mrs';?>
                            </div>
                          </div>


                       <div class="form-row">
                            <div class="col-md-4">Initialen:</div>
                            <div class="col-md-7"> {{ $data->initials}} </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-4">Voornaam:</div>
                            <div class="col-md-7"> {{ $data->Firstname}} </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">Achternaam:</div>
                            <div class="col-md-7">{{ $data->lastname}}
                            </div>
                        </div>

                </div>
            </div>
             <div class="content controls">
                <div class="form-row">
                          <div class="col-md-6">
        <a href=" <?php echo URL:: to( 'admin/projectmanager' ); ?> " class="btn btn-success" style="float:none;width:100%">Terug</a>
        </div>
                    </div>
            </div>
            </div>
             <div class="col-md-6">
                <div class="block">
                    <div class="header" >

                       <h2>Contact Informatie</h2>


                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-4">Telefoon:</div>
                            <div class="col-md-7">{{ $data->Phone}}
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Mobiel:</div>
                            <div class="col-md-7">{{ $data->Mobile}}
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-7">{{ $data->Email}}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="block">
                    <div class="header" >

                       <h2>Contact Informatie</h2>


                    </div>
                    <div class="content controls">
                      <div class="form-row">
                            <div class="col-md-4">Afspraken:</div>
                            <div class="col-md-7"> {{ $data->notes}}
                            </div>
                        </div>

                    </div>
                </div>


             </div>
            </div>

    {!! Form::close() !!}
  </div>
       @include('admin/footer')</div>
