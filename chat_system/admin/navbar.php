<nav class="navbar navbar-default "
    style="height: 70px; align-content: center; display: block;  background-color: rgb(235, 235, 235);">
    <div class="container-fluid" style=" align-items: center; justify-content: space-around !important; ">
        <ul class="nav navbar-nav">
            <li><a href="/Yskah-new-main/admin.php"><span class="glyphicon glyphicon-home"></span> Home</a>
            </li>
            <li><a href="index.php"><span class="glyphicon glyphicon-list"></span> Chat Rooms</a></li>
            <li><a href="user.php"><span class="glyphicon glyphicon-user"></span> Users</a></li>

        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="#account" data-toggle="modal"><span class="glyphicon glyphicon-lock"></span>
                    <?php echo $user; ?></a></li>

        </ul>
    </div>
</nav>