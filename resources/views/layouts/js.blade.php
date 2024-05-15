<div class="cr-wish-notify d-none" id="wishNotification">
    <p class="wish-note">Add product in<a href="{{ route('cart.page') }}"> Cart</a> Successfully!</p>
</div>
<div class="cr-wish-notify d-none" id="wishNotificationWithoutLogin">
    <p class="wish-note">Add product in<a href="{{ route('cart.page.temp') }}"> Cart</a> Successfully!</p>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js"></script>

<script>
    $(document).ready(function() {
                $(".addToCartBtn").click(function(event) {
                    event.preventDefault(); // Prevent the default link behavior
                    var id = $(this).data("id"); // Get the item ID from the data attribute
                    $.get("/cart/" + id, function(response) {
                        console.log(response);
                        // Handle the response here
                        // For example, update the UI based on the response
                        if (response.success) {
                            // Item added successfully, update cart count badge
                            updateCartCount();
                            $("#wishNotification").removeClass("d-none").stop(true, true).fadeIn(0).delay(1000).fadeOut(1000);
                        } else {
                            // Item not added, handle accordingly
                            alert("Failed to add item to cart.");
                        }
                    }).fail(function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error response here
                    });
                });

                $('.addToCartBtnWithoutLogin').on('click', function() {
    var productId = $(this).data('id');
    $.get("{{ url('/get/') }}" + '/' + productId, function(response) {
        if (response.success) {
            // Item added successfully, update cart count badge
            updateCartCount();
            $("#wishNotificationWithoutLogin").removeClass("d-none").stop(true, true).fadeIn(0).delay(1000).fadeOut(1000);
        } else {
            // Item not added, handle accordingly
            alert("Failed to add item to cart.");
        }
    });
});
                // Function to update cart count badge
                function updateCartCount() {
                    $.get('{{ route('cart.count') }}'
                        , function(response) {
                            if (response.success) {
                                var cartCount = response.cartCount;

                                // Update cart count badge
                                if (cartCount > 0) {
                                    $("#cartBadge")
                                        .text(cartCount < 10 ? cartCount : "9+")
                                        .show();
                                    $("#mobcartBadge")
                                        .text(cartCount < 10 ? cartCount : "9+")
                                        .show();
                                } else {
                                    $("#cartBadge").hide();
                                    $("#mobcartBadge").hide();
                                }
                            } else {
                                console.error("Failed to fetch cart count");
                            }
                        }).fail(function(xhr, status, error) {
                        console.error("Error fetching cart count:", error);
                    });
                }

                // Update cart count initially on page load
                updateCartCount();

                // Handle the click event for the cart link
                $("#cartLink").click(function(event) {
                    // Update cart count badge before navigating to cart page
                    updateCartCount();
                });

                // Function to adjust cart badge position for smaller screens
                function adjustCartBadgePosition() {
                    var screenWidth = $(window).width();
                    if (screenWidth <= 768) {
                        // Adjust the cart badge position for mobile
                        $("#cartLink").css("display", "inline-block");
                    } else {
                        // Reset the cart badge position for larger screens
                        // If needed, you can add specific positioning for larger screens here
                    }
                }

                // Call the function initially
                adjustCartBadgePosition();

                // Call the function on window resize
                $(window).resize(function() {
                    adjustCartBadgePosition();
                });

            });

</script>
