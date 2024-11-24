$(document).ready(function(){
  $('.updatebtn').click(function(e){
      e.preventDefault();
      $('#edit').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
            return $(this).text();
      }).get();

      console.log(data);

      $('#id').val(data[0]);
      $('#name').val(data[1]);
      $('#contactnumber').val(data[2]);
      $('#sex').val(data[3]);
      $('#age').val(data[4]);
      $('#bday').val(data[5]);
      $('#address').val(data[6]);
    
  });
});