<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite([
    'resources/css/admin/styles.min.css',
    'resources/js/app.js',
    'resources/js/admin/app.min.js',
    'resources/js/admin/dashboard.js',
    'resources/js/admin/sidebarmenu.js'
    ])
</head>
<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <x-admin-sidebar />
      <div class="body-wrapper">
        <x-admin-navbar />
    <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">@yield('admin_page_title')</h5>
            <p class="mb-0">@yield('admin_area') </p>
          </div>
        </div>
      </div>
    </div>
    </div>
</body>
</html>


