<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php'); ?>
</head>

<body>
    <?php include('author.php'); ?>
    <div id="wrapper">
        <?php include('sidebar.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include('navbar.php'); ?>
                <?php echo $content ?>
            </div>
        </div>
    </div>
    <?php include('script.php'); ?>
</body>

</html>