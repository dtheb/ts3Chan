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
        </div>
    </div>

  <div class="container-fluid center-block">

      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
              <h4>{{ lang.heading|raw }}</h4>
          </div>

          <div class="col-xs-6 col-xs-offset-3">

              {% if success %}
                  <div class="alert alert-dismissable alert-success">{{ lang.success_a|raw }}</div>
              {% elseif error %}
                  <div class="alert alert-dismissable alert-danger">
                      {% if error.type == 'field' %}
                          {{ lang.error_field|raw }}
                      {% elseif error.type == 'limit' %}
                          {{ lang.error_limit|raw }}
                      {% endif %}
                  </div>
              {% endif %}

            <form role="form" method="POST" action="{{ HTTP_ROOT }}/process/newRequest">
              <div class="form-group {% if error and not input.email %}has-error{% endif %}">
                <label class="control-label" for="email">{{ lang.email }}</label>
                <input class="form-control" id="email" name="email" 
                placeholder="{{ lang.email_ph }}" type="email" value="{{ input.email|default('') }}"
                {% if success %} disabled {% endif %}>
              </div>
              <div class="form-group {% if error and not input.name %}has-error{% endif %}">
                <label class="control-label" for="name">{{ lang.name }}</label>
                <input class="form-control" id="name" name="name" 
                placeholder="{{ lang.name_ph }}" type="text" value="{{ input.name|default('') }}"
                {% if success %} disabled {% endif %}> 
              </div>
              <div class="form-group {% if error and not input.cname %}has-error{% endif %}">
                <label class="control-label" for="cname">{{ lang.cname }}</label>
                <input class="form-control" id="cname" name="cname" 
                placeholder="{{ lang.cname_ph }}" type="text" value="{{ input.cname|default('') }}"
                {% if success %} disabled {% endif %}>
              </div>
              <div class="form-group">
                <label class="control-label" for="note">{{ lang.note }}</label>
                <textarea class="form-control" id="note" name="note" 
                placeholder="{{ lang.note_ph }}" type="text" maxlength="250"
                {% if success %} disabled {% endif %}>{{ input.note|default('') }}</textarea> 
              </div>
              <button type="submit" class="btn btn-primary" {% if success %} disabled {% endif %}>{{ lang.submit }}</button>
            </form>
          </div>
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