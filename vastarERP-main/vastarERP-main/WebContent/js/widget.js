/*
    這邊紀載了一些小工具js 
*/

// 設置日期為今天
function returnToday() {
  let td = new Date();
  let day = td.getDate();
  let month = td.getMonth() + 1;
  let year = td.getFullYear();
  console.log(year, typeof year, month, typeof month, day, typeof day);
  let date =
    td.getFullYear() +
    "-" +
    addZero(td.getMonth() + 1) +
    "-" +
    addZero(td.getDate());
  date = date.toString();
  console.log("returnToday()轉成字串的日期: ", date);
  return date;
}

function convertDate(date) {
  return date.replaceAll("/", "-");
}
// 給日期補0
function addZero(n) {
  return parseInt(n) >= 10 ? n.toString() : "0" + n;
}

//用來讀取想要的cookie值
function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return decodeURI(parts.pop().split(";").shift());
  //因為獲得的php setcookie()得到的cookie值, 會進行urlencode,
  // 所以return時要記的進行decode
}

//刪除cookie值
function clearCookie(name) {
  setCookie(name, "", -1);
}

function paddingLeft(str, lenght) {
  if (str.length >= lenght) return str;
  else return paddingLeft("0" + str, lenght);
}
