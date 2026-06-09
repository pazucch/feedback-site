<?php include 'inc/header.php'; ?>

<?php 
  $sql = 'SELECT * FROM feedback';
  $result = mysqli_query($conn, $sql);
  $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="container d-flex flex-column align-items-center">

    <h2>Past Feedback</h2>

    <?php if(empty($feedback)): ?>
    <p class="lead mt3">
        There is no feedback
    </p>
    <?php endif; ?>

    <?php foreach($feedback as $item): ?>
    <div class="card my-3">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div class="flex-grow-1">
                    <p class="mb-2 text-center">
                        <?php echo $item['body']; ?>
                    </p>

                    <div class="text-secondary text-center">
                        <p class="mb-0">
                            By <?php echo $item['name']; ?> on <?php echo $item['date']; ?>
                        </p>
                    </div>
                </div>

                <div class="d-flex flex-column gap-2 ms-3 flex-shrink-0">

                    <a href="edit.php?id=<?php echo $item['id']; ?>">
                        <img src="img/edit.png" alt="Edit" class="img-fluid" style="max-width: 32px;">
                    </a>

                    <form action="delete.php" method="POST" class="m-0">

                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">

                        <button type="button" class="btn p-0 border-0 bg-transparent" data-bs-toggle="modal"
                            data-bs-target="#deleteModal<?php echo $item['id']; ?>">

                            <img src="img/delete.png" alt="Delete" class="img-fluid" style="max-width: 32px;">
                        </button>

                        <div class="modal fade" id="deleteModal<?php echo $item['id']; ?>" tabindex="-1">

                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Feedback</h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        Are you sure you want to delete this feedback?
                                    </div>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Cancel
                                        </button>

                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php include 'inc/footer.php'; ?>