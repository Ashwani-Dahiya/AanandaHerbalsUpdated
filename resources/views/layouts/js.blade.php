<div class="cr-wish-notify d-none" id="wishNotification">
    <p class="wish-note">Add product in<a href="{{ route('cart.page') }}"> Cart</a> Successfully!</p>
</div>


{{-- <script>
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
                    $("#wishNotification").removeClass("d-none");
                    setTimeout(function() {
                        $("#wishNotification").fadeOut(300);
                    }, 2000);
                } else {
                    // Item not added, handle accordingly
                    alert("Failed to add item to cart.");
                }
            }).fail(function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle error response here
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
.text(cartCount < 10 ? cartCount : "9+" ) .show(); } else { $("#cartBadge").hide(); } } else { console.error("Failed to fetch cart count"); } }).fail(function(xhr, status, error) { console.error("Error fetching cart count:", error); }); } // Update cart count initially on page load updateCartCount(); }); </script> --}}
    {{-- <script>
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
                    $("#wishNotification").removeClass("d-none");
                    setTimeout(function() {
                        $("#wishNotification").fadeOut(300);
                    }, 2000);
                } else {
                    // Item not added, handle accordingly
                    alert("Failed to add item to cart.");
                }
            }).fail(function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle error response here
            });
        });

        // Function to update cart count badge
        function updateCartCount() {
            $.get('{{ route("cart.count") }}', function(response) {
    if (response.success) {
    var cartCount = response.cartCount;
    // Update cart count badge
    if (cartCount > 0) {
    $("#mobcartBadge")
    .text(cartCount < 10 ? cartCount : "9+" ).show(); } else { $("#mobcartBadge").hide(); } } else { console.error("Failed to fetch cart count"); } }).fail(function(xhr, status, error) { console.error("Error fetching cart count:", error); }); } updateCartCount(); $("#cartLink").click(function(event) { updateCartCount(); }); adjustCartBadgePosition() { var screenWidth=$(window).width(); if (screenWidth <=768) { $("#cartLink").css("display", "inline-block" ) } else {} } adjustCartBadgePosition(); $(window).resize(function() { adjustCartBadgePosition(); }); }); </script> --}}
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
                            $("#wishNotification").removeClass("d-none");
                            setTimeout(function() {
                                $("#wishNotification").fadeOut(300);
                            }, 2000);
                        } else {
                            // Item not added, handle accordingly
                            alert("Failed to add item to cart.");
                        }
                    }).fail(function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error response here
                    });
                });



                $(".addToCartBtnWithoutLogin").click(function() {
                    // Get the product ID from the data attribute of the clicked button
                    var productId = $(this).data("id");
                    console.log(productId);
                    // Send an AJAX request to add the item to the cart
                    $.ajax({
                        url: "/add-item-into-cart/" + productId
                        , method: "GET"
                        , success: function(response) {
                            console.log(response);
                            // Handle the response here
                            if (response.success) {
                                // Item added successfully, update cart count badge
                                updateCartCount();
                                $("#wishNotification").removeClass("d-none");
                                setTimeout(function() {
                                    $("#wishNotification").fadeOut(300);
                                }, 2000);
                            } else {
                                console.log(response.productID);
                                console.log(response.Ip);
                                console.log(response.error);
                                alert("Failed to add item to cart.");
                            }
                        }
                        , error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle error response here
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
