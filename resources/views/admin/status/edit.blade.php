<!-- Header -->
    @include('admin/header')
     <title>Status Bewerken</title>
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style>
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>
                    <li class="active">Status Bewerken</li>
                </ol>
            </div>
        </div>

        <div class="row">

    @include('admin/sidebar')
    {!! Form::open(['url'=> 'admin/update_status']) !!}
   <input type="hidden" name="id" value="<?php echo $data->id?>"  />

   <div class="col-md-12">
@if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
    <div class="col-md-8">

                <div class="block">
                    <div class="header" >

                       <h2>Statusgegevens</h2>

                    </div>
                    <div class="content controls">



                   <div class="form-row">
                            <div class="col-md-4">Status code:</div>
                            <div class="col-md-7">

                                    <input type="text" class=" form-control" name="code" value="<?php echo $data->code?>"/>

                                     <span class="error">  {{ $errors->first( 'code' , ':message' ) }}</span>

                            </div>


                </div>



                <div class="form-row">
                            <div class="col-md-4">Statusnaam:</div>
                            <div class="col-md-7">
                            	<input type="text" class="form-control" placeholder="statusnaam" name="name" value="<?php echo $data->name?>">
                                  <span class="error">  {{ $errors->first( 'name' , ':message' ) }}</span>
                            </div>

                        </div>

                        <div class="form-row">
                          <?php if($data->active==1){ $status=1;} else{ $status=0;} ?>
                                    <div class="col-md-4">Actief:</div>
                                    <div class="checkbox-inline">&nbsp;&nbsp;&nbsp;

                                    <?php if ($status==1){?>
                                    <input type="checkbox" class="form-control" name="active" checked="checked">
                                  <?php } else { ?>
                                    <input type="checkbox" class="form-control" name="active">
                                  <?php } ?>
                                  </div>
                                </div>
                                          <span class="error">  {{ $errors->first( 'name' , ':message' ) }}</span>


                                </div>


            </div>


          </div>

    </div>
           <div class="content controls">
                        <div class="form-row" style="float:right" >

                             <div class="col-md-3" align="center" >
                <a href="<?php echo URL:: to( 'admin/status' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
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




          </div>

            </div>

    {!! Form::close() !!}

       @include('admin/footer')</div>
