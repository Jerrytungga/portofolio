  <header class="pb-3 mb-4 ">
    <a href="#" class="d-flex align-items-center text-dark text-decoration-none">

      <span class="fs-4">JR Developer </span>
    </a>
    <hr size="12px">
  </header>





  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <style>
    body {
      background-color: #DAE5D0;
    }

    span {
      color: #2A2550;
      font-weight: 900;
      text-shadow: #fff;
    }

    hr {
      color: #464E2E;
    }

    .scrol {
      overflow: scroll;
    }

    .stylefont {
      color: #464E2E;
      font-size: 20px;
      font-weight: 600;
      text-decoration: none;
    }

    .stylefont:hover {
      color: #362706;

    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    .colom {
      width: 200px;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }



    table {
      width: 100%;
      table-layout: fixed;
    }

    .tbl-header {
      background-color: rgba(255, 255, 255, 0.3);
      margin-left: 10px;
      margin-right: 10px;
    }

    .tbl-content {
      height: 400px;
      overflow-x: auto;
      margin-top: 0px;
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .active {
      background: #EEEEEE;
      border-radius: 20px;
    }

    body {
      background-color: #DAE5D0;
    }

    .hv {
      border-radius: 4px;
      background: #fff;
      box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
      transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
      cursor: pointer;
    }

    .hv:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }

    .modalcolor {
      background-color: #DAE5D0;
    }

    .font {
      font-size: small;
      font-family: Arial, Helvetica, sans-serif;
      text-decoration: none;
      color: #2A2550;

    }
  </style>

  <header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills-danger">
      <li class="nav-item"><a href="index.php" class="nav-link  <?php if ($page == 'Beranda') {
                                                                  echo 'active';
                                                                } ?> stylefont">Beranda</a></li>
      <li class="nav-item"><a href="artikel.php" class="nav-link <?php if ($page == 'Artikel') {
                                                                    echo 'active';
                                                                  } ?> stylefont">Artikel</a></li>
      <li class="nav-item">
        <a href="proyek.php" class="nav-link
         <?php if ($page == 'Proyek') {
            echo 'active';
          } ?> stylefont">Proyek</a>
      </li>
      <li class="nav-item"><a href="#" class="nav-link stylefont">Pesan Email</a></li>
      <li class="nav-item"><a href="../logout.php" class="nav-link stylefont">Keluar</a></li>
    </ul>
  </header>