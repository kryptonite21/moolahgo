<body>
    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('<?php echo BASE_URL; ?>/public/carousel/image1.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Your Money. Your Way</h2>
                </div>
            </div>


            <div class="item">
                <div class="fill" style="background-image:url('<?php echo BASE_URL; ?>/public/carousel/image2.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Curreny Exchange</h2>
                </div>
            </div>

            <div class="item">
                <div class="fill" style="background-image:url('<?php echo BASE_URL; ?>/public/carousel/image3.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Money Transfer</h2>
                </div>
            </div>

            <div class="item">
                <div class="fill" style="background-image:url('<?php echo BASE_URL; ?>/public/carousel/image4.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Marketplace</h2>
                </div>
            </div>


        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <br>
<div class="container">
<a name="calculator"></a>
<img class="img img-responsive form-signin" src="<?php echo BASE_URL; ?>/public/logo/login_logo.png" width="250px" alt="Login Logo">
<hr />

<?php
// flash message
    if(isset($_SESSION['success'])){
        $message = $_SESSION['success'];
        unset($_SESSION['success']);
        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success</h4>'.$message.'. To view, click <a href="#transactions"><strong>here</strong></a>.</div>';
    }
?>


<h2>Calculator</h2>

<div class="well">
    <br>
        <form class="form-horizontal" id="data_form" action="<?php echo $data['form_url']; ?>" id="data_form" method="post" accept-charset="utf-8">

        <div class="form-group">
            <label for="input_date" class="col-lg-2 control-label">Date:</label>
            <div class="col-lg-10">
                <input type="text" name="date" class="form-control" autocomplete="off" id="input_date" placeholder="Date" required>
            </div>
        </div>

        <div class="form-group">
            <label for="input_amount" class="col-lg-2 control-label">Amount:</label>
            <div class="col-lg-10">
                <input type="text" name="amount" class="form-control" autocomplete="off" id="input_amount" placeholder="Amount" required>
            </div>
        </div>

        <div class="form-group">
            <label for="input_percentage" class="col-lg-2 control-label">Percentage:</label>
            <div class="col-lg-10">
                <input type="text" name="percentage" class="form-control" autocomplete="off" id="input_percentage" placeholder="Percentage">
            </div>
        </div>

        <div class="form-group">
            <label for="input_final" class="col-lg-2 control-label">Final Amount:</label>
            <div class="col-lg-10">
                <input type="text" name="final" class="form-control" id="input_final" readonly placeholder="Final Amount">
            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <input type="submit" class="btn btn-success" name="btn_submit" value="Calculate">
            </div>
        </div>
        </form>
</div>


    <h3>Transaction History</h3>
    <p class="pull-right"><a href="<?php echo BASE_URL . '?url=site/clear'; ?>" onClick="return confirm('Are you sure you want to clear all transactions?')" class="btn btn-danger"><i class="fa fa-trash"></i> Clear</a></p>
    <table class="table table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Percentage</th>
            <th>Final</th>
        </tr>
    <?php
        if(isset($_SESSION['transactions'])){
            $i = 1;
            foreach($_SESSION['transactions'] as $row){
                echo '<tr>
                    <td>'.$i++.'</td>
                    <td>'.$row['date'].'</td>
                    <td>$'.number_format($row['amount'],2).'</td>
                    <td>'.$row['percentage'].'%</td>
                    <td>$'.number_format($row['final_amount'], 2).'</td>
                </tr>';
            }
        }else{
            echo '<tr>
            <td></td>
            <td></td>
            <td><strong class="text-danger">No transactions</strong></td>
            <td></td>
            <td></td>
            </tr>';
        }
    ?>
    </table>

<a name="transactions"></a>
  </div>

</body>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/bootstrapvalidator/bootstrapValidator.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . '/public/bootstrapvalidator/custom.css'; ?>"/>
<script src="<?php echo BASE_URL; ?>/public/bootstrapvalidator/bootstrapValidator.min.js"></script>
<script src="<?php echo BASE_URL; ?>/public/moment/min/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/public/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css"/>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/public/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>

<script>

$("#input_amount")
  .keyup(function() {
    let amount = $('#input_amount').val();
    let percentage = $('#input_percentage').val();
    let validate_percentage = isNaN(parseFloat(percentage)) ? 0 : percentage;

    let percentage_amount = (parseFloat(validate_percentage) / 100 ) * parseFloat(amount);

    let final = parseFloat(amount) + parseFloat(percentage_amount);
    $('#input_final').val( '$'+final.toFixed(2) );
  });

$("#input_percentage")
  .keyup(function() {
    let amount = $('#input_amount').val();
    let percentage = $('#input_percentage').val();
    let validate_percentage = isNaN(parseFloat(percentage)) ? 0 : percentage;

    let percentage_amount = (parseFloat(validate_percentage) / 100 ) * parseFloat(amount);

    let final = parseFloat(amount) + parseFloat(percentage_amount);
    $('#input_final').val( '$'+final.toFixed(2) );
  });


    $('#data_form').bootstrapValidator({
      message: 'This value is not valid',
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
        fields: {
            amount: {
                validators: {
                    notEmpty: {
                        message: 'The amount is required and cannot be empty.'
                    },
                    regexp: {
                        regexp: /^(\d*\.)?\d+$/,
                        message: 'The input is invalid.'
                    },
                }
            },
            date: {
                validators: {
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'The input is not a valid date'
                    }
                }
            },
            percentage: {
                validators: {
                    regexp: {
                        regexp: /^-?[0-9]\d*(\.\d+)?$/,
                        message: 'The input is invalid.'
                    }
                }
            }
    }    
       
    });

    $('#input_date').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>


<script>
$('.carousel').carousel({
interval: 3000 //changes the speed
})
</script>