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
        <link href="http://cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
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
                <li class="active"><a href="{{ HTTP_ROOT }}/admin">{{ lang.requests }}</a></li>
                <li><a href="#">{{ lang.history }}</a></li> 
                <li><a href="{{ HTTP_ROOT }}/admin/settings">{{ lang.settings }}</a></li>
                <li><a href="{{ HTTP_ROOT }}/admin/logout">{{ lang.logout }}</a></li>
            </ul>
        </div>
    </div>

  <div class="container-fluid center-block">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-header">
                    <h4>{{ lang.heading|raw }}</h4>
                </div>
            </div>
        </div>
      <div class="row">
        <div class="col-md-8">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <div class="col-sm-2">
                <label class="control-label">{{ lang.reason }}</label>
              </div>
              <div class="col-sm-10">
                <input id="aMsg" type="text" class="form-control" value="{{ cfg.reason }}">
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-2">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input id="withEmail" type="checkbox" {% if cfg.email %}checked{% endif %}>{{ lang.withemail }}</label>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-2">
          <button id="resetbtn" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-repeat"></span> {{ lang.resetbtn }}</button>
        </div>
      </div>
      <hr>
        <div class="row">
            <div class="col-xs-12">
                <div id="alert"> </div>
                {% if requests %}
                    <table id="reqTable" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>{{ lang.name }}</th>
                                <th>{{ lang.channel }}</th>
                                <th>{{ lang.email }}</th>
                                <th>{{ lang.note }}</th>
                                <th>{{ lang.time }}</th>
                                <th>{{ lang.action }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for request in requests %}
                                <tr id="trow-{{ request.id }}">
                                    <td class="col-xs-2">{{ request.name }}</td>
                                    <td class="col-xs-2">{{ request.cname }}</td>
                                    <td class="col-xs-2">{{ request.email }}</td>
                                    <td class="col-xs-3">{{ request.note }}</td>
                                    <td class="col-xs-2">{{ request.created_at }}</td>
                                    <td class="col-xs-1">
                                        <div id="abtn-{{ request.id }}" class="btn-group btn-group-xs btn-group-justified">
                                            <a id="abtn-{{ request.id }}-y" data-id="{{ request.id }}" data-atype="y" class="btn btn-default">
                                                <span class="glyphicon glyphicon-ok text-success"></span>
                                            </a>

                                            <a id="abtn-{{ request.id }}-n" data-id="{{ request.id }}" data-atype="n" class="btn btn-default">
                                                <span class="glyphicon glyphicon-remove text-danger"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>

                {% else %}
                    <div class="alert alert-dismissable alert-info">No requests</div>
                {% endif %}
            </div>
        </div>
    </div>

    <hr>

    <!-- Please don't remove the copyrights -->
    <p class="text-center"><small>Ts3Chan Request By <a href="http://www.ahmed90.me">Ahmed90</a></small></p>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ ASSET_ROOT }}/js/jquery.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
    <script src="http://cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>

    <script type="text/javascript"> 

            $(document).ready(function() {
                $('#reqTable').dataTable({
                    "order": [[ 4, "desc" ]]
                });
                $("#resetbtn").click(function() {
                    $("#aMsg").val("{{ cfg.reason }}");
                    $("#withEmail").prop('checked', {{ cfg.email }}) ;
                });
            });


            $("div[id^=\"abtn-\"]").delegate("a", "click", function(event) {

                var id = $(this).data('id');
                var msg = $('#aMsg').val();
                var email = $('#withEmail').is(':checked');
                var action = $(this).data('atype');

                $.ajax({
                        url: "{{ HTTP_ROOT }}/process/updateRequest",
                        type: 'post',
                        dataType: 'text',
                        data: {
                            id: id, 
                            msg: msg,
                            email: email,
                            action: action,
                        },
                    success: function(data) {
                        if (data){
                            console.log(data);

                            $("a[id=abtn-" + id + "-y]").addClass("disabled"); 
                            $("a[id=abtn-" + id + "-n]").addClass("disabled");  

                            if (data == 1) {
                                // $("#alert").html("<div id=\"note\" class=\"alert alert-dismissable alert-success\"> Channel created</div>");
                                $("tr[id=trow-" + id + "]").addClass("success");
                                $("a[id=abtn-" + id + "-n]").hide();
                            } else if (data == 2) {
                                $("tr[id=trow-" + id + "]").addClass("danger");
                                $("a[id=abtn-" + id + "-y]").hide();
                            } else {
                                $("#alert").html("<div id=\"note\" class=\"alert alert-dismissable alert-danger\"> <strong>Error:</strong> " + data + ", Check Your Logs!!</div>");
                            } 
                        
                        } else {
                            alert(data);
                        }
                    }
                });
            }); 


        </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ ASSET_ROOT }}/js/bootstrap.min.js"></script>
  </body>
</html>