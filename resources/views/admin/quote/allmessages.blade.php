<!-- Header -->
    @include('admin/header')
     <title>Project Messages</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
 .messages .messages-item > .senders {
    float: left; border-radius: 50%;background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: 3px solid rgba(255, 255, 255, 0.3);
    padding: 0;
}
</style>
<script>  
        $(document).ready(function() {
        // This will now be added just before the closing body tag, after jquery, 
                // and thus should work fine.
        });

        // However, to not worry about potential collisions if you were to use multiple
        // js libraries that want to use the dollar sign identifier, you might be better off
        // doing something like this, and running jQuery in no conflict mode:
        (function($) {
            // your normal jQuery code goes here.
            $(document).ready(function() { /* Do stuff */ 
			
		
	 /* Datatables */
    if($("table.sortable_simple").length > 0)
        $("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});
    
    if($("table.sortable_default").length > 0)
        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null, null]});
    
    if($("table.sortable").length > 0)
        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null]});    
    /* eof Datatables */
	
	});
        })(jQuery);
	
    </script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/pqb/filemanager-laravel/public/filemanager/styles/filemanager.css') }}" />

<script type="text/javascript" src="{{ URL::asset('vendor/pqb/filemanager-laravel/public/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/pqb/filemanager-laravel/public/tinymce/tinymce_editor.js') }}"></script>



<script type="text/javascript">
editor_config.selector = "textarea";
editor_config.path_absolute = "http://laravel-filemanager.rhcloud.com/admin/";

tinymce.init(editor_config);
tinyMCE.init({
   
   language : 'en',
  
});
</script>

     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="admin">Home</a></li>                    
                    <li class="active">Project Messages</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/AddMessage']) !!}
    
    
   <!-- {!! Form::open(['url'=> 'edit_employee/$Get_Employee->id']) !!}-->
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
 
   <input type="hidden" name="project_id" value="{{$Project_Details->id}}" />
   <input type="hidden" name="client_id" value="{{$Project_Details->client_id}}" />
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
   
  
      <div class="block block-transparent">
                      <div class="col-md-4">                   
                    <div class="content list list-default">
                        <div class="list-item">                            
                            <div class="list-text">
                                <p><strong>Opdrachtgever:-</strong>  {{$Project_Details->opdrachtgever}}</p> 
                            </div>                            
                        </div>
                        </div>                                         
                </div>
                
                <div class="col-md-4">                   
                    <div class="content list list-default">
                        <div class="list-item">                            
                            <div class="list-text">
                                 <p><strong>Week Number:-</strong> {{$Project_Details->week_number}}</p>   
                            </div>                            
                        </div>
                        </div>
                                         
                </div>
                
                <div class="col-md-4">                   
                    <div class="content list list-default">
                        <div class="list-item">                            
                            <div class="list-text">
                                  <p><strong> Project Name:-</strong> {{$Project_Details->project_name}}</p>  
                            </div>                            
                        </div>
                        </div>
                                         
                </div>
                <div class="col-md-4">                   
                    <div class="content list list-default">
                        <div class="list-item">                            
                            <div class="list-text">
                                  <p><strong>Customer Project NR:-</strong> {{$Project_Details->customer_project_nr}}</p>
                            </div>                            
                        </div>
                        </div>
                                         
                </div>
                <div class="col-md-4">                   
                    <div class="content list list-default">
                        <div class="list-item">                            
                            <div class="list-text">
                                 <p><strong>ECU Project NR:-</strong> {{$Project_Details->edu_project_nr}}</p> 
                            </div>                            
                        </div>
                        </div>
                                         
                </div>
                </div>
                @if (Session::has('message'))
   <div class="alert alert-success">
        <b>Success!</b> {{Session::get('message')}}
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
   @endif
     
            <?php if (!empty($All_Messages)) { ?>
                 <div class="col-md-12">
                 
                <div class="block block-drop-shadow">
                    <div class="header">
                        <h2>Messages</h2>
                    </div>
                    <div class="content messages npr npt"> 
                        <div class="scroll" style="height: 400px;">
                        <?php 
							$counter=0;
							foreach ($All_Messages as $message) {
							$counter++;							
							//$class = ($counter % 2 === 0) ? 'inbox' : '';
							if (Auth::user()->id == $message->sender_id) { $float='right'; $inbox = 'inbox';} else {$float='left'; $inbox = '';}
							?>
                            <div class="messages-item <?=$inbox?>">
                            <?php if (Auth::user()->id == $message->sender_id) {?>
                            <div class="sender" style="float:<?=$float?>;margin-top: 12px;">Me</div>
                                
                                <?php } else {?>
                                 <div class="sender" style="float:<?=$float?>;margin-top: 12px;">Client</div>
                                <?php } ?>
                                <div class="messages-item-text"><?=$message->message?></div>
                                <div class="messages-item-date"><?=date('j M, Y H:i:s',strtotime($message->created_at))?></div>
                            </div>
                            
                            <?php } ?>
                            
                            
                      <!--      <div class="messages-item inbox">
                                <img src="img/example/user/olga_s.jpg" class="img-circle img-thumbnail"/>
                                <div class="messages-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque condimentum nisl velit</div>
                                <div class="messages-item-date">14:32 30.08.2013</div>
                            </div>                                                                                                            
                            <div class="messages-item">
                                <img src="img/example/user/dmitry_s.jpg" class="img-circle img-thumbnail"/>
                                <div class="messages-item-text">Duis eu libero pellentesque, dapibus ante eu, vehicula leo. Nulla gravida rutrum neque</div>
                                <div class="messages-item-date">14:20 30.08.2013</div>
                            </div>                        
                            <div class="messages-item inbox">
                                <img src="img/example/user/olga_s.jpg" class="img-circle img-thumbnail"/>
                                <div class="messages-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque condimentum nisl velit</div>
                                <div class="messages-item-date">14:19 30.08.2013</div>
                            </div>-->
                        </div>
                    </div>
                   
                </div> 
            <?php } ?>
                            
           
           
             
            <div class="col-md-12">
                 
                <div class="block block-drop-shadow">
                    <div class="header">
                        <h2>Enter Message</h2>
                    </div>
                    <div class="col-md-12">  
              <textarea name="message" id="post_desc"></textarea>
              </div>
             </div></div>
                
                 
                    <div class="content controls"  >
                        <div class="form-row" >
                        <div class="col-md-6" > 
                        </div>
                            <div class="col-md-3" > 
                            <a href="<?php echo URL:: to( 'admin/messages/'.$Project_Details->id ); ?>" class="btn btn-primary" style="width:100%">Cancel</a>
                          
                          
                               <?php /*?>{!! link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-primary', 'style' => 'width:100%;']) !!}<?php */?>
                            	
                            </div>              
                            <div class="col-md-3">
                            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                            </div>                                                
                    </div>
                    <br />
                </div>
                </div>
            
            
        
       
            </div>
            
    {!! Form::close() !!}        
  </div> 
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/pqb/filemanager-laravel/public/filemanager/styles/filemanager.css') }}" />  
       @include('admin/footer')</div>  