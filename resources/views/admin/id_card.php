

<style>
    body{
        margin: 0px !important;
    }
    .allimg {
        width: 150px !important;
    }

    #printableArea {
        width: 500px !important;
        height: 314px !important;
        background-image: url("iid_card.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 15px;
    }

    .mytable td {
        padding: 2px 3px !important;
        font-size: 12px;
    }

    @media print {
        #printableArea {
            width: 502px !important;
            height: 315px !important;
            margin: 7mm;
        }
    }

    .sign_div {
        position: relative;
    }

    .stamp {
        position: absolute;
        bottom: 30px;
        right: 60px;
        width: 110px;
        z-index: 999;
    }

    .foto_style {
        border-radius: 5px;
        border: 3px solid #2957a4;
        margin-right: 10px;
    }
</style>

<table class="mytable" id="printableArea">
    <tbody>
        <tr>
            <td colspan="3" style="height: 120px;">

            </td>
        </tr>
        <tr>
            <td>
                <?php
                if ($dataq['file'] != "") {
                ?>
                    <img src="../<?= $dataq['file']; ?>" width="100px" class="foto_style">
                <?php
                }
                ?>
            </td>
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <b>Serial No.: </b><?= $dataq['id']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Name: </b>
                        </td>
                        <td>
                            <?= $dataq['full_name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>F/Name: </b>
                        </td>
                        <td>
                            <?= $dataq['father_name']; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>DOB: </b><?= $dataq['dob']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Course: </b>
                        </td>
                        <td>
                            <?= $dataq['mother_name']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Reg. No.: </b>
                        </td>
                        <td>
                            <?= $dataq['reg_no']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Valid Upto: </b>
                        </td>
                        <td>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
