let brands = [];
let polarity = [];

let checkboxes = $('.AsideBlock__checkboxLabel');
Array.prototype.remove = function() {
    let what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};
$.each(checkboxes, function (index, checkbox) {
  $(checkbox).on('click', function() {
    $(this).toggleClass('AsideBlock__checkboxInputActive');
    if ($(this).hasClass('AsideBlock__checkboxInputActive')){
        if ($(this).hasClass('xyi')){
            polarity.push(this.previousElementSibling.value);
            $(".polarity").val(JSON.stringify(polarity))
        } else {
            brands.push(this.previousElementSibling.id);
            $("#brands").val(JSON.stringify(brands))
            $("#brands2").val(JSON.stringify(brands))

        }
    } else {
        if ($(this).hasClass('xyi')){
            polarity.remove(this.previousElementSibling.value)
            $(".polarity").val(JSON.stringify(polarity))
        } else {
            brands.remove(this.previousElementSibling.id);

            $("#brands").val(JSON.stringify(brands))
            $("#brands2").val(JSON.stringify(brands))

        }
    }
  });
});
$(".xyi").on('change keyup focus', function (){
    if (polarity.length == 0) $(".polarity").val("")
    if (brands.length == 0) $("#brands").val("")
    console.log('click')
})

