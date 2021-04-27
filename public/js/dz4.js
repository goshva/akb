

$('#tagsHeaderFilter').on('click blur', function() {
    $(this).toggleClass('tagsHeader__filterActive');
  });
  
  let tags = $('#section4 .tagsHeader__li');
  $('#hiddenTag').val($('#section4 .tagsHeaderTag').text());
  $.each(tags, function(index, value) {
    $(value).on('click', function() {
      let tagValue = this.innerHTML;
      $('#section4 .tagsHeaderTag').text(tagValue);
      UIkit.dropdown('#section4 .tagsHeader__dropdown').hide(0);
      $('#hiddenTag').val(tagValue);
    });
  });
  
  $('#navSearchClose').on('click', function() {
    UIkit.drop('#section1 .navbar__search').hide(0);
  });
  
  
  
  $('#section10 .product__sliderLi').on('mouseenter', function() {
    $(this).css('overflow', 'visible');
    $('#section10 .product__sliderList').css('overflow', 'visible');
    $('#section10 .product__buy').css('z-index', '-1');
  });
  
  $('#section10 .product__sliderLi').on('mouseleave', function() {
    $(this).css('overflow', 'hidden');
    $('#section10 .product__sliderList').css('overflow', 'hidden');
    $('#section10 .product__buy').css('z-index', '0');
  });
  
  if ($(document).width() <= 500) {
    UIkit.sticky('#header');
    try {
      $('#section11 .table__body').removeClass('uk-grid-medium');
      $('#section11 .table__body').addClass('uk-grid-small');
    } catch (error) {
      console.log(error);
    }
  }
  
  if ($(document).width() < 500) {
    $('#productSlider').css('display', 'none');
  }
  
  /*
     * хуярим базу запросами
     * взлом пентагона через l2l-p3p-c2c
     * урюк те в род
     * Бамбук те в печень
   */
  function delay(fn, ms) {
    let timer = 0
    return function(...args) {
      clearTimeout(timer)
      timer = setTimeout(fn.bind(this, ...args), ms || 0)
    }
  }
  //
  function rus_to_latin ( str ) {
    
    var ru = {
      'А': 'A', 'Б': 'B', 'В': 'V', 'Г': 'G', 'Д': 'D', 
      'Е': 'E', 'Ё': 'E', 'Ж': 'J', 'З': 'Z', 'И': 'I',  'Й': 'Y', 
      'К': 'K', 'Л': 'L', 'М': 'M', 'Н': 'N', 'О': 'O', 
      'П': 'P', 'Р': 'R', 'С': 'C', 'Т': 'T', 'У': 'U', 
      'Ф': 'F', 'Х': 'X', 'Ц': 'C', 'Ч': 'CH', 'Ш': 'SH', 
      'Щ': 'SHCH', 'Ы': 'Y', 'Э': 'A', 'Ю': 'U', 'Я': 'YA'
    }, n_str = [];
    
    str = str.replace(/[ЬЪ]+/g, '')//.replace(/Й/g, 'i');
    
    for ( var i = 0; i < str.length; ++i ) {
       n_str.push(
              ru[ str[i] ]
           || ru[ str[i].toLowerCase() ] == undefined && str[i]
           || ru[ str[i].toLowerCase() ].toUpperCase()
       );
    }
    
    return n_str.join('');
}
  //
  var marks = ["AUDI", "BMW", "CADILLAC", "CHERY", "CHEVROLET", "CHRYSLER", "CITROEN", "DAEWOO", "DODGE", "FIAT", "FORD", "HONDA", "HYUNDAI", "INFINITI", "JEEP", "KIA", "LANDROVER", "LEXUS", "MAZDA", "MERCEDES", "MITSUBISHI", "NISSAN", "OPEL", "PEUGEOT", "RENAULT", "SKODA", "SSANGYONG", "SUBARU", "SUZUKI", "TOYOTA", "VOLKSWAGEN", "VOLVO"]
  var rusmarks = ["АУДИ", "БМВ", "КАДИЛЛАК", "ЧЕРИ", "ШЕВРОЛЕ", "КРАЙСТЛЕР", "СИТРОЕН", "ДАЙВУ", "ДОДЖ", "ФИАТ", "ФОРД", "ХОНДА", "ХЁНДЭ", "ИНФИНИТИ", "ДЖИП", "КИА", "ЛЭНД РОВЕР", "ЛЕКСУС", "МАЗДА", "МЕРСЕДЕС", "МИЦУБИШИ", "НИССАН", "ОПЕЛЬ", "ПЕЖО", "РЕНО", "ШКОДА", "САНЙОНГ", "СУБАРУ", "СУЗУКИ", "ТОЙОТА", "ФОЛЬКСВАГЕН", "ВОЛЬВО"]
  //
  $(".searchBar__input").on('change keyup', delay(function (e){
      e.preventDefault()
      var keysearch = $(this).val().toUpperCase()
//
$(".uk-drop").hide()

var params = {};
var seararr = keysearch.split(" ");
for (i = 0; i < seararr.length; i++) {

  if (rusmarks.some(o => o === seararr[i])){   seararr[i]= marks[rusmarks.indexOf(seararr[i])] }

  if (markserv.some(o => o.name === seararr[i])){  params.marka = seararr[i]  }//seararr.splice(i,0); }
  if (madelserv.some(o => o.name.includes(rus_to_latin(seararr[i])))){ params.model = seararr[i] }
  if (madelserv.some(o => o.name.includes(seararr[i]))){ console.info('madel')}

  if (akbbrands.some(o => o.name.toUpperCase()===seararr[i])){ params.brand = seararr[i]}


//       if (engineserv.some(o => o.name.includes(seararr[i]))){ console.info('have engine')}
//       if (engineserv.some(o => o.name === seararr[i])){ console.info('have engine')}
}  
keysearch = seararr.join(' ');
console.log(keysearch)

//
$.ajaxSetup({
  headers:
  { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});      
//
      if(keysearch.length > 1){
        $(".searchBar__btn").show(500);
          $.ajax({
              url: "/postajax", //+keysearch,
              method: "POST",
           //   _token: $('meta[name="csrf-token"]').attr('content') ,
              data: params,
              success: function (response){
                  console.log(response)
                  $(".searchBar__btn").hide(800);
                  if (response.length <= 0){
                      $("#search_result").html('Ничего не найдено')
  
                  } else {
                    $(".uk-drop").show()
                      let items = []
                      for (i=0; i < response.length; i++){
                          items.push(`
                   <div class="ProductSearch">
                                      <div class="ProductList__header">
                                          <a style="display: flex; width: 100%; height: 100%" href="/product/${response[i].id}">
                                              <img class="ProductSearch__img" src="/img/small/${response[i].img}" alt="">
                                          </a>
                                      </div>
  
                                      <div class="ProductList__body">
                                          <div class="Product__description">
                                              <a href="/product/${response[i].id}" class="Product__name">${response[i].name}</a>
                                              <p class="Product__descriptionText">Емкость, в ампер часах: <span
                                                      class="Product__descriptionCustom">${response[i].amperes}</span></p>
                                              <p class="Product__descriptionText">Пусковой ток, в амперах: <span
                                                      class="Product__descriptionCustom">${response[i].vv}</span></p>
                                              <p class="Product__descriptionText">Полярность: <span
                                                      class="Product__descriptionCustom">${response[i].polarity}</span></p>
                                          </div>
                                      </div>
  
                                      <div class="ProductSearch__footer">
                                          <div class="ProductSearch__price">
                                              <div class="ProductList__priceText" style="color: red !important;"> ${response[i].trade_price}₽</div>
                                              <div class="Product__priceFrom">от ${response[i].price} ₽</div>
                                          </div>
  
                                          <div class="ProductSearch__btn">
                                              <a href="/product/${response[i].id}" class="Product__btn">Посмотреть</a>
                                          </div>
                                      </div>
                                  </div>
                  `)
                      }
                      if ($('body').width() < 550){
                          $("#search_result1").html(items);
                      } else {
                          $("#search_result").html(items);
                      }
  
                  }
              },
              fail: function (){
                  $("#search_result").text('Ничего не найдено, попробуйте еще написать')
              }
          })
      }
  },800))
  
  
  // $('.delivery').on('change keyup focus', function (){
  //     console.log($(this).val())
  //     if ($(this).val() == 'Самовывоз') {
  //
  //     }
  // })
  