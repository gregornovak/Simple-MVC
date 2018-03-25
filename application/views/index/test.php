<h3>This is a test page</h3>

<p>Here is a list of data passed through controller:</p>
<ul>
    <?php
        foreach($data as $d) {
    ?>
        <li><?php echo $d ?></li>
    <?php
        }
    ?>
</ul>