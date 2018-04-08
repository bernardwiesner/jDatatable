$(document).ready(function () {
  var table = $('#example').DataTable( {
    "sDom" : 'itp',
      orderCellsTop: true
  } );

  $('#start-date, #end-date').change(function () {
    SetRange($('#start-date').val(), $('#end-date').val(), table);
  });

  $('#emp_no').on("keyup change", function () {
      table.columns("#col_emp_no").search(this.value).draw();
  });
  $('#birth_date').on("keyup change",function () {
      // table.search(this.value).draw();
      table.columns("#col_birth_date").search(this.value).draw();
  });

  $('#selGender').change(function() {
    table.columns("#col_gender").search(this.value).draw();

  });
  $("#showDeletedData").change(function() {
      if(this.checked) {

          table.columns("#col_hire").search('', true, false ).draw();
      }else{

          table.columns("#col_hire").search('^$', true, false ).draw();
      }
  });
    column_index = table.column("#col_hire").index();
    setupRange($('#start-date').val(), $('#end-date').val(), column_index);

    $('.input-group.date').datepicker({
        format: "mm/dd/yy",
        orientation: "top left",
        autoclose: true,
        todayHighlight: false,
        toggleActive: false
    });

});
