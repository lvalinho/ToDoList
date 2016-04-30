<html>
    <head>
        <title>ToDoList - @yield('title')</title>

        <link rel="stylesheet" type="text/css" href="/vendor/semantic/semantic.min.css">
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/semantic/semantic.js"></script>

    </head>
    <body>
        <div class="ui fixed inverted menu">
            <div class="ui container">
              <a href="/home" class="header item">
                ToDoList 
              </a>
              @if (isset($username))
                <a href="/home#addNewTasksSection" class=" item">
                  Add New Task 
                </a>
                <div class="ui simple dropdown item">
                  {{ $username}} <i class="dropdown icon"></i>
                  <div class="menu">
                    <a class="item" href="/auth/logout">Logout</a>
                  </div>
                </div>
              @else
              <a class="item" href="/auth/register">New User</a>
              @endif
            </div>
          </div>
          <div style="margin-top: 100px;">
              <div class="ui main text container">
                    @yield('content')
              </div>
          </div>
    </body>
</html>