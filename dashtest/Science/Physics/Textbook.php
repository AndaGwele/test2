<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Interactive Image Sections</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: white;
        color: #333;
        line-height: 1.6;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    header {
        text-align: center;
        margin-bottom: 3rem;
    }

    h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .subtitle {
        font-size: 1.2rem;
        color: #666;
    }

    .image-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 2rem;
    }

    .image-card {
        background-color: #f8f8f8;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .image-card:hover {
        transform: translateY(-5px);
    }

    .image-wrapper img {
        width: 100%;
        height: auto;
        display: block;
    }

    .image-info {
        padding: 1.5rem;
    }

    .image-title {
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
    }

    .image-description {
        color: #666;
        margin-bottom: 1.5rem;
    }

    .cta-button {
        display: inline-block;
        background-color: #1a73e8;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .cta-button:hover {
        background-color: #1557b0;
    }

    footer {
        margin-top: 4rem;
        text-align: center;
        color: #666;
        padding: 2rem 0;
        border-top: 1px solid #eee;
    }

    .back-button-container {
        position: relative;
        padding: 1rem 0;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        background-color: #1a73e8;
        color: white;
        padding: 0.6rem 1.2rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .back-button:hover {
        background-color: #1557b0;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .back-button:active {
        transform: translateY(0);
    }

    .back-button::before {
        content: "←";
        margin-right: 8px;
        font-size: 1.1rem;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        h1 {
            font-size: 2rem;
        }

        .subtitle {
            font-size: 1rem;
        }

        .image-title {
            font-size: 1.1rem;
        }

        .image-description {
            font-size: 0.95rem;
        }

        .cta-button {
            padding: 0.6rem 1rem;
            font-size: 0.95rem;
        }

        .container {
            padding: 1rem;
        }
    }

    @media (max-width: 480px) {
        .image-grid {
            grid-template-columns: 1fr;
        }

        h1 {
            font-size: 1.6rem;
        }

        .subtitle {
            font-size: 0.95rem;
        }

        .image-title {
            font-size: 1rem;
        }

        .image-description {
            font-size: 0.9rem;
        }

        .cta-button,
        .back-button {
            width: 100%;
            text-align: center;
            padding: 0.6rem;
            justify-content: center;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="back-button-container">
            <button class="back-button" onclick="window.history.back()">Back</button>
        </div>

        <header>
            <h1>Below Are Different textbooks we have compiled for Physical Science</h1>
            <p class="subtitle">Click any card below to explore
                the texbooks.</p>
        </header>

        <div class="image-grid">
            <!-- Image Card 1 -->
            <div class="image-card">
                <div class="image-wrapper">
                    <img src="" alt="Mind The Gap">
                </div>
                <div class="image-info">
                    <h3 class="image-title">Mind The Gap</h3>
                    <p class="image-description">Study guide.</p>
                    <a href="Pdf_notes.php" class="cta-button" target="_blank">Go to</a>
                </div>
            </div>

            <!-- Image Card 2 -->
            <div class="image-card">
                <div class="image-wrapper">
                    <img src="" alt="Coming Soon">
                </div>
                <div class="image-info">
                    <h3 class="image-title">COMING SOON</h3>
                    <p class="image-description">Coming SOON.</p>
                    <a href="#" class="cta-button" target="_blank">Go to</a>
                </div>
            </div>

            <!-- Image Card 3 -->
            <div class="image-card">
                <div class="image-wrapper">
                    <img src="" alt="Coming Soon">
                </div>
                <div class="image-info">
                    <h3 class="image-title">COMING SOON</h3>
                    <p class="image-description">Coming SOON.</p>
                    <a href="#" class="cta-button" target="_blank">Go to</a>
                </div>
            </div>
            <!-- Image Card 4 -->
            <div class="image-card">
                <div class="image-wrapper">
                    <img src="" alt="Coming Soon">
                </div>
                <div class="image-info">
                    <h3 class="image-title">COMING SOON</h3>
                    <p class="image-description">Coming SOON.</p>
                    <a href="#" class="cta-button" target="_blank">Go to</a>
                </div>
            </div>
        </div>

        <footer>
            <p>&copy; Bubble Academy. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>