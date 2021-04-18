<?php
require_once ("DB.php");
require_once ("component.php");

$connection = Createdb();

if(isset($_POST['create'])){
    createBook();
}
if(isset($_POST['update'])){
    UpdateBook();
}
if(isset($_POST['delete'])) {
    deleteBook();
}
if(isset($_POST['deleteall'])){
    deleteALL();
}
function createBook(){
    $booktitle = textValue("book_title");
    $bookpublisher = textValue("book_publisher");
    $bookprice = textValue("book_price");

    if($booktitle && $bookpublisher && $bookprice){
        $sql = "INSERT INTO books (book_title, book_publisher, book_price)
                VALUES ('$booktitle', '$bookpublisher', '$bookprice')";
        if(mysqli_query($GLOBALS['connect'], $sql)){
            TextNode("Record added.");
        }else{
            echo "Unable to add record.";
        }
    }else{
        TextNode("Please provide necessary data.");
    }
}
function textValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['connect'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}
function getBook(){
    $sql = "SELECT * FROM books";
    $result = mysqli_query($GLOBALS['connect'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}
function UpdateBook(){
    $bookid = textValue("book_id");
    $booktitle = textValue("book_title");
    $bookpublisher = textValue("book_publisher");
    $bookprice = textValue("book_price");

    if($booktitle && $bookpublisher && $bookprice){
        $sql = "
                UPDATE books SET book_title = '$booktitle', 
                                 book_publisher = '$bookpublisher',
                                 book_price = '$bookprice',
                                 WHERE id='$bookid'
        ";
        if(mysqli_query($GLOBALS['connect'], $sql)){
            TextNode("Data updated.");
        }else{
            TextNode("Unable to update record.");
        }
    }else{
        TextNode("Use edit icon to update data.");
    }
}
function deleteBook(){
    $bookid = (int)textValue("book_id");
    $sql = "DELETE FROM books WHERE id+$bookid";

    if(mysqli_query($GLOBALS['connect'], $sql)){
        TextNode("Record deleted.");
    }else{
        TextNode("Unable to delete record.");
    }
}
function setID(){
    $getid = getBook();
    $id = 0;
    if(getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}