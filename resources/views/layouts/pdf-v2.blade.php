<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        body{
            border: 1px solid black;
            font-family: Arial, Helvetica, sans-serif;
        }

        h1, h2, h4, h5, h6{
            font-family: Arial, Helvetica, sans-serif;
        }

        h3{
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        table{
            border-collapse: collapse;
            font-family: Arial, Helvetica, sans-serif;
            font-size:11pt;
        }

        table, td, th {
            border: 1px solid black;
            font-family: Arial, Helvetica, sans-serif;
            font-size:11pt;
            width: 100%;
        }

        /*#paper{
            margin: auto;
            border: 1px solid black;
        }*/
        #content p{
            font-family: Arial, Helvetica, sans-serif;

            font-size:12pt;
        }

        #logo{
            margin: auto;
            width: 60%;
            height: 100px;
            display:flex;
            font-family: Arial, Helvetica, sans-serif;
        }   

        #id_date{
            float:right;
            margin-right: 10px;
        }

        #content{
            float:left;
            margin-left: 10px;
            clear: both;
        }

        #tables{
            clear: both;
            margin-left:25px;
            margin-right: 10px;
            width: 90%;
            height: auto;
       }

        #sign{
            margin-right: 10px;
            float:right;
        }

        #sign1{
            margin-left: 10px;
            clear: both;
            float:left;
        }
        #accept h3{
            clear: both;
            border: 2px solid black;
        }

        #accept p{
            clear: both;
            float:left;
            margin-left: 10px;
       }
    </style>
</head>

<body>
    @yield('content')
</body>
</html>
