  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">
          @if (Auth::user()->role == 'superadmin')
              <li class="nav-item">
                  <a class="nav-link  {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="{{ url('dashboard') }}">
                      <i class="bi bi-grid"></i>
                      <span>Dashboard</span>
                  </a>
              </li><!-- End Dashboard Nav -->
          @endif


          @if (Auth::user()->role == 'moderator' || Auth::user()->role == 'superadmin')
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('addvisitor') ? '' : 'collapsed' }}" href="{{ url('addvisitor') }}">
                      <i class="bi bi-journal-text"></i><span>Add Visitor</span>
                  </a>
              </li><!-- End Forms Nav -->


              <li class="nav-item">
                  <a class="nav-link  {{ Request::is('upload-excel') ? '' : 'collapsed' }}"
                      href="{{ url('upload-excel') }}">
                      <i class="bi bi-filetype-csv"></i>
                      <span>Upload Excel</span>
                  </a>
              </li><!-- End Profile Page Nav -->
          @endif

          @if (Auth::user()->role == 'user' || Auth::user()->role == 'superadmin')
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('current-guest') ? '' : 'collapsed' }}"
                      href="{{ url('current-guest') }}">
                      <i class="bi bi-people"></i>
                      <span>Current Guests</span>
                  </a>
              </li><!-- End Profile Page Nav -->
          @endif


          @if (Auth::user()->role == 'superadmin')
              <li class="nav-item">
                  <a class="nav-link  {{ Request::is('visit-history') ? '' : 'collapsed' }}"
                      href="{{ url('visit-history') }}">
                      <i class="bi bi-clock"></i>
                      <span>Visiting History</span>
                  </a>
              </li><!-- End Profile Page Nav -->


              <li class="nav-item">
                  <a class="nav-link  {{ Request::is('all-visitors') ? '' : 'collapsed' }}"
                      href="{{ url('all-visitors') }}">
                      <i class="bi bi-person"></i>
                      <span>All Visitors</span>
                  </a>
              </li><!-- End Profile Page Nav -->
          @endif

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('clear') }}">
                  <i class="bi bi-trash"></i>
                  <span>Clear Cache</span>
              </a>
          </li><!-- End Profile Page Nav -->


          <li class="nav-item text-danger">
              <a class="nav-link collapsed" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                  <i class="bi bi-box-arrow-in-right text-danger"></i>
                  <span class="text-danger">Logout</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </li><!-- End Login Page Nav -->


      </ul>

  </aside><!-- End Sidebar-->
