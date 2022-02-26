<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Information</title>

    <!-- CSS -->
    <style>
    * {
        box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .mainContainer {
        margin: 20px 20% auto 20%;
        border-radius: 5px;
        border-style: solid;
        border-color: green;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide,
        make the two columns stack on top of each other instead of next
        to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
    </style>
</head>

<body>
    <div class="mainContainer">
        <h1 style="text-align:center;"> Add medicine Information </h1>
        <!-- The autocomplete feature can be swtiched on or off for the whole
        form or for individual fields. -->
        <form action="{{ route ('medicine.store') }}" method="post">
            @csrf
            <label for="name">Name: &nbsp;</label>
            <input type="text" id="name" name="name" value=""><br><br>

            <label for="code">CODE: &nbsp;</label>
            <input type="text" id="code" name="code" value=""><br><br>
            <label for="comp">company: &nbsp;</label>
            <select id="dropdown" name="comp">
                @foreach($Plane as $Plane)
                <option value="{{$Plane->id}}">
                    {{$Plane->name}}
                </option>
                @endforeach
            </select><br><br>





            <input type="submit" value="Save">
        </form>
    </div>
</body>