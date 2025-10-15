<?php

session_start();

require "connection.php";

$from = $_SESSION["user"]["email"];

$msg_rs = Database::search("SELECT * FROM `chat` WHERE `from`='" . $from . "' OR `to`='" . $from . "'");
$msg_num = $msg_rs->num_rows;

$admin_rs = Database::search("SELECT * FROM `user` WHERE `user_type_id`='1'");
$admin_num = $admin_rs->num_rows;
if ($admin_num == 1) {
    $admin_data = $admin_rs->fetch_assoc();
    $adEmail = $admin_data["email"];
}

for ($x = 0; $x < $msg_num; $x++) {
    $msg_data = $msg_rs->fetch_assoc();

    if ($msg_data["from"] == $from && $msg_data["to"] == $adEmail) {

        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`= '" . $msg_data["from"] . "'");
        $user_data = $user_rs->fetch_assoc();

        $img_rs = Database::search("SELECT * FROM `profile_images` WHERE `user_email` = '" . $msg_data["from"] . "'");
        $img_data = $img_rs->fetch_assoc();

?>
        <!-- sender -->
        <div class="d-flex justify-content-end mb-4">
            <div class="msg_cotainer_send">
                <span><?php echo $msg_data["content"]; ?></span>
                <p class="msg_time"><?php echo $msg_data["date_time"]; ?></p>
            </div>
            <div class="img_cont_msg">

                <?php

                if (isset($img_data["path"])) {
                ?>

                    <img src="<?php echo $img_data["path"]; ?>" width="40px" height="40px" class="rounded-circle user_img_msg">

                <?php
                } else {
                ?>

                    <img src="resources/user.png" width="40px" height="40px" class="rounded-circle user_img_msg">

                <?php
                }

                ?>

            </div>
        </div>
        <!-- sender -->


    <?php

    } elseif ($msg_data["to"] == $from && $msg_data["from"] == $adEmail) {

        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`= '" . $msg_data["from"] . "'");
        $user_data = $user_rs->fetch_assoc();

    ?>
        <!-- receiver -->
        <div class="d-flex justify-content-start mb-4">
            <div class="img_cont_msg mt-1">
                <img src="resources/customer.png" width="30px" height="30px" class="rounded-circle user_img_msg bg-white p-1">
            </div>
            <div class="msg_cotainer">
                <span><?php echo $msg_data["content"]; ?></span>
                <p class="msg_time"><?php echo $msg_data["date_time"]; ?></p>
            </div>
        </div>
        <!-- receiver -->


<?php

    }

    if ($msg_data["status"] == 0) {
        Database::iud("UPDATE `chat` SET `status`='1' WHERE `from` = '" . $from . "' AND `to` = '".$adEmail."'");
    }
}

?>