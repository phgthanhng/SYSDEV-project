<?php require APPROOT . '/views/includes/adminheader.php'; ?>
<div class="text-center d-lg-flex flex-column align-content-center align-items-lg-center" style="min-height: 100vh;margin: 0px;padding: 0px;">
<div class="table-responsive" style="transform: scale(1);transform-origin: top;opacity: 0.88;filter: contrast(92%);margin-top: 60px;">
    <table class="table">
        <thead>
            <tr>
                <th style="background: #ffffff;border-color: #000000;">Product Name</th>
                <th style="background: #ffffff;border-bottom-color: #000000;">Category</th>
                <th colspan="3" style="background: #ffffff;border-bottom-color: #000000;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($data[""])) {
                foreach ($data[""] as $product) {
                    echo "<tr>";
                    echo "<td style='background: #ffffff;'>
                        </td>";
                    echo "<td style='background: #ffffff;'>
                        </td>";

                    echo "<td style='background: #ffffff;'>
                        <a href=''>Details</a>
                        </td>";
                    echo "<td style='background: #ffffff;'>
                        <a href=''>Edit</a>
                        </td>";
                    echo "<td style='background: #ffffff;'>
                        <a href=''>Delete</a>
                        </td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>



<?php require APPROOT . '/views/includes/footer.php'; ?>