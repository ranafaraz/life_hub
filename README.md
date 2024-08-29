<h1>Life Hub: 360-Degree Learning Platform</h1>

<h2>Overview</h2>
<p><strong>Life Hub</strong> is an innovative educational platform developed by Electus Education. The platform is designed to empower children and youth by integrating financial literacy, entrepreneurship, and career education into a dynamic, reward-based learning environment. Life Hub offers personalized learning experiences, a virtual token economy, and educational tasks known as Edu-Jobs, all aimed at equipping young users with essential life skills.</p>
<p>This repository contains the source code and documentation for the Life Hub project. The platform leverages a combination of technologies including CodeIgniter, Node.js, Angular, and various AWS services to deliver a seamless, scalable, and secure learning experience.</p>

<h2>Table of Contents</h2>
<ul>
  <li><a href="#features">Features</a></li>
  <li><a href="#technologies-used">Technologies Used</a></li>
  <li><a href="#setup-and-installation">Setup and Installation</a></li>
  <li><a href="#usage">Usage</a></li>
  <li><a href="#contributing">Contributing</a></li>
  <li><a href="#license">License</a></li>
  <li><a href="#contact">Contact</a></li>
</ul>

<h2 id="features">Features</h2>
<ul>
  <li><strong>Edu-Jobs</strong>: Task-based learning modules that reward users with tokens.</li>
  <li><strong>Token Economy</strong>: A virtual currency system allowing users to earn, save, and spend tokens within the platform.</li>
  <li><strong>Personalized Learning</strong>: Adaptive learning paths tailored to individual progress and interests.</li>
  <li><strong>Multi-role Dashboards</strong>: Custom interfaces for Child Users, Educators, and Super Admins.</li>
</ul>

<h2 id="technologies-used">Technologies Used</h2>
<ul>
  <li><strong>Frontend</strong>: Angular</li>
  <li><strong>Backend</strong>: CodeIgniter (PHP), Node.js</li>
  <li><strong>Database</strong>: MySQL</li>
  <li><strong>Analytics</strong>: Mixpanel</li>
  <li><strong>Payments</strong>: Stripe</li>
  <li><strong>User Onboarding</strong>: Appcues</li>
  <li><strong>Cloud Infrastructure</strong>: AWS</li>
</ul>

<h2 id="setup-and-installation">Setup and Installation</h2>

<h3>Prerequisites</h3>
<ul>
  <li>Node.js (v14.x or higher)</li>
  <li>npm (v6.x or higher)</li>
  <li>PHP (v7.4 or higher)</li>
  <li>Composer</li>
  <li>MySQL</li>
  <li>Angular CLI (v12.x or higher)</li>
  <li>Git</li>
</ul>

<h3>Installation Steps</h3>
<ol>
  <li><strong>Clone the repository:</strong>
    <pre><code>git clone https://github.com/ranafaraz/life_hub.git
cd life_hub</code></pre>
  </li>
  <li><strong>Backend Setup:</strong>
    <ul>
      <li>Navigate to the <code>backend</code> directory:
        <pre><code>cd backend</code></pre>
      </li>
      <li>Install dependencies:
        <pre><code>composer install</code></pre>
      </li>
      <li>Set up environment variables:
        <ul>
          <li>Copy <code>.env.example</code> to <code>.env</code> and configure your database settings.</li>
        </ul>
      </li>
      <li>Run migrations to set up the database:
        <pre><code>php artisan migrate</code></pre>
      </li>
    </ul>
  </li>
  <li><strong>Frontend Setup:</strong>
    <ul>
      <li>Navigate to the <code>frontend</code> directory:
        <pre><code>cd frontend</code></pre>
      </li>
      <li>Install dependencies:
        <pre><code>npm install</code></pre>
      </li>
      <li>Build the Angular project:
        <pre><code>ng build --prod</code></pre>
      </li>
    </ul>
  </li>
  <li><strong>Start the Application:</strong>
    <ul>
      <li>For the backend:
        <pre><code>php -S localhost:8000 -t public</code></pre>
      </li>
      <li>For the frontend:
        <pre><code>ng serve</code></pre>
      </li>
      <li>Access the application via <code>http://localhost:4200</code> for frontend and <code>http://localhost:8000</code> for backend.</li>
    </ul>
  </li>
</ol>

<h2 id="usage">Usage</h2>
<ul>
  <li><strong>Child Users</strong> can access their personalized dashboard to manage their Edu-Jobs, track their progress, and interact with the token economy.</li>
  <li><strong>Educators</strong> can assign tasks, monitor student progress, and provide feedback through their dedicated dashboard.</li>
  <li><strong>Super Admins</strong> can manage the entire platform's settings, including user roles, content, and system configurations.</li>
</ul>

<h2 id="contributing">Contributing</h2>
<p>We welcome contributions from the community! To contribute:</p>
<ol>
  <li>Fork the repository.</li>
  <li>Create a new branch (<code>git checkout -b feature-branch</code>).</li>
  <li>Commit your changes (<code>git commit -m 'Add some feature'</code>).</li>
  <li>Push to the branch (<code>git push origin feature-branch</code>).</li>
  <li>Open a pull request.</li>
</ol>
<p>Please ensure your code follows our <a href="#">coding guidelines</a>.</p>

<h2 id="license">License</h2>
<p>This project is licensed under the MIT License - see the <a href="LICENSE">LICENSE</a> file for details.</p>

<h2 id="contact">Contact</h2>
<p>For any inquiries or issues, please reach out via <a href="https://github.com/ranafaraz/life_hub/issues">GitHub Issues</a> or contact Electus Education at <a href="mailto:support@lifehub.com">support@lifehub.com</a>.</p>
