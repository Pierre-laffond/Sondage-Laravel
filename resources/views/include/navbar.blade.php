


    @if(!session()->has('vouter'))

<nav class="navbar navbar-expand-sm bg-dark navbar-dark  justify-content-between">
    <!-- Brand -->
    <a class="navbar-brand " href="#">Survey</a>

    <!-- Links -->
    <ul class="navbar-nav ">
        <li class="nav-item ">
            <a class="nav-link" href="/">Home</a>
        </li>


        <!-- Dropdown -->
        <li class="nav-item dropdown  ">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
               Actions
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="surveys">Surveys</a>
                <a class="dropdown-item" href="signin">Inscription</a>
                <a class="dropdown-item" href="login">Connexion</a>
            </div>
        </li>
    </ul>
</nav>




@else

<nav class="navbar navbar-expand-sm bg-dark navbar-dark  justify-content-between">
    <!-- Brand -->
    <a class="navbar-brand " href="#">Survey</a>

    <!-- Links -->
    <ul class="navbar-nav ">
        <li class="nav-item ">
            <a class="nav-link" href="profile">Profil</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="results">Resultats</a>
        </li>


        <!-- Dropdown -->
        <li class="nav-item  ">

                <a class="nav-link" href="logout">Deconnexion</a>

        </li>
    </ul>
</nav>
@endif