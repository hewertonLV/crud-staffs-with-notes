<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Colaboradores</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('ColaboradorShow')}}">Colaborador</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('CargoShow')}}">Cargo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('CargoColaboradorShow')}}">Desempenho</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Relatorios
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="{{route('ReportColaboradorShow')}}">Colaborador</a></li>
                        <li><a class="dropdown-item" href="{{route('ColaboradorByUnit')}}">Colaborador por Unidade</a></li>
                        <li><a class="dropdown-item" href="{{route('rakingColaborador')}}">Ranking Colaborador</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>
