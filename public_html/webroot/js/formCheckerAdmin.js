$(document).ready(function () {
  var array = $(".newpass");
  var array1 = $(".b_newpass");
  for (var i = 0; i < array.length; i++){
    array[i].b = array1[i];
    array[i].addEventListener("input",function () {
      if( !$(this).val() ) {
        this.b.disabled = true;
      }else{
        this.b.disabled = false;
      }
    })
  }
});
