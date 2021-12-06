$('#servis').change(function(){
    var servis = $('#servis option:selected').val();
    if (servis == 'default') {
        $('#price').val('');
        $('#price').attr('placeholder', 'Harga');
    }
    if (servis != 'default') {
        $.ajax({
            url: "http://localhost/CarwashBookingSystem/app/booking/booking.php?getMAXbooking",
            method: "POST",
            success:function(data){
                if (data == "Diskon") {
                    $('#price').val(new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(50000));
                }else{
                    if (servis == 'Paket 1') {
                        $('#price').val(new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(50000));
                    }
                    if (servis == 'Paket 2') {
                        $('#price').val(new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(100000));
                    }
                    if (servis == 'Paket 3') {
                        $('#price').val(new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(150000));
                    }
                }
            }
        })   
    }
})