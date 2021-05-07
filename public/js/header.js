jQuery(document).ready(function($) {
  //Menu
 

  
  //Gán sự kiện click icon Search hiện hộp tìm kiếm
  $("#icon-search").click(function() {
    $(".search-box").show(600);
  });

  //Click icon x ẩn hộp tìm kiếm
  $(".close-search-box").click(function() {
    $(".search-box").hide(600);
  });


  


  

});