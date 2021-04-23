

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
  
  $(".searchBar__input").on('change keyup', delay(function (e){
      e.preventDefault()
      let key = $(this).val()
      if(key.length > 1){
        $(".searchBar__btn").show(1000);
          $.ajax({
              url: "/search/"+key,
              method: "GET",
              success: function (response){
                  console.log(response)
                  $(".searchBar__btn").hide(800);
                  if (response.length <= 0){
                      $("#search_result").html('Ничего не найдено')
  
                  } else {
                      let items = []
                      for (i=0; i < response.length; i++){
                          items.push(`
                   <div class="ProductSearch">
                                      <div class="ProductList__header">
                                          <a style="display: flex; width: 100%; height: 100%" href="/product/${response[i].id}">
                                              <img class="ProductSearch__img" src="${response[i].img}" alt="">
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
  