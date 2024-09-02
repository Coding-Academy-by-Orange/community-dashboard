
<header class="sticky-top">
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg" aria-label="navigation">
        <div class="container-xxl">
            <div class="navbar-brand me-auto me-lg-4">
                <a class="stretched-link" href="{{ route('admin.innovation-hub.dashboard') }}">
                    <img src="https://boosted.orange.com/docs/5.2/assets/brand/orange-logo.svg" width="50"
                         height="50" alt="Boosted - Back to Home" loading="lazy">
                </a>
            </div>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target=".global-header-3" aria-controls="global-header-3.1 global-header-3.2"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="global-header-3.1" class="navbar-collapse collapse me-lg-auto global-header-3">
                <ul class="navbar-nav">
                    <li class=" nav-item"><a href="{{ route('admin.innovation-hub.dashboard') }}"
                                             class="nav-link">Dashboard</a>
                    </li>
                    <li class=" nav-item"><a href="{{ route('admin.innovation-hub.applications') }}" class="nav-link">Manage
                            Applicants</a>
                    </li>
                    <li class=" nav-item ">
                        <a class="nav-link " href="{{route('admin.innovation-hub.activities')}}" role="button"
                            aria-expanded="false">
                            Manage Activities
                        </a>

                    </li>
                </ul>
            </div>
            <div id="global-header-3.2" class="navbar-collapse collapse d-sm-flex global-header-3">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link dropdown-user-link " href="javascript:void(0);"
                           data-bs-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none d-flex flex-row">
                                    <span class="user-name text-capitalize">{{ Auth::guard('admin')->user()->fname }}
                                    </span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-dark pb-0">
                            <a class="dropdown-item " href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off mr-50"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                  class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
