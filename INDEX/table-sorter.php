<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>
<base href="http://www.ajaxdaddy.com/web20/sorted-tables/">
<style type="text/css">
body {color: white;background: #52616F;}
a { color: white; }
</style><title>SortedTable example</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="javascript/sortedtable-event.js"></script>
<script type="text/javascript" src="javascript/sortedtable.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/common.css" />
</head>
<body>

<script type="text/javascript">
function moveRows(s,d) {
var a = new Array();
for (var o in s.selectedElements) {
a.push(s.selectedElements[o]);
}
for (var o in a) {
var elm = a[o];
var tds = elm.getElementsByTagName('td');
for (var i in tds) {
if (tds[i].headers) tds[i].headers = d.table.id+''+tds[i].headers.substr(d.table.id.length);
}
d.body.appendChild(a[o]);
d.deselect(a[o]);
d.init(d.table);
d.sort();
s.deselect(a[o]);
s.init(s.table);
}
}
</script>

<div class="content">
<h1>Normal table with sample javascript calls</h1>
<table class="sorted regroup" cellpadding="0" cellspacing="0">
<thead>
<tr>
<th style="cursor: pointer;" id="order" class="sortedplus"><span>Order</span></th>
<th style="cursor: pointer;" id="title"><span>Title</span></th>
<th style="cursor: pointer;" id="date"><span>Date</span></th>
<th style="cursor: pointer;" id="num"><span>Number</span></th>
<th style="cursor: pointer;" id="desc"><span>Description</span></th>
<th style="cursor: pointer;" id="publish"><span>PublishDate</span></th>
<th id="published" class="nosort"><span>Published</span></th>
</tr>
</thead>
<tfoot>
<tr>
<td>Footer 1</td>
<td>Footer 2</td>
<td>Footer 3</td>
<td>Footer 4</td>
<td>Footer 5</td>
<td>Footer 6</td>
<td>Footer 7</td>
</tr>
</tfoot>
<tbody><tr class="even" style="cursor: pointer;" id="row1"><td axis="number" headers="order">1</td><td axis="string" headers="title">Title 1 </td><td axis="date" headers="date" title="2006-02-20">20.2.2006</td><td axis="number" headers="num">92</td><td axis="sstring" headers="desc">Description 1 </td><td axis="date" headers="publish" title="2005-08-01">1.8.2005</td><td headers="published">x</td></tr>
<tr class="odd" style="cursor: pointer;"><td axis="number" headers="order">2</td><td axis="string" headers="title">title 2 </td><td axis="date" headers="date" title="2006-08-04">4.8.2006</td><td axis="number" headers="num">71</td><td axis="sstring" headers="desc">description 2 </td><td axis="date" headers="publish" title="2005-03-05">5.3.2005</td><td headers="published">o</td></tr>
<tr class="even" style="cursor: pointer;"><td axis="number" headers="order">3</td><td axis="string" headers="title">Title 3 </td><td axis="date" headers="date" title="2006-07-05">5.7.2006</td><td axis="number" headers="num">93</td><td axis="sstring" headers="desc">Description 3 </td><td axis="date" headers="publish" title="2006-08-04">4.8.2006</td><td headers="published">x</td></tr>
<tr class="odd" style="cursor: pointer;"><td axis="number" headers="order">4</td><td axis="string" headers="title">Title 4 </td><td axis="date" headers="date" title="2006-09-03">3.9.2006</td><td axis="number" headers="num">5</td><td axis="sstring" headers="desc">Description 4 </td><td axis="date" headers="publish" title="2006-09-18">18.9.2006</td><td headers="published">x</td></tr>
<tr class="even" style="cursor: pointer;"><td axis="number" headers="order">5</td><td axis="string" headers="title">Title 5 </td><td axis="date" headers="date" title="2005-09-10">10.9.2005</td><td axis="number" headers="num">54</td><td axis="sstring" headers="desc">Description 5 </td><td axis="date" headers="publish" title="2005-08-23">23.8.2005</td><td headers="published">x</td></tr>
<tr class="odd" style="cursor: pointer;"><td axis="number" headers="order">6</td><td axis="string" headers="title">title 6 </td><td axis="date" headers="date" title="2004-12-21">21.12.2004</td><td axis="number" headers="num">90</td><td axis="sstring" headers="desc">description 6 </td><td axis="date" headers="publish" title="2005-10-18">18.10.2005</td><td headers="published">x</td></tr>
<tr class="even" style="cursor: pointer;"><td axis="number" headers="order">7</td><td axis="string" headers="title">Title 7 </td><td axis="date" headers="date" title="2005-11-12">12.11.2005</td><td axis="number" headers="num">51</td><td axis="sstring" headers="desc">Description 7 </td><td axis="date" headers="publish" title="2005-10-02">2.10.2005</td><td headers="published">o</td></tr>
<tr class="odd" style="cursor: pointer;"><td axis="number" headers="order">8</td><td axis="string" headers="title">Title 8 </td><td axis="date" headers="date" title="2006-03-10">10.3.2006</td><td axis="number" headers="num">69</td><td axis="sstring" headers="desc">Description 8 </td><td axis="date" headers="publish" title="2005-05-08">8.5.2005</td><td headers="published">o</td></tr>
<tr class="even" style="cursor: pointer;"><td axis="number" headers="order">9</td><td axis="string" headers="title">Title 9 </td><td axis="date" headers="date" title="2005-08-22">22.8.2005</td><td axis="number" headers="num">57</td><td axis="sstring" headers="desc">Description 9 </td><td axis="date" headers="publish" title="2005-06-09">9.6.2005</td><td headers="published">o</td></tr>
</tbody>

</table>
<dl>
<dt>Common public calls:</dt>
<!-- you can call move on a table -->

<dd><a href="javascript:mySorted.move(1)">move selected row(s) up</a></dd>
<!-- you can also call it through a static method; the static method to move selected rows is different, it uses the element just to get the table -->

<dd><a href="javascript:SortedTable.moveSelected(-1,document.getElementById('row1'))">move selected row(s) down</a></dd>
<!-- calling a method on the table -->
<dd><a href="javascript:mySorted.cleansort()">clean sort</a></dd>
<!-- finding the table through a static method with a child element and then calling the method -->
<dd><a href="javascript:SortedTable.getSortedTable(document.getElementById('row1')).cleanselect()">clean selection</a></dd>
</dl>
<hr>
<h1>Table automatically sorted</h1>
<p>Includes
examples of sorting numbers, sensitive strings, dates, floats,
currencies. Disallows selects by clicking the selected row.</p>
<table class="sorted" cellpadding="0" cellspacing="0">
<thead>
<tr>
<th style="cursor: pointer;" id="id"><span>ID</span></th>
<th style="cursor: pointer;" id="name" class="sortedminus"><span>Name</span></th>
<th style="cursor: pointer;" id="birth"><span>Birth</span></th>
<th style="cursor: pointer;" id="ratio"><span>Ratio</span></th>
<th style="cursor: pointer;" id="earn"><span>Earnings</span></th>
</tr>
</thead>
<tfoot>
<tr>
<td>Footer 1</td>
<td>Footer 2</td>
<td>Footer 3</td>
<td>Footer 4</td>
<td>Footer 5</td>
</tr>
</tfoot>
<tbody><tr style="cursor: pointer;">
<td axis="number" headers="id">-</td>
<td axis="sstring" headers="name">player y</td>
<td axis="date" headers="birth" title="1986-01-01">1.1.1986</td>
<td axis="number" headers="ratio">-</td>
<td axis="number" headers="earn" title="881234.66">€ 881.234,66</td>
</tr><tr style="cursor: pointer;">
<td axis="number" headers="id">-</td>
<td axis="sstring" headers="name">player x</td>
<td axis="date" headers="birth" title="1985-01-01">1.1.1985</td>
<td axis="number" headers="ratio">-</td>
<td axis="number" headers="earn" title="881234.66">€ 881.234,66</td>
</tr><tr style="cursor: pointer;">
<td axis="number" headers="id">3</td>
<td axis="sstring" headers="name">player 3</td>
<td axis="date" headers="birth" title="1985-10-12">12.10.1985</td>
<td axis="number" headers="ratio" title="1.7210">1,7210</td>
<td axis="number" headers="earn" title="1123885.17">€ 1.123.885,17</td>
</tr><tr style="cursor: pointer;">
<td axis="number" headers="id">4</td>
<td axis="sstring" headers="name">player 2</td>
<td axis="date" headers="birth" title="1985-11-12">12.11.1985</td>
<td axis="number" headers="ratio" title="1.5362">1,5362</td>
<td axis="number" headers="earn" title="772255.99">€ 772.255,99</td>
</tr><tr style="cursor: pointer;">
<td axis="number" headers="id">2</td>
<td axis="sstring" headers="name">Player 10</td>
<td axis="date" headers="birth" title="1985-10-11">11.10.1985</td>
<td axis="number" headers="ratio" title="1.7353">1,7353</td>
<td axis="number" headers="earn" title="813551.04">€ 813.551,04</td>
</tr><tr style="cursor: pointer;">
<td axis="number" headers="id">1</td>
<td axis="sstring" headers="name">Player 9</td>
<td axis="date" headers="birth" title="1985-11-10">10.11.1985</td>
<td axis="number" headers="ratio" title="1.3013">1,3013</td>
<td axis="number" headers="earn" title="941751.75">€ 941.751,75</td>
</tr><tr style="cursor: pointer;">
<td axis="number" headers="id">5</td>
<td axis="sstring" headers="name">&nbsp;</td>
<td axis="date" headers="birth" title="1985-10-13">13.10.1985</td>
<td axis="number" headers="ratio" title="1.6823">1,6823</td>
<td axis="number" headers="earn" title="985123.32">€ 985.123,32</td>
</tr></tbody>
</table>
<hr>
<h1>Move from table to table</h1>
<table class="sorted" id="s" cellpadding="0" cellspacing="0">
<thead>
<tr>
<th style="cursor: pointer;" id="sid"><span>ID</span></th>
<th style="cursor: pointer;" id="sname"><span>Name</span></th>
<th style="cursor: pointer;" id="sbirth"><span>Birth</span></th>
</tr>
</thead>
<tfoot>
<tr>
<td>Footer 1</td>
<td>Footer 2</td>
<td>Footer 3</td>
</tr>
</tfoot>
<tbody><tr style="cursor: pointer;">
<td axis="number" headers="sid">1</td>
<td axis="string" headers="sname">Title 4</td>
<td axis="date" headers="sbirth" title="2005-11-10">10.11.2005</td>
</tr><tr style="cursor: pointer;">
<td axis="number" headers="sid">2</td>
<td axis="string" headers="sname">Title 1</td>
<td axis="date" headers="sbirth" title="2005-10-11">11.10.2005</td>
</tr><tr style="cursor: pointer;">
<td axis="number" headers="sid">3</td>
<td axis="string" headers="sname">title 3</td>
<td axis="date" headers="sbirth" title="2005-10-12">12.10.2005</td>
</tr></tbody>
</table>
<form id="tabletool" action="#" method="get">
<fieldset>
<legend>Move rows</legend>
<input value=" « " onclick="moveRows(destTable,sourceTable)" type="button">
<input value=" » " onclick="moveRows(sourceTable,destTable)" type="button">
</fieldset>
</form>
<table class="sorted" id="d" cellpadding="0" cellspacing="0">
<thead>
<tr>
<th style="cursor: pointer;" id="did"><span>ID</span></th>
<th style="cursor: pointer;" id="dname"><span>Name</span></th>
<th style="cursor: pointer;" id="dbirth"><span>Birth</span></th>
</tr>
</thead>
<tfoot>
<tr>
<td>Footer 1</td>
<td>Footer 2</td>
<td>Footer 3</td>
</tr>
</tfoot>
<tbody><tr style="cursor: pointer;">
<td axis="number" headers="did">4</td>
<td axis="string" headers="dname">title 2</td>
<td axis="date" headers="dbirth" title="2005-10-12">12.11.2005</td>
</tr></tbody>
</table>
<hr>
<p class="disclaimer">
The dates in the table are in European format (dd.mm.yyyy). Title field
in the first table is sorted case insensitively while description field
is sorted case sensitively. </p>
</div>

<script type="text/javascript">
var sourceTable, destTable;
function init() {
sourceTable = new SortedTable('s');
destTable = new SortedTable('d');
mySorted = new SortedTable();
mySorted.colorize = function() {
for (var i=0;i<this.elements.length;i++) {
if (i%2){
this.changeClass(this.elements[i],'even','odd');
} else {
this.changeClass(this.elements[i],'odd','even');
}
}
}
mySorted.onsort = mySorted.colorize;
mySorted.onmove = mySorted.colorize;
mySorted.colorize();
secondTable = SortedTable.getSortedTable(document.getElementById('id'));
secondTable.allowDeselect = false;
}
init();

</script>
</body></html> 