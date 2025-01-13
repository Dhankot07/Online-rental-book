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
<style>
.alert {
    padding: 2px;
    background-color: crimson;
    color: white;
    width: 215%;
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
                                    <h4 class="card-title">Updating Book</h4>
                                </div>
                                <?php
                                    $id="";
                                    if(isset ($_GET['id'])){
                                        $id = $_GET['id'];
                                        
                                        $sql = mysqli_query($con , "SELECT * FROM book_list WHERE book_id =$id");
                                        $row=mysqli_fetch_assoc($sql);
                                ?>
                                <div class="card-body">
                                    <form class="well form-horizontal" action="update.php" method="post"
                                        enctype="multipart/form-data" id="contact_form">
                                        <fieldset>
                                            <!-- Form Name -->
                                            <!--<legend>Contact Us Today!</legend>-->
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="col-md-4 control-label">
                                                                <label>Book Title</label>
                                                            </div>
                                                            <div class=" col-md-12 inputGroupContainer">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                            class="glyphicon glyphicon-user"></i></span>
                                                                    <input name="book_title" placeholder="Book Title.."
                                                                        class="form-control col-md-12" type="text"
                                                                        value="<?= $row['book_title'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col-md-4 control-label">
                                                                <label>Book Language</label>
                                                            </div>
                                                            <div class=" col-md-12 inputGroupContainer">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                            class="glyphicon glyphicon-user"></i></span>
                                                                    <input name="book_lang" placeholder="Book Lang.."
                                                                        class="form-control col-md-12" type="text"
                                                                        value="<?= $row['book_lang'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="col-md-4 control-label">
                                                                <label>Book Author</label>
                                                            </div>
                                                            <div class=" col-md-12 inputGroupContainer">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                            class="glyphicon glyphicon-user"></i></span>
                                                                    <input name="book_author"
                                                                        placeholder="Book Author.."
                                                                        class="form-control col-md-12" type="text"
                                                                        value="<?= $row['book_author'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col-md-6 control-label">
                                                                <label>Book Publication</label>
                                                            </div>
                                                            <div class=" col-md-12 inputGroupContainer">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                            class="glyphicon glyphicon-user"></i></span>
                                                                    <input name="book_publication"
                                                                        placeholder="Book Publication.."
                                                                        class="form-control col-md-12" type="text"
                                                                        value="<?= $row['publication'] ?>" required>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Text input-->
                                            <div class="form-group">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="col-md-4 control-label">
                                                                <label>Book MRP ₹</label>
                                                            </div>
                                                            <div class=" col-md-12 inputGroupContainer">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                            class="glyphicon glyphicon-user"></i></span>
                                                                    <input name="book_mrp" placeholder="Book MRP.."
                                                                        onkeypress="validateInput(event)"
                                                                        class="form-control col-md-12" type="text"
                                                                        value="<?= $row['mrp'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col-md-6 control-label">
                                                                <label>Date of Published</label>
                                                            </div>
                                                            <div class=" col-md-12 inputGroupContainer">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="glyphicon glyphicon-user"></i>
                                                                    </span>
                                                                    <input name="book_date"
                                                                        placeholder="Date of published.."
                                                                        class="form-control col-md-12" type="date"
                                                                        value="<?php echo htmlspecialchars($row['date']);  ?>"
                                                                        required>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Text area -->
                                            <div class="form-group">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="col-md-4 control-label">
                                                                Book Description</label>
                                                            <div class="col-md-12 inputGroupContainer">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="glyphicon glyphicon-pencil"></i>
                                                                    </span>
                                                                    <textarea class="form-control"
                                                                        style="height: 100px;" name="description"
                                                                        placeholder="Book Description"
                                                                        required><?php echo htmlspecialchars($row['book_detail']) ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="col-md-6 control-label">
                                                                <label class="form-check-label">
                                                                    <?php
                                                                        $sql=mysqli_query($con,"SELECT most_pop FROM book_list WHERE book_id='$id'");
                                                                        $query=mysqli_fetch_assoc($sql);
                                                                        if($query['most_pop'] == 1){
                                                                    ?>
                                                                    <input class="form-check-input" name="checkbox"
                                                                        type="checkbox" value="1" checked>
                                                                    <span class="form-check-sign">Most Popular</span>
                                                                    <?php
                                                                        }
                                                                        else{
                                                                            $count_query=mysqli_query($con,"SELECT most_pop FROM book_list WHERE most_pop='1'");
                                                                            $count=mysqli_num_rows($count_query);
                                                                            if($count >=3){
                                                                    ?>
                                                                    <div>
                                                                        <span
                                                                            onclick="this.parentElement.style.display='show';">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16"
                                                                                fill="currentColor" class="bi bi-app"
                                                                                viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4z" />
                                                                            </svg>
                                                                        </span>
                                                                        <span class="form-check-sign">
                                                                            Most Popular
                                                                        </span>
                                                                        <div class="alert">
                                                                            <span class="closebtn"
                                                                                onclick="this.parentElement.style.display='none';">&times;</span>
                                                                            You cannot add more
                                                                            than<strong>3</strong>books as most Popular
                                                                        </div>
                                                                    </div>
                                                                    <?php } else{ ?>
                                                                    <input class="form-check-input" name="checkbox"
                                                                        type="checkbox" value="0">
                                                                    <span class="form-check-sign">Most Popular</span>
                                                                    <?php
                                                                        }}
                                                                    ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="book_id" value="<?= $row['book_id'] ?>">
                                            <!-- Success message
                                            <div class="alert alert-success" role="alert" id="success_message">Success
                                                <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us,
                                                we will get back to you shortly.
                                            </div>-->

                                            <!-- Button -->
                                            <div class="form-group">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6">
                                                                <button type="submit" name="update"
                                                                    class="btn btn-warning">Update
                                                                    <span class="glyphicon glyphicon-send"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                <?php } ?>
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