<?php $this->start('body'); ?>
<table id="trips" class="display">
    <thead>
    <tr>
        <th><?=$this->langs->getLang('trip');?></th>
        <th><?=$this->langs->getLang('distance');?></th>
        <th><?=$this->langs->getLang('measure_interval');?></th>
        <th><?=$this->langs->getLang('avg_speed');?></th>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach($this->results as $result): ?>
        <tr>
            <td><?= $result['name'];?></td>
            <td><?= $result['distance'];?></td>
            <td><?= $result['measure_interval'];?></td>
            <td><?= $result['avg_speed'];?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $('#trips').DataTable();
</script>
<?php $this->end(); ?>