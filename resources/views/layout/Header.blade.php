<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                </li>
                @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="/viewproduct">View Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/managecategory">Manage Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/managecompany">Manage Company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/managedata">Manage Data</a>
                </li>

                <li class="nav-item">
                    <p class="nav-link">Welcome {{ Auth::user()->name }}</p>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>

                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Registration</a>
                </li>

                @endif




            </ul>
        </div>
    </nav>
</header>