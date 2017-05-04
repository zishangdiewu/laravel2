<script type="text/javascript" src='{{ asset("js/jquery-1.8.3.min.js") }}'></script>
<script>
	$.ajax({
            url:'{{ url("/ajax") }}',
            type:'get',
            async:true,
            data:{'pid':'bbbbb'},
            

            success:function(data){
                alert(data);
            }
        });
</script>