      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item <?= $aktif=='dosen' ? 'active' : '' ?>">
          <a class="nav-link" href="<?= base_url('dosen')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown <?= $aktif=='dosen' ? 'active' : '' ?>">
          <a class="nav-link dropdown-toggle" href="<?=base_url('dosen/materi')?>" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Setup</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('dosen/add') ?>">Add Materi</a>
            <a class="dropdown-item" href="<?= base_url('dosen/materi') ?>">List Materi</a>
          </div>
        </li>
      </ul>