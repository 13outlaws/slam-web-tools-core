$(document).ready(function(){

    $('#userDetail\\[country_iso\\]').change(function(){
        $('#userDetail\\[country_name\\]').val($('#userDetail\\[country_iso\\] option:selected').text());
    });
});
