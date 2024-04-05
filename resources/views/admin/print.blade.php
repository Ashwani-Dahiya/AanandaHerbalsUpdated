<?php
include 'config.php';
$id = $_GET['id'];
$sel = mysqli_query($link, "SELECT * FROM tbl_order WHERE id='$id'");
$dataq = mysqli_fetch_array($sel);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    td {
        font-size: 12px !important;
    }
</style>

<body>
    <div>
        <table>
            <tr>
                <td colspan="4">
                    <center>
                        <p style="margin: 0;">PAID</p>
                        <h3 style="margin: 0;"><b>Hyans Pizzaria</b></h3>
                        <p>
                            Opp Redtape Hisar Road, Near Bus Stand, Sirsa<br>
                            FSSAI LIc No. 20822019000225
                        </p>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="border-top: 1px solid #000 !important; border-bottom: 1px solid #000 !important;">
                    <b>Name/Phone:</b> <?= $dataq['phone']; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <b>Date:</b> <?= $dataq['date']; ?><br>
                    <b>Chashier:</b> biller
                </td>
                <td colspan="2">
                    <b>Dine in:</b> 45<br>
                    <b>Bill no:</b> <?= $dataq['id']; ?>
                </td>
            </tr>
            <tr>
                <td style="border-top: 1px solid #000 !important; border-bottom: 1px solid #000 !important;">
                    <b>No. Item</b>
                </td>
                <td style="border-top: 1px solid #000 !important; border-bottom: 1px solid #000 !important;">
                    <b>Qty</b>
                </td>
                <td style="border-top: 1px solid #000 !important; border-bottom: 1px solid #000 !important;">
                    <b>Price</b>
                </td>
                <td style="border-top: 1px solid #000 !important; border-bottom: 1px solid #000 !important;">
                    <b>Amount</b>
                </td>
            </tr>
            <?php
            $result = mysqli_query($link, "select * from tbl_order_items where order_id='$id' order by id desc");
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                $i++;
            ?>
                <tr>
                    <td>
                        <?php
                        $uuuu = $row['item_id'];
                        $auth = "select * from tbl_item WHERE id='$uuuu'";
                        $au = mysqli_query($link, $auth);
                        $o = mysqli_fetch_array($au);
                        echo $i . " " . $o['name'];
                        ?>
                    </td>
                    <td>
                        <?= $row['times']; ?>
                    </td>
                    <td>
                        <?= $row['price']; ?>
                    </td>
                    <td>
                        <?= $row['price']; ?>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="2" style="border-top: 1px solid #000 !important;">
                    Qty:
                    <?php
                    $alltimes = mysqli_query($link, "select sum(times) as alltimes from tbl_order_items where order_id='$id'");
                    $datab = mysqli_fetch_array($alltimes);
                    echo $datab['alltimes'];
                    ?>
                </td>
                <td style="border-top: 1px solid #000 !important;">
                    S. TTL
                </td>
                <td style="border-top: 1px solid #000 !important;">
                    <?= $dataq['total_amount']; ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="border-top: 1px solid #000 !important; border-bottom: 1px solid #000 !important;">
                    <h3 style="margin: 0; float: right;"><b>Grand Total: <?= $dataq['total_amount']; ?></b></h3>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <center>
                        <p>
                            Thank you, Visit again!!<br>
                            Never hunts a pizza by saying No...<br>
                            They too have feeling inside !!
                        </p>
                    </center>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
<script>
    window.onload = function() {
        window.print();
    }
</script>