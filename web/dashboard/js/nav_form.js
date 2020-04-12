$(document).ready(function() {
  // var select = '<select id="navigation-pages" class="form-control page-select" name="Navigation[pages][]"></select>';
  var select = '<div class="form-group field-navigation-pages relative"><select id="page-select-'+index+'" class="form-control page-select" name="Navigation[pages][]"></select><p class="help-block help-block-error"></p><button class="remove-field btn btn-xs btn-link"><i class="fas fa-times"></i></button></div>'
  $('#add-page').click(function () {
    $('.pages').append(select);
    $.ajax({
      dataType: 'json',
      type: 'POST',
      url: '/admin/page/get',
      success: function(resp) {
        resp.forEach(function(element) {
          $('.page-select:last').append('<option value="'+element['id']+'">'+element['name']+'</option>');
        })
        index++;
        $('.page-select:last').attr('id', 'page-select-'+index).select2();
        console.log(index);
      },
      error: function() {
        console.log('some error happened');
      }
    });
  });

  $('.relative').on('click', '.remove-field', function () {
    $('.relative .form-group:last').remove();
    $(this).remove();
  });
});