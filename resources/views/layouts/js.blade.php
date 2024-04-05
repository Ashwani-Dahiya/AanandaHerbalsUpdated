<div class="cr-wish-notify d-none" id="wishNotification">
    <p class="wish-note">Add product in<a href="{{ route('cart.page') }}"> Cart</a> Successfully!</p>
</div>


<script>
    $(document).ready(function () {
    $(".addToCartBtn").click(function (event) {
        event.preventDefault(); // Prevent the default link behavior
        var id = $(this).data("id"); // Get the item ID from the data attribute
        $.get("/cart/" + id, function (response) {
            console.log(response);
            // Handle the response here
            // For example, update the UI based on the response
            if (response.success) {
                // Item added successfully, update cart count badge
                updateCartCount();
                $("#wishNotification").removeClass("d-none");
                setTimeout(function () {
                    $("#wishNotification").fadeOut(300);
                }, 2000);
            } else {
                // Item not added, handle accordingly
                alert("Failed to add item to cart.");
            }
        }).fail(function (xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error response here
        });
    });

    // Function to update cart count badge
    function updateCartCount() {
        $.get('{{ route("cart.count") }}', function (response) {
            if (response.success) {
                var cartCount = response.cartCount;
                // Update cart count badge
                if (cartCount > 0) {
                    $("#cartBadge")
                        .text(cartCount < 10 ? cartCount : "9+")
                        .show();
                } else {
                    $("#cartBadge").hide();
                }
            } else {
                console.error("Failed to fetch cart count");
            }
        }).fail(function (xhr, status, error) {
            console.error("Error fetching cart count:", error);
        });
    }

    // Update cart count initially on page load
    updateCartCount();
});

</script>
