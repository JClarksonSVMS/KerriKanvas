    <?php
        if ($_SESSION['form_data']['mediatype'] === 'oil' || $_SESSION['form_data']['mediatype'] === 'acrylic') {
            ?>
            <script>
                $('#nosizediv').hide();
                $('#oilsize').show();
                $('#watersize').hide();
            </script>
            <?php
        } elseif ($_SESSION['form_data']['mediatype'] === 'water' || $_SESSION['form_data']['mediatype'] === 'pencil') {
            ?>
            <script>
                $('#nosizediv').hide();
                $('#oilsize').hide();
                $('#watersize').show();
            </script>
            <?php
        }
    if (isset($_SESSION['error_messages'])) {
        if (isset($_SESSION['msg_send_up'])) {
            ?>
            <script>
                $('#contactform').show();
                $('#messagelabel').show();
                $('#message').show();
                $('#msg_send').show();
                $('#pricing').hide();
                $('#ordering').hide();
            </script>
            <?php
        }else{
            ?>
            <script>
                $('#contactform').show();
                $('#messagelabel').hide();
                $('#message').hide();
                $('#msg_send').hide();
                $('#pricing').show();
                $('#ordering').show();
            </script>
            <?php
        }
                    $_SESSION['error_code'] = array();
    }