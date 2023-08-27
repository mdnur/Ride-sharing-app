<?php include_once "inc/header.php"; ?>
<?php

use lib\Session;

$credit = new CreditTable();
$credits = $credit->getRiderByFieldName('user_id', Session::get('rider')['id']);


$expense = new ExpenseTable();
$expenses = $expense->getRiderByFieldName('user_id', Session::get('rider')['id']);

?>

<main class="py-4 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex">
                        <div class="">
                            <h5 class="mt-10">Credit history </h5>
                        </div>
                        <div>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card text-center">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#tab1" data-toggle="tab">Credit History</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tab2" data-toggle="tab">Expense History</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab1">
                                        <?php if (sizeof($credits) != 0) { ?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Credit Amount </th>
                                                            <th>Payment Method</th>
                                                            <th>Added At</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $count = 1; ?>
                                                    <tbody id="routeTableBody">
                                                        <?php foreach ($credits as $row) { ?>
                                                            <tr>
                                                                <td><?php echo $count++; ?></td>
                                                                <td><?php echo $row['credit_amount']; ?></td>
                                                                <td><?php  if($row['payment_type_id'] == 1){ echo 'BKash';}elseif($row['payment_type_id'] == 2){echo 'Bonus';} ?></td>
                                                                <td><?php echo TimeHelper::getFormattedTime4($row['created_at']); ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } else { ?>
                                            <div class="alert alert-info" role="alert">
                                                No Route Available Currently
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="tab-pane fade" id="tab2">
                                    <?php if (sizeof($expenses) != 0) { ?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Expense Amount </th>
                                                            <th>Added At</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $count = 1; ?>
                                                    <tbody id="routeTableBody">
                                                        <?php foreach ($expenses as $row) { ?>
                                                            <tr>
                                                                <td><?php echo $count++; ?></td>
                                                                <td><?php echo $row['expense_amount']; ?></td>
                                                                <td><?php echo TimeHelper::getFormattedTime4($row['created_at']); ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } else { ?>
                                            <div class="alert alert-info" role="alert">
                                                No Route Available Currently
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include_once "inc/footer.php"; ?>