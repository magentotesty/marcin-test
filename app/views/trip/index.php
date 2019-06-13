<?php $this->start('body'); ?>
<style>
    #calculate_info {
        font-size: medium;
        font-weight: bold;
        padding: 50px;
    }

    #calculate_max_speed_info {
        font-size: large;
        font-weight: bold;
        padding: 30px;
    }
</style>

<table id="trips" class="display">
    <thead>
        <tr>
            <th><?= $this->langs->getLang('trip_id'); ?></th>
            <th><?= $this->langs->getLang('name'); ?></th>
            <th><?= $this->langs->getLang('measure_interval'); ?></th>  
            <th><?= $this->langs->getLang('distance'); ?></th>
            <th><?= $this->langs->getLang('calculate'); ?></th>
            <th><?= $this->langs->getLang('delete'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->tripsData as $trip): ?>
            <tr>
                <td><?= $trip->id; ?></td>
                <td><?= $trip->name; ?></td>
                <td><?= $trip->measure_interval; ?></td>
                <td><?= $trip->distance; ?></td>
                <td>
                    <form class="form" action="<?= SERVER_DIRECTORY ?>trip/calculate" method="post">
                        <input id="trip" name="trip" type="hidden" value=<?= $trip->id; ?>>
                        <input type="submit" value="<?= $this->langs->getLang('calculate'); ?>" class="btn btn-primary">
                    </form>
                </td>
                <td>
                    <form class="form" action="<?= SERVER_DIRECTORY ?>trip/delete" method="post">
                        <input id="trip" name="trip" type="hidden" value=<?= $trip->id; ?>>
                        <input type="submit" value="<?= $this->langs->getLang('delete'); ?>" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $('#trips').DataTable();
</script>

<?php if (isset($this->incorrectData)) { ?>
    <div id="calculate_info" class="col-md-12 text-center"> 
        <?= $this->langs->getLang('measuring_one_or_less'); ?>
    </div>
<?php } ?>

<?php if (isset($this->tripId)) { ?>
    <div id="calculate_info" class="col-md-12 text-center"> 
        <?= $this->langs->getLang('calculation_example_for_id'); ?> <?= $this->tripId; ?>
    </div>
    <div id="calculate_info" class="col-md-12 text-center"> 
        <?= $this->langs->getLang('s'); ?> <b><?= $this->measureInterval; ?>
    </div>
    <div id="calculate_info" class="col-md-12 text-center"> 
        <table class="table table-striped table-condensed table-bordered">
            <thead>
            <th><?= $this->langs->getLang('distance'); ?></th>
            </thead>
            <tbody>
                <?php foreach ($this->distances as $distance): ?>
                    <tr>
                        <td><?= $distance->distance; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
    <div id="calculate_info" class="col-md-12 text-center"> 
        <table class="table table-striped table-condensed table-bordered ">
            <thead>
            <th><?= $this->langs->getLang('displacement'); ?></th>
            </thead>
            <tbody>
                <?php foreach ($this->displacements as $displacement): ?>
                    <tr>
                        <td><?= $displacement; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="calculate_info" class="col-md-12 text-center"> 
        <table class="table table-striped table-condensed table-bordered ">
            <thead>
            <th><?= $this->langs->getLang('avg_speed'); ?></th>
            </thead>
            <tbody>
                <?php foreach ($this->averageHourlySpeed as $averageSpeed): ?>
                    <tr>
                        <td><?= $averageSpeed; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="calculate_max_speed_info" class="col-md-12 text-center"> 
        <?= $this->langs->getLang('max_avg_speed'); ?> 
        <p><?= $this->maxAverageHourlySpeed; ?></p>
    </div>
<?php } $this->end(); ?>