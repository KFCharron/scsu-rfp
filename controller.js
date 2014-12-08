$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

// probably not suppose to go here
$(function() {
    $( "#compDate" ).datepicker();
  });


$(function() {
    $('form').submit(function() {
        var json = JSON.stringify($('form').serializeObject());
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", /*TODO URL*/"", true);
        //xmlhttp.setRequestHeader("",""/*TODO*/);
        xmlhttp.send(json);
        return true;
    });
});