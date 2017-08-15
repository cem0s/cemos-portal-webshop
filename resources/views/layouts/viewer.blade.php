
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>360 Viewer</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/viewer/style.css')}}"> 

    <script type="text/javascript" src="{{asset('js/viewer/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/viewer/three.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/viewer/threex.stereoeffect.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/viewer/threex.deviceorientationcontrols.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/viewer/threex.orbitcontrols.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/viewer/threex.detector.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/viewer/threex.fullscreen.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/viewer/threex.windowresize.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/viewer/threex.videotexture.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/viewer/threex.canvasrenderer.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/viewer/threex.projector.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/viewer/360.min.js')}}"></script>
    
    @yield('add-scripts')
  </head>
  <body>
        @yield('content')
 

  </body>
   
</html>

  

    
  

    