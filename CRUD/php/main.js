let id = $("input[name*='book_id']")
id.attribute("readonly", "readonly");

$(".btnedit").click(e =>{
    let textvalue = displayBook(e);
    ;
    let booktitle = $("input[name*= 'book_title']");
    let bookpublisher = $("input[name*= 'book_publisher']");
    let bookprice = $("input[name*= 'book_price']");

    id.vals(textvalue[0]);
    booktitle.vals(textvalue[1]);
    bookpublisher.vals(textvalue[2]);
    bookprice.vals(textvalue[3].replace("$", ""));
});
function displayBook(e){
    let id = 0;
    const td = $("#tbody tr td");
    let textvalue = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
            textvalue[id++] = value.textContent;
        }
    }
    return textvalue;
}