<?php
$dom = new DOMDocument();
$dom->load('main.xml');
$plants = $dom->getElementsByTagName('plants')->item(0);
$plant = $plants->getElementsByTagName('plants');
$i = $plants->length;
$id = $plant[$i--]->getElementsByTagName('id')->item(0)->nodeValue++;

if (isset($_POST['plus'])) {
    $plant_name = $_POST['name'];
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

    $plants->appendChild($new_plant);

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
        background-color: #070707;
        color: white;
        font-family: 'Montserrat', sans-serif;
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
        border: 1px solid white;
        background: transparent;
        color: white;
        padding: 10px 20px;
        margin-top: 20px;
        font-size: 20px;
        transition: all .8s;
    }

    .btn-success:hover {
        background: white;
        color: black;
    }
</style>

<div class="container">
    <div class="header">
        <h1>Add plant</h1>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <button name="plus" class="btn btn-success" type="submit">Add</button>
    </form>
</div>