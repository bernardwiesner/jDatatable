
// var start;
// var end;
// var column_index;
//
// function SetRange(start1, end1, table){
//   start = start1;
//   end = end1;
//   table.draw();
// }

function setRange({
  // start = start1;
  // end = end1;
  $.fn.dataTable.ext.search.push(

    function( settings, data, dataIndex ) {
      console.log();
      var startDate = Date.parse(start, 10);
      var endDate = Date.parse(end, 10);
      var columnDate = Date.parse(data[column_index]) || 0; // use data for the age column

      if ((isNaN(startDate) && isNaN(endDate)) ||
           (isNaN(startDate) && columnDate <= endDate) ||
           (startDate <= columnDate && isNaN(endDate)) ||
           (startDate <= columnDate && columnDate <= endDate)) {
          return true;
      }
      return false;
  });
}
