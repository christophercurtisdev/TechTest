<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>telisted or blacklisted 
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    ConnexOne Tech Test
                </div>

                <div class="links">
                    <h4>
                       The structure of this backend is as follows. A microservice model is created. Rule models are then created to satisfy
                       the criteria of the correct payload hitting that microservice. The payload itself is stored as a model for each key value
                       pair in the JSON. Sub-objects inside the payload are defined by 'outerkey:innerkey' in the table. The frontend implementation
                       would be ideally in Vue.js with Laravel API serving the data to this. A number of service classes have also been created
                       in order to keep the controllers clean and manipulate the data prior to hitting them.<br><br>The rule table is defined by
                       the key, the value, and whether or not that pair is whitelisted or blacklisted for the given microservice. This is to allow
                       easy updates to rules and if need be, more microservices.<br><br>The payload is decoded and then stored to allow easier
                       manipulation of the data (decoding and reconstructing in the service class to got to and from array to JSON object). This is
                       as opposed to storing as a JSON blob - either would be functional, however querying each rule is possible with 1 query this way
                       rather than decoding on the fly and looping everytime when data was retreived.<br><br>I decided to omit the front-end because of
                       the time restraint as well as some functionality and the priority was showing the direction that the backend logic would take.<br>
                       <br>Thank you for your consideration - I look forward to hearing from you.
                    </h4>
                </div>
            </div>
        </div>
    </body>
</html>
