<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="{!!asset('css/bootstrap.min.css')!!}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/admin.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/admin-skins.css')}}">
  <link rel="stylesheet" href="{{asset('summernote/summernote.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
  @yield('style')
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="{{asset('js/jquery.min.js')}}"></script>
</head>
<body class="sidebar-mini skin-blue-light">
<div class="wrapper">
  @include('admin.master.header')
  @include('admin.master.sidebar')

  <div class="content-wrapper">
    @yield('content')
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Developed By- </b> <a href="https:///fb.com/romi.mitu" target="_blank">RoMi</a>
    </div>
    <strong>Copyright &copy;</strong> All rights reserved.
  </footer>

</div>
<!-- jQuery 3 -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('admin/js/admin.min.js')}}"></script>
<script src="{{asset('admin/js/select2.full.min.js')}}"></script>
<script src="{{asset('summernote/summernote.min.js')}}"></script>
<script>
  $(document).ready(function () {
      $('textarea').summernote({
          height: 200,
          toolbar: [
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['fontsize', ['fontsize', 'fontname']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['Insert', ['picture', 'link', 'table','video']],
          ]
      });
  });

  $(function () {
      $(".datepicker").datepicker({
          changeYear: true,
          changeMonth: true,
          yearRange: '2000:2050',
          dateFormat: 'yy-mm-dd'
      }).datepicker("setDate", new Date());
  });
  function sumColumnValue(index) {
        var total = 0;
        $("table #tbody td:nth-child(" + index + ")").each(function () {
            total += parseFloat($(this).find('input').val(), 10) || 0;
        });
        return total.toFixed(0);
    }
</script>
@yield('script')
<script>
  $("#flowcheckall").click(function () {
    $(this).closest('div').find('.name').prop('checked', this.checked);
  });
  $( document ).ready(function() {
    var url = window.location.pathname.replace(/^\/([^\/]*).*$/, '$1');
    //console.log(window.location.pathname.replace(/^\/([^\/]*).*$/, '$1'));
    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
        return $(this).attr('href').replace(/^\/([^\/]*).*$/, '$1') != url;
    }).parent().removeClass('active');

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
        return $(this).attr('href').replace(/^\/([^\/]*).*$/, '$1') == url;
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
        return $(this).attr('href').replace(/^\/([^\/]*).*$/, '$1') == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
  });
</script>

</body>
</html>
