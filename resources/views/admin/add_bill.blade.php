<?php
include 'header.php';
?>

<style>
    .form-control {
        margin-bottom: 20px !important;
    }

    label {
        margin-bottom: 0.5rem;
    }
</style>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="page-header breadcumb-sticky">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Create Bill</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home /</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Create Bill</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Create Bill</h5>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <?php
                                        if (isset($_REQUEST["btnsave"])) {

                                            $sale_date = mysqli_real_escape_string($link, $_REQUEST['sale_date']);
                                            $cust_name = mysqli_real_escape_string($link, $_REQUEST['cust_name']);
                                            $cust_mobile = mysqli_real_escape_string($link, $_REQUEST['cust_mobile']);
                                            $cust_addr = mysqli_real_escape_string($link, $_REQUEST['cust_addr']);
                                            $ttl_quty = mysqli_real_escape_string($link, $_REQUEST['ttl_quty']);
                                            $ttl_amt = mysqli_real_escape_string($link, $_REQUEST['ttl_amt']);
                                            $recv = mysqli_real_escape_string($link, $_REQUEST['recv']);
                                            $discount = mysqli_real_escape_string($link, $_REQUEST['discount']);
                                            $balance = mysqli_real_escape_string($link, $_REQUEST['balance']);
                                            $payment_mode = mysqli_real_escape_string($link, $_REQUEST['payment_mode']);
                                            $disc = mysqli_real_escape_string($link, $_REQUEST['disc']);

                                            $innst = "insert into tbl_order (frei_id, sale_date, cust_name, cust_mobile, cust_addr, ttl_quty, ttl_amt, recv, discount, balance, payment_mode, disc) 
                                            values('$userid','$sale_date','$cust_name','$cust_mobile','$cust_addr','$ttl_quty','$ttl_amt','$recv','$discount','$balance','$payment_mode','$disc')";
                                            $result = mysqli_query($link, $innst);
                                            $sale_id = mysqli_insert_id($link);
                                            $count = count($_POST['item_name']);
                                            for ($i = 0; $i < $count; $i++) {
                                                $query = "INSERT INTO `tbl_order_items` (`frei_id`,`order_id`,`item_name`,`qty`,`price`,`amount`) VALUES('$userid','$sale_id','{$_POST['item_name'][$i]}','{$_POST['qty'][$i]}','{$_POST['price'][$i]}','{$_POST['amount'][$i]}')";
                                                //echo $query;
                                                $resultt = mysqli_query($link, $query);
                                            }
                                            if (mysqli_affected_rows($link)) {
                                        ?>
                                                <h4 class="text-center text-success">
                                                    Sale Generated Successfully
                                                </h4>
                                            <?php
                                            } else {
                                            ?>
                                                <h4 class="text-center text-danger">
                                                    Try again!
                                                </h4>
                                        <?php

                                            }
                                        }

                                        ?>
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-6 col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-wrapper">
                                                            <label class="label" for="name1">Sale No.</label>
                                                            <input type="text" class="form-control" readonly="" value="11">
                                                            <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-wrapper">
                                                            <label class="label" for="name1">Date: </label>
                                                            <input type="date" class="form-control" name="sale_date" value="<?php echo date('Y-m-d'); ?>">
                                                            <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-wrapper">
                                                            <label class="label" for="name5">Customer Name</label>
                                                            <input type="text" id="cust_name" name="cust_name" class="form-control">
                                                            <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-wrapper">
                                                            <label class="label" for="name5">Mobile</label>
                                                            <input type="tel" id="cust_mobile" name="cust_mobile" class="form-control">
                                                            <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="input-wrapper">
                                                            <label class="label" for="name5">Address</label>
                                                            <input type="text" id="cust_addr" name="cust_addr" class="form-control">
                                                            <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12" style="padding: 0 !important;">
                                                    <div class="table-responsive">
                                                        <a class="btn btn-success btn-sm add-record" data-added="0">Add Item</a>
                                                        <table class="table" id="tbl_posts">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" style="width: 200px;">Item Name</th>
                                                                    <th scope="col">Qty</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col">Act.</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbl_posts_body">
                                                                <?php
                                                                $q = mysqli_query($link, "SELECT p.id as p_id , ap.frei_id, ap.pro_id, p.pro_name,ap.price as assign_price from tbl_assign_products as ap INNER JOIN tbl_product as p on ap.pro_id=p.id WHERE frei_id=$userid");
                                                                $products = [];
                                                                while ($datac = mysqli_fetch_array($q)) {
                                                                    $products[] = $datac;
                                                                }
                                                                ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="2" style="padding: 10px 0px;">
                                                                        <h6>Total QTY : &nbsp;<span class="total_qty"></span></h6>
                                                                        <input type="hidden" name="ttl_quty">
                                                                    </td>
                                                                    <td colspan="3" class="right">
                                                                        <h6>Subtotal: &nbsp;<span class="grandTotal"></span></h6>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6>Total Amt.</h6>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group basic">
                                                                <div class="input-wrapper">
                                                                    <input type="tel" id="num1" name="ttl_amt" class="form-control grandTotal">
                                                                    <i class="clear-input"><ion-icon name="close-circle" role="img" class="md" aria-label="close circle"></ion-icon></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <strong class="text-dark">Received</strong>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group basic">
                                                                <div class="input-wrapper">
                                                                    <input type="tel" id="num2" class="form-control" name="recv">
                                                                    <i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <strong class="text-dark">Discount</strong>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group basic">
                                                                <div class="input-wrapper">
                                                                    <input type="tel" id="num3" class="form-control" name="discount">
                                                                    <i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <strong class="text-secondary">Balance</strong>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group basic">
                                                                <div class="input-wrapper">
                                                                    <input type="tel" id="subt" class="form-control" name="balance" readonly="">
                                                                    <i class="clear-input"><ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <strong class="text-secondary">Payment Type</strong>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <select class="form-control custom-select" name="payment_mode">
                                                                    <option value="Select">Select</option>
                                                                    <option value="Cash">Cash</option>
                                                                    <option value="Bank">Bank</option>
                                                                    <option value="Paytm">Paytm</option>
                                                                    <option value="Google Pay">Google Pay</option>
                                                                    <option value="Phone Pay">Phone Pay</option>
                                                                    <option value="Amazon Pay">Amazon Pay</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="input-wrapper">
                                                            <label class="label" for="address4">Add Discription</label>
                                                            <textarea rows="2" name="disc" class="form-control"></textarea>
                                                            <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary btn-lg" type="submit" name="btnsave">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    products = <?php echo json_encode($products) ?>;
    selectedItem = [];
    let index = 0;

    $(".add-record").click(function() {
        let options = '';
        products.forEach((i) => {
            options += `<option value='${i.p_id}' price='${i.assign_price}'>${i.pro_name}</option>`;
        });
        index++;
        $("#tbl_posts_body").append(`
            <tr id="rec-${index}" class="txtMult">
                <td>
                    <div class="form-group basic" style="padding: 0px;">
                        <div class="input-wrapper">
                            <select class="form-control item_input_in_table custom-select selected_item${index}" name="item_name[]">
                                <option value="Select">Select Item</option>
                                ${options}
                            </select>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group basic" style="padding: 0px;">
                        <div class="input-wrapper">
                            <input type="tel"  class="form-control qty qty${index} item_input_in_table val1" value="1" name="qty[]">
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group basic" style="padding: 0px;">
                        <div class="input-wrapper">
                            <input type="tel"  class="form-control price price${index} item_input_in_table val2" name="price[]">
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group basic" style="padding: 0px;">
                        <div class="input-wrapper">
                            <input type="tel"  id="every_click" class="form-control amount amount${index} item_input_in_table multTotal" name="amount[]">
                        </div>
                    </div>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm delete-record btn-radius" onClick="del(${index})" del-id="${index}">
                        X
                    </a>
                </td>
            </tr>`);
        del();
        selectItem(`.selected_item${index}`, index);
        chnageQty(`.qty${index}`, index);
    });

    function del() {
        $(".delete-record").click(function() {
            $(this).parent().parent().remove();
            priceSet();
            qtySet();
        });
    }

    function chnageQty(name, index) {
        $(name).keyup(function() {

            let qty = $(this).val();
            qty = qty ? qty : 0;
            let price = $(`.price${index}`).val();
            //    console("qty",qty);
            //    console("price",price);
            let amount = parseInt(qty) * parseInt(price);
            $(`.amount${index}`).val(amount);
            priceSet();
            qtySet();
        });

    }

    function selectItem(name, index) {
        $(name).change(function() {
            let price = $(`${name} option:selected`).attr("price");
            $(`.qty${index}`).val(1);
            $(`.price${index}`).val(price);
            $(`.amount${index}`).val(price);
            priceSet();
            qtySet();
        });

    }

    function priceSet() {
        let len = $(".amount").length;
        let total_amt = 0;
        for (let i = 0; i < len; i++) {
            let amt = $(`.amount:eq(${i})`).val();
            amt = amt ? amt : '0';
            total_amt += parseInt(amt);
        }
        $(".grandTotal").val(total_amt);
        $(".grandTotal").text(total_amt);
    }

    function qtySet() {
        let len = $(".qty").length;
        let total_qty = 0;
        for (let i = 0; i < len; i++) {
            let qty = $(`.qty:eq(${i})`).val();
            qty = qty ? qty : '0';
            total_qty += parseInt(qty);
        }
        $(".total_qty").text(total_qty);
    }
    $(function() {
        $("#num1, #num2, #num3").on("keydown keyup", sub);

        function sub() {
            var subtotal = Number($("#num1").val()) - Number($("#num2").val()) - Number($("#num3").val());
            subtotal = parseInt(subtotal);
            $("#subt").val(subtotal);

        }
    });
</script>

<!-- <script type="text/javascript">
    $(function() {
        $("#num1, #num2, #num3").on("keydown keyup", sub);

        function sub() {
            var subtotal = Number($("#num1").val()) - Number($("#num2").val()) - Number($("#num3").val());
            var prebal = $("#prebal").val();
            prebal = parseInt(prebal);
            if (prebal > 0) {
                subtotal = subtotal - prebal;
            } else {
                subtotal = subtotal + prebal;
            }
            $("#subt").val(subtotal);

        }
    });



    // $(function() {
    // $(".num11, .num22").on("keydown keyup", mult);
    // function mult() {
    // $(".multt").val(Number($(".num11").val()) * Number($(".num22").val()));
    //  
    // }
    // });



    function show(str) {
        document.getElementById('sh2').style.display = 'none';
        document.getElementById('sh1').style.display = 'block';
    }

    function show2(sign) {
        document.getElementById('sh2').style.display = 'block';
        document.getElementById('sh1').style.display = 'none';
    }
</script>

<script>
    jQuery(document).delegate('a.add-record', 'click', function(e) {
        e.preventDefault();

        var content = jQuery('#sample_table tr'),
            size = jQuery('#tbl_posts >tbody >tr').length + 1,
            element = null,
            element = content.clone();
        element.attr('id', 'rec-' + size);

        element.find('.delete-record').attr('data-id', size);
        element.appendTo('#tbl_posts_body');
        element.find('.sn').html(size);

        multInputs();
    });

    jQuery(document).delegate('a.delete-record', 'click', function(e) {
        e.preventDefault();
        var didConfirm = 1;
        if (1 == true) {
            var id = jQuery(this).attr('data-id');
            var targetDiv = jQuery(this).attr('targetDiv');
            jQuery('#rec-' + id).remove();

            //regnerate index number on table
            $('#tbl_posts_body tr').each(function(index) {
                //alert(index);

                $(this).find('span.sn').html(index + 1);
            });
            multInputs();
            return true;
        } else {
            return false;
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".txtMult input").keyup(multInputs);
    });

    $(document).on("keyup", ".item_input_in_table", function() {
        multInputs();
    })

    function multInputs() {
        var mult = 0;
        // for each row:
        $("tr.txtMult").each(function() {
            // get the values from this row:
            var $val1 = $('.val1', this).val();
            var $val2 = $('.val2', this).val();
            var $total = ($val1) * ($val2)
            $('.multTotal', this).val($total);
            mult += $total;
        });
        $(".grandTotal").text(mult);
        $(".grandTotal").val(mult);
    }
</script> -->