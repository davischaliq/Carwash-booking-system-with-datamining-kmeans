$(document).ready(function(){
			var rating_data;
			function reset_background() {
				for (var i = 0; i <= 5; i++) {
					$('#submit_star_'+i).addClass('star_light');
					$('#submit_star_'+i).removeClass('text-warning');
				}
			}

			$(document).on('mouseenter', '.submit_star', function(){
				var rating = $(this).data('rating');
				reset_background();
				for (var i = 0; i < rating; i++) {
					$('#submit_star_'+i).addClass('text-warning');
				}
			});

			$(document).on('click', '.submit_star', function(){
				rating_data = $(this).data('rating');
				for (var i = 0; i < rating_data; i++) {
					$('#submit_star_'+i).addClass('text-warning');
					console.log(rating_data);
				}
			});

		    $('#submit').click(function(){
		    	var fullname = $('#fullname').val();
				var QS01 = $('#QS01 option:selected').val();
				var QS02 = $('#QS02 option:selected').val();
				var QS03 = $('#QS03 option:selected').val();
				var QS04 = $('#QS04 option:selected').val();
				var QS05 = $('#QS05 option:selected').val();
				var QS06 = $('#QS06 option:selected').val();
				var QS07 = $('#QS07 option:selected').val();
				var QS08 = $('#QS08 option:selected').val();
				var QS09 = $('#QS09 option:selected').val();
				var QS10 = $('#QS10 option:selected').val();
				var QS11 = $('#QS11 option:selected').val();
				var QS12 = $('#QS12 option:selected').val();
				var QS13 = $('#QS13 option:selected').val();
				var QS14 = $('#QS14 option:selected').val();
				var QS15 = $('#QS15 option:selected').val();
				var QS16 = $('#QS16 option:selected').val();
				var QS17 = $('#QS17 option:selected').val();
				var QS18 = $('#QS18 option:selected').val();

				var disQS01 = $('#disQS01 option:selected').val();
				var disQS02 = $('#disQS02 option:selected').val();
				var disQS03 = $('#disQS03 option:selected').val();
				var disQS04 = $('#disQS04 option:selected').val();
				var disQS05 = $('#disQS05 option:selected').val();
				var disQS06 = $('#disQS06 option:selected').val();
				var disQS07 = $('#disQS07 option:selected').val();
				var disQS08 = $('#disQS08 option:selected').val();
				var disQS09 = $('#disQS09 option:selected').val();
				var disQS10 = $('#disQS10 option:selected').val();
				var disQS11 = $('#disQS11 option:selected').val();
				var disQS12 = $('#disQS12 option:selected').val();
				var disQS13 = $('#disQS13 option:selected').val();
				var disQS14 = $('#disQS14 option:selected').val();
				var disQS15 = $('#disQS15 option:selected').val();
				var disQS16 = $('#disQS16 option:selected').val();
				var disQS17 = $('#disQS17 option:selected').val();
				var disQS18 = $('#disQS18 option:selected').val();			
		    	var comment = $('#comment').val();
		    	if (fullname == '' || comment == '') {
		    		alert("Tolong lengkapin input formnya");
		    		return false;
		    	}else {
		    		$.ajax({
		    			url: "http://localhost/CarwashBookingSystem/app/rate/rate.php?sentrate",
		    			method: "POST",
		    			data: {rating_data:rating_data, fullname:fullname, comment:comment, QS01:QS01, QS02:QS02, QS03:QS03, QS04:QS04, QS05:QS05, QS06:QS06, QS07:QS07, QS08:QS08, QS09:QS09, QS10:QS10, QS11:QS11, QS12:QS12, QS13:QS13, QS14:QS14, QS15:QS15, QS16:QS16, QS17:QS17, QS18:QS18, disQS01:disQS01, disQS02:disQS02, disQS03:disQS03, disQS04:disQS04, disQS05:disQS05, disQS06:disQS06, disQS07:disQS07, disQS08:disQS08, disQS09:disQS09, disQS10:disQS10, disQS11:disQS11, disQS12:disQS12, disQS13:disQS13, disQS14:disQS14, disQS15:disQS15, disQS16:disQS16, disQS17:disQS17, disQS18:disQS18},
		    			success:function(data)
		    			{
                			if (data == 0) {
								$('#fullname').val('');
								$('#comment').val('');
		    					reset_background();
                    			alert("Berhasil memberikan review");
                    			window.location.reload();
                			}else {
                  				alert("Gagal memberikan review", data);
                			}
		    			}
		    		})
		    	}
		    });

	});