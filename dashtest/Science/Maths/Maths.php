<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Learning Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-gray-100 text-black min-h-screen flex" id="body">
    <!-- Sidebar -->
    <aside id="sidebar" class="transition-all w-64 bg-gray-800 text-white p-4 min-h-screen">
        <button onclick="toggleSidebar()" class="mb-4">☰</button>
        <h1 class="text-lg font-bold mb-4 flex items-center">
            <span id="sidebarTitle">Mathematics</span>
        </h1>
        <nav>
            <details>
                <summary class="block p-2 hover:bg-gray-700 rounded">Chapter 1: Sequences and Series</summary>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">1.1 Arithmetic and Geometric Sequences</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">1.2 Series</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">1.3 Finite Arithmetic Series</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">1.4 Finite Geometric Series</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">1.5 Infinite Series</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">1.6 Summary</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">Exercises</a>
            </details>

            <details>
                <summary class="block p-2 hover:bg-gray-700 rounded">Chapter 2: Functions</summary>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">2.1 Types of Functions</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">2.2 Inverses and Graphs</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">2.3 Exponential and Logarithmic
                    Functions</a>
            </details>

            <details>
                <summary class="block p-2 hover:bg-gray-700 rounded">Chapter 3: Finance</summary>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">3.1 Simple and Compound Interest</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">3.2 Present and Future Value</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">3.3 Annuities</a>
            </details>

            <details>
                <summary class="block p-2 hover:bg-gray-700 rounded">Chapter 4: Trigonometry</summary>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">4.1 Trig Identities and Equations</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">4.2 General Solutions</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">4.3 Trig Graphs</a>
            </details>

            <!--details>
                <summary class="block p-2 hover:bg-gray-700 rounded">Chapter 5: Polynomials</summary>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">5.1 Factor and Remainder Theorem</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">5.2 Graphing Polynomials</a>
            </details-->

            <details>
                <summary class="block p-2 hover:bg-gray-700 rounded">Chapter 6: Differential Calculus</summary>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">6.1 First Principles</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">6.2 Rules of Differentiation</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">6.3 Applications (min/max, etc.)</a>
            </details>

            <details>
                <summary class="block p-2 hover:bg-gray-700 rounded">Chapter 7: Analytical Geometry</summary>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">7.1 Gradient and Equation of a Line</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">7.2 Midpoint and Distance</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">7.3 Circles</a>
            </details>

            <details>
                <summary class="block p-2 hover:bg-gray-700 rounded">Chapter 8: Euclidean Geometry</summary>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">8.1 Theorems and Proofs</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">8.2 Geometry of Triangles</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">8.3 Geometry of Circles</a>
            </details>

            <details>
                <summary class="block p-2 hover:bg-gray-700 rounded">Chapter 9: Statistics</summary>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">9.1 Measures of Central Tendency</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">9.2 Standard Deviation</a>
            </details>

            <details>
                <summary class="block p-2 hover:bg-gray-700 rounded">Chapter 10: Probability</summary>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">10.1 Venn Diagrams and Tree Diagrams</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">10.2 Independent and Dependent Events</a>
                <a href="#" class="block pl-4 p-2 hover:bg-gray-600 rounded">10.3 Probability Rules</a>
            </details>
        </nav>

    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <header class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">Bubble Academy</h2>
            <button onclick="toggleDarkMode()">🌙</button>
        </header>
        <section class="mt-4 p-6 bg-white shadow-lg rounded-lg" id="contentSection" style="display:visible">
            <h1 class="text-2xl font-bold text-blue-700 border-b-2 border-gray-200 pb-2">📚 Learn Mathematics</h1>

            <h1 class="mt-4 text-lg font-semibold text-gray-700 text-center">🔍 Introduction</h1>
            <p class="mt-2 text-gray-600 leading-relaxed">
                Mathematics is the universal language of logic, structure, and patterns. It powers everything from
                technology and finance to medicine and space exploration. Mastering mathematics means
                gaining
                a problem-solving mindset that applies to real-world challenges. 🚀
            </p>

            <p class="mt-2 text-gray-600 leading-relaxed">
                Whether you're coding algorithms, designing skyscrapers, or analyzing data, math is everywhere.
                It’s not just about numbers—it’s about understanding the world in a structured way.
            </p>

            <h1 class="mt-6 text-lg font-semibold text-gray-700 text-center">🌍 Fields Mathematics Can Open for You:
            </h1>

            <ul class="mt-4 space-y-3">
                <li class="p-3 bg-gray-100 rounded-lg shadow-sm hover:bg-gray-200 transition">
                    🎓 <strong>Education & Research</strong> – Become a teacher, professor, or scientist!
                </li>
                <li class="p-3 bg-gray-100 rounded-lg shadow-sm hover:bg-gray-200 transition">
                    💻 <strong>Computer Science & AI</strong> – Power machine learning and cybersecurity!
                </li>
                <li class="p-3 bg-gray-100 rounded-lg shadow-sm hover:bg-gray-200 transition">
                    📈 <strong>Finance & Economics</strong> – Manage investments and predict market trends!
                </li>
                <li class="p-3 bg-gray-100 rounded-lg shadow-sm hover:bg-gray-200 transition">
                    🏗️ <strong>Engineering & Architecture</strong> – Design skyscrapers and bridges!
                </li>
                <li class="p-3 bg-gray-100 rounded-lg shadow-sm hover:bg-gray-200 transition">
                    🔬 <strong>Medicine & Biology</strong> – Decode diseases and improve healthcare!
                </li>
                <li class="p-3 bg-gray-100 rounded-lg shadow-sm hover:bg-gray-200 transition">
                    🚀 <strong>Astronomy & Space Exploration</strong> – Explore galaxies and beyond!
                </li>
            </ul>

            <p class="mt-6 text-gray-600 leading-relaxed">
                Mathematics unlocks endless opportunities. Whether you're dreaming of building the next big app,
                discovering new scientific theories, or solving global financial puzzles, math is your key to
                success.
                <span class="font-semibold text-blue-700">Keep learning. Keep growing. 🚀</span>
            </p>
            <section><button onclick="toggleDivs('contentSection','Arithmetic')"
                    style="padding: 10px 20px; font-size: 16px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
                    Learn
                </button>
                <script>
                    function toggleDivs(id1, id2) {
                        let div1 = document.getElementById(id1);
                        let div2 = document.getElementById(id2);


                        div1.style.display = "none";
                        div2.style.display = "block";
                    }
                </script>
            </section>
        </section>
        <section id="Arithmetic" class="mt-4 p-6 bg-white shadow-lg rounded-lg" style="display:None">
            <?php include "Chapter1/Arithmetic_Sequences.php"; ?>
        </section>
        <section id="Functions" class="mt-4 p-6 bg-white shadow-lg rounded-lg" style="display:None">
            <?php include "Chapter1/functions.php"; ?>
        </section>
        <section id="Functions" class="mt-4 p-6 bg-white shadow-lg rounded-lg" style="display:None">
            <?php include "Chapter1/functions.php"; ?>
        </section>
        <section id="Trigonometry" class="mt-4 p-6 bg-white shadow-lg rounded-lg" style="display:None">
            <?php include "Chapter1/trigonometry.php"; ?>
        </section>
        <section id="Calculus" class="mt-4 p-6 bg-white shadow-lg rounded-lg" style="display:None">
            <?php include "Chapter1/calculus.php"; ?>
        </section>
        <section id="Analytical" class="mt-4 p-6 bg-white shadow-lg rounded-lg" style="display:None">
            <?php include "Chapter1/Analytical Geometry.php"; ?>
        </section>

    </main>

    <script>
        let darkMode = false;
        let sidebarOpen = true;

        function toggleSidebar() {
            sidebarOpen = !sidebarOpen;
            document.getElementById("sidebar").classList.toggle("w-16");
            document.getElementById("sidebar").classList.toggle("w-64");
            document.getElementById("sidebarTitle").innerText = sidebarOpen ? "Learn PHP" : "";
        }

        function toggleDarkMode() {
            darkMode = !darkMode;
            document.getElementById("body").classList.toggle("bg-gray-900");
            document.getElementById("body").classList.toggle("text-white");
            document.getElementById("contentSection").classList.toggle("bg-gray-700");
        }
    </script>
</body>

</html>