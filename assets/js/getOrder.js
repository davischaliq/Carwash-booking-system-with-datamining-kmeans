$(document).on('click', '#nav-campaign-tab', function(){
    $('#campaign').html('');
        $('#campaign').html('<div class="spinner-border text-danger" role="status" style="margin: 50px 200px 50px 50px;"><span class="sr-only">Loading...</span></div>');
      $.ajax({
        url: "http://localhost/CarwashBookingSystem/app/booking/booking.php?getOrder",
        method: "POST",
        dataType: "json",
        success:function(data){
          var string = '<div class="row" >';
          if (data != 0) {
            $.each(data, function(index, item) {
                string += '<div class="col col-collab p-3">';
                string += '<div class="card" style="width: 17rem; background-color: #940F1C;">';
                // string += '<img class="card-img-top" src="<?= BASEURL; ?>assets/img/event/'+ item.Nama_file +'" alt="Card image cap">';
                string += '<div class="card-body">';
                string += '<h6 class="card-title text-white"> Jenis Layanan : ';
                string += item.servis;
                string += '</h6>';
                string += '<p class="card-text text-white">Nama : '+ item.nama +'</p>'
                string += '<p class="card-text text-white">NIK anda : '+ item.nik +'</p>'
                string += '<p class="card-text text-white">No phone : '+ item.phone +'</p>'
                string += '<p class="card-text text-white">Status Booking : '+ item.status +'</p>'
                string += '<p class="card-text text-white">Note : '+ item.note +'</p>'
                string += '</div>';
                string += '</div>';
                string += '</div>';
            })
                string += '</div>';
          }else{
            string += '<div class="card mx-auto text-center" style="width: 1200px;">';
            string += '<div class="card-body">';
            string += '<h5 class="card-title">Anda belum terlibat dalam kolaborasi</h5>';
            string += '</div>';
            string += '</div>';
          }
          setTimeout(function(){
            $('#campaign').html('');
            $('#campaign').append(string);
          }, 5000);
        }
      })
  })