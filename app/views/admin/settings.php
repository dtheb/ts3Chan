<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ cfg.title }}</title>

        <!-- Bootstrap -->
        <link href="{{ ASSET_ROOT }}/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ ASSET_ROOT }}/css/bootstrap.lumen.min.css" rel="stylesheet">        
        <link href="{{ ASSET_ROOT }}/css/style.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
  <body>

    <div class="navbar navbar-default navbar-static-top">

        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ HTTP_ROOT }}/home">{{ cfg.title }}</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ HTTP_ROOT }}/admin">{{ lang.requests }}</a></li>
                <li><a href="#">{{ lang.history }}</a></li>          
                <li class="active"><a href="{{ HTTP_ROOT }}/admin/settings">{{ lang.settings }}</a></li>
                <li><a href="{{ HTTP_ROOT }}/admin/logout">{{ lang.logout }}</a></li>
            </ul>
        </div>
    </div>

  <div class="container-fluid center-block">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                    <h4>{{ lang.heading }}</h4>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">

                {% if noMatch %}
                    <div class="alert alert-dismissable alert-warning">{{ lang.noMatchMsg }}</div>
                {% elseif changed %} 
                    <div class="alert alert-dismissable alert-success">{{ lang.changedMsg }}</div>
                {% elseif fields %} 
                    <div class="alert alert-dismissable alert-warning">{{ lang.fields }}</div>
                {% elseif failed %} 
                    <div class="alert alert-dismissable alert-danger">{{ lang.failed }}</div>
                {% endif %}

                <form role="form" method="POST" action="{{ HTTP_ROOT }}/process/passChange">
                    <div class="form-group">
                        <label class="control-label">{{ lang.oldPass }}</label>
                        <input class="form-control" name="oldpass" type="password">
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{ lang.newPass }}</label>
                        <input class="form-control" name="newpass" type="password">
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{ lang.newPassAgain }}</label>
                        <input class="form-control" name="newpass2" type="password">
                    </div>
                        <button type="submit" class="btn btn-block btn-primary">{{ lang.change }}</button>
                </form>
            </div>
        </div>
    </div>

    <hr>

    <!-- Please don't remove the copyrights -->
    <p class="text-center"><small>Ts3Chan Request By <a href="http://www.ahmed90.me">Ahmed90</a></small></p>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ ASSET_ROOT }}/js/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ ASSET_ROOT }}/js/bootstrap.min.js"></script>
  </body>
</html>