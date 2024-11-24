$(document).ready(function(){
  $('.deletebtn').click(function(e){
      e.preventDefault();
      $('#delete').modal('show');
      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
            return $(this).text();
      }).get();

      console.log(data);

      $('#deleteid').val(data[0]);
  });
});