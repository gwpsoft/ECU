 <script>

  $(document).on('click', '.header span.clickable', function(e){

	 

    var $this = $(this);

	if(!$this.hasClass('panel-collapsed')) {

		$this.parents('.block').find('.content').slideUp();

		$this.addClass('panel-collapsed');

		$this.find('i').removeClass('icon-chevron-up').addClass('icon-chevron-down');

	} else {

		$this.parents('.block').find('.content').slideDown();

		$this.removeClass('panel-collapsed');

		$this.find('i').removeClass('icon-chevron-down').addClass('icon-chevron-up');

	}

});







function ajaxindicatorstart(text)

	{

		if($('body').find('#resultLoading').attr('id') != 'resultLoading'){

		$('body').append('<div id="resultLoading" style="display:none"><div><img src="<?php echo url() ;?>/assets/img/ajax-loader.gif"><div>'+text+'</div></div><div class="bg"></div></div>');

		}

		

		$('#resultLoading').css({

			'width':'100%',

			'height':'100%',

			'position':'fixed',

			'z-index':'10000000',

			'top':'0',

			'left':'0',

			'right':'0',

			'bottom':'0',

			'margin':'auto'

		});	

		

		$('#resultLoading .bg').css({

			'background':'#000000',

			'opacity':'0.7',

			'width':'100%',

			'height':'100%',

			'position':'absolute',

			'top':'0'

		});

		

		$('#resultLoading>div:first').css({

			'width': '250px',

			'height':'75px',

			'text-align': 'center',

			'position': 'fixed',

			'top':'0',

			'left':'0',

			'right':'0',

			'bottom':'0',

			'margin':'auto',

			'font-size':'16px',

			'z-index':'10',

			'color':'#ffffff'			

		});



	    $('#resultLoading .bg').height('100%');

        $('#resultLoading').fadeIn(300);

	    $('body').css('cursor', 'wait');

	}



	function ajaxindicatorstop()

	{

	    $('#resultLoading .bg').height('100%');

        $('#resultLoading').fadeOut(300);

	    $('body').css('cursor', 'default');

	}

  

  

  </script>



    <div class="row">

            <div class="page-footer">

                <div class="page-footer-wrap">

                    <div class="side pull-left">

                        Copyirght &COPY; Mark1 Technologies 2015-16. All rights reserved.

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>