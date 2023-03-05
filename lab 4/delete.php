<?php $id = $_GET['id'];
$dom = new DOMDocument();
$dom -> load('main.xml');
$plants = $dom -> getElementsByTagName('plant') -> item(0);
$plant = $plants -> getElementsByTagName('plant');

$i = 0;
while (is_object($plant -> item($i++))) {
    $prd = $plant -> item($i--) -> getElementsByTagName('id') -> item(0);
    $prd_id = $prd -> nodeValue;
    if( $prd_id == $id){
        $plant -> removeChild($plant -> item($i--));
        break;
    }
}

$dom -> formatOutput = true;
$dom -> save('main.xml') or die('Error');
header('location: index.php?page_layout=list');
exit;
