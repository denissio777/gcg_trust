$(document).ready(function () {
  $('#title').keyup(function () {
    var letters = {
      'а': 'a',
      'б': 'b',
      'в': 'v',
      'г': 'g',
      'д': 'd',
      'е': 'ie',
      'ё': 'io',
      'ж': 'zh',
      'з': 'z',
      'и': 'i',
      'й': 'ii',
      'к': 'k',
      'л': 'l',
      'м': 'm',
      'н': 'n',
      'о': 'o',
      'п': 'p',
      'р': 'r',
      'с': 's',
      'т': 't',
      'у': 'u',
      'ф': 'f',
      'х': 'kh',
      'ц': 'ts',
      'ч': 'ch',
      'ш': 'sh',
      'щ': 'shch',
      'ъ': '',
      'ы': 'y',
      'ь': '',
      'э': 'e',
      'ю': 'iu',
      'я': 'ia'
    }

    var input = $(this).val().toLowerCase();
    var arr = input.split('');
    arr.forEach(function (v, i) {
      if (v in letters){
        arr[i] = letters[v];
      }
    });

    var result = arr.join('');

    var value = result.replace(',', '').replace(/[^a-zA-Z0-9#]/, '-').replace(/ /g, '-').replace(/[!@$%^&*;(),.?":{}|<>]/g, '-').toLowerCase();
    $('#slug').val(value);
  });
});
