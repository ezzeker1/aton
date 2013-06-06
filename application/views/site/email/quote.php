<!DOCTYPE html>
<html>
    <head>
        <title>Contact us email</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div>
            <p>Hi ATON Admin,</p>
            <p>
                <?php echo $details['name']; ?> has requested a quote
            </p>
            <p>
            <h1>Details</h1>
        </p>
        <table>


            <?php foreach ($details as $key => $value) { ?>
                <tr>
                    <td>  <?php echo $key; ?></td>
                    <td>  <?php echo $value; ?></td>

                </tr>
            <?php } ?>
        </table>

    </div>
</body>
</html>