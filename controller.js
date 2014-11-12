console.log("JavaScript File Successfully Loaded.");

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

$(function() {
    $('form').submit(function() {
        var json = JSON.stringify($('form').serializeObject());
        xmlhttp.open("POST", /*TODO URL*/"", true);
        xmlhttp.setRequestHeader("",""/*TODO*/);
        xmlhttp.send(json);
        // TODO send json via http post
        return false;
    });
});