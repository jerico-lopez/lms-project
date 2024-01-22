<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="font-size: larger; height:90px;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color: #6EA8FE; font-weight:700; margin-left:20px;">LMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('teacher_home') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('teacher_addcourse') ?>">Add Course</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="navbar-collapse" style="margin-right: 50px;">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?=base_url()?>uploads/teachers/<?= session()->get('image') ?>" alt="Profile Picture" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
          <?= session()->get('teacherFullName') ?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="<?= base_url('teacher/upload/photo') ?>">Upload Photo</a></li>
          <li><a class="dropdown-item" href="<?= base_url('teacher/edit/profile') ?>">Edit Profile</a></li>
          <li><a class="dropdown-item" href="<?= base_url('teacher/confirm/logout') ?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>