<?php
include('db_config.php');

// Mendapatkan Availability Zone dari Metadata EC2 (ImdsV2)
$token = shell_exec('curl -s -X PUT "http://169.254.169.254/latest/api/token" -H "X-aws-ec2-metadata-token-ttl-seconds: 21600"');
$az = shell_exec("curl -s -H 'X-aws-ec2-metadata-token: $token' http://169.254.169.254/latest/meta-data/placement/availability-zone");

$db_status = "Connected";
$db_error = "";

// Mencoba koneksi ke database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    $db_status = "Disconnected";
    $db_error = $conn->connect_error;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>LKS Cloud - Global Infrastructure Dashboard</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; text-align: center; padding: 50px; }
        .card { background: white; padding: 20px; border-radius: 10px; display: inline-block; text-align: left; }
        .status-on { color: green; font-weight: bold; }
        .status-off { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Global E-Commerce Dashboard</h2>
        <hr>
        <p><strong>Server Availability Zone:</strong> <?php echo $az; ?></p>
        <p><strong>Database Status:</strong> 
            <span class="<?php echo ($db_status == 'Connected') ? 'status-on' : 'status-off'; ?>">
                <?php echo $db_status; ?>
            </span>
        </p>
        <?php if ($db_error): ?>
            <p class="status-off">Error: <?php echo $db_error; ?></p>
        <?php endif; ?>
        <p>Node IP: <?php echo $_SERVER['SERVER_ADDR']; ?></p>
        <p>Timestamp: <?php echo date('Y-m-d H:i:s'); ?></p>
    </div>
</body>
</html>
