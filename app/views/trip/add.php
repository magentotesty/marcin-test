<?php $this->start('body'); ?>
<style>
    #trip label {
        display: inline-block;
        width: 150px;
        text-align: right;
    }

    #trip_submit {
        padding-left: 220px;
        padding-top: 20px;
    }

    #trip div {
        margin-top: 1em;
    }

    #success_info {
        font-weight: bold;
    }

    #success_back {
        padding-top: 20px;
    }

    .error {
        display: none;
        margin-left: 10px;
    }

    .error_show {
        color: red;
        margin-left: 10px;
    }

    input.invalid {
        border: 2px solid red;
    }

    input.valid {
        border: 2px solid green;
    }
</style>

<?php if (isset($this->lastInsertId)) { ?>
    <div id="success_info" class="col-md-12 text-left">
        <?= $this->langs->getLang('added_trip'); ?>
        <?php echo $this->lastInsertId ?>
    </div>
    <div id="success_back" class="col-md-12 text-left">
        <a href="<?= SERVER_DIRECTORY ?>trip/add/" class="btn btn-info"><?= $this->langs->getLang('back'); ?></a>
    </div>
<?php } else { ?>

    <form id="trip" class="form" action="" method="post">
        <div class="col-md-12 text-left">
            <label for="trip_name"><?= $this->langs->getLang('trip_name'); ?></label>
            <input type="text" id="trip_name" name="trip_name" maxlength="40"></input>
            <span class="error"><?= $this->langs->getLang('field_required'); ?></span>
        </div>
        <div class="col-md-12 text-left">
            <label for="trip_measure_interval"><?= $this->langs->getLang('measure_interval'); ?></label>
            <input type="text" id="trip_interval" name="trip_interval" maxlength="2"></input>
            <span class="error"><?= $this->langs->getLang('field_required'); ?></span>
        </div>
        <div class="col-md-12 text-left">
            <label for="trip_distance"><?= $this->langs->getLang('trip_distance'); ?></label>
            <input type="text" id="trip_distance" name="trip_distance" maxlength="2"></input>
            <span class="error"><?= $this->langs->getLang('field_required'); ?></span>
        </div>
        <div class="col-md-12 text-left">
            <label for="trip_measuring_points"><?= $this->langs->getLang('measuring_points'); ?></label>
            <input type="text" id="trip_points" name="trip_points" maxlength="2"></input>
            <span class="error"><?= $this->langs->getLang('field_required'); ?></span>
        </div>

        <div id="trip_submit" class="col-md-12 text-left">
            <input type="submit" id="trip_submit_button" class="btn btn-success" value="<?= $this->langs->getLang('submit'); ?>">
            <a href="<?= SERVER_DIRECTORY ?>trip/add/" class="btn btn-secondary"><?= $this->langs->getLang('clear'); ?></a>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            $('#trip_name, #trip_interval, #trip_distance, #trip_points').val('');

            $('#trip_name').on('input', function () {
                var input = $(this);
                var re = /^[a-zA-Z0-9_]+$/;
                var is_name = re.test(input.val());
                if (is_name) {
                    input.removeClass("invalid").addClass("valid");
                } else {
                    input.removeClass("valid").addClass("invalid");
                }
            });

            $('#trip_interval, #trip_distance, #trip_points').on('input', function () {
                var input = $(this);
                var re = /^[0-9_]+$/;
                var is_name = re.test(input.val());
                if (is_name) {
                    input.removeClass("invalid").addClass("valid");
                } else {
                    input.removeClass("valid").addClass("invalid");
                }
            });
        });

        $("#trip_submit_button").click(function (event) {
            var form_data = $("#trip").serializeArray();
            var error_free = true;

            for (var input in form_data) {
                var element = $("#" + form_data[input]['name']);
                var valid = element.hasClass("valid");
                var error_element = $("span", element.parent());
                if (!valid) {
                    error_element.removeClass("error").addClass("error_show");
                    error_free = false;
                } else {
                    error_element.removeClass("error_show").addClass("error");
                }
            }
            if (!error_free) {
                event.preventDefault();
            }
        });
    </script>
<?php } $this->end(); ?>