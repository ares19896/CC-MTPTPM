<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{!!url('/images/logo.png')!!}" alt="logo" width="50" height="20">

    <title>Hệ thông bán sỉ và lẻ bánh kẹo trực tuyến trực tuyến </title>

    <!-- Bootstrap core CSS -->
    <link href="{!!url('/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{-- <link href="{!!url('/bootstrap/css/ie10-viewport-bug-workaround.css')!!}" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    <link href="{!!url('/front-end/front-end-style.css')!!}" rel="stylesheet">
    <link rel='stylesheet' id='camera-css'  href="{!!url('/css/camera.css')!!}" type='text/css' media='all'>
    <link rel='stylesheet' id='camera-css' href="{!!url('/css/cam-1.css')!!}" type='text/css' media='all'>

    <link href="{!!asset('css/blueimp-gallery.css')!!}" rel="stylesheet">
    <!-- <link rel='stylesheet' id='camera-css'  href='public/css/camera.css' type='text/css' media='all'>  -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    {{-- <script type='text/javascript' src="{!!url('/bootstrap/js/ie-emulation-modes-warning.js')!!}"></script> --}}
    <script type='text/javascript' src="{!!url('/js/ads.js')!!}"></script> 

    <!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBkGb2F20z6IkI0BzzW0OdVv0ScnBJUXpw =false"></script> -->

    <!--Google map-->
    <!--    Chuỗi khai báo lấy tham số của google maps   -->
    <script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?sensor=false&language=vi"></script>
    <script type="text/javascript">
    var map;
    function initialize() {
          var myLatlng = new google.maps.LatLng(<span style="color: #ff0000;">10.8551495</span>,<span style="color: #ff0000;">106.7840824</span>);
          var myOptions = {
        zoom: 16,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("div_id"), myOptions);
      // Biến text chứa nội dung sẽ được hiển thị
    var text;
    text= "<b style='color:#00F' " +
             "style='text-align:center'>CÔNG TY TNHH MyWeb<br />" +
         "<img src='hoangweb-logo.jpg'  /></b>";
       var infowindow = new google.maps.InfoWindow(
        { content: text,
            size: new google.maps.Size(100,50),
            position: myLatlng
        });
           infowindow.open(map);
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title:"Thiết kế web giá rẻ. Uy tín, chất lượng!"
      });
    }
    </script>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <body onLoad="initialize()">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=276997183212584&autoLogAppEvents=1"></script>

    <div id="divAdLeft" style="display: none; position: absolute;  margin-top: 50px;">       
      <a href="http://api.hostinger.vn/redir/1309904" target="_blank"><img src="http://www.hostinger.vn/banners/vn/hostinger-160x600-1.gif" alt="Hosting Miễn Phí" border="0" width="170" height="600" /></a>
    </div>
    <div id="divAdRight" style="display: none; position: absolute;margin-top: 50px">      
      <a href="http://api.hostinger.vn/redir/1309904" target="_blank"><img src="http://www.hostinger.vn/banners/vn/hostinger-160x600-2.gif" alt="Hosting Miễn Phí" border="0" width="170" height="600" /></a>
    </div> 
{{--     <script>       
        document.write("<script type='text/javascript' language='javascript'> MainContentW = 1150;LeftBannerW = 150;RightBannerW = 150;LeftAdjust = 35;RightAdjust = 0;TopAdjust = 5;ShowAdDiv();window.onresize=ShowAdDiv;;<\/script>");      
    </script> --}}
  </head>