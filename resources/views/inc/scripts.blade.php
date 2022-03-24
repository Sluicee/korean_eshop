<script>
    // cart actions    
    $('#cart_input_quantity').change(function() {
        var ele = $(this);
        var new_qty = ele.parents("tr").find("#cart_input_quantity").val();
        $.ajax({
            url: '{{ route('cart.update') }}',
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: new_qty},
            success: function (response) {
                window.location.reload();
            }
        });
    })
    $(".update-cart").click(function (e) {
        
    });
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Are you sure")) {
            $.ajax({
                url: '{{ route('cart.remove') }}',
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>