<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/app.css">
    <title>@yield( 'tab-title' )</title>
</head>
<body>

    <div class="wrapper">
        <aside>
            <ul>
                <h3> DASHBOARD </h3>
                <div class="list-panel">
                    <a href="#">Customers Order</a>
                    <a href="/admin-account">Admin Account</a>
                    <a href="/template-edit">Template Edit</a>
                    <a href="" class="admin-logged">Admin <i class="fas fa-caret-up"></i>
                        <ul>
                            <li class="admin-logged"  >@yield('admin-logged')</li>
                        </ul>
                    </a>
                    <a href="/admin-logout">Logout</a>
                </div>
            </ul>

        </aside>

        @yield('content')
    </div>

<script>

    const wrapper = document.querySelectorAll('.wrapper');
    const aClicked = document.querySelectorAll('.wrapper .list-panel a');

    Array.from(wrapper).forEach(function(el) {
        el.addEventListener('click', function(obj){
            if( obj.target.tagName == "A" ){
                Array.from(aClicked).forEach(function(aclick){
                    aclick.classList.remove('a-action');
                });
                obj.target.classList.toggle('a-action');
                obj.target.style.color = "#eee";
                obj.target.style.textDecoration = "none";
            }
        });
    });

    const btnAdminLogged = document.querySelector('.wrapper .admin-logged');

    btnAdminLogged.addEventListener('click', function(e){
        e.preventDefault();
        this.querySelector('ul').classList.toggle('show-admin-logged');
        this.style.color = "#eee";
        this.style.textDecoration = "none";
        this.querySelector('i').classList.toggle('rotate-caret-i');
    });


    const td = document.querySelector('table tbody td');


    td.addEventListener('click', function(el){
        el.target.tagName = "input";
        // console.log(el);
    });

</script>
</body>
</html>