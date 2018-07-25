var  ajax_send = false;

$(function () {
	
		$("#ID_PAY_SYSTEM_ID_1").attr("checked",true);
		
		$('.paysystem').on('click', function() {
			var name = $(this).attr('data-name');
			console.log(name)
			if(name == 'rsb') {
				$("#ID_PAY_SYSTEM_ID_2").prop('checked', true);
			} else {
				$("#ID_PAY_SYSTEM_ID_1").prop('checked', true);
			}
		});
	
        //@TODO этот обработчик ничего не делает, в проекте нет класса .on_ajax
        $('form.on_ajax').submit(function(){
            if(!ajax_send){
                var obj = $(this);
                $.post(obj.attr('action'),obj.serialize(),
                    function (reply) {
                        ajax_send = false;
                        if(reply.type == 'false'){
                            obj.find('.text-error').html(reply.text);
                        }else{
                            $('.uk-grid.form-grid').html(reply.text);
                        }
                    }
                );
            }
            return false;
        });

	var $loginForm = $('#loginForm');
	$loginForm.on('submit', function (event) {
		event.preventDefault();

		var data = $loginForm.serialize();
		$.ajax({
			type: 'POST',
			data: {
				data: data,
				modeJs: 'loginForm'
			},
			dataType: 'json',
			success: function (result) {
				if (result.status == true) {
					window.location.href = "/cabinet/";
				} else {
					$loginForm.find('.form-error').empty().append(result.message);
				}
			}
		});
	});
	
	var $forgetForm = $('#forgetForm');
	$forgetForm.on('submit', function (event) {
		event.preventDefault();

		var data = $forgetForm.serialize();
		$.ajax({
			type: 'POST',
			data: {
				data: data,
				modeJs: 'forgetForm'
			},
			dataType: 'json',
			success: function (result) {
				$forgetForm.find('.form-error').empty().append(result.message);
			}
		});
	});
        
        
        /*$('body').on('click','button.get_new_room', function(){
            if(!ajax_send){
                var obj = $(this);
                $.post('/include/get_new_room.php',{'ID':$('.book-section.forms').last().attr('data-id')},
                    function (reply) {
                        ajax_send = false;
                        if(reply.type == 'false'){
                        }else{
                                $('.book-section.forms').last().after(reply.html);
                        }
                    }
                );
            }
            return false;
        });*/
        
        /*$('body').on('click','button.deleted_rooms', function(){
            $(this).parent().parent().remove();
            return false;
        });*/
        
        /*$('body').on('click','button.edit_room', function(){
            var obj = $(this).parent().parent();
            var id_old = $('.panel.forms').attr('data-id');
            var id_new = obj.attr('data-id');
            console.log(obj);
            if(!ajax_send){
                var obj = $(this);
                $.post('/include/get_room.php',{id_old:id_old, id_new:id_new},
                    function (reply) {
                        ajax_send = false;
                        if(reply.type == 'false'){
                        }else{
                                $('.panel.forms').replaceWith(reply.old);
                                obj.parent().parent().replaceWith(reply.new);
                                //$('.book-section.forms').last().after(reply.html);
                        }
                    }
                );
            }
            return false;
        });*/
        
        /*$('body').on('click','button.set_reservation', function(){
            var id = $('.panel.forms').attr('data-id');
            var id_new = 0;
            var arrival = $('.panel.forms').find('input[name="date-arrival"]').val();
            var departure = $('.panel.forms').find('input[name="date-departure"]').val();
            var adults = $('.panel.forms').find('input[name="adults"]').val();
            var children = $('.panel.forms').find('input[name="children"]').val();
            var infants = $('.panel.forms').find('input[name="infants"]').val();
            
            var name = $(this).parent().find('input[name="name"]').val();
            var price = $(this).parent().find('input[name="price"]').val();
            var code = $(this).parent().find('input[name="code"]').val();
                      
            if(!ajax_send){
                var obj = $(this);
                $.post('/include/set_reservation.php',{id:id, id_new:id_new, arrival: arrival, departure: departure, adults: adults, children: children, infants: infants, name: name, price: price, code: code},
                    function (reply) {
                        ajax_send = false;
                        if(reply.type == 'false'){
                        }else{
                                $('.panel.forms').replaceWith(reply.html);                                
                                //$('.book-section.forms').last().after(reply.html);
                        }
                    }
                );
            }
            return false;
        });*/
        

});


