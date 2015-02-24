$( document ).ready(function() {
    
    // Show Modals
    
    $('[data-toggle]').each(function(){
	    $(this).click(function(){
		    var $toggle = $(this).data('toggle');
			
			//$('.modal').not('[data-toggle="' + $toggle + '"]').hide();
		    $(document).find($toggle).fadeToggle('0.1s');
	    });
    });
	
	// User information submission

	$('.user-info').find('[type="submit"]').click(function(){
		var $userInfo = $('.user-info'), 
			$age = $userInfo.find('select[name="age"] option:selected').val(),
			$sex = $userInfo.find('select[name="sex"] option:selected').val(),
			$errorP = $userInfo.find('p.error');	
			
					
		$.ajax({
			type: 'POST',
			url: 'core/includes/user-info.inc.php',
			data: {
				age: $age,
				sex: $sex
			},
			dataType: 'json',
			success: function( $data ){
				console.log( $data.status + ': ' + $data.message );
			},
			error: function(){
				$errorP.text('An error occured. Please try again later.');
			}
		
		});
	
		return false;
	});
	
	
	// Admin Login AJAX
	
	$('.admin-login').find('[type="submit"]').click(function(){
		var $login = $('.admin-login'), 
			$username = $login.find('input[name="u"]').val(),
			$password = $login.find('input[name="p"]').val(),
			$errorP = $login.find('p.error');
		
		$errorP.text('');
		
		$.ajax({
			type: 'POST',
			url: 'core/includes/admin-login.inc.php',
			data: {
				u: $username,
				p: $password 
			},
			dataType: 'json',
			success: function( $data ){
				if( $data.status === 'success' ){
					console.log( $data.message );
				}
				else if( $data.status === 'fail' ){
					$errorP.text( $data.message );
				}
			},
			error: function(){
				$errorP.text('An error occured. Please try again later.');
			}
			
		});
		return false;
	});
    
    // Questionnaire Stuffs
    
    function loadContent($file){
	    var $section = $('section.questionnaire'),
	    	$button = $('footer button'),
	    	$nextPage = $file + 1;
			$loadingTemplate = "<div class=\"questionnaire-loading\"><h1>Loading Content</h1><div><i class=\"fa fa-spinner fa-pulse\"></i></div><h3>Please Wait</h3></div>";
			
	    $section.html($loadingTemplate);
	    $section.load('core/includes/questionnaire/page' + $file + '.html');
    }
    
    loadContent(1);
    
    $('footer button[data-next]').click(function(){
	    var $getPage = $(this).data('next'),
	    	$nextPage = $getPage + 1;
			
	    loadContent( $getPage );
	    
	    if( $(this).data('next') === 3 ){
		    $('footer button').detach();
		    $('footer').html('<button class="pull-right" form="questionnaire-form" type="submit">Finish</button>');
	    }
	    else {
	    	$(this).data('next', $nextPage);
	    }
    });
    
	$(document).delegate('input[type="range"]', 'change', function(){
		var $name = $(this).data( 'name' ),
			$val  = $(this).val();
		
		$('#questionnaire-form').find('input[type="hidden"]').each(function(){
			if( $(this).attr('name') === $name ){
				$(this).val( $val );
			}
		});
	});
    
});