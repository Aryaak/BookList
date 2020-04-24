$(function() {

  $(".insertModal").on("click", function() {

     $("#formModalLabel").html("Insert new book");
     $(".modal-footer button[type=submit]").html("insert book");
     $(".modal-body form")[0].reset();

  }); 


  $(".changeModal").on("click", function() {

     $("#formModalLabel").html("Change book data");
     $(".modal-footer button[type=submit]").html("change book");
     $(".modal-body form").attr("action", "book/change");

     const id = $(this).data("id");

     $.ajax({
       
       url: "http://localhost/BookList/public/book/getchange",
       data: { id : id },
       dataType: "json",
       method: "post",

       success: function (data) { 
                
                $("#title").val(data.title);
                $("#author").val(data.author);
                $("#publisher").val(data.publisher);
                $("#price").val(data.price);
                $("#id").val(data.id);

       } 

     });

  }); 

});