<?php
$dom = new DOMDocument();
$dom->load('main.xml', LIBXML_NOWARNING);
$plants = $dom->getElementsByTagName('plants')->item(0);
?>
<style>
    th {
        color: black;
    }

    body {
        background-color: white;
        color: black;
        justify-content: center;
    }

    .header {
        text-align: center;
    }

    .btn {
        display: flex;
        justify-content: center;
    }

    table {
        margin: 0 auto;
    }

    .btn-primary {
        margin-top: 10px;
    }

    * {
        -webkit-border-horizontal-spacing: 0;
        -webkit-border-vertical-spacing: 0;
    }

    a:visited,
    a {
        color: inherit;
    }


    td,
    td {
        padding: 5px;
        border: 1px solid grey;
        box-sizing: border-box;

    }
</style>

<body>
    <div class="container">
        <div class="header">
            <h1>TOP plants</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>№</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $plant = $plants->getElementsByTagName('plant');
                while (is_object($plant->item($i++))) {
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $plant->item($i--)->getElementsByTagName('name')->item(0)->nodeValue ?></td>

                        <td><?php echo $plant->item($i--)->getElementsByTagName('price')->item(0)->nodeValue ?></td>

                        <td><?php echo $plant->item($i--)->getElementsByTagName('description')->item(0)->nodeValue ?></td>

                        <td><a href="index.php?page_layout=update&id=<?php echo  $plant->item($i--)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> Edit <?php echo  $plant->item($i--)->getElementsByTagName('id')->item(0)->nodeValue; ?></a></td>
                        <td><a href="index.php?page_layout=delete&id=<?php echo  $plant->item($i--)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> Delete </a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a class="btn btn-primary" href="index.php?page_layout=create"> Add </a>
    </div>
</body>