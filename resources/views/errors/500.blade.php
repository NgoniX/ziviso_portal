<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>500 - Error</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/css/components-rounded.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/layout4/css/themes/light.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{ asset('assets/admin/pages/css/error.css')}}" rel="stylesheet" type="text/css"/>
    <link rel='shortcut icon' href="{{ asset('fav.png')}}" type='image/x-icon'/>
</head>
<body class="page-500-full-page">
<div class="row">
    <div class="col-md-12 page-500">
        <div class=" number">
            500
        </div>
        <div class=" details">
            <h3>Oops! Something went wrong.</h3>
            <p>
                We are fixing it!<br/>
                Please come back in a while.<br/><br/>
            </p>
        </div>
    </div>
</div>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script>
    jQuery(document).ready(function () {
        Metronic.init();
    });
</script>
</body>
</html>