
email_check = false;
pass_check = false;

function checkEmail() {
  if ($("#formProfile")[0][0].value === $("#formProfile")[0][1].value) {
    $("#formProfile")[0][0].style.backgroundColor = "rgb(154, 250, 125)"
    $("#formProfile")[0][1].style.backgroundColor = "rgb(154, 250, 125)"
    email_check = true;
    if(pass_check === true){
      $("#formProfile")[0][6].hidden=false;
    }
    return true;
  }
  $("#formProfile")[0][0].style.backgroundColor = "rgb(255, 126, 126)"
  $("#formProfile")[0][1].style.backgroundColor = "rgb(255, 126, 126)"
  email_check = false;
  $("#formProfile")[0][6].hidden=true;
  return false;
}

function checkPass() {
  if ($("#formProfile")[0][5].value === $("#formProfile")[0][4].value) {
    $("#formProfile")[0][4].style.backgroundColor = "rgb(154, 250, 125)"
    $("#formProfile")[0][5].style.backgroundColor = "rgb(154, 250, 125)"
    pass_check = true;
    if(email_check === true){
      $("#formProfile")[0][6].hidden=false;
    }
    if($("#formProfile")[0][5].value !== ""){
      $("#formProfile")[0][6].textContent = "Commit (Attention changement de mot de pass)";
    }else{
      $("#formProfile")[0][6].textContent = "Commit";
    }
    return true;
  }
  $("#formProfile")[0][4].style.backgroundColor = "rgb(255, 126, 126)"
  $("#formProfile")[0][5].style.backgroundColor = "rgb(255, 126, 126)"
  pass_check = false;
  $("#formProfile")[0][6].hidden=true;
  return false;
}



$(document).ready(function () {
  //email check
  $("#formProfile")[0][0].addEventListener("input", checkEmail);
  $("#formProfile")[0][1].addEventListener("input", checkEmail);
  // password check
  $("#formProfile")[0][4].addEventListener("input", checkPass);
  $("#formProfile")[0][5].addEventListener("input", checkPass);
  checkPass();
  checkEmail();
});
