<?php
// Step 1: 引入数据库连接信息
require_once("settings.php");

// Step 2: 建立连接
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Step 3: 检查连接是否成功
if (!$conn) {
    echo "<p>Unable to connect to database.</p>";
} else {
    // Step 4: 查询数据库
    $query = "SELECT * FROM cars";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Step 5: 打印 HTML 表格
        echo "<h2>Car Exhibition - Available Cars</h2>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price ($)</th><th>Year</th></tr>";

        // Step 6: 逐行输出数据
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['car_id'] . "</td>";
            echo "<td>" . $row['make'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['yom'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>There are no cars to display.</p>";
    }

    // Step 7: 关闭连接
    mysqli_close($conn);
}
?>
