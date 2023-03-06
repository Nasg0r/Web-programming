<?php
$id = $_GET['id'];
echo $id;
$dom = new DOMDocument();
$dom->load('main.xml');
$plants = $dom->getElementsByTagName('plants')->item(0);
$plant = $plants->getElementsByTagName('plant');


if (isset($_POST['sbm'])) {
    $plant_name = $_POST['plant_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $new_plant = $dom->createElement('plant');

    $node_id = $dom->createElement('id', $id);
    $new_plant->appendChild($node_id);

    $node_name = $dom->createElement('name', $plant_name);
    $new_plant->appendChild($node_name);

    $node_price = $dom->createElement('price', $price);
    $new_plant->appendChild($node_price);

    $node_description = $dom->createElement('description', $description);
    $new_plant->appendChild($node_description);
    $i = 0;
    while (is_object($plant->item($i++))) {
        $prd = $plant->item($i - 1)->getElementsByTagName('id')->item(0);
        $prd_id = $prd->nodeValue;
        if ($prd_id == $id) {
            $plants->replaceChild($new_plant, $plant->item($i - 1));
            break;
        }
    }

    $dom->formatOutput = true;
    $dom->save('main.xml') or die('Error');
    header('location: index.php?page_layout=list');
}
?>

<style>
    .container {
        text-align: center;
    }

    body {
        background-color: white;
        color: black;
    }

    .form-group {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
    }

    .form-group>label {
        width: 100px;
        display: flex;
        justify-content: end;
        margin: 0 10px 0 0;

    }

    .btn-success {
        border: 1px solid grey;
        background: transparent;
        color: black;
        padding: 10px 20px;
        margin-top: 20px;
        font-size: 20px;
        transition: all .8s;
    }

    .btn-success:hover {
        background: black;
        color: white;
    }
</style>


<div class="container">
    <div class="header">
        <h1>Edit</h1>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="plant_name" class="form-control" required ">
        </div>
        <div class=" form-group">
            <label for="">Price</label>
            <input type="number" name="price" class="form-control" required ">
        </div>
        <div class=" form-group">
            <label for="">Description</label>
            <input type="text" name="description" class="form-control" required ">
        </div>
        <button name=" sbm" class="btn btn-success" type="submit">Update</button>
    </form>
</div>