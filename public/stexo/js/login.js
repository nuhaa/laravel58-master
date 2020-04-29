$(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('form.login:first').on('submit', function(e){
    e.preventDefault();
    var $this = $(this);
    $.ajax({
        type: $this.attr('method'),
        url: $this.attr('action'),
        data: $this.serializeArray(),
        dataType: $this.data('type'),
        success: function (response) {
           if(response.success) {
             // location.reload();
             console.log('sukses');
           }
        },
        error: function (response) {
          var response = $.parseJSON(response.responseText);
          $.each(response.errors, function (k, v) {
              console.log(v);
          });
        }
    });
  });
});
