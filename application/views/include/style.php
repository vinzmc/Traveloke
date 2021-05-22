<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<style>
    html,
    body {
        height: 100%;
    }

    footer {
        position: static;
        padding: 15px;
        width: 100%;
        height: 60px;
        margin-bottom: 0;
        text-align: center;
        background: #777;
        color: white;
    }

    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .navmargin {
        margin-top: 54px;
    }

    .box {
        display: flex;
        flex-flow: column;
        height: 100vh;
    }

    .box .content {
        flex: 1 1 auto;
    }

    .about-section {
        padding: 60px;
        background-color: #d3ccbf;
        color: white;
    }

    .about-text {
        text-align: center;
    }

    .circle-image {
        text-align: center;
    }

    .flex-container {
        display: flex;
    }

    .flex-container1 {
        padding: 10px;
        width: 650px;
        height: auto;
    }

    .flex-container2 {
        padding: 10px;
        width: 1253px;
        height: auto;
    }

    :root {
        --input-padding-x: 1.5rem;
        --input-padding-y: .75rem;
    }

    .card-signin {
        border: 0;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem;
    }

    .card-signin .card-body {
        padding: 2rem;
    }

    .form-signin {
        width: 100%;
    }

    .form-signin .btn {
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s;
    }

    .form-label-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .form-label-group input {
        height: auto;
        border-radius: 2rem;
    }

    .form-label-group>input,
    .form-label-group>label {
        padding: var(--input-padding-y) var(--input-padding-x);
    }

    .form-label-group>label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
        color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-moz-placeholder {
        color: transparent;
    }

    .form-label-group input::placeholder {
        color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
        padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
        padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown)~label {
        padding-top: calc(var(--input-padding-y) / 3);
        padding-bottom: calc(var(--input-padding-y) / 3);
        font-size: 12px;
        color: #777;
    }

    .btn-google {
        color: white;
        background-color: #ea4335;
    }

    .btn-facebook {
        color: white;
        background-color: #3b5998;
    }

    /* Fallback for Edge
-------------------------------------------------- */

    @supports (-ms-ime-align: auto) {
        .form-label-group>label {
            display: none;
        }

        .form-label-group input::-ms-input-placeholder {
            color: #777;
        }
    }

    /* Fallback for IE
-------------------------------------------------- */

    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
        .form-label-group>label {
            display: none;
        }

        .form-label-group input:-ms-input-placeholder {
            color: #777;
        }
    }

    .row.heading h2 {
        color: #fff;
        font-size: 52.52px;
        line-height: 95px;
        font-weight: 400;
        text-align: center;
        margin: 0 0 40px;
        padding-bottom: 20px;
        text-transform: uppercase;
    }

    .heading.heading-icon {
        display: block;
    }

    .practice-area.padding-lg {
        padding-bottom: 55px;
        padding-top: 55px;
    }

    .practice-area .inner {
        border: 1px solid #999999;
        text-align: center;
        margin-bottom: 28px;
        padding: 40px 25px;
    }

    .our-webcoderskull .cnt-block:hover {
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        border: 0;
    }

    .practice-area .inner h3 {
        color: #3c3c3c;
        font-size: 24px;
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
        padding: 10px 0;
    }

    .practice-area .inner p {
        font-size: 14px;
        line-height: 22px;
        font-weight: 400;
    }

    .practice-area .inner img {
        display: inline-block;
    }


    .our-webcoderskull {
        background-color: #d3ccbf;

    }

    .our-webcoderskull .cnt-block {
        float: left;
        width: 100%;
        background: #fff;
        padding: 30px 20px;
        text-align: center;
        border: 2px solid #d5d5d5;
        margin: 0 0 28px;
    }

    .our-webcoderskull .cnt-block figure {
        width: 148px;
        height: 148px;
        border-radius: 100%;
        display: inline-block;
        margin-bottom: 15px;
    }

    .our-webcoderskull .cnt-block img {
        width: 148px;
        height: 148px;
        border-radius: 100%;
    }

    .our-webcoderskull .cnt-block h3 {
        color: #2a2a2a;
        font-size: 20px;
        font-weight: 500;
        padding: 6px 0;
        text-transform: uppercase;
    }

    .our-webcoderskull .cnt-block h3 a {
        text-decoration: none;
        color: #2a2a2a;
    }

    .our-webcoderskull .cnt-block h3 a:hover {
        color: #337ab7;
    }

    .our-webcoderskull .cnt-block p {
        color: #2a2a2a;
        font-size: 13px;
        line-height: 20px;
        font-weight: 400;
    }

    .our-webcoderskull .cnt-block .follow-us {
        margin: 20px 0 0;
    }

    .our-webcoderskull .cnt-block .follow-us li {
        display: inline-block;
        width: auto;
        margin: 0 5px;
    }

    .our-webcoderskull .cnt-block .follow-us li .fa {
        font-size: 24px;
        color: #767676;
    }

    .our-webcoderskull .cnt-block .follow-us li .fa:hover {
        color: #025a8e;
    }
</style>