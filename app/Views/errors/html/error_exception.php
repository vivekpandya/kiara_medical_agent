<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - Something Went Wrong</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .error-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
        }
        .error-card {
            background: white;
            border-radius: 15px;
            padding: 3rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 600px;
            width: 90%;
        }
        .error-icon {
            font-size: 4rem;
            color: #dc3545;
            margin-bottom: 1rem;
        }
        .error-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }
        .error-message {
            color: #666;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }
        .btn-home {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: transform 0.2s;
        }
        .btn-home:hover {
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .error-details {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            margin: 1rem 0;
            text-align: left;
            font-family: monospace;
            font-size: 0.9rem;
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-card">
            <i class="fas fa-exclamation-circle error-icon"></i>
            <h1 class="error-title">Error</h1>
            <p class="error-message">Something went wrong. Please try again later.</p>
            
            <?php if (ENVIRONMENT !== 'production' && isset($exception)): ?>
                <div class="error-details">
                    <strong>Error Message:</strong><br>
                    <?= esc($exception->getMessage()) ?><br><br>
                    
                    <strong>File:</strong> <?= esc($exception->getFile()) ?><br>
                    <strong>Line:</strong> <?= $exception->getLine() ?><br><br>
                    
                    <strong>Stack Trace:</strong><br>
                    <pre><?= esc($exception->getTraceAsString()) ?></pre>
                </div>
            <?php endif; ?>
            
            <a href="/" class="btn btn-home">
                <i class="fas fa-home"></i> Go Back Home
            </a>
        </div>
    </div>
</body>
</html>
