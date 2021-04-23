let section1 = $('#section1').height();
let section2 = $('#section2').height();

UIkit.util.on('#section2', 'inactive', function() {
  $('#catalog .catalog').css('padding-top', `${section1 + section2}px`)
});

UIkit.util.on('#section2', 'active', function() {
  $('#catalog .catalog').css('padding-top', `${section2}px`)
});