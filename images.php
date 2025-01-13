<?php
    include('config.php');
    //session_start();
    /*if(empty($_SESSION)){
        header("location:login.php");
    }*/
    //$query=mysqli_query($con,"SELECT * FROM seller_list");
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Ready Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/css/ready.css">
    <link rel="stylesheet" href="assets/css/demo.css">
    <style>
    body {
        margin: 0;
        font-family: Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: .8125rem;
        font-weight: 400;
        line-height: 1.5385;
        color: #333;
        text-align: left;
        background-color: #2196F3;
    }

    .mt-50 {
        margin-top: 50px;
    }

    .mb-50 {
        margin-bottom: 50px;
    }



    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .1875rem;
    }

    .card-img-actions {
        position: relative;
    }

    .card-img-actions img {
        height: 100%;
        width: 800px;
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
        text-align: center;
    }

    .card-img {
        width: 50%;
    }

    .bg-cart {
        background-color: orange;
        color: #fff;
    }

    .bg-cart:hover {
        color: #fff;
    }

    a {
        text-decoration: none !important;
    }


    @media (min-width: 1025px) {
        .h-custom {
            height: auto !important;
        }
    }

    .error {
        background-color: green;
        color: white;

    }

    .alert {
        background-color: Green;
        color: white;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
    </style>

</head>

<body>
    <div class="wrapper">
        <?php
            $current_page="book";
            include('a_header.php');
        ?>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <h4 class="page-title">
                        <span onclick="location.href='index.php';" style="cursor:pointer;">Dashboard</span> .
                        <span onclick="location.href='book_list.php';" style="cursor: pointer;">Book List</span>
                    </h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Image</h4>
                                </div>
                                <?php
                                    $id="";
                                    if(isset ($_GET['id'])){
                                        $id = $_GET['id'];
                                ?>
                                <div class="card-body">
                                    <div class="alert" style="display:none;">
                                        <span class="closebtn"
                                            onclick="this.parentElement.style.display='none';">&times;</span>
                                        <p class="error"><?php echo $_GET['error']; ?></p>
                                    </div>
                                    <form class="well form-horizontal" action="insert.php" method="post"
                                        enctype="multipart/form-data" id="contact_form">
                                        <input id="file-upload" name="book_img" type="file" accept=".jpg" required>
                                        <input type="hidden" name="book_id" value="<?= $id ?>">
                                        <button type="submit" name="upload_image" class="btn btn-warning">Upload
                                            <span class="glyphicon glyphicon-send"></span>
                                        </button>
                                    </form>
                                    <?php
                                        $sql = mysqli_query($con,"SELECT * FROM book_image bi JOIN book_list bl ON bi.book_id = bl.book_id WHERE bi.book_id ='$id' AND bi.is_deleted='0'");
                                        $sql2=mysqli_query($con,"SELECT * FROM book_list WHERE book_id=$id");
                                    ?>
                                    <div class="container d-flex justify-content-center mt-50 mb-50">
                                        <div class="row">
                                            <p style="font-weight: bold; ">Book :
                                                <u><?php echo $rows=mysqli_fetch_assoc($sql2)['book_title']; ?></u>
                                            </p>
                                            <div class="container d-flex justify-content-center mt-50 mb-50">
                                                <div class="row">
                                                    <?php
                                                        while($row=mysqli_fetch_assoc($sql)){
                                                    ?>
                                                    <div class="col-md-4 mt-2">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="card-img-actions">
                                                                    <img src="uploads/<?= $row['image'] ?>"
                                                                        class="card-img img-fluid" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="card-body bg-light text-center">
                                                                <p style="font-weight:bold; text-transform:uppercase;">
                                                                    <u><?= $row['image'] ?></u>
                                                                </p>
                                                                <form action="remove.php" method="post">
                                                                    <input type="hidden" name="book_id"
                                                                        value="<?= $id ?>">
                                                                    <input type="hidden" name="image_id"
                                                                        value="<?php echo $row['image_id']; ?>">
                                                                    <button type="submit" name="remove_image"
                                                                        class="btn bg-cart">Remove</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div><!-- /.container -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
function validateInput(event) {
    const char = String.fromCharCode(event.which);
    if (!(/[0-9]/.test(char))) {
        event.preventDefault();
    }
}

function removeItem(id) {
    // Find the item element by ID
    const itemElement = document.getElementById('item-' + id);
    if (itemElement) {
        // Remove the element from the DOM
        itemElement.remove();
    }
}

$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },

            fields: {
                first_name: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: 'Please supply your first name'
                        }
                    }
                },
                last_name: {
                    validators: {
                        stringLength: {
                            min: 2,
                        },
                        notEmpty: {
                            message: 'Please supply your last name'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your email address'
                        },
                        emailAddress: {
                            message: 'Please supply a valid email address'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your phone number'
                        },
                        phone: {
                            country: 'US',
                            message: 'Please supply a vaild phone number with area code'
                        }
                    }
                },
                address: {
                    validators: {
                        stringLength: {
                            min: 8,
                        },
                        notEmpty: {
                            message: 'Please supply your street address'
                        }
                    }
                },
                city: {
                    validators: {
                        stringLength: {
                            min: 4,
                        },
                        notEmpty: {
                            message: 'Please supply your city'
                        }
                    }
                },
                state: {
                    validators: {
                        notEmpty: {
                            message: 'Please select your state'
                        }
                    }
                },
                zip: {
                    validators: {
                        notEmpty: {
                            message: 'Please supply your zip code'
                        },
                        zipCode: {
                            country: 'US',
                            message: 'Please supply a vaild zip code'
                        }
                    }
                },
                comment: {
                    validators: {
                        stringLength: {
                            min: 10,
                            max: 200,
                            message: 'Please enter at least 10 characters and no more than 200'
                        },
                        notEmpty: {
                            message: 'Please supply a description of your project'
                        }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({
                opacity: "show"
            }, "slow") // Do something ...
            $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
</script>