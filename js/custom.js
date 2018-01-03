
$.fn.dataTable.ext.search.push(
function (settings, data, dataIndex) {
    var startDate = Date.parse($('#start-date').val(), 10);
    var endDate = Date.parse($('#end-date').val(), 10);
    var columnDate = Date.parse(data[1]) || 0; // use data for the age column

    if ((isNaN(startDate) && isNaN(endDate)) ||
         (isNaN(startDate) && columnDate <= endDate) ||
         (startDate <= columnDate && isNaN(endDate)) ||
         (startDate <= columnDate && columnDate <= endDate)) {
        return true;
    }
    return false;
}
);

function stopPropagation(evt) {
  if (evt.stopPropagation !== undefined) {
    evt.stopPropagation();
  } else {
    evt.cancelBubble = true;
  }
}

$(document).ready(function () {
    // Initialize DatePicker
    $('.input-group.date').datepicker({
        format: "mm/dd/yy",
        orientation: "top left",
        autoclose: true,
        todayHighlight: false,
        toggleActive: false
    });

    $('#start-date, #end-date').change(function () {
        table.draw();
    });

    //Event Listener for custom textbox to filter datatable
    // $('#customSearchTextBox').on('keyup keypress change', function () {
    //     table.search(this.value).draw();
    // });

    $('#example thead tr th#filtercolumn').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" onclick="stopPropagation(event);" placeholder="Search '+title+'" />' );
    } );

    // Apply the filter
    $("#example thead input").on( 'keyup change', function () {
        //console.log(table.column( $(this).parent().index()+':visible' ));
        table.column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );


    $('#selGender').on('change', function() {
      table.columns(4).search(this.value).draw();

    })

    var table = $('#example').DataTable( {
      "sDom" : 'itp',
        orderCellsTop: true,
        "scrollX": true,
         "processing": true
    } );

    //$('#tbody').show();
    // DataTable

    //table.columns(5).search('^$', true, false ).draw();

    $("#showDeletedData").change(function() {
        if(this.checked) {
            table.columns(1).search('', true, false ).draw();
        }else{
          table.columns(1).search('^$', true, false ).draw();
        }
    });


});
