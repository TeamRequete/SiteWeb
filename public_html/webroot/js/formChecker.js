
let email_check = false;
let pass_check = false;
let cgu_check = false;

function checkEmail() {
  if ($("#formRegister")[0][0].value === $("#formRegister")[0][1].value) {
    $("#formRegister")[0][0].style.backgroundColor = "rgb(154, 250, 125)"
    $("#formRegister")[0][1].style.backgroundColor = "rgb(154, 250, 125)"
    email_check = true;
    if(pass_check === true && cgu_check === true){
      $("#formRegister")[0][6].hidden = false;
    }
    return true;
  }
  $("#formRegister")[0][0].style.backgroundColor = "rgb(255, 126, 126)"
  $("#formRegister")[0][1].style.backgroundColor = "rgb(255, 126, 126)"
  $("#formRegister")[0][6].hidden = true;
  email_check = false;
  return false;
}

function checkPass() {
  if ($("#formRegister")[0][3].value === $("#formRegister")[0][4].value) {
    $("#formRegister")[0][3].style.backgroundColor = "rgb(154, 250, 125)"
    $("#formRegister")[0][4].style.backgroundColor = "rgb(154, 250, 125)"
    pass_check = true;
    if(email_check === true && cgu_check === true){
      $("#formRegister")[0][6].hidden = false;
    }
    return true;
  }
  $("#formRegister")[0][3].style.backgroundColor = "rgb(255, 126, 126)"
  $("#formRegister")[0][4].style.backgroundColor = "rgb(255, 126, 126)"
  $("#formRegister")[0][6].hidden = true;
  pass_check = false;
  return false;
}

function checkCGU(){
  if($("#formRegister")[0][5].checked == true){
    if(email_check === true && pass_check === true){
      $("#formRegister")[0][6].hidden = false;
    }
    cgu_check = true;
  }else{
    $("#formRegister")[0][6].hidden = true;
    cgu_check = false;
  }
}

$(document).ready(function () {
  //email check
  $("#formRegister")[0][0].addEventListener("input", checkEmail);
  $("#formRegister")[0][1].addEventListener("input", checkEmail);
  // password check
  $("#formRegister")[0][3].addEventListener("input", checkPass);
  $("#formRegister")[0][4].addEventListener("input", checkPass);
  // CGU check
  $("#formRegister")[0][5].checked = false;
  $("#formRegister")[0][5].addEventListener("change",checkCGU)
});
