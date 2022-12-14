<!-- Header -->

    @include('admin/header')

     <title>Creëren Commentaar</title>  

<style>

 .checker {float:right !important; }

 .error { color:#fff; }

</style> 

     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                    

                    <li class="active">Creëren Commentaar</li>

                </ol>

            </div>

        </div> 

          

        <div class="row">   

    

    @include('admin/sidebar') 

    {!! Form::open(['url'=> 'admin/comment']) !!}

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

                    

                       <h2>Persoonlijke data</h2>

                                    

                    </div>

                    <div class="content controls">

                          

                        

                        

                     

                

                

                <div class="form-row">

                            <div class="col-md-4">Commentaar:</div>

                            <div class="col-md-7"> 

                            	<input type="text" class="form-control" placeholder="Commentaar" name="comments" value="{{ (Input::old('comments')) ? Input::old('comments') : '' }}">

                                  <span class="error">  {{ $errors->first( 'comments' , ':message' ) }}</span>

                            </div>

                        

                        </div>

                

            </div>

            

          </div>

           <div class="content controls">

                        <div class="form-row" style="float:right" >

                        

                             <div class="col-md-3" align="center" > 

                <a href="<?php echo URL:: to( 'admin/comments' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>

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