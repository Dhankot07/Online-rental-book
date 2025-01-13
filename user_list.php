<form?php include('config.php'); ?>



    <!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Components - Ready Bootstrap Dashboard</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
            name='viewport' />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/css/ready.css">
        <link rel="stylesheet" href="assets/css/demo.css">
    </head>

    <body>
        <div class="wrapper">
            <?php
            $current_page="user";
            include('a_header.php');
        ?>
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <h4 class="page-title">
                            <span onclick="location.href='index.php';" style="cursor:pointer;"> Dashboard</span>. User
                            List
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header ">
                                        <h4 class="card-title">User Registered</h4>
                                        <!-- <p class="card-category">Users Table</p> -->
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-head-bg-warning table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User Id</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql =mysqli_query($con,"SELECT * FROM user_list WHERE is_deleted='0' ");
                                                while($row = mysqli_fetch_assoc($sql)){
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['user_id'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['username']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['user_email']; ?>
                                                    </td>
                                                    <td>
                                                        <form action="remove.php" method="post">
                                                            <input type="hidden" name="user_id"
                                                                value="<?= $row['user_id'] ?>">
                                                            <button type="submit" name="remove_user"
                                                                style="cursor: pointer; color: red;">Remove</button>
                                                        </form>
                                                    </td>

                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Help
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://themewagon.com/license/#free-item">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        2018, made with <i class="la la-heart heart text-danger"></i> by <a
                            href="http://www.themekita.com">ThemeKita</a>
                    </div>
                </div>
            </footer>
        </div>
        </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development
                        </p>
                        <p>
                            <b>We'll let you know when it's done</b>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugin/chartist/chartist.min.js"></script>
    <script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/js/ready.min.js"></script>
    <script>
    $(function() {
        $("#slider").slider({
            range: "min",
            max: 100,
            value: 40,
        });
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300]
        });
    });
    </script>

    <htmll>