$(function(){
        function callJqueryPagination() 
        {
            $("ul.pagination_class a").click(paginationClick);        
        }
    
        function paginationClick() 
        {
            var href = $(this).attr('href');
            $("#userRecordTabel").css("opacity","0.4");
            $.ajax({
                type: "GET",
                url: href,            
                data: {},
                success: function(response)
                {                
                    $("#userRecordTabel").css("opacity","1");
                    $("#refreshData").html(response);
                    callJqueryPagination();
                }
            });
     
            return false;
        }
    
        callJqueryPagination();

});
////////////////////////////////////////////////

