<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? '你還沒有設標題喔' ?></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <style>
        .pageLink ul {
            margin: 10px 0;
        }

        .card-title {
            overflow: hidden;
            /* white-space: nowrap; */

            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        .card-text {
            overflow: hidden;
            /* white-space: nowrap; */

            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .card-content {
            height: 100px;
        }

        .goTop {
            width: 50px;
            height: 50px;
            line-height: 50px;
            border-radius: 50%;
            background-color: #B3E38B;
            line-height: 50px;
            text-align: center;
            position: fixed;
            bottom: 20px;
            right: 25px;
            color: #fef;
            text-shadow: 0.1em 0.1em 0.2em black;
        }
    </style>
</head>

<body>