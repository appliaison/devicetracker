<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
                "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<script>
$(document).ready(function() {
    $('input[type="checkbox"]').click(function() {
        var index = $(this).attr('name').substr(3);
        index--;
        $('table tr').each(function() { 
            $('td:eq(' + index + ')',this).toggle();
        });
        $('th.' + $(this).attr('name')).toggle();
    });
});
</script>
<body>
<table>
<thead>
    <tr>
        <th class="col1">Header 1</th>
        <th class="col2">Header 2</th>
        <th class="col3">Header 3</th>
    </tr>
</thead>
<tr><td>Column1</td><td>Column2</td><td>Column3</td></tr>
<tr><td>Column1</td><td>Column2</td><td>Column3</td></tr>
<tr><td>Column1</td><td>Column2</td><td>Column3</td></tr>
<tr><td>Column1</td><td>Column2</td><td>Column3</td></tr>
</table>

<form>
    <input type="checkbox" name="col1" checked="checked" /> Hide/Show Column 1 <br />
    <input type="checkbox" name="col2" checked="checked" /> Hide/Show Column 2 <br />
    <input type="checkbox" name="col3" checked="checked" /> Hide/Show Column 3 <br />
</form>
</body>
</html>
