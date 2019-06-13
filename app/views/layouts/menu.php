<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= SERVER_DIRECTORY ?>home"><?= $this->langs->getLang('home'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= SERVER_DIRECTORY ?>trip/add"><?= $this->langs->getLang('add_trip'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= SERVER_DIRECTORY ?>trip"><?= $this->langs->getLang('calculate_trip'); ?></a>
            </li>
        </ul>
    </div>
</nav>