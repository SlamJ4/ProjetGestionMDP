<!DOCTYPE html>
<html>

<head>
    <title>TopLock</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="icon" href="pictures/Icon/clairlock16px.png" type="image/x-icon">
    <link rel="stylesheet" href="css/acceuil.css" />

    <script type="text/javascript" language="javascript">
        let img = document.querySelector('img');
        let start = img.src;
        let hover = img.getAttribute('data-hover'); //specified in img tag
        img.onmouseover = () => { img.src = hover; }
        img.onmouseout = () => { img.src = start; } //to revert back to start
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">TopLock</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" role="button">Items</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Github</a>
                    <a class="dropdown-item" href="#">Youtube</a>
                    <a class="dropdown-item" href="#">Mail</a>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link " href="#">Add Password</a></li>
            <li class="nav-item"><a class="nav-link " href="#">
                    <div class="logo-image">
                        <img title="Modify theme" src="images/imgacceuil/Theme/sunriseclair24px.png"
                            onmouseover="this.src='images/imgacceuil/Theme/sunrisefull24px.png'"
                            onmouseout="this.src='images/imgacceuil/Theme/sunriseclair24px.png'" class="img-fluid" />
                    </div>
                </a></li>
        </ul>

        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Password"
                aria-label="Search Password">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <div class='bottom-right'>
        <button class="btn"><img title="Have an idea !" src="images/imgacceuil/Idea/bulbclair24px.png"
                onmouseover="this.src='images/imgacceuil/Idea/bulbfull24px.png'"
                onmouseout="this.src='images/imgacceuil/Idea/bulbclair24px.png'" />
        </button>
    </div>
</body>

</html>