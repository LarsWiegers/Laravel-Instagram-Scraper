<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css" type="text/css">
        <title>Instagram Scraper</title>

    </head>
    <body>
    <div class="container home">
        <div class="panel panel-default">
            <div class="panel-heading">Instagram scraper</div>

            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('search') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="account-name" class="col-md-4 control-label">Account name</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="account-name" required autofocus>

                            @if ($errors->has('title'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('account-title') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>
