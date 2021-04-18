<?php
require_once ("../CRUD/php/component.php");
require_once ("../CRUD/php/DB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>
        Bookstore
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body style="background-color: lightgray">
<main>
    <div class="container text-center">
        <h1 style="background-color: darkkhaki;
            color: red;
            font-family: Verdana">
            SNHU Bookstore
        </h1>
        <div class="d-flex">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("Book ID", "Book ID", "book_id","");?>
                    <div class="pt-2">
                        <?php inputElement("Title", "Book Title", "book_title","");?>
                </div>
                    <div class="row">
                        <div class="col">
                            <?php inputElement("Publisher", "Book Publisher", "book_publisher","");?>
                        </div>
                        <div class="col">
                            <?php inputElement("Price", "Book Price", "book_price","");?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center pt-2">
                        <?php buttonElement("btn-create", "btn btn-success", "+", "create", "dat-toggle='tooltip' data-placement='bottom' title='Create'") ;?>
                        <?php buttonElement("btn-read", "btn btn-info", "~", "read", "dat-toggle='tooltip' data-placement='bottom' title='Read'") ;?>
                        <?php buttonElement("btn-update", "btn btn-secondary", "^", "update", "dat-toggle='tooltip' data-placement='bottom' title='Update'") ;?>
                        <?php buttonElement("btn-delete", "btn btn-danger", "-", "delete", "dat-toggle='tooltip' data-placement='bottom' title='Delete'") ;?>
                    </div>
            </form>
        </div>

        <div class="d-flex table-data pt-2">
            <table class="table table-striped table-dark ">
                <thead class="thead-dark">
                <tr>
                    <th>Book ID</th>
                    <th>Book Title</th>
                    <th>Book Publisher</th>
                    <th>Book Price</th
                </thead>
                <tbody
                        id="tbody">
                <?php
                if(isset($_POST['read'])){
                    $result = getBook();

                    if($result){
                        while ($row = mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td data_id = "<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                <td data-id = "<?php echo $row['id']; ?>">?php echo $row ['book_title']; ?></td>
                                <td data-id = "<?php echo $row['id']; ?>">?php echo $row ['book_publisher']; ?></td>
                                <td data-id = "<?php echo $row['id']; ?>">?php echo $row ['book_price']; ?></td>
                            </tr>}
                <?php
                        }
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>