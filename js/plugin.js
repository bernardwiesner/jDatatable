
//bookmark plugin

$(document).ready(function () {

    var obj = {};
    var hash = decodeURIComponent((window.location.hash).substring(1)); //remove # from url and decode
    if(hash) {
        var obj = JSON.parse(hash);
        $.each(obj, function(key, value){
            if($("#" + key).is(':checkbox')){
                $("#" + key).prop('checked', value).change();

            }else{
                $("#" + key).val(value).change(); //add values and execute events
            }

        });
    }


    $("div.filter input, select").on( 'keyup change', function (event) {
        if($(this).is(':checkbox')){
            check = 0;
            if(this.checked){
              check = 1;
            }
            obj[event.target.id] = check;
        }else{
            if($(this).val() === ""){
              delete obj[event.target.id]; //unset
            }else{
              obj[event.target.id] = $(this).val();
            }
        }
        json = JSON.stringify(obj);
        window.location.hash = json
    } );


});
