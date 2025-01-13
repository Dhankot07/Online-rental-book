<?php
    include('config.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Tables - Ready Bootstrap Dashboard</title>
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
            $current_page="order";
            include ('a_header.php');
        ?>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <h4 class="page-title">
                        <span onclick="location.href='index.php';" style="cursor:pointer;"> Dashboard</span>. Order List
                    </h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title">Orders</h4>
                                    <!-- <p class="card-category">Users Table</p> -->
                                </div>
                                <div class="card-body">
                                    <table class="table table-head-bg-danger table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order No.</th>
                                                <th scope="col">User No.</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">User Email</th>
                                                <th scope="col">Book No.</th>
                                                <th scope="col">Book Name</th>
                                                <th scope="col">Book Publication</th>
                                                <th scope="col">Access Start</th>
                                                <th scope="col">Access End</th>
                                                <th scope="col">Book</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = mysqli_query($con,"SELECT * FROM book_order bo JOIN book_list bl JOIN user_list ul ON bo.b_id = bl.book_id AND bo.user_id=ul.user_id WHERE bo.is_deleted='0' ");
                                                while($row = mysqli_fetch_assoc($sql)){
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['order_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['user_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['username']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['user_email']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['book_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo substr($row['book_title'],0,10)."..."?>
                                                </td>
                                                <td>
                                                    <?php echo $row['publication']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['starting_date']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['ending_date']; ?>
                                                </td>
                                                <td>
                                                    <?php echo "Going on.."; ?>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                                $sql = mysqli_query($con,"SELECT * FROM book_order bo JOIN book_list bl JOIN user_list ul ON bo.b_id = bl.book_id AND bo.user_id=ul.user_id WHERE bo.is_deleted='1' ");
                                                while($row = mysqli_fetch_assoc($sql)){
                                            ?>
                                            <tr style="background-color:#c5d4dc; color:black; ">
                                                <td>
                                                    <?php echo $row['order_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['user_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['username']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['user_email']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['book_id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo substr($row['book_title'],0,10)."..."?>
                                                </td>
                                                <td>
                                                    <?php echo $row['publication']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['starting_date']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['ending_date']; ?>
                                                </td>
                                                <td>
                                                    <?php echo "Completed"; ?>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class=" footer">
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
                        2018, made with <i class="la la-heart heart text-danger"></i> by
                        <a href="http://www.themekita.com">ThemeKita</a>
                    </div>
                </div>
            </footer>
        </div>
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
                    <p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress
                        development</p>
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
$('#displayNotif').on('click', function() {
    var placementFrom = $('#notify_placement_from option:selected').val();
    var placementAlign = $('#notify_placement_align option:selected').val();
    var state = $('#notify_state option:selected').val();
    var style = $('#notify_style option:selected').val();
    var content = {};

    content.message = 'Turning standard Bootstrap alerts into "notify" like notifications';
    content.title = 'Bootstrap notify';
    if (style == "withicon") {
        content.icon = 'la la-bell';
    } else {
        content.icon = 'none';
    }
    content.url = 'index.php';
    content.target = '_blank';

    $.notify(content, {
        type: state,
        placement: {
            from: placementFrom,
            align: placementAlign
        },
        time: 1000,
    });
});
</script>

</html>