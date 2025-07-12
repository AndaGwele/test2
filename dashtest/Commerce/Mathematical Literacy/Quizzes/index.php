<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Coming Soon</title>
    <style>
    /* Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body,
    html {
        height: 100%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 20px;
    }

    .container {
        max-width: 400px;
        background: rgba(0, 0, 0, 0.3);
        padding: 40px 30px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }

    h1 {
        font-size: 3rem;
        margin-bottom: 10px;
        letter-spacing: 2px;
    }

    p.lead {
        font-size: 1.2rem;
        margin-bottom: 30px;
        opacity: 0.8;
    }

    .countdown {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .countdown div {
        flex: 1;
        margin: 0 5px;
        background: rgba(255, 255, 255, 0.15);
        padding: 15px 0;
        border-radius: 8px;
        font-weight: bold;
    }

    .countdown div span {
        display: block;
        font-size: 2rem;
    }

    form {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    input[type="email"] {
        flex: 1;
        padding: 12px 15px;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
    }

    button {
        background: #fff;
        color: #764ba2;
        border: none;
        padding: 12px 20px;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #f2f2f2;
    }

    @media (max-width: 480px) {
        .countdown {
            flex-direction: column;
        }

        .countdown div {
            margin: 5px 0;
        }

        form {
            flex-direction: column;
        }

        button {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Coming Soon</h1>
        <p class="lead">We’re working hard to launch the quizzes Stay tuned!</p>
        <div class="countdown">
            <div><span id="days">00</span>Days</div>
            <div><span id="hours">00</span>Hours</div>
            <div><span id="minutes">00</span>Minutes</div>
            <div><span id="seconds">00</span>Seconds</div>
        </div>
        <button onclick="history.back()" style="
    padding: 10px 20px; 
    background-color: #4CAF50; 
    color: white; 
    border: none; 
    border-radius: 5px; 
    cursor: pointer; 
    font-size: 16px;
  ">
            ← Back
        </button>


        <p id="msg" style="margin-top:15px;"></p>
    </div>

    <script>
    // Set your launch date here (YYYY-MM-DDTHH:MM:SS)
    const launchDate = new Date("2025-12-31T00:00:00").getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = launchDate - now;

        if (distance < 0) {
            document.querySelector('.countdown').innerHTML = "<p>We are live now!</p>";
            clearInterval(timerInterval);
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('days').textContent = days.toString().padStart(2, "0");
        document.getElementById('hours').textContent = hours.toString().padStart(2, "0");
        document.getElementById('minutes').textContent = minutes.toString().padStart(2, "0");
        document.getElementById('seconds').textContent = seconds.toString().padStart(2, "0");
    }

    const timerInterval = setInterval(updateCountdown, 1000);
    updateCountdown();

    // Simple email form handling
    const form = document.getElementById('subscribe-form');
    const msg = document.getElementById('msg');
    form.addEventListener('submit', e => {
        e.preventDefault();
        const email = form.email.value.trim();
        if (!email) return;

        // Just simulate a submission here - in real use you'd send it to your backend or email marketing service
        msg.style.color = 'lightgreen';
        msg.textContent = `Thank you! We will notify you at ${email}.`;

        form.reset();
    });
    </script>
</body>

</html>