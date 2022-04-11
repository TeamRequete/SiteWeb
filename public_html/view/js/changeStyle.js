function switchStyle(e) {
  var oReq = new XMLHttpRequest();
  oReq.open("get", "index.php?action=switchStyle", true);
  oReq.send();
  // changement a chaud de la feuille de style
  var element = $('link')[3]
  var lst = element.href.split('/');
  if(lst[lst.length-1] === 'headerBar1.css'){
    element.href = lst.slice(0, lst.length-1).join('/')+'/' + 'headerBar2.css';
  }else{
    element.href = lst.slice(0, lst.length-1).join('/')+'/' + 'headerBar1.css';
  }
}
