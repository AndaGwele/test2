<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Momentum Physics</title>
    <style>
    h1,
    h2,
    h3 {
        color: #2c3e50;
    }

    h1 {
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
    }

    h2 {
        color: #2980b9;
        margin-top: 30px;
        border-bottom: 1px solid #eee;
        padding-bottom: 5px;
    }

    h3 {
        color: #2c3e50;
        margin-top: 25px;
    }

    .definition {
        background-color: #f8f9fa;
        border-left: 4px solid #3498db;
        padding: 15px;
        margin: 20px 0;
    }

    .definition h3 {
        margin-top: 0;
    }

    .tip-box {
        background-color: #e8f4fc;
        border: 1px solid #b3d7ff;
        border-radius: 5px;
        padding: 15px;
        margin: 20px 0;
    }

    .tip-box h3 {
        margin-top: 0;
        color: #0056b3;
    }

    .example {
        background-color: #f0fff0;
        border-left: 4px solid #2ecc71;
        padding: 15px;
        margin: 20px 0;
    }

    .case-study {
        background-color: #fff5f5;
        border-left: 4px solid #e74c3c;
        padding: 15px;
        margin: 20px 0;
    }

    .exercise {
        background-color: #f5f5f5;
        border-left: 4px solid #9b59b6;
        padding: 15px;
        margin: 20px 0;
    }

    .vector {
        font-weight: bold;
        color: #e74c3c;
    }

    .formula {
        font-family: "Courier New", monospace;
        font-size: 1.1em;
        background-color: #f5f5f5;
        padding: 5px 10px;
        border-radius: 3px;
        display: inline-block;
        margin: 5px 0;
    }

    .interactive {
        background-color: #fffde7;
        border: 1px solid #ffd54f;
        padding: 20px;
        border-radius: 5px;
        margin: 30px 0;
    }

    .interactive h3 {
        margin-top: 0;
        color: #ff8f00;
    }

    button {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }

    button:hover {
        background-color: #2980b9;
    }

    input,
    select {
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: 100%;
        max-width: 200px;
    }

    #momentumResult {
        font-weight: bold;
        margin-top: 15px;
        padding: 10px;
        background-color: #e8f4f8;
        border-radius: 4px;
    }

    .important {
        background-color: #ffecec;
        border-left: 4px solid #e74c3c;
        padding: 15px;
        margin: 20px 0;
        font-weight: bold;
    }

    .image-placeholder {
        background-color: #eee;
        border: 1px dashed #999;
        padding: 30px;
        text-align: center;
        margin: 15px 0;
        color: #666;
    }

    .question {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px dotted #ddd;
    }

    .question:last-child {
        border-bottom: none;
    }
    </style>
</head>

<body style="height:100vh;Overflow-y:scroll">
    <h1>Momentum (ESCJ7)</h1>

    <p>Momentum is a physical quantity which is closely related to forces.
        Momentum is a property which applies to moving objects, in fact it
        is mass in motion. If something has mass and it is moving then it
        has momentum.</p>

    <div class="definition">
        <h3>DEFINITION: Momentum</h3>
        <p>The linear momentum of a particle (object) is a <span class="vector">vector quantity</span> equal to the
            product
            of the mass of the particle (object) and its velocity.</p>
        <p>The momentum (symbol <strong>p</strong>) of an object of mass
            <em>m</em> moving at velocity <strong>v</strong> is: <span class="formula">p = m·v</span>
        </p>
    </div>

    <p>Momentum is directly proportional to both the mass and velocity of an
        object. A small car travelling at the same velocity as a big truck
        will have a smaller momentum than the truck. The smaller the mass,
        the smaller the momentum for a fixed velocity. If the mass is
        constant then the greater the velocity the greater the momentum. The
        momentum will always be in the same direction as the velocity
        because mass is a scalar not a vector.</p>

    <h2>Vector nature of momentum (ESCJ8)</h2>

    <p>A car travelling at 120 km·hr<sup>−1</sup> will have a larger
        momentum than the same car travelling at 60 km·hr<sup>−1</sup>.
        Momentum is also related to velocity; the smaller the velocity, the
        smaller the momentum.</p>

    <p>Different objects can also have the same momentum, for example a car
        travelling slowly can have the same momentum as a motorcycle
        travelling relatively fast. We can easily demonstrate this.</p>

    <div class="tip-box">
        <h3>TIP</h3>
        <p>A vector multiplied by a scalar has the same direction as the
            original vector but a magnitude that is scaled by the
            multiplicative factor.</p>
    </div>

    <div class="example">
        <p>Consider a car of mass 1000 kg with a velocity of 8
            m·s<sup>−1</sup> (about 30 km·hr<sup>−1</sup>) East. The
            momentum of the car is therefore:</p>
        <p class="formula">p = m·v = (1000)(8) = 8000 kg·m·s<sup>−1</sup>
            East</p>
        <p>Now consider a motorcycle, also travelling East, of mass 250 kg
            travelling at 32 m·s<sup>−1</sup> (about 115
            km·hr<sup>−1</sup>). The momentum of the motorcycle is:</p>
        <p class="formula">p = m·v = (250)(32) = 8000 kg·m·s<sup>−1</sup>
            East</p>
    </div>

    <h2>Change in momentum (ESCJ9)</h2>

    <p>Particles or objects can collide with other particles or objects, we
        know that this will often change their velocity (and maybe their
        mass) so their momentum is likely to change as well. We will deal
        with collisions in detail a little bit later but we are going to
        start by looking at the details of the change in momentum for a
        single particle or object.</p>

    <h3>Case 1: Object bouncing off a wall</h3>

    <p>Let's start with a simple picture, a ball of mass, m, moving with
        initial velocity, v<sub>i</sub>, to the right towards a wall.</p>

    <div class="image-placeholder">Diagram of ball moving toward wall with
        momentum p<sub>i</sub> = mv<sub>i</sub></div>

    <p>It will have momentum <span class="formula">p<sub>i</sub> =
            mv<sub>i</sub></span> to the right as shown in this picture.</p>

    <p>The ball bounces off the wall. It will now be moving to the left,
        with the same mass, but a different velocity, v<sub>f</sub> and
        therefore, a different momentum, <span class="formula">p<sub>f</sub>
            = mv<sub>f</sub></span>.</p>

    <div class="image-placeholder">Diagram of ball moving away from wall
        with momentum p<sub>f</sub> = mv<sub>f</sub></div>

    <p>We know that the final momentum vector must be the sum of the initial
        momentum vector and the change in momentum vector, <span class="formula">Δp = mΔv</span>. This means that, using
        tail-to-head vector addition, Δp, must be the vector that starts at
        the head of p<sub>i</sub> and ends on the head of p<sub>f</sub>.</p>

    <div class="image-placeholder">Vector diagram showing p<sub>i</sub>,
        p<sub>f</sub>, and Δp</div>

    <p>We also know from algebraic addition of vectors that:</p>
    <p class="formula">p<sub>f</sub> = p<sub>i</sub> + Δp</p>
    <p class="formula">p<sub>f</sub> - p<sub>i</sub> = Δp</p>
    <p class="formula">Δp = p<sub>f</sub> - p<sub>i</sub></p>

    <p>If we put this all together we can show the sequence and the change
        in momentum in one diagram:</p>

    <div class="image-placeholder">Combined diagram showing initial, final,
        and change in momentum</div>

    <p>We have just shown the case for a rebounding object. There are a few
        other cases we can use to illustrate the basic features but they are
        all built up in the same way.</p>

    <h3>Case 2: Object stops</h3>

    <p>In some scenarios the object may come to a standstill (rest). An
        example of such a case is a tennis ball hitting the net. The net
        stops the ball but doesn't cause it to bounce back. At the instant
        before it falls to the ground its velocity is zero.</p>

    <div class="image-placeholder">Diagram showing p<sub>i</sub> and
        p<sub>f</sub> = 0 with Δp vector</div>

    <h3>Case 3: Object continues more slowly</h3>

    <p>In this case, the object continues in the same direction but more
        slowly. To give this some context, this could happen when a ball
        hits a glass window and goes through it or an object sliding on a
        frictionless surface encounters a small rough patch before carrying
        on along the frictionless surface.</p>

    <div class="image-placeholder">Diagram showing p<sub>i</sub>, reduced
        p<sub>f</sub>, and Δp vector</div>

    <div class="important">
        <p>Important: note that even though the momentum remains in the same
            direction the change in momentum is in the opposite direction
            because the magnitude of the final momentum is less than the
            magnitude of the initial momentum.</p>
    </div>

    <h3>Case 4: Object gets a boost</h3>

    <p>In this case the object interacts with something that increases the
        velocity it has without changing its direction. For example, in
        squash the ball can bounce off a back wall towards the front wall
        and a player can hit it with a racquet in the same direction,
        increasing its velocity.</p>

    <p>If we analyse this scenario in the same way as the first 3 cases, it
        will look like this:</p>

    <div class="image-placeholder">Diagram showing p<sub>i</sub>, increased
        p<sub>f</sub>, and Δp vector</div>

    <h3>Case 5: Vertical bounce</h3>

    <div class="important">
        <p>IMPORTANT! For this explanation we are ignoring any effect of
            gravity. This isn't accurate but we will learn more about the
            role of gravity in this scenario in the next chapter.</p>
    </div>

    <p>All of the examples that we've shown so far have been in the
        horizontal direction. That is just a coincidence, this approach
        applies for vertical or horizontal cases. In fact, it applies to any
        scenario where the initial and final vectors fall on the same line,
        any 1-dimensional (1D) problem. We will only deal with 1D scenarios
        in this chapter.</p>

    <p>For example, a stationary basketball player bouncing a ball.</p>

    <p>To illustrate the point, here is what the analysis would look like
        for a ball bouncing off the floor:</p>

    <div class="image-placeholder">Diagram showing vertical p<sub>i</sub>,
        p<sub>f</sub>, and Δp vectors</div>

    <div class="exercise">
        <h2>Exercise 2 – 1:</h2>

        <div class="question">
            <p>1. a) The fastest recorded delivery for a cricket ball is
                161.3 km·hr<sup>−1</sup>, bowled by Shoaib Akhtar of
                Pakistan during a match against England in the 2003 Cricket
                World Cup, held in South Africa. Calculate the ball's
                momentum if it has a mass of 160 g.</p>
        </div>

        <div class="question">
            <p>b) The fastest tennis service by a man is 246.2
                km·hr<sup>−1</sup> by Andy Roddick of the United States of
                America during a match in London in 2004. Calculate the
                ball's momentum if it has a mass of 58 g.</p>
        </div>

        <div class="question">
            <p>c) The fastest server in the women's game is Venus Williams
                of the United States of America, who recorded a serve of 205
                km·hr<sup>−1</sup> during a match in Switzerland in 1998.
                Calculate the ball's momentum if it has a mass of 58 g.</p>
        </div>

        <div class="question">
            <p>d) If you had a choice of facing Shoaib, Andy or Venus and
                didn't want to get hurt, who would you choose based on the
                momentum of each ball?</p>
        </div>

        <div class="question">
            <p>2. More questions. Sign in at Everything Science online and
                click 'Practise Science'.</p>
        </div>
    </div>

    <div class="interactive">
        <h3>Momentum Calculator</h3>
        <p>Calculate the momentum of an object:</p>

        <label for="mass">Mass (kg):</label>
        <input type="number" id="mass" min="0" step="0.1">

        <label for="velocity">Velocity (m/s):</label>
        <input type="number" id="velocity" min="0" step="0.1">

        <label for="direction">Direction:</label>
        <select id="direction">
            <option>North</option>
            <option>East</option>
            <option>South</option>
            <option>West</option>
            <option>Northeast</option>
            <option>Northwest</option>
            <option>Southeast</option>
            <option>Southwest</option>
        </select>

        <button onclick="calculateMomentum()">Calculate Momentum</button>

        <div id="momentumResult"></div>
    </div>
    <h2>Newton's Second Law revisited (ESCJB)</h2>

    <p>In the previous section we considered a number of scenarios where the
        momentum of an object changed but we didn't look at the details of
        what caused the momentum to change. In each case it interacted with
        something which we know would have exerted a force on the object and
        we've learnt a lot about forces in Grade 11 so now we can tie the
        two together.</p>

    <p>You have learnt about Newton's Laws of motion in Grade 11. We know
        that an object will continue in its state of motion unless acted on
        by a force so unless a force acts the momentum will not change.</p>

    <p>In its most general form Newton's Second Law of motion is defined in
        terms of momentum which actually allows for the mass and the
        velocity to vary. We will not deal with the case of changing mass as
        well as changing velocity.</p>

    <div class="definition">
        <h3>DEFINITION: Newton's Second Law of Motion (N2)</h3>
        <p>The net or resultant force acting on an object is equal to the
            rate of change of momentum.</p>
        <p>Mathematically, Newton's Second Law can be stated as: <span class="formula">F<sub>net</sub> = Δp/Δt</span>
        </p>
        <p>If a force is acting on an object whose mass is not changing,
            then Newton's Second Law describes the relationship between the
            motion of an object and the net force on the object through:
            <span class="formula">F<sub>net</sub> =
                ma<sub>net</sub></span>
        </p>
    </div>

    <p>We can therefore say that because a net force causes an object to
        change its motion, it also causes its momentum to change.</p>

    <div class="example">
        <p><span class="formula">F<sub>net</sub> =
                ma<sub>net</sub></span></p>
        <p><span class="formula">F<sub>net</sub> = m(Δv/Δt)</span></p>
        <p><span class="formula">F<sub>net</sub> = (mΔv)/Δt</span></p>
        <p><span class="formula">F<sub>net</sub> = Δp/Δt</span></p>
    </div>

    <p>Let us apply this to the last case from the previous section,
        consider a tennis ball (mass = 0.1 kg) that is thrown and strikes
        the floor with a velocity of 5 m·s<sup>−1</sup> downwards and
        bounces back at a final velocity of 3 m·s<sup>−1</sup> upwards. As
        the ball approaches the floor it has an initial momentum
        p<sub>i</sub>. When it moves away from the floor it has a final
        momentum p<sub>f</sub>.</p>

    <div class="image-placeholder">Diagram showing p<sub>i</sub> downward
        and p<sub>f</sub> upward with Δp vector</div>

    <p>The bounce on the floor can be thought of as a collision taking place
        where the floor exerts a force on the tennis ball to change its
        momentum.</p>

    <div class="important">
        <p>Remember: momentum and velocity are vectors so we have to choose
            a direction as positive. For this example we choose the initial
            direction of motion as positive, in other words, downwards is
            positive.</p>
    </div>

    <p><span class="formula">p<sub>i</sub> = mv<sub>i</sub> = (0.1)(+5) =
            0.5 kg·m·s<sup>−1</sup> downwards</span></p>

    <p>When the tennis ball bounces back it changes direction. The final
        velocity will thus have a negative value because it is in the
        negative direction. The momentum after the bounce can be calculated
        as follows:</p>

    <p><span class="formula">p<sub>f</sub> = mv<sub>f</sub> = (0.1)(−3) =
            −0.3 = 0.3 kg·m·s<sup>−1</sup> upwards</span></p>

    <p>Now let us look at what happens to the momentum of the tennis ball.
        The momentum changes during this bounce.</p>

    <p>We keep our initial choice of downwards as positive. This means that
        the final momentum will have a negative number.</p>

    <p><span class="formula">Δp = p<sub>f</sub> - p<sub>i</sub> =
            mv<sub>f</sub> - mv<sub>i</sub> = (−0.3) − (0.5) = −0.8 = 0.8
            kg·m·s<sup>−1</sup> upwards</span></p>

    <p>You will notice that this number is bigger than the previous momenta
        calculated. This should be the case as the change has to cancel out
        the initial momentum and then still be as large as the final
        momentum over and above the initial momentum.</p>

    <div class="worked-example">
        <h3>Worked example 4: Change in Momentum</h3>

        <div class="step">
            <div class="step-title">QUESTION</div>
            <p>A tennis ball of mass 58 g strikes a wall perpendicularly
                with a velocity of 10 m·s<sup>−1</sup>. It rebounds at a
                velocity of 8 m·s<sup>−1</sup>. Calculate the change in the
                momentum of the tennis ball caused by the wall.</p>
        </div>

        <div class="step">
            <div class="step-title">SOLUTION</div>
            <p><strong>Step 1: Identify the information given and what is
                    asked</strong></p>
            <p>The question explicitly gives a number of values which we
                identify and convert into SI units:</p>
            <ul>
                <li>the ball's mass (m = 58 g = 0.058 kg),</li>
                <li>the ball's initial velocity (v<sub>i</sub> = 10
                    m·s<sup>−1</sup>) towards the wall, and</li>
                <li>the ball's final velocity (v<sub>f</sub> = 8
                    m·s<sup>−1</sup>) away from the wall</li>
            </ul>
            <p>We are asked to calculate the change in momentum of the ball,
                Δp = mv<sub>f</sub> - mv<sub>i</sub></p>
            <div class="image-placeholder">Diagram showing p<sub>i</sub>
                toward wall and p<sub>f</sub> away from wall with Δp
                vector</div>
            <p>We have everything we need to find Δp.</p>
            <p>Since the initial momentum is directed towards the wall and
                the final momentum is away from the wall, we can use the
                algebraic method of subtraction discussed in Vectors in
                Grade 10.</p>
        </div>

        <div class="step">
            <p><strong>Step 2: Choose a frame of reference</strong></p>
            <p>Let us choose towards the wall as the positive direction.</p>
        </div>

        <div class="step">
            <p><strong>Step 3: Do the calculation</strong></p>
            <p><span class="formula">Δp = mv<sub>f</sub> - mv<sub>i</sub> =
                    (0.058)(−8) − (0.058)(+10) = (−0.46) − (0.58) = −1.04 =
                    1.04 kg·m·s<sup>−1</sup> away from the wall</span></p>
        </div>

        <div class="step">
            <p><strong>Step 4: Quote the final answer</strong></p>
            <p>The change in momentum is 1.04 kg·m·s<sup>−1</sup> away from
                the wall.</p>
        </div>
    </div>

    <!-- Additional worked examples 5 and 6 would follow the same pattern -->

    <div class="exercise">
        <h2>Exercise 2 – 2:</h2>

        <div class="question">
            <p>1. Which expression accurately describes the change of
                momentum of an object?</p>
            <p>a) F/m</p>
            <p>b) F/Δt</p>
            <p>c) F·m</p>
            <p>d) F·Δt</p>
        </div>

        <div class="question">
            <p>2. A child drops a ball of mass 100 g. The ball strikes the
                ground with a velocity of 5 m·s<sup>−1</sup> and rebounds
                with a velocity of 4 m·s<sup>−1</sup>. Calculate the change
                of momentum of the ball.</p>
        </div>

        <div class="question">
            <p>3. More questions. Sign in at Everything Science online and
                click 'Practise Science'.</p>
        </div>
    </div>

    <h2>Conservation of momentum (ESCJC)</h2>

    <p>In this section we are going to look at momentum when two objects
        interact with each other and, specifically, treat both objects as
        one system. To do this properly we first need to define what we mean
        we talk about a system, then we need to look at what happens to
        momentum overall and we will explore the applications of momentum in
        these interactions.</p>

    <h3>Systems (ESCJD)</h3>

    <div class="definition">
        <h3>DEFINITION: System</h3>
        <p>A system is a physical configuration of particles and or objects
            that we study.</p>
    </div>

    <p>For example, earlier we looked at what happens when a ball bounces
        off a wall. The system that we were studying was just the wall and
        the ball. The wall must be connected to the Earth and something must
        have thrown or hit the ball but we ignore those. A system is a
        subset of the physical world that we are studying. The system exists
        in some larger environment.</p>

    <p>In the problems that we are solving we actually treat our system as
        being isolated from the environment. That means that we can
        completely ignore the environment. In reality, the environment can
        affect the system but we ignore that for isolated systems. We try to
        choose isolated systems when it makes sense to ignore the
        surrounding environment.</p>

    <div class="definition">
        <h3>DEFINITION: Isolated system</h3>
        <p>An isolated system is a physical configuration of particles and
            or objects that we study that doesn't exchange any matter with
            its surroundings and is not subject to any force whose source is
            external to the system.</p>
    </div>

    <p>An external force is a force acting on the pieces of the system that
        we are studying that is not caused by a component of the system.</p>

    <p>It is a choice we make to treat objects as an isolated system but we
        can only do this if we think it really make sense, if the results we
        are going to get will still be reasonable. In reality, no system is
        competely isolated except for the whole universe (we think). When we
        look at a ball hitting a wall it makes sense to ignore the force of
        gravity. The effect isn't exactly zero but it will be so small that
        it will not make any real difference to our results.</p>

    <h3>Conservation of momentum (ESCJF)</h3>

    <p>There is a very useful property of isolated systems, total momentum
        is conserved.</p>

    <p>Let's use a practical example to show why this is the case, let us
        consider two billiard balls moving towards each other. Here is a
        sketch alongside (not to scale). When they come into contact, ball 1
        exerts a contact force on the ball 2, F<sub>B1</sub>, and the ball 2
        exerts a force on ball 1, F<sub>B2</sub>.</p>

    <div class="image-placeholder">Diagram of two billiard balls colliding
        with force vectors</div>

    <p>We also know that the force will result in a change in momentum:
        <span class="formula">F<sub>net</sub> = Δp/Δt</span>
    </p>

    <p>We also know from Newton's third law that: <span class="formula">F<sub>B1</sub> = −F<sub>B2</sub></span></p>

    <div class="example">
        <p><span class="formula">Δp<sub>B1</sub>/Δt =
                −Δp<sub>B2</sub>/Δt</span></p>
        <p><span class="formula">Δp<sub>B1</sub> =
                −Δp<sub>B2</sub></span></p>
        <p><span class="formula">Δp<sub>B1</sub> + Δp<sub>B2</sub> =
                0</span></p>
    </div>

    <p>This says that if you add up all the changes in momentum for an
        isolated system the net result will be zero. If we add up all the
        momenta in the system the total momentum won't change because the
        net change is zero.</p>

    <div class="important">
        <p>Important: note that this is because the forces are internal
            forces and Newton's third law applies. An external force would
            not necessarily allow momentum to be conserved. In the absence
            of an external force acting on a system, momentum is
            conserved.</p>
    </div>

    <!-- Interactive calculator and other previous content would follow here -->

    <script>
    function calculateMomentum() {
        const mass = parseFloat(document.getElementById('mass').value);
        const velocity = parseFloat(document.getElementById('velocity').value);
        const direction = document.getElementById('direction').value;

        if (isNaN(mass) || isNaN(velocity)) {
            alert("Please enter valid numbers for mass and velocity");
            return;
        }

        const momentum = mass * velocity;
        const resultElement = document.getElementById('momentumResult');

        resultElement.innerHTML = `
                <p>Momentum = ${momentum.toFixed(2)} kg·m·s<sup>−1</sup> ${direction}</p>
                <p>Formula: p = m·v = ${mass} × ${velocity} = ${momentum.toFixed(2)}</p>
            `;
    }

    function calculateMomentum() {
        const mass = parseFloat(document.getElementById('mass').value);
        const velocity = parseFloat(document.getElementById('velocity').value);
        const direction = document.getElementById('direction').value;

        if (isNaN(mass) || isNaN(velocity)) {
            alert("Please enter valid numbers for mass and velocity");
            return;
        }

        const momentum = mass * velocity;
        const resultElement = document.getElementById('momentumResult');

        resultElement.innerHTML = `
                <p>Momentum = ${momentum.toFixed(2)} kg·m·s<sup>−1</sup> ${direction}</p>
                <p>Formula: p = m·v = ${mass} × ${velocity} = ${momentum.toFixed(2)}</p>
            `;
    }
    </script>
</body>

</html>