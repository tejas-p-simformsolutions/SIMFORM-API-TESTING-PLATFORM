<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMFORM API TESTING PLATFORM</title>
    <link rel="icon" type="image/x-icon" href="demo/../public/images/logo.png">
    <link rel="stylesheet" href="demo/../public/css/style.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="card">
        <form class="form-http-request" id="http-request-form" method="POST">
            <div class="card-header text-center">
                <strong>SIMFORM API TESTING PLATFORM</strong>
            </div>
            <div class="card-body">
                <div class="alert alert-danger d-none" id="error"></div>
                <div class="card">
                    <div class="card-header request">
                        <strong>Request</strong>
                    </div>
                    <div class="card-body card-section">
                        <div class="row">
                            <div class="col-sm-2">
                                <select name="method" class="form-control form-selection" id="method">
                                    <option disabled>Request Method</option>
                                    <option value="GET" selected>GET</option>
                                    <option value="POST">POST</option>
                                    <option value="PATCH">PATCH</option>
                                    <option value="DELETE">DELETE</option>
                                    <option value="PUT">PUT</option>
                                    <option value="OPTIONS">OPTIONS</option>
                                </select>
                            </div>
                            <div class="col-sm-8">
                                <input type="url" placeholder="Enter request URL" class="form-control" name="url" required autofocus />
                            </div>

                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary" id="send-request">Send </button>
                                <button type="button" class="btn btn-danger" id="cancel-request">Cancel</button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <div class="card-header request">
                                    <strong>Request Body</strong>
                                </div>
                                <textarea rows="6" class="form-control form-textarea" placeholder="Request a payload in JSON format" style="resize: vertical" name="body"></textarea>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-header request">
                                    <strong>Request Header</strong>
                                </div>
                                <textarea rows="6" class="form-control form-textarea" placeholder="Request headers in JSON format" style="resize: vertical" name="headers"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header response">
                                <strong>Response</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card" style="min-height: 100px; max-height: 300px; overflow-y:auto;">
                                            <div class="card-header response">
                                                <strong>Response Body</strong>
                                            </div>
                                            <div class="card-body">
                                                <img src="demo/../public/images/loading.gif" alt="Not Found" height='100px' width='100px' class="image">
                                                <pre id="code-output">
                                                </pre>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card" style="min-height: 100px; max-height: 300px; overflow-y:auto;">
                                            <div class="card-header response">
                                                <strong>Response Headers</strong>
                                            </div>
                                            <div class="card-body">
                                                <img src="demo/../public/images/loading.gif" alt="Not Found" height='100px' width='100px' class="image">
                                                <pre id="header-output">
                                               </pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <script src="./public/js/app.js"></script>
    <script>
        var viewVars = {
            url: window.location.href.replace('index.php', '') + 'request.php'
        };
        jQuery(document).ready(function() {
            $('.image').hide();
            App.init();
        });
    </script>
</body>

</html>