$(document).ready(function () {
    
    $(".del-record").click(function () {
        if (!confirm("Do you Want to Delete Record")) {
            return false;
        }
    });
   
});