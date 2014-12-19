function refrClock() {
var d=new Date();
var s=d.getSeconds();
var m=d.getMinutes();
var h=d.getHours();
var day=d.getDay();
var date=d.getDate();
var month=d.getMonth();
var year=d.getFullYear();
var days=new Array("Chủ nhật","Thứ hai","Thứ Ba","Thứ Tư","Thứ Năm","Thứ Sáu","Thứ Bảy");
var months=new Array("1","2","3","4","5","6","7","8","9","10","11","12"); var am_pm;
if (s<10) {s="0" + s}
if (m<10) {m="0" + m}
if (h>12)
{h-=12;AM_PM = "PM"}
else {AM_PM="AM"}
if (h<10) {h="0" + h}
document.getElementById("clock").innerHTML=days[day] +" " + date  + "-" +months[month] + "-" + year +" " + h + ":" + m + ":" + s; setTimeout("refrClock()",1000); } refrClock(); 