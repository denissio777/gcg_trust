(function() {
  function IDGenerator() {
    this.length = 8;
    this.timestamp = +new Date;

    var _getRandomInt = function( min, max ) {
      return Math.floor( Math.random() * ( max - min + 1 ) ) + min;
    }
    this.generate = function() {
      var ts = this.timestamp.toString();
      var parts = ts.split( "" ).reverse();
      var id = "";

      for( var i = 0; i < this.length; ++i ) {
        var index = _getRandomInt( 0, parts.length - 1 );
        id += parts[index];
      }

      return id;
    }
  }


  document.addEventListener( "DOMContentLoaded", function() {

      var generator = new IDGenerator();

    if(!document.cookie.includes('uid=')) document.cookie = 'uid=' + generator.generate()+';';

  });

})();


$(document).ready(function() {
  $(".clickable").click(function () {
    let area = $(this).attr('data-area');
    let uid = document.cookie.replace('uid=', '');
    $.ajax({
      url: '/api/click',
      method: 'post',
      data: {
        area: area,
        uid: uid
      },
      success: function(resp){
        console.log(resp);
      }
    })
  });
});

