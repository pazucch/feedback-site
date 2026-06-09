<?php include 'inc/header.php'; 

$id = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

$stmt = mysqli_prepare(
    $conn,
    "SELECT * FROM feedback WHERE id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$feedback = mysqli_fetch_assoc($result);
?>

<form action="update.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $feedback['id']; ?>">

    <div class="mb-3">
        <label class="form-label">
            Feedback
        </label>

        <textarea name="body" class="form-control"
            rows="5"><?php echo htmlspecialchars($feedback['body']); ?></textarea>
    </div>

    <button type="submit" class="btn btn-dark">
        Save Changes
    </button>

</form>

<?php include 'inc/footer.php'; ?>