<?

$r = new HttpRequest("http://svvtools-web:8080/mks/index.jsp?issue=51563", HttpRequest::METH_GET);
$r->setOptions(array("lastmodified" => filemtime("local.rss")));
$r->addQueryData(array("category" => 3));
try {
    $r->send();
    if ($r->getResponseCode() == 200) {
        file_put_contents('local.rss', $r->getResponseBody());
    }
} catch (HttpException $ex) {
    echo $ex;
}
?>