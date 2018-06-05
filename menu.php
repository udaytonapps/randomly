<?php
$menu = array(
    'random-student.php' => '<span aria-hidden="true" class="fa fa-lg fa-user"></span> Random Student',
    'random-order.php' => '<span aria-hidden="true" class="fa fa-lg fa-list-ol"></span> Random Order',
    'random-groups.php'  => '<span aria-hidden="true" class="fa fa-lg fa-users"></span> Random Groups',
    'random-custom.php' => '<span aria-hidden="true" class="fa fa-lg fa-pencil-square-o"></span> Custom'
);
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Randomly</a>
        </div>
        <ul class="nav navbar-nav">
            <?php foreach( $menu as $menupage => $menulabel ) : ?>
                <li<?php if($menupage == basename($_SERVER['PHP_SELF'])){echo ' class="active"';} ?>>
                    <a href="<?php echo $menupage ; ?>">
                        <?php echo $menulabel ; ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</nav>
