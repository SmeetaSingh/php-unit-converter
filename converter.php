<?php 
require 'config.php'; 

// 1. Integrated Logout Logic (if user clicks on logout clear session and redirect to login page)
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy(); // Clears all session data
    header("Location: login.php"); //redirect login
    exit();
}

// 2. Security Check: Redirect to login if not authenticated
if (!isset($_SESSION['active_user'])) { 
    header("Location: login.php"); //redirect login
    exit(); 
}

// 3. Conversion Logic
$res = "";
if (isset($_POST['go'])) {
    $v = (float)$_POST['v'];
    $m = $_POST['m'];
    
    // Applying Formulas
    if ($m == "mtk") {
        $res = ($v / 1000) . " Kilometers";
    } elseif ($m == "ktm") {
        $res = ($v * 1000) . " Meters";
    } elseif ($m == "ctf") {
        $res = (($v * 9/5) + 32) . " F";
    } elseif ($m == "ftc") {
        $res = (($v - 32) * 5/9) . " C";
    } elseif ($m == "ktl") {
        $res = ($v * 2.20462) . " lbs";
    } elseif ($m == "ltk") {
        $res = ($v / 2.20462) . " kg";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Unit Converter | Dashboard</title>
    <style>
        :root {
            --primary: #2563eb;
            --danger: #dc2626;
            --bg: #f8fafc;
            --dark: #1e293b;
        }

        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: var(--bg); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }

        .box { 
            background: #ffffff; 
            border-radius: 12px; 
            padding: 2.5rem; 
            width: 100%; 
            max-width: 420px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.1); 
            text-align: center;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 1rem;
        }

        .user-info { font-weight: 700; color: var(--dark); font-size: 1.1rem; }

        .logout-link { 
            color: var(--danger); 
            text-decoration: none; 
            font-size: 0.85rem; 
            font-weight: 600;
            padding: 6px 12px;
            border: 1px solid var(--danger);
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .logout-link:hover { background: var(--danger); color: white; }

        input, select { 
            width: 100%; 
            padding: 14px; 
            margin: 10px 0; 
            border: 1px solid #cbd5e1; 
            border-radius: 8px; 
            box-sizing: border-box; 
            font-size: 1rem;
            outline-color: var(--primary);
        }

        button { 
            width: 100%; 
            padding: 14px; 
            background: var(--primary); 
            color: white; 
            border: none; 
            border-radius: 8px; 
            cursor: pointer; 
            font-size: 1rem; 
            font-weight: 700;
            margin-top: 15px;
            transition: background 0.2s;
        }

        button:hover { background: #1d4ed8; }

        .result-area {
            margin-top: 1.5rem;
            padding: 1.2rem;
            background: #eff6ff;
            border: 1px dashed var(--primary);
            border-radius: 10px;
            color: var(--primary);
        }

        .result-area h2 { margin: 0; font-size: 1.4rem; }
    </style>
</head>
<body>

    <div class="box">
        <div class="header">
            <span class="user-info">Welcome, <?php echo htmlspecialchars($_SESSION['active_user']); ?></span>
            <a href="converter.php?action=logout" class="logout-link">Logout</a>
        </div>

        <form method="POST">
            <input type="number" step="any" name="v" placeholder="Enter numerical value..." required>
            
            <select name="m">
                
                <option value="mtk">Meters to Kilometers</option>
                <option value="ktm">Kilometers to Meters</option>
                <option value="ctf">Celsius to Fahrenheit</option>
                <option value="ftc">Fahrenheit to Celsius</option>
                <option value="ktl">Kilograms to Pounds</option>
                <option value="ltk">Pounds to Kilograms</option>
                
            </select>

            <button type="submit" name="go">Convert Now</button>
        </form>

        <?php if ($res !== ""): ?>
            <div class="result-area">
                <h2><?php echo $res; ?></h2>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>